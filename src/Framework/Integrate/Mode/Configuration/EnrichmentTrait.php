<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\DiConfigurationTrait;

/**
 * Class EnrichmentTrait
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:enrichment:product [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
trait EnrichmentTrait
{

    use DiConfigurationTrait;

    /**
     * Access configurations for the enrichment mode
     *
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->getConfigurationManager()->getFullConfigurations();
    }


}
