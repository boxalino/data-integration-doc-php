<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\MissingConfigurationException;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;

/**
 * Interface EnrichmentIntegrationTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait EnrichmentIntegrationTrait
{

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return EnrichmentIntegrationInterface::INTEGRATION_MODE;
    }

    /**
     * Integration flow for the enrichment mode
     * It behaves similar as the full, except it enriches instead of syncing
     */
    public function integrateEnrichment(): void
    {
        $configuration = $this->getDiConfiguration();
        if(is_null($configuration))
        {
            throw new MissingConfigurationException("Configurations have not been loaded in the " . get_class($this));
        }

        /** @var DocHandlerInterface $handler */
        foreach($this->getHandlers() as $handler)
        {
            if($handler instanceof DocHandlerInterface)
            {
                $handler->setDiConfiguration($configuration);
                $handler->integrate();
            }
        }

        $this->sync();
    }


}
