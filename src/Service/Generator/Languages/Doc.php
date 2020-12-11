<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Languages;

use Boxalino\InstantUpdate\Service\Doc\Language;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;
use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the languages document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280975/doc+languages
 *
 * @package Boxalino\InstantUpdate\Service\Generator
 */
class Doc extends Language
    implements \JsonSerializable, DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;


}
