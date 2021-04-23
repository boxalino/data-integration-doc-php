<?php declare(strict_types=1);
namespace Boxalino\DataIntegrationDoc\Doc;

use Boxalino\DataIntegrationDoc\Doc\Schema\Order\Comment;
use Boxalino\DataIntegrationDoc\Doc\Schema\Order\Contact;
use Boxalino\DataIntegrationDoc\Doc\Schema\Order\Product as OrderProduct;
use Boxalino\DataIntegrationDoc\Doc\Schema\Order\Voucher as OrderVoucher;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\DatetimeLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\NumericLocalizedAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringAttribute;
use Boxalino\DataIntegrationDoc\Doc\Schema\Typed\StringLocalizedAttribute;

class Order implements DocPropertiesInterface
{
    use DocPropertiesTrait;
    use TechnicalPropertiesTrait;

    /**
     * the internal identifier of the order
     * @var string
     */
    protected $internal_id;

    /**
     * the external identifier of the order (can be the same as the internal identifier)
     * @var string | null
     */
    protected $external_id;

    /**
     * the parent order id (when applicable)
     * @var string | null
     */
    protected $parent_order_id;

    /**
     * the persona type who created this order
     * @var string | null
     */
    protected $persona_type;

    /**
     * the persona who created this order
     * @var string
     */
    protected $persona_id = "N/A";

    /**
     * ECM for e-commerce, ERP for external, etc
     * @var string | null
     */
    protected $order_sys_cd = "ECM";

    /**
     * the store in which the order was done
     * @var string | null
     */
    protected $store;

    /**
     * the persona type who sold this order
     * @var string | null
     */
    protected $seller_persona_type;

    /**
     * the persona who sold this order
     * @var string | null
     */
    protected $seller_persona_id;

    /**
     * the order currency code (e.g.: 'chf', 'eur', ...)
     * @var string | null
     */
    protected $currency_cd;

    /**
     * the total value of the order
     * @var float
     */
    protected $total_crncy_amt;

    /**
     * the total value of the order
     * @var float | null
     */
    protected $total_crncy_amt_net;

    /**
     * the gross margin of the order
     * @var float | null
     */
    protected $total_gross_margin_crncy_amt;

    /**
     * the net margin of the order
     * @var float | null
     */
    protected $total_net_margin_crncy_amt;

    /**
     * the shipping costs of the order
     * @var float | null
     */
    protected $shipping_costs;

    /**
     * the net shipping costs of the order
     * @var float | null
     */
    protected $shipping_costs_net;

    /**
     * the currency factor of the order
     * @var float | null
     */
    protected $currency_factor;

    /**
     * was the order tax free?
     * @var bool | null
     */
    protected $tax_free;

    /**
     * the tax rate of the order
     * @var float | null
     */
    protected $tax_rate;

    /**
     * the tax amount of the order
     * @var float | null
     */
    protected $tax_amnt;

    /**
     * the payment method
     * should be one of the following value (other values will be considered as OTHER)
     * FREE/GRATIS/GIFT , INVOICE , PREPAYMENT , MASTERCARD , VISA , AMEX , TWINT , POINTS_PAY
     * MARKETPLACES , GALAXUS_MARKETPLACE , COLLECTIVE_INVOICE , OTHER
     *
     * @var string | null
     */
    protected $payment_method;

    /**
     * the shipping method
     * should be one of the following value (other values will be considered as OTHER)
     * MAIL , DIGITAL , NONE , DPD_PRODUCT , DPD_STANDARD_DEPOSIT , DPD_STANDARD_SIGNING
     * DPD_EXPRESS_SIGNING , PLANZER_DEPOSIT , PLANZER_SIGNING , NOTIME
     * PERSONAL_PICKUP , OWN_DRIVER , OTHER
     *
     * @var string | null
     */
    protected $shipping_method;

    /**
     * the shipping description
     * @var string | null
     */
    protected $shipping_description;

    /**
     * the device used
     * @var string | null
     */
    protected $device;

    /**
     * the referer used
     * @var string | null
     */
    protected $referer;

    /**
     * the partner used
     * @var string | null
     */
    protected $partner;

    /**
     * the language of the order
     * @var string | null
     */
    protected $language;

    /**
     * the tracking code of the order
     * @var string | null
     */
    protected $tracking_code;

    /**
     * was the order a gift?
     * @var bool | null
     */
    protected $is_gift;

    /**
     * was the order with wrapping?
     * @var bool | null
     */
    protected $wrapping;

    /**
     * the email of the order
     * @var string | null
     */
    protected $email;

    /**
     * chain of comments related to the order
     * @var Array<<Comment>> | array
     */
    protected $comments = [];

    /**
     * @var Array<<Comment>> | array
     */
    protected $internal_comments = [];

    /**
     * @var Array<<Comment>> | array
     */
    protected $customer_comments = [];

    /**
     * billing/shipping information
     * @var Array<<Contact>> | array
     */
    protected $contacts = [];

    /**
     * @var string | datetime | null
     */
    protected $creation;

    /**
     * @var string | datetime | null
     */
    protected $last_update;

    /**
     * @var string | datetime | null
     */
    protected $confirmation;

    /**
     * @var string | datetime | null
     */
    protected $cleared;

    /**
     * @var string | datetime | null
     */
    protected $sent;

    /**
     * @var string | datetime | null
     */
    protected $received;

    /**
     * @var string | datetime | null
     */
    protected $returned;

    /**
     * @var string | datetime | null
     */
    protected $repaired;

    /**
     * should the order be considered as successful or not
     * @TODO check with Sylvain why is status an int?!
     * @var float | null
     */
    protected $status = 0;

    /**
     * should be one of the following value (other values will be considered as OTHER):
     * MANUALLY_CREATED , IMPORTED , INCONSISTENT , CONSISTENT , CLEARED , CONFIRMED , UNCONFIRMED ,
     * PROCESSING , SHIPPED , RECEIVED , CLOSED , ABORTED , OTHER
     * @var string | null
     */
    protected $status_code;

    /**
     * @var string | null
     */
    protected $internal_state;

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
     * the products of the order
     * @var Array<<OrderProduct>>
     */
    protected $products = [];

    /**
     * @var Array<<OrderVoucher>>
     */
    protected $vouchers = [];

    /**
     * technical field
     * @var string
     */
    protected $creation_tm;

    /**
     * technical field
     * @var int
     */
    protected $client_id = 0;

    /**
     * technical field
     * @var int
     */
    protected $src_sys_id = 0;

    /**
     * @return string
     */
    public function getInternalId(): string
    {
        return $this->internal_id;
    }

    /**
     * @param string $internal_id
     * @return Order
     */
    public function setInternalId(string $internal_id): Order
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
     * @return Order
     */
    public function setExternalId(?string $external_id): Order
    {
        $this->external_id = $external_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentOrderId(): ?string
    {
        return $this->parent_order_id;
    }

    /**
     * @param string|null $parent_order_id
     * @return Order
     */
    public function setParentOrderId(?string $parent_order_id): Order
    {
        $this->parent_order_id = $parent_order_id;
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
     * @return Order
     */
    public function setPersonaType(?string $persona_type): Order
    {
        $this->persona_type = $persona_type;
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
     * @return Order
     */
    public function setPersonaId(?string $persona_id): Order
    {
        $this->persona_id = $persona_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOrderSysCd(): ?string
    {
        return $this->order_sys_cd;
    }

    /**
     * @param string|null $order_sys_cd
     * @return Order
     */
    public function setOrderSysCd(?string $order_sys_cd): Order
    {
        $this->order_sys_cd = $order_sys_cd;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSellerPersonaType(): ?string
    {
        return $this->seller_persona_type;
    }

    /**
     * @param string|null $seller_persona_type
     * @return Order
     */
    public function setSellerPersonaType(?string $seller_persona_type): Order
    {
        $this->seller_persona_type = $seller_persona_type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSellerPersonaId(): ?string
    {
        return $this->seller_persona_id;
    }

    /**
     * @param string|null $seller_persona_id
     * @return Order
     */
    public function setSellerPersonaId(?string $seller_persona_id): Order
    {
        $this->seller_persona_id = $seller_persona_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrencyCd(): ?string
    {
        return $this->currency_cd;
    }

    /**
     * @param string|null $currency_cd
     * @return Order
     */
    public function setCurrencyCd(?string $currency_cd): Order
    {
        $this->currency_cd = $currency_cd;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCrncyAmt(): float
    {
        return $this->total_crncy_amt;
    }

    /**
     * @param float $total_crncy_amt
     * @return Order
     */
    public function setTotalCrncyAmt(float $total_crncy_amt): Order
    {
        $this->total_crncy_amt = $total_crncy_amt;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalCrncyAmtNet(): ?float
    {
        return $this->total_crncy_amt_net;
    }

    /**
     * @param float|null $total_crncy_amt_net
     * @return Order
     */
    public function setTotalCrncyAmtNet(?float $total_crncy_amt_net): Order
    {
        $this->total_crncy_amt_net = $total_crncy_amt_net;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalGrossMarginCrncyAmt(): ?float
    {
        return $this->total_gross_margin_crncy_amt;
    }

    /**
     * @param float|null $total_gross_margin_crncy_amt
     * @return Order
     */
    public function setTotalGrossMarginCrncyAmt(?float $total_gross_margin_crncy_amt): Order
    {
        $this->total_gross_margin_crncy_amt = $total_gross_margin_crncy_amt;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTotalNetMarginCrncyAmt(): ?float
    {
        return $this->total_net_margin_crncy_amt;
    }

    /**
     * @param float|null $total_net_margin_crncy_amt
     * @return Order
     */
    public function setTotalNetMarginCrncyAmt(?float $total_net_margin_crncy_amt): Order
    {
        $this->total_net_margin_crncy_amt = $total_net_margin_crncy_amt;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getShippingCostsNet(): ?float
    {
        return $this->shipping_costs_net;
    }

    /**
     * @param float|null $shipping_costs_net
     * @return Order
     */
    public function setShippingCostsNet(?float $shipping_costs_net): Order
    {
        $this->shipping_costs_net = $shipping_costs_net;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getCurrencyFactor(): ?float
    {
        return $this->currency_factor;
    }

    /**
     * @param float|null $currency_factor
     * @return Order
     */
    public function setCurrencyFactor(?float $currency_factor): Order
    {
        $this->currency_factor = $currency_factor;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTaxFree(): ?bool
    {
        return $this->tax_free;
    }

    /**
     * @param bool|null $tax_free
     * @return Order
     */
    public function setTaxFree(?bool $tax_free): Order
    {
        $this->tax_free = $tax_free;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTaxRate(): ?float
    {
        return $this->tax_rate;
    }

    /**
     * @param float|null $tax_rate
     * @return Order
     */
    public function setTaxRate(?float $tax_rate): Order
    {
        $this->tax_rate = $tax_rate;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getTaxAmnt(): ?float
    {
        return $this->tax_amnt;
    }

    /**
     * @param float|null $tax_amnt
     * @return Order
     */
    public function setTaxAmnt(?float $tax_amnt): Order
    {
        $this->tax_amnt = $tax_amnt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    /**
     * @param string|null $payment_method
     * @return Order
     */
    public function setPaymentMethod(?string $payment_method): Order
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingMethod(): ?string
    {
        return $this->shipping_method;
    }

    /**
     * @param string|null $shipping_method
     * @return Order
     */
    public function setShippingMethod(?string $shipping_method): Order
    {
        $this->shipping_method = $shipping_method;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingDescription(): ?string
    {
        return $this->shipping_description;
    }

    /**
     * @param string|null $shipping_description
     * @return Order
     */
    public function setShippingDescription(?string $shipping_description): Order
    {
        $this->shipping_description = $shipping_description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDevice(): ?string
    {
        return $this->device;
    }

    /**
     * @param string|null $device
     * @return Order
     */
    public function setDevice(?string $device): Order
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReferer(): ?string
    {
        return $this->referer;
    }

    /**
     * @param string|null $referer
     * @return Order
     */
    public function setReferer(?string $referer): Order
    {
        $this->referer = $referer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPartner(): ?string
    {
        return $this->partner;
    }

    /**
     * @param string|null $partner
     * @return Order
     */
    public function setPartner(?string $partner): Order
    {
        $this->partner = $partner;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return Order
     */
    public function setLanguage(?string $language): Order
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingCode(): ?string
    {
        return $this->tracking_code;
    }

    /**
     * @param string|null $tracking_code
     * @return Order
     */
    public function setTrackingCode(?string $tracking_code): Order
    {
        $this->tracking_code = $tracking_code;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsGift(): ?bool
    {
        return $this->is_gift;
    }

    /**
     * @param bool|null $is_gift
     * @return Order
     */
    public function setIsGift(?bool $is_gift): Order
    {
        $this->is_gift = $is_gift;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWrapping(): ?bool
    {
        return $this->wrapping;
    }

    /**
     * @param bool|null $wrapping
     * @return Order
     */
    public function setWrapping(?bool $wrapping): Order
    {
        $this->wrapping = $wrapping;
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
     * @return Order
     */
    public function setEmail(?string $email): Order
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param array|[] $comments
     * @return Order
     */
    public function setComments(array $comments): Order
    {
        foreach($comments as $comment)
        {
            if($comment instanceof Comment)
            {
                $this->comments[] = $comment->toArray();
                continue;
            }

            $this->comments[] = $comment;
        }
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addComments(Comment $comment) : Order
    {
        $this->comments[] = $comment->toArray();
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getInternalComments(): array
    {
        return $this->internal_comments;
    }

    /**
     * @param array|[] $internal_comments
     * @return Order
     */
    public function setInternalComments(array $internal_comments): Order
    {
        foreach($internal_comments as $comment)
        {
            if($comment instanceof Comment)
            {
                $this->internal_comments[] = $comment->toArray();
                continue;
            }

            $this->internal_comments[] = $comment;
        }
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addInternalComments(Comment $comment) : Order
    {
        $this->internal_comments[] = $comment->toArray();
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getCustomerComments(): array
    {
        return $this->customer_comments;
    }

    /**
     * @param array|[] $customer_comments
     * @return Order
     */
    public function setCustomerComments(array $customer_comments): Order
    {
        foreach($customer_comments as $comment)
        {
            if($comment instanceof Comment)
            {
                $this->customer_comments[] = $comment->toArray();
                continue;
            }

            $this->customer_comments[] = $comment;
        }
        return $this;
    }

    /**
     * @param Comment $comment
     * @return $this
     */
    public function addCustomerComments(Comment $comment) : Order
    {
        $this->customer_comments[] = $comment->toArray();
        return $this;
    }

    /**
     * @return array|[]
     */
    public function getContacts(): array
    {
        return $this->contacts;
    }

    /**
     * @param array|[] $contacts
     * @return Order
     */
    public function setContacts(array $contacts): Order
    {
        foreach($contacts as $contact)
        {
            if($contact instanceof Contact)
            {
                $this->contacts[] = $contact->toArray();
                continue;
            }

            $this->contacts[] = $contact;
        }
        return $this;
    }

    /**
     * @param Contact $contact
     * @return $this
     */
    public function addContacts(Contact $contact) : Order
    {
        $this->contacts[] = $contact->toArray();
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getCreation(): ?string
    {
        return $this->creation;
    }

    /**
     * @param datetime|string|null $creation
     * @return Order
     */
    public function setCreation(?string $creation): Order
    {
        $this->creation = $creation;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getLastUpdate(): ?string
    {
        return $this->last_update;
    }

    /**
     * @param datetime|string|null $last_update
     * @return Order
     */
    public function setLastUpdate(?string $last_update): Order
    {
        $this->last_update = $last_update;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getConfirmation(): ?string
    {
        return $this->confirmation;
    }

    /**
     * @param datetime|string|null $confirmation
     * @return Order
     */
    public function setConfirmation(?string $confirmation): Order
    {
        $this->confirmation = $confirmation;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getCleared(): ?string
    {
        return $this->cleared;
    }

    /**
     * @param datetime|string|null $cleared
     * @return Order
     */
    public function setCleared(?string $cleared): Order
    {
        $this->cleared = $cleared;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getSent(): ?string
    {
        return $this->sent;
    }

    /**
     * @param datetime|string|null $sent
     * @return Order
     */
    public function setSent(?string $sent): Order
    {
        $this->sent = $sent;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getReceived(): ?string
    {
        return $this->received;
    }

    /**
     * @param datetime|string|null $received
     * @return Order
     */
    public function setReceived(?string $received): Order
    {
        $this->received = $received;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getReturned(): ?string
    {
        return $this->returned;
    }

    /**
     * @param datetime|string|null $returned
     * @return Order
     */
    public function setReturned(?string $returned): Order
    {
        $this->returned = $returned;
        return $this;
    }

    /**
     * @return datetime|string|null
     */
    public function getRepaired(): ?string
    {
        return $this->repaired;
    }

    /**
     * @param datetime|string|null $repaired
     * @return Order
     */
    public function setRepaired(?string $repaired): Order
    {
        $this->repaired = $repaired;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getStatus(): ?float
    {
        return $this->status;
    }

    /**
     * @param float|null $status
     * @return Order
     */
    public function setStatus(?float $status): Order
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatusCode(): ?string
    {
        return $this->status_code;
    }

    /**
     * @param string|null $status_code
     * @return Order
     */
    public function setStatusCode(?string $status_code): Order
    {
        $this->status_code = $status_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInternalState(): ?string
    {
        return $this->internal_state;
    }

    /**
     * @param string|null $internal_state
     * @return Order
     */
    public function setInternalState(?string $internal_state): Order
    {
        $this->internal_state = $internal_state;
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

    /**
     * @return []
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param [] $products
     * @return Order
     */
    public function setProducts(array $products): Order
    {
        foreach($products as $product)
        {
            if($product instanceof OrderProduct)
            {
                $this->products[] = $product->toArray();
                continue;
            }
            $this->products[] = $product;
        }
        return $this;
    }

    /**
     * @return []
     */
    public function getVouchers(): array
    {
        return $this->vouchers;
    }

    /**
     * @param [] $vouchers
     * @return Order
     */
    public function setVouchers(array $vouchers): Order
    {
        foreach($vouchers as $voucher)
        {
            if($voucher instanceof OrderVoucher)
            {
                $this->vouchers[] = $voucher->toArray();
                continue;
            }
            $this->vouchers[] = $voucher;
        }
        return $this;
    }

    /**
     * @param [] $vouchers
     * @return Order
     */
    public function addVouchers(OrderVoucher $voucher): Order
    {
        $this->vouchers[] = $voucher->toArray();
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStore(): ?string
    {
        return $this->store;
    }

    /**
     * @param string|null $store
     * @return Order
     */
    public function setStore(?string $store): Order
    {
        $this->store = $store;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getShippingCosts(): ?float
    {
        return $this->shipping_costs;
    }

    /**
     * @param float|int|null $shipping_costs
     * @return Order
     */
    public function setShippingCosts(?float $shipping_costs): Order
    {
        $this->shipping_costs = $shipping_costs;
        return $this;
    }



}
