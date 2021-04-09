<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Product;

use Boxalino\DataIntegrationDoc\Doc\DocProductTrait;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
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
    use DocPropertiesTrait;
    use GeneratorHydratorTrait;

    /** Product Group specific attributes */

    /**
     * @var Array
     */
    protected $pricing = [];

    /**
     * @var Array
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

    /**
     * @var Array<Sku>
     */
    protected $skus;

    /**
     * @return Array
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
        foreach($prices as $price)
        {
            $this->pricing[] = $price->toArray();
        }
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
     * @return Array
     */
    public function getVisibility(): array
    {
        return $this->visibility;
    }

    /**
     * @param Array $visibilities
     * @return self
     */
    public function setVisibility(array $visibilities): self
    {
        foreach($visibilities as $visibility)
        {
            $this->visibility[] = $visibility->toArray();
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


}
