<?php

namespace MyCompany\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roles
 *
 * @ORM\Table(name="sym_roles")
 * @ORM\Entity(repositoryClass="MyCompany\UserBundle\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=24)
     */
    private $name;

    /**
     * render checkbox for reading
     *
     * @var boolean
     *
     * @ORM\Column(name="can_read", type="boolean")
     */
    private $canRead;

    /**
     * render checkbox for writing and reading
     *
     * @var boolean
     *
     * @ORM\Column(name="can_rw", type="boolean")
     */
    private $canReadWrite;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Roles
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set canRead
     *
     * @param boolean $canRead
     *
     * @return Roles
     */
    public function setCanRead($canRead)
    {
        $this->canRead = $canRead;

        return $this;
    }

    /**
     * Get canRead
     *
     * @return boolean
     */
    public function getCanRead()
    {
        return $this->canRead;
    }

    /**
     * Set canReadWrite
     *
     * @param boolean $canReadWrite
     *
     * @return Roles
     */
    public function setCanReadWrite($canReadWrite)
    {
        $this->canReadWrite = $canReadWrite;

        return $this;
    }

    /**
     * Get canReadWrite
     *
     * @return boolean
     */
    public function getCanReadWrite()
    {
        return $this->canReadWrite;
    }
}
