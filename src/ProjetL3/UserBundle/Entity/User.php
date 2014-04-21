<?php

namespace ProjetL3\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use ProjetL3\GroupeBundle\Entity\Groupe;
use ProjetL3\LienBundle\Entity\Lien;
use ProjetL3\LienBundle\Entity\NoteLien;

/**
 * User
 */
class User extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $freqActu;

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set freqActu
     *
     * @param string $freqActu
     * @return User
     */
    public function setFreqActu($freqActu)
    {
        $this->freqActu = $freqActu;

        return $this;
    }

    /**
     * Get freqActu
     *
     * @return string
     */
    public function getFreqActu()
    {
        return $this->freqActu;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupes;

    /**
     * Add groupes
     *
     * @param Groupe $groupes
     * @return User
     */
    public function addGroupe(Groupe $groupes)
    {
        $this->groupes[] = $groupes;

        return $this;
    }

    /**
     * Remove groupes
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupes
     */
    public function removeGroupe(Groupe $groupes)
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

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupes_administrated;

    /**
     * Add groupes_administrated
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupesAdministrated
     * @return User
     */
    public function addGroupesAdministrated(Groupe $groupesAdministrated)
    {
        $this->groupes_administrated[] = $groupesAdministrated;

        return $this;
    }

    /**
     * Remove groupes_administrated
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupesAdministrated
     */
    public function removeGroupesAdministrated(Groupe $groupesAdministrated)
    {
        $this->groupes_administrated->removeElement($groupesAdministrated);
    }

    /**
     * Get groupes_administrated
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupesAdministrated()
    {
        return $this->groupes_administrated;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groups_administrated;


    /**
     * Add groups_administrated
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupsAdministrated
     * @return User
     */
    public function addGroupsAdministrated(Groupe $groupsAdministrated)
    {
        $this->groups_administrated[] = $groupsAdministrated;

        return $this;
    }

    /**
     * Remove groups_administrated
     *
     * @param \ProjetL3\GroupeBundle\Entity\Groupe $groupsAdministrated
     */
    public function removeGroupsAdministrated(Groupe $groupsAdministrated)
    {
        $this->groups_administrated->removeElement($groupsAdministrated);
    }

    /**
     * Get groups_administrated
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupsAdministrated()
    {
        return $this->groups_administrated;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;

    /**
     * Add notes
     *
     * @param \ProjetL3\LienBundle\Entity\NoteLien $notes
     * @return User
     */
    public function addNote(NoteLien $notes)
    {
        $this->notes[] = $notes;

        return $this;
    }

    /**
     * Remove notes
     *
     * @param NoteLien $notes
     */
    public function removeNote(NoteLien $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bibliotheque;

    /**
     * Add bibliotheque
     *
     * @param \ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheque
     * @return User
     */
    public function addBibliotheque(\ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheque)
    {
        $this->bibliotheque[] = $bibliotheque;

        return $this;
    }

    /**
     * Remove bibliotheque
     *
     * @param \ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheque
     */
    public function removeBibliotheque(\ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheque)
    {
        $this->bibliotheque->removeElement($bibliotheque);
    }

    /**
     * Get bibliotheque
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBibliotheque()
    {
        return $this->bibliotheque;
    }

    public function getLiens() {
        $liens = array();
        foreach($this->getBibliotheque() as $partage) {
            $liens[] = $partage->getLien();
        }
        return $liens;
    }

    public function addLien($lien) {
        $bibliotheque = new Bibliotheque();
        $bibliotheque->setLien($lien);
        $bibliotheque->setUser($this);
        $this->addBibliotheque($bibliotheque);
    }

    public function removeLien($lien) {
        foreach($this->getBibliotheque() as $partage){
            if ($partage->getLien()->getId()==$lien->getId()){
                $this->removeBibliotheque($partage);
            }
        }
        return null;
    }

    public function getPartage($lien){
        foreach($this->getBibliotheque() as $partage){
            if ($partage->getLien()->getId()==$lien->getId()){
                return $partage;
            }
        }
        return null;
    }
}