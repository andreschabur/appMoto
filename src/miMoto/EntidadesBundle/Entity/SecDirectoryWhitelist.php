<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecDirectoryWhitelist
 *
 * @ORM\Table(name="sec_directory_whitelist")
 * @ORM\Entity
 */
class SecDirectoryWhitelist
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
     * @ORM\Column(name="directory", type="string", length=255, nullable=false)
     */
    private $directory;



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
     * Set directory
     *
     * @param string $directory
     * @return SecDirectoryWhitelist
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string 
     */
    public function getDirectory()
    {
        return $this->directory;
    }
}
