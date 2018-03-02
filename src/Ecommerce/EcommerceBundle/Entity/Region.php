<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="coderegion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderegion;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=29, nullable=true)
     */
    private $libelle;

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


}
