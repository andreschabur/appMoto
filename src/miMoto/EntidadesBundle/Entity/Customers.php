<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers", indexes={@ORM\Index(name="idx_customers_email_address", columns={"customers_email_address"})})
 * @ORM\Entity
 */
class Customers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customersId;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_gender", type="string", length=1, nullable=true)
     */
    private $customersGender;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_firstname", type="string", length=255, nullable=false)
     */
    private $customersFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_lastname", type="string", length=255, nullable=false)
     */
    private $customersLastname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="customers_dob", type="datetime", nullable=false)
     */
    private $customersDob = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="customers_email_address", type="string", length=255, nullable=false)
     */
    private $customersEmailAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_default_address_id", type="integer", nullable=true)
     */
    private $customersDefaultAddressId;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_telephone", type="string", length=255, nullable=false)
     */
    private $customersTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_fax", type="string", length=255, nullable=true)
     */
    private $customersFax;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_password", type="string", length=60, nullable=false)
     */
    private $customersPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_newsletter", type="string", length=1, nullable=true)
     */
    private $customersNewsletter;



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
     * Set customersGender
     *
     * @param string $customersGender
     * @return Customers
     */
    public function setCustomersGender($customersGender)
    {
        $this->customersGender = $customersGender;

        return $this;
    }

    /**
     * Get customersGender
     *
     * @return string 
     */
    public function getCustomersGender()
    {
        return $this->customersGender;
    }

    /**
     * Set customersFirstname
     *
     * @param string $customersFirstname
     * @return Customers
     */
    public function setCustomersFirstname($customersFirstname)
    {
        $this->customersFirstname = $customersFirstname;

        return $this;
    }

    /**
     * Get customersFirstname
     *
     * @return string 
     */
    public function getCustomersFirstname()
    {
        return $this->customersFirstname;
    }

    /**
     * Set customersLastname
     *
     * @param string $customersLastname
     * @return Customers
     */
    public function setCustomersLastname($customersLastname)
    {
        $this->customersLastname = $customersLastname;

        return $this;
    }

    /**
     * Get customersLastname
     *
     * @return string 
     */
    public function getCustomersLastname()
    {
        return $this->customersLastname;
    }

    /**
     * Set customersDob
     *
     * @param \DateTime $customersDob
     * @return Customers
     */
    public function setCustomersDob($customersDob)
    {
        $this->customersDob = $customersDob;

        return $this;
    }

    /**
     * Get customersDob
     *
     * @return \DateTime 
     */
    public function getCustomersDob()
    {
        return $this->customersDob;
    }

    /**
     * Set customersEmailAddress
     *
     * @param string $customersEmailAddress
     * @return Customers
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
     * Set customersDefaultAddressId
     *
     * @param integer $customersDefaultAddressId
     * @return Customers
     */
    public function setCustomersDefaultAddressId($customersDefaultAddressId)
    {
        $this->customersDefaultAddressId = $customersDefaultAddressId;

        return $this;
    }

    /**
     * Get customersDefaultAddressId
     *
     * @return integer 
     */
    public function getCustomersDefaultAddressId()
    {
        return $this->customersDefaultAddressId;
    }

    /**
     * Set customersTelephone
     *
     * @param string $customersTelephone
     * @return Customers
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
     * Set customersFax
     *
     * @param string $customersFax
     * @return Customers
     */
    public function setCustomersFax($customersFax)
    {
        $this->customersFax = $customersFax;

        return $this;
    }

    /**
     * Get customersFax
     *
     * @return string 
     */
    public function getCustomersFax()
    {
        return $this->customersFax;
    }

    /**
     * Set customersPassword
     *
     * @param string $customersPassword
     * @return Customers
     */
    public function setCustomersPassword($customersPassword)
    {
        $this->customersPassword = $customersPassword;

        return $this;
    }

    /**
     * Get customersPassword
     *
     * @return string 
     */
    public function getCustomersPassword()
    {
        return $this->customersPassword;
    }

    /**
     * Set customersNewsletter
     *
     * @param string $customersNewsletter
     * @return Customers
     */
    public function setCustomersNewsletter($customersNewsletter)
    {
        $this->customersNewsletter = $customersNewsletter;

        return $this;
    }

    /**
     * Get customersNewsletter
     *
     * @return string 
     */
    public function getCustomersNewsletter()
    {
        return $this->customersNewsletter;
    }
}
