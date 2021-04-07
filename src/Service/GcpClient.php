<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailDocLoadException;
use Boxalino\DataIntegrationDoc\Service\ErrorHandler\FailSyncException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

/**
 * Class GcpClient
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
class GcpClient implements GcpClientInterface
{
    use GcpClientTrait;

    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var string
     */
    protected $environment;

    /**
     * GcpClient constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = new Client();
    }

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents ([<doc_type_1>=><doc content>, <doc_type_2>=><doc_content>,..]
     * @param string $mode (F, D, I)
     * @throws \Throwable
     */
    public function send(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents) : void
    {
        try {
            $configurationDataObject->setTm($this->getTm());
            $configurationDataObject->setTs($this->getTs());

            $this->load($configurationDataObject, $documents);
            $this->sync($configurationDataObject);
        } catch (FailDocLoadException $exception)
        {
            throw $exception;
        } catch (FailSyncException $exception)
        {
            throw $exception;
        } catch (\Throwable $exception)
        {
            $this->logOrThrowException($exception);
        }
    }

    /**
     * Loads every document required for the sync type to succeed:
     *
     * product: doc_attribute, doc_attribute_value, doc_langauge, doc_product
     * order: doc_order
     * user: doc_user
     * etc
     *
     * @param ConfigurationDataObject $configurationDataObject
     * @param \ArrayIterator $documents
     * @throws \Throwable
     */
    public function load(ConfigurationDataObject $configurationDataObject, \ArrayIterator $documents) : void
    {
        try{
            foreach($documents as $type => $document)
            {
                /** if test, log the doc content (debug purposes) */
                if($configurationDataObject->isTest())
                {
                    $this->log($document);
                }

                $this->loadDoc(
                    $configurationDataObject,
                    $document,
                    $type
                );
            }
        } catch (FailDocLoadException $exception)
        {
            throw $exception;
        } catch (\Throwable $exception)
        {
            throw $exception;
        }
    }

    /**
     * @param \Throwable $exception
     * @return bool
     * @throws \Throwable
     */
    public function logOrThrowException(\Throwable $exception)
    {
        $this->logger->alert("Boxalino API Data Integration error: " . $exception->getMessage());
        throw $exception;
    }


}
