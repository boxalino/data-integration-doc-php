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
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool 
     */
    protected $fallbackGcsLoadUrl = true;

    /**
     * @param array $requestParameters
     * @return string|null
     */
    public function getGcsLoadUrl() : ?string
    {
        try{
            $this->log("Calling for 'LOAD CHUNK PUBLIC URL'", $this->getDocType());
            $signedUrlRequest = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoadChunk(),
                    $this->getHttpRequestHeaders($this->getDocType(), (int) $this->getDiConfiguration()->getChunk())
                ),
                $this->getHttpRequestOptions(80)
            );

            $this->useChunk();
            $this->log("End of 'LOAD CHUNK PUBLIC URL'", $this->getDocType());
            return trim(stripslashes(rawurldecode($signedUrlRequest->getBody()->getContents())), '"');
        } catch (\Throwable $exception)
        {
            if($this->isExceptionInRetryLoop($exception, "extended") && $this->fallbackGcsLoadUrl)
            {
                $this->fallbackGcsLoadUrl = false;
                $this->log("Retry call out for GCS Load URL for " . $this->getDiConfiguration()->getTm());
                sleep(30);

                return $this->getGcsLoadUrl();
            }

            throw new FailDocLoadException("Accessing GcsLoaderUrl failed. Exception: " . $this->_exceptionMessage($exception));
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
