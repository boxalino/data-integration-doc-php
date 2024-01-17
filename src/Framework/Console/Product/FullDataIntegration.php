<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Product;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\FullTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\ProductTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\ProductIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class FullDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:full:product [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class FullDataIntegration extends DiGenericAbstractCommand
{
    use FullTrait;
    use ProductTrait;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        ProductIntegrationHandlerInterface $integrationHandler
    ){
        parent::__construct($logger, $configurationManager);
        $this->integrationHandler = $integrationHandler;
    }

    public function getDescription(): string
    {
        return "Boxalino Full Product Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:full:product';
    }


}
