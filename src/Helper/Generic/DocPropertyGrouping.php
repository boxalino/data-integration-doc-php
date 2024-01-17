<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Helper\Generic;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Helper\TypedAttributeTrait;

/**
 * Grouping of properties for a given doc_X data structure
 * To be used for sync automation logic
 *
 * @package Boxalino\DataIntegrationDoc\Doc
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

    public function getNumericSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_VALUE
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
    public function getSingleValueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_ID,
            DocSchemaInterface::FIELD_TYPE,
            DocSchemaInterface::FIELD_CREATION,
            DocSchemaInterface::FIELD_UPDATE,
            DocSchemaInterface::FIELD_PERSONA_TYPE,
            DocSchemaInterface::FIELD_PERSONA_ID,
            DocSchemaInterface::FIELD_VALUE
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
    public function getMultivalueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_PARENT_CONTENT_IDS,
            DocSchemaInterface::FIELD_PARENT_UGC_IDS,
            DocSchemaInterface::FIELD_STORES,
        ];
    }

    /**
     * @return array
     */
    public function getContentSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_TAGS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_PERIODS
        ];
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
