<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Counter
 *
 * @ORM\Table(name="counter")
 * @ORM\Entity
 */
class Counter
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
     * @ORM\Column(name="startdate", type="string", length=8, nullable=true)
     */
    private $startdate;

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
     * Set startdate
     *
     * @param string $startdate
     * @return Counter
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return string 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set counter
     *
     * @param integer $counter
     * @return Counter
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
