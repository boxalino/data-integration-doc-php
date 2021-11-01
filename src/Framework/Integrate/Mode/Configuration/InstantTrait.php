<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\DiConfigurationTrait;

/**
 * Class InstantTrait
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
trait InstantTrait
{

    use DiConfigurationTrait;

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
