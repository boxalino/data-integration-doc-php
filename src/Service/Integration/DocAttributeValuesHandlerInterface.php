<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Interface DocAttributeValuesHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
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
