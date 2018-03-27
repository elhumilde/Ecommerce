<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UtilisateurFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('nom', null, array('label' => 'Login', 'translation_domain' => 'FOSUserBundle'))
           /* ->add('plainPassword', 'repeated', array(  'type' => 'password','options' => array('translation_domain' => 'FOSUserBundle'),   'first_options' => array('label' => 'form.password'),  'second_options' => array('label' => 'form.password_confirmation'), 'invalid_message' => 'fos_user.password.mismatch', ))*/
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('adresse', null, array('label' => 'Adresse', 'translation_domain' => 'FOSUserBundle'))
            ->add('telephone', null, array('label' => 'Téléphone', 'translation_domain' => 'FOSUserBundle'))
            ->add('anneeExpAvtEmb', null, array('label' => 'Année expérience evant embauche', 'translation_domain' => 'FOSUserBundle','attr' => array(   'min' => 0)))
            ->add('nbrCltAnneePrec', null, array('label' => 'Nombre client d\'année precidente', 'translation_domain' => 'FOSUserBundle','attr' => array(   'min' => 0)))
            ->add('anneeEmb', 'date', array ('widget' => 'choice','pattern' => '{{ day }}-{{ month }}-{{ year }', 'years'       => range(date('Y'), date('Y') - 30, -1)))
            ->add('profil', 'choice', array('choices'   => array('' => 'Select Profil','Responsable Equipe Commerciale' => 'Responsable Equipe Commerciale', 'Senior' => 'Senior','Junior' => 'Junior'),   'required'  => true,), array('label' => 'Profil', 'translation_domain' => 'FOSUserBundle'))
            ->add('file','file', array('required' => false))
            ->add('teleconatct',"entity", array( 'label' => false ,"class"=>"EcommerceBundle:Telecontact", "property"=>"titre",'attr'=>array('style'=>'display:none;')))
            ->add('teleconatct',"entity", array( 'label' => false ,"class"=>"EcommerceBundle:Telecontact", "property"=>"titre",'attr'=>array('style'=>'display:none;')))
            ->add('description', null, array('label' => 'Description', 'translation_domain' => 'FOSUserBundle','attr' => array('class' => 'ckeditor')))
            ->add('experiececontenu', null, array('label' => 'Description Experience', 'translation_domain' => 'FOSUserBundle' ,'attr' => array('class' => 'ckeditor')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'utilisateurs_utilisateursbundle_utilisateur';
    }
}
