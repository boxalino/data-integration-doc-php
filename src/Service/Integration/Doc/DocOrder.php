<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Generator\DocGeneratorInterface;
use Boxalino\DataIntegrationDoc\Service\Generator\Order\Doc;
use Boxalino\DataIntegrationDoc\Service\Integration\DocIntegrationTrait;

/**
 * Class DocOrder
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocOrder implements DocOrderHandlerInterface
{
    use DocGeneratorTrait;
    use DocIntegrationTrait;

    /**
     * @var array | null
     */
    protected $docData = null;

    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayIterator();
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocOrderHandlerInterface::DOC_TYPE;
    }

}
