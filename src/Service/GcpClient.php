<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

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

    public function __construct(LoggerInterface $logger, string $environment)
    {
        $this->logger = $logger;
        $this->environment = $environment;
        $this->client = new Client();
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
                $tm = gmdate("YmdHis");
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
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoad($configurationDataObject->getEndpoint()),
                    [
                        'Content-Type' => 'application/json',
                        'client' => $configurationDataObject->getAccount(),
                        'dev' => $configurationDataObject->isDev(),
                        'doc' => $type,
                        'mode'=> $mode,
                        'tm' => $tm,
                        'ts' => $ts
                    ],
                    $document
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic']
                ]
            );
        } catch (\Throwable $exception)
        {
            throw new FailDocLoadException("Doc Load failed for $account on $mode mode at $tm with exception: " . $exception->getMessage());
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
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSync($configurationDataObject->getEndpoint()),
                    [
                        'Content-Type' => 'application/json',
                        'client' => $configurationDataObject->getAccount(),
                        'dev' => $configurationDataObject->isDev(),
                        'mode'=> $mode,
                        'tm' => $tm,
                        'ts' => $ts
                    ]
                ),
                [
                    'auth' => [$configurationDataObject->getApiKey(), $configurationDataObject->getApiSecret(), 'basic']
                ]
            );
        } catch (\Throwable $exception)
        {
            throw new FailSyncException("$mode mode sync request failed for $account on $tm with exception: " . $exception->getMessage());
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
            return (string) (new \DateTime())->getTimestamp() * 1000;
        }
    }

}
