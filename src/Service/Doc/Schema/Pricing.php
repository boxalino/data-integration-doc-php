<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;

/**
 * Class Pricing
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class Pricing implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

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
     * @return Array
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
            $this->values[] = $value->toArray();
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

}
