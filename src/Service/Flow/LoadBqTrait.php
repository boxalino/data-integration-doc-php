<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use GuzzleHttp\Psr7\Request;

/**
 * Once the content is made available in GCS (private GCP or Boxalino GCP)
 * - make the HTTP request to trigger the validation of the content via loading it to BQ
 *
 * The doc schema and BQ DLL are available in the public repository
 * https://github.com/boxalino/data-integration-doc-schema
 *
 * @package Boxalino\DataIntegrationDoc\Service\Flow
 */
trait LoadBqTrait
{

    /**
     * flag for fallback state (in case of GCP resource unavailability)
     * @var bool
     */
    protected $fallbackLoadBq = true;

    /**
     * Loads a file from GCS to BQ
     */
    public function loadBq() : void
    {
        try{
            $this->log("Calling for 'LOADBQ REQUEST'", $this->getDocType());
            $this->getClient()->send(
                new Request(
                    'POST',
                    $this->getEndpointLoadBq(),
                    $this->getHttpRequestHeaders($this->getDocType())
                ),
                $this->getHttpRequestOptions(300)
            );
            $this->log("End for 'LOADBQ REQUEST': the GCS files are successfully loaded to BQ");
        } catch (\Throwable $exception)
        {
            if($this->isExceptionInRetryLoop($exception) && $this->fallbackLoadBq)
            {
                $this->fallbackLoadBq = false;
                $this->log("Retry call out for Load BQ for " . $this->getDiConfiguration()->getTm());
                sleep(60);

                $this->loadBq();
                return;
            }

            if(strpos($exception->getMessage(), "timed out after"))
            {
                return;
            }

            throw new FailDocLoadException("Doc Load failed. Exception: " . $exception->getMessage());
        }
    }

    /**
     * @return string
     */
    abstract function getDocType() : string;

}
