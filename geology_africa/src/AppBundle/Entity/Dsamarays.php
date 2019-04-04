<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsamarays
 *
 * @ORM\Table(name="dsamarays", uniqueConstraints={@ORM\UniqueConstraint(name="dsamarays_idcollection_unique", columns={"idcollection"}), @ORM\UniqueConstraint(name="DSamARays_IDCollection_key", columns={"idcollection"}), @ORM\UniqueConstraint(name="dsamarays_unique", columns={"idsample", "idcollection"})}, indexes={@ORM\Index(name="IDX_47727C6431E4780895B6DB6F", columns={"idcollection", "idsample"})})
 * @ORM\Entity
 */
class Dsamarays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsamarays_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="alpharay", type="string", nullable=true)
     */
    private $alpharay;

    /**
     * @var string
     *
     * @ORM\Column(name="betaray", type="string", nullable=true)
     */
    private $betaray;

    /**
     * @var string
     *
     * @ORM\Column(name="gammaray", type="string", nullable=true)
     */
    private $gammaray;

    /**
     * @var string
     *
     * @ORM\Column(name="xray", type="string", nullable=true)
     */
    private $xray;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idsample", referencedColumnName="idsample")
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
     * Set alpharay
     *
     * @param string $alpharay
     *
     * @return Dsamarays
     */
    public function setAlpharay($alpharay)
    {
        $this->alpharay = $alpharay;

        return $this;
    }

    /**
     * Get alpharay
     *
     * @return string
     */
    public function getAlpharay()
    {
        return $this->alpharay;
    }

    /**
     * Set betaray
     *
     * @param string $betaray
     *
     * @return Dsamarays
     */
    public function setBetaray($betaray)
    {
        $this->betaray = $betaray;

        return $this;
    }

    /**
     * Get betaray
     *
     * @return string
     */
    public function getBetaray()
    {
        return $this->betaray;
    }

    /**
     * Set gammaray
     *
     * @param string $gammaray
     *
     * @return Dsamarays
     */
    public function setGammaray($gammaray)
    {
        $this->gammaray = $gammaray;

        return $this;
    }

    /**
     * Get gammaray
     *
     * @return string
     */
    public function getGammaray()
    {
        return $this->gammaray;
    }

    /**
     * Set xray
     *
     * @param string $xray
     *
     * @return Dsamarays
     */
    public function setXray($xray)
    {
        $this->xray = $xray;

        return $this;
    }

    /**
     * Get xray
     *
     * @return string
     */
    public function getXray()
    {
        return $this->xray;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dsamarays
     */
    public function setIdcollection(\AppBundle\Entity\Dsample $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Dsample
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
