<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Doc\Schema\Repeated;

/**
 * Class NumericAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class NumericAttribute extends Repeated
{

    /**
     * @var string
     */
    protected $type = "numeric";

    /**
     * @param float | null $value
     * @return $this
     */
    public function addValue($value = null) : self
    {
        $this->values[] = (float) $value;
        return $this;
    }

}
