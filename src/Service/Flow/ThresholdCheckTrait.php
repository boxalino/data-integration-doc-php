<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;
use GuzzleHttp\Psr7\Request;

/**
 * Trait to make the threshold check request as documented in the official documentation
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait ThresholdCheckTrait
{

    use DiRequestTrait;

    /**
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool
     */
    protected $fallbackThresholdCheck = true;

    /**
     * Checks the size of the prior full sync
     */
    public function thresholdCheck() : ?int
    {
        try{
            $syncCheckRequest = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointThresholdCheck(),
                    $this->getHttpRequestHeaders()
                ),
                $this->getHttpRequestOptions(120)
            );

            $checkInfo = json_decode($syncCheckRequest->getBody()->getContents(), true);
            if(isset($checkInfo[GcpRequestInterface::DI_REQUEST_THRESHOLD]))
            {
                return (int)$checkInfo[GcpRequestInterface::DI_REQUEST_THRESHOLD];
            }

            return null;
        } catch (\Throwable $exception) {
            if(strpos($exception->getMessage(), "504 Gateway Timeout") && $this->fallbackThresholdCheck)
            {
                $this->fallbackThresholdCheck = false;
                $this->log("Retry call out for THRESHOLD CHECK for " . $this->getDiConfiguration()->getTm());
                sleep(60);

               return $this->thresholdCheck();
            }

            if (strpos($exception->getMessage(), "timed out after"))
            {
                return null;
            }
            
            throw new FailSyncException(
                "Boxalino Data Integration threshold check request failed for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()} with exception: "
                . $exception->getMessage()
            );
        }
    }


}
