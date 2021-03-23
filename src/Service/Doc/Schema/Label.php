<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

class Label implements DocPropertiesInterface
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
     * @var string
     */
    protected $value;

    /**
     * @var Array<<Localized>>
     */
    protected $loc_values = [];

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Label
     */
    public function setType(string $type): Label
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
     * @return Label
     */
    public function setName(string $name): Label
    {
        $this->name = $name;
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
     * @param string $value
     * @return Label
     */
    public function setValue(string $value): Label
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocValues(): array
    {
        return $this->loc_values;
    }

    /**
     * @param Array $loc_values
     * @return Label
     */
    public function setLocValues(array $loc_values): Label
    {
        $this->loc_values = $loc_values;
        return $this;
    }


}
