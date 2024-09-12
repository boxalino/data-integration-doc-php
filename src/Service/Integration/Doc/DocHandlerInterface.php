<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;

/**
 * Interface DocHandlerInterface
 * Implement for structures handling the content of each doc_X type
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocHandlerInterface
{

    /**
     * Doc type for export (ex: doc_product, doc_user, doc_X)
     * Matches the "doc" property for the POST request
     *
     * @return string
     */
    public function getDocType() : string;

    /**
     * Get document content as it is meant to be exported
     * JSONL format https://jsonlines.org/
     *
     * @return string
     */
    public function getDocContent() : string;

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

    /**
     * Load the doc content to the Boxalino Data Integration ecosystem
     * Depending on the document type and mode - the load strategy might differ
     */
    public function integrate() : void;

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return DocHandlerInterface
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject) : DocHandlerInterface;

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration() : ConfigurationDataObject;

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface;

    /**
     * @param LoggerInterface $logger
     * @return void
     */
    public function setLogger(LoggerInterface $logger) : void;

    /**
     * @return array
     */
    public function getErrors() : array;


}
