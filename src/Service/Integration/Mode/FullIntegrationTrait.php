<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\MissingConfigurationException;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait FullIntegrationTrait
{

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return FullIntegrationInterface::INTEGRATION_MODE;
    }

    /**
     * Integration flow for the full mode
     */
    public function integrateFull(): void
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

        //$this->sync();
    }


}
