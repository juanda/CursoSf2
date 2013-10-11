<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Jazzyweb\CursoSf2\LosFundamentosBundle\JCSf2FundamentosBundle(),
            new Jazzyweb\CursoSf2\LasTemplatesBundle\JCSf2TemplatesBundle(),
            new Jazzyweb\CursoSf2\LosServiciosBundle\JCSf2LosServiciosBundle(),
            new Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\JCSf2ValyFormsBundle(),
            new Jazzyweb\CursoSf2\ElORMDoctrineBundle\JCSf2ORMDoctrineBundle(),
            new Jazzyweb\CursoSf2\LaSeguridadBundle\JCSf2SeguridadBundle(),
            new Jazzyweb\CursoSf2\LosControladoresYRutasBundle\JCSf2ControlRutasBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
