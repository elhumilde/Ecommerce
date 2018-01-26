<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('nom', null, array('label' => 'Login', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',

            ))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('adresse', null, array('label' => 'Adresse', 'translation_domain' => 'FOSUserBundle'))
            ->add('telephone', null, array('label' => 'Téléphone', 'translation_domain' => 'FOSUserBundle'))
            ->add('description', null, array('label' => 'Description', 'translation_domain' => 'FOSUserBundle'))
            ->add('anneeExpAvtEmb', null, array('label' => 'Année expérience evant embauche', 'translation_domain' => 'FOSUserBundle'))
            ->add('nbrCltAnneePrec', null, array('label' => 'Nombre client d\'année precidente', 'translation_domain' => 'FOSUserBundle'))
            ->add('profil', null, array('label' => 'Profil', 'translation_domain' => 'FOSUserBundle'))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'fos_user_registration';
    }
}
