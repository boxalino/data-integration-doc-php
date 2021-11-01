<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\Product\Sku;
use League\Flysystem\Adapter\Local;

/**
 * Class Attribute
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280945/doc+attribute
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
class Attribute implements DocPropertiesInterface
{
    use DocPropertiesTrait;
    use TechnicalPropertiesTrait;

    /**
     * the name of the attribute
     * (should match the name of the attribute provided in the doc_product table
     * in either string_attributes, numeric_attributes or localized_numeric_attributes)
     *
     * @var string
     */
    protected $name;

    /**
     * the internal identifier
     *
     * @var string | null
     */
    protected $internal_id;

    /**
     * the external identifier (can be the same as the internal identifier)
     *
     * @var string | null
     */
    protected $external_id;

    /**
     * the title of the attribute
     *
     * @var Array<<Localized>> | array
     */
    protected $label = [];

    /**
     * the attribute group in which this attribute belongs
     *
     * @var Array<<Localized>> | array
     */
    protected $attribute_group = [];

    /**
     * the attribute sub-group in which this attribute belongs
     *
     * @var array | Array<<Localized>>
     */
    protected $attribute_sub_group = [];

    /**
     * list of stores for filter availability
     *
     * @var array
     */
    protected $stores = [];

    /**
     * the type format of the attribute : 'numeric', 'string' or 'datetime',
     * it is supported to set it to string but provide numeric attributes in the products,
     * as long as you have a mapping logic in the attribute values
     *
     * @var string
     */
    protected $format = "string";

    /**
     * are the values localized (different for every language) or not,
     * it is supported to set it to true
     * but provide non-localized attributes in the products,
     * as long as you have a mapping logic in the attribute values
     *
     * @var bool
     */
    protected $localized = false;

    /**
     * the link of the attribute value
     *
     * @var array | Array<<Localized>>
     */
    protected $link = [];

    /**
     * the list of related data types ('product', 'blog', 'content', ...),
     * by default 'all' if empty
     *
     * @var array | Array<<string>>
     */
    protected $data_types = [];

    /**
     * is it possible for this attribute to have more than 1 value per sku (or final content),
     * set to false unless necessary, as multi-valued fields cannot be sorted or grouped by
     *
     * @var bool
     */
    protected $multi_value = false;

    /**
     * is it an attribute that has a hierarchy of values (e.g.: category tree)
     *
     * @var bool
     */
    protected $hierarchical = false;

    /**
     * should be indexed as part of the searcheable :
     * 0 : values not indexed for search,
     * 1 : values indexed for search only in main index,
     * 2 : values indexed for search in specialized field which can be boosted individually
     *
     * @var int
     */
    protected $search_by = 0;

    /**
     * should this attribute values be used as search suggestions
     *
     * @var bool
     */
    protected $search_suggestion = false;

    /**
     * is it an attribute that needs to be used as a filter in some requests
     *
     * @var bool
     */
    protected $filter_by = false;

    /**
     * is it an attribute that needs to be grouped by in some requests
     * (if set to true, then multi_value must be set to false)
     *
     * @var bool
     */
    protected $group_by = false;

    /**
     * is it an attribute that needs to be ordered by in some requests
     * (if set to true, then multi_value must be set to false)
     *
     * @var bool
     */
    protected $order_by = false;

    /**
     * should this attribute values be indexed independently so they can be searched for
     * (e.g.: author, brand, ...)
     *
     * @var bool
     */
    protected $indexed = true;

    /**
     * the attribute visibility :
     * VISIBILITY_NOT_VISIBLE = 1;
     * VISIBILITY_IN_CATALOG = 2;
     * VISIBILITY_IN_SEARCH = 3;
     * VISIBILITY_BOTH = 4;
     *
     * @var array | Array<<Visibility>>
     */
    protected $visibility = [];

    /**
     * attribute status
     * @var array | Array<<Status>>
     */
    protected $status = [];

    /**
     * information about the activity periods of the attribute
     *
     * @var array | Array<<Period>>
     */
    protected $periods = [];


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Attribute
     */
    public function setName(string $name): Attribute
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInternalId(): ?string
    {
        return $this->internal_id;
    }

    /**
     * @param string|null $internal_id
     * @return Attribute
     */
    public function setInternalId(?string $internal_id): Attribute
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
     * @return Attribute
     */
    public function setExternalId(?string $external_id): Attribute
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getLabel(): array
    {
        return $this->label;
    }

    /**
     * @param array|[] $label
     * @return Attribute
     */
    public function setLabel(array $label): Attribute
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param array $localizeds
     * @return $this
     */
    public function addLabel(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->label[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @return array|[]
     */
    public function getAttributeGroup(): array
    {
        return $this->attribute_group;
    }

    /**
     * @param array|[] $attribute_group
     * @return Attribute
     */
    public function setAttributeGroup(array $attribute_group): Attribute
    {
        $this->attribute_group = $attribute_group;
        return $this;
    }

    /**
     * @param array $localizeds
     * @return $this
     */
    public function addAttributeGroup(array $localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->attribute_group[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @return array|[]
     */
    public function getAttributeSubGroup(): array
    {
        return $this->attribute_sub_group;
    }

    /**
     * @param array|[] $attribute_sub_group
     * @return Attribute
     */
    public function setAttributeSubGroup(array $attribute_sub_group): Attribute
    {
        $this->attribute_sub_group = $attribute_sub_group;
        return $this;
    }

    /**
     * @param array $localizeds
     * @return $this
     */
    public function addAttributeSubGroup(array $localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->attribute_sub_group[] = $localized->toArray();
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
     * @param array $localizeds
     * @return $this
     */
    public function addStores(array $localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->stores[] = $localized;
        }

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
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Attribute
     */
    public function setFormat(string $format): Attribute
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLocalized(): bool
    {
        return $this->localized;
    }

    /**
     * @param bool $localized
     * @return Attribute
     */
    public function setLocalized(bool $localized): Attribute
    {
        $this->localized = $localized;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getLink(): array
    {
        return $this->link;
    }

    /**
     * @param array|[] $link
     * @return Attribute
     */
    public function setLink(array $link): Attribute
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param array<<Localized>> $localizeds
     * @return $this
     */
    public function addLink(array $localizeds): self
    {
        foreach($localizeds as $localized)
        {
            $this->link[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @return array|[]
     */
    public function getDataTypes(): array
    {
        return $this->data_types;
    }

    /**
     * @param array|[] $data_types
     * @return Attribute
     */
    public function setDataTypes(array $data_types): Attribute
    {
        $this->data_types = $data_types;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMultiValue(): bool
    {
        return $this->multi_value;
    }

    /**
     * @param bool $multi_value
     * @return Attribute
     */
    public function setMultiValue(bool $multi_value): Attribute
    {
        $this->multi_value = $multi_value;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHierarchical(): bool
    {
        return $this->hierarchical;
    }

    /**
     * @param bool $hierarchical
     * @return Attribute
     */
    public function setHierarchical(bool $hierarchical): Attribute
    {
        $this->hierarchical = $hierarchical;
        return $this;
    }

    /**
     * @return int
     */
    public function getSearchBy(): int
    {
        return $this->search_by;
    }

    /**
     * @param int $search_by
     * @return Attribute
     */
    public function setSearchBy(int $search_by): Attribute
    {
        $this->search_by = $search_by;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSearchSuggestion(): bool
    {
        return $this->search_suggestion;
    }

    /**
     * @param bool $search_suggestion
     * @return Attribute
     */
    public function setSearchSuggestion(bool $search_suggestion): Attribute
    {
        $this->search_suggestion = $search_suggestion;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFilterBy(): bool
    {
        return $this->filter_by;
    }

    /**
     * @param bool $filter_by
     * @return Attribute
     */
    public function setFilterBy(bool $filter_by): Attribute
    {
        $this->filter_by = $filter_by;
        return $this;
    }

    /**
     * @return bool
     */
    public function isGroupBy(): bool
    {
        return $this->group_by;
    }

    /**
     * @param bool $group_by
     * @return Attribute
     */
    public function setGroupBy(bool $group_by): Attribute
    {
        $this->group_by = $group_by;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOrderBy(): bool
    {
        return $this->order_by;
    }

    /**
     * @param bool $order_by
     * @return Attribute
     */
    public function setOrderBy(bool $order_by): Attribute
    {
        $this->order_by = $order_by;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIndexed(): bool
    {
        return $this->indexed;
    }

    /**
     * @param bool $indexed
     * @return Attribute
     */
    public function setIndexed(bool $indexed): Attribute
    {
        $this->indexed = $indexed;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getVisibility(): array
    {
        return $this->visibility;
    }

    /**
     * @param array|[] $visibility
     * @return Attribute
     */
    public function setVisibility(array $visibility): Attribute
    {
        $this->visibility = $visibility;
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
     * @return array|[]
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param array|[] $status
     * @return Attribute
     */
    public function setStatus(array $status): Attribute
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array<<Status>> $localizeds
     * @return $this
     */
    public function addStatus(array $localizeds) : self
    {
        foreach($localizeds as $localized)
        {
            $this->status[] = $localized->toArray();
        }

        return $this;
    }

    /**
     * @return array|[]
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param array|[] $periods
     * @return Attribute
     */
    public function setPeriods(array $periods): Attribute
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


}
