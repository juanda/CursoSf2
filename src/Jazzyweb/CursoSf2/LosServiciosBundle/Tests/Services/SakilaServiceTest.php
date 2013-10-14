<?php
namespace Jazzyweb\CursoSf2\LosServiciosBundle\Tests\Services;

use Jazzyweb\CursoSf2\LosServiciosBundle\Services\SakilaService;

class SakilaServiceTest extends \PHPUnit_Framework_TestCase {

    protected static $service;


    public static function setUpBeforeClass()
    {
        $config = array(
            'dbname' => 'sakila',
            'dbuser' => 'root',
            'dbpass' => '1cadsggm2',
            'dbhost' => '10.200.16.27'
        );

        self::$service = new SakilaService(
            $config['dbname'],
            $config['dbuser'],
            $config['dbpass'],
            $config['dbhost']
        );
    }

    public static function tearDownAfterClass()
    {
        self::$service = NULL;
    }

    public function nameProvider()
    {
        return array(array('PENELOPE'), array('NICK'), array('BETTE'), array('GRACE'));
    }

    public function testGetActors(){

        $actors = self::$service->getActors();

        $this->assertCount(207, $actors);
        $this->assertArrayHasKey('actor_id', $actors[0]);
        $this->assertArrayHasKey('first_name', $actors[0]);
        $this->assertArrayHasKey('last_name', $actors[0]);
        $this->assertArrayHasKey('last_update', $actors[0]);
    }

    /**
     * @dataProvider nameProvider
     */
    public function testGetActorByName($name){

        $actors = self::$service->getActorsByName($name);


        $this->assertGreaterThan(0, count($actors));
        $this->assertCount(4, $actors[0]);
        $this->assertArrayHasKey('actor_id', $actors[0]);
        $this->assertArrayHasKey('first_name', $actors[0]);
        $this->assertArrayHasKey('last_name', $actors[0]);
        $this->assertArrayHasKey('last_update', $actors[0]);;

    }

}