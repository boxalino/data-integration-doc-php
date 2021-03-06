<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Price implements DocPropertiesInterface
{
    use DocPropertiesTrait;

    /**
     * @var Array<<string>>
     */
    protected $customer_groups = [];

    /**
     * @var Array<<Period>>
     */
    protected $periods = [];

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $list_price = [];

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $sales_price = [];

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $gross_margin = [];

    /**
     * @var Array<<OtherPriceLocalized>>
     */
    protected $other_prices = [];

    /**
     * @return Array
     */
    public function getCustomerGroups(): array
    {
        return $this->customer_groups;
    }

    /**
     * @param Array $customer_groups
     * @return Price
     */
    public function setCustomerGroups(array $customer_groups): Price
    {
        $this->customer_groups = $customer_groups;
        return $this;
    }

    /**
     * @return Array
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param Array<<Period>> $periods
     * @return Price
     */
    public function setPeriods(array $periods): Price
    {
        foreach($periods as $period)
        {
            $this->periods[] = $period->toArray();
        }
        return $this;
    }

    /**
     * Price before any discount
     *
     * @return Array
     */
    public function getListPrice(): array
    {
        return $this->list_price;
    }

    /**
     * @param Array<<PriceLocalized>> $list_price
     * @return Price
     */
    public function setListPrice(array $list_price): Price
    {
        foreach($list_price as $price)
        {
            $this->list_price[] = $price->toArray();
        }
        return $this;
    }

    /**
     * @param PriceLocalized $priceLocalized
     * @return $this
     */
    public function addListPrice(PriceLocalized $priceLocalized) : Price
    {
        $this->list_price[] = $priceLocalized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getSalesPrice(): array
    {
        return $this->sales_price;
    }

    /**
     * Price displayed to the customers after the discount
     *
     * @param Array<<PriceLocalized>> $sales_price
     * @return Price
     */
    public function setSalesPrice(array $sales_price): Price
    {
        foreach($sales_price as $price)
        {
            $this->sales_price[] = $price->toArray();
        }
        return $this;
    }

    /**
     * @param PriceLocalized $priceLocalized
     * @return $this
     */
    public function addSalesPrice(PriceLocalized $priceLocalized) : Price
    {
        $this->sales_price[] = $priceLocalized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getGrossMargin(): array
    {
        return $this->gross_margin;
    }

    /**
     * @param Array<<PriceLocalized>> $gross_margin
     * @return Price
     */
    public function setGrossMargin(array $gross_margin): Price
    {
        foreach($gross_margin as $price)
        {
            $this->gross_margin[] = $price->toArray();
        }
        return $this;
    }

    /**
     * @return Array
     */
    public function getOtherPrices(): array
    {
        return $this->other_prices;
    }

    /**
     * @param Array<<OtherPriceLocalized>> $other_prices
     * @return Price
     */
    public function setOtherPrices(array $other_prices): Price
    {
        foreach($other_prices as $price)
        {
            $this->other_prices[] = $price->toArray();
        }
        return $this;
    }

}
