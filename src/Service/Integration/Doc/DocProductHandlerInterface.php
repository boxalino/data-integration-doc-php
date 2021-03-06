<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Generator\Product\Doc;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaPropertyHandlerInterface;

/**
 * Interface DocProductHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface DocProductHandlerInterface extends DocHandlerInterface
{

    public const DOC_TYPE = "doc_product";

    public const DOC_PRODUCT_LEVEL_SKU = 'skus';
    public const DOC_PRODUCT_LEVEL_LINE = 'product_line';
    public const DOC_PRODUCT_LEVEL_GROUP = 'product_groups';


}
