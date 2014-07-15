<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reviews
 *
 * @ORM\Table(name="reviews", indexes={@ORM\Index(name="idx_reviews_products_id", columns={"products_id"}), @ORM\Index(name="idx_reviews_customers_id", columns={"customers_id"})})
 * @ORM\Entity
 */
class Reviews
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reviews_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reviewsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="products_id", type="integer", nullable=false)
     */
    private $productsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customers_id", type="integer", nullable=true)
     */
    private $customersId;

    /**
     * @var string
     *
     * @ORM\Column(name="customers_name", type="string", length=255, nullable=false)
     */
    private $customersName;

    /**
     * @var integer
     *
     * @ORM\Column(name="reviews_rating", type="integer", nullable=true)
     */
    private $reviewsRating;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=true)
     */
    private $dateAdded;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reviews_status", type="boolean", nullable=false)
     */
    private $reviewsStatus = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="reviews_read", type="integer", nullable=false)
     */
    private $reviewsRead = '0';



    /**
     * Get reviewsId
     *
     * @return integer 
     */
    public function getReviewsId()
    {
        return $this->reviewsId;
    }

    /**
     * Set productsId
     *
     * @param integer $productsId
     * @return Reviews
     */
    public function setProductsId($productsId)
    {
        $this->productsId = $productsId;

        return $this;
    }

    /**
     * Get productsId
     *
     * @return integer 
     */
    public function getProductsId()
    {
        return $this->productsId;
    }

    /**
     * Set customersId
     *
     * @param integer $customersId
     * @return Reviews
     */
    public function setCustomersId($customersId)
    {
        $this->customersId = $customersId;

        return $this;
    }

    /**
     * Get customersId
     *
     * @return integer 
     */
    public function getCustomersId()
    {
        return $this->customersId;
    }

    /**
     * Set customersName
     *
     * @param string $customersName
     * @return Reviews
     */
    public function setCustomersName($customersName)
    {
        $this->customersName = $customersName;

        return $this;
    }

    /**
     * Get customersName
     *
     * @return string 
     */
    public function getCustomersName()
    {
        return $this->customersName;
    }

    /**
     * Set reviewsRating
     *
     * @param integer $reviewsRating
     * @return Reviews
     */
    public function setReviewsRating($reviewsRating)
    {
        $this->reviewsRating = $reviewsRating;

        return $this;
    }

    /**
     * Get reviewsRating
     *
     * @return integer 
     */
    public function getReviewsRating()
    {
        return $this->reviewsRating;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return Reviews
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
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Reviews
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set reviewsStatus
     *
     * @param boolean $reviewsStatus
     * @return Reviews
     */
    public function setReviewsStatus($reviewsStatus)
    {
        $this->reviewsStatus = $reviewsStatus;

        return $this;
    }

    /**
     * Get reviewsStatus
     *
     * @return boolean 
     */
    public function getReviewsStatus()
    {
        return $this->reviewsStatus;
    }

    /**
     * Set reviewsRead
     *
     * @param integer $reviewsRead
     * @return Reviews
     */
    public function setReviewsRead($reviewsRead)
    {
        $this->reviewsRead = $reviewsRead;

        return $this;
    }

    /**
     * Get reviewsRead
     *
     * @return integer 
     */
    public function getReviewsRead()
    {
        return $this->reviewsRead;
    }
}
