<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema\Typed;

use Boxalino\InstantUpdate\Service\Doc\Schema\Localized;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed;

/**
 * Class StringAttribute
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class StringAttribute extends Typed
{

    /**
     * @var string
     */
    protected $type = "string";

    /**
     * @param string | null $value
     * @return $this
     */
    public function addValue(?string $value = null) : self
    {
        $this->values[] = $value;
        return $this;
    }

}
