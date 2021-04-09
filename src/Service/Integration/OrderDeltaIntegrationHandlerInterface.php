<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\DeltaIntegrationInterface;

/**
 * Interface OrderDeltaIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface OrderDeltaIntegrationHandlerInterface
    extends IntegrationHandlerInterface, DeltaIntegrationInterface
{

}
