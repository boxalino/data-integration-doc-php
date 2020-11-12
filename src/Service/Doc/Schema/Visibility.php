<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema;

class Visibility implements \JsonSerializable
{

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



}
