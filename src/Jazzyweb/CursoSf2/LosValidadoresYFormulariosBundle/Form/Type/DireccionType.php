<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DireccionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('calle', 'text')
                ->add('numero', 'number');
    }

    public function getName() {
        return 'direccion';
    }

}

?>
