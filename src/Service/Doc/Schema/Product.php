<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;

class Product implements \JsonSerializable, DocSchemaDefinitionInterface
{

    use DocPropertiesTrait;

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var string | null
     */
    protected $name;

    /**
     * @var string | null
     */
    protected $product_line;

    /**
     * @var string | null
     */
    protected $product_group;

    /**
     * @var string | null
     */
    protected $sku;

    /**
     * @var int | null
     */
    protected $value;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Product
     */
    public function setType(?string $type): Product
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Product
     */
    public function setName(?string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductLine(): ?string
    {
        return $this->product_line;
    }

    /**
     * @param string|null $product_line
     * @return Product
     */
    public function setProductLine(?string $product_line): Product
    {
        $this->product_line = $product_line;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductGroup(): ?string
    {
        return $this->product_group;
    }

    /**
     * @param string|null $product_group
     * @return Product
     */
    public function setProductGroup(?string $product_group): Product
    {
        $this->product_group = $product_group;
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
     * @return Product
     */
    public function setSku(?string $sku): Product
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * @param int|null $value
     * @return Product
     */
    public function setValue(?int $value): Product
    {
        $this->value = $value;
        return $this;
    }


}
