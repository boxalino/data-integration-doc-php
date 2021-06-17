<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
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
     * Load docs to GCS, by batches
     */
    public function loadByChunk(string $document) : void
    {
        try{
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
                [ 'connect_timeout' => 900, 'timeout' => 0 ]
            );

            if($this->getDiConfiguration()->isTest())
            {
                $uploadId = $upload->getHeader("X-GUploader-UploadID")[0];
                $loadedSize = $upload->getHeader("x-goog-stored-content-length")[0];
                $this->getLogger()->info("{$this->getDiConfiguration()->getType()} Chunk loaded to Boxalino GCS. Code - $uploadId. Load size - $loadedSize ");
            }
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                $this->getLogger()->alert("Please review the timeout for the loadByChunk call. The document took longer to be exported.". $exception->getMessage());
                return;
            }

            throw new FailDocLoadException("Doc Load Chunk failed. Exception: " . $exception->getMessage());
        }
    }


}
