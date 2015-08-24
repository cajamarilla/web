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

class DteController extends Controller
{
   
	public function indexAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Cliente') /*tabla usuarios*/
                       ->findAll();
        return $this->render('bdBundle:Dte:index.html.twig',compact("datos")); 
    }
	public function indexexentaAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Cliente') /*tabla usuarios*/
                       ->findAll();
        return $this->render('bdBundle:Dte:indexexenta.html.twig',compact("datos")); 
    }
	
	public function ncreditoAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Cliente') /*tabla usuarios*/
                       ->findAll();
        return $this->render('bdBundle:Dte:indexncredito.html.twig',compact("datos")); 
    }
	public function gdespachoAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Cliente') /*tabla usuarios*/
                       ->findAll();
        return $this->render('bdBundle:Dte:indexgdespacho.html.twig',compact("datos")); 
    }
	public function respaldosAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Cliente') /*tabla usuarios*/
                       ->findAll();
        return $this->render('bdBundle:Dte:indexrespaldo.html.twig',compact("datos")); 
    }
 	public function lventaAction()
    {
                return $this->render('bdBundle:Dte:indexlibroventa.html.twig'); 
    }
	public function fventaAction()
    {
                return $this->render('bdBundle:Dte:indexfventa.html.twig'); 
    }
	public function fcompraAction()
    {
                return $this->render('bdBundle:Dte:indexfcompra.html.twig'); 
    }
 /* crea un nuevo usario*/
     public function agregarAction(Request $request)
    {
         $p=new Cliente();
         $form=$this->createForm(new DteType(),$p);
          $form->handleRequest($request);
         if($form->isValid())
         {
            $em=$this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se ha agregado el registro exitosamente'
                            );
            return $this->redirect($this->generateUrl('bd_cliente'));
         }
         
        return $this->render('bdBundle:Dte:agregar.html.twig',array("form"=>$form->createView()));
    }
    public function seleccionAction($id,Request $request)
    {
            $p=new Cliente();
            
            $datos=$this->getDoctrine()
                ->getRepository('bdBundle:Cliente')
                ->find($id);
                 if (!$datos) 
                {
                    throw $this->createNotFoundException(
                    'No con el valor  '.$id
                     );
                }          
            $form=$this->createForm(new DteType(),$datos);
              $form->handleRequest($request);
            
                if ($form->isValid()) 
                {
                    $em=$this->getDoctrine()->getManager();
                    //$em->persist($p);
                    $em->flush();
                     $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se ha editado el registro exitosamente'
                            );
                    return $this->redirect($this->generateUrl('bd_cliente'));
                }
            
            return $this->render('bdBundle:Dte:agregar.html.twig',array("form"=>$form->createView()));
    }
     public function eliminarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('bdBundle:Usuarios')->find($id);
     
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
     
        $em->remove($product);
        $em->flush();
         $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se ha eliminado el registro exitosamente'
                            );
        return $this->redirect($this->generateUrl('bd_usuario'));
    }
}