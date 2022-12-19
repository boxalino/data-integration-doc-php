<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\Order\Doc;
use Psr\Log\LoggerInterface;

/**
 * Class DocOrder
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocOrder implements DocOrderHandlerInterface
{
    use DocHandlerIntegrationTrait;
    use LoadTrait;

    /**
     * @var array | null
     */
    protected $docData = null;

    public function __construct(LoggerInterface $logger)
    {
        $this->propertyHandlerList = new \ArrayIterator();
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocOrderHandlerInterface::DOC_TYPE;
    }

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return new Doc($data);
    }


}
