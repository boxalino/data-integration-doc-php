<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console;

use Boxalino\DataIntegrationDoc\Framework\Integrate\Mode\Configuration\CoreTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\CoreIntegrationHandlerInterface;
use Psr\Log\LoggerInterface;

/**
 * Class CoreDataIntegration
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:core [account]
 *
 * Used to export RAW csv/json data from the db to the T (transform) service
 * It would make the CORE integration with Boxalino as documented
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/928874497/DI-SAAS+ELT+Flow#The-DI-SAAS--CORE-request
 *
 * @package Boxalino\DataIntegrationDoc\Framework
 */
class CoreDataIntegration extends DiGenericAbstractCommand
{
    use CoreTrait;

    public function __construct(
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager,
        CoreIntegrationHandlerInterface $integrationHandler
    ){
        parent::__construct($logger, $configurationManager);
        $this->integrationHandler = $integrationHandler;
    }

    public function getDescription(): string
    {
        return "Boxalino Core Data Integration. Accepts parameters [account]";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'boxalino:di:core';
    }

    
    
}
