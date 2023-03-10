<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\GcpRequestInterface;

/**
 * Trait DiExceptionTrait
 * Helper for managing exceptions fallbacks / retries / etc
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
trait DiExceptionTrait
{

    /**
     * @param \Throwable $exception
     * @param null | string $mode
     * @return bool
     */
    protected function isExceptionInRetryLoop(\Throwable $exception, ?string $mode = null) : bool
    {
        foreach($this->retryMessages($mode) as $message)
        {
            if(strpos($exception->getMessage(), $message))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * @param null | string $mode
     * @return array
     */
    protected function retryMessages(?string $mode = null) : array
    {
        if(is_null($mode))
        {
            return GcpRequestInterface::EXCEPTION_MESSAGES_RETRY;
        }

        try {
            $constantName = "EXCEPTION_MESSAGES_RETRY_" . strtoupper($mode);
            return constant("GcpRequestInterface::$constantName");
        } catch (\Throwable $exception)
        {
            return GcpRequestInterface::EXCEPTION_MESSAGES_RETRY;
        }
    }


}
