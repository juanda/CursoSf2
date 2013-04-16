<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class KukuControllerTest extends WebTestCase
{
    public function testKaka()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/kaka');
    }

    public function testPepe()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pepe');
    }

}
