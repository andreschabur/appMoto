<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CounterHistory
 *
 * @ORM\Table(name="counter_history")
 * @ORM\Entity
 */
class CounterHistory
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
     * @var string
     *
     * @ORM\Column(name="month", type="string", length=8, nullable=true)
     */
    private $month;

    /**
     * @var integer
     *
     * @ORM\Column(name="counter", type="integer", nullable=true)
     */
    private $counter;



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
     * Set month
     *
     * @param string $month
     * @return CounterHistory
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return string 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set counter
     *
     * @param integer $counter
     * @return CounterHistory
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;

        return $this;
    }

    /**
     * Get counter
     *
     * @return integer 
     */
    public function getCounter()
    {
        return $this->counter;
    }
}
