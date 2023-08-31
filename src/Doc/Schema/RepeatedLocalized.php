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
     * @var string | null
     */
    protected $value_id;

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param array $values
     * @return self
     */
    public function setValue(array $values): self
    {
        foreach($values as $value)
        {
            if($value instanceof DocPropertiesInterface)
            {
                $this->value[] = $value->toArray();
                continue;
            }
            $this->value[] = $value;
        }

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
     * @return string | null
     */
    public function getValueId(): ?string
    {
        return $this->value_id;
    }

    /**
     * @param string | null $value_id
     * @return self
     */
    public function setValueId(?string $value_id): self
    {
        $this->value_id = $value_id;
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
            'value_id' => $this->value_id
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getValue',
            'setValue',
            'getValueId',
            'setValueId'
        ];
    }


}
