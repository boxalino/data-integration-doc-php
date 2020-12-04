<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Doc\Schema\Typed;

use Boxalino\InstantUpdate\Service\Doc\Schema\Localized;
use Boxalino\InstantUpdate\Service\Doc\Schema\Typed;

/**
 * Class NumericAttribute
 *
 * @package Boxalino\InstantUpdate\Service\Doc\Schema
 */
class NumericAttribute extends Typed
{

    /**
     * @var string
     */
    protected $type = "numeric";

    /**
     * @param int | null $value
     * @return $this
     */
    public function addValue($value = null) : self
    {
        $this->values[] = (int) $value;
        return $this;
    }

}
