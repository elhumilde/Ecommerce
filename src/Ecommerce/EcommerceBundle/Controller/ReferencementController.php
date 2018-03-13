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

        if (!$session->has('referencement')) $session->set('referencement', array());

        $villes = $em->getRepository('EcommerceBundle:ville')->findBy(array(), array('libelle' => 'asc'));

        $entities = $em->getRepository('EcommerceBundle:region')->findAll();

        return $this->render('EcommerceBundle:Default:referencement/modulesUsed/referencement.html.twig',
            array('entities' => $entities,
                'villes' => $villes,
                'referencement' => $session->get('referencement')
            ));


    }


    public function referencementdevisAction()
    {

        $session = $this->getRequest()->getSession();

        if (!$session->has('referencement')) $session->set('referencement',array());
        $referencement = $session->get('referencement');

        $em = $this->getDoctrine()->getManager();


        $rubriques = $em->getRepository('EcommerceBundle:Rubrique')->findAll();
        $villes = $em->getRepository('EcommerceBundle:ville')->findAll();
        $entities = $em->getRepository('EcommerceBundle:region')->findAll();

        $session->set('referencement',$referencement);
        return $this->render('EcommerceBundle:Default:referencement/modulesUsed/referencementdevis.html.twig', array('rubriques' => $rubriques,
            'entities' => $entities,
            'villes' => $villes,

        ));

    }

    public function ajaxAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $prestations = $request->request->get('rubrique');

        $query = $em->createQuery('SELECT p FROM Ecommerce\EcommerceBundle\Entity\Prestation p WHERE p.rub=:rub');
        $query->setParameter('rub', $prestations);
        $result = $query->getArrayResult();


        return new Response(json_encode($result), 200);


    }


    public function ajaxRefAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ville  =  $request->request->get('ville');
        $opt1  =  $request->request->get('opt1');
        $region =  $request->request->get('region');
        $ctar =  $request->request->get('ctar');


        $var='rGion'.$region;
        $query = $em->getRepository('EcommerceBundle:TarifInternet')->createQueryBuilder('t')->select('t.'.$var.' AS VAR')
            ->where('t.opt1 = :op')->setParameter('op',$opt1)
            ->andWhere('t.ctar = :ct')->setParameter('ct',$ctar)->getQuery()->getSingleResult();




        $response = new JsonResponse();
        return $response->setData(array('nom' => $query));


    }

    public function setCommandeAction()
    {
        $session = $this->getRequest()->getSession();



    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 02ae301280438178e8b1c2afd1fbd4fdaebdedf2
