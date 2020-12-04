<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Product;

use Boxalino\InstantUpdate\Service\Doc\DocProductTrait;
use Boxalino\InstantUpdate\Service\Doc\Schema\Price;
use Boxalino\InstantUpdate\Service\Doc\Schema\Status;
use Boxalino\InstantUpdate\Service\Doc\Schema\Visibility;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Group
 *
 * @package Boxalino\InstantUpdate\Service\Generator\Product
 */
class Group implements \JsonSerializable
{

    use DocProductTrait;
    use DocPropertiesTrait;

    /** Product Group & SKU specific attributes */

    /**
     * @var Array<<Price>>
     */
    protected $price = [];

    /**
     * @var Array<<Visibility>>
     */
    protected $visibility = [];

    /**
     * @var Array<<Status>>
     */
    protected $status = [];

    /**
     * @var Array<Sku>
     */
    protected $skus;

    /**
     * @return Array
     */
    public function getPrice(): array
    {
        return $this->price;
    }

    /**
     * @param Array $price
     * @return self
     */
    public function setPrice(array $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param Price ...$prices
     * @return $this
     */
    public function addPrice(Price ...$prices) : self
    {
        foreach($prices as $price)
        {
            $this->price[] = $price->toArray();
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getVisibility(): array
    {
        return $this->visibility;
    }

    /**
     * @param Array $visibility
     * @return self
     */
    public function setVisibility(array $visibility): self
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @param Visibility ...$visibilities
     * @return $this
     */
    public function addVisibility(Visibility ...$visibilities) : self
    {
        foreach($visibilities as $visibility)
        {
            $this->visibility[] = $visibility->toArray();
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param Array $status
     * @return self
     */
    public function setStatus(array $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param Status ...$statuses
     * @return $this
     */
    public function addStatus(Status ...$statuses)
    {
        foreach($statuses as $status)
        {
            $this->status[] = $status->toArray();
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getSkus(): array
    {
        return $this->skus;
    }

    /**
     * @param array $skus
     * @return self
     */
    public function setSkus(array $skus): self
    {
        $this->skus = $skus;
        return $this;
    }

    /**
     * @param Sku ...$skus
     * @return $this
     */
    public function addSku(Sku ...$skus)
    {
        foreach($skus as $sku)
        {
            $this->skus[] = $sku->toArray();
        }

        return $this;
    }

}
