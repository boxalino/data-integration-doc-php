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
     * @var Array<<StringAttribute>>
     */
    protected $string_attributes = [];

    /**
     * @var Array<<StringLocalizedAttribute>>
     */
    protected $localized_string_attributes = [];

    /**
     * @var Array<<NumericAttribute>>
     */
    protected $numeric_attributes = [];

    /**
     * @var Array<<NumericLocalizedAttribute>>
     */
    protected $localized_numeric_attributes = [];

    /**
     * @var Array<<DatetimeAttribute>>
     */
    protected $datetime_attributes = [];

    /**
     * @var Array<<DatetimeLocalizedAttribute>>
     */
    protected $localized_datetime_attributes = [];

    /**
     * @return array
     */
    public function getStringAttributes(): array
    {
        return $this->string_attributes;
    }

    /**
     * @param array $string_attributes
     * @return self
     */
    public function setStringAttributes(array $string_attributes): self
    {
        foreach($string_attributes as $attribute)
        {
            $this->addStringAttribute($attribute);
        }

        return $this;
    }

    /**
     * @param Array<<StringAttribute>> $repeateds
     * @return $this
     */
    public function addStringAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->addStringAttribute($repeated);
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
     * @param array $localized_string_attributes
     * @return self
     */
    public function setLocalizedStringAttributes(array $localized_string_attributes): self
    {
        foreach($localized_string_attributes as $attribute)
        {
            $this->addLocalizedStringAttribute($attribute);
        }
        return $this;
    }

    /**
     * @param Array<<StringLocalizedAttribute>> $repeateds
     * @return $this
     */
    public function addLocalizedStringAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->addLocalizedStringAttribute($repeated);
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
     * @param array $numeric_attributes
     * @return self
     */
    public function setNumericAttributes(array $numeric_attributes): self
    {
        foreach($numeric_attributes as $attribute)
        {
            $this->addNumericAttribute($attribute);
        }
        return $this;
    }

    /**
     * @param Array<<NumericAttribute>> $repeateds
     * @return $this
     */
    public function addNumericAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->addNumericAttribute($repeated);
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
     * @param Array<<NumericLocalizedAttribute>> $repeateds
     * @return $this
     */
    public function addLocalizedNumericAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->addLocalizedNumericAttribute($repeated);
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
    public function setDatetimeAttributes(array $datetime_attributes): self
    {
        /** @var DatetimeAttribute $attribute */
        foreach($datetime_attributes as $attribute)
        {
            $this->addDatetimeAttribute($attribute);
        }
        return $this;
    }

    /**
     * @param Array<<DatetimeAttribute>> $repeateds
     * @return $this
     */
    public function addDatetimeAttributes(array $repeateds): self
    {
        foreach ($repeateds as $repeated)
        {
            $this->addDatetimeAttribute($repeated);
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
     * @return self
     */
    public function setLocalizedDatetimeAttributes(array $localized_datetime_attributes): self
    {
        /** @var DatetimeLocalizedAttribute $attribute */
        foreach($localized_datetime_attributes as $attribute)
        {
            $this->addLocalizedDatetimeAttribute($attribute);
        }
        return $this;
    }

    /**
     * @param Array<<DatetimeLocalizedAttribute>> $repeateds
     * @return $this
     */
    public function addLocalizedDatetimeAttributes(array $repeateds): self
    {
        /** @var DatetimeLocalizedAttribute $repeated */
        foreach ($repeateds as $repeated)
        {
            $this->addLocalizedDatetimeAttribute($repeated);
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


}
