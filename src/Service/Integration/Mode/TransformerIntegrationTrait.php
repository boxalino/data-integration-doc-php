<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;


/**
 * Interface TransformerIntegrationTrait
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait TransformerIntegrationTrait
{

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return TransformerIntegrationInterface::INTEGRATION_MODE;
    }

    /**
     * Integration flow for the transformer mode
     * It loads the files in GCS (based on direct link)
     * It loads the GCS files to BQ (based on configured options)
     * It creates the config model
     */
    public function integrateTransformer(): void {}

}
