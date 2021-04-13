<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

use Boxalino\DataIntegrationDoc\Service\Flow\SyncCheckTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\IntegrationHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\MissingConfigurationException;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\Mode\DocDeltaIntegrationInterface;

/**
 * Interface DeltaIntegrationInterface
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait DeltaIntegrationTrait
{
    use SyncCheckTrait;

    /**
     * @var null
     */
    protected $syncCheck = null;

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return DeltaIntegrationInterface::INTEGRATION_MODE;
    }

    /**
     * delta integration strategy
     */
    public function integrateDelta() : void
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
                if($handler instanceof DocDeltaIntegrationInterface)
                {
                    $handler->setSyncCheck($this->syncCheck());
                }
                $handler->integrate();
            }
        }

        $this->sync();
    }


}
