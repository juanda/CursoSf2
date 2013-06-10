<?php

namespace Jazzyweb\ChismorreosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComentarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('texto')
            ->add('post')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jazzyweb\ChismorreosBundle\Entity\Comentario'
        ));
    }

    public function getName()
    {
        return 'jazzyweb_chismorreosbundle_comentariotype';
    }
}
