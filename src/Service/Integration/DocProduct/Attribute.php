<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\DocProduct;

use Boxalino\DataIntegrationDoc\Service\Doc\DocProductAttributeTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\DocSchemaDefinitionInterface;

/**
 * Class Attribute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class Attribute implements AttributeHandlerInterface
{
    use DocProductAttributeTrait;

    public const DI_ID_FIELD = 'instant_update_id';

    public const DI_PARENT_ID_FIELD = 'doc_parent';

    public const DI_DOC_TYPE_FIELD = 'doc_type';

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

    public function __construct()
    {
        $this->attributeSchemaDefinitionList = new \ArrayObject();
    }

    /**
     * @TODO: Implement getValues() method.
     * @return array
     */
    public function getValues(): array
    {
        return [];
    }

    /**
     * Dynamically configure the attribute schema for every property
     *
     * @param string $attributeName
     * @param string $schema
     * @return AttributeHandlerInterface
     */
    public function addSchemaDefinition(string $attributeName, string $schema) : AttributeHandlerInterface
    {
        try{
            $docSchema = new $schema();
            if ($docSchema instanceof DocSchemaDefinitionInterface) {
                $this->attributeSchemaDefinitionList->offsetSet($attributeName, $schema);
            }
        } catch (\Throwable $exception)
        {
            //the schema model does not exist
        }

        return $this;
    }

    /**
     * @param string $attributeName
     * @return DocSchemaDefinitionInterface|null
     */
    public function getAttributeSchema(string $docAttributeName) : ?DocSchemaDefinitionInterface
    {
        if ($this->attributeSchemaDefinitionList->offsetExists($docAttributeName)) {
            $schema = $this->attributeSchemaDefinitionList->offsetGet($docAttributeName);
            return new $schema;
        }

        return null;
    }

    /**
     * @param string $propertyName
     * @param string | null $docAttributeName
     * @return AttributeHandlerInterface
     */
    public function addPropertyNameDocAttributeMapping(string $propertyName, ?string $docAttributeName = null) : AttributeHandlerInterface
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
     * @return array
     */
    public function getProperties() : array
    {
        return $this->properties;
    }

    /**
     * @return array
     */
    public function getDocSchemaAttributes() : array
    {
        return array_values($this->getProperties());
    }

}
