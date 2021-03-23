<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\DocIntegrationTrait;

/**
 * Class DocAtrtibuteValues
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocAttributeValues implements DocAttributeValuesHandlerInterface
{

    use DocGeneratorTrait;
    use DocIntegrationTrait;

    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayIterator();
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocAttributeValuesHandlerInterface::DOC_TYPE;
    }

}
