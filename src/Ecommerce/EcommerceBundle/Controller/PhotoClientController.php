<?php
/**
 * Created by PhpStorm.
 * User: l.fahimi
 * Date: 29/01/2018
 * Time: 10:50
 */

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\UtilisateursClient;
use Ecommerce\EcommerceBundle\Form\UtilisateursClientType;

class PhotoClientController extends Controller
{


    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EcommerceBundle:UtilisateursClient')->findAll();

        return $this->render('EcommerceBundle:Administration:PhotoClient/index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new UtilisateursClient();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminPhotoClient_show', array('id' => $entity->getId())));
        }

        return $this->render('EcommerceBundle:Administration:PhotoClient/newPhotoClient.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    private function createCreateForm(UtilisateursClient $entity)
    {
        $form = $this->createForm(new UtilisateursClientType(), $entity, array(
            'action' => $this->generateUrl('adminPhotoClient_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newPhotoClientAction()
    {
        $entity = new UtilisateursClient();
        $form   = $this->createCreateForm($entity);

        return $this->render('EcommerceBundle:Administration:PhotoClient/newPhotoClient.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }


    public function showPhotoClientAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:UtilisateursClient')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UtilisateursClient entity.');
        }



        return $this->render('EcommerceBundle:Administration:PhotoClient/showPhotoClient.html.twig', array(
            'entity'      => $entity ));
    }
}