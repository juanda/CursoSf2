<?php

namespace Jazzyweb\ChismorreosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Jazzyweb\ChismorreosBundle\Entity\Comentario;
use Jazzyweb\ChismorreosBundle\Form\ComentarioType;

/**
 * Post controller.
 *
 */
class PostListController extends Controller
{
    /**
     * Lists all Post entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JazzywebChismorreosBundle:Post')->findAll();

        return $this->render('JazzywebChismorreosBundle:PostList:index.html.twig', array(
            'entities' => $entities,
            ));
    }

    public function addCommentAction()
    {
        $em = $this->getDoctrine()->getManager();        

        $request = $this->getRequest();
        $idPost = $request->get('post');
        $post = $em->getRepository('JazzywebChismorreosBundle:Post')->find($idPost);        


        $comentario = new Comentario();
        $comentario->setPost($post); 

        $form   = $this->createForm(new ComentarioType(), $comentario);

        if($request->isMethod('POST')){
            $form->bind($request);

            if ($form->isValid()) {

                $em->persist($comentario);
                $em->flush();

                return $this->redirect($this->generateUrl('jazzyweb_chismorreos_postlist'));
            }
        }
        

        return $this->render('JazzywebChismorreosBundle:PostList:addComment.html.twig', array(
            'entity' => $comentario,
            'form'   => $form->createView(),
            'idPost' => $idPost
            ));
    }
   
}
