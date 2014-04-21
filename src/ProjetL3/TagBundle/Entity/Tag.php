<?php

namespace ProjetL3\TagBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 */
class Tag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;


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
     * Set nom
     *
     * @param string $nom
     * @return Tag
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $liens;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->liens = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add liens
     *
     * @param \ProjetL3\LienBundle\Entity\Lien $liens
     * @return Tag
     */
    public function addLien(\ProjetL3\LienBundle\Entity\Lien $liens)
    {
        $this->liens[] = $liens;
    
        return $this;
    }

    /**
     * Remove liens
     *
     * @param \ProjetL3\LienBundle\Entity\Lien $liens
     */
    public function removeLien(\ProjetL3\LienBundle\Entity\Lien $liens)
    {
        $this->liens->removeElement($liens);
    }

    /**
     * Get liens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLiens()
    {
        return $this->liens;
    }

    public function __toString(){
        return $this->getNom();
    }
}