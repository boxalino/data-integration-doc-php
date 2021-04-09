<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;

/**
 * Interface DocAttributeValuesHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocAttributeValuesHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_attribute_value";

    /**
     * @param DocPropertiesInterface $attributeHandler
     * @return DocHandlerInterface
     */
    public function addPropertyHandler(DocSchemaPropertyHandlerInterface $handler) : DocHandlerInterface;

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator;

}
