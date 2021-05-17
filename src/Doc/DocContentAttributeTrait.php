<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;

/**
 * Trait DocContentAttributeTrait
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocContentAttributeTrait
{

    /**
     * @return array
     */
    public function getContentSingleValueSchemaTypes() : array
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
    public function getContentLocalizedSchemaProperties(): array
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
    public function getContentBooleanSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_STATUS
        ];
    }

    /**
     * @return array
     */
    public function getContentMultivalueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_PARENT_CONTENT_IDS,
            DocSchemaInterface::FIELD_PRODUCTS,
            DocSchemaInterface::FIELD_CONTENTS,
            DocSchemaInterface::FIELD_CUSTOMERS,
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_TAGS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_STORES,
            DocSchemaInterface::FIELD_PERIODS,
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED
        ];
    }

}
