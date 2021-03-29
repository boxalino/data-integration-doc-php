<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Product;

use Boxalino\DataIntegrationDoc\Service\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\ProductGroupLink;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Stock;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Tag;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

class Sku  implements DocGeneratorInterface
{

    use DocProductTrait;
    use DocPropertiesTrait;
    use GeneratorHydratorTrait;

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
    protected $stock = [];

    /**
     * @var bool
     */
    protected $individually_visible = false;

    /**
     * @var bool
     */
    protected $show_out_of_stock = false;

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
     * @param Price $price
     * @return $this
     */
    public function addPrice(Price $price) : self
    {
        $this->price[] = $price->toArray();
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
        $this->visibility[] = $visibility->toArray();
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
    public function setStatus(array $statuss): self
    {
        foreach($statuss as $status)
        {
            $this->status[] = $status->toArray();
        }
        return $this;
    }

    /**
     * @param Status $status
     * @return $this
     */
    public function addStatus(Status $status)
    {
        $this->status[] = $status->toArray();
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
    public function addAdditionalProductGroup(ProductGroupLink $productGroupLink) : self
    {
        $this->additional_product_groups[] = $productGroupLink;
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
        foreach($stock as $data)
        {
            $this->stock[] = $data->toArray();
        }
        return $this;
    }

    /**
     * @param Stock $stock
     * @return $this
     */
    public function addStock(Stock $stock) : self
    {
        $this->stock[] = $stock->toArray();
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
     * @param bool | string | int | null $show_out_of_stock
     * @return self
     */
    public function setShowOutOfStock($show_out_of_stock): self
    {
        $this->show_out_of_stock = (bool) $show_out_of_stock;
        return $this;
    }



}
