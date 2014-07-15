<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sessions
 *
 * @ORM\Table(name="sessions")
 * @ORM\Entity
 */
class Sessions
{
    /**
     * @var string
     *
     * @ORM\Column(name="sesskey", type="string", length=32, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sesskey;

    /**
     * @var integer
     *
     * @ORM\Column(name="expiry", type="integer", nullable=false)
     */
    private $expiry;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=false)
     */
    private $value;



    /**
     * Get sesskey
     *
     * @return string 
     */
    public function getSesskey()
    {
        return $this->sesskey;
    }

    /**
     * Set expiry
     *
     * @param integer $expiry
     * @return Sessions
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;

        return $this;
    }

    /**
     * Get expiry
     *
     * @return integer 
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Sessions
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
}
