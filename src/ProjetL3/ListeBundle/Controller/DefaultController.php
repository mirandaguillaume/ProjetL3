<?php

namespace ProjetL3\ListeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetL3ListeBundle:Default:index.html.twig', array('name' => $name));
    }
}
