<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Generator\Product\Doc;
use Boxalino\InstantUpdate\Service\Integration\DocProduct\AttributeHandlerInterface;

/**
 * Class DocProduct
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class DocProduct implements DocProductHandlerInterface
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
     * @TODO: Implement getDoc() method.
     *
     * @return Doc
     */
    public function getDoc(): Doc
    {
        return new Doc();
    }

    /**
     * Dynamically configure the attribute handlers for every data type to be retrieved
     * (the handler must have DB access information for the attribute element data)
     *
     * @param AttributeHandlerInterface $attributeHandler
     * @return DocProductHandlerInterface
     */
    public function addAttributeHandler(AttributeHandlerInterface $attributeHandler) : DocProductHandlerInterface
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
