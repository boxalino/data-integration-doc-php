<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator;

use Boxalino\DataIntegrationDoc\Service\Generator\Product\Sku;

/**
 * Class GeneratorHydratorTrait
 * Is able to map an array-like to the requested object type (ex: doc_product)
 *
 * Hydrates the response to the objects mapping as defined in the AccessorHandler
 */
trait GeneratorHydratorTrait
{

    public function __construct(array $data = [])
    {
        $this->toObject($data);
    }

    /**
     * Set the array properties to object
     * (ex: a response element to the desired type)
     *
     * @param array $data
     */
    public function toObject(array $data) : ?DocGeneratorInterface
    {
        if($this instanceof DocGeneratorInterface)
        {
            $methods = get_class_methods($this);
            foreach($data as $propertyName=>$value)
            {
                $functionSuffix = preg_replace('/\s+/', '', ucwords(implode(" ", explode("_", $propertyName))));
                $setter = "set" . $functionSuffix;
                $adder = "add" . $functionSuffix;
                if(in_array($adder, $methods))
                {
                    try{
                        $this->$adder($value);
                        continue;
                    } catch (\Throwable $exception)
                    {
                        if(in_array($setter, $methods))
                        {
                            $this->$setter($value);
                            continue;
                        }
                        throw new \Exception($exception->getMessage());
                    }
                }

                try{
                    if(in_array($setter, $methods))
                    {
                        $this->$setter($value);
                        continue;
                    }
                } catch (\Throwable $exception)
                {
                    throw new \Exception($exception->getMessage());
                }
            }

            return $this;
        }

        return null;
    }

    /**
     * @param string $propertyName
     * @param $content
     */
    public function set(string $propertyName, $content)
    {
        $this->$propertyName = $content;
    }

    /**
     * @param string $propertyName
     */
    public function get(string $propertyName)
    {
        return $this->$propertyName;
    }


}
