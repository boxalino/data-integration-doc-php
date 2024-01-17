<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Category;
use Boxalino\DataIntegrationDoc\Doc\Schema\Label;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Doc\Schema\Product as RelatedProduct;
use Boxalino\DataIntegrationDoc\Doc\Schema\Content as RelatedContent;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;

/**
 * Trait DocProductTrait
 *
 * Grouping of properties for a given doc_X data structure
 * To be used for sync automation logic
 *
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocProductTrait
{

    /**
     * @var string | null
     */
    protected $internal_id;

    /**
     * @var string | null
     */
    protected $external_id;

    /**
     * @var string | null
     */
    protected $label;

    /**
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string (datetime)
     */
    protected $creation;

    /**
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string (datetime)
     */
    protected $last_update;

    /**
     * @var bool
     */
    protected $is_new;

    /**
     * @var bool
     */
    protected $in_sales;

    /**
     * @var Array<<RelatedProduct>>
     */
    protected $product_relations;

    /**
     * @var Array<<RelatedContent>>
     */
    protected $other_relations;

    /**
     * @var Array<<string>>
     */
    protected $stores;

    /**
     * @var Array<<Localized>>
     */
    protected $title;

    /**
     * @var Array<<Localized>>
     */
    protected $description;

    /**
     * @var Array<<Localized>>
     */
    protected $short_description;

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $brands;

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $suppliers;

    /**
     * @var Array<<Category>>
     */
    protected $categories;

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $images;

    /**
     * @var Array<<Localized>>
     */
    protected $link;

    /**
     * @var Array<<Tag>>
     */
    protected $tags;

    /**
     * @var Array<<Label>>
     */
    protected $labels;

    /**
     * @var Array<<Period>>
     */
    protected $periods;

    /**
     * @return string|null
     */
    public function getInternalId(): ?string
    {
        return $this->internal_id;
    }

    /**
     * @param string|null $internal_id
     * @return self
     */
    public function setInternalId(?string $internal_id): self
    {
        $this->internal_id = $internal_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->external_id;
    }

    /**
     * @param string|null $external_id
     * @return self
     */
    public function setExternalId(?string $external_id): self
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return self
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreation(): string
    {
        return $this->creation;
    }

    /**
     * @param string $creation
     * @return self
     */
    public function setCreation(string $creation): self
    {
        $this->creation = is_null($creation) ? "" : date("Y-m-d H:i:s", strtotime($creation));
        return $this;
    }

    /**
     * @return null | string
     */
    public function getLastUpdate(): ?string
    {
        return $this->last_update;
    }

    /**
     * @param string | null $last_update
     * @return self
     */
    public function setLastUpdate(?string $last_update): self
    {
        $this->last_update = is_null($last_update) ? "" : date("Y-m-d H:i:s", strtotime($last_update));
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsNew(): bool
    {
        return $this->is_new;
    }

    /**
     * @param bool $is_new
     * @return self
     */
    public function setIsNew(bool $is_new): self
    {
        $this->is_new = $is_new;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInSales(): bool
    {
        return $this->in_sales;
    }

    /**
     * @param bool $in_sales
     * @return self
     */
    public function setInSales(bool $in_sales): self
    {
        $this->in_sales = $in_sales;
        return $this;
    }

    /**
     * @return array
     */
    public function getProductRelations(): array
    {
        return $this->product_relations;
    }

    /**
     * @param array $product_relations
     * @return self
     */
    public function setProductRelations(array $product_relations): self
    {
        $this->product_relations = $product_relations;
        return $this;
    }

    /**
     * @param array $relatedProducts
     * @return $this
     */
    public function addProductRelations(array $relatedProducts): self
    {
        foreach ($relatedProducts as $product)
        {
            if($product instanceof DocPropertiesInterface)
            {
                $this->product_relations[] = $product->toArray();
                continue;
            }

            $this->product_relations[] = $product;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getOtherRelations(): array
    {
        return $this->other_relations;
    }

    /**
     * @param array $other_relations
     * @return self
     */
    public function setOtherRelations(array $other_relations): self
    {
        $this->other_relations = $other_relations;
        return $this;
    }

    /**
     * @param array $relatedContent
     * @return $this
     */
    public function addOtherRelations(array $relatedContent): self
    {
        foreach ($relatedContent as $content)
        {
            if($content instanceof DocPropertiesInterface)
            {
                $this->other_relations[] = $content->toArray();
                continue;
            }

            $this->other_relations[] = $content;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * @param array $stores
     * @return self
     */
    public function setStores(array $stores): self
    {
        $this->stores = $stores;
        return $this;
    }

    /**
     * @param string $store
     * @return $this
     */
    public function addStore(string $store): self
    {
        $this->stores[] = $store;
        return $this;
    }

    /**
     * @return array
     */
    public function getTitle(): array
    {
        return $this->title;
    }

    /**
     * @param array $title
     * @return self
     */
    public function setTitle(array $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param array $localizeds
     * @return $this
     */
    public function addTitle(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->title[] = $localized->toArray();
                continue;
            }

            $this->title[] = $localized;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param array $description
     * @return self
     */
    public function setDescription(array $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param Array<<Localized>> $localized
     * @return $this
     */
    public function addDescription(array $descriptions): self
    {
        foreach($descriptions as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->description[] = $localized->toArray();
                continue;
            }

            $this->description[] = $localized;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getShortDescription(): array
    {
        return $this->short_description;
    }

    /**
     * @param array $short_description
     * @return self
     */
    public function setShortDescription(array $short_description): self
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @param Array<<Localized>> $localized
     * @return self
     */
    public function addShortDescription(array $descriptions): self
    {
        foreach($descriptions as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->short_description[] = $localized->toArray();
                continue;
            }

            $this->short_description[] = $localized;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @param array $brands
     * @return self
     */
    public function setBrands(array $brands): self
    {
        $this->brands = $brands;
        return $this;
    }

    /**
     * @param  Array<<RepeatedGenericLocalized>> $localizeds
     * @return $this
     */
    public function addBrands(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->brands[] = $localized->toArray();
                continue;
            }

            $this->brands[] = $localized;
        }

        return $this;
    }

    /**
     * @param RepeatedGenericLocalized $localized
     * @return $this
     */
    public function addBrand(RepeatedGenericLocalized $localized): self
    {
        $this->brands[] = $localized->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getSuppliers(): array
    {
        return $this->suppliers;
    }

    /**
     * @param array $suppliers
     * @return self
     */
    public function setSuppliers(array $suppliers): self
    {
        $this->suppliers = $suppliers;
        return $this;
    }

    /**
     * @param Array<<RepeatedGenericLocalized>> $localizeds
     * @return $this
     */
    public function addSuppliers(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->suppliers[] = $localized->toArray();
                continue;
            }

            $this->suppliers[] = $localized;
        }

        return $this;
    }

    /**
     * @param RepeatedGenericLocalized $localized
     * @return $this
     */
    public function addSupplier(RepeatedGenericLocalized  $localized): self
    {
        $this->suppliers[] = $localized->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     * @return self
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @param Array<<Category>> $categories
     * @return self
     */
    public function addCategories(array $categories): self
    {
        foreach($categories as $category)
        {
            if($category instanceof DocPropertiesInterface)
            {
                $this->categories[] = $category->toArray();
                continue;
            }

            $this->categories[] = $category;
        }

        return $this;
    }

    /**
     * @param Category $category
     * @return self
     */
    public function addCategory(Category $category): self
    {
        $this->categories[] = $category->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     * @return self
     */
    public function setImages(array $images): self
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @TODO do the images have to be localized!? won`t it be data redundancy?
     * @param Array<<RepeatedGenericLocalized>> $repeateds
     * @return $this
     */
    public function addImages(array $repeateds): self
    {
        foreach($repeateds as $repeated)
        {
            if($repeated instanceof DocPropertiesInterface)
            {
                $this->images[] = $repeated->toArray();
                continue;
            }

            $this->images[] = $repeated;
        }

        return $this;
    }

    /**
     * @TODO do the images have to be localized!? won`t it be data redundancy?
     * @param RepeatedGenericLocalized $repeated
     * @return $this
     */
    public function addImage(RepeatedGenericLocalized  $repeated): self
    {
        $this->images[] = $repeated->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getLink(): array
    {
        return $this->link;
    }

    /**
     * @param array $link
     * @return self
     */
    public function setLink(array $link): self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param Array<<Localized>> $localizeds
     * @return $this
     */
    public function addLink(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            if($localized instanceof DocPropertiesInterface)
            {
                $this->link[] = $localized->toArray();
                continue;
            }

            $this->link[] = $localized;
        }

        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addLinks(Localized  $localized): self
    {
        $this->link[] = $localized->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return self
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param Array<<Tag>> $tags
     * @return $this
     */
    public function addTags(array $tags): self
    {
        foreach($tags as $tag)
        {
            if($tag instanceof DocPropertiesInterface)
            {
                $this->tags[] = $tag->toArray();
                continue;
            }

            $this->tags[] = $tag;
        }

        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag): self
    {
        $this->tags[] = $tag->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param Array<<Label>> $labels
     * @return self
     */
    public function setLabels(array $labels): self
    {
        $this->labels[] = $labels;
        return $this;
    }

    /**
     * @param Label $label
     * @return $this
     */
    public function addLabel(Label $label): self
    {
        $this->labels[] = $label->toArray();
        return $this;
    }

    /**
     * @param array $labels
     * @return $this
     */
    public function addLabels(array $labels): self
    {
        foreach($labels as $label)
        {
            if($label instanceof DocPropertiesInterface)
            {
                $this->labels[] = $label->toArray();
                continue;
            }

            $this->labels[] = $label;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param array $periods
     * @return self
     */
    public function setPeriods(array $periods): self
    {
        $this->periods = $periods;
        return $this;
    }

    /**
     * @param Array<<Period>> $periods
     * @return $this
     */
    public function addPeriods(array $periods): self
    {
        foreach ($periods as $period)
        {
            if($period instanceof DocPropertiesInterface)
            {
                $this->periods[] = $period->toArray();
                continue;
            }

            $this->periods[] = $period;
        }

        return $this;
    }

    /**
     * @param Period $period
     * @return $this
     */
    public function addPeriod(Period $period): self
    {
        $this->periods[] = $period->toArray();
        return $this;
    }

    /**
     * @return array
     */
    protected function _toArrayDocProduct() : array
    {
        return array_filter(
            [
                'internal_id' => $this->internal_id,
                'external_id' => $this->external_id,
                'label' => $this->label,
                'creation' => $this->creation,
                'last_update' => $this->last_update,
                'is_new' => $this->is_new,
                'in_sales' => $this->in_sales,
                'product_relations' => $this->product_relations,
                'other_relations' => $this->other_relations,
                'stores' => $this->stores,
                'title' => $this->title,
                'description' => $this->description,
                'short_description' => $this->short_description,
                'brands' => $this->brands,
                'suppliers' => $this->suppliers,
                'categories' => $this->categories,
                'images' => $this->images,
                'link' => $this->link,
                'tags' => $this->tags,
                'labels' => $this->labels,
                'periods' => $this->periods
            ]
        );
    }

    /**
     * @return array
     */
    protected function _toArrayDocProductClassMethods() : array
    {
        return [
            'getInternalId',
            'setInternalId',
            'getExternalId',
            'setExternalId',
            'getLabel',
            'setLabel',
            'getCreation',
            'setCreation',
            'getLastUpdate',
            'setLastUpdate',
            'isIsNew',
            'setIsNew',
            'isInSales',
            'setInSales',
            'getProductRelations',
            'setProductRelations',
            'addProductRelations',
            'getOtherRelations',
            'setOtherRelations',
            'addOtherRelations',
            'getStores',
            'setStores',
            'addStore',
            'getTitle',
            'setTitle',
            'addTitle',
            'getDescription',
            'setDescription',
            'addDescription',
            'getShortDescription',
            'setShortDescription',
            'addShortDescription',
            'getBrands',
            'setBrands',
            'addBrands',
            'addBrand',
            'getSuppliers',
            'setSuppliers',
            'addSuppliers',
            'addSupplier',
            'getCategories',
            'setCategories',
            'addCategories',
            'addCategory',
            'getImages',
            'setImages',
            'addImages',
            'addImage',
            'getLink',
            'setLink',
            'addLink',
            'addLinks',
            'getTags',
            'setTags',
            'addTags',
            'addTag',
            'getLabels',
            'setLabels',
            'addLabel',
            'addLabels',
            'getPeriods',
            'setPeriods',
            'addPeriods',
            'addPeriod'
        ];
    }


}
