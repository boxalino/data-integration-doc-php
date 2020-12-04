<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Stock
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Stock implements \JsonSerializable, DocSchemaDefinitionInterface
{
    use DocPropertiesTrait;


    /**
     * @var string | null
     */
    protected $availability;

    /**
     * @var string | null
     */
    protected $delivery_center;

    /**
     * @var int | null
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
     * @param int|null $value
     * @return Stock
     */
    public function setValue(?int $value): Stock
    {
        $this->value = $value;
        return $this;
    }


}
