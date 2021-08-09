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
trait DeltaTrait
{

    /**
     * Read Configurations for delta
     *
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->getConfigurationManager()->getDeltaConfigurations();
    }


}
