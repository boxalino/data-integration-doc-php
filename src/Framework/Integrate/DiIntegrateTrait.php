<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate;

use Boxalino\DataIntegrationDoc\Framework\Util\DiIntegrationConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\NoRecordsFoundException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\StopSyncException;
use Boxalino\DataIntegrationDoc\Service\Integration\IntegrationHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Trait DiIntegrateTrait
 * Provides strategies for triggering the integration handlers integrate logic
 * Must be used with other traits
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Console
 */
trait DiIntegrateTrait
{

    /**
     * @var IntegrationHandlerInterface
     */
    protected $integrationHandler;

    /**
     * @var string | null
     */
    protected $processName;

    /**
     * @throws \Throwable
     */
    public function integrate(ConfigurationDataObject $configuration) : void
    {
        try {
            if($this->getIntegrationHandler() instanceof DiIntegrationConfigurationInterface)
            {
                $this->getIntegrationHandler()->setSystemConfiguration($configuration);
            }

            $this->getIntegrationHandler()->manageConfiguration($configuration);
            $this->setProcessName($this->getIntegrateName());

            $this->getLogger()->info(
                "Boxalino DI: Start {$this->getProcessName()} sync for {$configuration->getAccount()}"
            );

            $this->getIntegrationHandler()->integrate();

            $this->getLogger()->info(
                "Boxalino DI: End of {$this->getProcessName()} sync for {$configuration->getAccount()}"
            );
        } catch (NoRecordsFoundException $exception)
        {
            $this->info($exception);
        } catch (FailDocLoadException $exception) {
            //maybe a fallback to save the content of the documents and try again later or have the integration team review
            $this->logOrThrowException($exception);
        } catch (StopSyncException $exception)
        {
            $this->info($exception);
        } catch (FailSyncException $exception)
        {
            //save that the product id was not synced (relevant for full error data sync alerts)
            $this->logOrThrowException($exception);
        } catch (\Throwable $exception)
        {
            $this->logOrThrowException($exception);
        }
    }

    /**
     * @param string $name
     * @return void
     */
    public function setProcessName(string $name) : void
    {
        $this->processName = $name;
    }

    /**
     * @return string
     */
    public function getProcessName() : string
    {
        return $this->processName;
    }

    /**
     * @return string
     */
    public function getIntegrateName() : string
    {
        $configuration = $this->getIntegrationHandler()->getDiConfiguration();
        return implode(".", [
            implode("_", [
                $configuration->getAccount(),
                $configuration->getMode()
            ]),
            implode("_", [
                $configuration->getType(),
                $configuration->getMode(),
                $configuration->getTm()
            ])
        ]);
    }

    /**
     * @return IntegrationHandlerInterface
     */
    public function getIntegrationHandler(): IntegrationHandlerInterface
    {
        return $this->integrationHandler;
    }


}
