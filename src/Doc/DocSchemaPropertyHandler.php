<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Helper\DocSchemaGetter;
use Boxalino\DataIntegrationDoc\Helper\TypedAttributeTrait;

/**
 * Class DocSchemaPropertyHandler
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
abstract class DocSchemaPropertyHandler implements DocSchemaPropertyHandlerInterface
{

    use TypedAttributeTrait;

    /**
     * @var \ArrayObject
     */
    protected $attributeSchemaDefinitionList;

    /**
     * @var array
     */
    protected $properties = [];

    /**
     * @var \ArrayObject
     */
    protected $attributesList;

    /**
     * @var \ArrayIterator
     */
    protected $instantAttributesList;

    /**
     * @var array
     */
    protected $errors = [];

    /**
     * @var DocSchemaGetter
     */
    protected $schemaGetter;

    public function __construct()
    {
        $this->attributeSchemaDefinitionList = new \ArrayObject();
        $this->instantAttributesList = new \ArrayIterator();
        $this->schemaGetter = new DocSchemaGetter();
    }

    /**
     * @return array
     */
    abstract function getValues() : array;

    /**
     * @return DocSchemaGetter
     */
    public function schemaGetter() : DocSchemaGetter
    {
        if(is_null($this->schemaGetter))
        {
            $this->schemaGetter = new DocSchemaGetter();
        }

        return $this->schemaGetter;
    }

    /**
     * Dynamically configure the attribute schema for every property
     *
     * @param string $attributeName
     * @param string $schema
     * @return DocSchemaPropertyHandlerInterface
     */
    public function addSchemaDefinition(string $attributeName, string $schema) : DocSchemaPropertyHandlerInterface
    {
        try{
            $docSchema = new $schema();
            if ($docSchema instanceof DocPropertiesInterface)
            {
                $this->attributeSchemaDefinitionList->offsetSet($attributeName, $schema);
            }
        } catch (\Throwable $exception)
        {
            //the schema model does not exist
        }

        return $this;
    }

    /**
     * @param string $docAttributeName
     * @return DocPropertiesInterface|null
     */
    public function getAttributeSchema(string $docAttributeName) : ?DocPropertiesInterface
    {
        if ($this->attributeSchemaDefinitionList->offsetExists($docAttributeName))
        {
            $schema = $this->attributeSchemaDefinitionList->offsetGet($docAttributeName);
            return new $schema;
        }

        return null;
    }

    /**
     * @param string $propertyName
     * @param string | null $docAttributeName
     * @return DocSchemaPropertyHandlerInterface
     */
    public function addPropertyNameDocAttributeMapping(string $propertyName, ?string $docAttributeName = null) : DocSchemaPropertyHandlerInterface
    {
        $this->properties[$propertyName] = $docAttributeName ?? $propertyName;
        return $this;
    }

    /**
     * @param string $propertyName
     * @return bool
     */
    public function handlerHasProperty(string $propertyName) : bool
    {
        return isset($this->properties[$propertyName]);
    }

    /**
     * @param string $propertyName
     * @return string|null
     */
    public function getDocPropertyByField(string $propertyName) : ?string
    {
        if(isset($this->properties[$propertyName]))
        {
            $maping = $this->properties[$propertyName];
            if(in_array($maping, $this->getGenericTypedAttributes()))
            {
                return $propertyName;
            }

            return $maping;
        }

        return null;
    }

    /**
     * @param string $propertyName
     * @return DocSchemaPropertyHandlerInterface
     */
    public function allowPropertyOnInstantMode(string $propertyName) : DocSchemaPropertyHandlerInterface
    {
        $this->instantAttributesList->offsetSet($propertyName, true);
        return $this;
    }

    /**
     * @param string $propertyName
     * @return bool
     */
    public function isPropertyAllowedOnInstantMode(string $propertyName) : bool
    {
        if($this->instantAttributesList->offsetExists($propertyName))
        {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function getProperties() : array
    {
        return $this->properties;
    }

    /**
     * @return bool
     */
    public function hasErrors() : bool
    {
        return (bool)count($this->errors);
    }

    /**
     * @param string $error
     * @return void
     */
    public function addError(string $error) : void
    {
        $this->errors[] = $error;
    }

    /**
     * @return string
     */
    public function getErrors() : string
    {
        return json_encode(array_unique($this->errors));
    }


}
