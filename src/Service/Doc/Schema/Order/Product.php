<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema\Order;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\DatetimeLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\NumericLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed\StringLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\TypedLocalized;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesInterface;

class Product implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $sku_id = "";

    /**
     * @var string | null
     */
    protected $connection_property;

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var int | null
     */
    protected $unit_list_price;

    /**
     * @var int | null
     */
    protected $unit_sales_price;

    /**
     * @var int | null
     */
    protected $unit_gross_margin;

    /**
     * @var int | null
     */
    protected $quantity;

    /**
     * @var int | null
     */
    protected $total_list_price;

    /**
     * @var int | null
     */
    protected $total_sales_price;

    /**
     * @var int | null
     */
    protected $total_gross_margin;

    /**
     * @var bool | null
     */
    protected $status;

    /**
     * @var string | null
     */
    protected $status_code;

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
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Content
     */
    public function setType(?string $type): Content
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->sku_id;
    }

    /**
     * @param string $sku_id
     * @return Product
     */
    public function setSkuId(string $sku_id): Product
    {
        $this->sku_id = $sku_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConnectionProperty(): ?string
    {
        return $this->connection_property;
    }

    /**
     * @param string|null $connection_property
     * @return Product
     */
    public function setConnectionProperty(?string $connection_property): Product
    {
        $this->connection_property = $connection_property;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitListPrice(): ?int
    {
        return $this->unit_list_price;
    }

    /**
     * @param int|null $unit_list_price
     * @return Product
     */
    public function setUnitListPrice(?int $unit_list_price): Product
    {
        $this->unit_list_price = $unit_list_price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitSalesPrice(): ?int
    {
        return $this->unit_sales_price;
    }

    /**
     * @param int|null $unit_sales_price
     * @return Product
     */
    public function setUnitSalesPrice(?int $unit_sales_price): Product
    {
        $this->unit_sales_price = $unit_sales_price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnitGrossMargin(): ?int
    {
        return $this->unit_gross_margin;
    }

    /**
     * @param int|null $unit_gross_margin
     * @return Product
     */
    public function setUnitGrossMargin(?int $unit_gross_margin): Product
    {
        $this->unit_gross_margin = $unit_gross_margin;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Product
     */
    public function setQuantity(?int $quantity): Product
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalListPrice(): ?int
    {
        return $this->total_list_price;
    }

    /**
     * @param int|null $total_list_price
     * @return Product
     */
    public function setTotalListPrice(?int $total_list_price): Product
    {
        $this->total_list_price = $total_list_price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalSalesPrice(): ?int
    {
        return $this->total_sales_price;
    }

    /**
     * @param int|null $total_sales_price
     * @return Product
     */
    public function setTotalSalesPrice(?int $total_sales_price): Product
    {
        $this->total_sales_price = $total_sales_price;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalGrossMargin(): ?int
    {
        return $this->total_gross_margin;
    }

    /**
     * @param int|null $total_gross_margin
     * @return Product
     */
    public function setTotalGrossMargin(?int $total_gross_margin): Product
    {
        $this->total_gross_margin = $total_gross_margin;
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
     * @return Product
     */
    public function setStatus(?bool $status): Product
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatusCode(): ?string
    {
        return $this->status_code;
    }

    /**
     * @param string|null $status_code
     * @return Product
     */
    public function setStatusCode(?string $status_code): Product
    {
        $this->status_code = $status_code;
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
     * @return Product
     */
    public function setStringAttributes(array $string_attributes): Product
    {
        $this->string_attributes = $string_attributes;
        return $this;
    }

    /**
     * @param StringAttribute ...$repeateds
     * @return $this
     */
    public function addStringAttributes(StringAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->string_attributes[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setLocalizedStringAttributes(array $localized_string_attributes): Product
    {
        $this->localized_string_attributes = $localized_string_attributes;
        return $this;
    }

    /**
     * @param StringLocalizedAttribute ...$repeateds
     * @return $this
     */
    public function addLocalizedStringAttributes(StringLocalizedAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->localized_string_attributes[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setNumericAttributes(array $numeric_attributes): Product
    {
        $this->numeric_attributes = $numeric_attributes;
        return $this;
    }

    /**
     * @param NumericAttribute ...$repeateds
     * @return $this
     */
    public function addNumericAttributes(NumericAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->numeric_attributes[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setLocalizedNumericAttributes(array $localized_numeric_attributes): Product
    {
        $this->localized_numeric_attributes = $localized_numeric_attributes;
        return $this;
    }

    /**
     * @param NumericLocalizedAttribute ...$repeateds
     * @return $this
     */
    public function addLocalizedNumericAttributes(NumericLocalizedAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->localized_numeric_attributes[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setDatetimeAttributes(array $datetime_attributes): Product
    {
        $this->datetime_attributes = $datetime_attributes;
        return $this;
    }

    /**
     * @param DatetimeAttribute ...$repeateds
     * @return $this
     */
    public function addDatetimeAttributes(DatetimeAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->datetime_attributes[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setLocalizedDatetimeAttributes(array $localized_datetime_attributes): Product
    {
        $this->localized_datetime_attributes = $localized_datetime_attributes;
        return $this;
    }

    /**
     * @param DatetimeLocalizedAttribute ...$repeateds
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(DatetimeLocalizedAttribute ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->localized_datetime_attributes[] = $repeated->toArray();
        }

        return $this;
    }


}
