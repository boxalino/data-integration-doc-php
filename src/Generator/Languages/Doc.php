<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Languages;

use Boxalino\DataIntegrationDoc\Doc\Language;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the languages document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280975/doc+languages
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Language
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
