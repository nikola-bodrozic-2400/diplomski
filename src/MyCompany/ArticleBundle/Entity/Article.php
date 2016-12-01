<?php

namespace MyCompany\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyCompany\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Article
 *
 * @ORM\Table(name="sym_article")
 * @ORM\Entity(repositoryClass="MyCompany\ArticleBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\ManyToOne(targetEntity="MyCompany\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $owner;

    /**
     * @ORM\ManyToMany(targetEntity="MyCompany\UserBundle\Entity\User")
     * @ORM\JoinTable(
     *     joinColumns={@ORM\JoinColumn(onDelete="CASCADE")},
     *     inverseJoinColumns={@ORM\JoinColumn(onDelete="CASCADE")}
     * )
     */
    protected $writers;
//////////////////////////////////////////////

    public function __construct()
    {
        $this->writers = new ArrayCollection();
    }

    /**
     *
     */
    public function getWriters()
    {
        return $this->writers;
    }

    public function hasWriters(User $user)
    {
        return $this->getWriters()->contains($user);
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
    }


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
     * Set time
     *
     * @param \DateTime $time
     * @return Article
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Article
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add writers
     *
     * @param \MyCompany\UserBundle\Entity\User $writers
     * @return Article
     */
    public function addWriter(\MyCompany\UserBundle\Entity\User $writers)
    {
        $this->writers[] = $writers;

        return $this;
    }

    /**
     * Remove writers
     *
     * @param \MyCompany\UserBundle\Entity\User $writers
     */
    public function removeWriter(\MyCompany\UserBundle\Entity\User $writers)
    {
        $this->writers->removeElement($writers);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
}
