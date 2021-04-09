<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Order;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\Order;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the order document per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313666/doc+order
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Order
    implements DocGeneratorInterface
{

    use DocPropertiesTrait;
    use GeneratorHydratorTrait;


}
