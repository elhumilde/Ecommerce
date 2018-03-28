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

          if ($i==0)
              {
               $var[0]['rubrique']= $request->request->get('sel');

              $prestastion='';
              if (!empty($request->request->get('prest'))){
              foreach ($request->request->get('prest') as $names)
              {
                  if(empty($prestastion)){
                  $prestastion .=$names ;
              }
                  else{
                      $prestastion .=','.$names ;

                  }
              }
              }

            $var[0]['prestation']=$prestastion;
               }
          else{
                $var[$i]['rubrique']= $request->request->get('sel'.$i);

                $presta='';
                if (!empty($request->request->get('prest'.$i))){
                foreach ($request->request->get('prest'.$i) as $namess)
                {

                    if(empty($presta)){

                        $presta .=$namess ;

                    }
                    else{
                        $presta .=','.$namess ;

                    }
                }
                }


                $var[$i]['prestation']=$presta;

            }
        }
        $mub= array();
        for ($j = 0; $j <= $m_count; $j++) {

            if ($j==0){
                $mub[0]['marque']= $request->request->get('marque');
            }
            else{
                $mub[$j]['marque']= $request->request->get('marque'.$j);

            }

        }


        $result =array('rubrique'=>$var,'r_count'=>$r_count,'m_count'=> $m_count,'marque'=>$mub,'activite'=>$activite ,'rub_sup'=> $sup,'villes'=>$villes,'regions'=>$regions,'villes_sup'=>$villes_sup,'regions_sup'=>$regions_sup);

        $this->get('session')->set('referencement', $result);

        return new Response(json_encode($result), 200);


    }


    public function contenuAction(Request $request)
    {

        $catalogue = $request->request->get('catalogue');
        $catalogue_ref = $request->request->get('catalogue_ref');
        $video = $request->request->get('video');
        $page = $request->request->get('page');
        $site_web = $request->request->get('site_web');

        $result =array('catalogue'=>$catalogue,'catalogue_ref'=>$catalogue_ref,'video'=> $video,'page'=>$page,'site_web'=>$site_web);

        $this->get('session')->set('contenu', $result);

        return new Response(json_encode($result), 200);


    }


    public function affichageAction(Request $request)
    {

        $villes = $request->request->get('villes');

        $regions = $request->request->get('regions');

        $cat1 = $request->request->get('cat1');
        $cat2 = $request->request->get('cat2');
        $cat3 = $request->request->get('cat3');
        $cat4 = $request->request->get('cat4');

        $pro_du_jour = $request->request->get('pro_du_jour');
        $promo = $request->request->get('promo');

        $vignette_acc_video_nbr = $request->request->get('nbr1');
        $vign_ac = $request->request->get('vign_ac');
        $habil = $request->request->get('habil');


        $banniere_nombr = $request->request->get('nombre');

        $bann_up_engin = $request->request->get('bann_up_engin');
        $bann_down_engin = $request->request->get('bann_down_engin');
        $bann_up_customer = $request->request->get('bann_up_customer');
        $bann_down_customer = $request->request->get('bann_down_customer');


        $result =array(
            'villes'=>$villes,
            'regions'=>$regions,
            'cat1'=>  $cat1,
            'cat2'=>  $cat2,
            'cat3'=>  $cat3,
            'cat4'=>    $cat4,
            'pro_du_jour' => $pro_du_jour,
            'promo'  => $promo,
            'vignette_acc_video_nbr'=>$vignette_acc_video_nbr,
            'vign_ac' => $vign_ac,
            'habil'   => $habil,
            'banniere_nombr' =>$banniere_nombr,
            'bann_up_engin' =>$bann_up_engin,
            'bann_down_engin' =>$bann_down_engin,
            'bann_up_customer' =>$bann_up_customer,
            'bann_down_customer'=>$bann_down_customer,




            );

        $this->get('session')->set('affichage', $result);

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
    public function gettingAction()
    {
     $var=   $this->get('session')->get('referencement');
     $contenu=   $this->get('session')->get('contenu');
     $affichage=   $this->get('session')->get('affichage');
    var_dump($var);
        echo '<br/>';
    var_dump($contenu);

        echo '<br/>';
    var_dump($affichage);

        die('here');


    }

    public function setCommandeAction()
    {
        $session = $this->getRequest()->getSession();



    }







}

