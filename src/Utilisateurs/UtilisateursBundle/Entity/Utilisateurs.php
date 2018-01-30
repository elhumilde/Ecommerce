<?php
namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\UtilisateursRepository")
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="anneeExpAvtEmb", type="integer")
     */
    private $anneeExpAvtEmb;



    /**
     * @var integer
     *
     * @ORM\Column(name="nbrCltAnneePrec", type="integer")
     */
    private $nbrCltAnneePrec;
    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=20)
     */
    private $profil;



    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\UtilisateursClient", mappedBy="utilisateurs", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $photoclient;

    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\Client", mappedBy="utilisateurs", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;


     /**
     *
     * Get id
     *
     * @return integer
     */
        public function getId()
        {
            return $this->id;
        }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getAnneeExpAvtEmb()
    {
        return $this->anneeExpAvtEmb;
    }

    /**
     * @param int $anneeExpAvtEmb
     */
    public function setAnneeExpAvtEmb($anneeExpAvtEmb)
    {
        $this->anneeExpAvtEmb = $anneeExpAvtEmb;
    }


    /**
     * @return int
     */
    public function getNbrCltAnneePrec()
    {
        return $this->nbrCltAnneePrec;
    }

    /**
     * @param int $nbrCltAnneePrec
     */
    public function setNbrCltAnneePrec($nbrCltAnneePrec)
    {
        $this->nbrCltAnneePrec = $nbrCltAnneePrec;
    }

    /**
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param string $profil
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    }



    /**
     * Add photoclient
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursClient $photoclient
     * @return Utilisateurs
     */
    public function addPhotoclient(\Ecommerce\EcommerceBundle\Entity\UtilisateursClient $photoclient)
    {
        $this->photoclient[] = $photoclient;

        return $this;
    }

    /**
     * Remove photoclient
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursClient $photoclient
     */
    public function removePhotoclient(\Ecommerce\EcommerceBundle\Entity\UtilisateursClient $photoclient)
    {
        $this->photoclient->removeElement($photoclient);
    }

    /**
     * Get photoclient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotoclient()
    {
        return $this->photoclient;
    }


    /**
     * Add photoclient
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursClient $client
     * @return Utilisateurs
     */
    public function addClient(\Ecommerce\EcommerceBundle\Entity\UtilisateursClient $client)
    {
        $this->photoclient[] = $client;

        return $this;
    }

    /**
     * Remove photoclient
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursClient $photoclient
     */
    public function removeClient(\Ecommerce\EcommerceBundle\Entity\UtilisateursClient $client)
    {
        $this->photoclient->removeElement($client);
    }

    /**
     * Get photoclient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClient()
    {
        return $this->Client;
    }

}
