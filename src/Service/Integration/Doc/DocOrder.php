<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Order\Doc;

/**
 * Class DocOrder
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocOrder implements DocOrderHandlerInterface
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
        return DocOrderHandlerInterface::DOC_TYPE;
    }

}
