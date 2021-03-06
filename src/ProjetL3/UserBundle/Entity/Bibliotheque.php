<?php

namespace ProjetL3\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliotheque
 */
class Bibliotheque
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $partage;


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
     * Set partage
     *
     * @param boolean $partage
     * @return Bibliotheque
     */
    public function setPartage($partage)
    {
        $this->partage = $partage;
    
        return $this;
    }

    /**
     * Get partage
     *
     * @return boolean 
     */
    public function getPartage()
    {
        return $this->partage;
    }
    /**
     * @var \ProjetL3\UserBundle\Entity\User
     */
    private $user;

    /**
     * @var \ProjetL3\LienBundle\Entity\Lien
     */
    private $lien;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $partages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partage = false;
        $this->partages = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set user
     *
     * @param \ProjetL3\UserBundle\Entity\User $user
     * @return Bibliotheque
     */
    public function setUser(\ProjetL3\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \ProjetL3\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set lien
     *
     * @param \ProjetL3\LienBundle\Entity\Lien $lien
     * @return Bibliotheque
     */
    public function setLien(\ProjetL3\LienBundle\Entity\Lien $lien)
    {
        $this->lien = $lien;
    
        return $this;
    }

    /**
     * Get lien
     *
     * @return \ProjetL3\LienBundle\Entity\Lien 
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Add partages
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $partages
     * @return Bibliotheque
     */
    public function addPartage(\ProjetL3\GroupeBundle\Entity\Groupe $partages)
    {
        $this->partages[] = $partages;
    
        return $this;
    }

    /**
     * Remove partages
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $partages
     */
    public function removePartage(\ProjetL3\GroupeBundle\Entity\Groupe $partages)
    {
        $this->partages->removeElement($partages);
    }

    /**
     * Get partages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPartages()
    {
        return $this->partages;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupes;


    /**
     * Add groupes
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupes
     * @return Bibliotheque
     */
    public function addGroupe(\ProjetL3\GroupeBundle\Entity\Groupe $groupes)
    {
        $this->groupes[] = $groupes;
    
        return $this;
    }

    /**
     * Remove groupes
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupes
     */
    public function removeGroupe(\ProjetL3\GroupeBundle\Entity\Groupe $groupes)
    {
        $this->groupes->removeElement($groupes);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupes()
    {
        return $this->groupes;
    }
}