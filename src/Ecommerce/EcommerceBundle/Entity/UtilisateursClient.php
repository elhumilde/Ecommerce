<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateursClient
 *
 * @ORM\Table("utilisateursclient")
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\UtilisateursClientRepository")
 */
class UtilisateursClient
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
     * @ORM\OneToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", inversedBy="photoclient")
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
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Ecommerce\EcommerceBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set utilisateurs
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs
     * @return UtilisateursClient
     */
    public function setUtilisateurs(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
