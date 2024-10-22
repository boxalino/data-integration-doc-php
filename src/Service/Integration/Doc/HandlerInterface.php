<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;

/**
 * Interface DocHandlerInterface
 * Implement for structures handling the content of each doc_X type
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface HandlerInterface
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
     * Load the doc content to the Boxalino Data Integration ecosystem
     * Depending on the document type and mode - the load strategy might differ
     */
    public function integrate() : void;

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return DocHandlerInterface
     */
    public function setDiConfiguration(ConfigurationDataObject $configurationDataObject) : HandlerInterface;

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



}
