<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\UserGeneratedContent;

use Boxalino\DataIntegrationDoc\Doc\UserGeneratedContent;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the user generated data structure per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252280985/doc+user+generated+content
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends UserGeneratedContent
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
