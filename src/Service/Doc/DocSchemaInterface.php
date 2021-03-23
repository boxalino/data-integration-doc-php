<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc;

/**
 * Interface DocSchemaInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
interface DocSchemaInterface
{

    public const DI_ID_FIELD = 'di_id';
    public const DI_PARENT_ID_FIELD = 'doc_parent';
    public const DI_DOC_TYPE_FIELD = 'doc_type';

    /**
     * common properties
     */
    public const FIELD_INTERNAL_ID="internal_id";
    public const FIELD_EXTERNAL_ID="external_id";
    public const FIELD_TITLE = "title";
    public const FIELD_STORES = "stores";
    public const FIELD_FORMAT = "format";
    public const FIELD_STATUS = "status";
    public const FIELD_PERIODS = "periods";
    public const FIELD_VISIBILITY = "visibility";

    /**
     * essential properties
     */
    public const FIELD_ATTRIBUTE_NAME = "attribute_name";
    public const FIELD_NUMERICAL = "numerical";
    public const FIELD_VALUE_ID = "value_id";
    public const FIELD_VALUE_LABEL = "value_label";
    public const FIELD_PARENT_VALUE_IDS = "parent_value_ids";
    public const FIELD_PRODUCTS = "products";
    public const FIELD_SHORT_DESCRIPTION = "short_description";
    public const FIELD_DESCRIPTION = "description";
    public const FIELD_IMAGES = "images";
    public const FIELD_LINK = "link";
    public const FIELD_TAGS = "tags";
    public const FIELD_LABELS = "labels";
    public const FIELD_LABEL = "label";
    public const FIELD_PRICING = "pricing";

    /**
     * doc_attribute properties
     */
    public const FIELD_NAME = "name";
    public const FIELD_ATTRIBUTE_GROUP="attribute_group";
    public const FIELD_ATTRIBUTE_SUB_GROUP="attribute_sub_group";
    public const FIELD_LOCALIZED = "localized";
    public const FIELD_DATA_TYPES = "data_types";
    public const FIELD_MULTI_VALUE = "multi_value";
    public const FIELD_HIERARCHICAL = "hierarchical";
    public const FIELD_SEARCH_BY = "search_by";
    public const FIELD_SEARCH_SUGGESTION = "search_suggestion";
    public const FIELD_FILTER_BY = "filter_by";
    public const FIELD_GROUP_BY = "group_by";
    public const FIELD_INDEXED = "indexed";

    /**
     * product attributes
     */
    public const FIELD_NEW = "is_new";
    public const FIELD_SALE = "in_sales";
    public const FIELD_INDIVIDUALLY_VISIBLE = "individually_visible";
    public const FIELD_SHOW_OUT_OF_STOCK = "show_out_of_stock";
    public const FIELD_PRODUCT_RELATIONS = "product_relations";
    public const FIELD_BRANDS = "brands";
    public const FIELD_SUPPLIERS = "suppliers";
    public const FIELD_EAN = "ean";
    public const FIELD_TYPE = "type";
    public const FIELD_SKU = "sku";
    public const FIELD_CREATION = "creation";
    public const FIELD_UPDATE = "last_update";
    public const FIELD_CATEGORIES = "categories";
    public const FIELD_STOCK = "stock";
    public const FIELD_PRICE = "price";

    /**
     * generic properties in schema
     */
    public const FIELD_STRING = "string_attributes";
    public const FIELD_STRING_LOCALIZED = "localized_string_attributes";
    public const FIELD_NUMERIC = "numeric_attributes";
    public const FIELD_NUMERIC_LOCALIZED = "localized_numeric_attributes";
    public const FIELD_DATETIME = "datetime_attributes";
    public const FIELD_DATETIME_LOCALIZED = "localized_datetime_attributes";


}
