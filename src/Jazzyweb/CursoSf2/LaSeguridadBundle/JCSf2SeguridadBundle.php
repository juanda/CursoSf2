<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle;

use Jazzyweb\CursoSf2\LaSeguridadBundle\CustomAuthenticationProvider\Factory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JCSf2SeguridadBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new Factory());
    }
}
