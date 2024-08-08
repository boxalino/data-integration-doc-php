<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use GuzzleHttp\Psr7\Request;

/**
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait LoadByChunkTrait
{
    use DiRequestTrait;
    use GcsLoadUrlTrait;
    use LoadBqTrait;

    /**
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool 
     */
    protected $fallbackLoadByChunk = true;

    /**
     * Load docs to GCS, by batches
     */
    public function loadByChunk(string $document) : void
    {
        try{
            $this->log("Calling for 'LOADBYCHUNK REQUEST'", $this->getDocType());
            $url = $this->getGcsLoadUrl();
            $upload = $this->getClient()->send(
                new Request(
                    'PUT',
                    $url,
                    [
                        'Content-Type' => 'application/octet-stream'
                    ],
                    $document
                ),
                ['connect_timeout' => 180, 'timeout' => 0]
            );

            if ($this->getDiConfiguration()->isTest()) {
                $uploadId = $upload->getHeader("X-GUploader-UploadID")[0];
                $loadedSize = $upload->getHeader("x-goog-stored-content-length")[0];
                $this->getLogger()->info("{$this->getDiConfiguration()->getType()} Chunk loaded to Boxalino GCS. Code - $uploadId. Load size - $loadedSize ");
            }

            $this->log("End for 'LOADBYCHUNK REQUEST': the {$this->getDocType()} data chunk is successfully loaded to GCS");
        } catch (\Throwable $exception)
        {
            if($exception instanceof FailDocLoadException)
            {
                throw $exception;
            }

            $excMessage = $this->_exceptionMessage($exception);
            if($this->isExceptionInRetryLoop($exception) && $this->fallbackLoadByChunk)
            {
                $this->fallbackLoadByChunk = false;
                $this->log("Failed LOAD BY CHUNK with: $excMessage. Retry call out for LOAD BY CHUNK for {$this->getDiConfiguration()->getTm()}");
                sleep(30);

                $this->loadByChunk($document);
                return;
            }

            throw new FailDocLoadException("Doc Load Chunk failed. Exception: " . $excMessage);
        }
    }


}
