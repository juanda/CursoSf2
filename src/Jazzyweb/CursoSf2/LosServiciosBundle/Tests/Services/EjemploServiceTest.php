<?php
namespace Jazzyweb\CursoSf2\LosServiciosBundle\Tests\Services;

use Jazzyweb\CursoSf2\LosServiciosBundle\Services\EjemploService;


class EjemploServiceTest extends \PHPUnit_Framework_TestCase {

    public function testDiHola(){

        $p1 = 'El parámetro p1';
        $p2 = 'El parámetro p2';

        $s = new EjemploService($p1, $p2);

        $result = $s->diHola();

        $this->assertContains('p1', $result);
        $this->assertContains('p2', $result);
        $this->assertContains('EjemploServicio', $result);

        $this->expectOutputString('EjemploServicio. p1=El parámetro p1,p2=El parámetro p2');
        echo $result;

    }

}