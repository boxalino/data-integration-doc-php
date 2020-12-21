<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

/**
 * Interface GcpClientInterface
 * @package Boxalino\DataIntegrationDoc\Service
 */
interface GcpClientInterface
{

    public const INDEXER_ENDPOINT="https://solrsync-stage.bx-cloud.com/solrsync/upload?account=%%account%%&type=datadelta&priority=urgent&versionTs=%%timestamp%%";


    public function getClient() : Client;

    /**
     * @return string
     */
    public function getEndpoint() : string;

    /**
     * @return string
     */
    public function getApiKey() : string;

    /**
     * @return string
     */
    public function getApiSecret() : string;

    /**
     * @return string
     */
    public function getAccount() : string;

    /**
     * @param string $account
     * @return mixed
     */
    public function setAccount(string $account);

    /**
     * @param string $apiKey
     * @return mixed
     */
    public function setApiKey(string $apiKey);

    /**
     * @param string $apiSecret
     * @return mixed
     */
    public function setApiSecret(string $apiSecret);

    /**
     * @param bool $isDev
     * @return mixed
     */
    public function setIsDev(bool $isDev);

    /**
     * @return bool
     */
    public function isDev() : bool;

}
