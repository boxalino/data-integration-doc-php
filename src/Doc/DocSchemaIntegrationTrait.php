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
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Visibility;

/**
 * Trait DocSchemaIntegrationTrait
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
                $schema->addValue($this->getPricingLocalizedSchema($language, $currencyCode, (int)$price, $currencyFactor, $label));
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
    public function getPricingLocalizedSchema(string $language, string $currencyCode, int $value, float $factor, string $label) : PricingLocalized
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
                    $schema->addSalesPrice($this->getPriceLocalizedSchema($language, $currencyCode, (int)$salesPrice, $currencyFactor));
                }

                if(!is_null($listPrice))
                {
                    $schema->addListPrice($this->getPriceLocalizedSchema($language, $currencyCode, (int)$listPrice, $currencyFactor));
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
    public function getPriceLocalizedSchema(string $language, string $currencyCode, int $value, float $factor) : PriceLocalized
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
            $localized = new Localized();
            $value = is_array($item) ? $item[$language] : $item;
            $localized->setLanguage($language)->setValue($value);
            $schema[] = $localized;
        }

        return $schema;
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
     * @param string $propertyName
     * @return array
     */
    public function getPropertyLabel(string $propertyName, array $languages) : array
    {
        $propertyName = ucwords(str_replace("_", " ", $propertyName));
        return $this->getLocalizedSchema($propertyName, $languages);
    }

}
