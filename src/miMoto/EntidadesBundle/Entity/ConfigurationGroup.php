<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigurationGroup
 *
 * @ORM\Table(name="configuration_group")
 * @ORM\Entity
 */
class ConfigurationGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="configuration_group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $configurationGroupId;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_group_title", type="string", length=64, nullable=false)
     */
    private $configurationGroupTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_group_description", type="string", length=255, nullable=false)
     */
    private $configurationGroupDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var integer
     *
     * @ORM\Column(name="visible", type="integer", nullable=true)
     */
    private $visible = '1';



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
     * Set configurationGroupTitle
     *
     * @param string $configurationGroupTitle
     * @return ConfigurationGroup
     */
    public function setConfigurationGroupTitle($configurationGroupTitle)
    {
        $this->configurationGroupTitle = $configurationGroupTitle;

        return $this;
    }

    /**
     * Get configurationGroupTitle
     *
     * @return string 
     */
    public function getConfigurationGroupTitle()
    {
        return $this->configurationGroupTitle;
    }

    /**
     * Set configurationGroupDescription
     *
     * @param string $configurationGroupDescription
     * @return ConfigurationGroup
     */
    public function setConfigurationGroupDescription($configurationGroupDescription)
    {
        $this->configurationGroupDescription = $configurationGroupDescription;

        return $this;
    }

    /**
     * Get configurationGroupDescription
     *
     * @return string 
     */
    public function getConfigurationGroupDescription()
    {
        return $this->configurationGroupDescription;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return ConfigurationGroup
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
     * Set visible
     *
     * @param integer $visible
     * @return ConfigurationGroup
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer 
     */
    public function getVisible()
    {
        return $this->visible;
    }
}
