<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Repeated;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\RepeatedLocalized;

/**
 * Class StringLocalizedAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
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

}
