<?php

namespace MyCompany\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MyCompany\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Article
 * @ORM\Entity
 * @ORM\Table(name="sym_kategorija")
 */
class Kategorija
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
   *
   * @ORM\OneToMany(targetEntity="Article", mappedBy="kategorija", cascade={"remove"})
   * @ORM\JoinColumn(onDelete="CASCADE")
   */
  private $article;

    public function __construct()
  {
      $this->article = new ArrayCollection();
  }
  
  public function __toString()
  {
      return $this->title;
  }  
//////////////////////////////////////////////


 

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
     * Set title
     *
     * @param string $title
     *
     * @return Kategorija
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
     * Add article
     *
     * @param \MyCompany\ArticleBundle\Entity\Article $article
     *
     * @return Kategorija
     */
    public function addArticle(\MyCompany\ArticleBundle\Entity\Article $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \MyCompany\ArticleBundle\Entity\Article $article
     */
    public function removeArticle(\MyCompany\ArticleBundle\Entity\Article $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }
}
