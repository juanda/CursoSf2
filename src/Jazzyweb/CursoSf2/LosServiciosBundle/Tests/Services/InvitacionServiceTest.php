<?php

namespace Jazzyweb\CursoSf2\LosServiciosBundle\Tests\Services;


use Jazzyweb\CursoSf2\LosServiciosBundle\Services\InvitacionService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InvitacionServiceTest extends WebTestCase {

    public function testMailIsSentAndContentIsOk() {

        $client = static::createClient();
        $client->enableProfiler();

        $id = 1;
        $to = 'juandalibaba@gmail.com';

        $crawler = $client->request('GET', '/services/invitacion/'.$id.'/'.$to);

        $container = $client->getContainer();

        $from = $container->getParameter('jc_sf2_los_servicios.invitacion.from');
        $subject = $container->getParameter('jc_sf2_los_servicios.invitacion.subject');


        if ($profile = $client->getProfile()) {
            $mailCollector = $profile->getCollector('swiftmailer');

            // Check that an e-mail was sent
            $this->assertEquals(1, $mailCollector->getMessageCount());

            $collectedMessages = $mailCollector->getMessages();
            $message = $collectedMessages[0];
            //echo $message->getBody();
            // Asserting e-mail data
            $this->assertInstanceOf('Swift_Message', $message);
            $this->assertEquals($subject, $message->getSubject());
            $this->assertEquals($from, key($message->getFrom()));
            $this->assertEquals($to, key($message->getTo()));
            $this->assertRegExp(
                '/CursoSf2/', $message->getBody()
            );
        }
        else{
            $this->assertEquals('1','0');
        }
    }
}