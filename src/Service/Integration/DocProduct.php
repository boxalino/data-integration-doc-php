<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\Exporter\Service\InstantUpdate\Document\DocPropertiesHandlerInterface;
use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\Product\Doc;
use Boxalino\InstantUpdate\Service\Generator\Product\Group;
use Boxalino\InstantUpdate\Service\Generator\Product\Line;
use Boxalino\InstantUpdate\Service\Generator\Product\Sku;
use Boxalino\InstantUpdate\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Class DocProduct
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class DocProduct implements DocProductHandlerInterface
{

    /**
     * @var \ArrayObject
     */
    protected $attributeHandlerList;

    /**
     * @var array | null
     */
    protected $docProductData = null;


    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayObject();
    }

    /**
     * @TODO: Implement getDoc() method.
     * @return Doc
     */
    public function getDoc(): Doc
    {
        return $this->getDocPropertySchema(DocProductHandlerInterface::DOC_TYPE);
    }

    /**
     * Create the product groups content (based on the IDs to be updated)
     *
     * Structure of the array:
     * [product1=>[property1=>property1schema, property2=>property2schema,[..]],..]
     *
     * @return array
     */
    public function getDocProductData() : array
    {
        if(is_null($this->docProductData))
        {
            $data = [];
            foreach($this->attributeHandlerList as $handler)
            {
                if($handler instanceof AttributeHandlerInterface)
                {
                    $data = array_merge_recursive($data, $handler->getValues());
                }
            }

            $this->docProductData = $data;
        }

        return $this->docProductData;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocProductHandlerInterface::DOC_TYPE;
    }

    /**
     * Dynamically configure the attribute handlers for every data type to be retrieved
     * (the handler must have DB access information for the attribute element data)
     *
     * @param AttributeHandlerInterface $attributeHandler
     * @return DocProductHandlerInterface
     */
    public function addAttributeHandler(AttributeHandlerInterface $attributeHandler) : DocProductHandlerInterface
    {
        $this->attributeHandlerList->append($attributeHandler);
        return $this;
    }

    /**
     * @param string $type
     * @param array $data
     * @return Doc|Group|Line|Sku
     */
    public function getDocPropertySchema(string $type, array $data = []) : DocGeneratorInterface
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
            default:
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
        $object = $this->getDocPropertySchema($objectType);
        $objectProperties = $object->toArray();

        /** @var DocGeneratorInterface $diffObject */
        $diffObject = $this->getDocPropertySchema($diffObjectType);
        $diffObjectProperties = $diffObject->toArray();

        $propertyDiff = array_diff(array_keys($diffObjectProperties), array_keys($objectProperties));
        $diffObjectData = array_filter($data, function($property) use ($propertyDiff)
        {
            return in_array($property, $propertyDiff) || $property === AttributeHandlerInterface::ATTRIBUTE_TYPE_INTERNAL_ID;
        }, ARRAY_FILTER_USE_KEY);

        return $this->getDocPropertySchema($diffObjectType, $diffObjectData);
    }


}
