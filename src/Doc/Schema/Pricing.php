<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Pricing
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Pricing implements DocPropertiesInterface
{

    use PropertyToTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $values = [];

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Pricing
     */
    public function setType(string $type): Pricing
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
     * @param Array<<PricingLocalized>> $values
     * @return self
     */
    public function setValues(array $values): self
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
     * @param PricingLocalized $localized
     * @return $this
     */
    public function addValue(PricingLocalized $localized) : self
    {
        /** @var \ArrayIterator $iterator */
        $this->values[] = $localized->toArray();
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
            'type' => $this->type
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
            'addValue',
            'getType',
            'setType'
        ];
    }


}
