<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Tests\Form\Type;

use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\ConstanteUniversal;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type\ConstanteUniversalType;
use Symfony\Component\Form\Tests\Extension\Validator\Type\TypeTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ConstanteUniversalTypeTest extends TypeTestCase{

    public function testSubmitValidData()
    {
        $formData = array(
            'nombre' => 'Constante de la luz',
            'unidad' => 'm/s',
            'valor' => 300000,
            'file'  => new UploadedFile('/home/juanda/sites/CursoSf2/kk','name')
        );

        $type = new ConstanteUniversalType();
        $form = $this->factory->create($type);

        $object = new ConstanteUniversal();
        $object->setNombre('Constante de la luz');
        $object->setUnidad('m/s');
        $object->setValor(300000);


        // submit the data to the form directly
        $form->submit($formData);

        $data = $form->getData();

        $this->assertEquals($object->getNombre(), $data['nombre']);
        $this->assertEquals($object->getUnidad(), $data['unidad']);
        $this->assertEquals($object->getValor(), $data['valor']);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}