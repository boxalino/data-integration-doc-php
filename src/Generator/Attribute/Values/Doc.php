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


}
