<?php

namespace ProjetL3\GroupeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetL3GroupeBundle:Default:index.html.twig', array('name' => $name));
    }
}
