<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

/**
 * Interface GcpRequestInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
interface GcpRequestInterface
{

    public const GCP_ENDPOINT_LOAD="/load";
    public const GCP_ENDPOINT_LOAD_CHUNK="/load/chunk";
    public const GCP_ENDPOINT_LOAD_BQ="/load/bq";
    public const GCP_ENDPOINT_SYNC="/sync";
    public const GCP_ENDPOINT_SYNC_CHECK="/sync/check";
    public const GCP_ENDPOINT_THRESHOLD="/threshold";

    public const GCP_MODE_INSTANT_UPDATE="I";
    public const GCP_MODE_DELTA="D";
    public const GCP_MODE_FULL="F";

    public const GCP_TYPE_PRODUCT="product";
    public const GCP_TYPE_LANGUAGE="language";
    public const GCP_TYPE_PRODUCT_ATTRIBUTE="attribute";
    public const GCP_TYPE_PRODUCT_ATTRIBUTE_VALUE="attribute_value";
    public const GCP_TYPE_ORDER="order";
    public const GCP_TYPE_USER="user";
    public const GCP_TYPE_USER_CONTENT="user_content";
    public const GCP_TYPE_USER_SELECTION="user_selection";
    public const GCP_TYPE_CONTENT="content";

    public const DI_REQUEST_MODE="mode";
    public const DI_REQUEST_TM="tm";
    public const DI_REQUEST_TS="ts";
    public const DI_REQUEST_TYPE="type";
    public const DI_REQUEST_CLIENT="client";
    public const DI_REQUEST_DEV="dev";
    public const DI_REQUEST_DOC="doc";
    public const DI_REQUEST_PROJECT="project";
    public const DI_REQUEST_DATASET="dataset";
    public const DI_REQUEST_CHUNK="chunk";
    public const DI_REQUEST_DISPATCH="dispatch";
    public const DI_REQUEST_OUTSOURCE="outsource";
    public const DI_REQUEST_FIELDS="fields";
    public const DI_REQUEST_THRESHOLD="threshold";


}
