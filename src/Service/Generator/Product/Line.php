<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Product;

use Boxalino\DataIntegrationDoc\Service\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Line
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator\Product
 */
class Line implements \JsonSerializable, DocGeneratorInterface
{

    use DocProductTrait;
    use DocPropertiesTrait;
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

}
