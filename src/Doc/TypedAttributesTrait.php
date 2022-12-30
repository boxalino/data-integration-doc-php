<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringLocalizedAttribute;

/**
 * Trait TypedAttributesTrait
 *
 * @package Boxalino\DataIntegrationDoc\Doc
 */
trait TypedAttributesTrait
{
    /**
     * @var Array<<StringAttribute>>  | array
     */
    protected $string_attributes;

    /**
     * @var Array<<StringLocalizedAttribute>> | array
     */
    protected $localized_string_attributes;

    /**
     * @var Array<<NumericAttribute>> | array
     */
    protected $numeric_attributes;

    /**
     * @var Array<<NumericLocalizedAttribute>> | array
     */
    protected $localized_numeric_attributes;

    /**
     * @var Array<<DatetimeAttribute>> | array
     */
    protected $datetime_attributes;

    /**
     * @var Array<<DatetimeLocalizedAttribute>> | array
     */
    protected $localized_datetime_attributes;

    /**
     * @return array
     */
    public function getStringAttributes(): array
    {
        return $this->string_attributes;
    }

    /**
     * @param Array<<StringAttribute>> | array $string_attributes
     * @return $this
     */
    public function addStringAttributes(array $string_attributes): self
    {
        foreach ($string_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                $this->addStringAttribute($attribute);
                continue;
            }

            $this->string_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param StringAttribute $attribute
     * @return $this
     */
    public function addStringAttribute(StringAttribute $attribute) : self
    {
        $this->string_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getLocalizedStringAttributes(): array
    {
        return $this->localized_string_attributes;
    }

    /**
     * @param Array<<StringLocalizedAttribute>> | array $localized_string_attributes
     * @return $this
     */
    public function addLocalizedStringAttributes(array $localized_string_attributes): self
    {
        foreach ($localized_string_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                $this->addLocalizedStringAttribute($attribute);
                continue;
            }

            $this->localized_string_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param StringLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedStringAttribute(StringLocalizedAttribute $attribute) : self
    {
        $this->localized_string_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getNumericAttributes(): array
    {
        return $this->numeric_attributes;
    }

    /**
     * @param Array<<NumericAttribute>> | array $repeateds
     * @return $this
     */
    public function addNumericAttributes(array $numeric_attributes): self
    {
        foreach ($numeric_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                $this->addNumericAttribute($attribute);
                continue;
            }

            $this->numeric_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param NumericAttribute $attribute
     * @return $this
     */
    public function addNumericAttribute(NumericAttribute $attribute) : self
    {
        $this->numeric_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getLocalizedNumericAttributes(): array
    {
        return $this->localized_numeric_attributes;
    }

    /**
     * @param array $localized_numeric_attributes
     * @return self
     */
    public function setLocalizedNumericAttributes(array $localized_numeric_attributes): self
    {
        /** @var NumericLocalizedAttribute $attribute */
        foreach($localized_numeric_attributes as $attribute)
        {
            $this->addLocalizedNumericAttribute($attribute);
        }
        return $this;
    }

    /**
     * @param Array<<NumericLocalizedAttribute>> | array $localized_numeric_attributes
     * @return $this
     */
    public function addLocalizedNumericAttributes(array $localized_numeric_attributes): self
    {
        foreach ($localized_numeric_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                $this->addLocalizedNumericAttribute($attribute);
                continue;
            }

            $this->localized_numeric_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param NumericLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedNumericAttribute(NumericLocalizedAttribute $attribute) : self
    {
        $this->localized_numeric_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getDatetimeAttributes(): array
    {
        return $this->datetime_attributes;
    }

    /**
     * @param array $datetime_attributes
     * @return self
     */

    /**
     * @param Array<<DatetimeAttribute>> | array $datetime_attributes
     * @return $this
     */
    public function addDatetimeAttributes(array $datetime_attributes): self
    {
        foreach ($datetime_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                $this->addDatetimeAttribute($attribute);
                continue;
            }

            $this->datetime_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param DatetimeAttribute $attribute
     * @return $this
     */
    public function addDatetimeAttribute(DatetimeAttribute $attribute) : self
    {
        $this->datetime_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function getLocalizedDatetimeAttributes(): array
    {
        return $this->localized_datetime_attributes;
    }

    /**
     * @param Array<<DatetimeLocalizedAttribute>> $localized_datetime_attributes
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(array $localized_datetime_attributes): self
    {
        foreach ($localized_datetime_attributes as $attribute)
        {
            if($attribute instanceof DocPropertiesInterface)
            {
                /** @var DatetimeLocalizedAttribute $attribute */
                $this->addLocalizedDatetimeAttribute($attribute);
                continue;
            }

            $this->localized_datetime_attributes[] = $attribute;
        }

        return $this;
    }

    /**
     * @param DatetimeLocalizedAttribute $attribute
     * @return $this
     */
    public function addLocalizedDatetimeAttribute(DatetimeLocalizedAttribute $attribute) : self
    {
        $this->localized_datetime_attributes[] = $attribute->toArray();
        return $this;
    }

    /**
     * @return array
     */
    public function _toArrayTypedAttributes() : array
    {
        return [
            'string_attributes' => $this->string_attributes,
            'localized_string_attributes' => $this->localized_string_attributes,
            'numeric_attributes' => $this->numeric_attributes,
            'localized_numeric_attributes' => $this->localized_numeric_attributes,
            'datetime_attributes' => $this->datetime_attributes,
            'localized_datetime_attributes' => $this->localized_datetime_attributes
        ];
    }

    /**
     * @return array
     */
    public function _toArrayTypedClassMethods() : array
    {
        return [
            'getStringAttributes',
            'addStringAttributes',
            'addStringAttribute',
            'getLocalizedStringAttributes',
            'addLocalizedStringAttributes',
            'addLocalizedStringAttribute',
            'getNumericAttributes',
            'addNumericAttributes',
            'addNumericAttribute',
            'getLocalizedNumericAttributes',
            'setLocalizedNumericAttributes',
            'addLocalizedNumericAttributes',
            'addLocalizedNumericAttribute',
            'getDatetimeAttributes',
            'addDatetimeAttributes',
            'addDatetimeAttribute',
            'getLocalizedDatetimeAttributes',
            'addLocalizedDatetimeAttributes',
            'addLocalizedDatetimeAttribute'
        ];
    }


}
