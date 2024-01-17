<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\Integration\Mode\DeltaIntegrationInterface;

/**
 * Interface UserGeneratedContentDeltaIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface UserGeneratedContentDeltaIntegrationHandlerInterface
    extends IntegrationHandlerInterface, DeltaIntegrationInterface
{

}
