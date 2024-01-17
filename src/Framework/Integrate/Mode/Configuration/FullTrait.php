<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\DiConfigurationTrait;

/**
 * Class DeltaDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:delta:product [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
trait FullTrait
{

    use DiConfigurationTrait;

    /**
     * Access configurations for the full
     *
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->getConfigurationManager()->getFullConfigurations();
    }


}
