<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Product;

use Boxalino\DataIntegrationDoc\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\TypedPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Line
 *
 * @package Boxalino\DataIntegrationDoc\Generator\Product
 */
class Line implements DocGeneratorInterface
{

    use DocProductTrait;
    use PropertyToTrait;
    use TypedPropertiesTrait;
    use GeneratorHydratorTrait;

    /**
     * @var Pricing | null
     */
    protected $pricing;

    /**
     * @var Array<Group>
     */
    protected $product_groups;

    /**
     * @return Pricing|null
     */
    public function getPricing(): ?Pricing
    {
        return $this->pricing;
    }

    /**
     * @param Pricing|null $pricing
     * @return self
     */
    public function setPricing(?Pricing $pricing): self
    {
        $this->pricing = $pricing;
        return $this;
    }

    /**
     * @return array
     */
    public function getProductGroups(): array
    {
        return $this->product_groups;
    }

    /**
     * @param Array<<Group>> $product_groups
     * @return self
     */
    public function setProductGroups(array $product_groups): self
    {
        foreach($product_groups as $product_group)
        {
            $this->product_groups[] = $product_group->toArray();
        }
        return $this;
    }

    /**
     * @param Group $productGroup
     * @return $this
     */
    public function addProductGroup(Group $productGroup)
    {
        $this->product_groups[] = $productGroup->toArray();
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
                'pricing' => $this->pricing,
                'product_groups' => $this->product_groups
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
                'getPricing',
                'setPricing',
                'getProductGroups',
                'setProductGroups'
            ],
            $this->_toArrayTypedClassMethods(),
            $this->_toArrayDocProductClassMethods()
        );
    }


}
