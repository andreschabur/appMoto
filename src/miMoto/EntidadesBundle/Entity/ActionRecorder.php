<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionRecorder
 *
 * @ORM\Table(name="action_recorder", indexes={@ORM\Index(name="idx_action_recorder_module", columns={"module"}), @ORM\Index(name="idx_action_recorder_user_id", columns={"user_id"}), @ORM\Index(name="idx_action_recorder_identifier", columns={"identifier"}), @ORM\Index(name="idx_action_recorder_date_added", columns={"date_added"})})
 * @ORM\Entity
 */
class ActionRecorder
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
     * @ORM\Column(name="module", type="string", length=255, nullable=false)
     */
    private $module;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=true)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=255, nullable=false)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="success", type="string", length=1, nullable=true)
     */
    private $success;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded;



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
     * Set module
     *
     * @param string $module
     * @return ActionRecorder
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return string 
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return ActionRecorder
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return ActionRecorder
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set identifier
     *
     * @param string $identifier
     * @return ActionRecorder
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string 
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Set success
     *
     * @param string $success
     * @return ActionRecorder
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }

    /**
     * Get success
     *
     * @return string 
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return ActionRecorder
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
}
