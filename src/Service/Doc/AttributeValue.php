<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Status;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Tag;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Sku;

/**
 * Class AttributeValue
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * Currently in use for instant-updates on categories (hierarchical properties)
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
class AttributeValue implements DocPropertiesInterface
{
    use DocPropertiesTrait;

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
     * @var Array<<Localized>>
     */
    protected $value_label;

    /**
     * @var Array<<string>>
     */
    protected $parent_value_ids;

    /**
     * @var Array<<Localized>>
     */
    protected $short_description;

    /**
     * @var Array<<Localized>>
     */
    protected $description;

    /**
     * @var Array<<RepeatedGenericLocalized>>
     */
    protected $images;

    /**
     * @var Array<<Localized>>
     */
    protected $link;

    /**
     * @var Array<<Status>>
     */
    protected $status;

    /**
     * @var Array<<Tag>>
     */
    protected $tags;

    /**
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string (timestamp)
     */
    protected $creation_tm;

    /**
     * @var int
     */
    protected $client_id = 0;

    /**
     * @var int
     */
    protected $src_sys_id = 0;

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
     * @param [] $value_label
     * @return AttributeValue
     */
    public function setValueLabel(array $value_label): AttributeValue
    {
        foreach($value_label as $value)
        {
            $this->value_label[] = $value->toArray();
        }

        return $this;
    }

    /**
     * @param Array<<Localized>> $value_label
     * @return AttributeValue
     */
    public function addValueLabel(array $value_label): AttributeValue
    {
        foreach($value_label as $value)
        {
            $this->value_label[] = $value->toArray();
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
     * @param [] $short_description
     * @return AttributeValue
     */
    public function setShortDescription(array $short_description): AttributeValue
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @param Array<<Localized>> $localized
     * @return $this
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
     * @return []
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    /**
     * @param [] $description
     * @return AttributeValue
     */
    public function setDescription(array $description): AttributeValue
    {
        foreach($description as $status)
        {
            $this->description[] = $status->toArray();
        }
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
     * @return []
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param [] $images
     * @return AttributeValue
     */
    public function setImages(array $images): AttributeValue
    {
        foreach($images as $status)
        {
            $this->images[] = $status->toArray();
        }
        return $this;
    }

    /**
     * @param Array<<RepeatedGenericLocalized>> $repeateds
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
     * @return []
     */
    public function getLink(): array
    {
        return $this->link;
    }

    /**
     * @param [] $link
     * @return AttributeValue
     */
    public function setLink(array $link): AttributeValue
    {
        foreach($link as $status)
        {
            $this->link[] = $status->toArray();
        }
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
            $this->link[] = $localized->toArray();
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
     * @param Array $status
     * @return self
     */
    public function setStatus(array $statuss): self
    {
        foreach($statuss as $status)
        {
            $this->status[] = $status->toArray();
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
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string $creation_tm
     * @return AttributeValue
     */
    public function setCreationTm(string $creation_tm): AttributeValue
    {
        $this->creation_tm = $creation_tm;
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     * @return AttributeValue
     */
    public function setClientId(int $client_id): AttributeValue
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSrcSysId(): int
    {
        return $this->src_sys_id;
    }

    /**
     * @param int $src_sys_id
     * @return AttributeValue
     */
    public function setSrcSysId(int $src_sys_id): AttributeValue
    {
        $this->src_sys_id = $src_sys_id;
        return $this;
    }

}
