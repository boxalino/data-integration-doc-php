<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Attribute;

use Boxalino\DataIntegrationDoc\Service\Doc\Attribute;
use Boxalino\DataIntegrationDoc\Service\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the attribute document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280945/doc+attribute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator
 */
class Doc extends Attribute
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
     * @return Attribute
     */
    public function setCreationTm(string $creation_tm): Attribute
    {
        $this->creation_tm = is_null($creation_tm) ? date("Y-m-d H:i:s") : date("Y-m-d H:i:s", strtotime($creation_tm));
        return $this;
    }


}
