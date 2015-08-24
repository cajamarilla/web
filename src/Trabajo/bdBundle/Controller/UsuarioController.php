<?php

namespace Trabajo\bdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Trabajo\bdBundle\Entity\Usuarios;
use Trabajo\bdBundle\Form\UsuariosType;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller
{
	public function usuarioAction()
    {
        return $this->render('bdBundle:Usuario:usuario.html.twig');
    }
    public function indexAction()
    {
         $datos = $this->getDoctrine()
                       ->getRepository('bdBundle:Usuarios')
                       ->findAll();
        return $this->render('bdBundle:Usuario:index.html.twig',compact("datos"));
    }
 /* crea un nuevo usario*/
     public function agregarAction(Request $request)
    {
         $p=new Usuarios();
         $form=$this->createForm(new UsuariosType(),$p);
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
            return $this->redirect($this->generateUrl('bd_usuario'));
         }
         
        return $this->render('bdBundle:Usuario:agregar.html.twig',array("form"=>$form->createView()));
    }
    public function editarAction($id,Request $request)
    {
            $p=new Usuarios();
            
            $datos=$this->getDoctrine()
                ->getRepository('bdBundle:Usuarios')
                ->find($id);
                 if (!$datos) 
                {
                    throw $this->createNotFoundException(
                    'No existe el producto con el valor  '.$id
                     );
                }          
            $form=$this->createForm(new UsuariosType(),$datos);
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
                    return $this->redirect($this->generateUrl('bd_usuario'));
                }
            
            return $this->render('bdBundle:Usuario:editar.html.twig',array("form"=>$form->createView()));
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