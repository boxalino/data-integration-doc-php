<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class ProductGroupLink
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class ProductGroupLink implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $product_group;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ProductGroupLink
     */
    public function setType(string $type): ProductGroupLink
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductGroup(): string
    {
        return $this->product_group;
    }

    /**
     * @param string $product_group
     * @return ProductGroupLink
     */
    public function setProductGroup(string $product_group): ProductGroupLink
    {
        $this->product_group = $product_group;
        return $this;
    }


}
