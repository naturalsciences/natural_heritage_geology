<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocdrilling
 *
 * @ORM\Table(name="dlocdrilling", uniqueConstraints={@ORM\UniqueConstraint(name="dlocdrilling_unique", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dlocdrilling
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocdrilling_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="drilling", type="string", nullable=true)
     */
    private $drilling = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="diameter", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $diameter;

    /**
     * @var string
     *
     * @ORM\Column(name="unitdiameter", type="string", nullable=true)
     */
    private $unitdiameter;

    /**
     * @var float
     *
     * @ORM\Column(name="waterflow", type="float", precision=10, scale=0, nullable=true)
     */
    private $waterflow = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="restingwater", type="boolean", nullable=true)
     */
    private $restingwater;

    /**
     * @var string
     *
     * @ORM\Column(name="depthwatertable", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $depthwatertable = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="infowater", type="string", nullable=true)
     */
    private $infowater;

    /**
     * @var string
     *
     * @ORM\Column(name="infodrilling", type="string", nullable=true)
     */
    private $infodrilling;

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
     * Set drilling
     *
     * @param string $drilling
     *
     * @return Dlocdrilling
     */
    public function setDrilling($drilling)
    {
        $this->drilling = $drilling;

        return $this;
    }

    /**
     * Get drilling
     *
     * @return string
     */
    public function getDrilling()
    {
        return $this->drilling;
    }

    /**
     * Set diameter
     *
     * @param string $diameter
     *
     * @return Dlocdrilling
     */
    public function setDiameter($diameter)
    {
        $this->diameter = $diameter;

        return $this;
    }

    /**
     * Get diameter
     *
     * @return string
     */
    public function getDiameter()
    {
        return $this->diameter;
    }

    /**
     * Set unitdiameter
     *
     * @param string $unitdiameter
     *
     * @return Dlocdrilling
     */
    public function setUnitdiameter($unitdiameter)
    {
        $this->unitdiameter = $unitdiameter;

        return $this;
    }

    /**
     * Get unitdiameter
     *
     * @return string
     */
    public function getUnitdiameter()
    {
        return $this->unitdiameter;
    }

    /**
     * Set waterflow
     *
     * @param float $waterflow
     *
     * @return Dlocdrilling
     */
    public function setWaterflow($waterflow)
    {
        $this->waterflow = $waterflow;

        return $this;
    }

    /**
     * Get waterflow
     *
     * @return float
     */
    public function getWaterflow()
    {
        return $this->waterflow;
    }

    /**
     * Set restingwater
     *
     * @param boolean $restingwater
     *
     * @return Dlocdrilling
     */
    public function setRestingwater($restingwater)
    {
        $this->restingwater = $restingwater;

        return $this;
    }

    /**
     * Get restingwater
     *
     * @return boolean
     */
    public function getRestingwater()
    {
        return $this->restingwater;
    }

    /**
     * Set depthwatertable
     *
     * @param string $depthwatertable
     *
     * @return Dlocdrilling
     */
    public function setDepthwatertable($depthwatertable)
    {
        $this->depthwatertable = $depthwatertable;

        return $this;
    }

    /**
     * Get depthwatertable
     *
     * @return string
     */
    public function getDepthwatertable()
    {
        return $this->depthwatertable;
    }

    /**
     * Set infowater
     *
     * @param string $infowater
     *
     * @return Dlocdrilling
     */
    public function setInfowater($infowater)
    {
        $this->infowater = $infowater;

        return $this;
    }

    /**
     * Get infowater
     *
     * @return string
     */
    public function getInfowater()
    {
        return $this->infowater;
    }

    /**
     * Set infodrilling
     *
     * @param string $infodrilling
     *
     * @return Dlocdrilling
     */
    public function setInfodrilling($infodrilling)
    {
        $this->infodrilling = $infodrilling;

        return $this;
    }

    /**
     * Get infodrilling
     *
     * @return string
     */
    public function getInfodrilling()
    {
        return $this->infodrilling;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlocdrilling
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
