<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Product;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\InstantTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\ProductTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\ProductInstantIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class InstantDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:instant:product [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class InstantDataIntegration extends DiGenericAbstractCommand
{
    use InstantTrait;
    use ProductTrait;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        ProductInstantIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Instant Product Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:instant:product';
    }


}
