<?php

namespace ProjetL3\ListeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liste
 */
class Liste
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
     * @return Liste
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
     * @param \ProjetL3\ListeBundle\Entity\Liste $liens
     * @return Liste
     */
    public function addLien(\ProjetL3\ListeBundle\Entity\Liste $liens)
    {
        $this->liens[] = $liens;
    
        return $this;
    }

    /**
     * Remove liens
     *
     * @param \ProjetL3\ListeBundle\Entity\Liste $liens
     */
    public function removeLien(\ProjetL3\ListeBundle\Entity\Liste $liens)
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