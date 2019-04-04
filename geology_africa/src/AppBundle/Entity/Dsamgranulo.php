<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsamgranulo
 *
 * @ORM\Table(name="dsamgranulo", uniqueConstraints={@ORM\UniqueConstraint(name="dsamgranulo_unique", columns={"idcollection", "idsample"})})
 * @ORM\Entity
 */
class Dsamgranulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsamgranulo_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var float
     *
     * @ORM\Column(name="weighttot", type="float", precision=10, scale=0, nullable=true)
     */
    private $weighttot;

    /**
     * @var float
     *
     * @ORM\Column(name="weightsand", type="float", precision=10, scale=0, nullable=true)
     */
    private $weightsand = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="w_above_2000", type="float", precision=10, scale=0, nullable=true)
     */
    private $wAbove2000;

    /**
     * @var float
     *
     * @ORM\Column(name="w_2000", type="float", precision=10, scale=0, nullable=true)
     */
    private $w2000;

    /**
     * @var float
     *
     * @ORM\Column(name="w_1400", type="float", precision=10, scale=0, nullable=true)
     */
    private $w1400;

    /**
     * @var float
     *
     * @ORM\Column(name="w_1000", type="float", precision=10, scale=0, nullable=true)
     */
    private $w1000;

    /**
     * @var float
     *
     * @ORM\Column(name="w_710", type="float", precision=10, scale=0, nullable=true)
     */
    private $w710;

    /**
     * @var float
     *
     * @ORM\Column(name="w_500", type="float", precision=10, scale=0, nullable=true)
     */
    private $w500;

    /**
     * @var float
     *
     * @ORM\Column(name="w_355", type="float", precision=10, scale=0, nullable=true)
     */
    private $w355;

    /**
     * @var float
     *
     * @ORM\Column(name="w_250", type="float", precision=10, scale=0, nullable=true)
     */
    private $w250;

    /**
     * @var float
     *
     * @ORM\Column(name="w_180", type="float", precision=10, scale=0, nullable=true)
     */
    private $w180;

    /**
     * @var float
     *
     * @ORM\Column(name="w_125", type="float", precision=10, scale=0, nullable=true)
     */
    private $w125;

    /**
     * @var float
     *
     * @ORM\Column(name="w_90", type="float", precision=10, scale=0, nullable=true)
     */
    private $w90;

    /**
     * @var float
     *
     * @ORM\Column(name="w_63", type="float", precision=10, scale=0, nullable=true)
     */
    private $w63;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="pc", type="float", precision=10, scale=0, nullable=true)
     */
    private $pc;

    /**
     * @var float
     *
     * @ORM\Column(name="pccum", type="float", precision=10, scale=0, nullable=true)
     */
    private $pccum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     * })
     */
    private $idcollection;

	/**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idsample", referencedColumnName="idsample")
     * })
     */
    private $idsample;


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
     * Set weighttot
     *
     * @param float $weighttot
     *
     * @return Dsamgranulo
     */
    public function setWeighttot($weighttot)
    {
        $this->weighttot = $weighttot;

        return $this;
    }

    /**
     * Get weighttot
     *
     * @return float
     */
    public function getWeighttot()
    {
        return $this->weighttot;
    }

    /**
     * Set weightsand
     *
     * @param float $weightsand
     *
     * @return Dsamgranulo
     */
    public function setWeightsand($weightsand)
    {
        $this->weightsand = $weightsand;

        return $this;
    }

    /**
     * Get weightsand
     *
     * @return float
     */
    public function getWeightsand()
    {
        return $this->weightsand;
    }

    /**
     * Set wAbove2000
     *
     * @param float $wAbove2000
     *
     * @return Dsamgranulo
     */
    public function setWAbove2000($wAbove2000)
    {
        $this->wAbove2000 = $wAbove2000;

        return $this;
    }

    /**
     * Get wAbove2000
     *
     * @return float
     */
    public function getWAbove2000()
    {
        return $this->wAbove2000;
    }

    /**
     * Set w2000
     *
     * @param float $w2000
     *
     * @return Dsamgranulo
     */
    public function setW2000($w2000)
    {
        $this->w2000 = $w2000;

        return $this;
    }

    /**
     * Get w2000
     *
     * @return float
     */
    public function getW2000()
    {
        return $this->w2000;
    }

    /**
     * Set w1400
     *
     * @param float $w1400
     *
     * @return Dsamgranulo
     */
    public function setW1400($w1400)
    {
        $this->w1400 = $w1400;

        return $this;
    }

    /**
     * Get w1400
     *
     * @return float
     */
    public function getW1400()
    {
        return $this->w1400;
    }

    /**
     * Set w1000
     *
     * @param float $w1000
     *
     * @return Dsamgranulo
     */
    public function setW1000($w1000)
    {
        $this->w1000 = $w1000;

        return $this;
    }

    /**
     * Get w1000
     *
     * @return float
     */
    public function getW1000()
    {
        return $this->w1000;
    }

    /**
     * Set w710
     *
     * @param float $w710
     *
     * @return Dsamgranulo
     */
    public function setW710($w710)
    {
        $this->w710 = $w710;

        return $this;
    }

    /**
     * Get w710
     *
     * @return float
     */
    public function getW710()
    {
        return $this->w710;
    }

    /**
     * Set w500
     *
     * @param float $w500
     *
     * @return Dsamgranulo
     */
    public function setW500($w500)
    {
        $this->w500 = $w500;

        return $this;
    }

    /**
     * Get w500
     *
     * @return float
     */
    public function getW500()
    {
        return $this->w500;
    }

    /**
     * Set w355
     *
     * @param float $w355
     *
     * @return Dsamgranulo
     */
    public function setW355($w355)
    {
        $this->w355 = $w355;

        return $this;
    }

    /**
     * Get w355
     *
     * @return float
     */
    public function getW355()
    {
        return $this->w355;
    }

    /**
     * Set w250
     *
     * @param float $w250
     *
     * @return Dsamgranulo
     */
    public function setW250($w250)
    {
        $this->w250 = $w250;

        return $this;
    }

    /**
     * Get w250
     *
     * @return float
     */
    public function getW250()
    {
        return $this->w250;
    }

    /**
     * Set w180
     *
     * @param float $w180
     *
     * @return Dsamgranulo
     */
    public function setW180($w180)
    {
        $this->w180 = $w180;

        return $this;
    }

    /**
     * Get w180
     *
     * @return float
     */
    public function getW180()
    {
        return $this->w180;
    }

    /**
     * Set w125
     *
     * @param float $w125
     *
     * @return Dsamgranulo
     */
    public function setW125($w125)
    {
        $this->w125 = $w125;

        return $this;
    }

    /**
     * Get w125
     *
     * @return float
     */
    public function getW125()
    {
        return $this->w125;
    }

    /**
     * Set w90
     *
     * @param float $w90
     *
     * @return Dsamgranulo
     */
    public function setW90($w90)
    {
        $this->w90 = $w90;

        return $this;
    }

    /**
     * Get w90
     *
     * @return float
     */
    public function getW90()
    {
        return $this->w90;
    }

    /**
     * Set w63
     *
     * @param float $w63
     *
     * @return Dsamgranulo
     */
    public function setW63($w63)
    {
        $this->w63 = $w63;

        return $this;
    }

    /**
     * Get w63
     *
     * @return float
     */
    public function getW63()
    {
        return $this->w63;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Dsamgranulo
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pc
     *
     * @param float $pc
     *
     * @return Dsamgranulo
     */
    public function setPc($pc)
    {
        $this->pc = $pc;

        return $this;
    }

    /**
     * Get pc
     *
     * @return float
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * Set pccum
     *
     * @param float $pccum
     *
     * @return Dsamgranulo
     */
    public function setPccum($pccum)
    {
        $this->pccum = $pccum;

        return $this;
    }

    /**
     * Get pccum
     *
     * @return float
     */
    public function getPccum()
    {
        return $this->pccum;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Dsamgranulo
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dsamgranulo
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
