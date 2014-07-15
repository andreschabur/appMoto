<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banners
 *
 * @ORM\Table(name="banners", indexes={@ORM\Index(name="idx_banners_group", columns={"banners_group"})})
 * @ORM\Entity
 */
class Banners
{
    /**
     * @var integer
     *
     * @ORM\Column(name="banners_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bannersId;

    /**
     * @var string
     *
     * @ORM\Column(name="banners_title", type="string", length=64, nullable=false)
     */
    private $bannersTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="banners_url", type="string", length=255, nullable=false)
     */
    private $bannersUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="banners_image", type="string", length=64, nullable=false)
     */
    private $bannersImage;

    /**
     * @var string
     *
     * @ORM\Column(name="banners_group", type="string", length=10, nullable=false)
     */
    private $bannersGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="banners_html_text", type="text", nullable=true)
     */
    private $bannersHtmlText;

    /**
     * @var integer
     *
     * @ORM\Column(name="expires_impressions", type="integer", nullable=true)
     */
    private $expiresImpressions = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_date", type="datetime", nullable=true)
     */
    private $expiresDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_scheduled", type="datetime", nullable=true)
     */
    private $dateScheduled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_status_change", type="datetime", nullable=true)
     */
    private $dateStatusChange;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = '1';



    /**
     * Get bannersId
     *
     * @return integer 
     */
    public function getBannersId()
    {
        return $this->bannersId;
    }

    /**
     * Set bannersTitle
     *
     * @param string $bannersTitle
     * @return Banners
     */
    public function setBannersTitle($bannersTitle)
    {
        $this->bannersTitle = $bannersTitle;

        return $this;
    }

    /**
     * Get bannersTitle
     *
     * @return string 
     */
    public function getBannersTitle()
    {
        return $this->bannersTitle;
    }

    /**
     * Set bannersUrl
     *
     * @param string $bannersUrl
     * @return Banners
     */
    public function setBannersUrl($bannersUrl)
    {
        $this->bannersUrl = $bannersUrl;

        return $this;
    }

    /**
     * Get bannersUrl
     *
     * @return string 
     */
    public function getBannersUrl()
    {
        return $this->bannersUrl;
    }

    /**
     * Set bannersImage
     *
     * @param string $bannersImage
     * @return Banners
     */
    public function setBannersImage($bannersImage)
    {
        $this->bannersImage = $bannersImage;

        return $this;
    }

    /**
     * Get bannersImage
     *
     * @return string 
     */
    public function getBannersImage()
    {
        return $this->bannersImage;
    }

    /**
     * Set bannersGroup
     *
     * @param string $bannersGroup
     * @return Banners
     */
    public function setBannersGroup($bannersGroup)
    {
        $this->bannersGroup = $bannersGroup;

        return $this;
    }

    /**
     * Get bannersGroup
     *
     * @return string 
     */
    public function getBannersGroup()
    {
        return $this->bannersGroup;
    }

    /**
     * Set bannersHtmlText
     *
     * @param string $bannersHtmlText
     * @return Banners
     */
    public function setBannersHtmlText($bannersHtmlText)
    {
        $this->bannersHtmlText = $bannersHtmlText;

        return $this;
    }

    /**
     * Get bannersHtmlText
     *
     * @return string 
     */
    public function getBannersHtmlText()
    {
        return $this->bannersHtmlText;
    }

    /**
     * Set expiresImpressions
     *
     * @param integer $expiresImpressions
     * @return Banners
     */
    public function setExpiresImpressions($expiresImpressions)
    {
        $this->expiresImpressions = $expiresImpressions;

        return $this;
    }

    /**
     * Get expiresImpressions
     *
     * @return integer 
     */
    public function getExpiresImpressions()
    {
        return $this->expiresImpressions;
    }

    /**
     * Set expiresDate
     *
     * @param \DateTime $expiresDate
     * @return Banners
     */
    public function setExpiresDate($expiresDate)
    {
        $this->expiresDate = $expiresDate;

        return $this;
    }

    /**
     * Get expiresDate
     *
     * @return \DateTime 
     */
    public function getExpiresDate()
    {
        return $this->expiresDate;
    }

    /**
     * Set dateScheduled
     *
     * @param \DateTime $dateScheduled
     * @return Banners
     */
    public function setDateScheduled($dateScheduled)
    {
        $this->dateScheduled = $dateScheduled;

        return $this;
    }

    /**
     * Get dateScheduled
     *
     * @return \DateTime 
     */
    public function getDateScheduled()
    {
        return $this->dateScheduled;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Banners
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
     * Set dateStatusChange
     *
     * @param \DateTime $dateStatusChange
     * @return Banners
     */
    public function setDateStatusChange($dateStatusChange)
    {
        $this->dateStatusChange = $dateStatusChange;

        return $this;
    }

    /**
     * Get dateStatusChange
     *
     * @return \DateTime 
     */
    public function getDateStatusChange()
    {
        return $this->dateStatusChange;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Banners
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
