<?php

namespace Trabajo\bdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class TrabajoController extends Controller
{
    public function indexAction(Request $request)
    {
         $session=$request->getSession();
         if($session->has("id"))
         {
             return $this->render('bdBundle:Trabajo:index.html.twig');
         }else
         {
             $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Debe estar logueado para ver este contenido'
                            );
                    return $this->redirect($this->generateUrl('bd_homepagelogin'));
         }
       
    }
    public function dosAction(Request $request)
    {
         $session=$request->getSession();
         if($session->has("id"))
         {
             return $this->render('bdBundle:Trabajo:dos.html.twig');
         }else
         {
             $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Debe estar logueado para ver este contenido'
                            );
                    return $this->redirect($this->generateUrl('bd_homepagelogin'));
         }
       
    }
     public function loginAction(Request $request)
    {
        
        if($request->getMethod()=="POST")
        {
            $email=$request->get("correo");
            $password=$request->get("pass");
            //echo "correo=".$correo."<br>pass=".$pass;exit;
            $user=$this->getDoctrine()->getRepository('bdBundle:Usuarios')->findOneBy(array("correo"=>$email,"pass"=>$password));
            if($user)
            {
               $session=$request->getSession();
               $session->set("id",$user->getId());
               $session->set("nombre",$user->getNombre());
               //echo $session->get("nombre");exit;
               return $this->redirect($this->generateUrl('bd_homepage'));
            }else
            {
                 $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Los datos ingresados no son válidos'
                            );
                    return $this->redirect($this->generateUrl('bd_homepagelogin'));
            }
        }
        
        return $this->render('bdBundle:Trabajo:login.html.twig');
    }
    public function logoutAction(Request $request)
    {
        $session=$request->getSession();
        $session->clear();
        $this->get('session')->getFlashBag()->add(
                                'mensaje',
                                'Se ha cerrado sessión exitosamente, gracias por visitarnos'
                            );
                    return $this->redirect($this->generateUrl('bd_homepagelogin'));
    }

}
