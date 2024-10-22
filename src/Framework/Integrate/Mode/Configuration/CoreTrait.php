<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\DiConfigurationTrait;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Class CoreTrait
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
trait CoreTrait
{

    use DiConfigurationTrait;

    /**
     * Access configurations for the full
     *
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->getConfigurationManager()->getCoreConfigurations();
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return bool
     */
    public function canRun(ConfigurationDataObject $configurationDataObject): bool
    {
        return $configurationDataObject->getAllowCoreSync();
    }


}
