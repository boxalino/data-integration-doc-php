<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Doc\Attribute;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Languages\Doc as LanguagesDoc;
use Boxalino\DataIntegrationDoc\Service\Generator\Attribute\Values\Doc as AttributeValuesDoc;
use Boxalino\DataIntegrationDoc\Service\Generator\Attribute\Doc as AttributeDoc;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Doc as ProductDoc;
use Boxalino\DataIntegrationDoc\Service\Generator\Order\Doc as OrderDoc;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Group;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Line;
use Boxalino\DataIntegrationDoc\Service\Generator\Product\Sku;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocLanguagesHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocProductHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocOrderHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocUserHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocAttributeHandlerInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocAttributeValuesHandlerInterface;

/**
 * Trait DocGeneratorTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
trait DocGeneratorTrait
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
            case DocAttributeHandlerInterface::DOC_TYPE:
                $schema = new AttributeDoc($data);
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
            case DocOrderHandlerInterface::DOC_TYPE:
                $schema = new OrderDoc();
                break;
            default:
                break;
        }

        return $schema;
    }


}
