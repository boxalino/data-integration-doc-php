<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\Languages\Doc as LanguagesDoc;
use Boxalino\InstantUpdate\Service\Generator\Attribute\Values\Doc as AttributeValuesDoc;
use Boxalino\InstantUpdate\Service\Generator\Product\Doc as ProductDoc;
use Boxalino\InstantUpdate\Service\Generator\Product\Group;
use Boxalino\InstantUpdate\Service\Generator\Product\Line;
use Boxalino\InstantUpdate\Service\Generator\Product\Sku;
use Boxalino\InstantUpdate\Service\Integration\DocLanguagesHandlerInterface;
use Boxalino\InstantUpdate\Service\Integration\DocProductHandlerInterface;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;

/**
 * Trait DocIntegrationTrait
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
trait DocIntegrationTrait
{
   use DocPropertiesTrait;

    /**
     * @var array
     */
   protected $docs = [];

    /**
     * @var string
     */
   protected $creation_tm;

    /**
     * @param DocGeneratorInterface $doc
     */
    public function addDocLine(DocGeneratorInterface $doc)
    {
        $this->docs[] = $doc;
    }

    /**
     * @return string | JSONL
     */
    public function getDoc() : string
    {
        $docs = [];
        /** @var DocGeneratorInterface $doc */
        foreach($this->docs as $doc)
        {
            $docs[] = $doc->jsonSerialize();
        }

        return implode("\n", $docs);
    }

    /**
     * @param string $type
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocPropertySchema(string $type, array $data = []) : DocGeneratorInterface
    {
        switch($type)
        {
            case DocAttributeValuesHandlerInterface::DOC_TYPE:
                $schema = new AttributeValuesDoc($data);
                break;
            case DocLanguagesHandlerInterface::DOC_TYPE:
                $schema = new LanguagesDoc();
                break;
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_SKU:
                $schema = new Sku($data);
                break;
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_GROUP:
                $schema = new Group($data);
                break;
            case DocProductHandlerInterface::DOC_PRODUCT_LEVEL_LINE:
                $schema = new Line($data);
                break;
            case DocProductHandlerInterface::DOC_TYPE:
                $schema = new ProductDoc();
                break;
            default:
                break;
        }

        return $schema;
    }


}
