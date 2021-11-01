<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Util;

/**
 * Interface DiHandlerIntegrationConfigurationInterface
 *
 * @package Boxalino\DataIntegrationDoc\Framework\Util
 */
interface DiHandlerIntegrationConfigurationInterface
    extends DiIntegrationConfigurationInterface
{

    /**
     * @param string $handlerIntegrateTime
     */
    public function setHandlerIntegrateTime(string $handlerIntegrateTime) : void;

    /**
     * @return string
     */
    public function getHandlerIntegrateTime(): string;


}
