<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;

/**
 * Interface DocAttributeHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocAttributeHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_attribute";

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addMultivalue(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addIndexed(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addNumeric(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addDatetime(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addLocalized(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addHierarchical(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addSearchBy(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addSearchSuggestion(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addFilterBy(string $propertyName) : DocHandlerInterface;

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addGroupBy(string $propertyName) : DocHandlerInterface;


}
