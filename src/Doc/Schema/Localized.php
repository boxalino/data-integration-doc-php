<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Localized
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Localized implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string | int
     */
    protected $value;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Localized
     */
    public function setLanguage(string $language): Localized
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int|string|array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|string $value
     * @return Localized
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    protected function toArrayList(): array
    {
        return [
            'value' => $this->value,
            'language' => $this->language
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
            'setValue'
        ];
    }



}
