<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration\DocProduct;

use Boxalino\InstantUpdate\Service\Doc\DocProductAttributeTrait;
use Boxalino\InstantUpdate\Service\Doc\Schema\DocSchemaDefinitionInterface;

/**
 * Class Attribute
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class Attribute
{
    use DocProductAttributeTrait;

    /**
     * @var \ArrayObject
     */
    protected $attributeSchemaDefinitionList;

    /**
     * @var array
     */
    protected $properties;

    /**
     * @var \ArrayObject
     */
    protected $attributesList;

    public function __construct()
    {
        $this->attributesList = new \ArrayObject();
    }

    /**
     * Dynamically configure the attribute schema for every property
     *
     * @param string $attributeName
     * @param string $schema
     * @return $this
     */
    public function addSchemaDefinition(string $attributeName, string $schema): self
    {
        $docSchema = new $schema();
        if ($docSchema instanceof DocSchemaDefinitionInterface) {
            $this->attributeSchemaDefinitionList->offsetSet($attributeName, $docSchema);
        }
        return $this;
    }

    /**
     * @param string $attributeName
     * @return DocSchemaDefinitionInterface|null
     */
    public function getAttributeSchema(string $docAttributeName): ?DocSchemaDefinitionInterface
    {
        if ($this->attributeSchemaDefinitionList->offsetExists($docAttributeName)) {
            return $this->attributeSchemaDefinitionList->offsetGet($docAttributeName);
        }

        return null;
    }

    /**
     * @param string $propertyName
     * @param string $docAttributeName
     * @return $this
     */
    public function addPropertyNameDocAttributeMapping(string $propertyName, string $docAttributeName): self
    {
        $this->properties[$propertyName] = $docAttributeName;
        return $this;
    }

    /**
     * @param string $propertyName
     * @return bool
     */
    public function handlerHasProperty(string $propertyName): bool
    {
        return isset($this->properties[$propertyName]);
    }


}
