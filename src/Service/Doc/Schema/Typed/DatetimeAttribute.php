<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Service\Doc\Schema\Typed;

/**
 * Class DatetimeAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Doc\Schema
 */
class DatetimeAttribute extends Typed
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
