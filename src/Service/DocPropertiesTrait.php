<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service;

/**
 * Trait DocPropertiesTrait
 *
 * @package Boxalino\InstantUpdate\Service
 */
trait DocPropertiesTrait
{
    /**
     * Will only return the properties that are not empty
     *
     * @return array
     */
    public function toArray() : array
    {
        return get_object_vars($this);
    }

    /**
     * @return false|mixed|string
     */
    public function jsonSerialize()
    {
        return json_encode($this->toArray());
    }

}
