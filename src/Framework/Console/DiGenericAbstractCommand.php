<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Console;

use Boxalino\DataIntegrationDoc\Framework\Integrate\DiAbstractTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\DiIntegrateTrait;
use Boxalino\DataIntegrationDoc\Framework\Integrate\DiLoggerTrait;
use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;
use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class DiGenericAbstractCommand
 *
 * Use to trigger the data integration processes
 * ex: php bin/magento boxalino:di:<mode>:<type> [account]
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Console
 */
abstract class DiGenericAbstractCommand extends Command
{

    use DiLoggerTrait;
    use DiAbstractTrait;
    use DiIntegrateTrait;

    public function __construct(
//        string $environment,
        LoggerInterface $logger,
        DiConfigurationInterface $configurationManager
    ){
        $this->configurationManager = $configurationManager;
        $this->logger = $logger;
//        $this->environment = $environment;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDefinition($this->getInputList());

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $account = $input->getArgument("account");
        $output->writeln('Start of Boxalino Data Integration (DI) ...');

        try{
            /** @var ConfigurationDataObject $configuration */
            foreach($this->getConfigurations() as $configuration)
            {
                if($this->canRun($configuration))
                {
                    if(empty($account))
                    {
                        $this->integrate($configuration);
                        continue;
                    }

                    if($configuration->getAccount() == $account)
                    {
                        $this->integrate($configuration);
                        break;
                    }
                }
            }
        } catch (\Exception $exc)
        {
            $output->writeln($exc->getMessage());
        }

        $output->writeln("End of Boxalino Data Integration Process.");
        return 0;
    }

    /**
     * Get list of options and arguments for the command
     *
     * @return array
     */
    public function getInputList() : array
    {
        return [
            new InputArgument(
                "account",
                InputArgument::OPTIONAL,
                'Boxalino Account name'
            ),
        ];
    }


}
