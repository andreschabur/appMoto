<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AddressBook
 *
 * @ORM\Table(name="address_book", indexes={@ORM\Index(name="idx_address_book_customers_id", columns={"customers_id"})})
 * @ORM\Entity
 */
class AddressBook
{
    /**
     * @var integer
     *
     * @ORM\Column(name="address_book_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $addressBookId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=false)
     */
    private $customersId;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_gender", type="string", length=1, nullable=true)
     */
    private $entryGender;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_company", type="string", length=255, nullable=true)
     */
    private $entryCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_firstname", type="string", length=255, nullable=false)
     */
    private $entryFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_lastname", type="string", length=255, nullable=false)
     */
    private $entryLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_street_address", type="string", length=255, nullable=false)
     */
    private $entryStreetAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_suburb", type="string", length=255, nullable=true)
     */
    private $entrySuburb;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_postcode", type="string", length=255, nullable=false)
     */
    private $entryPostcode;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_city", type="string", length=255, nullable=false)
     */
    private $entryCity;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_state", type="string", length=255, nullable=true)
     */
    private $entryState;

    /**
     * @var integer
     *
     * @ORM\Column(name="entry_country_id", type="integer", nullable=false)
     */
    private $entryCountryId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="entry_zone_id", type="integer", nullable=false)
     */
    private $entryZoneId = '0';



    /**
     * Get addressBookId
     *
     * @return integer 
     */
    public function getAddressBookId()
    {
        return $this->addressBookId;
    }

    /**
     * Set customersId
     *
     * @param integer $customersId
     * @return AddressBook
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
     * Set entryGender
     *
     * @param string $entryGender
     * @return AddressBook
     */
    public function setEntryGender($entryGender)
    {
        $this->entryGender = $entryGender;

        return $this;
    }

    /**
     * Get entryGender
     *
     * @return string 
     */
    public function getEntryGender()
    {
        return $this->entryGender;
    }

    /**
     * Set entryCompany
     *
     * @param string $entryCompany
     * @return AddressBook
     */
    public function setEntryCompany($entryCompany)
    {
        $this->entryCompany = $entryCompany;

        return $this;
    }

    /**
     * Get entryCompany
     *
     * @return string 
     */
    public function getEntryCompany()
    {
        return $this->entryCompany;
    }

    /**
     * Set entryFirstname
     *
     * @param string $entryFirstname
     * @return AddressBook
     */
    public function setEntryFirstname($entryFirstname)
    {
        $this->entryFirstname = $entryFirstname;

        return $this;
    }

    /**
     * Get entryFirstname
     *
     * @return string 
     */
    public function getEntryFirstname()
    {
        return $this->entryFirstname;
    }

    /**
     * Set entryLastname
     *
     * @param string $entryLastname
     * @return AddressBook
     */
    public function setEntryLastname($entryLastname)
    {
        $this->entryLastname = $entryLastname;

        return $this;
    }

    /**
     * Get entryLastname
     *
     * @return string 
     */
    public function getEntryLastname()
    {
        return $this->entryLastname;
    }

    /**
     * Set entryStreetAddress
     *
     * @param string $entryStreetAddress
     * @return AddressBook
     */
    public function setEntryStreetAddress($entryStreetAddress)
    {
        $this->entryStreetAddress = $entryStreetAddress;

        return $this;
    }

    /**
     * Get entryStreetAddress
     *
     * @return string 
     */
    public function getEntryStreetAddress()
    {
        return $this->entryStreetAddress;
    }

    /**
     * Set entrySuburb
     *
     * @param string $entrySuburb
     * @return AddressBook
     */
    public function setEntrySuburb($entrySuburb)
    {
        $this->entrySuburb = $entrySuburb;

        return $this;
    }

    /**
     * Get entrySuburb
     *
     * @return string 
     */
    public function getEntrySuburb()
    {
        return $this->entrySuburb;
    }

    /**
     * Set entryPostcode
     *
     * @param string $entryPostcode
     * @return AddressBook
     */
    public function setEntryPostcode($entryPostcode)
    {
        $this->entryPostcode = $entryPostcode;

        return $this;
    }

    /**
     * Get entryPostcode
     *
     * @return string 
     */
    public function getEntryPostcode()
    {
        return $this->entryPostcode;
    }

    /**
     * Set entryCity
     *
     * @param string $entryCity
     * @return AddressBook
     */
    public function setEntryCity($entryCity)
    {
        $this->entryCity = $entryCity;

        return $this;
    }

    /**
     * Get entryCity
     *
     * @return string 
     */
    public function getEntryCity()
    {
        return $this->entryCity;
    }

    /**
     * Set entryState
     *
     * @param string $entryState
     * @return AddressBook
     */
    public function setEntryState($entryState)
    {
        $this->entryState = $entryState;

        return $this;
    }

    /**
     * Get entryState
     *
     * @return string 
     */
    public function getEntryState()
    {
        return $this->entryState;
    }

    /**
     * Set entryCountryId
     *
     * @param integer $entryCountryId
     * @return AddressBook
     */
    public function setEntryCountryId($entryCountryId)
    {
        $this->entryCountryId = $entryCountryId;

        return $this;
    }

    /**
     * Get entryCountryId
     *
     * @return integer 
     */
    public function getEntryCountryId()
    {
        return $this->entryCountryId;
    }

    /**
     * Set entryZoneId
     *
     * @param integer $entryZoneId
     * @return AddressBook
     */
    public function setEntryZoneId($entryZoneId)
    {
        $this->entryZoneId = $entryZoneId;

        return $this;
    }

    /**
     * Get entryZoneId
     *
     * @return integer 
     */
    public function getEntryZoneId()
    {
        return $this->entryZoneId;
    }
}
