<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\TransformerIntegrationInterface;

/**
 * Interface CoreIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface CoreIntegrationHandlerInterface
    extends IntegrationHandlerInterface, TransformerIntegrationInterface
{

}
