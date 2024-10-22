<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;
use GuzzleHttp\Psr7\Request;

/**
 * Trait to make the sync request as documented in the official documentation
 *
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait CoreTrait
{

    use DiRequestTrait;

    /**
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool
     */
    protected $fallbackCore = true;

    /**
     * Triggers the content sync request
     */
    public function core() : void
    {
        try{
            $this->log("Calling for the 'CORE REQUEST'");
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointCore(),
                    array_merge($this->getHttpRequestHeaders(), [GcpRequestInterface::DI_REQUEST_MODE => GcpRequestInterface::GCP_MODE_FULL]),
                    $this->getCoreContent()
                ),
                $this->getHttpRequestOptions()
            );
            $this->log("End of the 'CORE REQUEST'");
        } catch (\Throwable $exception) {
            if (strpos($exception->getMessage(), "timed out after"))
            {
                $this->log("Stopping the 'CORE REQUEST' due to timeout " . $this->getTimeout());
                return;
            }

            if($this->isExceptionInRetryLoop($exception))
            {
                if($this->fallbackCore)
                {
                    $this->fallbackCore = false;
                    $this->log("Retry call out for CORE for " . $this->getDiConfiguration()->getTm());
                    sleep(30);

                    $this->core();
                    return;
                }

                throw new FailSyncException(
                    "Boxalino Data Integration CORE REQUEST encountered an error {$this->getDiConfiguration()->getAccount()} " .
                    "at {$this->getDiConfiguration()->getTm()}. Please report this incident to Boxalino."
                    . $this->_exceptionMessage($exception)
                );
            }

            throw new FailSyncException(
                "Boxalino Data Integration sync request failed for {$this->getDiConfiguration()->getAccount()} "
                . "at {$this->getDiConfiguration()->getTm()} with exception: " . $this->_exceptionMessage($exception)
            );
        }
    }


}
