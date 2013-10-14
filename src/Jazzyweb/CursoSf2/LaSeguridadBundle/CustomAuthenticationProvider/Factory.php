<?php

namespace Jazzyweb\CursoSf2\LaSeguridadBundle\CustomAuthenticationProvider;


use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;

class Factory implements SecurityFactoryInterface{


    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint)
    {
        echo "Factory:create/";
        $providerId = 'security.authentication.provider.custom.'.$id;
        $container
            ->setDefinition($providerId, new DefinitionDecorator('custom.security.authentication.provider'))
            ->replaceArgument(0, new Reference($userProvider))
        ;

        $listenerId = 'security.authentication.listener.custom.'.$id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('custom.security.authentication.listener'));

        return array($providerId, $listenerId, $defaultEntryPoint);
    }

    public function getPosition()
    {
        return 'form';
    }

    public function getKey()
    {
        return 'custom';
    }

    public function addConfiguration(NodeDefinition $builder)
    {
        // TODO: Implement addConfiguration() method.
    }
}