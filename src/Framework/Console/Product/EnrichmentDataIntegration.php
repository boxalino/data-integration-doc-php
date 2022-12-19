<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Product;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\EnrichmentTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\ProductTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\ProductDeltaIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class EnrichmentDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:enrichment:product [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class EnrichmentDataIntegration extends DiGenericAbstractCommand
{
    use EnrichmentTrait;
    use ProductTrait;

    /**
     * @var ProductDeltaIntegrationHandlerInterface
     */
    protected $integrationHandler;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        ProductDeltaIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Enrichment Product Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:enrichment:product';
    }


}
