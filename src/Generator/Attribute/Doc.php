<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Attribute;

use Boxalino\DataIntegrationDoc\Doc\Attribute;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the attribute document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280945/doc+attribute
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Attribute
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
