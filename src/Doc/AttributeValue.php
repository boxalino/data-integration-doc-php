<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;

/**
 * Class AttributeValue
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * Currently, in use for instant-updates on categories (hierarchical properties)
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
class AttributeValue implements DocPropertiesInterface
{
    use PropertyToTrait;
    use TechnicalPropertiesTrait;
    use TypedPropertiesTrait;

    /**
     * @var string
     */
    protected $attribute_name;

    /**
     * @var bool
     */
    protected $numerical;

    /**
     * @var string
     */
    protected $value_id;

    /**
     * @var Array<<Localized>> | array
     */
    protected $value_label;

    /**
     * @var Array<<string>> | array
     */
    protected $parent_value_ids;

    /**
     * @var Array<<Localized>> | array
     */
    protected $short_description;

    /**
     * @var Array<<Localized>> | array
     */
    protected $description;

    /**
     * @var Array<<RepeatedGenericLocalized>> | array
     */
    protected $images;

    /**
     * @var Array<<Localized>> | array
     */
    protected $link;

    /**
     * @var Array<<Status>> | array
     */
    protected $status;

    /**
     * @var Array<<Tag>> | array
     */
    protected $tags;

    /**
     * @return string
     */
    public function getAttributeName(): string
    {
        return $this->attribute_name;
    }

    /**
     * @param string $attribute_name
     * @return AttributeValue
     */
    public function setAttributeName(string $attribute_name): AttributeValue
    {
        $this->attribute_name = $attribute_name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isNumerical(): bool
    {
        return $this->numerical;
    }

    /**
     * @param bool $numerical
     * @return AttributeValue
     */
    public function setNumerical(bool $numerical): AttributeValue
    {
        $this->numerical = $numerical;
        return $this;
    }

    /**
     * @return string
     */
    public function getValueId(): string
    {
        return $this->value_id;
    }

    /**
     * @param string $value_id
     * @return AttributeValue
     */
    public function setValueId(string $value_id): AttributeValue
    {
        $this->value_id = $value_id;
        return $this;
    }

    /**
     * @return []
     */
    public function getValueLabel(): array
    {
        return $this->value_label;
    }

    /**
     * @param [] | Array<<Localized>> $value_label
     * @return AttributeValue
     */
    public function setValueLabel(array $value_label): AttributeValue
    {
        foreach($value_label as $value)
        {
            if($value instanceof DocPropertiesInterface)
            {
                $this->value_label[] = $value->toArray();
                continue;
            }

            $this->value_label[] = $value;
        }

        return $this;
    }

    /**
     * @return []
     */
    public function getParentValueIds(): array
    {
        return $this->parent_value_ids;
    }

    /**
     * @param [] $parent_value_ids
     * @return AttributeValue
     */
    public function setParentValueIds(array $parent_value_ids): AttributeValue
    {
        $this->parent_value_ids = $parent_value_ids;
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
     * @param [] | Array<<Localized>> $short_description
     * @return AttributeValue
     */
    public function setShortDescription(array $short_descriptions): AttributeValue
    {
        foreach($short_descriptions as $localized)
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
     * @return []
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param [] | Array<<Localized>> $description
     * @return AttributeValue
     */
    public function setDescription(array $descriptions): AttributeValue
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
     * @return []
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param [] | Array<<RepeatedGenericLocalized>> $images
     * @return AttributeValue
     */
    public function setImages(array $images): AttributeValue
    {
        foreach($images as $image)
        {
            if($image instanceof DocPropertiesInterface)
            {
                $this->images[] = $image->toArray();
                continue;
            }

            $this->images[] = $image;
        }
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
     * @param [] | Array<<Localized>> $links
     * @return AttributeValue
     */
    public function setLink(array $links): AttributeValue
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
     * @return []
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @param array $status
     * @return self
     */
    public function setStatus(array $statuss): self
    {
        foreach($statuss as $status)
        {
            if($status instanceof DocPropertiesInterface)
            {
                $this->status[] = $status->toArray();
                continue;
            }

            $this->status[] = $status;
        }

        return $this;
    }

    /**
     * @param Status $status
     * @return $this
     */
    public function addStatus(Status $status)
    {
        $this->status[] = $status->toArray();
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
     * @return AttributeValue
     */
    public function setTags(array $tags): AttributeValue
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
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return array_merge(
            [
                'attribute_name' => $this->attribute_name,
                'numerical' => $this->numerical,
                'value_id' => $this->value_id,
                'value_label' => $this->value_label,
                'parent_value_ids' => $this->parent_value_ids,
                'short_description' => $this->short_description,
                'description' => $this->description,
                'images' => $this->images,
                'link' => $this->link,
                'status' => $this->status,
                'tags' => $this->tags
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
                'getAttributeName',
                'setAttributeName',
                'isNumerical',
                'setNumerical',
                'getValueId',
                'setValueId',
                'getValueLabel',
                'setValueLabel',
                'getParentValueIds',
                'setParentValueIds',
                'getShortDescription',
                'setShortDescription',
                'getDescription',
                'setDescription',
                'getImages',
                'setImages',
                'getLink',
                'setLink',
                'getStatus',
                'setStatus',
                'addStatus',
                'getTags',
                'setTags'
            ],
            $this->_toArrayTechnicalClassMethods(),
            $this->_toArrayTypedClassMethods()
        );
    }


}
