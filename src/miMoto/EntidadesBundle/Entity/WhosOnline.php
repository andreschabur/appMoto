<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WhosOnline
 *
 * @ORM\Table(name="whos_online")
 * @ORM\Entity
 */
class WhosOnline
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer", nullable=true)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=false)
     */
    private $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="session_id", type="string", length=128, nullable=false)
     */
    private $sessionId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=15, nullable=false)
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="time_entry", type="string", length=14, nullable=false)
     */
    private $timeEntry;

    /**
     * @var string
     *
     * @ORM\Column(name="time_last_click", type="string", length=14, nullable=false)
     */
    private $timeLastClick;

    /**
     * @var string
     *
     * @ORM\Column(name="last_page_url", type="text", nullable=false)
     */
    private $lastPageUrl;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return WhosOnline
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return WhosOnline
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set sessionId
     *
     * @param string $sessionId
     * @return WhosOnline
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId
     *
     * @return string 
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return WhosOnline
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set timeEntry
     *
     * @param string $timeEntry
     * @return WhosOnline
     */
    public function setTimeEntry($timeEntry)
    {
        $this->timeEntry = $timeEntry;

        return $this;
    }

    /**
     * Get timeEntry
     *
     * @return string 
     */
    public function getTimeEntry()
    {
        return $this->timeEntry;
    }

    /**
     * Set timeLastClick
     *
     * @param string $timeLastClick
     * @return WhosOnline
     */
    public function setTimeLastClick($timeLastClick)
    {
        $this->timeLastClick = $timeLastClick;

        return $this;
    }

    /**
     * Get timeLastClick
     *
     * @return string 
     */
    public function getTimeLastClick()
    {
        return $this->timeLastClick;
    }

    /**
     * Set lastPageUrl
     *
     * @param string $lastPageUrl
     * @return WhosOnline
     */
    public function setLastPageUrl($lastPageUrl)
    {
        $this->lastPageUrl = $lastPageUrl;

        return $this;
    }

    /**
     * Get lastPageUrl
     *
     * @return string 
     */
    public function getLastPageUrl()
    {
        return $this->lastPageUrl;
    }
}
