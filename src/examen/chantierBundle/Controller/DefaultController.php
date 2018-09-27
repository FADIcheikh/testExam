<?php

namespace examen\chantierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('chantierBundle:Default:index.html.twig', array('name' => $name));
    }
}
