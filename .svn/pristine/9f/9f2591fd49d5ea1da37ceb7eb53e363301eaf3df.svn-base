<?php

namespace ProjetL3\UserBundle\Controller;

use ProjetL3\LienBundle\Form\ThemeChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function bibliothequeAction()
    {
        $liens = $this->getUser()->getLiens();

        $theme_form = $this->createForm(new ThemeChoiceType($this->getUser()->getLiens()));

        return $this->render('ProjetL3UserBundle:Default:bibliotheque.html.twig', array(
            'liens' => $liens,
            'theme_form' => $theme_form->createView(),
        ));

    }

    public function listeThemeAction(){
        $request = $this->getRequest();
        if($request->isXmlHttpRequest()){
            $em = $this->getDoctrine()->getManager();

            $theme = $request->get('theme');

            $theme_form = $this->createForm(new ThemeChoiceType($this->getUser()->getLiens()));

            $liens = $em->getRepository('ProjetL3LienBundle:Lien')->findByThemes($theme);

            return $this->render('ProjetL3UserBundle:Default:bibliotheque.html.twig', array(
                'liens' => $liens,
                'theme_form' => $theme_form->createView(),
            ));
        } else {
            return $this->bibliothequeAction();
        }
    }
}
