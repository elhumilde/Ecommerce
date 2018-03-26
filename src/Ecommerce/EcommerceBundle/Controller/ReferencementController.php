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

        $villes = $em->getRepository('EcommerceBundle:Ville')->findBy(array(), array('libelle' => 'asc'));

        $entities = $em->getRepository('EcommerceBundle:Region')->findAll();

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
        $villes = $em->getRepository('EcommerceBundle:Ville')->findAll();
        $entities = $em->getRepository('EcommerceBundle:Region')->findAll();

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

    public function refcomAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $marque = $request->request->get('marque');
        $rubrique = $request->request->get('sel');
        $prest = $request->request->get('prest');
        $activite = $request->request->get('activite');
        $sup = $request->request->get('sup');
        $villes = $request->request->get('villes');
        $regions = $request->request->get('regions');
        $villes_sup = $request->request->get('chk2');
        $regions_sup = $request->request->get('chk1');

        $r_count = $request->request->get('r_count');
        $m_count = $request->request->get('m_count');

        $var=array();
        for ($i = 0; $i <= $r_count; $i++) {

          if ($i==0){
            $var[0]['rubrique']= $rubrique = $request->request->get('sel');
            $var[0]['prestation']= $prest = $request->request->get('prest');
          }
            else{
                $var[$i]['rubrique']= $rubrique = $request->request->get('sel'.$i);
                $var[$i]['prestation']= $prest = $request->request->get('prest'.$i);

            }
        }
        $mub=array();
        for ($j = 0; $j <= $m_count; $j++) {

            if ($j==0){
                $mub[0]['marque']= $rubrique = $request->request->get('marque');
            }
            else{
                $mub[$j]['marque']= $rubrique = $request->request->get('marque'.$j);

            }

        }


        $result =array('rubrique'=>$var,'r_count'=>$r_count,'m_count'=> $m_count,'marque'=>$mub,'activite'=>$activite ,'rub_sup'=> $sup,'villes'=>$villes,'regions'=>$regions,'villes_sup'=>$villes_sup,'regions_sup'=>$regions_sup);

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
>>>>>>> 1238199c9c0f4a5cd0e77896ddd0e9037b1d2f10
