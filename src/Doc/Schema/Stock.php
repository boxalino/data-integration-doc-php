<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Stock
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Stock implements DocPropertiesInterface
{
    use PropertyToTrait;

    /**
     * @var string | null
     */
    protected $availability;

    /**
     * @var string | null
     */
    protected $delivery_center;

    /**
     * @var int | string | null
     */
    protected $value;

    /**
     * @return string|null
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * @param string|null $availability
     * @return Stock
     */
    public function setAvailability(?string $availability): Stock
    {
        $this->availability = $availability;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDeliveryCenter(): ?string
    {
        return $this->delivery_center;
    }

    /**
     * @param string|null $delivery_center
     * @return Stock
     */
    public function setDeliveryCenter(?string $delivery_center): Stock
    {
        $this->delivery_center = $delivery_center;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int| string | null $value
     * @return Stock
     */
    public function setValue($value): Stock
    {
        $this->value = (int) $value;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'value' => $this->value,
            'delivery_center' => $this->delivery_center,
            'availability' => $this->availability
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getAvailability',
            'setAvailability',
            'getDeliveryCenter',
            'setDeliveryCenter',
            'getValue',
            'setValue'
        ];
    }


}
