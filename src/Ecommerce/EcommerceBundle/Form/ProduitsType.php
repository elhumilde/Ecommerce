<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Ecommerce\EcommerceBundle\Form\ClientType;

class ProduitsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code_prod')
            ->add('nom')
            ->add('description')
            ->add('prix')
<<<<<<< HEAD

            ->add('image', new MediaType())
            ->add('categorie')

        ;
=======
            ->add('disponible')
            ->add('image', new MediaType(),array('label'=> 'Image Produit'))
            ->add('categorie', 'entity', array(
                'class'    => 'EcommerceBundle:Categories', 'property' => 'nomcategorie', 'empty_value' => '- sélectionner une Categories -','label'    => 'Categorie Produit  ',  ))
                 ;



>>>>>>> 0d140e8403f4d0adf984ce8537b9fe029928ebe8
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\Produits'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ecommerce_ecommercebundle_produits';
    }
}
