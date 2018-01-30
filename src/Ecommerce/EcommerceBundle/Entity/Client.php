<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table("client")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\UtilisateursClientRepository")
 */
class Client
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rasion", type="string", length=20)
     */
    private $raison;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=50)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @return mixed
     */
    public function getRaison()
    {
        return $this->raison;
    }

    /**
     * @param mixed $raison
     */
    public function setRaison($raison)
    {
        $this->raison = $raison;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param int $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }



    /**
     * @ORM\OneToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="client")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateurs;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set image
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Media $image
     * @return Produits
     */
    public function setImage(\Ecommerce\EcommerceBundle\Entity\Media $image)
    {
<<<<<<< HEAD
        $this->image = $image;

=======

        $this->image = $image;


>>>>>>> 18afed96e2ea68b9d6c68006c6dde53837621bf4
    }

    /**
     * Get image
     *
<<<<<<< HEAD
     * @return \Ecommerce\EcommerceBundle\Entity\Media
     * @return string
=======

     * @return \Ecommerce\EcommerceBundle\Entity\Media

     * @return string

>>>>>>> 18afed96e2ea68b9d6c68006c6dde53837621bf4
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set utilisateurs
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs
     * @return Client
     */
    public function setUtilisateurs(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs = null)
    {
<<<<<<< HEAD
        $this->utilisateurs = $utilisateurs;
=======

        $this->utilisateurs = $utilisateurs;



>>>>>>> 18afed96e2ea68b9d6c68006c6dde53837621bf4

    }

    /**
     * Get utilisateurs
     *
<<<<<<< HEAD
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     * @return integer
=======

     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs

     * @return integer

>>>>>>> 18afed96e2ea68b9d6c68006c6dde53837621bf4
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
