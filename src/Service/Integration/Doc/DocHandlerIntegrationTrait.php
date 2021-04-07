<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaIntegrationTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
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
        if(is_null($this->docData))
        {
            $data = [];
            foreach($this->getHandlers() as $handler)
            {
                if($handler instanceof DocSchemaPropertyHandlerInterface)
                {
                    $data = array_merge_recursive($data, $handler->getValues());
                }
            }

            $this->docData = $data;
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
