<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

/**
 * Class GcpClient
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
class GcpClient implements GcpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var
     */
    protected $timeout;

    public function __construct(LoggerInterface $logger, string $environment, int $timeout = 3)
    {
        $this->logger = $logger;
        $this->environment = $environment;
        $this->client = new Client();
        $this->timeout = $timeout;
    }

    /**
     * @return Client
     */
    public function getClient() : Client
    {
        return $this->client;
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents
     * @param string $mode
     * @throws \Throwable
     */
    public function send(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents, string $mode) : void
    {
        if($this->allowIndexing($configurationDataObject->getEndpoint()))
        {
            try {
                $tm = $this->getTm();
                $ts = $this->getMsTs();
                $this->load($configurationDataObject, $documents, $mode, $tm, $ts);
                $this->sync($configurationDataObject,$mode, $tm, $ts);
            } catch (FailDocLoadException $exception)
            {
                throw $exception;
            } catch (FailSyncException $exception)
            {
                throw $exception;
            } catch (\Throwable $exception)
            {
                $this->logOrThrowException($exception);
            }
        }
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents
     * @param string $mode
     * @param string $tm
     * @param string $ts
     * @throws \Throwable
     */
    public function load(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents, string $mode, string $tm, string $ts) : void
    {
        try{
            foreach($documents as $type => $document)
            {
                if($configurationDataObject->isTest())
                {
                    $this->log($document);
                }

                $this->loadDoc(
                    $configurationDataObject,
                    $document,
                    $type,
                    $mode,
                    $tm,
                    $ts
                );
            }
        } catch (FailDocLoadException $exception)
        {
            throw $exception;
        } catch (\Throwable $exception)
        {
            throw $exception;
        }
    }

    /**
     * Load a document to GCP
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @param string $document
     * @param string $type
     * @param string $mode
     * @param string $tm
     * @param string $ts
     */
    public function loadDoc(ConfigurationDataObject $configurationDataObject, string $document, string $type, string $mode, string $tm, string $ts) : void
    {
        try{
            $requestParameters = [
                'Content-Type' => 'application/json',
                GcpClientInterface::DI_REQUEST_CLIENT   => $configurationDataObject->getAccount(),
                GcpClientInterface::DI_REQUEST_DEV      => $configurationDataObject->isDev(),
                GcpClientInterface::DI_REQUEST_DOC      => $type,
                GcpClientInterface::DI_REQUEST_MODE     => $mode,
                GcpClientInterface::DI_REQUEST_TM       => $tm,
                GcpClientInterface::DI_REQUEST_TS       => $ts
            ];

            $response = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoad($configurationDataObject->getEndpoint()),
                    $requestParameters,
                    $document
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic'],
                    'connect_timeout' => $this->timeout
                ]
            );
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }

            if(strpos($exception->getMessage(), "413 Request Entity Too Large"))
            {
                $this->loadByChunk($configurationDataObject, $requestParameters, $document);
                return;
            }

            throw new FailDocLoadException("Doc Load failed for {$configurationDataObject->getAccount()} on $mode mode at $tm with exception: " . $exception->getMessage());
        }
    }

    /**
     * Make a sync request once all the data sync contents have been exported
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @param string $mode
     * @param string $tm
     * @param string $ts
     */
    public function sync(ConfigurationDataObject $configurationDataObject, string $mode, string $tm, string $ts) : void
    {
        try{
            $properties = [
                'Content-Type' => 'application/json',
                GcpClientInterface::DI_REQUEST_CLIENT   => $configurationDataObject->getAccount(),
                GcpClientInterface::DI_REQUEST_DEV      => $configurationDataObject->isDev(),
                GcpClientInterface::DI_REQUEST_TYPE     => $configurationDataObject->getType(),
                GcpClientInterface::DI_REQUEST_PROJECT  => $configurationDataObject->getProject(),
                GcpClientInterface::DI_REQUEST_DATASET  => $configurationDataObject->getDataset(),
                GcpClientInterface::DI_REQUEST_MODE     => $mode,
                GcpClientInterface::DI_REQUEST_TM       => $tm,
                GcpClientInterface::DI_REQUEST_TS       => $ts
            ];
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSync($configurationDataObject->getEndpoint()),
                    array_filter($properties)
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic'],
                    'connect_timeout' => $this->timeout
                ]
            );
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }
            throw new FailSyncException("$mode mode sync request failed for {$configurationDataObject->getAccount()} on $tm with exception: " . $exception->getMessage());
        }
    }

    /**
     * Load a document to GCP
     *
     * @param ConfigurationDataObject $configurationDataObject
     */
    public function loadByChunk(ConfigurationDataObject $configurationDataObject, array $requestParameters, string $document) : void
    {
        try{
            $url = $this->getLoadUrl($configurationDataObject, $requestParameters);
            $upload = $this->getClient()->send(
                new Request(
                    'PUT',
                    $url,
                    [
                        'Content-Type' => 'application/octet-stream'
                    ],
                    $document
                ),
                [ 'connect_timeout' => 900 ]
            );

            $uploadId = $upload->getHeader("X-GUploader-UploadID")[0];
            $loadedSize = $upload->getHeader("x-goog-stored-content-length")[0];
            $this->logger->info("Boxalino Data Integration finised for " . json_encode($requestParameters) . ". Code - $uploadId. Load size - $loadedSize ");
            
            $this->loadBq($configurationDataObject, $requestParameters);
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                $this->logger->info("Please get in touch with Boxalino. The document took longer to be exported.". $exception->getMessage());
                return;
            }

            throw new FailDocLoadException("Doc Load Chunk failed for " . json_encode($requestParameters) . ". Exception: " . $exception->getMessage());
        }
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param array $requestParameters
     */
    public function loadBq(ConfigurationDataObject $configurationDataObject, array $requestParameters) : void
    {
        try{
            $response = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoadBq($configurationDataObject->getEndpoint()),
                    $requestParameters
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic'],
                    'connect_timeout' => $this->timeout
                ]
            );
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }

            throw new FailDocLoadException("Doc Load failed for ". json_encode($requestParameters) . ". Exception: " . $exception->getMessage());
        }
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param array $requestParameters
     * @return string|null
     */
    public function getLoadUrl(ConfigurationDataObject $configurationDataObject, array $requestParameters) : ?string
    {
        try{
            $signedUrlRequest = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoadChunk($configurationDataObject->getEndpoint()),
                    $requestParameters
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic'],
                    'connect_timeout' => 2
                ]
            );

            return trim(stripslashes(rawurldecode($signedUrlRequest->getBody()->getContents())), '"');
        } catch (\Throwable $exception)
        {
            throw new FailDocLoadException("Doc Load failed for ". json_encode($requestParameters) .". Exception: " . $exception->getMessage());
        }
    }

    /**
     * @param string $endpoint
     * @return string
     */
    public function getEndpointLoad(string $endpoint) : string
    {
        return $endpoint . GcpClientInterface::GCP_ENDPOINT_LOAD;
    }

    /**
     * @param string $endpoint
     * @return string
     */
    public function getEndpointSync(string $endpoint) : string
    {
        return $endpoint . GcpClientInterface::GCP_ENDPOINT_SYNC;
    }

    /**
     * @param string $endpoint
     * @return string
     */
    public function getEndpointLoadChunk(string $endpoint) : string
    {
        return $endpoint . GcpClientInterface::GCP_ENDPOINT_LOAD_CHUNK;
    }

    /**
     * @param string $endpoint
     * @return string
     */
    public function getEndpointLoadBq(string $endpoint) : string
    {
        return $endpoint . GcpClientInterface::GCP_ENDPOINT_LOAD_BQ;
    }

    /**
     * Check if the endpoint is available to make requests
     *
     * @return bool
     */
    public function allowIndexing(string $endpoint) : bool
    {
        return true;
    }

    /**
     * @param \Throwable $exception
     * @return bool
     * @throws \Throwable
     */
    public function logOrThrowException(\Throwable $exception): bool
    {
        if ($this->environment === 'dev') {
            $this->logger->info($exception->getMessage());
            throw $exception;
        }
        if ($this->environment === 'prod') {
            $this->logger->critical($exception->getMessage());
            throw $exception;
        }

        return false;
    }

    /**
     * @param string $message
     */
    public function log(string $message) : void
    {
        $this->logger->info($message);
    }

    /**
     * @return string
     */
    public function getMsTs() : string
    {
        try{
            list($usec, $sec) = explode(" ", microtime());
            $ts = (string) ((float)$usec*1000 + (float)$sec*1000);

            return substr($ts, 0, strpos($ts, '.'));
        } catch (\Throwable $exception)
        {
            $ts = (new \DateTime())->getTimestamp() * 1000;
            return (string) $ts;
        }
    }

    /**
     * @return string
     */
    public function getTm() : string
    {
        return gmdate("YmdHis");
    }

}
