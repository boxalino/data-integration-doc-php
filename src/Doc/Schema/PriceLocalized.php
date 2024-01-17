<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class PriceLocalized implements DocPropertiesInterface
{

    use PropertyToTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $region;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return self
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param int | string  $value
     * @return self
     */
    public function setValue($value): self
    {
        $this->value = (string) $value;
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
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;
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
            'language' => $this->language,
            'value' => $this->value,
            'currency' => $this->currency,
            'region' => $this->region
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getLanguage',
            'setLanguage',
            'getValue',
            'setValue',
            'getCurrency',
            'setCurrency',
            'getRegion',
            'setRegion'
        ];
    }



}
