<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use GuzzleHttp\Psr7\Request;

/**
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait LoadTrait
{
    use LoadByChunkTrait;

    /**
     * Load docs to GCS, by batches
     */
    public function load(string $document, string $type) : void
    {
        try{
            $response = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoad(),
                    $this->getHttpRequestHeaders($type),
                    $document
                ),
                $this->getHttpRequestOptions()
            );
        } catch (\Throwable $exception)
        {
            if(strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }

            if(strpos($exception->getMessage(), "413 Request Entity Too Large"))
            {
                $this->loadByChunk($document);
                $this->loadBq();
                return;
            }

            throw new FailDocLoadException(
                "Doc Load failed for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()} with exception: "
                . $exception->getMessage()
            );
        }
    }

}
