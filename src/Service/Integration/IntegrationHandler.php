<?php declare(strict_types=1);
namespace Boxalino\InstantUpdate\Service\Integration;

/**
 * Class IntegrationHandler
 *
 * @package Boxalino\InstantUpdate\Service\Integration
 */
class IntegrationHandler implements IntegrationHandlerInterface
{
    /**
     * @var \ArrayIterator
     */
    protected $docHandlerList;

    public function __construct()
    {
        $this->docHandlerList = new \ArrayIterator();
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
     * @return IntegrationHandlerInterface
     */
    public function addHandler(DocHandlerInterface $docHandler) : IntegrationHandlerInterface
    {
        $this->docHandlerList->append($docHandler);
        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getHandlers(): \ArrayIterator
    {
        return $this->docHandlerList;
    }

}
