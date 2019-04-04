<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsammagsusc
 *
 * @ORM\Table(name="dsammagsusc", uniqueConstraints={@ORM\UniqueConstraint(name="dsammagsusc_unique", columns={"idcollection", "idsample"})})
 * @ORM\Entity
 */
class Dsammagsusc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsammagsusc_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=true)
     */
    private $weight;

    /**
     * @var integer
     *
     * @ORM\Column(name="exponent", type="integer", nullable=true)
     */
    private $exponent = '-6';

    /**
     * @var float
     *
     * @ORM\Column(name="mesure1", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure1;

    /**
     * @var float
     *
     * @ORM\Column(name="mesure2", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure2;

    /**
     * @var float
     *
     * @ORM\Column(name="mesure3", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure3;

    /**
     * @var float
     *
     * @ORM\Column(name="mesure4", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure4;

    /**
     * @var float
     *
     * @ORM\Column(name="mesure5", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure5;

    /**
     * @var float
     *
     * @ORM\Column(name="mesure6", type="float", precision=10, scale=0, nullable=true)
     */
    private $mesure6;

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
     * Set weight
     *
     * @param float $weight
     *
     * @return Dsammagsusc
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set exponent
     *
     * @param integer $exponent
     *
     * @return Dsammagsusc
     */
    public function setExponent($exponent)
    {
        $this->exponent = $exponent;

        return $this;
    }

    /**
     * Get exponent
     *
     * @return integer
     */
    public function getExponent()
    {
        return $this->exponent;
    }

    /**
     * Set mesure1
     *
     * @param float $mesure1
     *
     * @return Dsammagsusc
     */
    public function setMesure1($mesure1)
    {
        $this->mesure1 = $mesure1;

        return $this;
    }

    /**
     * Get mesure1
     *
     * @return float
     */
    public function getMesure1()
    {
        return $this->mesure1;
    }

    /**
     * Set mesure2
     *
     * @param float $mesure2
     *
     * @return Dsammagsusc
     */
    public function setMesure2($mesure2)
    {
        $this->mesure2 = $mesure2;

        return $this;
    }

    /**
     * Get mesure2
     *
     * @return float
     */
    public function getMesure2()
    {
        return $this->mesure2;
    }

    /**
     * Set mesure3
     *
     * @param float $mesure3
     *
     * @return Dsammagsusc
     */
    public function setMesure3($mesure3)
    {
        $this->mesure3 = $mesure3;

        return $this;
    }

    /**
     * Get mesure3
     *
     * @return float
     */
    public function getMesure3()
    {
        return $this->mesure3;
    }

    /**
     * Set mesure4
     *
     * @param float $mesure4
     *
     * @return Dsammagsusc
     */
    public function setMesure4($mesure4)
    {
        $this->mesure4 = $mesure4;

        return $this;
    }

    /**
     * Get mesure4
     *
     * @return float
     */
    public function getMesure4()
    {
        return $this->mesure4;
    }

    /**
     * Set mesure5
     *
     * @param float $mesure5
     *
     * @return Dsammagsusc
     */
    public function setMesure5($mesure5)
    {
        $this->mesure5 = $mesure5;

        return $this;
    }

    /**
     * Get mesure5
     *
     * @return float
     */
    public function getMesure5()
    {
        return $this->mesure5;
    }

    /**
     * Set mesure6
     *
     * @param float $mesure6
     *
     * @return Dsammagsusc
     */
    public function setMesure6($mesure6)
    {
        $this->mesure6 = $mesure6;

        return $this;
    }

    /**
     * Get mesure6
     *
     * @return float
     */
    public function getMesure6()
    {
        return $this->mesure6;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dsammagsusc
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
