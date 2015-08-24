<?php

namespace Trabajo\bdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function indexAction()
    {
        return $this->render('bdBundle:Menu:index.html.twig');
    }
    public function facturacionAction()
    {
        return $this->render('bdBundle:Menu:facturacion.html.twig');
    }
	
	public function contabilidadAction()
    {
        return $this->render('bdBundle:Menu:contabilidad.html.twig');
    }
	public function otrosAction()
    {
        return $this->render('bdBundle:Menu:otros.html.twig');
    }
	public function administracionAction()
    {
        return $this->render('bdBundle:Menu:administracion.html.twig');
    }
	
}