<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Doc\Schema\Repeated;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedLocalized;

/**
 * Class StringLocalizedAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class StringLocalizedAttribute extends Repeated
{

    /**
     * @var string
     */
    protected $type = "string";

    /**
     * @param RepeatedLocalized $localizeds
     * @return $this
     */
    public function addValue(RepeatedLocalized $localized) : self
    {
        $this->values[] = $localized->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'addValue'
            ],
            parent::toArrayClassMethods()
        );
    }


}
