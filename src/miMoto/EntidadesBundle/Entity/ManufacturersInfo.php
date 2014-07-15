<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManufacturersInfo
 *
 * @ORM\Table(name="manufacturers_info")
 * @ORM\Entity
 */
class ManufacturersInfo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="manufacturers_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $manufacturersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="languages_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languagesId;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturers_url", type="string", length=255, nullable=false)
     */
    private $manufacturersUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="url_clicked", type="integer", nullable=false)
     */
    private $urlClicked = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_click", type="datetime", nullable=true)
     */
    private $dateLastClick;



    /**
     * Set manufacturersId
     *
     * @param integer $manufacturersId
     * @return ManufacturersInfo
     */
    public function setManufacturersId($manufacturersId)
    {
        $this->manufacturersId = $manufacturersId;

        return $this;
    }

    /**
     * Get manufacturersId
     *
     * @return integer 
     */
    public function getManufacturersId()
    {
        return $this->manufacturersId;
    }

    /**
     * Set languagesId
     *
     * @param integer $languagesId
     * @return ManufacturersInfo
     */
    public function setLanguagesId($languagesId)
    {
        $this->languagesId = $languagesId;

        return $this;
    }

    /**
     * Get languagesId
     *
     * @return integer 
     */
    public function getLanguagesId()
    {
        return $this->languagesId;
    }

    /**
     * Set manufacturersUrl
     *
     * @param string $manufacturersUrl
     * @return ManufacturersInfo
     */
    public function setManufacturersUrl($manufacturersUrl)
    {
        $this->manufacturersUrl = $manufacturersUrl;

        return $this;
    }

    /**
     * Get manufacturersUrl
     *
     * @return string 
     */
    public function getManufacturersUrl()
    {
        return $this->manufacturersUrl;
    }

    /**
     * Set urlClicked
     *
     * @param integer $urlClicked
     * @return ManufacturersInfo
     */
    public function setUrlClicked($urlClicked)
    {
        $this->urlClicked = $urlClicked;

        return $this;
    }

    /**
     * Get urlClicked
     *
     * @return integer 
     */
    public function getUrlClicked()
    {
        return $this->urlClicked;
    }

    /**
     * Set dateLastClick
     *
     * @param \DateTime $dateLastClick
     * @return ManufacturersInfo
     */
    public function setDateLastClick($dateLastClick)
    {
        $this->dateLastClick = $dateLastClick;

        return $this;
    }

    /**
     * Get dateLastClick
     *
     * @return \DateTime 
     */
    public function getDateLastClick()
    {
        return $this->dateLastClick;
    }
}
