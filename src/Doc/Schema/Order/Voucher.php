<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Order;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\TypedAttributesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

class Voucher implements DocPropertiesInterface, DocGeneratorInterface
{

    use GeneratorHydratorTrait;
    use DocPropertiesTrait;
    use TypedAttributesTrait;

    /**
     * @var string | null
     */
    protected $internal_id;

    /**
     * @var string | null
     */
    protected $external_id;

    /**
     * @var array
     */
    protected $voucher_products = [];

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var string | null
     */
    protected $ean;

    /**
     * @var string | null
     */
    protected $label;

    /**
     * @var int | null
     */
    protected $voucher_percentage_value;

    /**
     * @var int | null
     */
    protected $voucher_absolute_value;

    /**
     * @var bool | null
     */
    protected $status;


    /**
     * @return string|null
     */
    public function getInternalId(): ?string
    {
        return $this->internal_id;
    }

    /**
     * @param string|null $internal_id
     * @return Voucher
     */
    public function setInternalId(?string $internal_id): Voucher
    {
        $this->internal_id = $internal_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->external_id;
    }

    /**
     * @param string|null $external_id
     * @return Voucher
     */
    public function setExternalId(?string $external_id): Voucher
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getVoucherProducts(): array
    {
        return $this->voucher_products;
    }

    /**
     * @param array $voucher_products
     * @return Voucher
     */
    public function setVoucherProducts(array $voucher_products): Voucher
    {
        $this->voucher_products = $voucher_products;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Voucher
     */
    public function setType(?string $type): Voucher
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string|null $ean
     * @return Voucher
     */
    public function setEan(?string $ean): Voucher
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return Voucher
     */
    public function setLabel(?string $label): Voucher
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVoucherPercentageValue(): ?int
    {
        return $this->voucher_percentage_value;
    }

    /**
     * @param int|null $voucher_percentage_value
     * @return Voucher
     */
    public function setVoucherPercentageValue($voucher_percentage_value = null): Voucher
    {
        $this->voucher_percentage_value = (float) $voucher_percentage_value;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVoucherAbsoluteValue(): ?int
    {
        return $this->voucher_absolute_value;
    }

    /**
     * @param int|null $voucher_absolute_value
     * @return Voucher
     */
    public function setVoucherAbsoluteValue($voucher_absolute_value = null): Voucher
    {
        $this->voucher_absolute_value = (float) $voucher_absolute_value;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return Voucher
     */
    public function setStatus(?bool $status): Voucher
    {
        $this->status = $status;
        return $this;
    }


}
