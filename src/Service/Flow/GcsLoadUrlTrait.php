<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use GuzzleHttp\Psr7\Request;

/**
 * Endpoint to access a private content upload link to GCS
 * curl -X PUT -H 'Content-Type: application/octet-stream' --upload-file my-file $url
 *
 * Read more about GCS Signed URLs
 * https://cloud.google.com/storage/docs/access-control/signed-urls
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait GcsLoadUrlTrait
{

    /**
     * @param array $requestParameters
     * @return string|null
     */
    public function getGcsLoadUrl() : ?string
    {
        try{
            $signedUrlRequest = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoadChunk(),
                    $this->getHttpRequestHeaders($this->getDocType(), (int) $this->getDiConfiguration()->getChunk())
                ),
                $this->getHttpRequestOptions()
            );

            $this->useChunk();
            return trim(stripslashes(rawurldecode($signedUrlRequest->getBody()->getContents())), '"');
        } catch (\Throwable $exception)
        {
            throw new FailDocLoadException("Accessing GcsLoaderUrl failed. Exception: " . $exception->getMessage());
        }
    }

    /**
     * @return string
     */
    abstract function getDocType() : string;

    /**
     *
     */
    public function useChunk() : void
    {
        $chunk = (int)$this->getDiConfiguration()->getChunk();
        $this->getDiConfiguration()->setChunk($chunk+1);
    }


}
