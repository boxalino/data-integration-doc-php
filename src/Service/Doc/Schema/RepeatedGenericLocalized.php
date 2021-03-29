<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\RepeatedLocalized;

/**
 * Class RepeatedGenericLocalized
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
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
