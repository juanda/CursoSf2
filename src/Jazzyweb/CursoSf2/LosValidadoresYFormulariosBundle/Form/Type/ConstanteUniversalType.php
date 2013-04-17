<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConstanteUniversalType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('nombre', 'text')
                ->add('valor', 'number')
                ->add('unidad', 'text');
    }

    public function getName() {
        return 'constanteuniversal';
    }

}

?>
