<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Product;

use Boxalino\InstantUpdate\Service\Doc\DocProductTrait;
use Boxalino\InstantUpdate\Service\Doc\Schema\Pricing;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

class Line implements \JsonSerializable
{

    use DocProductTrait;
    use DocPropertiesTrait;

    /**
     * @var Pricing | null
     */
    protected $pricing;

    /**
     * @var Array<Group>
     */
    protected $product_groups = [];


    /**
     * @return Pricing|null
     */
    public function getPricing(): ?Pricing
    {
        return $this->pricing;
    }

    /**
     * @param Pricing|null $pricing
     * @return Product
     */
    public function setPricing(?Pricing $pricing): self
    {
        $this->pricing = $pricing;
        return $this;
    }

    /**
     * @return Array
     */
    public function getProductGroups(): array
    {
        return $this->product_groups;
    }

    /**
     * @param Array $product_groups
     * @return self
     */
    public function setProductGroups(array $product_groups): self
    {
        $this->product_groups = $product_groups;
        return $this;
    }

    /**
     * @param Group ...$productGroups
     * @return $this
     */
    public function addProductGroup(Group ...$productGroups)
    {
        foreach($productGroups as $productGroup)
        {
            $this->product_groups[] = $productGroup->toArray();
        }

        return $this;
    }

}
