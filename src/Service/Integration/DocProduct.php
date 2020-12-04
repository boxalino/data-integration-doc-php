<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

/**
 * Class DocProduct
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class DocProduct
{

    /**
     * @var \ArrayObject
     */
    protected $attributeHandlerList;

    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayObject();
    }

    /**
     * Dynamically configure the attribute handlers for every data type to be retrieved
     * (the handler must have DB access information for the attribute element data)
     *
     * @param AttributeHandlerInterface $attributeHandler
     */
    public function addAttributeHandler(AttributeHandlerInterface $attributeHandler) : self
    {
        $this->attributeHandlerList->append($attributeHandler);
        return $this;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocProductHandlerInterface::DOC_TYPE;
    }
}
