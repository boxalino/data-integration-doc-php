<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Languages;

use Boxalino\DataIntegrationDoc\Service\Doc\Language;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the languages document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280975/doc+languages
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator
 */
class Doc extends Language
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
     * @return  Language
     */
    public function setCreationTm(string $creation_tm): Language
    {
        $this->creation_tm = is_null($creation_tm) ? date("Y-m-d H:i:s") : date("Y-m-d H:i:s", strtotime($creation_tm));
        return $this;
    }

}
