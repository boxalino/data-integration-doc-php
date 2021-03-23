<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration;

use Boxalino\DataIntegrationDoc\Service\GcpClientInterface;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerInterface;

/**
 * Class IntegrationHandler
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class IntegrationHandler implements IntegrationHandlerInterface
{
    /**
     * @var \ArrayObject
     */
    protected $docHandlerList;

    public function __construct()
    {
        $this->docHandlerList = new \ArrayObject();
    }

    /**
     * @return \ArrayIterator
     */
   public function getDocs() : \ArrayIterator
   {
       $docs = new \ArrayIterator();

       /** @var DocHandlerInterface $handler */
       foreach($this->docHandlerList as $handler)
       {
           $docs->offsetSet($handler->getDocType(), $handler->getDoc());
       }

       return $docs;
   }

    /**
     * Dynamically configure the document handlers for every doc type to be exported
     *
     * @param DocHandlerInterface $docHandler
     * @param string $integrationStrategy F | I | D
     * @return IntegrationHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface
    {
        $this->docHandlerList->append($docHandler);

        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getHandlers(): \ArrayObject
    {
        return $this->docHandlerList;
    }

}
