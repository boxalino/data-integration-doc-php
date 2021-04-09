<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Generator\User\Doc;

/**
 * Class DocOrder
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocUser implements DocUserHandlerInterface
{
    use DocHandlerIntegrationTrait;
    use LoadTrait;

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

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return new Doc($data);
    }

}
