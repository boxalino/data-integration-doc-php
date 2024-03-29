<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema\Typed;

use Boxalino\DataIntegrationDoc\Doc\Schema\Repeated;

/**
 * Class StringAttribute
 *
 * @package Boxalino\DataIntegrationDoc\Doc\Schema
 */
class StringAttribute extends Repeated
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
        $this->values[] = (string) $value;
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
