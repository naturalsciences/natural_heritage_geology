<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocpolygon
 *
 * @ORM\Table(name="dlocpolygon", uniqueConstraints={@ORM\UniqueConstraint(name="dlocpolygon_unique", columns={"idcollection", "idpt", "polyarea", "polyname"})}, indexes={@ORM\Index(name="IDX_C727A7E931E4780850E3C8BA", columns={"idcollection", "idpt"}), @ORM\Index(name="IDX_C727A7E9C9A8DD1E", columns={"polyarea"})})
 * @ORM\Entity
 */
class Dlocpolygon
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocpolygon_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="polyname", type="string", nullable=false)
     */
    private $polyname = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="polydescription", type="text", nullable=true)
     */
    private $polydescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpoly", type="integer", nullable=true)
     */
    private $idpoly = '0';

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
     * @var \AppBundle\Entity\Larea
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Larea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="polyarea", referencedColumnName="polyarea")
     * })
     */
    private $polyarea;



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
     * Set polyname
     *
     * @param string $polyname
     *
     * @return Dlocpolygon
     */
    public function setPolyname($polyname)
    {
        $this->polyname = $polyname;

        return $this;
    }

    /**
     * Get polyname
     *
     * @return string
     */
    public function getPolyname()
    {
        return $this->polyname;
    }

    /**
     * Set polydescription
     *
     * @param string $polydescription
     *
     * @return Dlocpolygon
     */
    public function setPolydescription($polydescription)
    {
        $this->polydescription = $polydescription;

        return $this;
    }

    /**
     * Get polydescription
     *
     * @return string
     */
    public function getPolydescription()
    {
        return $this->polydescription;
    }

    /**
     * Set idpoly
     *
     * @param integer $idpoly
     *
     * @return Dlocpolygon
     */
    public function setIdpoly($idpoly)
    {
        $this->idpoly = $idpoly;

        return $this;
    }

    /**
     * Get idpoly
     *
     * @return integer
     */
    public function getIdpoly()
    {
        return $this->idpoly;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlocpolygon
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

    /**
     * Set polyarea
     *
     * @param \AppBundle\Entity\Larea $polyarea
     *
     * @return Dlocpolygon
     */
    public function setPolyarea(\AppBundle\Entity\Larea $polyarea = null)
    {
        $this->polyarea = $polyarea;

        return $this;
    }

    /**
     * Get polyarea
     *
     * @return \AppBundle\Entity\Larea
     */
    public function getPolyarea()
    {
        return $this->polyarea;
    }
}
