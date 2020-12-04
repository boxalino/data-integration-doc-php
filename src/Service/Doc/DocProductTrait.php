<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc;

use Boxalino\InstantUpdate\Service\Doc\Schema\Category;
use Boxalino\InstantUpdate\Service\Doc\Schema\Label;
use Boxalino\InstantUpdate\Service\Doc\Schema\Localized;
use Boxalino\InstantUpdate\Service\Doc\Schema\Map;
use Boxalino\InstantUpdate\Service\Doc\Schema\Period;
use Boxalino\InstantUpdate\Service\Doc\Schema\Product as RelatedProduct;
use Boxalino\InstantUpdate\Service\Doc\Schema\Content as RelatedContent;
use Boxalino\InstantUpdate\Service\Doc\Schema\ProductGroupLink;
use Boxalino\InstantUpdate\Service\Doc\Schema\Repeated;
use Boxalino\InstantUpdate\Service\Doc\Schema\RepeatedLocalized;
use Boxalino\InstantUpdate\Service\Doc\Schema\Tag;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed\NumericAttribute;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed\StringAttribute;
use Boxalino\InstantUpdate\Service\Doc\Schema\TypedLocalized;

/**
 * Trait DocProductTrait
 * Base for common properties on product document
 *
 * @package Boxalino\InstantUpdate\Service\Doc
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
     * @var Array<<RepeatedLocalized>>
     */
    protected $brands;

    /**
     * @var Array<<RepeatedLocalized>>
     */
    protected $suppliers;

    /**
     * @var Array<<Category>>
     */
    protected $categories;

    /**
     * @var Array<<RepeatedLocalized>>
     */
    protected $images;

    /**
     * @var Array<<RepeatedLocalized>>
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
     * @var Array<<StringAttribute>>
     */
    protected $string_attributes;

    /**
     * @var Array<<TypedLocalized>>
     */
    protected $localized_string_attributes;

    /**
     * @var Array<<NumericAttribute>>
     */
    protected $numeric_attributes;

    /**
     * @var Array<<TypedLocalized>>
     */
    protected $localized_numeric_attributes;

    /**
     * @var Array<<DatetimeAttribute>>
     */
    protected $datetime_attributes;

    /**
     * @var Array<<TypedLocalized>>
     */
    protected $localized_datetime_attributes;

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
     * @return self
     */
    public function setLastUpdate(string $last_update): self
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
     * @return Array
     */
    public function getProductRelations(): array
    {
        return $this->product_relations;
    }

    /**
     * @param Array $product_relations
     * @return self
     */
    public function setProductRelations(array $product_relations): self
    {
        $this->product_relations = $product_relations;
        return $this;
    }

    /**
     * @param RelatedProduct ...$relatedProducts
     * @return $this
     */
    public function addProductRelations(RelatedProduct ...$relatedProducts): self
    {
        foreach ($relatedProducts as $product) {
            $this->product_relations[] = $product;
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getOtherRelations(): array
    {
        return $this->other_relations;
    }

    /**
     * @param Array $other_relations
     * @return self
     */
    public function setOtherRelations(array $other_relations): self
    {
        $this->other_relations = $other_relations;
        return $this;
    }

    /**
     * @param RelatedContent ...$relatedContent
     * @return $this
     */
    public function addOtherRelations(RelatedContent ...$relatedContent): self
    {
        foreach ($relatedContent as $content) {
            $this->other_relations[] = $content;
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * @param Array $stores
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
     * @return Array
     */
    public function getTitle(): array
    {
        return $this->title;
    }

    /**
     * @param Array $title
     * @return self
     */
    public function setTitle(array $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addTitle(Localized $localized): self
    {
        $this->title[] = $localized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param Array $description
     * @return self
     */
    public function setDescription(array $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addDescription(Localized $localized): self
    {
        $this->description[] = $localized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getShortDescription(): array
    {
        return $this->short_description;
    }

    /**
     * @param Array $short_description
     * @return self
     */
    public function setShortDescription(array $short_description): self
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return self
     */
    public function addShortDescription(Localized $localized): self
    {
        $this->short_description[] = $localized->toArray();
        return $this;
    }

    /**
     * @return Array
     */
    public function getBrands(): array
    {
        return $this->brands;
    }

    /**
     * @param Array $brands
     * @return self
     */
    public function setBrands(array $brands): self
    {
        $this->brands = $brands;
        return $this;
    }

    /**
     * @param RepeatedLocalized ...$localizeds
     * @return $this
     */
    public function addBrands(RepeatedLocalized ...$localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->brands[] = $localized;
        }

        return $this;
    }

    /**
     * @param RepeatedLocalized $localized
     * @return $this
     */
    public function addBrand(RepeatedLocalized $localized): self
    {
        $this->brands[] = $localized;
        return $this;
    }

    /**
     * @return Array
     */
    public function getSuppliers(): array
    {
        return $this->suppliers;
    }

    /**
     * @param Array $suppliers
     * @return self
     */
    public function setSuppliers(array $suppliers): self
    {
        $this->suppliers = $suppliers;
        return $this;
    }

    /**
     * @param RepeatedLocalized ...$localizeds
     * @return $this
     */
    public function addSuppliers(RepeatedLocalized  $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->suppliers[] = $localized;
        }

        return $this;
    }

    /**
     * @param RepeatedLocalized $localized
     * @return $this
     */
    public function addSupplier(RepeatedLocalized  $localized): self
    {
        $this->suppliers[] = $localized;
        return $this;
    }

    /**
     * @return Array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Array $categories
     * @return self
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @param Category ...$categories
     * @return self
     */
    public function addCategories(Category ...$categories): self
    {
        foreach($categories as $category)
        {
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
        $this->categories[] = $category;
        return $this;
    }

    /**
     * @return Array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param Array $images
     * @return self
     */
    public function setImages(array $images): self
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @TODO do the images have to be localized!? won`t it be data redundancy?
     * @param RepeatedLocalized ...$repeateds
     * @return $this
     */
    public function addImages(RepeatedLocalized  ...$repeateds): self
    {
        foreach($repeateds as $repeated)
        {
            $this->images[] = $repeated;
        }

        return $this;
    }

    /**
     * @TODO do the images have to be localized!? won`t it be data redundancy?
     * @param RepeatedLocalized $repeated
     * @return $this
     */
    public function addImage(RepeatedLocalized  $repeated): self
    {
        $this->images[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLink(): array
    {
        return $this->link;
    }

    /**
     * @param Array $link
     * @return self
     */
    public function setLink(array $link): self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param Localized ...$localizeds
     * @return $this
     */
    public function addLinks(Localized ...$localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->link[] = $localized;
        }

        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addLink(Localized  $localized): self
    {
        $this->link[] = $localized;
        return $this;
    }

    /**
     * @return Array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Array $tags
     * @return self
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @param Tag ...$tags
     * @return $this
     */
    public function addTags(Tag ...$tags): self
    {
        foreach($tags as $tag)
        {
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
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }

    /**
     * @param Array $labels
     * @return self
     */
    public function setLabels(array $labels): self
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * @param Label $label
     * @return $this
     */
    public function addLabel(Label $label): self
    {
        $this->labels[] = $label;
        return $this;
    }

    /**
     * @param Label ...$labels
     * @return $this
     */
    public function addLabels(Label ...$labels): self
    {
        foreach($labels as $label)
        {
            $this->labels[] = $label;
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param Array $periods
     * @return self
     */
    public function setPeriods(array $periods): self
    {
        $this->periods = $periods;
        return $this;
    }

    /**
     * @param Period ...$periods
     * @return $this
     */
    public function addPeriods(Period  ...$periods): self
    {
        foreach ($periods as $period) {
            $this->periods[] = $period->toArray();
        }

        return $this;
    }

    /**
     * @param Period $period
     * @return $this
     */
    public function addPeriod(Period  $period): self
    {
        $this->periods[] = $period;
        return $this;
    }

    /**
     * @return Array
     */
    public function getStringAttributes(): array
    {
        return $this->string_attributes;
    }

    /**
     * @param Array $string_attributes
     * @return self
     */
    public function setStringAttributes(array $string_attributes): self
    {
        $this->string_attributes = $string_attributes;
        return $this;
    }

    /**
     * @param StringAttribute ...$repeateds
     * @return $this
     */
    public function addStringAttributes(StringAttribute ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->string_attributes[] = $repeated;
        }

        return $this;
    }

    /**
     * @param StringAttribut $repeated
     * @return $this
     */
    public function addStringAttribute(StringAttribute $repeated): self
    {
        $this->string_attributes[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedStringAttributes(): array
    {
        return $this->localized_string_attributes;
    }

    /**
     * @param Array $localized_string_attributes
     * @return self
     */
    public function setLocalizedStringAttributes(array $localized_string_attributes): self
    {
        $this->localized_string_attributes = $localized_string_attributes;
        return $this;
    }

    /**
     * @param TypedLocalized ...$repeateds
     * @return $this
     */
    public function addLocalizedStringAttributes(TypedLocalized ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->localized_string_attributes[] = $repeated;
        }

        return $this;
    }

    /**
     * @param TypedLocalized $repeated
     * @return $this
     */
    public function addLocalizedStringAttribute(TypedLocalized $repeated): self
    {
        $this->localized_string_attributes[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getNumericAttributes(): array
    {
        return $this->numeric_attributes;
    }

    /**
     * @param Array $numeric_attributes
     * @return self
     */
    public function setNumericAttributes(array $numeric_attributes): self
    {
        $this->numeric_attributes = $numeric_attributes;
        return $this;
    }

    /**
     * @param NumericAttribute ...$repeateds
     * @return $this
     */
    public function addNumericAttributes(NumericAttribute ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->numeric_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param NumericAttribute $repeated
     * @return $this
     */
    public function addNumericAttribute(NumericAttribute $repeated): self
    {
        $this->numeric_attributes[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedNumericAttributes(): array
    {
        return $this->localized_numeric_attributes;
    }

    /**
     * @param Array $localized_numeric_attributes
     * @return self
     */
    public function setLocalizedNumericAttributes(array $localized_numeric_attributes): self
    {
        $this->localized_numeric_attributes = $localized_numeric_attributes;
        return $this;
    }

    /**
     * @param TypedLocalized ...$repeateds
     * @return $this
     */
    public function addLocalizedNumericAttributes(TypedLocalized ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->localized_numeric_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param TypedLocalized $repeated
     * @return $this
     */
    public function addLocalizedNumericAttribute(TypedLocalized $repeated): self
    {
        $this->localized_numeric_attributes[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getDatetimeAttributes(): array
    {
        return $this->datetime_attributes;
    }

    /**
     * @param Array $datetime_attributes
     * @return self
     */
    public function setDatetimeAttributes(array $datetime_attributes): self
    {
        $this->datetime_attributes = $datetime_attributes;
        return $this;
    }

    /**
     * @param DatetimeAttribute ...$repeateds
     * @return $this
     */
    public function addDatetimeAttributes(DatetimeAttribute ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->datetime_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param DatetimeAttribute $repeated
     * @return $this
     */
    public function addDatetimeAttribute(DatetimeAttribute $repeated): self
    {
        $this->datetime_attributes[] = $repeated;
        return $this;
    }

    /**
     * @return Array
     */
    public function getLocalizedDatetimeAttributes(): array
    {
        return $this->localized_datetime_attributes;
    }

    /**
     * @param Array $localized_datetime_attributes
     * @return self
     */
    public function setLocalizedDatetimeAttributes(array $localized_datetime_attributes): self
    {
        $this->localized_datetime_attributes = $localized_datetime_attributes;
        return $this;
    }

    /**
     * @param TypedLocalized ...$repeateds
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(TypedLocalized ...$repeateds): self
    {
        foreach ($repeateds as $repeated) {
            $this->localized_datetime_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param TypedLocalized $repeated
     * @return $this
     */
    public function addLocalizedDatetimeAttribute(TypedLocalized $repeated): self
    {
        $this->localized_datetime_attributes[] = $repeated;
        return $this;
    }

}
