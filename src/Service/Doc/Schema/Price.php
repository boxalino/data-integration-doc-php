<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

class Price implements \JsonSerializable
{

    /**
     * @var Array<<string>>
     */
    protected $customer_groups;

    /**
     * @var Array<<Period>>
     */
    protected $periods;

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $list_price;

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $sales_price;

    /**
     * @var Array<<PriceLocalized>>
     */
    protected $gross_margin;

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
     * @param Array $periods
     * @return Price
     */
    public function setPeriods(array $periods): Price
    {
        $this->periods = $periods;
        return $this;
    }

    /**
     * @return Array
     */
    public function getListPrice(): array
    {
        return $this->list_price;
    }

    /**
     * @param Array $list_price
     * @return Price
     */
    public function setListPrice(array $list_price): Price
    {
        $this->list_price = $list_price;
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
     * @param Array $sales_price
     * @return Price
     */
    public function setSalesPrice(array $sales_price): Price
    {
        $this->sales_price = $sales_price;
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
     * @param Array $gross_margin
     * @return Price
     */
    public function setGrossMargin(array $gross_margin): Price
    {
        $this->gross_margin = $gross_margin;
        return $this;
    }


}
