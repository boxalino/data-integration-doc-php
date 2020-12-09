<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration\DocProduct;

use Boxalino\InstantUpdate\Service\Doc\Schema\DocSchemaDefinitionInterface;

/**
 * Interface AttributeHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
interface AttributeHandlerInterface
{

    /**
     * essential attributes
     */
    public const ATTRIBUTE_TYPE_INTERNAL_ID = "internal_id";
    public const ATTRIBUTE_TYPE_SKU = "sku";
    public const ATTRIBUTE_TYPE_VISIBILITY = "visibility";
    public const ATTRIBUTE_TYPE_CREATION = "creation";
    public const ATTRIBUTE_TYPE_UPDATE = "last_update";
    public const ATTRIBUTE_TYPE_CATEGORIES = "categories";
    public const ATTRIBUTE_TYPE_TITLE = "title";
    public const ATTRIBUTE_TYPE_STATUS = "status";
    public const ATTRIBUTE_TYPE_STOCK = "stock";
    public const ATTRIBUTE_TYPE_STORES = "stores";
    public const ATTRIBUTE_TYPE_PRICE = "price";

    /**
     * product attributes
     */
    public const ATTRIBUTE_TYPE_EXTERNAL_ID = "external_id";
    public const ATTRIBUTE_TYPE_PRICING = "pricing";
    public const ATTRIBUTE_TYPE_NEW = "is_new";
    public const ATTRIBUTE_TYPE_SALE = "in_sales";
    public const ATTRIBUTE_TYPE_INDIVIDUALLY_VISIBLE = "individually_visible";
    public const ATTRIBUTE_TYPE_SHOW_OUT_OF_STOCK = "show_out_of_stock";
    public const ATTRIBUTE_TYPE_STRING = "string_attributes";
    public const ATTRIBUTE_TYPE_STRING_LOCALIZED = "string_localized_attributes";
    public const ATTRIBUTE_TYPE_NUMERIC = "numeric_attributes";
    public const ATTRIBUTE_TYPE_NUMERIC_LOCALIZED = "numeric_localized_attributes";
    public const ATTRIBUTE_TYPE_DATETIME = "datetime_attributes";
    public const ATTRIBUTE_TYPE_DATETIME_LOCALIZED = "datetime_localized_attributes";
    public const ATTRIBUTE_TYPE_DESCRIPTION = "description";
    public const ATTRIBUTE_TYPE_SHORT_DESCRIPTION = "short_description";
    public const ATTRIBUTE_TYPE_PRODUCT_RELATIONS = "product_relations";
    public const ATTRIBUTE_TYPE_LABEL = "label";
    public const ATTRIBUTE_TYPE_IMAGES = "images";
    public const ATTRIBUTE_TYPE_LINK = "link";
    public const ATTRIBUTE_TYPE_BRANDS = "brands";
    public const ATTRIBUTE_TYPE_SUPPLIERS = "suppliers";
    public const ATTRIBUTE_TYPE_LABELS = "labels";
    public const ATTRIBUTE_TYPE_PERIODS = "periods";
    public const ATTRIBUTE_TYPE_EAN = "ean";
    public const ATTRIBUTE_TYPE_TYPE = "type";

    /**
     * @return array
     */
    public function getValues() : array;

    /**
     * @param string $attributeName
     * @param string $schema
     * @return AttributeHandlerInterface
     */
    public function addSchemaDefinition(string $attributeName, string $schema) : AttributeHandlerInterface;

    /**
     * @param string $docAttributeName
     * @return DocSchemaDefinitionInterface|null
     */
    public function getAttributeSchema(string $docAttributeName): ?DocSchemaDefinitionInterface;

    /**
     * @param string $propertyName
     * @param string | null $docAttributeName
     * @return AttributeHandlerInterface
     */
    public function addPropertyNameDocAttributeMapping(string $propertyName, ?string $docAttributeName): AttributeHandlerInterface;

    /**
     * @param string $propertyName
     * @return bool
     */
    public function handlerHasProperty(string $propertyName): bool;

    /**
     * @return array
     */
    public function getDocSchemaAttributes() : array;


}
