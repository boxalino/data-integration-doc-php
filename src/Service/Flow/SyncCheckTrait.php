<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;
use GuzzleHttp\Psr7\Request;

/**
 * Trait to make the sync request as documented in the official documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/394559761/Sync+Request
 *
 * The request is done once all the files for the given type sync (product, order, etc) have been loaded in BQ
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait SyncCheckTrait
{

    use DiRequestTrait;

    /**
     * Checks the latest sync for the given parameters
     * The sync check returns a JSON structure with tm, ts and created_at (UTC time)
     */
    public function syncCheck() : ?string
    {
        try{
            $syncCheckRequest = $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSyncCheck(),
                    $this->getHttpRequestHeaders()
                ),
                $this->getHttpRequestOptions()
            );

            $checkInfo = json_decode($syncCheckRequest->getBody()->getContents(), true);
            if(isset($checkInfo[GcpRequestInterface::DI_REQUEST_TS]))
            {
                $unix = (int)round($checkInfo[GcpRequestInterface::DI_REQUEST_TS]/1000);
                return date("Y-m-d H:i", $unix);
            }

            if(isset($checkInfo["created_at"]))
            {
                return date("Y-m-d H:i", strtotime($checkInfo["created_at"]));
            }

            return null;
        } catch (\Throwable $exception) {
            if (strpos($exception->getMessage(), "timed out after"))
            {
                return null;
            }
            
            throw new FailSyncException(
                "Boxalino Data Integration sync check request failed for {$this->getDiConfiguration()->getAccount()} on {$this->getDiConfiguration()->getMode()} mode at {$this->getDiConfiguration()->getTm()} with exception: "
                . $exception->getMessage()
            );
        }
    }


}
