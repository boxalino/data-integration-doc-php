<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Repeated;

/**
 * Class NumericAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class NumericAttribute extends Repeated
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
