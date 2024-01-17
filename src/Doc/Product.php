<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Category;
use Boxalino\DataIntegrationDoc\Doc\Schema\Label;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\Schema\Product as RelatedProduct;
use Boxalino\DataIntegrationDoc\Doc\Schema\Content as RelatedContent;
use Boxalino\DataIntegrationDoc\Doc\Schema\ProductGroupLink;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Stock;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;

/**
 * doc_product data structure
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252149870/doc+product
 */
class Product implements DocPropertiesInterface
{

    use PropertyToTrait;
    use TypedPropertiesTrait;

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
     * @var string (datetime)
     */
    protected $creation;

    /**
     * @var string (datetime)
     */
    protected $last_update;

    /**
     * @var bool
     */
    protected $is_new = false;

    /**
     * @var bool
     */
    protected $in_sales = false;

    /**
     * @var Array<<RelatedProduct>>
     */
    protected $product_relations = [];

    /**
     * @var Array<<RelatedContent>>
     */
    protected $other_relations = [];

    /**
     * @var Array<<string>>
     */
    protected $stores = [];

    /**
     * @var Array<<Localized>>
     */
    protected $title = [];

    /**
     * @var Array<<Localized>>
     */
    protected $description = [];

    /**
     * @var Array<<Localized>>
     */
    protected $short_description = [];

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $brands = [];

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $suppliers = [];

    /**
     * @var Array<<Category>>
     */
    protected $categories = [];

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $images = [];

    /**
     * @var Array<<Localized>>
     */
    protected $link = [];

    /**
     * @var Array<<Tag>>
     */
    protected $tags = [];

    /**
     * @var Array<<Label>>
     */
    protected $labels = [];

    /**
     * @var Array<<Period>>
     */
    protected $periods = [];

    /** Product - Line specific attributes */

    /**
     * @var Pricing | null
     */
    protected $pricing;


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
     * @var Array<<string>>
     */
    protected $attribute_visibility_grouping = [];

    /**
     * @var Array<<Status>>
     */
    protected $status = [];


    /** SKU specific attributes */

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string | null
     */
    protected $sku;

    /**
     * @var string | null
     */
    protected $ean;

    /**
     * @var Array<<ProductGroupLink>>
     */
    protected $additional_product_groups = [];

    /**
     * @var Array<<Stock>>
     */
    protected $stock = [];

    /**
     * @var bool
     */
    protected $individually_visible;

    /**
     * @var bool
     */
    protected $show_out_of_stock;

    /**
     * @return string|null
     */
    public function getInternalId(): ?string
    {
        return $this->internal_id;
    }

    /**
     * @param string|null $internal_id
     * @return Product
     */
    public function setInternalId(?string $internal_id): Product
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
     * @return Product
     */
    public function setExternalId(?string $external_id): Product
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
     * @return Product
     */
    public function setLabel(?string $label): Product
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
     * @return Product
     */
    public function setCreation(string $creation): Product
    {
        $this->creation = $creation;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdate(): string
    {
        return $this->last_update;
    }

    /**
     * @param string $last_update
     * @return Product
     */
    public function setLastUpdate(string $last_update): Product
    {
        $this->last_update = $last_update;
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
     * @return Product
     */
    public function setIsNew(bool $is_new): Product
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
     * @return Product
     */
    public function setInSales(bool $in_sales): Product
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
     * @return Product
     */
    public function setProductRelations(array $product_relations): Product
    {
        $this->product_relations = $product_relations;
        return $this;
    }

    /**
     * @param RelatedProduct ...$relatedProducts
     * @return $this
     */
    public function addProductRelations(RelatedProduct ...$relatedProducts) : self
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
     * @return Product
     */
    public function setOtherRelations(array $other_relations): Product
    {
        $this->other_relations = $other_relations;
        return $this;
    }

    /**
     * @param RelatedContent ...$relatedContent
     * @return $this
     */
    public function addOtherRelations(RelatedContent ...$relatedContent) : self
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
     * @return Product
     */
    public function setStores(array $stores): Product
    {
        $this->stores = $stores;
        return $this;
    }

    /**
     * @param string $store
     * @return $this
     */
    public function addStore(string $store) : self
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
     * @return Product
     */
    public function setTitle(array $title): Product
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addTitle(Localized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->title[] = $localized->toArray();
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
     * @return Product
     */
    public function setDescription(array $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addDescription(Localized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->description[] = $localized->toArray();
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
     * @return Product
     */
    public function setShortDescription(array $short_description): Product
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addShortDescription(Localized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->short_description[] = $localized->toArray();
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
     * @return Product
     */
    public function setBrands(array $brands): Product
    {
        $this->brands = $brands;
        return $this;
    }

    /**
     * @param RepeatedGenericLocalized ...$localizeds
     * @return $this
     */
    public function addBrands(RepeatedGenericLocalized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->brands[] = $localized->toArray();
        }

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
     * @return Product
     */
    public function setSuppliers(array $suppliers): Product
    {
        $this->suppliers = $suppliers;
        return $this;
    }

    /**
     * @param RepeatedGenericLocalized ...$localizeds
     * @return $this
     */
    public function addSuppliers(RepeatedGenericLocalized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->suppliers[] = $localized->toArray();
        }

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
     * @return Product
     */
    public function setCategories(array $categories): Product
    {
        $this->categories = $categories;
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
     * @return Product
     */
    public function setImages(array $images): Product
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @param RepeatedGenericLocalized ...$repeateds
     * @return $this
     */
    public function addImages(RepeatedGenericLocalized  ...$repeateds) : self
    {
        foreach($repeateds as $repeated)
        {
            $this->images[] = $repeated->toArray();
        }

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
     * @return Product
     */
    public function setLink(array $links): Product
    {
        foreach($links as $link)
        {
            if($link instanceof DocPropertiesInterface)
            {
                $this->link[] = $link->toArray();
                continue;
            }

            $this->link[] = $link;
        }
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addLink(Localized  ...$localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->link[] = $localized->toArray();
        }

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
     * @return Product
     */
    public function setTags(array $tags): Product
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param Tag ...$tags
     * @return $this
     */
    public function addTags(Tag  ...$tags) : self
    {
        foreach($tags as $tag)
        {
            $this->tags[] = $tag->toArray();
        }

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
     * @param array $labels
     * @return Product
     */
    public function setLabels(array $labels): Product
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @param Label ...$labels
     * @return $this
     */
    public function addLabels(Label  ...$labels) : self
    {
        foreach($labels as $label)
        {
            $this->labels[] = $label->toArray();
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
     * @return Product
     */
    public function setPeriods(array $periods): Product
    {
        $this->periods = $periods;
        return $this;
    }

    /**
     * @param Period ...$periods
     * @return $this
     */
    public function addPeriods(Period  ...$periods) : self
    {
        foreach($periods as $period)
        {
            $this->periods[] = $period->toArray();
        }

        return $this;
    }

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
    public function setPricing(?Pricing $pricing): Product
    {
        $this->pricing = $pricing;
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
     * @return Product
     */
    public function setPrice(array $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param Price ...$prices
     * @return $this
     */
    public function addPrice(Price ...$prices) : self
    {
        foreach($prices as $price)
        {
            $this->price[] = $price->toArray();
        }

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
     * @param array $visibility
     * @return Product
     */
    public function setVisibility(array $visibility): Product
    {
        $this->visibility = $visibility;
        return $this;
    }

    /**
     * @param Visibility ...$visibilities
     * @return $this
     */
    public function addVisibility(Visibility ...$visibilities) : self
    {
        foreach($visibilities as $visibility)
        {
            $this->visibility[] = $visibility->toArray();
        }

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
     * @return Product
     */
    public function setAttributeVisibilityGrouping(array $visibilities): Product
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
     * @return Product
     */
    public function setStatus(array $status): Product
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param Status ...$statuses
     * @return $this
     */
    public function addStatus(Status ...$statuses)
    {
        foreach($statuses as $status)
        {
            $this->status[] = $status->toArray();
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Product
     */
    public function setType(string $type): Product
    {
        $this->type = $type;
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
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string|null $ean
     * @return Product
     */
    public function setEan(?string $ean): Product
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return array
     */
    public function getAdditionalProductGroups(): array
    {
        return $this->additional_product_groups;
    }

    /**
     * @param array $additional_product_groups
     * @return Product
     */
    public function setAdditionalProductGroups(array $additional_product_groups): Product
    {
        $this->additional_product_groups = $additional_product_groups;
        return $this;
    }

    /**
     * @param ProductGroupLink $productGroupLink
     * @return $this
     */
    public function addAdditionalProductGroups(ProductGroupLink $productGroupLink) : Product
    {
        $this->additional_product_groups[] = $productGroupLink->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getStock(): array
    {
        return $this->stock;
    }

    /**
     * @param array $stock
     * @return Product
     */
    public function setStock(array $stock): Product
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @param Stock ...$stocks
     * @return $this
     */
    public function addStock(Stock ...$stocks) : self
    {
        foreach($stocks as $stock)
        {
            $this->stock[] = $stock->toArray();
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isIndividuallyVisible(): bool
    {
        return $this->individually_visible;
    }

    /**
     * @param bool $individually_visible
     * @return Product
     */
    public function setIndividuallyVisible(bool $individually_visible): Product
    {
        $this->individually_visible = $individually_visible;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowOutOfStock(): bool
    {
        return $this->show_out_of_stock;
    }

    /**
     * @param bool $show_out_of_stock
     * @return Product
     */
    public function setShowOutOfStock(bool $show_out_of_stock): Product
    {
        $this->show_out_of_stock = $show_out_of_stock;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(
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
                'periods' => $this->periods,
                'pricing' => $this->pricing,
                'price' => $this->price,
                'visibility' => $this->visibility,
                'attribute_visibility_grouping' => $this->attribute_visibility_grouping,
                'status' => $this->status,
                'type' => $this->type,
                'sku' => $this->sku,
                'ean' => $this->ean,
                'additional_product_groups' => $this->additional_product_groups,
                'stock' => $this->stock,
                'individually_visible' => $this->individually_visible,
                'show_out_of_stock' => $this->show_out_of_stock
            ],
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
                'getSuppliers',
                'setSuppliers',
                'addSuppliers',
                'getCategories',
                'setCategories',
                'getImages',
                'setImages',
                'addImages',
                'getLink',
                'setLink',
                'addLink',
                'getTags',
                'setTags',
                'addTags',
                'getLabels',
                'setLabels',
                'addLabels',
                'getPeriods',
                'setPeriods',
                'addPeriods',
                'getPricing',
                'setPricing',
                'getPrice',
                'setPrice',
                'addPrice',
                'getVisibility',
                'setVisibility',
                'addVisibility',
                'getAttributeVisibilityGrouping',
                'setAttributeVisibilityGrouping',
                'addAttributeVisibilityGrouping',
                'getStatus',
                'setStatus',
                'addStatus',
                'getType',
                'setType',
                'getSku',
                'setSku',
                'getEan',
                'setEan',
                'getAdditionalProductGroups',
                'setAdditionalProductGroups',
                'addAdditionalProductGroups',
                'getStock',
                'setStock',
                'addStock',
                'isIndividuallyVisible',
                'setIndividuallyVisible',
                'isShowOutOfStock',
                'setShowOutOfStock'
            ],
            $this->_toArrayTypedClassMethods()
        );
    }


}
