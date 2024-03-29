<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Repeated
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Repeated implements DocPropertiesInterface
{

    use PropertyToTrait;

    /**
     * @var
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Array<<string|int|RepeatedLocalized>>
     */
    protected $values = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Repeated
     */
    public function setName(string $name): Repeated
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $value
     * @return Repeated
     */
    public function setValues(array $values): Repeated
    {
        foreach($values as $value)
        {
            if($value instanceof DocPropertiesInterface)
            {
                $this->values[] = $value->toArray();
                continue;
            }
            $this->values[] = $value;
        }

        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'values' => $this->values,
            'type' => $this->type,
            'name' => $this->name
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getValues',
            'setValues',
            'getType',
            'setType',
            'getName',
            'setName'
        ];
    }


}
