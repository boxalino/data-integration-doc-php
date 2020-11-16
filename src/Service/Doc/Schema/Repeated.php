<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

/**
 * Class Repeated
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/254050518/Referenced+Schema+Types#LIST
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Repeated implements \JsonSerializable
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Array<<Localized>>
     */
    protected $value;

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
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param Array $value
     * @return Repeated
     */
    public function setValue(array $value): Repeated
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addValue(Localized ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->value[] = $localized->toArray();
        }

        return $this;
    }

}
