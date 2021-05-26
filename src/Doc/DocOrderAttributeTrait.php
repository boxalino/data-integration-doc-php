<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;

/**
 * Trait DocOrderAttributeTrait
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocOrderAttributeTrait
{

    /**
     * @return array
     */
    public function getOrderSingleValueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_INTERNAL_ID,
            DocSchemaInterface::FIELD_EXTERNAL_ID,
            DocSchemaInterface::FIELD_PARENT_ORDER_ID,
            DocSchemaInterface::FIELD_PERSONA_TYPE,
            DocSchemaInterface::FIELD_PERSONA_ID,
            DocSchemaInterface::FIELD_STORE,
            DocSchemaInterface::FIELD_SELLER_PERSONA_ID,
            DocSchemaInterface::FIELD_SELLER_PERSONA_TYPE,
            DocSchemaInterface::FIELD_CURRENCY_CD,
            DocSchemaInterface::FIELD_PAYMENT_METHOD,
            DocSchemaInterface::FIELD_SHIPPING_METHOD,
            DocSchemaInterface::FIELD_SHIPPING_DESCRIPTION,
            DocSchemaInterface::FIELD_DEVICE,
            DocSchemaInterface::FIELD_REFERER,
            DocSchemaInterface::FIELD_PARTNER,
            DocSchemaInterface::FIELD_LANGUAGE,
            DocSchemaInterface::FIELD_TRACKING_CODE,
            DocSchemaInterface::FIELD_EMAIL,
            DocSchemaInterface::FIELD_CREATION,
            DocSchemaInterface::FIELD_UPDATE,
            DocSchemaInterface::FIELD_CONFIRMATION,
            DocSchemaInterface::FIELD_CLEARED,
            DocSchemaInterface::FIELD_SENT,
            DocSchemaInterface::FIELD_RECEIVED,
            DocSchemaInterface::FIELD_RETURNED,
            DocSchemaInterface::FIELD_REPAIRED,
            DocSchemaInterface::FIELD_STATUS_CODE
        ];
    }

    public function getOrderNumericSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_STATUS,
            DocSchemaInterface::FIELD_TOTAL_CRNCY_AMT,
            DocSchemaInterface::FIELD_TOTAL_CRNCY_AMT_NET,
            DocSchemaInterface::FIELD_TOTAL_GROSS_MARGIN_CRNCY_AMT,
            DocSchemaInterface::FIELD_TOTAL_NET_MARGIN_CRNCY_AMT,
            DocSchemaInterface::FIELD_SHIPPING_COSTS_NET,
            DocSchemaInterface::FIELD_SHIPPING_COSTS,
            DocSchemaInterface::FIELD_CURRENCY_FACTOR,
            DocSchemaInterface::FIELD_TAX_RATE,
            DocSchemaInterface::FIELD_TAX_AMNT,

        ];
    }

    /**
     * @return array
     */
    public function getOrderBooleanSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_IS_GIFT,
            DocSchemaInterface::FIELD_WRAPPING,
            DocSchemaInterface::FIELD_TAX_FREE
        ];
    }

    /**
     * @return array
     */
    public function getOrderMultivalueSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_PRODUCTS,
            DocSchemaInterface::FIELD_COMMENTS,
            DocSchemaInterface::FIELD_INTERNAL_COMMENTS,
            DocSchemaInterface::FIELD_CUSTOMER_COMMENTS,
            DocSchemaInterface::FIELD_STRING_LOCALIZED,
            DocSchemaInterface::FIELD_NUMERIC,
            DocSchemaInterface::FIELD_NUMERIC_LOCALIZED,
            DocSchemaInterface::FIELD_DATETIME,
            DocSchemaInterface::FIELD_DATETIME_LOCALIZED,
            DocSchemaInterface::FIELD_PRODUCT_RELATIONS,
            DocSchemaInterface::FIELD_VOUCHERS,
            DocSchemaInterface::FIELD_STRING
        ];
    }

    /**
     * @return array
     */
    public function getOrderContentSchemaTypes() : array
    {
        return [
            DocSchemaInterface::FIELD_PRODUCTS,
            DocSchemaInterface::FIELD_COMMENTS,
            DocSchemaInterface::FIELD_INTERNAL_COMMENTS,
            DocSchemaInterface::FIELD_CUSTOMER_COMMENTS,
            DocSchemaInterface::FIELD_PRODUCT_RELATIONS,
            DocSchemaInterface::FIELD_VOUCHERS
        ];
    }

}
