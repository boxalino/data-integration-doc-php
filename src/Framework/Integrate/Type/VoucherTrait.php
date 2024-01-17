<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Framework\Integrate\Type;

use Boxalino\DataIntegrationDoc\Service\Util\ConfigurationDataObject;

/**
 * Class VoucherTrait
 * @package Boxalino\DataIntegrationDoc\Framework\Integrate\Type
 */
trait VoucherTrait
{

    /**
     * @param ConfigurationDataObject $configurationDataObject
     * @return bool
     */
    public function canRun(ConfigurationDataObject $configurationDataObject): bool
    {
        return $configurationDataObject->getAllowVoucherSync();
    }


}
