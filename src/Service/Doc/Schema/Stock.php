<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

/**
 * Class Stock
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class Stock implements DocPropertiesInterface
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


}
