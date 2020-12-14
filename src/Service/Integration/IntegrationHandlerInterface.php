<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

/**
 * Interface IntegrationHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
interface IntegrationHandlerInterface
{

    /**
     * Create list of documents to be exported
     * (doc-type => doc-content - JSONL format)
     * @return \ArrayIterator
     */
    public function getDocs() : \ArrayIterator;

    /**
     * @param \Boxalino\InstantUpdate\Service\Integration\DocHandlerInterface $docHandler
     * @return DocHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface;

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator;

}
