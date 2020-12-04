<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Product;

use Boxalino\InstantUpdate\Service\Doc\DocProductTrait;
use Boxalino\InstantUpdate\Service\Doc\Schema\Price;
use Boxalino\InstantUpdate\Service\Doc\Schema\ProductGroupLink;
use Boxalino\InstantUpdate\Service\Doc\Schema\Repeated;
use Boxalino\InstantUpdate\Service\Doc\Schema\Status;
use Boxalino\InstantUpdate\Service\Doc\Schema\Stock;
use Boxalino\InstantUpdate\Service\Doc\Schema\Tag;
use Boxalino\InstantUpdate\Service\Doc\Schema\Visibility;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

class Sku  implements \JsonSerializable
{

    use DocProductTrait;
    use DocPropertiesTrait;

    /** Product Group & SKU specific attributes */

    /**
     * @var Array<<Price>>
     */
    protected $price;

    /**
     * @var Array<<Visibility>>
     */
    protected $visibility;

    /**
     * @var Array<<Status>>
     */
    protected $status;


    /** SKU specific attributes */

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string | null
     */
    protected $sku;

    /**
     * @var string | null
     */
    protected $ean;

    /**
     * @var Array<<ProductGroupLink>>
     */
    protected $additional_product_groups;

    /**
     * @var Array<<Stock>>
     */
    protected $stock;

    /**
     * @var bool
     */
    protected $individually_visible;

    /**
     * @var bool
     */
    protected $show_out_of_stock;

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
    public function setPrice(array $price): self
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return self
     */
    public function setSku(?string $sku): self
    {
        $this->sku = $sku;
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
     * @return self
     */
    public function setEan(?string $ean): self
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return Array
     */
    public function getAdditionalProductGroups(): array
    {
        return $this->additional_product_groups;
    }

    /**
     * @param Array $additional_product_groups
     * @return self
     */
    public function setAdditionalProductGroups(array $additional_product_groups): self
    {
        $this->additional_product_groups = $additional_product_groups;
        return $this;
    }

    /**
     * @param ProductGroupLink $productGroupLink
     * @return $this
     */
    public function addAdditionalProductGroups(ProductGroupLink $productGroupLink) : self
    {
        $this->additional_product_groups[] = $productGroupLink->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getStock(): array
    {
        return $this->stock;
    }

    /**
     * @param Array $stock
     * @return self
     */
    public function setStock(array $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param Stock ...$stocks
     * @return $this
     */
    public function addStock(Stock ...$stocks) : self
    {
        foreach($stocks as $stock)
        {
            $this->stock[] = $stock->toArray();
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isIndividuallyVisible(): bool
    {
        return $this->individually_visible;
    }

    /**
     * @param bool $individually_visible
     * @return self
     */
    public function setIndividuallyVisible(bool $individually_visible): self
    {
        $this->individually_visible = $individually_visible;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowOutOfStock(): bool
    {
        return $this->show_out_of_stock;
    }

    /**
     * @param bool $show_out_of_stock
     * @return self
     */
    public function setShowOutOfStock(bool $show_out_of_stock): self
    {
        $this->show_out_of_stock = $show_out_of_stock;
        return $this;
    }


}
