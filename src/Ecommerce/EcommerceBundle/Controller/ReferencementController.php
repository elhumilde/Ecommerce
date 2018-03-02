<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Prestation;
use Ecommerce\EcommerceBundle\Form\ReferencementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\MobileVille;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ReferencementController extends Controller
{

    public function referencementAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if(!$session->has('referencement')) $session->set('referencement',array());

        $villes = $em->getRepository('EcommerceBundle:ville')->findAll();

       $entities = $em->getRepository('EcommerceBundle:region')->findAll();

        return $this->render('EcommerceBundle:Default:referencement/modulesUsed/referencement.html.twig',
          array(  'entities' => $entities,
              'villes' => $villes,
              'referencement'=>$session->get('referencement')
        ));


    }


    public function referencementdevisAction()
    {

        $em = $this->getDoctrine()->getManager();



        $rubriques = $em->getRepository('EcommerceBundle:Rubrique')->findAll();
        $villes = $em->getRepository('EcommerceBundle:ville')->findAll();
        $entities = $em->getRepository('EcommerceBundle:region')->findAll();


        return $this->render('EcommerceBundle:Default:referencement/modulesUsed/referencementdevis.html.twig',  array(  'rubriques' => $rubriques,
            'entities' => $entities,
            'villes' => $villes,

            ));
    }
        public function ajaxAction(Request $request)
        {

            $em = $this->getDoctrine()->getManager();
            $prestations   =  $request->request->get('rubrique');

            $query = $em->createQuery('SELECT p FROM Ecommerce\EcommerceBundle\Entity\Prestation p WHERE p.rub=:rub');
            $query->setParameter('rub',$prestations);
            $result = $query->getArrayResult();

         /*   $result = $em->getRepository('EcommerceBundle:Prestation')->getPrestation($prestations);*/


            return new Response(json_encode($result),200);



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
}
