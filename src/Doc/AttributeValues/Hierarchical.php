<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\AttributeValues;

use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;

/**
 * Class Hierarchical
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * Currently, in use for instant-updates on categories (hierarchical properties)
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
class Hierarchical implements \JsonSerializable
{
    use PropertyToTrait;

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
     * @return Hierarchical
     */
    public function setAttributeName(string $attribute_name): Hierarchical
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
     * @return Hierarchical
     */
    public function setNumerical(bool $numerical): Hierarchical
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
     * @return Hierarchical
     */
    public function setValueId(string $value_id): Hierarchical
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
     * @return Hierarchical
     */
    public function setValueLabel(array $value_label): Hierarchical
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
     * @return Hierarchical
     */
    public function setParentValueIds(array $parent_value_ids): Hierarchical
    {
        $this->parent_value_ids = $parent_value_ids;
        return $this;
    }

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'attribute_name' => $this->attribute_name,
            'numerical' => $this->numerical,
            'value_id' => $this->value_id,
            'value_label' => $this->value_label,
            'parent_value_ids' => $this->parent_value_ids
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getAttributeName',
            'setAttributeName',
            'isNumerical',
            'setNumerical',
            'getValueId',
            'setValueId',
            'getValueLabel',
            'setValueLabel',
            'getParentValueIds',
            'setParentValueIds'
        ];
    }


}
