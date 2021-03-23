<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Doc;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Group;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Line;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Sku;
use Boxalino\DataIntegrationDoc\Service\Doc\DocSchemaPropertyHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\DocIntegrationTrait;

/**
 * Class DocProduct
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocProduct implements DocProductHandlerInterface
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
        return DocProductHandlerInterface::DOC_TYPE;
    }

    /**
     * List of DocProduct attributes that should be part of the DataIntegrationDoc request
     * (ex: used to filter the schema attributes)
     *
     * @return array
     */
    public function getDocSchemaAttributes() : array
    {
        $docSchemaAttributes = [];
        foreach($this->getHandlers() as $handler)
        {
            if($handler instanceof DocSchemaPropertyHandlerInterface)
            {
                $docSchemaAttributes = array_merge($data, $handler->getDocSchemaAttributes());
            }
        }

        return $docSchemaAttributes;
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
        $object = $this->getDocPropertySchema($objectType);
        $objectProperties = $object->toArray();

        /** @var DocGeneratorInterface $diffObject */
        $diffObject = $this->getDocPropertySchema($diffObjectType);
        $diffObjectProperties = $diffObject->toArray();

        $propertyDiff = array_diff(array_keys($diffObjectProperties), array_keys($objectProperties));
        $diffObjectData = array_filter($data, function($property) use ($propertyDiff)
        {
            return in_array($property, $propertyDiff) || $property === DocSchemaInterface::FIELD_INTERNAL_ID;
        }, ARRAY_FILTER_USE_KEY);

        return $this->getDocPropertySchema($diffObjectType, $diffObjectData);
    }


}
