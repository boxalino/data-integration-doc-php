<?php
namespace Boxalino\DataIntegrationDoc\Framework\Util;

/**
 * Interface DiConfigurationInterface
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Util
 */
interface DiConfigurationInterface
{

    /** @var string key for the configuration access */
    public CONST BOXALINO_CONFIG_KEY = "BoxalinoDataIntegration";

    public CONST DI_CONFIG_IS_TEST="isTest";
    public CONST DI_CONFIG_IS_DEV="isDev";
    public CONST DI_CONFIG_ENDPOINT="endpoint";
    public CONST DI_CONFIG_ACCOUNT="account";
    public CONST DI_CONFIG_API_KEY="apiKey";
    public CONST DI_CONFIG_API_SECRET="apiSecret";
    public CONST DI_CONFIG_ALLOW_ORDER_SYNC="allowOrderSync";
    public CONST DI_CONFIG_ALLOW_PRODUCT_SYNC="allowProductSync";
    public CONST DI_CONFIG_ALLOW_USER_SYNC="allowUserSync";
    public CONST DI_CONFIG_ALLOW_CONTENT_SYNC="allowContentSync";
    public CONST DI_CONFIG_ALLOW_USER_CONTENT_SYNC="allowUserContentSync";
    public CONST DI_CONFIG_ALLOW_VOUCHER_SYNC="allowVoucherSync";

    /**
     * @return array
     */
    public function getInstantUpdateConfigurations() : array;

    /**
     * @return array
     */
    public function getFullConfigurations() : array;

    /**
     * @return array
     */
    public function getDeltaConfigurations() : array;

    /**
     * @return array
     */
    public function getCoreConfigurations() : array;


}
