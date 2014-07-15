<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersStatusHistory
 *
 * @ORM\Table(name="orders_status_history", indexes={@ORM\Index(name="idx_orders_status_history_orders_id", columns={"orders_id"})})
 * @ORM\Entity
 */
class OrdersStatusHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_status_history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersStatusHistoryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     */
    private $ordersId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_status_id", type="integer", nullable=false)
     */
    private $ordersStatusId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;

    /**
     * @var integer
     *
     * @ORM\Column(name="customer_notified", type="integer", nullable=true)
     */
    private $customerNotified = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;



    /**
     * Get ordersStatusHistoryId
     *
     * @return integer 
     */
    public function getOrdersStatusHistoryId()
    {
        return $this->ordersStatusHistoryId;
    }

    /**
     * Set ordersId
     *
     * @param integer $ordersId
     * @return OrdersStatusHistory
     */
    public function setOrdersId($ordersId)
    {
        $this->ordersId = $ordersId;

        return $this;
    }

    /**
     * Get ordersId
     *
     * @return integer 
     */
    public function getOrdersId()
    {
        return $this->ordersId;
    }

    /**
     * Set ordersStatusId
     *
     * @param integer $ordersStatusId
     * @return OrdersStatusHistory
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return OrdersStatusHistory
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
     * Set customerNotified
     *
     * @param integer $customerNotified
     * @return OrdersStatusHistory
     */
    public function setCustomerNotified($customerNotified)
    {
        $this->customerNotified = $customerNotified;

        return $this;
    }

    /**
     * Get customerNotified
     *
     * @return integer 
     */
    public function getCustomerNotified()
    {
        return $this->customerNotified;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return OrdersStatusHistory
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
