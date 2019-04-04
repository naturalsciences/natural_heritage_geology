<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlochydro
 *
 * @ORM\Table(name="dlochydro", uniqueConstraints={@ORM\UniqueConstraint(name="dlochydro_unique", columns={"idcollection", "idpt", "hydroinfo", "hydroname"})}, indexes={@ORM\Index(name="IDX_A3F3E7D131E4780850E3C8BA", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dlochydro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlochydro_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="hydroinfo", type="string", nullable=false)
     */
    private $hydroinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="hydroname", type="string", nullable=false)
     */
    private $hydroname;

    /**
     * @var string
     *
     * @ORM\Column(name="tributaryof", type="string", nullable=true)
     */
    private $tributaryof;

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
     * Set hydroinfo
     *
     * @param string $hydroinfo
     *
     * @return Dlochydro
     */
    public function setHydroinfo($hydroinfo)
    {
        $this->hydroinfo = $hydroinfo;

        return $this;
    }

    /**
     * Get hydroinfo
     *
     * @return string
     */
    public function getHydroinfo()
    {
        return $this->hydroinfo;
    }

    /**
     * Set hydroname
     *
     * @param string $hydroname
     *
     * @return Dlochydro
     */
    public function setHydroname($hydroname)
    {
        $this->hydroname = $hydroname;

        return $this;
    }

    /**
     * Get hydroname
     *
     * @return string
     */
    public function getHydroname()
    {
        return $this->hydroname;
    }

    /**
     * Set tributaryof
     *
     * @param string $tributaryof
     *
     * @return Dlochydro
     */
    public function setTributaryof($tributaryof)
    {
        $this->tributaryof = $tributaryof;

        return $this;
    }

    /**
     * Get tributaryof
     *
     * @return string
     */
    public function getTributaryof()
    {
        return $this->tributaryof;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlochydro
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
