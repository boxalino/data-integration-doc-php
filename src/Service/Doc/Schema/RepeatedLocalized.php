<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class RepeatedLocalized
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 * Can be used for: brands, suppliers, <typed>_localized properties
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class RepeatedLocalized implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

    /**
     * @var Array<<Localized>>
     */
    protected $values;

    /**
     * @var \ArrayObject
     */
    protected $value;

    /**
     * TypedLocalized constructor.
     */
    public function __construct()
    {
        $this->value = new \ArrayObject(['value'=> []]);
    }

    /**
     * @return Array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param Array $values
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addValue(Localized $localized) : self
    {
        /** @var \ArrayIterator $iterator */
        $values = $this->value->offsetGet("value");
        $values[] = $localized->toArray();
        $this->value->offsetSet("value", $values);
        $this->values = [$this->value];

        return $this;
    }

}
