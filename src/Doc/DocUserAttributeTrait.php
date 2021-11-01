<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;

/**
 * Trait DocUserAttributeTrait
 *
 * Grouping of properties for a given doc_X data structure
 * To be used for sync automation logic
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocUserAttributeTrait
{
    public function getUserNumericSchemaTypes() : array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getUserBooleanSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_VAT_IS_VALID,
            DocSchemaInterface::FIELD_VAT_REQUEST_SUCCESS
        ];
    }

    /**
     * @return array
     */
    public function getUserMultivalueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_CHILDREN_IDS,
            DocSchemaInterface::FIELD_CUSTOMER_GROUPS,
            DocSchemaInterface::FIELD_STORES,
            DocSchemaInterface::FIELD_WEBSITES,
            DocSchemaInterface::FIELD_SUBSCRIPTIONS,
            DocSchemaInterface::FIELD_NOTIFICATIONS,
            DocSchemaInterface::FIELD_VOUCHER_STATES,
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
        ];
    }

}
