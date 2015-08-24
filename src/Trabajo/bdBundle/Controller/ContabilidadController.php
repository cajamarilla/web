<?php

namespace Trabajo\bdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Trabajo\bdBundle\Entity\Usuarios;
use Trabajo\bdBundle\Entity\Dte;
use Trabajo\bdBundle\Entity\Cliente;
use Trabajo\bdBundle\Form\UsuariosType;
use Trabajo\bdBundle\Form\DteType;
use Trabajo\bdBundle\Form\ClienteType;
use Symfony\Component\HttpFoundation\Request;

class ContabilidadController extends Controller
{
   
	public function lventaAction()
    {
                return $this->render('bdBundle:contabilidad:indexlibroventa.html.twig'); 
    }
	public function fventaAction()
    {
                return $this->render('bdBundle:contabilidad:indexfventa.html.twig'); 
    }
	public function fcompraAction()
    {
                return $this->render('bdBundle:contabilidad:indexfcompra.html.twig'); 
    }
 
}