<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersInfo
 *
 * @ORM\Table(name="customers_info")
 * @ORM\Entity
 */
class CustomersInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customers_info_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customersInfoId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="customers_info_date_of_last_logon", type="datetime", nullable=true)
     */
    private $customersInfoDateOfLastLogon;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_info_number_of_logons", type="integer", nullable=true)
     */
    private $customersInfoNumberOfLogons;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="customers_info_date_account_created", type="datetime", nullable=true)
     */
    private $customersInfoDateAccountCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="customers_info_date_account_last_modified", type="datetime", nullable=true)
     */
    private $customersInfoDateAccountLastModified;

    /**
     * @var integer
     *
     * @ORM\Column(name="global_product_notifications", type="integer", nullable=true)
     */
    private $globalProductNotifications = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="password_reset_key", type="string", length=40, nullable=true)
     */
    private $passwordResetKey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_reset_date", type="datetime", nullable=true)
     */
    private $passwordResetDate;



    /**
     * Get customersInfoId
     *
     * @return integer 
     */
    public function getCustomersInfoId()
    {
        return $this->customersInfoId;
    }

    /**
     * Set customersInfoDateOfLastLogon
     *
     * @param \DateTime $customersInfoDateOfLastLogon
     * @return CustomersInfo
     */
    public function setCustomersInfoDateOfLastLogon($customersInfoDateOfLastLogon)
    {
        $this->customersInfoDateOfLastLogon = $customersInfoDateOfLastLogon;

        return $this;
    }

    /**
     * Get customersInfoDateOfLastLogon
     *
     * @return \DateTime 
     */
    public function getCustomersInfoDateOfLastLogon()
    {
        return $this->customersInfoDateOfLastLogon;
    }

    /**
     * Set customersInfoNumberOfLogons
     *
     * @param integer $customersInfoNumberOfLogons
     * @return CustomersInfo
     */
    public function setCustomersInfoNumberOfLogons($customersInfoNumberOfLogons)
    {
        $this->customersInfoNumberOfLogons = $customersInfoNumberOfLogons;

        return $this;
    }

    /**
     * Get customersInfoNumberOfLogons
     *
     * @return integer 
     */
    public function getCustomersInfoNumberOfLogons()
    {
        return $this->customersInfoNumberOfLogons;
    }

    /**
     * Set customersInfoDateAccountCreated
     *
     * @param \DateTime $customersInfoDateAccountCreated
     * @return CustomersInfo
     */
    public function setCustomersInfoDateAccountCreated($customersInfoDateAccountCreated)
    {
        $this->customersInfoDateAccountCreated = $customersInfoDateAccountCreated;

        return $this;
    }

    /**
     * Get customersInfoDateAccountCreated
     *
     * @return \DateTime 
     */
    public function getCustomersInfoDateAccountCreated()
    {
        return $this->customersInfoDateAccountCreated;
    }

    /**
     * Set customersInfoDateAccountLastModified
     *
     * @param \DateTime $customersInfoDateAccountLastModified
     * @return CustomersInfo
     */
    public function setCustomersInfoDateAccountLastModified($customersInfoDateAccountLastModified)
    {
        $this->customersInfoDateAccountLastModified = $customersInfoDateAccountLastModified;

        return $this;
    }

    /**
     * Get customersInfoDateAccountLastModified
     *
     * @return \DateTime 
     */
    public function getCustomersInfoDateAccountLastModified()
    {
        return $this->customersInfoDateAccountLastModified;
    }

    /**
     * Set globalProductNotifications
     *
     * @param integer $globalProductNotifications
     * @return CustomersInfo
     */
    public function setGlobalProductNotifications($globalProductNotifications)
    {
        $this->globalProductNotifications = $globalProductNotifications;

        return $this;
    }

    /**
     * Get globalProductNotifications
     *
     * @return integer 
     */
    public function getGlobalProductNotifications()
    {
        return $this->globalProductNotifications;
    }

    /**
     * Set passwordResetKey
     *
     * @param string $passwordResetKey
     * @return CustomersInfo
     */
    public function setPasswordResetKey($passwordResetKey)
    {
        $this->passwordResetKey = $passwordResetKey;

        return $this;
    }

    /**
     * Get passwordResetKey
     *
     * @return string 
     */
    public function getPasswordResetKey()
    {
        return $this->passwordResetKey;
    }

    /**
     * Set passwordResetDate
     *
     * @param \DateTime $passwordResetDate
     * @return CustomersInfo
     */
    public function setPasswordResetDate($passwordResetDate)
    {
        $this->passwordResetDate = $passwordResetDate;

        return $this;
    }

    /**
     * Get passwordResetDate
     *
     * @return \DateTime 
     */
    public function getPasswordResetDate()
    {
        return $this->passwordResetDate;
    }
}
