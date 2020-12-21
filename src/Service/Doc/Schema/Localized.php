<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;

/**
 * Class Localized
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class Localized implements \JsonSerializable, DocSchemaDefinitionInterface
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



}
