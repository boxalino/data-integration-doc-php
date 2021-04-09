<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Service\Integration\Doc;

use Boxalino\DataIntegrationDoc\Doc\Attribute;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaIntegrationTrait;
use Boxalino\DataIntegrationDoc\Service\Flow\LoadTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\Doc\DocHandlerIntegrationTrait;
use Boxalino\DataIntegrationDoc\Service\Integration\IntegrationHandler;
use Boxalino\DataIntegrationDoc\Generator\Attribute\Doc;
use Psr\Log\LoggerInterface;
use Boxalino\DataIntegrationDoc\Generator\DocGeneratorInterface;

/**
 * Class DocAtrtibute
 * Handler for the doc_attribute file content
 *
 * @package Boxalino\DataIntegrationDoc\Service\Integration
 */
class DocAttribute implements DocAttributeHandlerInterface
{

    use DocHandlerIntegrationTrait;
    use DocSchemaIntegrationTrait;
    use LoadTrait;

    /**
     * @var array
     */
    protected $languages = [];

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

    public function __construct(LoggerInterface $logger)
    {
        $this->propertyHandlerList = new \ArrayIterator();
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
        $this->logger = $logger;
    }

    /**
     * @return string
     */
    public function getDocType() : string
    {
        return DocAttributeHandlerInterface::DOC_TYPE;
    }

    /**
     * @param array $data
     * @return DocGeneratorInterface
     */
    public function getDocSchemaGenerator(array $data = []) : DocGeneratorInterface
    {
        return new Doc($data);
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
            $this->properties->offsetSet($propertyName, $propertyName);
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
            $this->multivalueAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->indexedAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->numericAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->datetimeAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->localizedAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->hierarchicalAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->searchByAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->searchSuggestionAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->filterByAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->groupByAttributesList->offsetSet($propertyName, $propertyName);
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
            $this->orderByAttributesList->offsetSet($propertyName, $propertyName);
        }
        return $this;
    }

    /**
     * Unset a property from the list once has been edited
     *
     * @param string $propertyName
     */
    public function unset(string $propertyName) : void
    {
        foreach(get_object_vars($this) as $property)
        {
            if($property instanceof \ArrayIterator)
            {
                if($property->offsetExists($propertyName))
                {
                    $property->offsetUnset($propertyName);
                }
            }
        }
    }

    /**
     * Adding the configured attributes
     */
    public function addConfiguredProperties() : void
    {
        foreach($this->getProperties() as $property)
        {
            /** @var Attribute $doc */
            $doc = $this->getDocSchemaGenerator();
            $doc->setName($property)
                ->addLabel($this->getPropertyLabel($property, $this->getLanguages()))
                ->setIndexed($this->indexedAttributesList->offsetExists($property))
                ->setHierarchical($this->hierarchicalAttributesList->offsetExists($property))
                ->setMultiValue($this->multivalueAttributesList->offsetExists($property))
                ->setLocalized($this->localizedAttributesList->offsetExists($property))
                ->setSearchBy($this->searchByAttributesList->offsetExists($property) ? 1 : 0)
                ->setSearchSuggestion($this->searchSuggestionAttributesList->offsetExists($property))
                ->setFilterBy($this->filterByAttributesList->offsetExists($property))
                ->setGroupBy($this->groupByAttributesList->offsetExists($property))
                ->setOrderBy($this->orderByAttributesList->offsetExists($property))
                ->setCreationTm(date("Y-m-d H:i:s"));

            $this->addDocLine($doc);
        }
    }

    /**
     * Unset a property from the list once has been edited
     * Applies custom configurations on an existing doc
     *
     * @param string $propertyName
     */
    public function applyPropertyConfigurations(Attribute &$doc) : void
    {
        $property = $doc->getName();

        if($this->indexedAttributesList->offsetExists($property)){$doc->setIndexed(true);}
        if($this->hierarchicalAttributesList->offsetExists($property)){$doc->setHierarchical(true);}
        if($this->multivalueAttributesList->offsetExists($property)){$doc->setMultiValue(true);}
        if($this->localizedAttributesList->offsetExists($property)){$doc->setLocalized(true);}
        if($this->searchByAttributesList->offsetExists($property)){$doc->setSearchBy(1);}
        if($this->searchSuggestionAttributesList->offsetExists($property)){$doc->setSearchSuggestion(true);}
        if($this->filterByAttributesList->offsetExists($property)){$doc->setFilterBy(true);}
        if($this->groupByAttributesList->offsetExists($property)){$doc->setGroupBy(true);}
        if($this->orderByAttributesList->offsetExists($property)){$doc->setOrderBy(true);}

        $this->unset($property);
    }

    /**
     * @param array $languages
     * @return DocHandlerInterface
     */
    public function setLanguages(array $languages) : DocHandlerInterface
    {
        $this->languages = $languages;
        return $this;
    }

    /**
     * @return array
     */
    public function getLanguages() : array
    {
        return $this->languages;
    }


}
