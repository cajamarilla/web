<?php

namespace Trabajo\bdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text',array("required"=>true))
            ->add('direccion','text',array("required"=>true))
			->add('rut','integer',array("required"=>true))
			->add('razon_social','text',array("required"=>true))
            ->add('giro','text',array("required"=>true))
			->add('comuna','integer',array("required"=>true))
			->add('ciudad','integer',array("required"=>true))
		
		;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Trabajo\bdBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'trabajo_bdbundle_cliente';
    }
}
