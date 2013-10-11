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

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');

        $builder->add('tags', 'collection', array(
            'type'         => new TagType(),
            'allow_add'    => true,
            'allow_delete' => true,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Task',
        ));
    }

    public function getName()
    {
        return 'task';
    }
}