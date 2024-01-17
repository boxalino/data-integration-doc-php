<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\PropertyToTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

/**
 * Class Visibility
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class Visibility implements DocPropertiesInterface
{
    use PropertyToTrait;

    /**
     * @var Array<<string>>
     */
    protected $customer_groups = [];

    /**
     * @var Array<<Localized>>
     */
    protected $values = [];

    /**
     * @return array
     */
    public function getCustomerGroups(): array
    {
        return $this->customer_groups;
    }

    /**
     * @param array $customer_groups
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
     * @return array
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
            if($localized instanceof DocPropertiesInterface)
            {
                $this->values[] = $localized->toArray();
                continue;
            }

            $this->values[] = $localized;
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList(): array
    {
        return [
            'values' => $this->values,
            'customer_groups' => $this->customer_groups
        ];
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return [
            'getCustomerGroups',
            'setCustomerGroups',
            'addCustomerGroup',
            'getValues',
            'setValues',
            'addValue'
        ];
    }


}
