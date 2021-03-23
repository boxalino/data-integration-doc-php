<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

class Tag implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $type;

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
     * @return Tag
     */
    public function setType(string $type): Tag
    {
        $this->type = $type;
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
     * @return Tag
     */
    public function setValue(string $value): Tag
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
     * @return Tag
     */
    public function setLocValues(array $loc_values): Tag
    {
        $this->loc_values = $loc_values;
        return $this;
    }


}
