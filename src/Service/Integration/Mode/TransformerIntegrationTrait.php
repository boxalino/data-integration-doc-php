<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Mode;

use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\MissingConfigurationException;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\HandlerInterface;

/**
 * Interface TransformerIntegrationTrait
 * Pushes data to transformer loadpoint; Triggers
 * @package Boxalino\DataIntegrationDoc\Service\Integration\Mode
 */
trait TransformerIntegrationTrait
{

    /**
     * @return string
     */
    public function getIntegrationMode() : string
    {
        return TransformerIntegrationInterface::INTEGRATION_MODE;
    }

    /**
     * Integration flow for the transformer mode
     * It loads the files in GCS (based on direct link)
     * It loads the GCS files to BQ (based on configured options)
     * It creates the config model
     */
    public function integrateTransform(): void
    {
        $configuration = $this->getDiConfiguration();
        if(is_null($configuration))
        {
            throw new MissingConfigurationException("Configurations are not available for " . get_class($this));
        }

        $errors = [];
        /** @var HandlerInterface $handler */
        foreach($this->getHandlers() as $handler)
        {
            if($handler instanceof HandlerInterface)
            {
                $handler->setDiConfiguration($configuration);
                try {
                    $handler->integrate();
                    $handler->core();
                } catch (\Throwable $exception)
                {
                   $this->warning(new \Exception($handler->getDocType() . " : " . $exception->getMessage()));
                   $errors[] = $handler->getDocType();
                }
            }
        }

        if(count($errors))
        {
            throw new FailSyncException("Check logs. Exceptions found for {$this->getDiConfiguration()->getTm()}: " . implode(",", $errors));
        }
    }


}
