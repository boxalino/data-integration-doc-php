<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Generator\User;

use Boxalino\DataIntegrationDoc\Service\Doc\User;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the order document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313666/doc+order
 *
 * @package Boxalino\DataIntegrationDoc\Service\Generator
 */
class Doc extends User
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
