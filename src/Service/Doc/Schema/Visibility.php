<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Class Visibility
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class Visibility implements \JsonSerializable, DocSchemaDefinitionInterface
{
    use DocPropertiesTrait;

    /**
     * @var Array<<string>>
     */
    protected $customer_groups;

    /**
     * @var Array<<Localized>>
     */
    protected $values;

    /**
     * @return Array
     */
    public function getCustomerGroups(): array
    {
        return $this->customer_groups;
    }

    /**
     * @param Array $customer_groups
     * @return Visibility
     */
    public function setCustomerGroups(array $customer_groups): Visibility
    {
        $this->customer_groups = $customer_groups;
        return $this;
    }

    /**
     * @param string $customerGroup
     * @return $this
     */
    public function addCustomerGroup(string $customerGroup) : Visibility
    {
        $this->customer_groups[] = $customerGroup;
        return $this;
    }

    /**
     * @return Array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param Array $values
     * @return Visibility
     */
    public function setValues(array $values): Visibility
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addValue(Localized $localized) : Visibility
    {
        $this->values[] = $localized->jsonSerialize();
        return $this;
    }

}
