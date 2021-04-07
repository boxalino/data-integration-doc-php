<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;

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
