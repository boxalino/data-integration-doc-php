<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate;

use Psr\Log\LoggerInterface;

/**
 * Trait DiLoggerTrait
 * @package Boxalino\DataIntegrationDoc\Framework\Console
 */
trait DiLoggerTrait
{

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    protected $environment;

    /**
     * Do not throw exception, the product update must not be blocked if the SOLR SYNC update does not work
     *
     * @param \Throwable $exception
     * @return bool
     * @throws \Throwable
     */
    public function logOrThrowException(\Throwable $exception)
    {
        if ($this->environment === 'prod') {
            $this->warning($exception);
            throw $exception;
        }

        $this->info($exception);
        throw $exception;
    }

    /**
     * @param \Throwable $exception
     */
    public function info(\Throwable $exception)
    {
        $this->getLogger()->info("Boxalino DI: " . $exception->getMessage());
    }

    /**
     * @param \Throwable $exception
     */
    public function warning(\Throwable $exception)
    {
        $this->getLogger()->warning("Boxalino DI: " . $exception->getMessage());
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }


}
