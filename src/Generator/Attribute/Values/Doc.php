<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Attribute\Values;

use Boxalino\DataIntegrationDoc\Doc\AttributeValue;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the attribute values document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends AttributeValue
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;

    /**
     * @return string
     */
    public function getCreationTm(): string
    {
        return $this->creation_tm;
    }

    /**
     * @param string $creation_tm
     * @return AttributeValue
     */
    public function setCreationTm(string $creation_tm): AttributeValue
    {
        $this->creation_tm = is_null($creation_tm) ? date("Y-m-d H:i:s") : date("Y-m-d H:i:s", strtotime($creation_tm));
        return $this;
    }


}
