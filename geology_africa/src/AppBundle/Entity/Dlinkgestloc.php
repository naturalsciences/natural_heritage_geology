<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkgestloc
 *
 * @ORM\Table(name="dlinkgestloc", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkgestloc_unique", columns={"idgestion", "idcollection", "idpt"})}, indexes={@ORM\Index(name="IDX_589681E31E4780850E3C8BA", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dlinkgestloc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkgestloc_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idgestion", type="integer", nullable=false)
     */
    private $idgestion;

    /**
     * @var \AppBundle\Entity\Dloccenter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dloccenter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idpt", referencedColumnName="idpt")
     * })
     */
    private $idcollection;



    /**
     * Get pk
     *
     * @return integer
     */
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return Dlinkgestloc
     */
    public function setIdgestion($idgestion)
    {
        $this->idgestion = $idgestion;

        return $this;
    }

    /**
     * Get idgestion
     *
     * @return integer
     */
    public function getIdgestion()
    {
        return $this->idgestion;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlinkgestloc
     */
    public function setIdcollection(\AppBundle\Entity\Dloccenter $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Dloccenter
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
