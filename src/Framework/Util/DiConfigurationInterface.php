<?php
namespace Boxalino\DataIntegrationDoc\Framework\Util;

/**
 * Interface DiConfigurationInterface
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Util
 */
interface DiConfigurationInterface
{

    /** @var string key for the configuration access */
    public CONST BOXALINO_CONFIG_KEY = "BoxalinoDataIntegration";

    /**
     * @return array
     */
    public function getInstantUpdateConfigurations() : array;

    /**
     * @return array
     */
    public function getFullConfigurations() : array;

    /**
     * @return array
     */
    public function getDeltaConfigurations() : array;


}
