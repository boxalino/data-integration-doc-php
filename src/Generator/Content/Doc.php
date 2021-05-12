<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Content;

use Boxalino\DataIntegrationDoc\Doc\Content;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the content per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280968/doc+content
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Content
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
