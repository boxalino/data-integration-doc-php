<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

class PriceLocalized implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var int
     */
    protected $value;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return PriceLocalized
     */
    public function setLanguage(string $language): PriceLocalized
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int | string | value $value
     * @return PriceLocalized
     */
    public function setValue($value): PriceLocalized
    {
        $this->value = (float) $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PriceLocalized
     */
    public function setCurrency(string $currency): PriceLocalized
    {
        $this->currency = $currency;
        return $this;
    }


}
