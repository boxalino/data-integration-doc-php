<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\DeltaIntegrationInterface;

/**
 * Interface ContentDeltaIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface ContentDeltaIntegrationHandlerInterface
    extends IntegrationHandlerInterface, DeltaIntegrationInterface
{

}
