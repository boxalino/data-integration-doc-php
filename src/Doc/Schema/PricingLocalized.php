<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

class PricingLocalized extends PriceLocalized
{

    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(
            parent::toArrayList(),
            [
                'label' => $this->label
            ]
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getLabel',
                'setLabel'
            ],
            parent::toArrayClassMethods()
        );
    }

}
