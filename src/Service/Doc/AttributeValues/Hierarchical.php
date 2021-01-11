<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\AttributeValues;

use Boxalino\DataIntegrationDoc\Service\Doc\Localized;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\RepeatedLocalized;
use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;

/**
 * Class Hierarchical
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * Currently in use for instant-updates on categories (hierarchical properties)
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc
 */
class Hierarchical implements \JsonSerializable
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
        $this->value_label = $value_label;
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


}
