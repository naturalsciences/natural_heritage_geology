<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsamheavymin
 *
 * @ORM\Table(name="dsamheavymin", uniqueConstraints={@ORM\UniqueConstraint(name="dsamheavymin_unique", columns={"idcollection", "idsample"})})
 * @ORM\Entity
 */
class Dsamheavymin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsamheavymin_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var float
     *
     * @ORM\Column(name="weighthm", type="float", precision=10, scale=0, nullable=true)
     */
    private $weighthm;

    /**
     * @var float
     *
     * @ORM\Column(name="weightsample", type="float", precision=10, scale=0, nullable=true)
     */
    private $weightsample;

    /**
     * @var string
     *
     * @ORM\Column(name="observationhm", type="string", nullable=true)
     */
    private $observationhm;

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
     * Set weighthm
     *
     * @param float $weighthm
     *
     * @return Dsamheavymin
     */
    public function setWeighthm($weighthm)
    {
        $this->weighthm = $weighthm;

        return $this;
    }

    /**
     * Get weighthm
     *
     * @return float
     */
    public function getWeighthm()
    {
        return $this->weighthm;
    }

    /**
     * Set weightsample
     *
     * @param float $weightsample
     *
     * @return Dsamheavymin
     */
    public function setWeightsample($weightsample)
    {
        $this->weightsample = $weightsample;

        return $this;
    }

    /**
     * Get weightsample
     *
     * @return float
     */
    public function getWeightsample()
    {
        return $this->weightsample;
    }

    /**
     * Set observationhm
     *
     * @param string $observationhm
     *
     * @return Dsamheavymin
     */
    public function setObservationhm($observationhm)
    {
        $this->observationhm = $observationhm;

        return $this;
    }

    /**
     * Get observationhm
     *
     * @return string
     */
    public function getObservationhm()
    {
        return $this->observationhm;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dsamheavymin
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
