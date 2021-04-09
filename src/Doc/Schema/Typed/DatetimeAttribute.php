<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Doc\Schema\Repeated;

/**
 * Class DatetimeAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class DatetimeAttribute extends Repeated
{

    /**
     * @var string
     */
    protected $type = "datetime";

    /**
     * @param string | null $value
     * @return $this
     */
    public function addValue(?string $value = null) : self
    {
        $this->values[] = is_null($value) ? "" : date("Y-m-d H:i:s", strtotime($value));
        return $this;
    }

}
