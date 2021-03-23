<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

/**
 * Class Repeated
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class Repeated implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Array<<RepeatedLocalized>>
     */
    protected $values = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Repeated
     */
    public function setName(string $name): Repeated
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Array
     */
    public function getValues(): array
    {
        return $this->value;
    }

    /**
     * @param Array $value
     * @return Repeated
     */
    public function setValues(array $value): Repeated
    {
        $this->values = $value;
        return $this;
    }

    /**
     * @param RepeatedLocalized $localizeds
     * @return $this
     */
    public function addValue(RepeatedLocalized $localized) : self
    {
        $this->values[] = $localized->toArray();
        return $this;
    }

}
