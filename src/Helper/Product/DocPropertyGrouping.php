<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Helper\Product;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Helper\TypedAttributeTrait;

/**
 * Class DocPropertyGrouping
 * (replica of DocProductAttributeTrait)
 *
 * Grouping of properties for a given doc_X data structure
 * To be used for sync automation logic
 *
 * @package Boxalino\DataIntegrationDoc\Helper\Product
 */
class DocPropertyGrouping
{

    use TypedAttributeTrait;

    /**
     * @return array
     */
    public function getLocalizedSchemaProperties(): array
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
    public function getSingleValueSchemaTypes() : array
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
    public function getBooleanSchemaTypes() : array
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
    public function getMultivalueSchemaTypes() : array
    {
        return array_merge([
            DocSchemaInterface::FIELD_ATTRIBUTE_VISIBILITY_GROUPING,
            DocSchemaInterface::FIELD_STATUS,
            DocSchemaInterface::FIELD_VISIBILITY,
            DocSchemaInterface::FIELD_CATEGORIES,
            DocSchemaInterface::FIELD_STOCK,
            #DocSchemaInterface::FIELD_STORES,
            #DocSchemaInterface::FIELD_PRICE,
            #DocSchemaInterface::FIELD_PRICING,
            DocSchemaInterface::FIELD_PRODUCT_RELATIONS,
            DocSchemaInterface::FIELD_IMAGES,
            DocSchemaInterface::FIELD_BRANDS,
            DocSchemaInterface::FIELD_SUPPLIERS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_PERIODS
        ], $this->getGenericTypedAttributes());
    }

    /**
     * @return array
     */
    public function getContentSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_CATEGORIES,
            DocSchemaInterface::FIELD_PRODUCT_RELATIONS,
            DocSchemaInterface::FIELD_SUPPLIERS,
            DocSchemaInterface::FIELD_LABELS,
            DocSchemaInterface::FIELD_PERIODS
        ];
    }


}
