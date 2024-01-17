<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Generator\Voucher;

use Boxalino\DataIntegrationDoc\Doc\Voucher;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\GeneratorHydratorTrait;

/**
 * Class Doc
 *
 * Generates the voucher data structure per documentation
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252182631/doc+voucher
 *
 * @package Boxalino\DataIntegrationDoc\Generator
 */
class Doc extends Voucher
    implements DocGeneratorInterface
{

    use GeneratorHydratorTrait;


}
