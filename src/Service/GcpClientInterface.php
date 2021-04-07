<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

/**
 * Interface GcpClientInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
interface GcpClientInterface
{

    public const GCP_ENDPOINT_LOAD="/load";
    public const GCP_ENDPOINT_LOAD_CHUNK="/load/chunk";
    public const GCP_ENDPOINT_LOAD_BQ="/load/bq";
    public const GCP_ENDPOINT_SYNC="/sync";

    public const GCP_MODE_INSTANT_UPDATE="I";
    public const GCP_MODE_DELTA="D";
    public const GCP_MODE_FULL="F";

    public const GCP_TYPE_PRODUCT="product";
    public const GCP_TYPE_PRODUCT_ATTRIBUTE="attribute";
    public const GCP_TYPE_PRODUCT_ATTRIBUTE_VALUE="attribute_value";
    public const GCP_TYPE_ORDER="order";
    public const GCP_TYOE_USER="user";
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


    /**
     * Generic HTTP client
     *
     * @return Client
     */
    public function getClient() : Client;

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents
     * @throws \Throwable
     */
    public function send(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents) : void;

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents
     * @throws \Throwable
     */
    public function load(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents) : void;

    /**
     * Load a document to GCP
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @param string $document
     * @param string $type
     */
    public function loadDoc(ConfigurationDataObject $configurationDataObject, string $document, string $type) : void;

    /**
     * Make a sync request once all the data sync contents have been exported
     *
     * @param ConfigurationDataObject $configurationDataObject
     */
    public function sync(ConfigurationDataObject $configurationDataObject) : void;

    /**
     * Timestamp
     * Use this to identify the BQ table for this content
     * (ex: <client>_<mode>.<doc>_<mode>_<tm> in our GCP project)
     *
     * @return string
     */
    public function getTm() : string;

    /**
     * The content version (miliseconds based in UNIX timestamp)
     * This is required in order for the LIVE sync to apply content updates in chronological order
     *
     * @return string
     */
    public function getTs() : string;

}
