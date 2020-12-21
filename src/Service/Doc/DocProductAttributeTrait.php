<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Trait DocProductAttributeTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
trait DocProductAttributeTrait
{

    /**
     * @return array
     */
    public function getLocalizedSchemaProperties(): array
    {
        return [
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STATUS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_TITLE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DESCRIPTION,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SHORT_DESCRIPTION,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_LINK,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_LABELS,
        ];
    }

    /**
     * @return array
     */
    public function getTypedSchemaProperties(): array
    {
        return [
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STRING,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_NUMERIC,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DATETIME,
        ];
    }

    /**
     * @return array
     */
    public function getTypedLocalizedSchemaProperties(): array
    {
        return [
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STRING_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_NUMERIC_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DATETIME_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_BRANDS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SUPPLIERS,
        ];
    }

    /**
     * @return array
     */
    public function getSingleValueSchemaTypes() : array
    {
        return [
            AttributeHandlerInterface::ATTRIBUTE_TYPE_INTERNAL_ID,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_EXTERNAL_ID,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SKU,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_CREATION,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_UPDATE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_LABEL,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_NEW,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SALE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_EAN,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_TYPE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_INDIVIDUALLY_VISIBLE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SHOW_OUT_OF_STOCK
        ];
    }

    /**
     * @return array
     */
    public function getMultivalueSchemaTypes() : array
    {
        return [
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STATUS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_VISIBILITY,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_CATEGORIES,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_TITLE,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DESCRIPTION,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SHORT_DESCRIPTION,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STOCK,
            #AttributeHandlerInterface::ATTRIBUTE_TYPE_STORES,
            #AttributeHandlerInterface::ATTRIBUTE_TYPE_PRICE,
            #AttributeHandlerInterface::ATTRIBUTE_TYPE_PRICING,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STRING,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_STRING_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_NUMERIC,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_NUMERIC_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DATETIME,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_DATETIME_LOCALIZED,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_PRODUCT_RELATIONS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_IMAGES,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_LINK,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_BRANDS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_SUPPLIERS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_LABELS,
            AttributeHandlerInterface::ATTRIBUTE_TYPE_PERIODS
        ];
    }

}
