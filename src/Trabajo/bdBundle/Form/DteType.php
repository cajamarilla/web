<?php

namespace Trabajo\bdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut','integer',array("required"=>true))
			->add('direccion','text',array("required"=>true))
			->add('giro','text',array("required"=>true))
			->add('direccion','text',array("required"=>true))
			->add('comuna','text',array("required"=>true))
			->add('ciudad','text',array("required"=>true))
			->add('nombre','text',array("required"=>true))
			
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
