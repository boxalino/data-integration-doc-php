<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Category;
use Boxalino\DataIntegrationDoc\Doc\Schema\Localized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Price;
use Boxalino\DataIntegrationDoc\Doc\Schema\PriceLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Pricing;
use Boxalino\DataIntegrationDoc\Doc\Schema\PricingLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedGenericLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\RepeatedLocalized;
use Boxalino\DataIntegrationDoc\Doc\Schema\Stock;
use Boxalino\DataIntegrationDoc\Doc\Schema\Tag;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;

/**
 * Trait DocSchemaIntegrationTrait
 *
 * Generic property generation based on a given schema
 * Can be used throughout integrations
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait DocSchemaIntegrationTrait
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
        $schema->setValue(round($value*$factor, 2))
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
     * @param string $language
     * @param string $currencyCode
     * @param int $value
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
    public function getNumericAttributeSchema(array $values, string $propertyName, ?string $key) : NumericAttribute
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
                    $schema[] = $this->_addLocalized($data, $language);
                }

                continue;
            }

            $schema[] = $this->_addLocalized($value, $language);
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
    public function getTagSchema(string $value, array $languages = [], string $type = "generic", array $localizedValues = []) : Tag
    {
        $property = new Tag();
        $property->setValue($value);
        $property->setType($type);

        if(count($languages) > 1 && !empty($localizedValues))
        {
            $property->setLocValues($this->getLocalizedSchema($localizedValues, $languages));
        }

        return $property;
    }

    /**
     * @param string|array $item
     * @param array $languages
     * @param string $type
     * @param array $localizedValues
     * @return DocPropertiesInterface
     */
    public function getImagesSchema($item, array $languages=[], string $type = "main", array $localizedValues = []) : DocPropertiesInterface
    {
        $propertyType = new RepeatedGenericLocalized();
        return $this->getRepeatedGenericLocalizedSchema($item, $languages, $type, $propertyType);
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

}
