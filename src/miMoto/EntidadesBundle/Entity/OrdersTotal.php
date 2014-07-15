<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdersTotal
 *
 * @ORM\Table(name="orders_total", indexes={@ORM\Index(name="idx_orders_total_orders_id", columns={"orders_id"})})
 * @ORM\Entity
 */
class OrdersTotal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="orders_total_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordersTotalId;

    /**
     * @var integer
     *
     * @ORM\Column(name="orders_id", type="integer", nullable=false)
     */
    private $ordersId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255, nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="decimal", precision=15, scale=4, nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=32, nullable=false)
     */
    private $class;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=false)
     */
    private $sortOrder;



    /**
     * Get ordersTotalId
     *
     * @return integer 
     */
    public function getOrdersTotalId()
    {
        return $this->ordersTotalId;
    }

    /**
     * Set ordersId
     *
     * @param integer $ordersId
     * @return OrdersTotal
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
     * Set title
     *
     * @param string $title
     * @return OrdersTotal
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return OrdersTotal
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return OrdersTotal
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return OrdersTotal
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     * @return OrdersTotal
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
}
