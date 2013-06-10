<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/valyforms/formularios/en/controlador');

        $this->assertTrue($crawler->filter('html:contains("Valor")')->count() > 0);
    }
}
