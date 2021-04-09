<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Visibility
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Visibility implements DocPropertiesInterface
{
    use DocPropertiesTrait;

    /**
     * @var Array<<string>>
     */
    protected $customer_groups = [];

    /**
     * @var Array<<Localized>>
     */
    protected $values = [];

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
     * @param Array<<Localized>> $values
     * @return Visibility
     */
    public function setValues(array $values): Visibility
    {
        foreach($values as $localized)
        {
            $this->values[] = $localized->toArray();
        }
        return $this;
    }

    /**
     * @param Localized $localized
     * @return $this
     */
    public function addValue(Localized $localized) : Visibility
    {
        $this->values[] = $localized->toArray();
        return $this;
    }

}
