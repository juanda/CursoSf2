<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PersonaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nombre', 'text')
                ->add('direccion', new DireccionType());
    }

//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Direccion',
//        ));
//    }

    public function getName() {
        return 'persona';
    }

}

?>
