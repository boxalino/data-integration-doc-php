<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed\StringAttribute;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Typed
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Typed implements \JsonSerializable, DocSchemaDefinitionInterface
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
     * @var Array<<string|int|Localized>>
     */
    protected $values = [];

    /**
     * @return string
     */
    public function getType(): string
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param Array $values
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->values = $values;
        return $this;
    }


}
