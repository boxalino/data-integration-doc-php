<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Voucher;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\FullTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\VoucherTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\VoucherIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class FullDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:full:voucher [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class FullDataIntegration extends DiGenericAbstractCommand
{
    use FullTrait;
    use VoucherTrait;

    /**
     * @var VoucherIntegrationHandlerInterface
     */
    protected $integrationHandler;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        VoucherIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Full Voucher Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:full:voucher';
    }


}
