<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Order;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\TypedPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

class Product
    implements DocPropertiesInterface, DocGeneratorInterface
{

    use PropertyToTrait;
    use GeneratorHydratorTrait;
    use TypedPropertiesTrait;

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
     * @var float | null
     */
    protected $unit_list_price;

    /**
     * @var float | null
     */
    protected $unit_sales_price;

    /**
     * @var float | null
     */
    protected $unit_gross_margin;

    /**
     * @var string | null
     */
    protected $quantity;

    /**
     * @var float | null
     */
    protected $total_list_price;

    /**
     * @var float | null
     */
    protected $total_sales_price;

    /**
     * @var float | null
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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Product
     */
    public function setType(?string $type): Product
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
     * @return float|null
     */
    public function getUnitListPrice(): ?float
    {
        return $this->unit_list_price;
    }

    /**
     * @param string|null $unit_list_price
     * @return Product
     */
    public function setUnitListPrice(?string $unit_list_price): Product
    {
        $this->unit_list_price = (float)$unit_list_price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getUnitSalesPrice(): ?float
    {
        return $this->unit_sales_price;
    }

    /**
     * @param string|null $unit_sales_price
     * @return Product
     */
    public function setUnitSalesPrice(?string $unit_sales_price): Product
    {
        $this->unit_sales_price = (float)$unit_sales_price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getUnitGrossMargin(): ?float
    {
        return $this->unit_gross_margin;
    }

    /**
     * @param float|null $unit_gross_margin
     * @return Product
     */
    public function setUnitGrossMargin(?string $unit_gross_margin): Product
    {
        $this->unit_gross_margin = (float)$unit_gross_margin;
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
     * @param string|null $quantity
     * @return Product
     */
    public function setQuantity(?string $quantity): Product
    {
        $this->quantity = (int)$quantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalListPrice(): ?float
    {
        return $this->total_list_price;
    }

    /**
     * @param string|null $total_list_price
     * @return Product
     */
    public function setTotalListPrice(?string $total_list_price): Product
    {
        $this->total_list_price = (float)$total_list_price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalSalesPrice(): ?float
    {
        return $this->total_sales_price;
    }

    /**
     * @param string|null $total_sales_price
     * @return Product
     */
    public function setTotalSalesPrice(?string $total_sales_price): Product
    {
        $this->total_sales_price = (float)$total_sales_price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalGrossMargin(): ?float
    {
        return $this->total_gross_margin;
    }

    /**
     * @param string|null $total_gross_margin
     * @return Product
     */
    public function setTotalGrossMargin(?string $total_gross_margin): Product
    {
        $this->total_gross_margin = (float)$total_gross_margin;
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
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList() : array
    {
        return array_merge(
            [
                'sku_id' => $this->sku_id,
                'connection_property' => $this->connection_property,
                'type' => $this->type,
                'unit_list_price' => $this->unit_list_price,
                'unit_sales_price' => $this->unit_sales_price,
                'unit_gross_margin' => $this->unit_gross_margin,
                'quantity' => $this->quantity,
                'total_list_price' => $this->total_list_price,
                'total_sales_price' => $this->total_sales_price,
                'total_gross_margin' => $this->total_gross_margin,
                'status' => $this->status,
                'status_code' => $this->status_code
            ],
            $this->_toArrayTypedAttributes()
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getType',
            'setType',
            'getSkuId',
            'setSkuId',
            'getConnectionProperty',
            'setConnectionProperty',
            'getUnitListPrice',
            'setUnitListPrice',
            'getUnitSalesPrice',
            'setUnitSalesPrice',
            'getUnitGrossMargin',
            'setUnitGrossMargin',
            'getQuantity',
            'setQuantity',
            'getTotalListPrice',
            'setTotalListPrice',
            'getTotalSalesPrice',
            'setTotalSalesPrice',
            'getTotalGrossMargin',
            'setTotalGrossMargin',
            'getStatus',
            'setStatus',
            'getStatusCode',
            'setStatusCode'
        ];
    }


}
