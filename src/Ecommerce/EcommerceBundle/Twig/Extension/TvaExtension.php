<?php
namespace Ecommerce\EcommerceBundle\Twig\Extension;

class TvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('tva', array($this,'calculTva')));
        //je nomme le filte que l'on va utilisé dans twig
        //on associe la methode calculTVA
    }

    function calculTva($prixHT,$tva) //definiction de la methode du filtre tva
    {
        $prixTTC= round(($prixHT * 0.2),2);
        // calcul de la tva

        return $prixTTC;
    }

    public function getName()
    {
        return 'tva_extension';
    }
}