<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Form\RechercheType;
use Ecommerce\EcommerceBundle\Entity\Categories;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends Controller
{
    public function budgetgestiondecontenuAction(/*Categories $categorie = null*/)
    {
        $session = $this ->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        return $this->render('EcommerceBundle:Default:produits/layout/budgetisationgestiondecontenu.html.twig', array( 'panier' => $panier));


    }

        public function budgetaffichageAction(){

            $em = $this->getDoctrine()->getManager();
            $villes = $em->getRepository('EcommerceBundle:Ville')->findAll();



            return $this->render('EcommerceBundle:Default:produits/layout/budgetisationaffichage.html.twig',array('villes'=>$villes));
        }

                                                 /*Simulation devis*/

    public function devisgestiondecontenuAction()
    {
        $session = $this ->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if ($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;
        return $this->render('EcommerceBundle:Default:produits/layout/devisgestiondecontenu.html.twig', array( 'panier' => $panier));

    }

    public function devisaffichageAction()
    {

        $em = $this->getDoctrine()->getManager();
        $villes = $em->getRepository('EcommerceBundle:Ville')->findAll();


        return $this->render('EcommerceBundle:Default:produits/layout/devisaffichage.html.twig', array('villes' => $villes));


    }

                                                                  /* ajax*/
    public function ajaxVAAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $opt1  =  $request->request->get('opt1');
        $region =  $request->request->get('region');
        $ctar =  $request->request->get('ctar');
/*        $query = $em->createQuery('SELECT t FROM  Ecommerce\EcommerceBundle\Entity\TarifInternet t WHERE t.opt1='.$opt1.' and t.ctar=.'.$ctar);
        $query->setParameter('region',$ville);
        */
         $var='rGion'.$region;
        $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.'.$var.' AS VAR','t.libelle AS L','t.libOpt1 AS LO1','t.libOpt2 AS LO2')
        ->where('t.opt1 = :op')->setParameter('op',$opt1)
        ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();
        //$var1='rGion'.$region1;
       // $query1 = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.'.$var1.' AS VAR')
           // ->where('t.opt1 = :op')->setParameter('op',$zone1)
            //->andWhere('t.ctar = :ct')->setParameter('ct',$ctar1)->getQuery()->getSingleResult();



//        return new Response(json_encode($query),200);


      $response = new JsonResponse();
        //$response1 = new JsonResponse();
     return $response->setData(array('nom' => $query));
        //return $response1->setData(array('localite' => $query1));
        /*   $result = $em->getRepository('EcommerceBundle:Prestation')->getPrestation($prestations);*/

        /*  $em = $this->getDoctrine()->getManager();
          $prestations   =  $request->request->get('rubrique');
       /*   $rubriques = $em->getRepository('EcommerceBundle:Prestation')->findBy(array("rubrique_id"=>$prestations));*/
        /*  $response = new JsonResponse();
                  $prest= $this->getDoctrine()->getRepository('EcommerceBundle:Prestation')->findBy(array('rub' => $prestations ));
          */     /*   $var=array();
            foreach ($prest as $rub){
                 $var['id'][]=$rub->getId();
                 $var['presta'][]=$rub->getPrestation();
        }*/
        /*  $prest = json_encode($prest);
    /*  $prest= json_encode($rubriques);*/
        /*    return $response->setData(array('nom' => $prest));*/
        /*$parametersAsArray = [];
        if($content = $request ->getContent()){
            $parametersAsArray = json_decode($content,true);
        }*/
    }

    public function ajaxTAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ctar =  $request->request->get('ctar');
        $opt1 =  $request->request->get('opt1');

       $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.rGion1 AS T','t.libelle AS L','t.libOpt1 AS LO1')
       ->where('t.opt1 = :op')->setParameter('op',  $opt1)
       ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();

        $response = new JsonResponse();
        return $response->setData(array('nom' => $query));

    }
    /*
    public function ajaxPJAction(Request $request)
   {
       $em = $this->getDoctrine()->getManager();
       $ctar =  $request->request->get('ctar');
       $opt1 =  $request->request->get('opt1');

       $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.rGion1 AS PJ')
           ->where('t.opt1 = :op')->setParameter('op',  $opt1)
           ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();
       $response = new JsonResponse();
       return $response->setData(array('nom' => $query));

   }
   /*
   pufunction ajaxEPAction(Request $request)
   {
       $em = $this->getDoctrine()->getManager();
       $ctar =  $request->request->get('ctar');
       $opt1 =  $request->request->get('opt1');

       $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.rGion1 AS EP')
           ->where('t.opt1 = :op')->setParameter('op',  $opt1)
           ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();

       $response = new JsonResponse();
       return $response->setData(array('nom' => $query));

   }

   public function ajaxHBAction(Request $request)
   {
       $em = $this->getDoctrine()->getManager();
       $ctar =  $request->request->get('ctar');
       $opt1 =  $request->request->get('opt1');

       $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.rGion1 AS HB')
           ->where('t.opt1 = :op')->setParameter('op',  $opt1)
           ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();

       $response = new JsonResponse();
       return $response->setData(array('nom' => $query));

   }*/





}
