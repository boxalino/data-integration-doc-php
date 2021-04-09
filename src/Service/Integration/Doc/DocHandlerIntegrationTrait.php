<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaIntegrationTrait;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;

/**
 * Trait DocHandlerIntegrationTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
trait DocHandlerIntegrationTrait
{

    /**
     * @var \ArrayIterator
     */
    protected $propertyHandlerList;

    /**
     * @var null
     */
    protected $docData = null;

    /**
     * @var array
     */
    protected $docs = [];

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ConfigurationDataObject
     */
    protected $diConfiguration;

    /**
     * generic integrate flow
     */
    public function integrate(): void
    {
        $document = $this->getDocContent();
        $this->load($document, $this->getDocType());
    }

    /**
     * @param DocGeneratorInterface $doc
     */
    public function addDocLine(DocGeneratorInterface $doc)
    {
        $this->docs[] = $doc;
    }

    /**
     * @return string | JSONL
     */
    public function getDocContent() : string
    {
        $docs = [];
        /** @var DocGeneratorInterface $doc */
        foreach($this->docs as $doc)
        {
            $docs[] = $doc->jsonSerialize();
        }

        return implode("\n", $docs);
    }

    /**
     * Dynamically configure the attribute handlers for every data type to be retrieved
     * (the handler must have DB access information for the attribute element data)
     *
     * @param DocSchemaPropertyHandlerInterface $propertyHandler
     * @return DocHandlerInterface
     */
    public function addPropertyHandler(DocSchemaPropertyHandlerInterface $propertyHandler) : DocHandlerInterface
    {
        $this->propertyHandlerList->append($propertyHandler);
        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator
    {
        return $this->propertyHandlerList;
    }

    /**
     * Create the content (based on the IDs to be updated)
     *
     * Structure of the array:
     * [product1=>[property1=>property1schema, property2=>property2schema,[..]],..]
     *
     * @return array
     */
    public function generateDocData() : array
    {
        $this->docData = [];
        foreach($this->getHandlers() as $handler)
        {
            if($handler instanceof DocSchemaPropertyHandlerInterface)
            {
                $this->docData = array_merge_recursive($this->docData,  $handler->getValues());
            }
        }

        return $this->docData;
    }

    /**
     * @return array
     */
    public function getDocData() : array
    {
        return $this->docData ?? [];
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return DocHandlerInterface
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject): DocHandlerInterface
    {
        $this->diConfiguration = $configurationDataObject;
        return $this;
    }

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration(): ConfigurationDataObject
    {
        return $this->diConfiguration;
    }


}
