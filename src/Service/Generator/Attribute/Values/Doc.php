<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Generator\Attribute\Values;

use Boxalino\InstantUpdate\Service\Doc\AttributeValue;
use Boxalino\InstantUpdate\Service\DocPropertiesTrait;
use Boxalino\InstantUpdate\Service\Generator\DocGeneratorInterface;
use Boxalino\InstantUpdate\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the attribute values document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * @package Boxalino\InstantUpdate\Service\Generator
 */
class Doc extends AttributeValue
    implements \JsonSerializable, DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;


}
