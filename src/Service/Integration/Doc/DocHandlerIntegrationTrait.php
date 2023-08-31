<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Flow\DiLogTrait;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Trait DocHandlerIntegrationTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
trait DocHandlerIntegrationTrait
{
    use DiLogTrait;

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
     * @var array
     */
    protected $errors = [];

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
     * @return string JSONL format
     */
    public function getDocContent() : string
    {
        $docs = [];
        /** @var DocGeneratorInterface $doc */
        foreach($this->getDocs() as $doc)
        {
            $docs[] = $doc->jsonSerialize();
        }

        $this->resetDocs();

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

        $this->logTime("start" . __FUNCTION__);
        foreach($this->getHandlers() as $handler)
        {
            $this->logMemory(get_class($handler));
            $this->logTime("startTimeHandler");

            if($handler instanceof DocSchemaPropertyHandlerInterface)
            {
                $this->docData = array_merge_recursive($this->docData, $handler->getValues());
                try{
                    if($handler->hasErrors())
                    {
                        $this->errors[implode("-", array_slice(explode('\\', get_class($handler)), -3, 3))] = $handler->getErrors();
                        $this->logWarning("Errors found: " . $handler->getErrors());
                    }
                } catch (\Throwable $exception) {}
            }

            $this->logTime("endTimeHandler");
            $this->logMemory(get_class($handler), false);
            $this->logMessage(get_class($handler), "endTimeHandler", "startTimeHandler");
        }

        $this->logTime("end" . __FUNCTION__);
        $this->logMessage(__FUNCTION__, "end" . __FUNCTION__, "start" . __FUNCTION__);

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
     * @param ConfigurationDataObject $configurationDataObject
     * @return DocHandlerInterface
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject): DocHandlerInterface
    {
        $this->diConfiguration = $configurationDataObject;
        return $this;
    }

    /**
     * @return array
     */
    public function getDocs() : array
    {
        return $this->docs;
    }

    /**
     * Reset doc lines
     * (required for object reusability)
     */
    public function resetDocs()  : void
    {
        $this->docs = [];
    }

    /**
     * Reset doc data (generated)
     */
    public function resetDocData()  : void
    {
        $this->docData = null;
    }

    /**
     * @return DocGeneratorInterface|null
     */
    public function getLastDoc() : ?DocGeneratorInterface
    {
        if(empty($this->docs))
        {
            return null;
        }

        return end($this->docs);
    }

    /**
     * @return array
     */
    public function getErrors() : array
    {
        return $this->errors;
    }

}
