<?php
namespace Jazzyweb\CursoSf2\LosFundamentosBundle\Services;

class GeneradorDatosService {

    public function __construct() {
        ;
    }

    public function getPersona($id) {
        return array(
            'nombre' => 'Gabriel',
            'apellidos' => 'Pérez',
            'edad' => 40,
            'profesión' => 'Software developers'
        );
    }

    public function getSistemasOperativos() {

        return array('Linux', 'Windows', 'MacOSX');
    }

    public function getPersonas() {
        return array(
            array(
                'nombre' => 'Gabriel',
                'apellidos' => 'Pérez',
                'edad' => 40,
                'profesión' => 'Software developer'
            ),
            array(
                'nombre' => 'Juan',
                'apellidos' => 'Monchoto',
                'edad' => 35,
                'profesión' => 'Software developer'
            ),
            array(
                'nombre' => 'David',
                'apellidos' => 'García',
                'edad' => 36,
                'profesión' => 'System manager'
            )
        );
    }

}

?>
