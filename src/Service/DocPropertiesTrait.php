<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service;

/**
 * Trait DocPropertiesTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
trait DocPropertiesTrait
{
    /**
     * Will only return the properties that are not set to null
     *
     * @return array
     */
    public function toArray() : array
    {
        return array_filter(get_object_vars($this), function($k, $v) {
            return json_encode($k) !== "null";
        }, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * @return false|mixed|string
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

}
