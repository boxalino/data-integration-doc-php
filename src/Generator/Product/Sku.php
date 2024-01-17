<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Product;

use Boxalino\DataIntegrationDoc\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\ProductGroupLink;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Stock;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\TypedPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

class Sku  implements DocGeneratorInterface
{

    use DocProductTrait;
    use TypedPropertiesTrait;
    use PropertyToTrait;
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
     * @return array
     */
    public function getPrice(): array
    {
        return $this->price;
    }

    /**
     * @param array $price
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
     * @return array
     */
    public function getVisibility(): array
    {
        return $this->visibility;
    }

    /**
     * @param array $visibility
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
     * @return array
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return self
     */
    public function setStatus(array $statuss): self
    {
        $this->status = [];
        foreach($statuss as $status)
        {
            if($status instanceof DocPropertiesInterface)
            {
                $this->status[] = $status->toArray();
                continue;
            }

            $this->status[] = $status;
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
     * @return array
     */
    public function getAdditionalProductGroups(): array
    {
        return $this->additional_product_groups;
    }

    /**
     * @param array $additional_product_groups
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
     * @return array
     */
    public function getStock(): array
    {
        return $this->stock;
    }

    /**
     * @param array $stock
     * @return self
     */
    public function setStock(array $stock): self
    {
        foreach($stock as $data)
        {
            if($data instanceof DocPropertiesInterface)
            {
                $this->stock[] = $stock->toArray();
                continue;
            }

            $this->stock[] = $data;
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    protected function toArrayList(): array
    {
        return array_merge(
            [
                'price' => $this->price,
                'visibility' => $this->visibility,
                'status' => $this->status,
                'type' => $this->type,
                'sku' => $this->sku,
                'ean' => $this->ean,
                'additional_product_groups' => $this->additional_product_groups,
                'stock' => $this->stock,
                'individually_visible' => $this->individually_visible,
                'show_out_of_stock' => $this->show_out_of_stock
            ],
            $this->_toArrayDocProduct(),
            $this->_toArrayTypedAttributes()
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getPrice',
                'setPrice',
                'addPrice',
                'getVisibility',
                'setVisibility',
                'addVisibility',
                'getStatus',
                'setStatus',
                'addStatus',
                'getType',
                'setType',
                'getSku',
                'setSku',
                'getEan',
                'setEan',
                'getAdditionalProductGroups',
                'setAdditionalProductGroups',
                'addAdditionalProductGroup',
                'getStock',
                'setStock',
                'addStock',
                'isIndividuallyVisible',
                'setIndividuallyVisible',
                'isShowOutOfStock',
                'setShowOutOfStock'
            ],
            $this->_toArrayDocProductClassMethods(),
            $this->_toArrayTypedClassMethods()
        );
    }


}
