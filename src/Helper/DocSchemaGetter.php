<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Helper;

use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;
use Boxalino\DataIntegrationDoc\Doc\DocSchemaInterface;
use Boxalino\DataIntegrationDoc\Doc\Schema\Category;
use Boxalino\DataIntegrationDoc\Doc\Schema\Customer;
use Boxalino\DataIntegrationDoc\Doc\Schema\Label;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Period;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\PriceLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\Schema\PricingLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Product;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Stock;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;
use Boxalino\DataIntegrationDoc\Doc\Schema\Content;

/**
 * Class DocSchemaGetter
 * (segment from DocSchemaIntegrationTrait)
 *
 * Generic property generation based on a given schema
 * Can be used throughout integrations
 *
 * @package Boxalino\DataIntegrationDoc\Helper
 */
class DocSchemaGetter
{

    /**
     * @param array $languages
     * @param array|int|string $values
     * @return Visibility
     */
    public function getVisibilitySchema(array $languages, $values) : Visibility
    {
        $schema = new Visibility();
        foreach($languages as $language)
        {
            $value = is_array($values) ? (int) $values[$language] : (int)$values;
            $localized = new Localized();
            $localized->setLanguage($language)->setValue($value);
            $schema->addValue($localized);
        }

        return $schema;
    }

    /**
     * @param $value
     * @param $availability
     * @param string|null $deliveryCenter
     * @return Stock
     */
    public function getStockSchema($value, $availability, ?string $deliveryCenter = null) : Stock
    {
        $schema = new Stock();
        $schema->setValue($value)
            ->setAvailability($availability);
        if(!is_null($deliveryCenter))
        {
            $schema->setDeliveryCenter($deliveryCenter);
        }

        return $schema;
    }

    /**
     * @param array $languages
     * @param array $currencyCodes
     * @param array $currencyFactors
     * @param string|null $price
     * @param null $labels
     * @param string|null $type
     * @return Pricing
     */
    public function getPricingSchema(array $languages, array $currencyCodes, array $currencyFactors, ?string $price, $labels = null, ?string $type = "discounted") : Pricing
    {
        $schema = new Pricing();
        foreach($languages as $language)
        {
            $label = is_array($labels) ? $labels[$language] : $labels;
            foreach($currencyCodes as $currencyCode)
            {
                $currencyFactor = isset($currencyFactors[$currencyCode]) ? (float) $currencyFactors[$currencyCode] : 1;
                $schema->addValue($this->getPricingLocalizedSchema($language, $currencyCode, (float)$price, $currencyFactor, $label));
            }
        }

        $schema->setType($type);

        return $schema;
    }

    /**
     * @param string $language
     * @param string $currencyCode
     * @param int $value
     * @param float $factor
     * @param string $label
     * @return PricingLocalized
     */
    public function getPricingLocalizedSchema(string $language, string $currencyCode, float $value, float $factor, string $label) : PricingLocalized
    {
        $schema = new PricingLocalized();
        $schema->setValue(round((float)$value*$factor, 2))
            ->setCurrency($currencyCode)
            ->setLanguage($language)
            ->setLabel($label);

        return $schema;
    }

    /**
     * @param array $languages
     * @param array $currencyCodes
     * @param array $currencyFactors
     * @param string|null $salesPrice
     * @param string|null $listPrice
     * @return Price
     */
    public function getPriceSchema(array $languages, array $currencyCodes, array $currencyFactors, ?string $salesPrice, ?string $listPrice) : Price
    {
        $schema = new Price();
        foreach($languages as $language)
        {
            foreach($currencyCodes as $currencyCode)
            {
                $currencyFactor = isset($currencyFactors[$currencyCode]) ? (float) $currencyFactors[$currencyCode] : 1;
                if(!is_null($salesPrice))
                {
                    $schema->addSalesPrice($this->getPriceLocalizedSchema($language, $currencyCode, (float)$salesPrice, $currencyFactor));
                }

                if(!is_null($listPrice))
                {
                    $schema->addListPrice($this->getPriceLocalizedSchema($language, $currencyCode, (float)$listPrice, $currencyFactor));
                }
            }
        }

        return $schema;
    }

    /**
     * @param array $languages
     * @param array $currencyCodes
     * @param array $currencyFactors
     * @param array $salesPrices
     * @param array $listPrices
     * @param array $grossPrices
     * @param array $otherPrices
     * @return Price
     */
    public function getLocalizedPriceSchema(array $languages, array $currencyCodes, array $currencyFactors, array $salesPrices = [], array $listPrices = [], array $grossPrices = [], array $otherPrices = []) : Price
    {
        $schema = new Price();
        foreach($languages as $language)
        {
            foreach($currencyCodes as $currencyCode)
            {
                $currencyFactor = isset($currencyFactors[$currencyCode]) ? (float) $currencyFactors[$currencyCode] : 1;
                $listPrice = isset($listPrices[$language]) ? (float) $listPrices[$language] : null;
                if($listPrice <> null)
                {
                    $schema->addListPrice($this->getPriceLocalizedSchema($language, $currencyCode, $listPrice, $currencyFactor));
                }

                $salesPrice = isset($salesPrices[$language]) ? (float) $salesPrices[$language] : null;
                if($salesPrice <> null)
                {
                    $schema->addSalesPrice($this->getPriceLocalizedSchema($language, $currencyCode, $salesPrice, $currencyFactor));
                }

                $grossPrice = isset($grossPrices[$language]) ? (float) $grossPrices[$language] : null;
                if($grossPrice <> null)
                {
                    $schema->addGrossMargin($this->getPriceLocalizedSchema($language, $currencyCode, $grossPrice, $currencyFactor));
                }

                $otherPrice = isset($otherPrices[$language]) ? (float) $otherPrices[$language] : null;
                if($otherPrice <> null)
                {
                    $schema->addOtherPrice($this->getPriceLocalizedSchema($language, $currencyCode, $otherPrice, $currencyFactor));
                }
            }
        }

        return $schema;
    }

    /**
     * @param string $language
     * @param string $currencyCode
     * @param float $value
     * @param float $factor
     * @return PriceLocalized
     */
    public function getPriceLocalizedSchema(string $language, string $currencyCode, float $value, float $factor) : PriceLocalized
    {
        $schema = new PriceLocalized();
        $schema->setValue(round($value*$factor, 2))
            ->setCurrency($currencyCode)
            ->setLanguage($language);

        return $schema;
    }

    /**
     * @param array $values
     * @param array $langauges
     * @return Category
     */
    public function getCategoryAttributeSchema(array $values, array $languages) : Category
    {
        $categoryzation = new Category();
        foreach($languages as $language)
        {
            foreach($values as $categoryId)
            {
                $localizedCategory = new Localized();
                $localizedCategory->setValue($categoryId)->setLanguage($language);
                $categoryzation->addCategoryId($localizedCategory);
            }
        }

        return $categoryzation;
    }

    /**
     * @param array $values
     * @param string $propertyName
     * @return StringAttribute
     */
    public function getStringAttributeSchema(array $values, string $propertyName) : StringAttribute
    {
        $typedProperty = new StringAttribute();
        $typedProperty->setName($propertyName);
        foreach($values as $value)
        {
            $typedProperty->addValue($value);
        }

        return $typedProperty;
    }

    /**
     * @param array $values
     * @param string $propertyName
     * @return NumericAttribute
     */
    public function getNumericAttributeSchema(array $values, string $propertyName, ?string $key = null) : NumericAttribute
    {
        $typedProperty = new NumericAttribute();
        $typedProperty->setName($propertyName);
        foreach($values as $value)
        {
            $typedProperty->addValue($value);
        }

        if(is_null($key))
        {
            return $typedProperty;
        }

        $typedProperty->setKey($key);
        return $typedProperty;
    }

    /**
     * @param array $values
     * @param string $propertyName
     * @return DatetimeAttribute
     */
    public function getDatetimeAttributeSchema(array $values, string $propertyName) : DatetimeAttribute
    {
        $typedProperty = new DatetimeAttribute();
        $typedProperty->setName($propertyName);
        foreach($values as $value)
        {
            $typedProperty->addValue($value);
        }

        return $typedProperty;
    }

    /**
     * @param array|string|int $item
     * @return array<<Localized>>
     */
    public function getLocalizedSchema($item, array $languages) : array
    {
        $schema = [];
        foreach($languages as $language)
        {
            $value = $item;
            if(is_array($item) && array_key_exists($language, $item))
            {
                $value = $item[$language];
            }

            if(is_array($value))
            {
                foreach($value as $data)
                {
                    $schema[] = $this->_addLocalized($data, $language)->toArray();
                }

                continue;
            }

            $schema[] = $this->_addLocalized($value, $language)->toArray();
        }

        return $schema;
    }

    /**
     * @param $value
     * @param string | null $language
     * @return Localized
     */
    protected function _addLocalized($value, ?string $language = "") : Localized
    {
        $localized = new Localized();
        if(is_null($value)){ $value= "";}
        $localized->setLanguage($language)->setValue($value);

        return $localized;
    }

    /**
     * @param array $item
     * @param array $languages
     * @param string|null $propertyName
     * @param string|null $idField
     * @return RepeatedGenericLocalized
     */
    public function getRepeatedLocalizedSchema(array $item, array $languages, ?string $propertyName= null, ?string $idField=DocSchemaInterface::FIELD_INTERNAL_ID) : RepeatedGenericLocalized
    {
        $property = new RepeatedGenericLocalized();
        $schema = new RepeatedLocalized();
        if(!is_null($propertyName))
        {
            $property->setName($propertyName);
        }
        foreach($languages as $language)
        {
            $localized = new Localized();
            $localized->setLanguage($language)->setValue($item[$language]);
            $schema->addValue($localized);
        }
        $schema->setValueId($item[$idField]);
        $property->addValue($schema);

        return $property;
    }


    /**
     * @param string | array $item
     * @param array $languages
     * @param string|null $propertyName
     * @param DocPropertiesInterface|null $property
     * @param string|null $idField
     * @return DocPropertiesInterface
     */
    public function getRepeatedGenericLocalizedSchema($item, array $languages, ?string $propertyName= null, ?DocPropertiesInterface $property = null, ?string $idField = null) : DocPropertiesInterface
    {
        if(is_null($property))
        {
            $property = new RepeatedGenericLocalized();
        }

        $schema = new RepeatedLocalized();
        $schema->setValue($this->getLocalizedSchema($item, $languages));
        if(!is_null($propertyName))
        {
            $property->setName($propertyName);
        }

        if(!is_null($idField))
        {
            if(isset($item[$idField]))
            {
                $schema->setValueId($item[$idField]);
            }
        }

        $property->addValue($schema);

        return $property;
    }

    /**
     * @param string $value
     * @param string $type
     * @param array $languages
     * @param array $localizedValues
     * @return Tag
     */
    public function getTagSchema(string $value, string $type = "generic", array $localizedValues = [], array $languages = []) : Tag
    {
        $schema = new Tag();
        $schema->setValue($value);
        $schema->setType($type);

        if(count($languages) > 1 && !empty($localizedValues))
        {
            $schema->setLocValues($this->getLocalizedSchema($localizedValues, $languages));
        }

        return $schema;
    }

    /**
     * @param array $record
     * @param array $languages
     * @return Period
     */
    public function getPeriodSchema(array $record, array $languages = []) : Period
    {
        $schema = new Period();
        if(isset($record['start_time']))
        {
            $schema->setStartDatetime($this->getLocalizedSchema($record['start_time'], $languages));
        }

        if(isset($record['end_time']))
        {
            $schema->setEndTime($this->getLocalizedSchema($record['end_time'], $languages));
        }

        return $schema;
    }

    /**
     * @param string|array $item
     * @param array $languages
     * @param string $type
     * @param array $localizedValues
     * @return DocPropertiesInterface
     */
    public function getImagesSchema($item, string $type = "main", array $languages=[]) : DocPropertiesInterface
    {
        return $this->getRepeatedGenericLocalizedSchema($item, $languages, $type, new RepeatedGenericLocalized(), "value_id");
    }

    /**
     * @param string $value
     * @param string $name
     * @param string $type
     * @param array $localizedValues
     * @param array $languages
     * @return Label
     */
    public function getLabelSchema(string $value, string $name, string $type="main", array $localizedValues = [], array $languages = []) : Label
    {
        $schema = new Label();
        $schema->setValue($value);
        $schema->setName($name);
        $schema->setType($type);
        if(count($languages) > 1 && !empty($localizedValues))
        {
            $schema->setLocValues($this->getLocalizedSchema($localizedValues, $languages));
        }

        return $schema;
    }

    /**
     * @param string $propertyName
     * @return array
     */
    public function getPropertyLabel(string $propertyName, array $languages) : array
    {
        $propertyName = ucwords(str_replace("_", " ", $propertyName));
        return $this->getLocalizedSchema($propertyName, $languages);
    }

    /**
     * @param string $property
     * @param array $schema
     * @param array $languages
     * @param null $source
     * @return array
     */
    public function addingLocalizedPropertyToSchema(string $property, array $schema, array $languages, $source = null) : array
    {
        foreach($languages as $language)
        {
            $content = null;
            if(is_array($source) && isset($source[$language])){ $content = $source[$language]; }
            if(isset($schema[$language]) && !isset($source[$language])){ $content = $schema[$language]; }
            if(is_null($content)){  continue; }

            $localized = new Localized();
            $localized->setValue($content)->setLanguage($language);
            $schema[$property][] = $localized->toArray();
        }

        return $schema;
    }

    /**
     * @param \ArrayObject $relation
     * @return Product
     */
    public function getProductSchema(\ArrayObject $relation) : Product
    {
        $schema = new Product();
        if($relation->offsetExists("type"))
        {
            $schema->setType((string)$relation->offsetGet("type"));
        }
        if($relation->offsetExists("name"))
        {
            $schema->setName((string)$relation->offsetGet("name"));
        }
        if($relation->offsetExists("product_group"))
        {
            $schema->setProductGroup((string)$relation->offsetGet("product_group"));
        }
        if($relation->offsetExists("sku"))
        {
            $schema->setSku((string)$relation->offsetGet("sku"));
        }
        if($relation->offsetExists("value"))
        {
            $schema->setValue((int)$relation->offsetGet("value"));
        }

        return $schema;
    }

    /**
     * @param array $values
     * @return Content
     */
    public function getContentSchema(array $values) : Content
    {
        $schema = new Content();
        try {
            if(isset($values["type"]))
            {
                $schema->setType($values["type"]);
            }

            if(isset($values["name"]))
            {
                $schema->setName($values["name"]);
            }

            if(isset($values["content_type"]))
            {
                $schema->setContentType($values["content_type"]);
            }

            if(isset($values["content_id"]))
            {
                $schema->setContentId($values["content_id"]);
            }

            if(isset($values["value"]))
            {
                $schema->setValue($values["value"]);
            }
        } catch(\Throwable $exception) {}

        return $schema;
    }

    /**
     * @param array $values
     * @return Customer
     */
    public function getCustomerSchema(array $values) : Customer
    {
        $schema = new Customer();
        try {
            if(isset($values["type"]))
            {
                $schema->setType($values["type"]);
            }

            if(isset($values["name"]))
            {
                $schema->setName($values["name"]);
            }

            if(isset($values["persona_id"]))
            {
                $schema->setPersonaId($values["persona_id"]);
            }

            if(isset($values["customer_id"]))
            {
                $schema->setCustomerId($values["customer_id"]);
            }

            if(isset($values["value"]))
            {
                $schema->setValue($values["value"]);
            }
        } catch(\Throwable $exception) {}

        return $schema;
    }


}
