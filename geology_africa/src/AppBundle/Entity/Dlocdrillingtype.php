<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocdrillingtype
 *
 * @ORM\Table(name="dlocdrillingtype", uniqueConstraints={@ORM\UniqueConstraint(name="dlocdrillingtype_unique", columns={"idcollection", "idpt", "drillingtype"})}, indexes={@ORM\Index(name="IDX_58D3FBD231E4780850E3C8BA", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dlocdrillingtype
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocdrillingtype_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="drillingtype", type="string", nullable=false)
     */
    private $drillingtype;

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
     * Set drillingtype
     *
     * @param string $drillingtype
     *
     * @return Dlocdrillingtype
     */
    public function setDrillingtype($drillingtype)
    {
        $this->drillingtype = $drillingtype;

        return $this;
    }

    /**
     * Get drillingtype
     *
     * @return string
     */
    public function getDrillingtype()
    {
        return $this->drillingtype;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlocdrillingtype
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
