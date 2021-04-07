<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

/**
 * Interface UserIntegrationHandlerInterface
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
interface UserIntegrationHandlerInterface
    extends IntegrationHandlerInterface
{

    public const INTEGRATION_TYPE="user";

    public const INTEGRATION_MODE="F";


}
