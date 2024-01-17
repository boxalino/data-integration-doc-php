<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Content;

use Boxalino\DataIntegrationDoc\Doc\Bundle;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the product bundle per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280961/doc+bundle
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Bundle
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
