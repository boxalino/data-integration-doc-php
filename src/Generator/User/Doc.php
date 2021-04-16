<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\User;

use Boxalino\DataIntegrationDoc\Doc\User;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the user document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252182638/doc+user
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends User
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
