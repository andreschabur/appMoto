<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminFiles
 *
 * @ORM\Table(name="admin_files")
 * @ORM\Entity
 */
class AdminFiles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="admin_files_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adminFilesId;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_files_name", type="string", length=64, nullable=false)
     */
    private $adminFilesName = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="admin_files_is_boxes", type="boolean", nullable=false)
     */
    private $adminFilesIsBoxes = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_files_to_boxes", type="integer", nullable=false)
     */
    private $adminFilesToBoxes = '0';

    /**
     * @var simplearray
     *
     * @ORM\Column(name="admin_groups_id", type="simplearray", nullable=false)
     */
    private $adminGroupsId = '1';



    /**
     * Get adminFilesId
     *
     * @return integer 
     */
    public function getAdminFilesId()
    {
        return $this->adminFilesId;
    }

    /**
     * Set adminFilesName
     *
     * @param string $adminFilesName
     * @return AdminFiles
     */
    public function setAdminFilesName($adminFilesName)
    {
        $this->adminFilesName = $adminFilesName;

        return $this;
    }

    /**
     * Get adminFilesName
     *
     * @return string 
     */
    public function getAdminFilesName()
    {
        return $this->adminFilesName;
    }

    /**
     * Set adminFilesIsBoxes
     *
     * @param boolean $adminFilesIsBoxes
     * @return AdminFiles
     */
    public function setAdminFilesIsBoxes($adminFilesIsBoxes)
    {
        $this->adminFilesIsBoxes = $adminFilesIsBoxes;

        return $this;
    }

    /**
     * Get adminFilesIsBoxes
     *
     * @return boolean 
     */
    public function getAdminFilesIsBoxes()
    {
        return $this->adminFilesIsBoxes;
    }

    /**
     * Set adminFilesToBoxes
     *
     * @param integer $adminFilesToBoxes
     * @return AdminFiles
     */
    public function setAdminFilesToBoxes($adminFilesToBoxes)
    {
        $this->adminFilesToBoxes = $adminFilesToBoxes;

        return $this;
    }

    /**
     * Get adminFilesToBoxes
     *
     * @return integer 
     */
    public function getAdminFilesToBoxes()
    {
        return $this->adminFilesToBoxes;
    }

    /**
     * Set adminGroupsId
     *
     * @param \simplearray $adminGroupsId
     * @return AdminFiles
     */
    public function setAdminGroupsId(\simplearray $adminGroupsId)
    {
        $this->adminGroupsId = $adminGroupsId;

        return $this;
    }

    /**
     * Get adminGroupsId
     *
     * @return \simplearray 
     */
    public function getAdminGroupsId()
    {
        return $this->adminGroupsId;
    }
}
