<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

/**
 * Class DeltaDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:delta:product [account]
 *
 * @package Boxalino\DataIntegration\Service
 */
trait FullTrait
{

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
