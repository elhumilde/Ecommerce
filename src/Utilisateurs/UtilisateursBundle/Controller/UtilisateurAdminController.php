<?php
/**
 * Created by PhpStorm.
 * User: l.fahimi
 * Date: 29/01/2018
 * Time: 13:49
 */

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use Utilisateurs\UtilisateursBundle\Form\UtilisateurFormType;
use Utilisateurs\UtilisateursBundle\Form\UtilisateursType;

class UtilisateurAdminController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UtilisateursBundle:Utilisateurs')->findAll();
        $users = $this->get('knp_paginator')->paginate($entities,$this->get('request')->query->get('page', 1),6);
        return $this->render('UtilisateursBundle:Utilisateurs:index.html.twig', array(
            'users' => $users,
        ));
    }


    public function showUsersAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateurs entity.');
        }



        return $this->render('UtilisateursBundle:Utilisateurs:showuUsers.html.twig', array(
            'entity'      => $entity ));
    }


    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateurs entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UtilisateursBundle:Utilisateurs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Produits entity.
     *
     * @param Produits $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Utilisateurs $entity)
    {
        $form = $this->createForm(new UtilisateurFormType(), $entity, array(
            'action' => $this->generateUrl('adminUsers_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminUsers'));
        }

        return $this->render('UtilisateursBundle:Utilisateurs:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Produits entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UtilisateursBundle:Utilisateurs')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Utilisateurs entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminUsers'));
    }

    /**
     * Creates a form to delete a Produits entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminUsers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }

}