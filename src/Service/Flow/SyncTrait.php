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
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool
     */
    protected $fallbackSync = true;

    /**
     * Triggers the content sync request
     */
    public function sync() : void
    {
        try{
            $this->log("Calling for the 'SYNC REQUEST'");
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSync(),
                    $this->getHttpRequestHeaders()
                ),
                $this->getHttpRequestOptions()
            );
            $this->log("End of the 'SYNC REQUEST': the computation will continue on Boxalino node");
        } catch (\Throwable $exception) {
            if (strpos($exception->getMessage(), "timed out after"))
            {
                $this->log("Stopping the 'SYNC REQUEST' due to timeout " . $this->getTimeout());
                return;
            }

            if($this->isExceptionInRetryLoop($exception))
            {
                if($this->fallbackSync)
                {
                    $this->fallbackSync = false;
                    $this->log("Retry call out for SYNC for " . $this->getDiConfiguration()->getTm());
                    sleep(60);

                    $this->sync();
                    return;
                }

                throw new FailSyncException(
                    "Boxalino Data Integration SYNC REQUEST encountered an error {$this->getDiConfiguration()->getAccount()} " .
                    " on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()}. Please report this incident to Boxalino."
                    . $exception->getMessage()
                );
            }

            throw new FailSyncException(
                "Boxalino Data Integration sync request failed for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()} with exception: "
                . $exception->getMessage()
            );
        }
    }


}
