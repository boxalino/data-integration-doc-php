<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Integration\DocIntegrationTrait;
use Boxalino\InstantUpdate\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Class DocAtrtibuteValues
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class DocAttributeValues implements DocAttributeValuesHandlerInterface
{

    use DocIntegrationTrait;

    /**
     * @var \ArrayIterator
     */
    protected $attributeHandlerList;

    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayIterator();
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocAttributeValuesHandlerInterface::DOC_TYPE;
    }

    /**
     * Dynamically configure the attribute handlers for every data type to be retrieved
     * (the handler must have DB access information for the attribute element data)
     *
     * @param AttributeHandlerInterface $attributeHandler
     * @return DocHandlerInterface
     */
    public function addHandler(AttributeHandlerInterface $attributeHandler) : DocHandlerInterface
    {
        $this->attributeHandlerList->append($attributeHandler);
        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getHandlers() : \ArrayIterator
    {
        return $this->attributeHandlerList;
    }

}
