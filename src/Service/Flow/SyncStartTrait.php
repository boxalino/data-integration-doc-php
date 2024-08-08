<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use GuzzleHttp\Psr7\Request;

/**
 * Making a simple SYNC START request to identify start of process on client side
 * (optional)
 *
 * NOTE: validate that the DiRequestTrait is available in the context of the use of this trait
 * 
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait SyncStartTrait
{

    /**
     * Request to Boxalino DI services to track the sync start process
     * @return void
     */
    public function syncStart() : void
    {
        try{
            $this->log("Calling for the 'SYNC START'");
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointSyncStart(),
                    $this->getHttpRequestHeaders()
                ),
                $this->getHttpRequestOptions(5,30)
            );
            $this->log("End of calling for the 'SYNC START'");
        } catch (\Throwable $exception) {
            if ($this->isExceptionInRetryLoop($exception, "extended"))
            {
                return;
            }

            $this->log("Error during calling for the 'SYNC START': " . $this->_exceptionMessage($exception));
        }
    }


}
