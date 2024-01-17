<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Type;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Class BundleTrait
 * @package Boxalino\DataIntegrationDoc\Framework\Integrate\Type
 */
trait BundleTrait
{

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return bool
     */
    public function canRun(ConfigurationDataObject $configurationDataObject): bool
    {
        return $configurationDataObject->getAllowBundleSync();
    }


}
