<?php

namespace ProjetL3\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameters
 */
class Parameters
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $noteMax;

    /**
     * @var integer
     */
    private $votesMax;


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
     * Set noteMax
     *
     * @param integer $noteMax
     * @return Parameters
     */
    public function setNoteMax($noteMax)
    {
        $this->noteMax = $noteMax;
    
        return $this;
    }

    /**
     * Get noteMax
     *
     * @return integer 
     */
    public function getNoteMax()
    {
        return $this->noteMax;
    }

    /**
     * Set votesMax
     *
     * @param integer $votesMax
     * @return Parameters
     */
    public function setVotesMax($votesMax)
    {
        $this->votesMax = $votesMax;
    
        return $this;
    }

    /**
     * Get votesMax
     *
     * @return integer 
     */
    public function getVotesMax()
    {
        return $this->votesMax;
    }

    public function __toString(){
        return "Paramètres de l'application";
    }
}
