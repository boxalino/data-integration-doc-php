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
trait DeltaTrait
{

    use DiConfigurationTrait;

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
