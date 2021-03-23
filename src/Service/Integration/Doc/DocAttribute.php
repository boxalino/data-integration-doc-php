<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Service\Integration\DocGeneratorTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\DocIntegrationTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\IntegrationHandler;

/**
 * Class DocAtrtibute
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocAttribute implements DocAttributeHandlerInterface
{

    use DocGeneratorTrait;
    use DocIntegrationTrait;

    /**
     * @var \ArrayIterator
     */
    protected $multivalueAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $indexedAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $numericAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $datetimeAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $localizedAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $hierarchicalAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $searchByAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $searchSuggestionAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $filterByAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $groupByAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $orderByAttributesList;

    /**
     * @var \ArrayIterator
     */
    protected $properties;

    public function __construct()
    {
        $this->attributeHandlerList = new \ArrayIterator();
        $this->multivalueAttributesList = new \ArrayIterator();
        $this->indexedAttributesList = new \ArrayIterator();
        $this->numericAttributesList = new \ArrayIterator();
        $this->datetimeAttributesList = new \ArrayIterator();
        $this->localizedAttributesList = new \ArrayIterator();
        $this->hierarchicalAttributesList = new \ArrayIterator();
        $this->searchByAttributesList = new \ArrayIterator();
        $this->searchSuggestionAttributesList = new \ArrayIterator();
        $this->filterByAttributesList = new \ArrayIterator();
        $this->groupByAttributesList = new \ArrayIterator();
        $this->orderByAttributesList = new \ArrayIterator();
        $this->properties = new \ArrayIterator();
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocAttributeHandlerInterface::DOC_TYPE;
    }

    /**
     * @return \ArrayIterator
     */
    public function getProperties() : \ArrayIterator
    {
        return $this->properties;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addProperties(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->properties->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addMultivalue(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->multivalueAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addIndexed(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->indexedAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addNumeric(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->numericAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addDatetime(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->datetimeAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addLocalized(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->localizedAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addHierarchical(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->hierarchicalAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addSearchBy(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->searchByAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addSearchSuggestion(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->searchSuggestionAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addFilterBy(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->filterByAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addGroupBy(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->groupByAttributesList->append($propertyName);
        }
        return $this;
    }

    /**
     * @param string $propertyName
     * @return DocHandlerInterface
     */
    public function addOrderBy(string $propertyName) : DocHandlerInterface
    {
        $properties = array_filter(explode(",",$propertyName));
        foreach($properties as $propertyName)
        {
            $this->orderByAttributesList->append($propertyName);
        }
        return $this;
    }

}
