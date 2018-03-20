<?php
namespace Utilisateurs\UtilisateursBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="Utilisateurs\UtilisateursBundle\Repository\UtilisateursRepository")
 * @ORM\Table(name="utilisateurs")
 * @ORM\HasLifecycleCallbacks
 */
class Utilisateurs extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="experiececontenu", type="text")
     */
    private $experiececontenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="anneeExpAvtEmb", type="integer")
     */
    private $anneeExpAvtEmb;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="anneeEmb", type="datetime",nullable=true)
     */
    private $anneeEmb;
    /**
     * @var integer
     *
     * @ORM\Column(name="nbrCltAnneePrec", type="integer")
     */
    private $nbrCltAnneePrec;
    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="text")
     */
    private $profil;
    /**
     * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\Client", mappedBy="utilisateurs", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;
    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Telecontact", inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $teleconatct;


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
     * @return string
     */
    public function getExperiececontenu()
    {
        return $this->experiececontenu;
    }
    /**
     * @param string $experiececontenu
     */
    public function setExperiececontenu($experiececontenu)
    {
        $this->experiececontenu = $experiececontenu;
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
     * @return \DateTime
     */
    public function getAnneeEmb()
    {
        return $this->anneeEmb;
    }
    /**
     * @param \DateTime $anneeEmb
     */
    public function setAnneeEmb($anneeEmb)
    {
        $this->anneeEmb = $anneeEmb;
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
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
    /**
     * @return mixed
     */
    public function getTeleconatct()
    {
        return $this->teleconatct;
    }
    /**
     * @param mixed $teleconatct
     */
    public function setTeleconatct($teleconatct)
    {
        $this->teleconatct = $teleconatct;
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
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $path;


    /**
     * @Assert\File(maxSize="2M", mimeTypes = {"image/jpg", "image/jpeg", "image/png", "image/gif"},
     *     mimeTypesMessage = "Merci d'envoyer un fichier au format .jpg ou .gif")
     *
     */
    public $file;
    public function getUploadRootDir()
    {
        return __dir__.'/../../../../web/uploads';
    }
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
    public function getAssetPath()
    {
        return 'uploads/'.$this->path;
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        $this->updateAt = new \DateTime();
        if (null !== $this->file)
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->file->guessExtension();
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null !== $this->file) {
            $this->file->move($this->getUploadRootDir(),$this->path);
            unset($this->file);
            if ($this->oldFile != null) unlink($this->tempFile);
        }
    }
    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFile)) unlink($this->tempFile);
    }
    public function getPath()
    {
        return $this->path;
    }
}