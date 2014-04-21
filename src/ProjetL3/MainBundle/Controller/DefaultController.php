<?php

namespace ProjetL3\MainBundle\Controller;

use ProjetL3\LienBundle\Form\TagChoiceType;
use ProjetL3\LienBundle\Form\ThemeChoiceType;
use ProjetL3\UserBundle\Entity\Bibliotheque;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use ProjetL3\LienBundle\Form\TriType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partages = $em->getRepository('ProjetL3UserBundle:Bibliotheque')->findByPartage(true);

        return $this->afficheIndex($partages);
    }

    public function afficheSearchBarAction(array $current_ids){
        $em = $this->getDoctrine()->getManager();

        $tag_search = $this->createForm(new TagChoiceType(),null,array(
            'action' => $this->generateUrl('tags_filtre'),
            'method' => 'POST',
        ));

        $tag_search->add('submit','submit',array(
            'label' => 'Filtrer',
        ));

        $tri_form = $this->createForm(new TriType($em),null,array(
            'action' => $this->generateUrl('trier'),
            'method' => 'POST',
        ));

        $tri_form->add('submit','submit',array(
            'label' => 'Trier',
        ));

        return $this->render('@ProjetL3Main/Default/affiche_search_bar.html.twig',array(
            'current_ids' => $current_ids,
            'tag_search' => $tag_search->createView(),
            'tri_form' => $tri_form->createView(),
        ));
    }

    public function tagsFiltreAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new TagChoiceType());

        $form->handleRequest($request);

        $tags = $form->get('tags')->getData();

        if (count($tags)!=0) {

        $partages = $em->getRepository('ProjetL3UserBundle:Bibliotheque')->findAll();

        $liens_filtrer = array();

        foreach($partages as $partage){
            foreach($tags as $tag){
                if($partage->getLien()->getTags()->contains($tag)){
                    $liens_filtrer[] = $partage;
                }
            }
        }

        $liens_filtrer=array_unique($liens_filtrer);

        return $this->afficheIndex($liens_filtrer);
        }
        else {
            return $this->indexAction();
        }
    }

    public function trierAction(Request $request) {

            $em = $this->getDoctrine()->getManager();

            $form = $this->createForm(new TriType($em));

            $form->handleRequest($request);

            $filtres = $form->getData();

            $liens_tries = $em->getRepository('ProjetL3LienBundle:Lien')->findAllTrie($filtres);

            $partages = $em->getRepository('ProjetL3UserBundle:Bibliotheque')->findAll();

            $partages_tries = array();

            foreach($partages as $partage) {
                if($liens_tries->contains($partage->getLien())){
                $partages_tries[] = $partage;
                }
            }

            return $this->afficheIndex($liens_tries);
    }

    public function afficheIndex(array $partages){
        return $this->render('@ProjetL3Main/Default/index.html.twig',array(
            'liens' => $partages,
        ));
    }
}
