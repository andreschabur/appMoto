<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin", uniqueConstraints={@ORM\UniqueConstraint(name="admin_email_address", columns={"admin_email_address"})})
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="admin_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adminId;

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_groups_id", type="integer", nullable=true)
     */
    private $adminGroupsId;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_firstname", type="string", length=32, nullable=false)
     */
    private $adminFirstname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="admin_lastname", type="string", length=32, nullable=true)
     */
    private $adminLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_email_address", type="string", length=96, nullable=false)
     */
    private $adminEmailAddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="admin_password", type="string", length=40, nullable=false)
     */
    private $adminPassword = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admin_created", type="datetime", nullable=true)
     */
    private $adminCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admin_modified", type="datetime", nullable=false)
     */
    private $adminModified = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="admin_logdate", type="datetime", nullable=true)
     */
    private $adminLogdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_lognum", type="integer", nullable=false)
     */
    private $adminLognum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="admin_cat_access", type="text", nullable=false)
     */
    private $adminCatAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_right_access", type="text", nullable=false)
     */
    private $adminRightAccess;



    /**
     * Get adminId
     *
     * @return integer 
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * Set adminGroupsId
     *
     * @param integer $adminGroupsId
     * @return Admin
     */
    public function setAdminGroupsId($adminGroupsId)
    {
        $this->adminGroupsId = $adminGroupsId;

        return $this;
    }

    /**
     * Get adminGroupsId
     *
     * @return integer 
     */
    public function getAdminGroupsId()
    {
        return $this->adminGroupsId;
    }

    /**
     * Set adminFirstname
     *
     * @param string $adminFirstname
     * @return Admin
     */
    public function setAdminFirstname($adminFirstname)
    {
        $this->adminFirstname = $adminFirstname;

        return $this;
    }

    /**
     * Get adminFirstname
     *
     * @return string 
     */
    public function getAdminFirstname()
    {
        return $this->adminFirstname;
    }

    /**
     * Set adminLastname
     *
     * @param string $adminLastname
     * @return Admin
     */
    public function setAdminLastname($adminLastname)
    {
        $this->adminLastname = $adminLastname;

        return $this;
    }

    /**
     * Get adminLastname
     *
     * @return string 
     */
    public function getAdminLastname()
    {
        return $this->adminLastname;
    }

    /**
     * Set adminEmailAddress
     *
     * @param string $adminEmailAddress
     * @return Admin
     */
    public function setAdminEmailAddress($adminEmailAddress)
    {
        $this->adminEmailAddress = $adminEmailAddress;

        return $this;
    }

    /**
     * Get adminEmailAddress
     *
     * @return string 
     */
    public function getAdminEmailAddress()
    {
        return $this->adminEmailAddress;
    }

    /**
     * Set adminPassword
     *
     * @param string $adminPassword
     * @return Admin
     */
    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;

        return $this;
    }

    /**
     * Get adminPassword
     *
     * @return string 
     */
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    /**
     * Set adminCreated
     *
     * @param \DateTime $adminCreated
     * @return Admin
     */
    public function setAdminCreated($adminCreated)
    {
        $this->adminCreated = $adminCreated;

        return $this;
    }

    /**
     * Get adminCreated
     *
     * @return \DateTime 
     */
    public function getAdminCreated()
    {
        return $this->adminCreated;
    }

    /**
     * Set adminModified
     *
     * @param \DateTime $adminModified
     * @return Admin
     */
    public function setAdminModified($adminModified)
    {
        $this->adminModified = $adminModified;

        return $this;
    }

    /**
     * Get adminModified
     *
     * @return \DateTime 
     */
    public function getAdminModified()
    {
        return $this->adminModified;
    }

    /**
     * Set adminLogdate
     *
     * @param \DateTime $adminLogdate
     * @return Admin
     */
    public function setAdminLogdate($adminLogdate)
    {
        $this->adminLogdate = $adminLogdate;

        return $this;
    }

    /**
     * Get adminLogdate
     *
     * @return \DateTime 
     */
    public function getAdminLogdate()
    {
        return $this->adminLogdate;
    }

    /**
     * Set adminLognum
     *
     * @param integer $adminLognum
     * @return Admin
     */
    public function setAdminLognum($adminLognum)
    {
        $this->adminLognum = $adminLognum;

        return $this;
    }

    /**
     * Get adminLognum
     *
     * @return integer 
     */
    public function getAdminLognum()
    {
        return $this->adminLognum;
    }

    /**
     * Set adminCatAccess
     *
     * @param string $adminCatAccess
     * @return Admin
     */
    public function setAdminCatAccess($adminCatAccess)
    {
        $this->adminCatAccess = $adminCatAccess;

        return $this;
    }

    /**
     * Get adminCatAccess
     *
     * @return string 
     */
    public function getAdminCatAccess()
    {
        return $this->adminCatAccess;
    }

    /**
     * Set adminRightAccess
     *
     * @param string $adminRightAccess
     * @return Admin
     */
    public function setAdminRightAccess($adminRightAccess)
    {
        $this->adminRightAccess = $adminRightAccess;

        return $this;
    }

    /**
     * Get adminRightAccess
     *
     * @return string 
     */
    public function getAdminRightAccess()
    {
        return $this->adminRightAccess;
    }
}
