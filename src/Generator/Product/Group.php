<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Product;

use Boxalino\DataIntegrationDoc\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\TypedAttributesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Group
 *
 * @package Boxalino\DataIntegrationDoc\Generator\Product
 */
class Group implements DocGeneratorInterface
{
    use DocProductTrait;
    use TypedAttributesTrait;
    use DocPropertiesTrait;
    use GeneratorHydratorTrait;

    /** Product Group specific attributes */

    /**
     * @var array
     */
    protected $pricing = [];

    /**
     * @var array
     */
    protected $price;

    /**
     * @var Array<<Visibility>>
     */
    protected $visibility;

    /**
     * @var array
     */
    protected $attribute_visibility_grouping = [];

    /**
     * @var Array<<Status>>
     */
    protected $status;

    /**
     * @var Array<Sku>
     */
    protected $skus;

    /**
     * @return array
     */
    public function getPricing(): array
    {
        return $this->pricing;
    }

    /**
     * @param Array<<Pricing>> $price
     * @return self
     */
    public function setPricing(array $prices): self
    {
        $this->pricing = $prices;
        return $this;
    }

    /**
     * @param Pricing $price
     * @return $this
     */
    public function addPricing(Pricing $price) : self
    {
        $this->pricing[] = $price->toArray();
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
     * @param array $visibilities
     * @return self
     */
    public function setVisibility(array $visibilities): self
    {
        foreach($visibilities as $visibility)
        {
            if($visibility instanceof DocPropertiesInterface)
            {
                $this->visibility[] = $visibility->toArray();
                continue;
            }

            $this->visibility[] = $visibility;
        }
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
    public function getAttributeVisibilityGrouping(): array
    {
        return $this->attribute_visibility_grouping;
    }

    /**
     * @param array $visibility
     * @return self
     */
    public function setAttributeVisibilityGrouping(array $visibilities): self
    {
        $this->attribute_visibility_grouping = $visibilities;
        return $this;
    }

    /**
     * @param $attributes
     * @return $this
     */
    public function addAttributeVisibilityGrouping($attributes) : self
    {
        foreach($attributes as $attribute)
        {
            $this->attribute_visibility_grouping[] = $attribute;
        }

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
    public function setStatus(array $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array $statuss
     * @return $this
     */
    public function addStatus(array $statuss)
    {
        foreach($statuss as $status)
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
     * @param array $skus
     * @return $this
     */
    public function addSkus(array $skus)
    {
        foreach($skus as $sku)
        {
            $this->skus[] = $sku->toArray();
        }

        return $this;
    }

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
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    protected function toArrayList(): array
    {
        return array_merge(
            [
                'pricing' => $this->pricing,
                'price' => $this->price,
                'visibility' => $this->visibility,
                'attribute_visibility_grouping' => $this->attribute_visibility_grouping,
                'status' => $this->status,
                'skus' => $this->skus
            ],
            $this->_toArrayDocProduct(),
            $this->_toArrayTypedAttributes()
        );
    }

    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getPricing',
                'setPricing',
                'addPricing',
                'getVisibility',
                'setVisibility',
                'addVisibility',
                'getAttributeVisibilityGrouping',
                'setAttributeVisibilityGrouping',
                'addAttributeVisibilityGrouping',
                'getStatus',
                'setStatus',
                'addStatus',
                'getSkus',
                'setSkus',
                'addSkus',
                'getPrice',
                'setPrice',
                'addPrice'
            ],
            $this->_toArrayDocProductClassMethods(),
            $this->_toArrayTypedClassMethods()
        );
    }

}
