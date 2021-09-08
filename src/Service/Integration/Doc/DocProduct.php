<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\Product\Doc;
use Boxalino\DataIntegrationDoc\Generator\Product\Group;
use Boxalino\DataIntegrationDoc\Generator\Product\Line;
use Boxalino\DataIntegrationDoc\Generator\Product\Sku;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerIntegrationTrait;
use Psr\Log\LoggerInterface;

/**
 * Class DocProduct
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocProduct implements DocProductHandlerInterface
{
    use DocHandlerIntegrationTrait;
    use LoadTrait;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->propertyHandlerList = new \ArrayIterator();
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocProductHandlerInterface::DOC_TYPE;
    }

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return $this->getSchemaGeneratorByType($this->getDocType());
    }

    /**
     * @param string $type
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getSchemaGeneratorByType(string $type, array $data = []) : DocGeneratorInterface
    {
        switch($type)
        {
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_SKU:
                $schema = new Sku($data);
                break;
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_GROUP:
                $schema = new Group($data);
                break;
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_LINE:
                $schema = new Line($data);
                break;
            case DocProductHandlerInterface::DOC_TYPE:
                $schema = new Doc();
                break;
        }

        return $schema;
    }

    /**
     * @param string $objectType
     * @param string $diffObjectType
     * @param array $data
     * @return DocGeneratorInterface|Doc|Group|Line|Sku
     */
    public function docTypePropDiffDuplicate(string $objectType, string $diffObjectType, array $data = [])
    {
        /** @var DocGeneratorInterface $object */
        $object = $this->getSchemaGeneratorByType($objectType);
        $objectProperties = $object->toList();

        /** @var DocGeneratorInterface $diffObject */
        $diffObject = $this->getSchemaGeneratorByType($diffObjectType);
        $diffObjectProperties = $diffObject->toList();

        $propertyDiff = array_diff(array_keys($diffObjectProperties), array_keys($objectProperties));
        $diffObjectData = array_filter($data, function($property) use ($propertyDiff)
        {
            return in_array($property, $propertyDiff) || $property === DocSchemaInterface::FIELD_INTERNAL_ID;
        }, ARRAY_FILTER_USE_KEY);

        return $this->getSchemaGeneratorByType($diffObjectType, $diffObjectData);
    }


}
