<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Type;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Class ContentTrait
 * @package Boxalino\DataIntegrationDoc\Framework\Integrate\Type
 */
trait ContentTrait
{

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return bool
     */
    public function canRun(ConfigurationDataObject $configurationDataObject): bool
    {
        return $configurationDataObject->getAllowContentSync();
    }


}
