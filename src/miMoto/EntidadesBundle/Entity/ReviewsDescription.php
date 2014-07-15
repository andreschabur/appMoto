<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReviewsDescription
 *
 * @ORM\Table(name="reviews_description")
 * @ORM\Entity
 */
class ReviewsDescription
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reviews_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $reviewsId;

    /**
     * @var integer
     *
     * @ORM\Column(name="languages_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $languagesId;

    /**
     * @var string
     *
     * @ORM\Column(name="reviews_text", type="text", nullable=false)
     */
    private $reviewsText;



    /**
     * Set reviewsId
     *
     * @param integer $reviewsId
     * @return ReviewsDescription
     */
    public function setReviewsId($reviewsId)
    {
        $this->reviewsId = $reviewsId;

        return $this;
    }

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
     * Set languagesId
     *
     * @param integer $languagesId
     * @return ReviewsDescription
     */
    public function setLanguagesId($languagesId)
    {
        $this->languagesId = $languagesId;

        return $this;
    }

    /**
     * Get languagesId
     *
     * @return integer 
     */
    public function getLanguagesId()
    {
        return $this->languagesId;
    }

    /**
     * Set reviewsText
     *
     * @param string $reviewsText
     * @return ReviewsDescription
     */
    public function setReviewsText($reviewsText)
    {
        $this->reviewsText = $reviewsText;

        return $this;
    }

    /**
     * Get reviewsText
     *
     * @return string 
     */
    public function getReviewsText()
    {
        return $this->reviewsText;
    }
}
