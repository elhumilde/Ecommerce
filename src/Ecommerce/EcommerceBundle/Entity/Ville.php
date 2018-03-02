<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity
 */
class Ville
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codeville", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeville;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=27, nullable=true)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="coderegion", type="integer", nullable=true)
     */
    private $coderegion;

    /**
     * @return int
     */
    public function getCodeville()
    {
        return $this->codeville;
    }

    /**
     * @param int $codeville
     */
    public function setCodeville($codeville)
    {
        $this->codeville = $codeville;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return int
     */
    public function getCoderegion()
    {
        return $this->coderegion;
    }

    /**
     * @param int $coderegion
     */
    public function setCoderegion($coderegion)
    {
        $this->coderegion = $coderegion;
    }


}
