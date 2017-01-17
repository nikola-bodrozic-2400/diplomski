<?php

namespace MyCompany\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyCompany\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @var integer
     *
     * @ORM\Column(name="progres", type="integer")
     */
    private $progres;

    /**
     * @var boolean
     *
     * @ORM\Column(name="preview", type="boolean")
     */
    private $preview;

    /**
     * @var string
     * @Assert\Length(min = 8, minMessage="ovo polje ne sme biti krace od 8 karaktera")
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @ORM\ManyToOne(targetEntity="MyCompany\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $owner;

//////////////////////////////////////////////


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

    /**
     * Set progres
     *
     * @param integer $progres
     * @return Article
     */
    public function setProgres($progres)
    {
        $this->progres = $progres;

        return $this;
    }

    /**
     * Get progres
     *
     * @return integer 
     */
    public function getProgres()
    {
        return $this->progres;
    }


    /**
     * Set preview
     *
     * @param boolean $preview
     * @return Article
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Get preview
     *
     * @return boolean 
     */
    public function getPreview()
    {
        return $this->preview;
    }
}
