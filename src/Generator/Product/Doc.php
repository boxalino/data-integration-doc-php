<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Product;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\TechnicalPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the product document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252149870/doc+product
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc implements DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;
    use TechnicalPropertiesTrait;

    /**
     * @var Line
     */
    protected $product_line;

    /**
     * @return Line
     */
    public function getProductLine(): Line
    {
        return $this->product_line;
    }

    /**
     * @param Line $productLine
     * @return self
     */
    public function setProductLine(Line $productLine): self
    {
        $this->product_line = $productLine->toArray();
        return $this;
    }


}
