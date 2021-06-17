<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Interface DocSchemaInterface
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
interface DocSchemaInterface
{

    public const DI_ID_FIELD = 'di_id';
    public const DI_PARENT_ID_FIELD = 'doc_parent';
    public const DI_DOC_TYPE_FIELD = 'doc_type';
    public const DI_AS_VARIANT = 'di_as_variant';

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
    public const FIELD_PERSONA_TYPE="persona_type";
    public const FIELD_PERSONA_ID="persona_id";

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
    public const FIELD_CATEGORY_ID= "category_id";
    public const FIELD_STOCK = "stock";
    public const FIELD_PRICE = "price";
    public const FIELD_ATTRIBUTE_VISIBILITY_GROUPING = "attribute_visibility_grouping";

    /**
     * generic properties in schema
     */
    public const FIELD_STRING = "string_attributes";
    public const FIELD_STRING_LOCALIZED = "localized_string_attributes";
    public const FIELD_NUMERIC = "numeric_attributes";
    public const FIELD_NUMERIC_LOCALIZED = "localized_numeric_attributes";
    public const FIELD_DATETIME = "datetime_attributes";
    public const FIELD_DATETIME_LOCALIZED = "localized_datetime_attributes";


    /**
     * order properties
     */
    public const FIELD_PARENT_ORDER_ID="parent_order_id";
    public const FIELD_STORE="store";
    public const FIELD_SELLER_PERSONA_TYPE="seller_persona_type";
    public const FIELD_SELLER_PERSONA_ID="seller_persona_id";
    public const FIELD_CURRENCY_CD="currency_cd";
    public const FIELD_TOTAL_CRNCY_AMT="total_crncy_amt";
    public const FIELD_TOTAL_CRNCY_AMT_NET="total_crncy_amt_net";
    public const FIELD_TOTAL_GROSS_MARGIN_CRNCY_AMT="total_gross_margin_crncy_amt";
    public const FIELD_TOTAL_NET_MARGIN_CRNCY_AMT="total_net_margin_crncy_amt";
    public const FIELD_SHIPPING_COSTS_NET="shipping_costs_net";
    public const FIELD_SHIPPING_COSTS="shipping_costs";
    public const FIELD_CURRENCY_FACTOR="currency_factor";
    public const FIELD_TAX_FREE="tax_free";
    public const FIELD_TAX_RATE="tax_rate";
    public const FIELD_TAX_AMNT="tax_amnt";
    public const FIELD_PAYMENT_METHOD="payment_method";
    public const FIELD_SHIPPING_METHOD="shipping_method";
    public const FIELD_SHIPPING_DESCRIPTION="shipping_description";
    public const FIELD_DEVICE="device";
    public const FIELD_REFERER="referer";
    public const FIELD_PARTNER="partner";
    public const FIELD_LANGUAGE="language";
    public const FIELD_TRACKING_CODE="tracking_code";
    public const FIELD_IS_GIFT="is_gift";
    public const FIELD_WRAPPING="wrapping";
    public const FIELD_EMAIL="email";
    public const FIELD_COMMENTS="comments";
    public const FIELD_INTERNAL_COMMENTS="internal_comments";
    public const FIELD_CUSTOMER_COMMENTS="customer_comments";
    public const FIELD_CONTACTS="contacts";
    public const FIELD_CONFIRMATION="confirmation";
    public const FIELD_CLEARED="cleared";
    public const FIELD_SENT="sent";
    public const FIELD_RECEIVED="received";
    public const FIELD_RETURNED="returned";
    public const FIELD_REPAIRED="repaired";
    public const FIELD_STATUS_CODE="status_code";
    public const FIELD_VOUCHERS="vouchers";

    /** user properties */
    public const FIELD_PREFIX="prefix";
    public const FIELD_FIRSTNAME="firstname";
    public const FIELD_LASTNAME="lastname";
    public const FIELD_MIDDLENAME="middlename";
    public const FIELD_SUFFIX="suffix";
    public const FIELD_GENDER="gender";
    public const FIELD_DATE_OF_BIRTH="date_of_birth";
    public const FIELD_ACCOUNT_CREATION="account_creation";
    public const FIELD_AUTO_GROUP="auto_group";
    public const FIELD_INVOICE_STATUS="invoice_status";
    public const FIELD_SPOUSE_ID="spouse_id";
    public const FIELD_CHILDREN_IDS="children_ids";
    public const FIELD_CUSTOMER_GROUPS="customer_groups";
    public const FIELD_WEBSITES="websites";
    public const FIELD_COMPANY="company";
    public const FIELD_VAT="vat";
    public const FIELD_VAT_IS_VALID="vat_is_valid";
    public const FIELD_VAT_REQUEST_ID="vat_request_id";
    public const FIELD_VAT_REQUEST_DATE="vat_request_date";
    public const FIELD_VAT_REQUEST_SUCCESS="vat_request_success";
    public const FIELD_STREET="street";
    public const FIELD_ADDITIONAL_ADDRESS_LINE="additional_address_line";
    public const FIELD_CITY="city";
    public const FIELD_ZIPCODE="zipcode";
    public const FIELD_STATEID="stateID";
    public const FIELD_DEPARTMENT="department";
    public const FIELD_STATENAME="statename";
    public const FIELD_COUNTRYISO="countryiso";
    public const FIELD_COUNTRYID="countryID";
    public const FIELD_PHONE="phone";
    public const FIELD_MOBILE_PHONE="mobile_phone";
    public const FIELD_FAX="fax";
    public const FIELD_GIFTREGISTRY_ITEM_ID="giftregistry_item_id";
    public const FIELD_SUBSCRIPTIONS="subscriptions";
    public const FIELD_NOTIFICATIONS="notifications";
    public const FIELD_VOUCHER_STATES="voucher_states";


    /** content properties */
    public const FIELD_ID="id";
    public const FIELD_PARENT_CONTENT_IDS="parent_content_ids";
    public const FIELD_CONTENTS="contents";
    public const FIELD_CUSTOMERS="customers";


}
