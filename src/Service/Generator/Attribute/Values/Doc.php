<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\Attribute\Values;

use Boxalino\DataIntegrationDoc\Service\Doc\AttributeValue;
use Boxalino\DataIntegrationDoc\Service\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the attribute values document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313624/doc+attribute+values
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator
 */
class Doc extends AttributeValue
    implements \JsonSerializable, DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;


}
