<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;

/**
 * Trait DocProductAttributeTrait
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocProductAttributeTrait
{

    /**
     * @return array
     */
    public function getGenericAttributeGrouping() : array
    {
        return [
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
        ];
    }

    /**
     * @return array
     */
    public function getProductLocalizedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_STATUS,
            DocSchemaInterface::FIELD_TITLE,
            DocSchemaInterface::FIELD_DESCRIPTION,
            DocSchemaInterface::FIELD_SHORT_DESCRIPTION,
            DocSchemaInterface::FIELD_LINK,
            DocSchemaInterface::FIELD_LABELS,
        ];
    }

    /**
     * @return array
     */
    public function getTypedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_DATETIME,
        ];
    }

    /**
     * @return array
     */
    public function getTypedLocalizedSchemaProperties(): array
    {
        return [
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
            DocSchemaInterface::FIELD_BRANDS,
            DocSchemaInterface::FIELD_SUPPLIERS,
        ];
    }

    /**
     * @return array
     */
    public function getProductSingleValueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_INTERNAL_ID,
            DocSchemaInterface::FIELD_EXTERNAL_ID,
            DocSchemaInterface::FIELD_SKU,
            DocSchemaInterface::FIELD_CREATION,
            DocSchemaInterface::FIELD_UPDATE,
            DocSchemaInterface::FIELD_LABEL,
            DocSchemaInterface::FIELD_EAN,
            DocSchemaInterface::FIELD_TYPE,
            DocSchemaInterface::FIELD_TITLE,
            DocSchemaInterface::FIELD_DESCRIPTION,
            DocSchemaInterface::FIELD_SHORT_DESCRIPTION,
            DocSchemaInterface::FIELD_LINK
        ];
    }

    /**
     * @return array
     */
    public function getProductBooleanSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_NEW,
            DocSchemaInterface::FIELD_SALE,
            DocSchemaInterface::FIELD_INDIVIDUALLY_VISIBLE,
            DocSchemaInterface::FIELD_SHOW_OUT_OF_STOCK
        ];
    }

    /**
     * @return array
     */
    public function getProductMultivalueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_STATUS,
            DocSchemaInterface::FIELD_VISIBILITY,
            DocSchemaInterface::FIELD_CATEGORIES,
            DocSchemaInterface::FIELD_STOCK,
            #DocSchemaInterface::FIELD_STORES,
            #DocSchemaInterface::FIELD_PRICE,
            #DocSchemaInterface::FIELD_PRICING,
            DocSchemaInterface::FIELD_STRING,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
            DocSchemaInterface::FIELD_PRODUCT_RELATIONS,
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_BRANDS,
            DocSchemaInterface::FIELD_SUPPLIERS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_PERIODS
        ];
    }

}
