<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telecontact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ecommerce\EcommerceBundle\Repository\TelecontactRepository")
 */
class Telecontact
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
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=50)
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="description1", type="text")
     */
    private $description1;

    /**
     * @var string
     *
     * @ORM\Column(name="description2", type="text")
     */
    private $description2;

    /**
     * @var string
     *
     * @ORM\Column(name="descripton3", type="text")
     */
    private $description3;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience;

    /**
     * @ORM\OneToMany(targetEntity="Utilisateurs\UtilisateursBundle\Entity\Utilisateurs", mappedBy="teleconatct", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateurs;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Telecontact
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set profil
     *
     * @param string $profil
     * @return Telecontact
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    
        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set description1
     *
     * @param string $description1
     * @return Telecontact
     */
    public function setDescription1($description1)
    {
        $this->description1 = $description1;
    
        return $this;
    }

    /**
     * Get description1
     *
     * @return string 
     */
    public function getDescription1()
    {
        return $this->description1;
    }

    /**
     * Set description2
     *
     * @param string $description2
     * @return Telecontact
     */
    public function setDescription2($description2)
    {
        $this->description2 = $description2;
    
        return $this;
    }

    /**
     * Get description2
     *
     * @return string 
     */
    public function getDescription2()
    {
        return $this->description2;
    }

    /**
     * @return string
     */
    public function getDescription3()
    {
        return $this->description3;
    }

    /**
     * @param string $description3
     */
    public function setDescription3($description3)
    {
        $this->description3 = $description3;
    }



    /**
     * Set experience
     *
     * @param integer $experience
     * @return Telecontact
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    
        return $this;
    }

    /**
     * Get experience
     *
     * @return integer 
     */
    public function getExperience()
    {
        return $this->experience;
    }





    /**
     * @var \DateTime
     *
     * @ORM\COlumn(name="updated_at",type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\PostLoad()
     */
    public function postLoad()
    {
        $this->updateAt = new \DateTime();
    }
}
