<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Category implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string | null
     */
    protected $categorization;

    /**
     * @var Array<<Localized>>
     */
    protected $category_ids = [];

    /**
     * @return string|null
     */
    public function getCategorization(): ?string
    {
        return $this->categorization;
    }

    /**
     * @param string|null $categorization
     * @return Category
     */
    public function setCategorization(?string $categorization): Category
    {
        $this->categorization = $categorization;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategoryIds(): array
    {
        return $this->category_ids;
    }

    /**
     * @param array $category_ids
     * @return Category
     */
    public function setCategoryIds(array $category_ids): Category
    {
        $this->category_ids = $category_ids;
        return $this;
    }

    /**
     * @param Localized $category
     * @return $this
     */
    public function addCategoryId(Localized $category)
    {
        $this->category_ids[] = $category->toArray();
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    protected function toArrayList(): array
    {
        return [
            'categorization' => $this->categorization,
            'category_ids' => $this->category_ids
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getCategorization',
            'setCategorization',
            'getCategoryIds',
            'setCategoryIds',
            'addCategoryId'
        ];
    }



}
