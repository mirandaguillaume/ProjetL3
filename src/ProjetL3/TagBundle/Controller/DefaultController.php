<?php

namespace ProjetL3\TagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetL3TagBundle:Default:index.html.twig', array('name' => $name));
    }
}
