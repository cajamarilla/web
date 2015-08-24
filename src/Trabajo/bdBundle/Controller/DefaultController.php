<?php

namespace Trabajo\bdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('bdBundle:Default:index.html.twig', array('name' => $name));
    }
}
