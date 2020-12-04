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
     * @param Price $price
     * @return $this
     */
    public function addPrice(Price $price) : self
    {
        $this->price[] = $price;
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
     * @param Visibility $visibility
     * @return $this
     */
    public function addVisibility(Visibility $visibility) : self
    {
        $this->visibility[] = $visibility;
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
     * @param Status $status
     * @return $this
     */
    public function addStatus(Status $status)
    {
        $this->status[] = $status;
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
     * @param Sku $sku
     * @return $this
     */
    public function addSku(Sku $sku)
    {
        $this->skus[] = $sku;
        return $this;
    }

}
