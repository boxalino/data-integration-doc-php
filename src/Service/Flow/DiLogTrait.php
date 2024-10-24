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
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ConfigurationDataObject
     */
    protected $diConfiguration;

    /**
     * @var array
     */
    protected $logValues = [];

    /**
     * @param string $property
     */
    public function logTime(string $property) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->logValues[$property] = microtime(true);
        }
    }

    /**
     * @param string $endTime
     * @param string $startTime
     * @return int
     */
    public function logDiff(string $endTime, string $startTime) : float
    {
        return ($this->logValues[$endTime] - $this->logValues[$startTime]);
    }

    /**
     * @param LoggerInterface $logger
     * @return void
     */
    public function setLogger(LoggerInterface $logger) : void
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $step
     * @param string $endTime
     * @param string $startTime
     */
    public function logMessage(string $step, string $endTime, string $startTime) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->info($this->getLogProcessName(). ": TIME SPENT ON $step : " . $this->logDiff($endTime, $startTime) . " (sec)");
        }
    }

    /**
     * @param string $step
     * @param bool $start
     * @return void
     */
    public function logMemory(string $step, bool $start = true) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $processName = $this->getLogProcessName();
            if($start)
            {
                $this->getLogger()->info("$processName: Start $step MEMORY with: " . $this->getMemory());
                return;
            }

            $this->getLogger()->info("$processName: End $step MEMORY with: " . $this->getMemory());
        }
    }

    /**
     * @param string $step
     * @return void
     */
    public function logPeakMemory(string $step) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->info($this->getLogProcessName() .": Peak memory on $step : " . $this->getPeakMemory());
        }
    }

    /**
     * @param string $message
     * @return void
     */
    public function logDebug(string $message) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->debug($this->getLogProcessName() .": " . $message);
        }
    }

    /**
     * @param string $message
     * @return void
     */
    public function logInfo(string $message) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->info($this->getLogProcessName() .": " . $message);
        }
    }

    /**
     * @param string $message
     * @return void
     */
    public function logWarning(string $message) : void
    {
        if($this->getDiConfiguration()->isTest())
        {
            $this->getLogger()->warning($this->getLogProcessName() .": " . $message);
        }
    }

    /**
     * @return string
     */
    protected function getLogProcessName() : string
    {
        $configuration = $this->getDiConfiguration();
        return implode(".", [
            implode("_", [
                $configuration->getAccount(),
                $configuration->getMode()
            ]),
            implode("_", [
                "doc",
                $configuration->getType(),
                $configuration->getMode(),
                $configuration->getTm()
            ])
        ]);
    }

    /**
     * @return string
     */
    protected function getMemory()  : string
    {
        $memory = memory_get_usage();
        return round($memory/1048576,2)." MB";
    }

    /**
     * @return string
     */
    protected function getPeakMemory()  : string
    {
        $memory = memory_get_peak_usage();
        return round($memory/1048576,2)." MB";
    }

    /**
     * @return ConfigurationDataObject
     */
    public function getDiConfiguration(): ConfigurationDataObject
    {
        return $this->diConfiguration;
    }


}
