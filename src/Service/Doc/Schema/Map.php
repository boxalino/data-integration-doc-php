<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Map
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Map implements \JsonSerializable
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Array<<string|int|Localized>>
     */
    protected $values;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Map
     */
    public function setType(string $type): Map
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Map
     */
    public function setName(string $name): Map
    {
        $this->name = $name;
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
     * @param Array $values
     * @return Map
     */
    public function setValues(array $values): Map
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function addValue($value) : Map
    {
        $this->values[] = $value;
        return $this;
    }

}
