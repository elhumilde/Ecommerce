<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Form\RechercheType;
use Ecommerce\EcommerceBundle\Entity\Categories;

class ProduitsController extends Controller
{
    public function produitsAction(Categories $categorie = null)
    {
        $session = $this ->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

            $findProduits = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        
        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;

        $produits = $this->get('knp_paginator')->paginate($findProduits,$this->get('request')->query->get('page', 1),6);

        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits,
                                                                                                        'panier' => $panier));
    }

    public function presentationAction($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        if (!$produit) throw $this->createNotFoundException('La page n\'existe pas.');

        // produit qui existe deja en panier on px pas le rajouter

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;


        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig', array('produit' => $produit,
                                                                                                            'panier' => $panier));
    }
    
    public function rechercheAction() 
    {
        $form = $this->createForm(new RechercheType());
        return $this->render('EcommerceBundle:Default:Recherche/modulesUsed/recherche.html.twig', array('form' => $form->createView()));
    }
    
    public function rechercheTraitementAction() 
    {
        $form = $this->createForm(new RechercheType());
        
        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $produits = $em->getRepository('EcommerceBundle:Produits')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }
        
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }
}