<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class GcpClient implements GcpClientInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    protected $environment = "dev";

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return Client
     */
    public function getClient() : Client
    {
        $this->client = new Client();
        return $this->client;
    }

    /**
     * @return string
     */
    public function getEndpoint() : string
    {
        $endpoint =  str_replace("%%account%%", $this->getAccount(), UpdateOnSaveHandlerInterface::INDEXER_ENDPOINT);
        return str_replace("%%timestamp%%", round(microtime(true) * 1000), $endpoint);
    }

    /**
     * @return bool
     */
    public function allowIndexing() : bool
    {
        /**
        if (!$this->client->ping()) {
        return $this->logOrThrowException(new ServerNotAvailableException());
        }
         **/

        return true;
    }

    /**
     * @param \Throwable $exception
     * @return bool
     * @throws \Throwable
     */
    public function logOrThrowException(\Throwable $exception): bool
    {
        if ($this->environment === 'test') {
            throw $exception;
        }
        if ($this->environment === 'dev') {
            $this->logger->critical($exception->getMessage());
        }

        return false;
    }

}
