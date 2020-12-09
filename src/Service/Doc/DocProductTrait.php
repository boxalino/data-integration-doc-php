<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc;

use Boxalino\InstantUpdate\Service\Doc\Schema\Category;
use Boxalino\InstantUpdate\Service\Doc\Schema\Label;
use Boxalino\InstantUpdate\Service\Doc\Schema\Localized;
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
     * @param array $relatedProducts
     * @return $this
     */
    public function addProductRelations(array $relatedProducts): self
    {
        foreach ($relatedProducts as $product)
        {
            $this->product_relations[] = $product->toArray();
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
     * @param array $relatedContent
     * @return $this
     */
    public function addOtherRelations(array $relatedContent): self
    {
        foreach ($relatedContent as $content)
        {
            $this->other_relations[] = $content->toArray();
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
     * @param array $localizeds
     * @return $this
     */
    public function addTitle(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->title[] = $localized->toArray();
        }

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
     * @param Array<<Localized>> $localized
     * @return $this
     */
    public function addDescription(array $descriptions): self
    {
        foreach($descriptions as $localized)
        {
            $this->description[] = $localized->toArray();
        }

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
     * @param Array<<Localized>> $localized
     * @return self
     */
    public function addShortDescription(array $descriptions): self
    {
        foreach($descriptions as $localized)
        {
            $this->short_description[] = $localized->toArray();
        }
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
     * @param  Array<<RepeatedLocalized>> $localizeds
     * @return $this
     */
    public function addBrands(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->brands[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @param RepeatedLocalized $localized
     * @return $this
     */
    public function addBrand(RepeatedLocalized $localized): self
    {
        $this->brands[] = $localized->toArray();
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
     * @param Array<<RepeatedLocalized>> $localizeds
     * @return $this
     */
    public function addSuppliers(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->suppliers[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @param RepeatedLocalized $localized
     * @return $this
     */
    public function addSupplier(RepeatedLocalized  $localized): self
    {
        $this->suppliers[] = $localized->toArray();
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
     * @param Array<<Category>> $categories
     * @return self
     */
    public function addCategories(array $categories): self
    {
        foreach($categories as $category)
        {
            $this->categories[] = $category->toArray();
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
     * @param Array<<RepeatedLocalized>> $repeateds
     * @return $this
     */
    public function addImages(array $repeateds): self
    {
        foreach($repeateds as $repeated)
        {
            $this->images[] = $repeated->toArray();
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
        $this->images[] = $repeated->toArray();
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
     * @param Array<<Localized>> $localizeds
     * @return $this
     */
    public function addLinks(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->link[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addLink(Localized  $localized): self
    {
        $this->link[] = $localized->toArray();
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
     * @param Array<<Tag>> $tags
     * @return $this
     */
    public function addTags(array $tags): self
    {
        foreach($tags as $tag)
        {
            $this->tags[] = $tag->toArray();
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
     * @return Array
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
        $this->labels[] = $label->toArray();
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
            $this->labels[] = $label->toArray();
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
     * @param Array<<Period>> $periods
     * @return $this
     */
    public function addPeriods(array $periods): self
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
    public function addPeriod(Period $period): self
    {
        $this->periods[] = $period->toArray();
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
     * @param Array<<StringAttribute>> $repeateds
     * @return $this
     */
    public function addStringAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->string_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param StringAttribute $repeated
     * @return $this
     */
    public function addStringAttribute(StringAttribute $repeated): self
    {
        $this->string_attributes[] = $repeated->toArray();
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
     * @param Array<<TypedLocalized>> $localized_string_attributes
     * @return self
     */
    public function setLocalizedStringAttributes(array $localized_string_attributes): self
    {
        $this->localized_string_attributes = $localized_string_attributes;
        return $this;
    }

    /**
     * @param Array<<TypedLocalized>> $repeateds
     * @return $this
     */
    public function addLocalizedStringAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->localized_string_attributes[] = $repeated->toArray();
        }

        return $this;
    }

    /**
     * @param TypedLocalized $repeated
     * @return $this
     */
    public function addLocalizedStringAttribute(TypedLocalized $repeated): self
    {
        $this->localized_string_attributes[] = $repeated->toArray();
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
     * @param Array<<NumericAttribute>> $repeateds
     * @return $this
     */
    public function addNumericAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
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
        $this->numeric_attributes[] = $repeated->toArray();
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
     * @param Array<<TypedLocalized>> $repeateds
     * @return $this
     */
    public function addLocalizedNumericAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
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
        $this->localized_numeric_attributes[] = $repeated->toArray();
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
     * @param Array<<DatetimeAttribute>> $repeateds
     * @return $this
     */
    public function addDatetimeAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
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
        $this->datetime_attributes[] = $repeated->toArray();
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
     * @param Array<<TypedLocalized>> $repeateds
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
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
        $this->localized_datetime_attributes[] = $repeated->toArray();
        return $this;
    }

}
