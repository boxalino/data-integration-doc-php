<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Languages;

use Boxalino\DataIntegrationDoc\Service\Doc\Language;
use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;
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
    implements \JsonSerializable, DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;


}
