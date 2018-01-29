<?php
/**
 * Created by PhpStorm.
 * User: l.fahimi
 * Date: 29/01/2018
 * Time: 13:49
 */

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Client;
use Ecommerce\EcommerceBundle\Form\ClientType;

class ClientController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('EcommerceBundle:Client')->findAll();

        return $this->render('EcommerceBundle:Administration:Clients/index.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new Client();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminClient_show', array('id' => $entity->getIdClient())));
        }

        return $this->render('EcommerceBundle:Administration:Clients/newClient.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    private function createCreateForm(Client $entity)
    {
        $form = $this->createForm(new ClientType(), $entity, array(
            'action' => $this->generateUrl('adminClient_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newClientAction()
    {
        $entity = new Client();
        $form   = $this->createCreateForm($entity);

        return $this->render('EcommerceBundle:Administration:Clients/newClient.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function showClientAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('EcommerceBundle:Client')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Client entity.');
        }



        return $this->render('EcommerceBundle:Administration:Clients/showClient.html.twig', array(
            'entity'      => $entity ));
    }

}