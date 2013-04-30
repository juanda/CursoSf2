<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DireccionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('calle', 'text')
                ->add('numero', 'number');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Direccion',
            'cascade_validation' => true,
        ));
    }

    public function getName() {
        return 'direccion';
    }

}

?>
