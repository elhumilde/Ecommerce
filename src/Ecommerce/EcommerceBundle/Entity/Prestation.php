<?php

namespace Ecommerce\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestation
 *
 * @ORM\Table(name="prestation")
 * @ORM\Entity
 */
class Prestation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Ecommerce\EcommerceBundle\Entity\Rubrique", inversedBy="prestation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $rubrique;

    /**
     * @var string
     *
     * @ORM\Column(name="PRESTATION", type="string", length=54, nullable=true)
     */
    private $prestation;

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
     * @return mixed
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }

    /**
     * @param mixed $rubrique
     */
    public function setRubrique($rubrique)
    {
        $this->rubrique = $rubrique;
    }

    /**
     * @return string
     */
    public function getPrestation()
    {
        return $this->prestation;
    }

    /**
     * @param string $prestation
     */
    public function setPrestation($prestation)
    {
        $this->prestation = $prestation;
    }




}
