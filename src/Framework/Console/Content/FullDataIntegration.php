<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\Content;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\FullTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\ContentTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\ContentIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class FullDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:full:content [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class FullDataIntegration extends DiGenericAbstractCommand
{
    use FullTrait;
    use ContentTrait;

    /**
     * @var ContentIntegrationHandlerInterface
     */
    protected $integrationHandler;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        ContentIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Full Content Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:full:content';
    }


}
