<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="configuration")
 * @ORM\Entity
 */
class Configuration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="configuration_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configurationId;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_title", type="string", length=255, nullable=false)
     */
    private $configurationTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_key", type="string", length=255, nullable=false)
     */
    private $configurationKey;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_value", type="text", nullable=false)
     */
    private $configurationValue;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_description", type="string", length=255, nullable=false)
     */
    private $configurationDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="configuration_group_id", type="integer", nullable=false)
     */
    private $configurationGroupId;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var string
     *
     * @ORM\Column(name="use_function", type="string", length=255, nullable=true)
     */
    private $useFunction;

    /**
     * @var string
     *
     * @ORM\Column(name="set_function", type="string", length=255, nullable=true)
     */
    private $setFunction;



    /**
     * Get configurationId
     *
     * @return integer 
     */
    public function getConfigurationId()
    {
        return $this->configurationId;
    }

    /**
     * Set configurationTitle
     *
     * @param string $configurationTitle
     * @return Configuration
     */
    public function setConfigurationTitle($configurationTitle)
    {
        $this->configurationTitle = $configurationTitle;

        return $this;
    }

    /**
     * Get configurationTitle
     *
     * @return string 
     */
    public function getConfigurationTitle()
    {
        return $this->configurationTitle;
    }

    /**
     * Set configurationKey
     *
     * @param string $configurationKey
     * @return Configuration
     */
    public function setConfigurationKey($configurationKey)
    {
        $this->configurationKey = $configurationKey;

        return $this;
    }

    /**
     * Get configurationKey
     *
     * @return string 
     */
    public function getConfigurationKey()
    {
        return $this->configurationKey;
    }

    /**
     * Set configurationValue
     *
     * @param string $configurationValue
     * @return Configuration
     */
    public function setConfigurationValue($configurationValue)
    {
        $this->configurationValue = $configurationValue;

        return $this;
    }

    /**
     * Get configurationValue
     *
     * @return string 
     */
    public function getConfigurationValue()
    {
        return $this->configurationValue;
    }

    /**
     * Set configurationDescription
     *
     * @param string $configurationDescription
     * @return Configuration
     */
    public function setConfigurationDescription($configurationDescription)
    {
        $this->configurationDescription = $configurationDescription;

        return $this;
    }

    /**
     * Get configurationDescription
     *
     * @return string 
     */
    public function getConfigurationDescription()
    {
        return $this->configurationDescription;
    }

    /**
     * Set configurationGroupId
     *
     * @param integer $configurationGroupId
     * @return Configuration
     */
    public function setConfigurationGroupId($configurationGroupId)
    {
        $this->configurationGroupId = $configurationGroupId;

        return $this;
    }

    /**
     * Get configurationGroupId
     *
     * @return integer 
     */
    public function getConfigurationGroupId()
    {
        return $this->configurationGroupId;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return Configuration
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer 
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Configuration
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Configuration
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set useFunction
     *
     * @param string $useFunction
     * @return Configuration
     */
    public function setUseFunction($useFunction)
    {
        $this->useFunction = $useFunction;

        return $this;
    }

    /**
     * Get useFunction
     *
     * @return string 
     */
    public function getUseFunction()
    {
        return $this->useFunction;
    }

    /**
     * Set setFunction
     *
     * @param string $setFunction
     * @return Configuration
     */
    public function setSetFunction($setFunction)
    {
        $this->setFunction = $setFunction;

        return $this;
    }

    /**
     * Get setFunction
     *
     * @return string 
     */
    public function getSetFunction()
    {
        return $this->setFunction;
    }
}
