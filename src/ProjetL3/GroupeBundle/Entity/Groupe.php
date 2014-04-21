<?php

namespace ProjetL3\GroupeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ProjetL3\UserBundle\Entity\User;

/**
 * Groupe
 */
class Groupe
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
     * @return Groupe
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
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add users
     *
     * @param User $users
     * @return Groupe
     */
    public function addUser(User $users)
    {
        if (!$this->getUsers()->contains($users)) {
            $this->users[] = $users;
        }
        return $this;
    }

    /**
     * Remove users
     *
     * @param User $users
     */
    public function removeUser(User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $admins;


    /**
     * Add admins
     *
     * @param User $admins
     * @return Groupe
     */
    public function addAdmin(User $admins)
    {
        $this->admins[] = $admins;
        $this->addUser($admins);

        return $this;
    }

    /**
     * Remove admins
     *
     * @param User $admins
     */
    public function removeAdmin(User $admins)
    {
        $this->admins->removeElement($admins);
    }

    /**
     * Get admins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdmins()
    {
        return $this->admins;
    }

    public function __toString(){
        return $this->getNom();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $partages;


    /**
     * Add partages
     *
     * @param \ProjetL3\UserBundle\Entity\User $partages
     * @return Groupe
     */
    public function addPartage(\ProjetL3\UserBundle\Entity\User $partages)
    {
        $this->partages[] = $partages;
    
        return $this;
    }

    /**
     * Remove partages
     *
     * @param \ProjetL3\UserBundle\Entity\User $partages
     */
    public function removePartage(\ProjetL3\UserBundle\Entity\User $partages)
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
}