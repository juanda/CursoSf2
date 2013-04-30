<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\IntegerToLocalizedStringTransformer;

class CosaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nombre', 'text', array(
                    'label' => 'Nombre'
                ))
                ->add('descripcion', 'textarea', array(
                    'label' => 'Descripcion',
                    'max_length' => 255
                ))
                ->add('email', 'email', array(
                    'label' => 'Email'
                ))
                ->add('cantidad', 'integer', array(
                    'label' => 'Cantidad',
                    'rounding_mode' => IntegerToLocalizedStringTransformer::ROUND_UP
                ))
                ->add('password', 'password', array(
                    'label' => 'Password'
                ))
                ->add('porcentaje', 'percent', array(
                    'type' => 'integer',
                ))
                ->add('url', 'url', array(
                    'default_protocol' => 'https'
                ))
                ->add('sistema_operativo', 'choice', array(
                    'choices' => array(
                        'linux' => 'Linux',
                        'windows' => 'Windows',
                        'macosx' => 'MacOSX'
                    ),
                    'empty_value' => 'Elige una opción',
                ))
                ->add('intereses', 'choice', array(
                    'choices' => array(
                        'ciencia' => 'Ciencia',
                        'arte' => 'Arte',
                        'musica' => 'Musica',
                        'deportes' => 'Deportes'
                    ),
                    'expanded' => true,
                    'multiple' => true,
                ))
                ->add('numero_empleados', 'choice', array(
                    'choices' => array(
                        'grupoA' => 'Entre 1 y 5',
                        'grupoB' => 'Entre 6 y 15',
                        'grupoC' => 'Entre 16 y 100',
                        'grupoD' => 'Más de 100',
                    ),
                    'empty_value' => 'Elige una opción',
                    'expanded' => true,
                    'multiple' => false
                ))
                ->add('paises', 'choice', array(
                    'choice_list' => new \Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\PaisesChoiceList()
                ))
                ->add('fecha1', 'date', array(
                    'input' => 'string',
                    'widget' => 'choice'
                ))                
                ->add('fecha2', 'date', array(
                    'input' => 'string',
                    'widget' => 'single_text'
                ))

        ;
    }

    public function getName() {
        return 'computadora';
    }

}

?>
