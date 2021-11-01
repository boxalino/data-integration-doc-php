<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Util;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Interface DiIntegrationConfigurationInterface
 *
 * Required inheritance in order to set ids&configuration context
 * Can be joined with the IntegrationDocHandlerTrait
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Util
 */
interface DiIntegrationConfigurationInterface
{
    /**
     * @return ConfigurationDataObject
     */
    public function getSystemConfiguration() : ConfigurationDataObject;

    /**
     * @param ConfigurationDataObject $configuration
     * @return void
     */
    public function setSystemConfiguration(ConfigurationDataObject $configuration) : void;



}
