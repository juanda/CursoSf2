<?php
/**
 * This file is part of Bookmaker
 * User: juanda
 * Date: 11/10/13
 * Time: 12:19
 */

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Tag',
        ));
    }

    public function getName()
    {
        return 'tag';
    }
}