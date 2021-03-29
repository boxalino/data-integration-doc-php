<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Class GcpClientTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
trait GcpClientTrait
{
    /**
     * @var Client | null
     */
    protected $client = null;

    /**
     * @var int
     */
    protected $timeout = 3;

    /**
     * @return Client
     */
    public function getClient() : Client
    {
        if(is_null($this->client))
        {
            $this->client = new Client();
        }
        return $this->client;
    }

    /**
     * Load a single document to GCP
     * If the request fails due to file size - load the file via chunk
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
     * Load a document to GCP, using a provided content load url
     * Once the document is loaded - use the load BQ call to load the file to BQ
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

            if($configurationDataObject->isTest())
            {
                $uploadId = $upload->getHeader("X-GUploader-UploadID")[0];
                $loadedSize = $upload->getHeader("x-goog-stored-content-length")[0];
                $this->log("Boxalino Data Integration finised for " . json_encode($requestParameters) . ". Code - $uploadId. Load size - $loadedSize ");
            }

            $this->loadBq($configurationDataObject, $requestParameters);
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                $this->log("Please get in touch with Boxalino. The document took longer to be exported.". $exception->getMessage());
                return;
            }

            throw new FailDocLoadException("Doc Load Chunk failed for " . json_encode($requestParameters) . ". Exception: " . $exception->getMessage());
        }
    }

    /**
     * Loads a file from GCS to BQ
     *
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
     * Endpoint to access a private content upload link to GCS
     * curl -X PUT -H 'Content-Type: application/octet-stream' --upload-file my-file $url
     *
     * Read more about GCS Signed URLs
     * https://cloud.google.com/storage/docs/access-control/signed-urls
     *
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
                    'connect_timeout' => $this->timeout
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
     * @param string $message
     */
    public function log(string $message) : void
    {
        $this->logger->info($message);
    }

    /**
     * The content version (miliseconds based in UNIX timestamp)
     * This is required in order for the LIVE sync to apply content updates in chronological order
     *
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
     * Timestamp
     * Use this to identify the BQ table for this content
     * (ex: <client>_<mode>.<doc>_<mode>_<tm> in our GCP project)
     *
     * @return string
     */
    public function getTm() : string
    {
        return gmdate("YmdHis");
    }

}
