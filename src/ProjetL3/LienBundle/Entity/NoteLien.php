<?php

namespace ProjetL3\LienBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NoteLien
 */
class NoteLien
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $note;


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
     * Set note
     *
     * @param string $note
     * @return NoteLien
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
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
     * Set user
     *
     * @param \ProjetL3\UserBundle\Entity\User $user
     * @return NoteLien
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
     * @return NoteLien
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
}