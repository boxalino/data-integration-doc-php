<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Product;

use Boxalino\InstantUpdate\Service\Doc\DocProductTrait;
use Boxalino\InstantUpdate\Service\Doc\Schema\Price;
use Boxalino\InstantUpdate\Service\Doc\Schema\Status;
use Boxalino\InstantUpdate\Service\Doc\Schema\Visibility;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;
use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Group
 *
 * @package Boxalino\InstantUpdate\Service\Generator\Product
 */
class Group implements \JsonSerializable, DocGeneratorInterface
{

    use DocProductTrait;
    use DocPropertiesTrait;
    use GeneratorHydratorTrait;

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
    protected $skus = [];

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

}
