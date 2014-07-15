<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="idx_orders_customers_id", columns={"customers_id"})})
 * @ORM\Entity
 */
class Orders
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=false)
     */
    private $customersId;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_name", type="string", length=255, nullable=false)
     */
    private $customersName;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_company", type="string", length=255, nullable=true)
     */
    private $customersCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_street_address", type="string", length=255, nullable=false)
     */
    private $customersStreetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_suburb", type="string", length=255, nullable=true)
     */
    private $customersSuburb;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_city", type="string", length=255, nullable=false)
     */
    private $customersCity;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_postcode", type="string", length=255, nullable=false)
     */
    private $customersPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_state", type="string", length=255, nullable=true)
     */
    private $customersState;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_country", type="string", length=255, nullable=false)
     */
    private $customersCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_telephone", type="string", length=255, nullable=false)
     */
    private $customersTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_email_address", type="string", length=255, nullable=false)
     */
    private $customersEmailAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_address_format_id", type="integer", nullable=false)
     */
    private $customersAddressFormatId;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_name", type="string", length=255, nullable=false)
     */
    private $deliveryName;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_company", type="string", length=255, nullable=true)
     */
    private $deliveryCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_street_address", type="string", length=255, nullable=false)
     */
    private $deliveryStreetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_suburb", type="string", length=255, nullable=true)
     */
    private $deliverySuburb;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_city", type="string", length=255, nullable=false)
     */
    private $deliveryCity;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_postcode", type="string", length=255, nullable=false)
     */
    private $deliveryPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_state", type="string", length=255, nullable=true)
     */
    private $deliveryState;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_country", type="string", length=255, nullable=false)
     */
    private $deliveryCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="delivery_address_format_id", type="integer", nullable=false)
     */
    private $deliveryAddressFormatId;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_name", type="string", length=255, nullable=false)
     */
    private $billingName;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_company", type="string", length=255, nullable=true)
     */
    private $billingCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_street_address", type="string", length=255, nullable=false)
     */
    private $billingStreetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_suburb", type="string", length=255, nullable=true)
     */
    private $billingSuburb;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_city", type="string", length=255, nullable=false)
     */
    private $billingCity;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_postcode", type="string", length=255, nullable=false)
     */
    private $billingPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_state", type="string", length=255, nullable=true)
     */
    private $billingState;

    /**
     * @var string
     *
     * @ORM\Column(name="billing_country", type="string", length=255, nullable=false)
     */
    private $billingCountry;

    /**
     * @var integer
     *
     * @ORM\Column(name="billing_address_format_id", type="integer", nullable=false)
     */
    private $billingAddressFormatId;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=255, nullable=false)
     */
    private $paymentMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="cc_type", type="string", length=20, nullable=true)
     */
    private $ccType;

    /**
     * @var string
     *
     * @ORM\Column(name="cc_owner", type="string", length=255, nullable=true)
     */
    private $ccOwner;

    /**
     * @var string
     *
     * @ORM\Column(name="cc_number", type="string", length=32, nullable=true)
     */
    private $ccNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cc_expires", type="string", length=4, nullable=true)
     */
    private $ccExpires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_purchased", type="datetime", nullable=true)
     */
    private $datePurchased;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_status", type="integer", nullable=false)
     */
    private $ordersStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="orders_date_finished", type="datetime", nullable=true)
     */
    private $ordersDateFinished;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=true)
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_value", type="decimal", precision=14, scale=6, nullable=true)
     */
    private $currencyValue;



    /**
     * Get ordersId
     *
     * @return integer 
     */
    public function getOrdersId()
    {
        return $this->ordersId;
    }

    /**
     * Set customersId
     *
     * @param integer $customersId
     * @return Orders
     */
    public function setCustomersId($customersId)
    {
        $this->customersId = $customersId;

        return $this;
    }

    /**
     * Get customersId
     *
     * @return integer 
     */
    public function getCustomersId()
    {
        return $this->customersId;
    }

    /**
     * Set customersName
     *
     * @param string $customersName
     * @return Orders
     */
    public function setCustomersName($customersName)
    {
        $this->customersName = $customersName;

        return $this;
    }

    /**
     * Get customersName
     *
     * @return string 
     */
    public function getCustomersName()
    {
        return $this->customersName;
    }

    /**
     * Set customersCompany
     *
     * @param string $customersCompany
     * @return Orders
     */
    public function setCustomersCompany($customersCompany)
    {
        $this->customersCompany = $customersCompany;

        return $this;
    }

    /**
     * Get customersCompany
     *
     * @return string 
     */
    public function getCustomersCompany()
    {
        return $this->customersCompany;
    }

    /**
     * Set customersStreetAddress
     *
     * @param string $customersStreetAddress
     * @return Orders
     */
    public function setCustomersStreetAddress($customersStreetAddress)
    {
        $this->customersStreetAddress = $customersStreetAddress;

        return $this;
    }

    /**
     * Get customersStreetAddress
     *
     * @return string 
     */
    public function getCustomersStreetAddress()
    {
        return $this->customersStreetAddress;
    }

    /**
     * Set customersSuburb
     *
     * @param string $customersSuburb
     * @return Orders
     */
    public function setCustomersSuburb($customersSuburb)
    {
        $this->customersSuburb = $customersSuburb;

        return $this;
    }

    /**
     * Get customersSuburb
     *
     * @return string 
     */
    public function getCustomersSuburb()
    {
        return $this->customersSuburb;
    }

    /**
     * Set customersCity
     *
     * @param string $customersCity
     * @return Orders
     */
    public function setCustomersCity($customersCity)
    {
        $this->customersCity = $customersCity;

        return $this;
    }

    /**
     * Get customersCity
     *
     * @return string 
     */
    public function getCustomersCity()
    {
        return $this->customersCity;
    }

    /**
     * Set customersPostcode
     *
     * @param string $customersPostcode
     * @return Orders
     */
    public function setCustomersPostcode($customersPostcode)
    {
        $this->customersPostcode = $customersPostcode;

        return $this;
    }

    /**
     * Get customersPostcode
     *
     * @return string 
     */
    public function getCustomersPostcode()
    {
        return $this->customersPostcode;
    }

    /**
     * Set customersState
     *
     * @param string $customersState
     * @return Orders
     */
    public function setCustomersState($customersState)
    {
        $this->customersState = $customersState;

        return $this;
    }

    /**
     * Get customersState
     *
     * @return string 
     */
    public function getCustomersState()
    {
        return $this->customersState;
    }

    /**
     * Set customersCountry
     *
     * @param string $customersCountry
     * @return Orders
     */
    public function setCustomersCountry($customersCountry)
    {
        $this->customersCountry = $customersCountry;

        return $this;
    }

    /**
     * Get customersCountry
     *
     * @return string 
     */
    public function getCustomersCountry()
    {
        return $this->customersCountry;
    }

    /**
     * Set customersTelephone
     *
     * @param string $customersTelephone
     * @return Orders
     */
    public function setCustomersTelephone($customersTelephone)
    {
        $this->customersTelephone = $customersTelephone;

        return $this;
    }

    /**
     * Get customersTelephone
     *
     * @return string 
     */
    public function getCustomersTelephone()
    {
        return $this->customersTelephone;
    }

    /**
     * Set customersEmailAddress
     *
     * @param string $customersEmailAddress
     * @return Orders
     */
    public function setCustomersEmailAddress($customersEmailAddress)
    {
        $this->customersEmailAddress = $customersEmailAddress;

        return $this;
    }

    /**
     * Get customersEmailAddress
     *
     * @return string 
     */
    public function getCustomersEmailAddress()
    {
        return $this->customersEmailAddress;
    }

    /**
     * Set customersAddressFormatId
     *
     * @param integer $customersAddressFormatId
     * @return Orders
     */
    public function setCustomersAddressFormatId($customersAddressFormatId)
    {
        $this->customersAddressFormatId = $customersAddressFormatId;

        return $this;
    }

    /**
     * Get customersAddressFormatId
     *
     * @return integer 
     */
    public function getCustomersAddressFormatId()
    {
        return $this->customersAddressFormatId;
    }

    /**
     * Set deliveryName
     *
     * @param string $deliveryName
     * @return Orders
     */
    public function setDeliveryName($deliveryName)
    {
        $this->deliveryName = $deliveryName;

        return $this;
    }

    /**
     * Get deliveryName
     *
     * @return string 
     */
    public function getDeliveryName()
    {
        return $this->deliveryName;
    }

    /**
     * Set deliveryCompany
     *
     * @param string $deliveryCompany
     * @return Orders
     */
    public function setDeliveryCompany($deliveryCompany)
    {
        $this->deliveryCompany = $deliveryCompany;

        return $this;
    }

    /**
     * Get deliveryCompany
     *
     * @return string 
     */
    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    /**
     * Set deliveryStreetAddress
     *
     * @param string $deliveryStreetAddress
     * @return Orders
     */
    public function setDeliveryStreetAddress($deliveryStreetAddress)
    {
        $this->deliveryStreetAddress = $deliveryStreetAddress;

        return $this;
    }

    /**
     * Get deliveryStreetAddress
     *
     * @return string 
     */
    public function getDeliveryStreetAddress()
    {
        return $this->deliveryStreetAddress;
    }

    /**
     * Set deliverySuburb
     *
     * @param string $deliverySuburb
     * @return Orders
     */
    public function setDeliverySuburb($deliverySuburb)
    {
        $this->deliverySuburb = $deliverySuburb;

        return $this;
    }

    /**
     * Get deliverySuburb
     *
     * @return string 
     */
    public function getDeliverySuburb()
    {
        return $this->deliverySuburb;
    }

    /**
     * Set deliveryCity
     *
     * @param string $deliveryCity
     * @return Orders
     */
    public function setDeliveryCity($deliveryCity)
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    /**
     * Get deliveryCity
     *
     * @return string 
     */
    public function getDeliveryCity()
    {
        return $this->deliveryCity;
    }

    /**
     * Set deliveryPostcode
     *
     * @param string $deliveryPostcode
     * @return Orders
     */
    public function setDeliveryPostcode($deliveryPostcode)
    {
        $this->deliveryPostcode = $deliveryPostcode;

        return $this;
    }

    /**
     * Get deliveryPostcode
     *
     * @return string 
     */
    public function getDeliveryPostcode()
    {
        return $this->deliveryPostcode;
    }

    /**
     * Set deliveryState
     *
     * @param string $deliveryState
     * @return Orders
     */
    public function setDeliveryState($deliveryState)
    {
        $this->deliveryState = $deliveryState;

        return $this;
    }

    /**
     * Get deliveryState
     *
     * @return string 
     */
    public function getDeliveryState()
    {
        return $this->deliveryState;
    }

    /**
     * Set deliveryCountry
     *
     * @param string $deliveryCountry
     * @return Orders
     */
    public function setDeliveryCountry($deliveryCountry)
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    /**
     * Get deliveryCountry
     *
     * @return string 
     */
    public function getDeliveryCountry()
    {
        return $this->deliveryCountry;
    }

    /**
     * Set deliveryAddressFormatId
     *
     * @param integer $deliveryAddressFormatId
     * @return Orders
     */
    public function setDeliveryAddressFormatId($deliveryAddressFormatId)
    {
        $this->deliveryAddressFormatId = $deliveryAddressFormatId;

        return $this;
    }

    /**
     * Get deliveryAddressFormatId
     *
     * @return integer 
     */
    public function getDeliveryAddressFormatId()
    {
        return $this->deliveryAddressFormatId;
    }

    /**
     * Set billingName
     *
     * @param string $billingName
     * @return Orders
     */
    public function setBillingName($billingName)
    {
        $this->billingName = $billingName;

        return $this;
    }

    /**
     * Get billingName
     *
     * @return string 
     */
    public function getBillingName()
    {
        return $this->billingName;
    }

    /**
     * Set billingCompany
     *
     * @param string $billingCompany
     * @return Orders
     */
    public function setBillingCompany($billingCompany)
    {
        $this->billingCompany = $billingCompany;

        return $this;
    }

    /**
     * Get billingCompany
     *
     * @return string 
     */
    public function getBillingCompany()
    {
        return $this->billingCompany;
    }

    /**
     * Set billingStreetAddress
     *
     * @param string $billingStreetAddress
     * @return Orders
     */
    public function setBillingStreetAddress($billingStreetAddress)
    {
        $this->billingStreetAddress = $billingStreetAddress;

        return $this;
    }

    /**
     * Get billingStreetAddress
     *
     * @return string 
     */
    public function getBillingStreetAddress()
    {
        return $this->billingStreetAddress;
    }

    /**
     * Set billingSuburb
     *
     * @param string $billingSuburb
     * @return Orders
     */
    public function setBillingSuburb($billingSuburb)
    {
        $this->billingSuburb = $billingSuburb;

        return $this;
    }

    /**
     * Get billingSuburb
     *
     * @return string 
     */
    public function getBillingSuburb()
    {
        return $this->billingSuburb;
    }

    /**
     * Set billingCity
     *
     * @param string $billingCity
     * @return Orders
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingCity
     *
     * @return string 
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * Set billingPostcode
     *
     * @param string $billingPostcode
     * @return Orders
     */
    public function setBillingPostcode($billingPostcode)
    {
        $this->billingPostcode = $billingPostcode;

        return $this;
    }

    /**
     * Get billingPostcode
     *
     * @return string 
     */
    public function getBillingPostcode()
    {
        return $this->billingPostcode;
    }

    /**
     * Set billingState
     *
     * @param string $billingState
     * @return Orders
     */
    public function setBillingState($billingState)
    {
        $this->billingState = $billingState;

        return $this;
    }

    /**
     * Get billingState
     *
     * @return string 
     */
    public function getBillingState()
    {
        return $this->billingState;
    }

    /**
     * Set billingCountry
     *
     * @param string $billingCountry
     * @return Orders
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * Get billingCountry
     *
     * @return string 
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * Set billingAddressFormatId
     *
     * @param integer $billingAddressFormatId
     * @return Orders
     */
    public function setBillingAddressFormatId($billingAddressFormatId)
    {
        $this->billingAddressFormatId = $billingAddressFormatId;

        return $this;
    }

    /**
     * Get billingAddressFormatId
     *
     * @return integer 
     */
    public function getBillingAddressFormatId()
    {
        return $this->billingAddressFormatId;
    }

    /**
     * Set paymentMethod
     *
     * @param string $paymentMethod
     * @return Orders
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return string 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set ccType
     *
     * @param string $ccType
     * @return Orders
     */
    public function setCcType($ccType)
    {
        $this->ccType = $ccType;

        return $this;
    }

    /**
     * Get ccType
     *
     * @return string 
     */
    public function getCcType()
    {
        return $this->ccType;
    }

    /**
     * Set ccOwner
     *
     * @param string $ccOwner
     * @return Orders
     */
    public function setCcOwner($ccOwner)
    {
        $this->ccOwner = $ccOwner;

        return $this;
    }

    /**
     * Get ccOwner
     *
     * @return string 
     */
    public function getCcOwner()
    {
        return $this->ccOwner;
    }

    /**
     * Set ccNumber
     *
     * @param string $ccNumber
     * @return Orders
     */
    public function setCcNumber($ccNumber)
    {
        $this->ccNumber = $ccNumber;

        return $this;
    }

    /**
     * Get ccNumber
     *
     * @return string 
     */
    public function getCcNumber()
    {
        return $this->ccNumber;
    }

    /**
     * Set ccExpires
     *
     * @param string $ccExpires
     * @return Orders
     */
    public function setCcExpires($ccExpires)
    {
        $this->ccExpires = $ccExpires;

        return $this;
    }

    /**
     * Get ccExpires
     *
     * @return string 
     */
    public function getCcExpires()
    {
        return $this->ccExpires;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Orders
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set datePurchased
     *
     * @param \DateTime $datePurchased
     * @return Orders
     */
    public function setDatePurchased($datePurchased)
    {
        $this->datePurchased = $datePurchased;

        return $this;
    }

    /**
     * Get datePurchased
     *
     * @return \DateTime 
     */
    public function getDatePurchased()
    {
        return $this->datePurchased;
    }

    /**
     * Set ordersStatus
     *
     * @param integer $ordersStatus
     * @return Orders
     */
    public function setOrdersStatus($ordersStatus)
    {
        $this->ordersStatus = $ordersStatus;

        return $this;
    }

    /**
     * Get ordersStatus
     *
     * @return integer 
     */
    public function getOrdersStatus()
    {
        return $this->ordersStatus;
    }

    /**
     * Set ordersDateFinished
     *
     * @param \DateTime $ordersDateFinished
     * @return Orders
     */
    public function setOrdersDateFinished($ordersDateFinished)
    {
        $this->ordersDateFinished = $ordersDateFinished;

        return $this;
    }

    /**
     * Get ordersDateFinished
     *
     * @return \DateTime 
     */
    public function getOrdersDateFinished()
    {
        return $this->ordersDateFinished;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Orders
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set currencyValue
     *
     * @param string $currencyValue
     * @return Orders
     */
    public function setCurrencyValue($currencyValue)
    {
        $this->currencyValue = $currencyValue;

        return $this;
    }

    /**
     * Get currencyValue
     *
     * @return string 
     */
    public function getCurrencyValue()
    {
        return $this->currencyValue;
    }
}
