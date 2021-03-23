<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Product;

use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the product document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252149870/doc+product
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator
 */
class Doc implements DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;

    /**
     * @var Line
     */
    protected $product_line;

    /**
     * Required format: YYYY-MM-DD hh:mm:ss
     * @var string (timestamp)
     */
    protected $creation_tm;

    /**
     * @var int
     */
    protected $client_id = 0;

    /**
     * @var int
     */
    protected $src_sys_id = 0;

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

    /**
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string $creation_tm
     * @return Doc
     */
    public function setCreationTm(?string $creation_tm): Doc
    {
        $this->creation_tm = is_null($creation_tm) ? date("Y-m-d H:i:s") : date("Y-m-d H:i:s", strtotime($creation_tm));
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     * @return Doc
     */
    public function setClientId(int $client_id): Doc
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSrcSysId(): int
    {
        return $this->src_sys_id;
    }

    /**
     * @param int $src_sys_id
     * @return Doc
     */
    public function setSrcSysId(int $src_sys_id): Doc
    {
        $this->src_sys_id = $src_sys_id;
        return $this;
    }

}
