<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Customer;
use Boxalino\DataIntegrationDoc\Doc\Schema\Label;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;

/**
 * doc_user_generated_content data structure
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280985/doc+user+generated+content
 */
class UserGeneratedContent implements DocPropertiesInterface
{
    use PropertyToTrait;
    use TypedPropertiesTrait;
    use TechnicalPropertiesTrait;

    /**
     * the unique id of the ugc
     * @var string
     */
    protected $id;

    /**
     * the type of ugc: 'rating', 'question', 'answer', 'review', 'testimonial', 'comment', ...
     * @var string
     */
    protected $type;

    /**
     * the creation date time of the ugc
     * @var string | null
     */
    protected $creation;

    /**
     * the last update date time of the ugc
     * @var string | null
     */
    protected $last_update;

    /**
     * the persona type who created this ugc
     * @var string | null
     */
    protected $persona_type;

    /**
     * the persona who created this ugc
     * @var string | null
     */
    protected $persona_id;

    /**
     * the parent ugcs related to this ugc
     * (e.g.: rating of themost helpful customer review / comments)
     * @var Array<<string>> | null
     */
    protected $parent_ugc_ids = [];

    /**
     * connections to other products
     * @var Array<<\Boxalino\DataIntegrationDoc\Doc\Schema\Product>>
     */
    protected $products = [];

    /**
     * relations to other contents
     * @var Array<<\Boxalino\DataIntegrationDoc\Doc\Schema\Content>>
     */
    protected $contents = [];

    /**
     * relations to other customers
     * @var Array<<Customer>>
     */
    protected $customers = [];

    /**
     * the ucg value (weighting) (e.g.: 0.0 - 5.0 for stars)
     * @var int | float
     */
    protected $value = 0.0;

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
    protected $images = [];

    /**
     * @var Array<<Localized>>
     */
    protected $link = [];

    /**
     * the tags for ugc
     * e.g.: [STRUCT('tag', 'hello world', [STRUCT('de', 'hello world')])]
     * @var Array<<Tag>>
     */
    protected $tags = [];

    /**
     * the labels of the ugc,
     * e.g.: [STRUCT('symbol', 'delivery', '24h', [STRUCT('de', '24-H Versand')])]
     * @var Array<<Label>>
     */
    protected $labels = [];

    /**
     * the ucg status
     * @var bool | null
     */
    protected $status;

    /**
     * information about the activity periods of the ugc
     * @var Array<<Period>>
     */
    protected $periods = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return UserGeneratedContent
     */
    public function setId(string $id): UserGeneratedContent
    {
        $this->id = $id;
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
     * @return UserGeneratedContent
     */
    public function setType(string $type): UserGeneratedContent
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreation(): ?string
    {
        return $this->creation;
    }

    /**
     * @param string|null $creation
     * @return UserGeneratedContent
     */
    public function setCreation(?string $creation): UserGeneratedContent
    {
        $this->creation = $creation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastUpdate(): ?string
    {
        return $this->last_update;
    }

    /**
     * @param string|null $last_update
     * @return UserGeneratedContent
     */
    public function setLastUpdate(?string $last_update): UserGeneratedContent
    {
        $this->last_update = $last_update;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonaType(): ?string
    {
        return $this->persona_type;
    }

    /**
     * @param string|null $persona_type
     * @return UserGeneratedContent
     */
    public function setPersonaType(?string $persona_type): UserGeneratedContent
    {
        $this->persona_type = $persona_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonaId(): ?string
    {
        return $this->persona_id;
    }

    /**
     * @param string|null $persona_id
     * @return UserGeneratedContent
     */
    public function setPersonaId(?string $persona_id): UserGeneratedContent
    {
        $this->persona_id = $persona_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentUgcIds(): array
    {
        return $this->parent_ugc_ids;
    }

    /**
     * @param mixed $parent_ugc_ids
     * @return UserGeneratedContent
     */
    public function setParentUgcIds(array $parent_ugc_ids): UserGeneratedContent
    {
        $this->parent_ugc_ids = $parent_ugc_ids;
        return $this;
    }

    /**
     * @return []
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param [] $products
     * @return UserGeneratedContent
     */
    public function setProducts(array $products): UserGeneratedContent
    {
        foreach($products as $product)
        {
            if($product instanceof \Boxalino\DataIntegrationDoc\Doc\Schema\Product)
            {
                $this->addProduct($product);
                continue;
            }

            $this->products[] = $product;
        }

        return $this;
    }

    /**
     * @param Schema\Product $product
     * @return $this
     */
    public function addProduct(\Boxalino\DataIntegrationDoc\Doc\Schema\Product $product)
    {
        $this->products[] = $product->toArray();
        return $this;
    }

    /**
     * @return []
     */
    public function getContents(): array
    {
        return $this->contents;
    }

    /**
     * @param [] $contents
     * @return UserGeneratedContent
     */
    public function setContents(array $contents): UserGeneratedContent
    {
        foreach($contents as $content)
        {
            if($content instanceof \Boxalino\DataIntegrationDoc\Doc\Schema\Content)
            {
                $this->contents[] = $content->toArray();
                continue;
            }

            $this->contents[] = $content;
        }

        return $this;
    }

    /**
     * @return []
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    /**
     * @param [] $customers
     * @return UserGeneratedContent
     */
    public function setCustomers(array $customers): UserGeneratedContent
    {
        foreach($customers as $customer)
        {
            if($customer instanceof Customer)
            {
                $this->addCustomer($customer);
                continue;
            }

            $this->customers[] = $customer;
        }
        return $this;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function addCustomer(Customer $customer) : self
    {
        $this->customers[] = $customer->toArray();
        return $this;
    }

    /**
     * @return float|int
     */
    public function getValue(): float|int
    {
        return $this->value;
    }

    /**
     * @param float|int $value
     * @return $this
     */
    public function setValue(float|int $value): UserGeneratedContent
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return []
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * @param [] $stores
     * @return UserGeneratedContent
     */
    public function setStores(array $stores): UserGeneratedContent
    {
        $this->stores = $stores;
        return $this;
    }

    /**
     * @return []
     */
    public function getTitle(): array
    {
        return $this->title;
    }

    /**
     * @param [] $title
     * @return UserGeneratedContent
     */
    public function setTitle(array $titles): UserGeneratedContent
    {
        foreach($titles as $title)
        {
            if($title instanceof Localized)
            {
                $this->title[]  = $title->toArray();
                continue;
            }

            $this->title[] = $title;
        }

        return $this;
    }


    /**
     * @return []
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param [] $descriptions
     * @return self
     */
    public function setDescription(array $descriptions): self
    {
        foreach($descriptions as $description)
        {
            if($description instanceof Localized)
            {
                $this->description[]  = $description->toArray();
                continue;
            }

            $this->description[] = $description;
        }

        return $this;
    }

    /**
     * @return []
     */
    public function getShortDescription(): array
    {
        return $this->short_description;
    }

    /**
     * @param [] $short_descriptions
     * @return self
     */
    public function setShortDescription(array $short_descriptions): self
    {
        foreach($short_descriptions as $short_description)
        {
            if($short_description instanceof Localized)
            {
                $this->short_description[] = $short_description->toArray();
                continue;
            }

            $this->short_description[] = $short_description;
        }

        return $this;
    }

    /**
     * @return []
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param [] $images
     * @return self
     */
    public function setImages(array $images): self
    {
        foreach($images as $image)
        {
            if($image instanceof RepeatedGenericLocalized)
            {
                $this->addImage($image);
                continue;
            }

            $this->images[] = $image;
        }

        return $this;
    }

    /**
     * @param RepeatedGenericLocalized $element
     * @return $this
     */
    public function addImage(RepeatedGenericLocalized  $element) : self
    {
        $this->images[] = $element->toArray();
        return $this;
    }

    /**
     * @return []
     */
    public function getLink(): array
    {
        return $this->link;
    }

    /**
     * @param [] $link
     * @return self
     */
    public function setLink(array $links): self
    {
        foreach($links as $link)
        {
            if($link instanceof Localized)
            {
                $this->addLink($link);
                continue;
            }

            $this->link[] = $link;
        }

        return $this;
    }

    /**
     * @param Localized $link
     * @return $this
     */
    public function addLink(Localized $link) : self
    {
        $this->link[] = $link->toArray();
        return $this;
    }


    /**
     * @return []
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param [] $tags
     * @return self
     */
    public function setTags(array $tags): self
    {
        foreach($tags as $tag)
        {
            if($tag instanceof Tag)
            {
                $this->addTag($tag);
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
    public function addTag(Tag $tag) : self
    {
        $this->tags[] = $tag->toArray();
        return $this;
    }

    /**
     * @return []
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
        foreach($labels as $label)
        {
            if($label instanceof Label)
            {
                $this->addLabel($label);
                continue;
            }

            $this->labels[] = $label;
        }
        return $this;
    }

    /**
     * @param Label $label
     * @return $this
     */
    public function addLabel(Label $label) : self
    {
        $this->labels[] = $label->toArray();
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return self
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return []
     */
    public function getPeriods(): array
    {
        return $this->periods;
    }

    /**
     * @param [] $periods
     * @return self
     */
    public function setPeriods(array $periods): self
    {
        foreach($periods as $period)
        {
            if($period instanceof Period)
            {
                $this->addPeriod($period);
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
    public function addPeriod(Period $period) : self
    {
        $this->periods[] = $period->toArray();
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList() : array
    {
        return array_merge(
            [
                'id' => $this->id,
                'type' => $this->type,
                'creation' => $this->creation,
                'last_update' => $this->last_update,
                'persona_type' => $this->persona_type,
                'persona_id' => $this->persona_id,
                'parent_ugc_ids' => $this->parent_ugc_ids,
                'products' => $this->products,
                'contents' => $this->contents,
                'customers' => $this->customers,
                'value' => $this->value,
                'stores' => $this->stores,
                'title' => $this->title,
                'description' => $this->description,
                'short_description' => $this->short_description,
                'images' => $this->images,
                'link' => $this->link,
                'tags' => $this->tags,
                'labels' => $this->labels,
                'status' => $this->status,
                'periods' => $this->periods
            ],
            $this->_toArrayPropertiesTechnical(),
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
                'getId',
                'setId',
                'getType',
                'setType',
                'getCreation',
                'setCreation',
                'getLastUpdate',
                'setLastUpdate',
                'getPersonaType',
                'setPersonaType',
                'getPersonaId',
                'setPersonaId',
                'getParentUgcIds',
                'setParentUgcIds',
                'getProducts',
                'setProducts',
                'addProduct',
                'getContents',
                'setContents',
                'getCustomers',
                'setCustomers',
                'addCustomer',
                'setValue',
                'getValue',
                'getStores',
                'setStores',
                'getTitle',
                'setTitle',
                'getDescription',
                'setDescription',
                'getShortDescription',
                'setShortDescription',
                'getImages',
                'setImages',
                'addImage',
                'getLink',
                'setLink',
                'addLink',
                'getTags',
                'setTags',
                'addTag',
                'getLabels',
                'setLabels',
                'addLabel',
                'getStatus',
                'setStatus',
                'getPeriods',
                'setPeriods',
                'addPeriod'
            ],
            $this->_toArrayTypedClassMethods(),
            $this->_toArrayTechnicalClassMethods()
        );
    }


}
