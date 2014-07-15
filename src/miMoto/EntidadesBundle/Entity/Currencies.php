<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currencies
 *
 * @ORM\Table(name="currencies", indexes={@ORM\Index(name="idx_currencies_code", columns={"code"})})
 * @ORM\Entity
 */
class Currencies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="currencies_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $currenciesId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=32, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_left", type="string", length=12, nullable=true)
     */
    private $symbolLeft;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol_right", type="string", length=12, nullable=true)
     */
    private $symbolRight;

    /**
     * @var string
     *
     * @ORM\Column(name="decimal_point", type="string", length=1, nullable=true)
     */
    private $decimalPoint;

    /**
     * @var string
     *
     * @ORM\Column(name="thousands_point", type="string", length=1, nullable=true)
     */
    private $thousandsPoint;

    /**
     * @var string
     *
     * @ORM\Column(name="decimal_places", type="string", length=1, nullable=true)
     */
    private $decimalPlaces;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=13, scale=8, nullable=true)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_updated", type="datetime", nullable=true)
     */
    private $lastUpdated;



    /**
     * Get currenciesId
     *
     * @return integer 
     */
    public function getCurrenciesId()
    {
        return $this->currenciesId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Currencies
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
     * Set code
     *
     * @param string $code
     * @return Currencies
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set symbolLeft
     *
     * @param string $symbolLeft
     * @return Currencies
     */
    public function setSymbolLeft($symbolLeft)
    {
        $this->symbolLeft = $symbolLeft;

        return $this;
    }

    /**
     * Get symbolLeft
     *
     * @return string 
     */
    public function getSymbolLeft()
    {
        return $this->symbolLeft;
    }

    /**
     * Set symbolRight
     *
     * @param string $symbolRight
     * @return Currencies
     */
    public function setSymbolRight($symbolRight)
    {
        $this->symbolRight = $symbolRight;

        return $this;
    }

    /**
     * Get symbolRight
     *
     * @return string 
     */
    public function getSymbolRight()
    {
        return $this->symbolRight;
    }

    /**
     * Set decimalPoint
     *
     * @param string $decimalPoint
     * @return Currencies
     */
    public function setDecimalPoint($decimalPoint)
    {
        $this->decimalPoint = $decimalPoint;

        return $this;
    }

    /**
     * Get decimalPoint
     *
     * @return string 
     */
    public function getDecimalPoint()
    {
        return $this->decimalPoint;
    }

    /**
     * Set thousandsPoint
     *
     * @param string $thousandsPoint
     * @return Currencies
     */
    public function setThousandsPoint($thousandsPoint)
    {
        $this->thousandsPoint = $thousandsPoint;

        return $this;
    }

    /**
     * Get thousandsPoint
     *
     * @return string 
     */
    public function getThousandsPoint()
    {
        return $this->thousandsPoint;
    }

    /**
     * Set decimalPlaces
     *
     * @param string $decimalPlaces
     * @return Currencies
     */
    public function setDecimalPlaces($decimalPlaces)
    {
        $this->decimalPlaces = $decimalPlaces;

        return $this;
    }

    /**
     * Get decimalPlaces
     *
     * @return string 
     */
    public function getDecimalPlaces()
    {
        return $this->decimalPlaces;
    }

    /**
     * Set value
     *
     * @param float $value
     * @return Currencies
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     * @return Currencies
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime 
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
}
