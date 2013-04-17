<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form;

use Symfony\Component\Form\Extension\Core\ChoiceList\LazyChoiceList;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class PaisesChoiceList extends LazyChoiceList {

    protected function loadChoiceList() {

        $paises = array(
            'es' => 'España',
            'gb' => 'Reino Unido',
            'fr' => 'Francia',
            'al' => 'Alemania'
        );
        
        $labels = array(
            'es' => 'España',
            'gb' => 'Reino Unido',
            'fr' => 'Francia',
            'al' => 'Alemania'
        );

        return new ChoiceList($paises, $labels);
    }

}
