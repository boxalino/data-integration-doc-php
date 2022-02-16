<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\StopSyncException;
use GuzzleHttp\Psr7\Request;

/**
 * Trait to make the sync request as documented in the official documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/394559761/Sync+Request
 *
 * The request is done once all the files for the given type sync (product, order, etc) have been loaded in BQ
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait SyncTrait
{

    use DiRequestTrait;

    /**
     * Triggers the content sync request
     */
    public function sync() : void
    {
        try{
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSync(),
                    $this->getHttpRequestHeaders()
                ),
                $this->getHttpRequestOptions()
            );
        } catch (\Throwable $exception) {
            if (strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }

            if (strpos($exception->getMessage(), "error 28"))
            {
                throw new StopSyncException("Boxalino DI sync request {$this->getDiConfiguration()->getAccount()}_{$this->getDiConfiguration()->getMode()}_{$this->getDiConfiguration()->getTm()} was reset by a new connection.");
            }

            if(strpos($exception->getMessage(), "504 Gateway Timeout"))
            {
                throw new FailSyncException("Boxalino Data Integration sync request reached the timeout for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()}. Please report this incident to Boxalino.");
            }

            throw new FailSyncException(
                "Boxalino Data Integration sync request failed for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()} with exception: "
                . $exception->getMessage()
            );
        }
    }

}
