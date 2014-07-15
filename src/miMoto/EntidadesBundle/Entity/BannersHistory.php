<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BannersHistory
 *
 * @ORM\Table(name="banners_history", indexes={@ORM\Index(name="idx_banners_history_banners_id", columns={"banners_id"})})
 * @ORM\Entity
 */
class BannersHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="banners_history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bannersHistoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="banners_id", type="integer", nullable=false)
     */
    private $bannersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="banners_shown", type="integer", nullable=false)
     */
    private $bannersShown = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="banners_clicked", type="integer", nullable=false)
     */
    private $bannersClicked = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="banners_history_date", type="datetime", nullable=false)
     */
    private $bannersHistoryDate;



    /**
     * Get bannersHistoryId
     *
     * @return integer 
     */
    public function getBannersHistoryId()
    {
        return $this->bannersHistoryId;
    }

    /**
     * Set bannersId
     *
     * @param integer $bannersId
     * @return BannersHistory
     */
    public function setBannersId($bannersId)
    {
        $this->bannersId = $bannersId;

        return $this;
    }

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
     * Set bannersShown
     *
     * @param integer $bannersShown
     * @return BannersHistory
     */
    public function setBannersShown($bannersShown)
    {
        $this->bannersShown = $bannersShown;

        return $this;
    }

    /**
     * Get bannersShown
     *
     * @return integer 
     */
    public function getBannersShown()
    {
        return $this->bannersShown;
    }

    /**
     * Set bannersClicked
     *
     * @param integer $bannersClicked
     * @return BannersHistory
     */
    public function setBannersClicked($bannersClicked)
    {
        $this->bannersClicked = $bannersClicked;

        return $this;
    }

    /**
     * Get bannersClicked
     *
     * @return integer 
     */
    public function getBannersClicked()
    {
        return $this->bannersClicked;
    }

    /**
     * Set bannersHistoryDate
     *
     * @param \DateTime $bannersHistoryDate
     * @return BannersHistory
     */
    public function setBannersHistoryDate($bannersHistoryDate)
    {
        $this->bannersHistoryDate = $bannersHistoryDate;

        return $this;
    }

    /**
     * Get bannersHistoryDate
     *
     * @return \DateTime 
     */
    public function getBannersHistoryDate()
    {
        return $this->bannersHistoryDate;
    }
}
