<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Flow\SyncTrait;
use Boxalino\DataIntegrationDoc\Service\GcpClientInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\User\Doc;
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
    public function integrate(): void
    {
        $configuration = $this->getDiConfiguration();
        if(is_null($configuration))
        {
            throw new MissingConfigurationException("Configurations have not been loaded in the " . get_class($this));
        }

        /** @var DocHandlerInterface $handler */
        foreach($this->getHandlers() as $handler)
        {
            if($handler instanceof DocHandlerInterface)
            {
                $handler->setDiConfiguration($configuration);
                $handler->integrate();
            }
        }

        $this->sync();
    }

    /**
     * Set the initialization of the integration scope
     * Add the scope to the configured handlers
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @return IntegrationHandlerInterface
     */
    public function addConfigurationScope(ConfigurationDataObject $configurationDataObject): IntegrationHandlerInterface
    {
        $configurationDataObject->setType($this->getIntegrationType());
        $configurationDataObject->setMode($this->getIntegrationMode());
        $configurationDataObject->setTm($this->getTm());
        $configurationDataObject->setTs($this->getTs());

        $this->diConfiguration = $configurationDataObject;

        return $this;
    }

    /**
     * @return \ArrayIterator
     */
   public function getDocs() : \ArrayIterator
   {
       $docs = new \ArrayIterator();

       /** @var DocHandlerInterface $handler */
       foreach($this->getHandlers() as $handler)
       {
           $docs->offsetSet($handler->getDocType(), $handler->getDocContent());
       }

       return $docs;
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
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration() : ConfigurationDataObject
    {
        return $this->diConfiguration;
    }


}
