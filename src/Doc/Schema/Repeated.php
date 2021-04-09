<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Repeated
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Repeated implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Array<<string|int|RepeatedLocalized>>
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
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
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

}
