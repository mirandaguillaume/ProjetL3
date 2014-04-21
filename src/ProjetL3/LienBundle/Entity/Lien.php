<?php

namespace ProjetL3\LienBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ProjetL3\TagBundle\Entity\Tag;
use ProjetL3\UserBundle\Entity\Bibliotheque;
use ProjetL3\UserBundle\Entity\User;

/**
 * Lien
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetL3\LienBundle\Entity\LienRepository")
 */
class Lien
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    private $tags;

    private $listes;

    public function addTag(Tag $tag)
    {
        $tag->addLien($this);
        $this->tags[] = $tag;
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
     * Set nom
     *
     * @param string $nom
     * @return Lien
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
     * Set url
     *
     * @param string $url
     * @return Lien
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Lien
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date=new \DateTime();
        $this->nb_clics=0;
        $this->nb_votes=0;
        $this->tags = new ArrayCollection();
        $this->listes = new ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \ProjetL3\UserBundle\Entity\User $users
     * @return Lien
     */
    public function addUser(\ProjetL3\UserBundle\Entity\User $users)
    {
        $bibliotheque = new Bibliotheque();
        $bibliotheque->setUser($users);
        $bibliotheque->setLien($this);
        $this->addBibliotheque($bibliotheque);
    }

    /**
     * Remove users
     *
     * @param \ProjetL3\UserBundle\Entity\User $users
     */
    public function removeUser(\ProjetL3\UserBundle\Entity\User $users)
    {
        foreach($this->getBibliotheques() as $partage){
            if($partage->getUser()->getId() == $users->getId()){
                $this->removeBibliotheque($partage);
            }
        }
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        $users = array();
        foreach($this->getBibliotheques() as $partage){
            $users[] = $partage->getUser();
        }
        return $users;
    }

    /**
     * @var integer
     */
    private $nb_votes;

    /**
     * @var integer
     */
    private $nb_clics;


    /**
     * Set nb_votes
     *
     * @param integer $nbVotes
     * @return Lien
     */
    public function setNbVotes($nbVotes)
    {
        $this->nb_votes = $nbVotes;

        return $this;
    }

    /**
     * Get nb_votes
     *
     * @return integer
     */
    public function getNbVotes()
    {
        return $this->nb_votes;
    }

    /**
     * Set nb_clics
     *
     * @param integer $nbClics
     * @return Lien
     */
    public function setNbClics($nbClics)
    {
        $this->nb_clics = $nbClics;

        return $this;
    }

    /**
     * Get nb_clics
     *
     * @return integer
     */
    public function getNbClics()
    {
        return $this->nb_clics;
    }

    /**
     * Remove tags
     *
     * @param \ProjetL3\TagBundle\Entity\Tag $tags
     */
    public function removeTag(\ProjetL3\TagBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function getTagsForm(){
        $result = "";
        if (count($this->getTags())!=0) {
            foreach($this->getTags()->toArray() as $tag) {
                $result=$result.$tag->getNom().',';
            }
        }
        return substr($result,0,-1);
    }

    public function setTagsForm($tags_form){
        $new_tags = $this->stringToArray($tags_form);
        $current_tags = $this->getTagsNames();
        $tags = $this->getTags()->toArray();
        $tagsToAdd = array();
        foreach($new_tags as $new_tag){
            if (!in_array($new_tag,$current_tags)) {
                $tag = new Tag();
                $tag->setNom($new_tag);
                $tagsToAdd[] = $tag;
            }
        }
        foreach($tags as $current_tag){
            if (!in_array(strtolower($current_tag->getNom()),$new_tags)) {
                $this->removeTag($current_tag);
            }
        }
        return $tagsToAdd;
    }

    public function getTagsNames(){
        $tagsNames = array();

        foreach($this->getTags()->toArray() as $tag){
            $tagsNames[]=strtolower($tag->getNom());
        }

        return $tagsNames;
    }

    private function stringToArray($tags_form){
        $result = "";
        $array = array();
        for ($i=0;$i<strlen($tags_form);$i++){
            if ($tags_form[$i]==",") {
                $array[]=strtolower($result);
                $result="";
            } else {
                $result=$result.$tags_form[$i];
            }
        }
        if($result!=""){
            $array[]=strtolower($result);
        }
        return $array;
    }

    /**
     * Add listes
     *
     * @param \ProjetL3\ListeBundle\Entity\Liste $listes
     * @return Lien
     */
    public function addListe(\ProjetL3\ListeBundle\Entity\Liste $listes)
    {
        $this->listes[] = $listes;

        return $this;
    }

    /**
     * Remove listes
     *
     * @param \ProjetL3\ListeBundle\Entity\Liste $listes
     */
    public function removeListe(\ProjetL3\ListeBundle\Entity\Liste $listes)
    {
        $this->listes->removeElement($listes);
    }

    /**
     * Get listes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListes()
    {
        return $this->listes;
    }

    public function __toString(){
        return $this->getNom();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $notes;


    /**
     * Add notes
     *
     * @param \ProjetL3\LienBundle\note_lien $notes
     * @return Lien
     */
    public function addNote(\ProjetL3\LienBundle\Entity\NoteLien $notes)
    {
        $this->notes[] = $notes;

        return $this;
    }

    /**
     * Remove notes
     *
     * @param \ProjetL3\LienBundle\note_lien $notes
     */
    public function removeNote(\ProjetL3\LienBundle\Entity\NoteLien $notes)
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

    public function getNoteMoyenne(){
        $notes = array();
        foreach ($this->getNotes() as $note) {
            $notes[] = $note->getNote();
        }
        $nb_notes = count($notes);
        if ($nb_notes == 0) {
            return 0;
        }
        $sum_notes = array_sum($notes);
        return $sum_notes/$nb_notes;
    }

    public function getNoteUsers(){
        $note_users = new \Doctrine\Common\Collections\ArrayCollection();
        foreach($this->getNotes() as $note) {
            $note_users->add($note->getUser());
        }
        return $note_users;
    }

    public function addClick(){
        $this->nb_clics++;
    }
    /**
     * @var string
     */
    private $desc;


    /**
     * Set desc
     *
     * @param string $desc
     * @return Lien
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bibliotheques;


    /**
     * Add bibliotheques
     *
     * @param \ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheques
     * @return Lien
     */
    public function addBibliotheque(\ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheques)
    {
        $this->bibliotheques[] = $bibliotheques;

        return $this;
    }

    /**
     * Remove bibliotheques
     *
     * @param \ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheques
     */
    public function removeBibliotheque(\ProjetL3\UserBundle\Entity\Bibliotheque $bibliotheques)
    {
        $this->bibliotheques->removeElement($bibliotheques);
    }

    /**
     * Get bibliotheques
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBibliotheques()
    {
        return $this->bibliotheques;
    }

    public function getPartage(User $user){
        foreach($this->getBibliotheques() as $partage){
            if ($partage->getUser()->getId()==$user->getId()){
                return $partage;
            }
        }
        return null;
    }
}
