<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\UserSelection;

use Boxalino\DataIntegrationDoc\Doc\UserSelection;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the user selection data structure per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313673/doc+user+selection
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends UserSelection
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
