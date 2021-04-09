<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use GuzzleHttp\Client;

/**
 * Assists with content for the Data Integration (DI) request
 * on the configured/provided endpoint
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait DiRequestTrait
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
     * @var ConfigurationDataObject
     */
    protected $diConfiguration;

    /**
     * A generic HTTP client to send the DI request
     *
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
     * @param string | null $endpoint
     * @return string
     */
    public function getEndpointLoad(?string $endpoint = null) : string
    {
        if(is_null($endpoint))
        {
            return $this->getDiConfiguration()->getEndpoint() . GcpRequestInterface::GCP_ENDPOINT_LOAD;
        }

        return $endpoint . GcpRequestInterface::GCP_ENDPOINT_LOAD;
    }

    /**
     * @param string | null $endpoint
     * @return string
     */
    public function getEndpointSync(?string $endpoint = null) : string
    {
        if(is_null($endpoint))
        {
            return $this->getDiConfiguration()->getEndpoint() . GcpRequestInterface::GCP_ENDPOINT_SYNC;
        }

        return $endpoint . GcpRequestInterface::GCP_ENDPOINT_SYNC;
    }

    /**
     * @param string | null $endpoint
     * @return string
     */
    public function getEndpointSyncCheck(?string $endpoint = null) : string
    {
        if(is_null($endpoint))
        {
            return $this->getDiConfiguration()->getEndpoint() . GcpRequestInterface::GCP_ENDPOINT_SYNC_CHECK;
        }

        return $endpoint . GcpRequestInterface::GCP_ENDPOINT_SYNC_CHECK;
    }

    /**
     * @param string | null $endpoint
     * @return string
     */
    public function getEndpointLoadChunk(?string $endpoint = null) : string
    {
        if(is_null($endpoint))
        {
            return $this->getDiConfiguration()->getEndpoint() . GcpRequestInterface::GCP_ENDPOINT_LOAD_CHUNK;
        }

        return $endpoint . GcpRequestInterface::GCP_ENDPOINT_LOAD_CHUNK;
    }

    /**
     * @param string | null $endpoint
     * @return string
     */
    public function getEndpointLoadBq(?string $endpoint = null) : string
    {
        if(is_null($endpoint))
        {
            return $this->getDiConfiguration()->getEndpoint() . GcpRequestInterface::GCP_ENDPOINT_LOAD_BQ;
        }

        return $endpoint . GcpRequestInterface::GCP_ENDPOINT_LOAD_BQ;
    }

    /**
     * @param int|null $timeout
     * @return array
     */
    public function getHttpRequestOptions(?int $timeout = null) : array
    {
        if(is_null($timeout))
        {
            $timeout = $this->timeout;
        }

        return [
            'auth' => [$this->getDiConfiguration()->getApiKey(), $this->getDiConfiguration()->getApiSecret(), 'basic'],
            'connect_timeout' => $timeout
        ];
    }

    /**
     * The content version (miliseconds based in UNIX timestamp)
     * This is required in order for the LIVE sync to apply content updates in chronological order
     *
     * @return string
     */
    public function getTs() : string
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

    /**
     * Required HTTP request headers
     *
     * @param string|null $doc doc type
     * @param int | null $chunk sequence order
     * @return array
     */
    protected function getHttpRequestHeaders(?string $doc = null, ?int $chunk = null) : array
    {
        $params = [
            'Content-Type' => 'application/json',
            GcpRequestInterface::DI_REQUEST_CLIENT   => $this->getDiConfiguration()->getAccount(),
            GcpRequestInterface::DI_REQUEST_DEV      => $this->getDiConfiguration()->isDev(),
            GcpRequestInterface::DI_REQUEST_TYPE     => $this->getDiConfiguration()->getType(),
            GcpRequestInterface::DI_REQUEST_MODE     => $this->getDiConfiguration()->getMode(),
            GcpRequestInterface::DI_REQUEST_TM       => $this->getDiConfiguration()->getTm(),
            GcpRequestInterface::DI_REQUEST_TS       => $this->getDiConfiguration()->getTs(),
            GcpRequestInterface::DI_REQUEST_PROJECT  => $this->getDiConfiguration()->getProject(),
            GcpRequestInterface::DI_REQUEST_DATASET  => $this->getDiConfiguration()->getDataset(),
            GcpRequestInterface::DI_REQUEST_DOC      => $doc,
            GcpRequestInterface::DI_REQUEST_CHUNK    => $chunk
        ];

        return array_filter($params);
    }


    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }


}
