<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class RepeatedLocalized
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 * Can be used for: brands, suppliers, <typed>_localized properties
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class RepeatedLocalized implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var Array<<Localized>>
     */
    protected $value = [];

    /**
     * @var string
     */
    protected $value_id;

    /**
     * @return Array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param Array $values
     * @return self
     */
    public function setValue(array $values): self
    {
        $this->value = $values;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addValue(Localized $localized) : self
    {
        $this->value[] = $localized->toArray();
        return $this;
    }

    /**
     * @return string
     */
    public function getValueId(): string
    {
        return $this->value_id;
    }

    /**
     * @param string $value_id
     * @return self
     */
    public function setValueId(string $value_id): self
    {
        $this->value_id = $value_id;
        return $this;
    }

}
