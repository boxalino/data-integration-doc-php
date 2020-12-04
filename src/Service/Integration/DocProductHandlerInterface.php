<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Generator\Product\Doc;

/**
 * Interface DocProductHandlerInterface
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
interface DocProductHandlerInterface
{

    public const DOC_TYPE = "doc_product";

    public const DOC_PRODUCT_LEVEL_SKU = 'skus';
    public const DOC_PRODUCT_LEVEL_LINE = 'product_line';
    public const DOC_PRODUCT_LEVEL_GROUP = 'product_groups';

    /**
     * @param AttributeHandlerInterface $attributeHandler
     * @return self
     */
    public function addAttributeHandler(AttributeHandlerInterface $attributeHandler) : self;

    /**
     * @return Doc
     */
    public function getDoc() : Doc;

    /**
     * @return string
     */
    public function getDocType() : string;

}
