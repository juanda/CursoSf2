<?php

namespace Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Controller;

use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Tag;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Task;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\ConstanteUniversal;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Persona;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Entity\Direccion;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type\ConstanteUniversalType;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type\CosaType;
use Jazzyweb\CursoSf2\LosValidadoresYFormulariosBundle\Form\Type\PersonaType;
use Symfony\Component\HttpFoundation\Request;

class FormulariosController extends Controller {

    public function indexAction() {
        return $this->render('JCSf2ValyFormsBundle:Formularios:index.html.twig');
    }

    public function enControladorAction() {

        $veloLuz = new ConstanteUniversal();

        $veloLuz->setNombre('Velocidad de la luz');
        $veloLuz->setValor('300000');
        $veloLuz->setUnidad('m/s');

        $form = $this->createFormBuilder($veloLuz)
            ->add('nombre', 'text', array())
            ->add('valor', 'number')
            ->add('unidad', 'text')
            ->getForm();

        return $this->render('JCSf2ValyFormsBundle:Formularios:formulario.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function enSuPropiaClaseAction() {

        $veloLuz = new ConstanteUniversal();

        $veloLuz->setNombre('Velocidad de la luz');
        $veloLuz->setValor('300000');

        $form = $this->createForm(new ConstanteUniversalType, $veloLuz);

        return $this->render('JCSf2ValyFormsBundle:Formularios:formulario.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function envioAction() {

        $request = $this->getRequest();

        $veloLuz = new ConstanteUniversal();

        $form = $this->createForm(new ConstanteUniversalType, $veloLuz);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $this->get('session')->getFlashBag()->add('notice', 'El formulario era válido!');

            return $this->redirect($this->generateUrl('jc_sf2_valy_forms_formularios_envio'));
        }


//        return $this->render('JCSf2ValyFormsBundle:Formularios:formenvio.html.twig', array(
//                    'form' => $form->createView()
//        ));

        return $this->render('JCSf2ValyFormsBundle:Formularios:formenviowidgets.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function tiposDeWidgetsAction() {

        $datos = array('nombre' => 'Juanda', 'email' => 'juandalibaba@gmail.com');

        $form = $this->createForm(new CosaType, $datos);

        return $this->render('JCSf2ValyFormsBundle:Formularios:formulario_widgets.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function embeddedFormAction() {

        $request = $this->getRequest();

        $persona = new Persona();

        $form = $this->createForm(new PersonaType, $persona);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // perform some action, such as saving the task to the database

            $this->get('session')->getFlashBag()->add('notice', 'El formulario era válido!');


            return $this->redirect($this->generateUrl('jc_sf2_valy_forms_formularios_embeddedForm'));
        }

        return $this->render('JCSf2ValyFormsBundle:Formularios:embeddedForm.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function collectionFormAction(Request $request)
    {
        $task = new Task();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->setName('tag1');
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setName('tag2');
        $task->getTags()->add($tag2);
        // end dummy code

        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('session')->getFlashBag()->add('notice', 'El formulario era válido!');


            return $this->redirect($this->generateUrl('jc_sf2_valy_forms_formularios_collectionForm'));
        }

        return $this->render('JCSf2ValyFormsBundle:Formularios:newTask.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}

?>
