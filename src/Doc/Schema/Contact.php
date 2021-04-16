<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc\Schema;

use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesTrait;
use Boxalino\DataIntegrationDoc\Doc\DocPropertiesInterface;

class Contact implements DocPropertiesInterface
{

    use DocPropertiesTrait;

    /**
     * @var string | null
     */
    protected $type;

    /**
     * @var string
     */
    protected $persona_id;

    /**
     * @var string | null
     */
    protected $persona_type;

    /**
     * @var string | null
     */
    protected $internal_id;

    /**
     * @var string | null
     */
    protected $external_id;

    /**
     * @var string | null
     */
    protected $title;

    /**
     * @var string | null
     */
    protected $prefix;

    /**
     * @var string | null
     */
    protected $firstname;

    /**
     * @var string | null
     */
    protected $middlename;

    /**
     * @var string | null
     */
    protected $lastname;

    /**
     * @var string | null
     */
    protected $suffix;

    /**
     * @var string | null
     */
    protected $gender;

    /**
     * @var string | null
     */
    protected $date_of_birth;

    /**
     * @var string | null
     */
    protected $account_creation;

    /**
     * @var string | null
     */
    protected $creation_label;

    /**
     * @var string | null
     */
    protected $auto_group;

    /**
     * @var string | null
     */
    protected $invoice_status;

    /**
     * @var string | null
     */
    protected $status;

    /**
     * @var string | null
     */
    protected $spouse_id;

    /**
     * @var Array<<string>> | array
     */
    protected $children_ids;

    /**
     * @var Array<<string>> | array
     */
    protected $customer_groups = [];

    /**
     * @var Array<<string>> | array
     */
    protected $stores = [];

    /**
     * @var Array<<string>> | array
     */
    protected $websites = [];

    /**
     * @var string | null
     */
    protected $company;

    /**
     * @var string | null
     */
    protected $vat;

    /**
     * @var bool | null
     */
    protected $vat_is_valid;

    /**
     * @var string | null
     */
    protected $vat_request_id;

    /**
     * @var string | null
     */
    protected $vat_request_date;

    /**
     * @var bool | null
     */
    protected $vat_request_success;

    /**
     * @var string | null
     */
    protected $street;

    /**
     * @var string | null
     */
    protected $additional_address_line;

    /**
     * @var string | null
     */
    protected $city;

    /**
     * @var string | null
     */
    protected $zipcode;

    /**
     * @var string | null
     */
    protected $stateID;

    /**
     * @var string | null
     */
    protected $department;

    /**
     * @var string | null
     */
    protected $statename;

    /**
     * @var string | null
     */
    protected $countryiso;

    /**
     * @var string | null
     */
    protected $countryID;

    /**
     * @var string | null
     */
    protected $phone;

    /**
     * @var string | null
     */
    protected $email;

    /**
     * @var string | null
     */
    protected $mobile_phone;

    /**
     * @var string | null
     */
    protected $fax;

    /**
     * @var string | null
     */
    protected $giftregistry_item_id;

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
     * @var Array<<State>> | array
     */
    protected $subscriptions = [];

    /**
     * @var Array<<State>> | array
     */
    protected $notifications = [];

    /**
     * @var Array<<State>> | array
     */
    protected $voucher_states = [];

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return Contact
     */
    public function setType(?string $type): Contact
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonaId(): string
    {
        return $this->persona_id;
    }

    /**
     * @param string $persona_id
     * @return Contact
     */
    public function setPersonaId(?string $persona_id): Contact
    {
        $this->persona_id = $persona_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPersonaType(): ?string
    {
        return $this->persona_type;
    }

    /**
     * @param string|null $persona_type
     * @return Contact
     */
    public function setPersonaType(?string $persona_type): Contact
    {
        $this->persona_type = $persona_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInternalId(): ?string
    {
        return $this->internal_id;
    }

    /**
     * @param string|null $internal_id
     * @return Contact
     */
    public function setInternalId(?string $internal_id): Contact
    {
        $this->internal_id = $internal_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->external_id;
    }

    /**
     * @param string|null $external_id
     * @return Contact
     */
    public function setExternalId(?string $external_id): Contact
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Contact
     */
    public function setTitle(?string $title): Contact
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @param string|null $prefix
     * @return Contact
     */
    public function setPrefix(?string $prefix): Contact
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     * @return Contact
     */
    public function setFirstname(?string $firstname): Contact
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMiddlename(): ?string
    {
        return $this->middlename;
    }

    /**
     * @param string|null $middlename
     * @return Contact
     */
    public function setMiddlename(?string $middlename): Contact
    {
        $this->middlename = $middlename;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     * @return Contact
     */
    public function setLastname(?string $lastname): Contact
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuffix(): ?string
    {
        return $this->suffix;
    }

    /**
     * @param string|null $suffix
     * @return Contact
     */
    public function setSuffix(?string $suffix): Contact
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     * @return Contact
     */
    public function setGender(?string $gender): Contact
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateOfBirth(): ?string
    {
        return $this->date_of_birth;
    }

    /**
     * @param string|null $date_of_birth
     * @return Contact
     */
    public function setDateOfBirth(?string $date_of_birth): Contact
    {
        $this->date_of_birth = $date_of_birth;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccountCreation(): ?string
    {
        return $this->account_creation;
    }

    /**
     * @param string|null $account_creation
     * @return Contact
     */
    public function setAccountCreation(?string $account_creation): Contact
    {
        $this->account_creation = $account_creation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreationLabel(): ?string
    {
        return $this->creation_label;
    }

    /**
     * @param string|null $creation_label
     * @return Contact
     */
    public function setCreationLabel(?string $creation_label): Contact
    {
        $this->creation_label = $creation_label;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAutoGroup(): ?string
    {
        return $this->auto_group;
    }

    /**
     * @param string|null $auto_group
     * @return Contact
     */
    public function setAutoGroup(?string $auto_group): Contact
    {
        $this->auto_group = $auto_group;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoiceStatus(): ?string
    {
        return $this->invoice_status;
    }

    /**
     * @param string|null $invoice_status
     * @return Contact
     */
    public function setInvoiceStatus(?string $invoice_status): Contact
    {
        $this->invoice_status = $invoice_status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return Contact
     */
    public function setStatus(?string $status): Contact
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpouseId(): ?string
    {
        return $this->spouse_id;
    }

    /**
     * @param string|null $spouse_id
     * @return Contact
     */
    public function setSpouseId(?string $spouse_id): Contact
    {
        $this->spouse_id = $spouse_id;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getChildrenIds(): array
    {
        return $this->children_ids;
    }

    /**
     * @param array|[] $children_ids
     * @return Contact
     */
    public function setChildrenIds(array $children_ids): Contact
    {
        $this->children_ids = $children_ids;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getCustomerGroups(): array
    {
        return $this->customer_groups;
    }

    /**
     * @param array|[] $customer_groups
     * @return Contact
     */
    public function setCustomerGroups(array $customer_groups): Contact
    {
        $this->customer_groups = $customer_groups;
        return $this;
    }

    /**
     * @param string $customer_groups
     * @return Contact
     */
    public function addCustomerGroups(string $customer_group): Contact
    {
        $this->customer_groups[] = $customer_group;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * @param array|[] $stores
     * @return Contact
     */
    public function setStores(array $stores): Contact
    {
        $this->stores = $stores;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getWebsites(): array
    {
        return $this->websites;
    }

    /**
     * @param array|[] $websites
     * @return Contact
     */
    public function setWebsites(array $websites): Contact
    {
        $this->websites = $websites;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     * @return Contact
     */
    public function setCompany(?string $company): Contact
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVat(): ?string
    {
        return $this->vat;
    }

    /**
     * @param string|null $vat
     * @return Contact
     */
    public function setVat(?string $vat): Contact
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVatIsValid(): ?bool
    {
        return $this->vat_is_valid;
    }

    /**
     * @param bool|null $vat_is_valid
     * @return Contact
     */
    public function setVatIsValid(?bool $vat_is_valid): Contact
    {
        $this->vat_is_valid = $vat_is_valid;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVatRequestId(): ?string
    {
        return $this->vat_request_id;
    }

    /**
     * @param string|null $vat_request_id
     * @return Contact
     */
    public function setVatRequestId(?string $vat_request_id): Contact
    {
        $this->vat_request_id = $vat_request_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVatRequestDate(): ?string
    {
        return $this->vat_request_date;
    }

    /**
     * @param string|null $vat_request_date
     * @return Contact
     */
    public function setVatRequestDate(?string $vat_request_date): Contact
    {
        $this->vat_request_date = $vat_request_date;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVatRequestSuccess(): ?bool
    {
        return $this->vat_request_success;
    }

    /**
     * @param bool|null $vat_request_success
     * @return Contact
     */
    public function setVatRequestSuccess(?bool $vat_request_success): Contact
    {
        $this->vat_request_success = $vat_request_success;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     * @return Contact
     */
    public function setStreet(?string $street): Contact
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdditionalAddressLine(): ?string
    {
        return $this->additional_address_line;
    }

    /**
     * @param string|null $additional_address_line
     * @return Contact
     */
    public function setAdditionalAddressLine(?string $additional_address_line): Contact
    {
        $this->additional_address_line = $additional_address_line;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Contact
     */
    public function setCity(?string $city): Contact
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    /**
     * @param string|null $zipcode
     * @return Contact
     */
    public function setZipcode(?string $zipcode): Contact
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateID(): ?string
    {
        return $this->stateID;
    }

    /**
     * @param string|null $stateID
     * @return Contact
     */
    public function setStateID(?string $stateID): Contact
    {
        $this->stateID = $stateID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDepartment(): ?string
    {
        return $this->department;
    }

    /**
     * @param string|null $department
     * @return Contact
     */
    public function setDepartment(?string $department): Contact
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatename(): ?string
    {
        return $this->statename;
    }

    /**
     * @param string|null $statename
     * @return Contact
     */
    public function setStatename(?string $statename): Contact
    {
        $this->statename = $statename;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryiso(): ?string
    {
        return $this->countryiso;
    }

    /**
     * @param string|null $countryiso
     * @return Contact
     */
    public function setCountryiso(?string $countryiso): Contact
    {
        $this->countryiso = $countryiso;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryID(): ?string
    {
        return $this->countryID;
    }

    /**
     * @param string|null $countryID
     * @return Contact
     */
    public function setCountryID(?string $countryID): Contact
    {
        $this->countryID = $countryID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Contact
     */
    public function setPhone(?string $phone): Contact
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMobilePhone(): ?string
    {
        return $this->mobile_phone;
    }

    /**
     * @param string|null $mobile_phone
     * @return Contact
     */
    public function setMobilePhone(?string $mobile_phone): Contact
    {
        $this->mobile_phone = $mobile_phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string|null $fax
     * @return Contact
     */
    public function setFax(?string $fax): Contact
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGiftregistryItemId(): ?string
    {
        return $this->giftregistry_item_id;
    }

    /**
     * @param string|null $giftregistry_item_id
     * @return Contact
     */
    public function setGiftregistryItemId(?string $giftregistry_item_id): Contact
    {
        $this->giftregistry_item_id = $giftregistry_item_id;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * @param array|[] $subscriptions
     * @return Contact
     */
    public function setSubscriptions(array $subscriptions): Contact
    {
        /** @var State $subscription */
        foreach($subscriptions as $subscription)
        {
            $this->subscriptions[] = $subscription->toArray();
        }

        return $this;
    }

    /**
     * @return array|[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @param array|[] $notifications
     * @return Contact
     */
    public function setNotifications(array $notifications): Contact
    {
        /** @var State $notification */
        foreach($notifications as $notification)
        {
            $this->notifications[] = $notification->toArray();
        }
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getVoucherStates(): array
    {
        return $this->voucher_states;
    }

    /**
     * @param array|[] $voucher_states
     * @return Contact
     */
    public function setVoucherStates(array $voucher_states): Contact
    {
        /** @var State $state */
        foreach($voucher_states as $state)
        {
            $this->voucher_states[] = $state->toArray();
        }

        return $this;
    }

    /**
     * @return Array
     */
    public function getStringAttributes(): array
    {
        return $this->string_attributes;
    }

    /**
     * @param Array $string_attributes
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
     * @return Array
     */
    public function getLocalizedStringAttributes(): array
    {
        return $this->localized_string_attributes;
    }

    /**
     * @param Array $localized_string_attributes
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
     * @return Array
     */
    public function getNumericAttributes(): array
    {
        return $this->numeric_attributes;
    }

    /**
     * @param Array $numeric_attributes
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
     * @return Array
     */
    public function getLocalizedNumericAttributes(): array
    {
        return $this->localized_numeric_attributes;
    }

    /**
     * @param Array $localized_numeric_attributes
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
     * @return Array
     */
    public function getDatetimeAttributes(): array
    {
        return $this->datetime_attributes;
    }

    /**
     * @param Array $datetime_attributes
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
     * @return Array
     */
    public function getLocalizedDatetimeAttributes(): array
    {
        return $this->localized_datetime_attributes;
    }

    /**
     * @param Array $localized_datetime_attributes
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
