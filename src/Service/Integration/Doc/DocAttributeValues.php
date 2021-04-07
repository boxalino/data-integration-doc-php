<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\Attribute\Values\Doc;
use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerIntegrationTrait;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;

/**
 * Class DocAtrtibuteValues
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocAttributeValues implements DocAttributeValuesHandlerInterface
{

    use DocHandlerIntegrationTrait;
    use LoadTrait;

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
        return DocAttributeValuesHandlerInterface::DOC_TYPE;
    }

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return new Doc($data);
    }

    /**
     * DocAttributeValues are exported following the simple load strategy
     */
    public function integrate(): void
    {
        $document = $this->getDocContent();
        $this->load($document, $this->getDocType());
    }

}
