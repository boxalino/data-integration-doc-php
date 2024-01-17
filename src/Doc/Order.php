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

/**
 * doc_order data structure
 * https://boxalino.atlassian.net/wiki/spaces/BPKB/pages/252313666/doc+order
 *
 */
class Order implements DocPropertiesInterface
{
    use PropertyToTrait;
    use TechnicalPropertiesTrait;
    use TypedPropertiesTrait;

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
     * was the order tax free
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
     * @var string  | null
     */
    protected $creation;

    /**
     * @var string  | null
     */
    protected $last_update;

    /**
     * @var string  | null
     */
    protected $confirmation;

    /**
     * @var string  | null
     */
    protected $cleared;

    /**
     * @var string  | null
     */
    protected $sent;

    /**
     * @var string  | null
     */
    protected $received;

    /**
     * @var string  | null
     */
    protected $returned;

    /**
     * @var string  | null
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
     * the products of the order
     * @var Array<<OrderProduct>>
     */
    protected $products = [];

    /**
     * @var Array<<OrderVoucher>>
     */
    protected $vouchers = [];

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
     * @return string|null
     */
    public function getCreation(): ?string
    {
        return $this->creation;
    }

    /**
     * @param string|null $creation
     * @return Order
     */
    public function setCreation(?string $creation): Order
    {
        $this->creation = $creation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastUpdate(): ?string
    {
        return $this->last_update;
    }

    /**
     * @param string|null $last_update
     * @return Order
     */
    public function setLastUpdate(?string $last_update): Order
    {
        $this->last_update = $last_update;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmation(): ?string
    {
        return $this->confirmation;
    }

    /**
     * @param string|null $confirmation
     * @return Order
     */
    public function setConfirmation(?string $confirmation): Order
    {
        $this->confirmation = $confirmation;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCleared(): ?string
    {
        return $this->cleared;
    }

    /**
     * @param string|null $cleared
     * @return Order
     */
    public function setCleared(?string $cleared): Order
    {
        $this->cleared = $cleared;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSent(): ?string
    {
        return $this->sent;
    }

    /**
     * @param string|null $sent
     * @return Order
     */
    public function setSent(?string $sent): Order
    {
        $this->sent = $sent;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReceived(): ?string
    {
        return $this->received;
    }

    /**
     * @param string|null $received
     * @return Order
     */
    public function setReceived(?string $received): Order
    {
        $this->received = $received;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReturned(): ?string
    {
        return $this->returned;
    }

    /**
     * @param string|null $returned
     * @return Order
     */
    public function setReturned(?string $returned): Order
    {
        $this->returned = $returned;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRepaired(): ?string
    {
        return $this->repaired;
    }

    /**
     * @param string|null $repaired
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

    /**
     * Static definition of data structure property to avoid the use of object_get_vars (memory leak fix)
     *
     * @return array
     */
    public function toArrayList() : array
    {
        return array_merge(
            [
                'internal_id' => $this->internal_id,
                'external_id' => $this->external_id,
                'parent_order_id' => $this->parent_order_id,
                'persona_type' => $this->persona_type,
                'persona_id' => $this->persona_id,
                'order_sys_cd' => $this->order_sys_cd,
                'store' => $this->store,
                'seller_persona_type' => $this->seller_persona_type,
                'seller_persona_id' => $this->seller_persona_id,
                'currency_cd' => $this->currency_cd,
                'total_crncy_amt' => $this->total_crncy_amt,
                'total_crncy_amt_net' => $this->total_crncy_amt_net,
                'total_gross_margin_crncy_amt' => $this->total_gross_margin_crncy_amt,
                'total_net_margin_crncy_amt' => $this->total_net_margin_crncy_amt,
                'shipping_costs' => $this->shipping_costs,
                'shipping_costs_net' => $this->shipping_costs_net,
                'currency_factor' => $this->currency_factor,
                'tax_free' => $this->tax_free,
                'tax_rate' => $this->tax_rate,
                'tax_amnt' => $this->tax_amnt,
                'payment_method' => $this->payment_method,
                'shipping_method' => $this->shipping_method,
                'shipping_description' => $this->shipping_description,
                'device' => $this->device,
                'referer' => $this->referer,
                'partner' => $this->partner,
                'language' => $this->language,
                'tracking_code' => $this->tracking_code,
                'is_gift' => $this->is_gift,
                'wrapping' => $this->wrapping,
                'email' => $this->email,
                'comments' => $this->comments,
                'internal_comments' => $this->internal_comments,
                'customer_comments' => $this->customer_comments,
                'contacts' => $this->contacts,
                'creation' => $this->creation,
                'last_update' => $this->last_update,
                'confirmation' => $this->confirmation,
                'cleared' => $this->cleared,
                'sent' => $this->sent,
                'received' => $this->received,
                'returned' => $this->returned,
                'repaired' => $this->repaired,
                'status' => $this->status,
                'status_code' => $this->status_code,
                'internal_state' => $this->internal_state,
                'products' => $this->products,
                'vouchers' => $this->vouchers
            ],
            $this->_toArrayTypedAttributes(),
            $this->_toArrayPropertiesTechnical()
        );
    }

    /**
     * @return array
     */
    public function toArrayClassMethods() : array
    {
        return array_merge(
            [
                'getInternalId',
                'setInternalId',
                'getExternalId',
                'setExternalId',
                'getParentOrderId',
                'setParentOrderId',
                'getPersonaType',
                'setPersonaType',
                'getPersonaId',
                'setPersonaId',
                'getOrderSysCd',
                'setOrderSysCd',
                'getSellerPersonaType',
                'setSellerPersonaType',
                'getSellerPersonaId',
                'setSellerPersonaId',
                'getCurrencyCd',
                'setCurrencyCd',
                'getTotalCrncyAmt',
                'setTotalCrncyAmt',
                'getTotalCrncyAmtNet',
                'setTotalCrncyAmtNet',
                'getTotalGrossMarginCrncyAmt',
                'setTotalGrossMarginCrncyAmt',
                'getTotalNetMarginCrncyAmt',
                'setTotalNetMarginCrncyAmt',
                'getShippingCostsNet',
                'setShippingCostsNet',
                'getCurrencyFactor',
                'setCurrencyFactor',
                'getTaxFree',
                'setTaxFree',
                'getTaxRate',
                'setTaxRate',
                'getTaxAmnt',
                'setTaxAmnt',
                'getPaymentMethod',
                'setPaymentMethod',
                'getShippingMethod',
                'setShippingMethod',
                'getShippingDescription',
                'setShippingDescription',
                'getDevice',
                'setDevice',
                'getReferer',
                'setReferer',
                'getPartner',
                'setPartner',
                'getLanguage',
                'setLanguage',
                'getTrackingCode',
                'setTrackingCode',
                'getIsGift',
                'setIsGift',
                'getWrapping',
                'setWrapping',
                'getEmail',
                'setEmail',
                'getComments',
                'setComments',
                'addComments',
                'getInternalComments',
                'setInternalComments',
                'addInternalComments',
                'getCustomerComments',
                'setCustomerComments',
                'addCustomerComments',
                'getContacts',
                'setContacts',
                'addContacts',
                'getCreation',
                'setCreation',
                'getLastUpdate',
                'setLastUpdate',
                'getConfirmation',
                'setConfirmation',
                'getCleared',
                'setCleared',
                'getSent',
                'setSent',
                'getReceived',
                'setReceived',
                'getReturned',
                'setReturned',
                'getRepaired',
                'setRepaired',
                'getStatus',
                'setStatus',
                'getStatusCode',
                'setStatusCode',
                'getInternalState',
                'setInternalState',
                'getProducts',
                'setProducts',
                'getVouchers',
                'setVouchers',
                'addVouchers',
                'getStore',
                'setStore',
                'getShippingCosts',
                'setShippingCosts'
            ],
            $this->_toArrayTypedClassMethods(),
            $this->_toArrayTechnicalClassMethods()
        );
    }

}
