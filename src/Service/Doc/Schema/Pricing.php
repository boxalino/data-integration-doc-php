<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Pricing
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Pricing implements \JsonSerializable
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var Array<<Localized>>
     */
    protected $label;

    /**
     * @var Array<<Localized>>
     */
    protected $value;

    /**
     * @var Array<<Localized>>
     */
    protected $sign;

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
    public function getLabel(): array
    {
        return $this->label;
    }

    /**
     * @param Array $label
     * @return Pricing
     */
    public function setLabel(array $label): Pricing
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addLabel(Localized $localized) : Visibility
    {
        $this->label[] = $localized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param Array $value
     * @return Pricing
     */
    public function setValue(array $value): Pricing
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addValue(Localized $localized) : Visibility
    {
        $this->value[] = $localized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getSign(): array
    {
        return $this->sign;
    }

    /**
     * @param Array $sign
     * @return Pricing
     */
    public function setSign(array $sign): Pricing
    {
        $this->sign = $sign;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addSign(Localized $localized) : Visibility
    {
        $this->sign[] = $localized->toArray();
        return $this;
    }

}
