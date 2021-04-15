<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Order;

use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Voucher implements DocPropertiesInterface
{

    use DocPropertiesTrait;

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
     * @var Array<<StringAttribute>>
     */
    protected $string_attributes = [];

    /**
     * @var Array<<StringLocalizedAttribute>>
     */
    protected $localized_string_attributes = [];

    /**
     * @var Array<<NumericAttribute>>
     */
    protected $numeric_attributes = [];

    /**
     * @var Array<<NumericLocalizedAttribute>>
     */
    protected $localized_numeric_attributes = [];

    /**
     * @var Array<<DatetimeAttribute>>
     */
    protected $datetime_attributes = [];

    /**
     * @var Array<<DatetimeLocalizedAttribute>>
     */
    protected $localized_datetime_attributes = [];

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

    /**
     * @return Array
     */
    public function getStringAttributes(): array
    {
        return $this->string_attributes;
    }

    /**
     * @param Array $string_attributes
     * @return Voucher
     */
    public function setStringAttributes(array $string_attributes): Voucher
    {
        $this->string_attributes = $string_attributes;
        return $this;
    }

    /**
     * @param StringAttribute $attribute
     * @return $this
     */
    public function addStringAttributes(StringAttribute $attribute) : self
    {
        $this->string_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedStringAttributes(): array
    {
        return $this->localized_string_attributes;
    }

    /**
     * @param Array $localized_string_attributes
     * @return Voucher
     */
    public function setLocalizedStringAttributes(array $localized_string_attributes): Voucher
    {
        $this->localized_string_attributes = $localized_string_attributes;
        return $this;
    }

    /**
     * @param StringLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedStringAttributes(StringLocalizedAttribute $attribute) : self
    {
        $this->localized_string_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getNumericAttributes(): array
    {
        return $this->numeric_attributes;
    }

    /**
     * @param Array $numeric_attributes
     * @return Voucher
     */
    public function setNumericAttributes(array $numeric_attributes): Voucher
    {
        $this->numeric_attributes = $numeric_attributes;
        return $this;
    }

    /**
     * @param NumericAttribute $attribute
     * @return $this
     */
    public function addNumericAttributes(NumericAttribute $attribute) : self
    {
        $this->numeric_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedNumericAttributes(): array
    {
        return $this->localized_numeric_attributes;
    }

    /**
     * @param Array $localized_numeric_attributes
     * @return Voucher
     */
    public function setLocalizedNumericAttributes(array $localized_numeric_attributes): Voucher
    {
        $this->localized_numeric_attributes = $localized_numeric_attributes;
        return $this;
    }

    /**
     * @param NumericLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedNumericAttributes(NumericLocalizedAttribute $attribute) : self
    {
        $this->localized_numeric_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getDatetimeAttributes(): array
    {
        return $this->datetime_attributes;
    }

    /**
     * @param Array $datetime_attributes
     * @return Voucher
     */
    public function setDatetimeAttributes(array $datetime_attributes): Voucher
    {
        $this->datetime_attributes = $datetime_attributes;
        return $this;
    }

    /**
     * @param DatetimeAttribute $attribute
     * @return $this
     */
    public function addDatetimeAttributes(DatetimeAttribute $attribute) : self
    {
        $this->datetime_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedDatetimeAttributes(): array
    {
        return $this->localized_datetime_attributes;
    }

    /**
     * @param Array $localized_datetime_attributes
     * @return Voucher
     */
    public function setLocalizedDatetimeAttributes(array $localized_datetime_attributes): Voucher
    {
        $this->localized_datetime_attributes = $localized_datetime_attributes;
        return $this;
    }

    /**
     * @param DatetimeLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(DatetimeLocalizedAttribute $attribute) : self
    {
        $this->localized_datetime_attributes[] = $attribute->toArray();
        return $this;
    }


}
