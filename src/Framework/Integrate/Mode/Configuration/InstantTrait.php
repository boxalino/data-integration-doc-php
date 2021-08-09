<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

/**
 * Class InstantTrait
 *
 * @package Boxalino\DataIntegration\Service
 */
trait InstantTrait
{

    /**
     * Access configurations for the instant update process
     *
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->getConfigurationManager()->getInstantUpdateConfigurations();
    }


}
