<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\MissingConfigurationException;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode\DocInstantIntegrationInterface;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait InstantIntegrationTrait
{

    /**
     * @var array
     */
    protected $ids = [];

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return InstantIntegrationInterface::INTEGRATION_MODE;
    }

    public function integrateInstant() : void
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
                if($handler instanceof DocInstantIntegrationInterface)
                {
                    if($handler->hasModeEnabled())
                    {
                        $handler->setDiConfiguration($configuration);
                        $handler->setIds($this->getIds());
                        $handler->integrate();
                    }
                }
            }
        }

        $this->sync();
    }

    /**
     * @return array
     */
    public function getIds(): array
    {
        return $this->ids;
    }

    /**
     * @param array $ids
     * @return InstantIntegrationInterface
     */
    public function setIds(array $ids): InstantIntegrationInterface
    {
        $this->ids = $ids;
        return $this;
    }


}
