<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Content;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\DeltaTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\ContentTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\ContentDeltaIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class DeltaDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:delta:content [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class DeltaDataIntegration extends DiGenericAbstractCommand
{
    use DeltaTrait;
    use ContentTrait;

    /**
     * @var ContentDeltaIntegrationHandlerInterface
     */
    protected $integrationHandler;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        ContentDeltaIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Delta Content Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:delta:content';
    }


}
