<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Flow\SyncTrait;
use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;
use Boxalino\DataIntegrationDoc\Generator\User\Doc;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Class IntegrationHandler
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
abstract class IntegrationHandler implements IntegrationHandlerInterface
{
    use SyncTrait;

    /**
     * @var \ArrayObject
     */
    protected $docHandlerList;

    /**
     * @var ConfigurationDataObject
     */
    protected $diConfiguration = null;

    public function __construct()
    {
        $this->docHandlerList = new \ArrayObject();
    }

    abstract function getIntegrationMode(): string;

    abstract function getIntegrationType(): string;

    /**
     * Integrate every handler (export content to the endpoint, based on the handler`s strategy)
     * Make the sync request to commit to content processing
     */
    abstract function integrate() : void;

    /**
     * Set the initialization of the integration scope
     * Add the scope to the configured handlers
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @return IntegrationHandlerInterface
     */
    public function manageConfiguration(ConfigurationDataObject $configurationDataObject): IntegrationHandlerInterface
    {
        $configurationDataObject->setType($this->getIntegrationType());
        $configurationDataObject->setMode($this->getIntegrationMode());
        $configurationDataObject->setTm($this->getTm());
        $configurationDataObject->setTs($this->getTs());

        $this->setDiConfiguration($configurationDataObject);

        return $this;
    }

    /**
     * Dynamically configure the document handlers for every doc type to be exported
     *
     * @param DocHandlerInterface $docHandler
     * @return IntegrationHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface
    {
        $this->docHandlerList->append($docHandler);
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getHandlers(): \ArrayObject
    {
        return $this->docHandlerList;
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject)
    {
        $this->diConfiguration = $configurationDataObject;
    }

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration() : ConfigurationDataObject
    {
        return $this->diConfiguration;
    }


}
