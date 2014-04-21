<?php

namespace ProjetL3\LienBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetL3LienBundle:Default:index.html.twig', array('name' => $name));
    }
}
