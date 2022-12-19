<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

/**
 * Class RepeatedGenericLocalized
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class RepeatedGenericLocalized extends Repeated
{

    /**
     * @param RepeatedLocalized $localizeds
     * @return $this
     */
    public function addValue(RepeatedLocalized $localized) : self
    {
        $this->values[] = $localized->toArray();
        return $this;
    }

}
