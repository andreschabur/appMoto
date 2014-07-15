<?php

namespace miMoto\EntidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminGroups
 *
 * @ORM\Table(name="admin_groups", uniqueConstraints={@ORM\UniqueConstraint(name="admin_groups_name", columns={"admin_groups_name"})})
 * @ORM\Entity
 */
class AdminGroups
{
    /**
     * @var integer
     *
     * @ORM\Column(name="admin_groups_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adminGroupsId;

    /**
     * @var string
     *
     * @ORM\Column(name="admin_groups_name", type="string", length=64, nullable=true)
     */
    private $adminGroupsName;



    /**
     * Get adminGroupsId
     *
     * @return integer 
     */
    public function getAdminGroupsId()
    {
        return $this->adminGroupsId;
    }

    /**
     * Set adminGroupsName
     *
     * @param string $adminGroupsName
     * @return AdminGroups
     */
    public function setAdminGroupsName($adminGroupsName)
    {
        $this->adminGroupsName = $adminGroupsName;

        return $this;
    }

    /**
     * Get adminGroupsName
     *
     * @return string 
     */
    public function getAdminGroupsName()
    {
        return $this->adminGroupsName;
    }
}
