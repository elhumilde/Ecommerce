<?php
namespace Ecommerce\EcommerceBundle\Twig\Extension;

class MontantTvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('montantTva', array($this,'montantTva')));
    }

    function montantTva($prixHT,$prixTTC)
    {
        return round(($prixTTC - $prixHT),2);
        //calcul le montant de la tva a rajouter sur le prix HT
    }

    public function getName()
    {
        return 'montant_tva_extension';
    }
}