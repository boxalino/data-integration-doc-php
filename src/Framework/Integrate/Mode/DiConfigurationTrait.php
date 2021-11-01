<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Mode;

use Boxalino\DataIntegrationDoc\Framework\Util\DiConfigurationInterface;

/**
 * Class DiConfigurationTrait
 *
 * @package Boxalino\DataIntegrationDoc\Service
 */
trait DiConfigurationTrait
{

    /**
     * @var DiConfigurationInterface
     */
    protected $configurationManager;

    /**
     * @return DiConfigurationInterface
     */
    public function getConfigurationManager() : DiConfigurationInterface
    {
        return $this->configurationManager;
    }

    /**
     * @param DiConfigurationInterface $configurationManager
     */
    public function setConfigurationManager(DiConfigurationInterface $configurationManager) : void
    {
        $this->configurationManager = $configurationManager;
    }


}
