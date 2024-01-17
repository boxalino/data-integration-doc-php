<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console\UserGeneratedContent;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\DeltaTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\Type\UserGeneratedContentTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\UserGeneratedContentDeltaIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Framework\Console\DiGenericAbstractCommand;

/**
 * Class DeltaDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:delta:user_generated_content [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class DeltaDataIntegration extends DiGenericAbstractCommand
{
    use DeltaTrait;
    use UserGeneratedContentTrait;

    /**
     * @var UserGeneratedContentDeltaIntegrationHandlerInterface
     */
    protected $integrationHandler;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        UserGeneratedContentDeltaIntegrationHandlerInterface $integrationHandler
    ){
        $this->integrationHandler = $integrationHandler;

        parent::__construct($logger, $configurationManager);
    }

    public function getDescription(): string
    {
        return "Boxalino Delta User Generated Content Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:delta:user_generated_content';
    }


}
