<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Status
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Status implements DocPropertiesInterface
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
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Status
     */
    public function setLanguage(string $language): Status
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
     * @param int $value
     * @return Status
     */
    public function setValue(int $value): Status
    {
        $this->value = $value;
        return $this;
    }


}
