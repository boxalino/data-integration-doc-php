<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\User\Doc;

/**
 * Class DocOrder
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocUser implements DocUserHandlerInterface
{
    use DocGeneratorTrait;

    /**
     * @var array | null
     */
    protected $docData = null;

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocUserHandlerInterface::DOC_TYPE;
    }

}
