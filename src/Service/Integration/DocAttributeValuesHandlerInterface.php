<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Interface DocAttributeValuesHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocAttributeValuesHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_attribute_values";

    /**
     * @param AttributeHandlerInterface $attributeHandler
     * @return DocHandlerInterface
     */
    public function addHandler(AttributeHandlerInterface $handler) : DocHandlerInterface;

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator;

}
