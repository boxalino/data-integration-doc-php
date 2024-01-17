<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Helper\Content;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Helper\TypedAttributeTrait;

/**
 * Class DocPropertyGrouping
 * (prior version: DocContentAttributeTrait)
 *
 * Grouping of properties for a given doc_X data structure
 * To be used for sync automation logic
 *
 * @package Boxalino\DataIntegrationDoc\Helper\Content
 */
class DocPropertyGrouping
{

    use TypedAttributeTrait;

    /**
     * @return array
     */
    public function getDatetimeSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_CREATION,
            DocSchemaInterface::FIELD_UPDATE
        ];
    }

    /**
     * @return array
     */
    public function getSingleValueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_ID,
            DocSchemaInterface::FIELD_TYPE,
            DocSchemaInterface::FIELD_CREATION,
            DocSchemaInterface::FIELD_UPDATE,
            DocSchemaInterface::FIELD_PERSONA_TYPE,
            DocSchemaInterface::FIELD_PERSONA_ID
        ];
    }

    /**
     * @return array
     */
    public function getLocalizedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_TITLE,
            DocSchemaInterface::FIELD_DESCRIPTION,
            DocSchemaInterface::FIELD_SHORT_DESCRIPTION,
            DocSchemaInterface::FIELD_LINK
        ];
    }

    /**
     * @return array
     */
    public function getBooleanSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_STATUS
        ];
    }

    /**
     * @return array
     */
    public function getMultivalueSchemaTypes() : array
    {
        return array_merge([
            DocSchemaInterface::FIELD_PARENT_CONTENT_IDS,
            DocSchemaInterface::FIELD_PRODUCTS,
            DocSchemaInterface::FIELD_CONTENTS,
            DocSchemaInterface::FIELD_CUSTOMERS,
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_TAGS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_STORES,
            DocSchemaInterface::FIELD_PERIODS,
        ], $this->getGenericTypedAttributes());
    }

    /**
     * @return array
     */
    public function getContentSchemaTypes() : array
    {
        return array_merge([
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_TAGS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_PERIODS
        ], $this->getRelationSchemaTypes());
    }

    /**
     * @return array
     */
    public function getRelationSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_PRODUCTS,
            DocSchemaInterface::FIELD_CONTENTS,
            DocSchemaInterface::FIELD_CUSTOMERS
        ];
    }


}
