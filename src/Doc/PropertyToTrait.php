<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

/**
 * Trait PropertyToTrait
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait PropertyToTrait
{

    /**
     * Will only return the properties that are not set to null
     *
     * @return array
     */
    public function toArray() : array
    {
        return array_filter($this->toArrayList(), function($k, $v) {
            return json_encode($k) !== "null";
        }, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * @return false|mixed|string
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

    /**
     * Will return all properties
     *
     * @return array
     */
    public function toList() : array
    {
        return array_keys($this->toArrayList());
    }


}
