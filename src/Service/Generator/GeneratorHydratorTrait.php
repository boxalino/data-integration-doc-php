<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator;


/**
 * Class GeneratorHydratorTrait
 * Is able to map an array-like to the requested object type (ex: doc_product)
 *
 * Hydrates the response to the objects mapping as defined in the AccessorHandler
 */
trait GeneratorHydratorTrait
{

    /**
     * Transform an element to an object
     * (ex: a response element to the desired type)
     *
     * @param \StdClass $data
     * @param AccessorInterface $object
     * @return mixed
     */
    public function toObject(\StdClass $data, AccessorInterface $object) : AccessorInterface
    {
        $dataAsObject = new \ReflectionObject($data);
        $properties = $dataAsObject->getProperties();
        $class = get_class($object);
        $methods = get_class_methods($class);

        foreach($properties as $property)
        {
            $propertyName = $property->getName();
            $value = $data->$propertyName;
            $setter = "set" . strtoupper(substr($propertyName, 0, 1)) . substr($propertyName, 1);
            /**
             * accessor are informative Boxalino system variables which have no value to the integration system
             */
            if($value === ['accessor'] || $value === "accessor")
            {
                continue;
            }

            if(in_array($setter, $methods))
            {
                $object->$setter($value);
                continue;
            }

            if($this->getAccessorHandler()->hasAccessor($propertyName))
            {
                $handler = $this->getAccessorHandler()->getAccessor($propertyName);
                $objectProperty = $this->getAccessorHandler()->getAccessorSetter($propertyName);
                /** the facets is returned as a list/[] instead of a model itself */
                if($propertyName === 'bx-facets')
                {
                    $object->set($objectProperty, $value);
                    continue;
                }

                if(empty($value))
                {
                    $object->set($objectProperty, $handler);
                    continue;
                }

                if(is_array($value))
                {
                    $value = array_pop($value);
                }
                $valueObject = $this->toObject($value, $handler);
                $object->set($objectProperty, $valueObject);

                continue;
            }

            $object->set($propertyName, $value);
        }

        return $object;
    }


}
