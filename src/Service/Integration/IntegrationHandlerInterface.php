<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\GcpClientInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;

/**
 * Interface IntegrationHandlerInterface
 * Integration per strategy: product, user, content, etc
 * For ex: in the case of prodyct data integration - more doc types are required
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface IntegrationHandlerInterface
{

    /**
     * Create list of documents to be exported
     * (doc-type => doc-content - JSONL format)
     *
     * @return \ArrayIterator
     */
    public function getDocs() : \ArrayIterator;

    /**
     * Handlers are managing the export of every DOC structure, as documented
     * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280881/Data+Structure
     *
     * @param DocHandlerInterface $docHandler
     * @return DocHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface;

    /**
     * @return \ArrayObject
     */
    public function getHandlers() : \ArrayObject;

    /**
     * Describe the integration type (product, user, order, etc)
     *
     * @return string
     */
    public function getIntegrationType() : string;

    /**
     * Describe the integration strategy (product, user, order, etc)
     *
     * @return string
     */
    public function getIntegrationStrategy() : string;

}
