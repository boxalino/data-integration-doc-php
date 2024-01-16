<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Generator\Attribute\Values\Doc;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;

/**
 * Class DocAtrtibuteValues
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
#[\AllowDynamicProperties]
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


}
