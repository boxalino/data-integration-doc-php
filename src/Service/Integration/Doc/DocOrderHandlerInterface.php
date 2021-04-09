<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;

/**
 * Interface DocOrderHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocOrderHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_order";

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
