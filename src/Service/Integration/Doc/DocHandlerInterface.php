<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;

/**
 * Interface DocHandlerInterface
 * Implement for structures handling the content of each doc_X type
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocHandlerInterface extends HandlerInterface
{

    /**
     * Add a new doc line (with the matching schema) to the doc
     *
     * @param DocGeneratorInterface $doc
     */
    public function addDocLine(DocGeneratorInterface $doc);

    /**
     * Get the doc generator object for the type
     *
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface;

    /**
     * Adding a property integration handler, to map the documented schema for the attribute
     * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types
     *
     * @param DocSchemaPropertyHandlerInterface $propertyHandler
     * @return DocHandlerInterface
     */
    public function addPropertyHandler(DocSchemaPropertyHandlerInterface $propertyHandler) : DocHandlerInterface;

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator;



}
