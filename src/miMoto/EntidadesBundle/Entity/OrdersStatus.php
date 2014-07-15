<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersStatus
 *
 * @ORM\Table(name="orders_status", indexes={@ORM\Index(name="idx_orders_status_name", columns={"orders_status_name"})})
 * @ORM\Entity
 */
class OrdersStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_status_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ordersStatusId = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="language_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languageId = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="orders_status_name", type="string", length=32, nullable=false)
     */
    private $ordersStatusName;

    /**
     * @var integer
     *
     * @ORM\Column(name="public_flag", type="integer", nullable=true)
     */
    private $publicFlag = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="downloads_flag", type="integer", nullable=true)
     */
    private $downloadsFlag = '0';



    /**
     * Set ordersStatusId
     *
     * @param integer $ordersStatusId
     * @return OrdersStatus
     */
    public function setOrdersStatusId($ordersStatusId)
    {
        $this->ordersStatusId = $ordersStatusId;

        return $this;
    }

    /**
     * Get ordersStatusId
     *
     * @return integer 
     */
    public function getOrdersStatusId()
    {
        return $this->ordersStatusId;
    }

    /**
     * Set languageId
     *
     * @param integer $languageId
     * @return OrdersStatus
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * Get languageId
     *
     * @return integer 
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * Set ordersStatusName
     *
     * @param string $ordersStatusName
     * @return OrdersStatus
     */
    public function setOrdersStatusName($ordersStatusName)
    {
        $this->ordersStatusName = $ordersStatusName;

        return $this;
    }

    /**
     * Get ordersStatusName
     *
     * @return string 
     */
    public function getOrdersStatusName()
    {
        return $this->ordersStatusName;
    }

    /**
     * Set publicFlag
     *
     * @param integer $publicFlag
     * @return OrdersStatus
     */
    public function setPublicFlag($publicFlag)
    {
        $this->publicFlag = $publicFlag;

        return $this;
    }

    /**
     * Get publicFlag
     *
     * @return integer 
     */
    public function getPublicFlag()
    {
        return $this->publicFlag;
    }

    /**
     * Set downloadsFlag
     *
     * @param integer $downloadsFlag
     * @return OrdersStatus
     */
    public function setDownloadsFlag($downloadsFlag)
    {
        $this->downloadsFlag = $downloadsFlag;

        return $this;
    }

    /**
     * Get downloadsFlag
     *
     * @return integer 
     */
    public function getDownloadsFlag()
    {
        return $this->downloadsFlag;
    }
}
