<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Interface DocSchemaPropertyHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
interface DocSchemaPropertyHandlerInterface
{
    /**
     * @return array
     */
    public function getValues() : array;

    /**
     * @param string $attributeName
     * @param string $schema
     * @return DocSchemaPropertyHandlerInterface
     */
    public function addSchemaDefinition(string $attributeName, string $schema) : DocSchemaPropertyHandlerInterface;

    /**
     * @param string $docAttributeName
     * @return DocPropertiesInterface|null
     */
    public function getAttributeSchema(string $docAttributeName): ?DocPropertiesInterface;

    /**
     * @param string $propertyName
     * @param string | null $docAttributeName
     * @return DocSchemaPropertyHandlerInterface
     */
    public function addPropertyNameDocAttributeMapping(string $propertyName, ?string $docAttributeName = null): DocSchemaPropertyHandlerInterface;

    /**
     * @param string $propertyName
     * @return bool
     */
    public function handlerHasProperty(string $propertyName): bool;

    /**
     * @param string $propertyName
     * @return bool
     */
    public function isPropertyAllowedOnInstantMode(string $propertyName) : bool;

    /**
     * @param string $propertyName
     * @return DocSchemaPropertyHandlerInterface
     */
    public function allowPropertyOnInstantMode(string $propertyName) : DocSchemaPropertyHandlerInterface;


}
