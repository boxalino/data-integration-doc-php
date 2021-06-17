<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Flow;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;

/**
 * Trait DiLogTrait
 * Helper for logging / profiling DI process
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
trait DiLogTrait
{

    /**
     * @param string $property
     */
    public function logTime(string $property) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->$property = microtime(true);
        }
    }

    /**
     * @param string $endTime
     * @param string $startTime
     * @return int
     */
    public function logDiff(string $endTime, string $startTime) : float
    {
        return ($this->$endTime - $this->$startTime);
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $text
     * @param string $endTime
     * @param string $startTime
     */
    public function logMessage(string $step, string $endTime, string $startTime) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->info("TIME SPENT ON $step : " . $this->logDiff($endTime, $startTime) . " (sec)");
        }
    }

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration(): ConfigurationDataObject
    {
        return $this->diConfiguration;
    }

}
