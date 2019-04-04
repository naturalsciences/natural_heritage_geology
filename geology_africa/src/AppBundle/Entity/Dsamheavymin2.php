<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsamheavymin2
 *
 * @ORM\Table(name="dsamheavymin2", uniqueConstraints={@ORM\UniqueConstraint(name="dsamheavymin2_unique", columns={"idcollection", "idsample", "mineral"})}, indexes={@ORM\Index(name="IDX_E1820DFE31E4780895B6DB6F", columns={"idcollection", "idsample"})})
 * @ORM\Entity
 */
class Dsamheavymin2
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsamheavymin2_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="mineral", type="string", nullable=false)
     */
    private $mineral;

    /**
     * @var integer
     *
     * @ORM\Column(name="minnum", type="smallint", nullable=true)
     */
    private $minnum;

    /**
     * @var string
     *
     * @ORM\Column(name="observationhm", type="string", nullable=true)
     */
    private $observationhm;

	/**
     * @var \AppBundle\Entity\Dsamheavymin
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsamheavymin",  fetch="EAGER")
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
     * Set mineral
     *
     * @param string $mineral
     *
     * @return Dsamheavymin2
     */
    public function setMineral($mineral)
    {
        $this->mineral = $mineral;

        return $this;
    }

    /**
     * Get mineral
     *
     * @return string
     */
    public function getMineral()
    {
        return $this->mineral;
    }

    /**
     * Set minnum
     *
     * @param integer $minnum
     *
     * @return Dsamheavymin2
     */
    public function setMinnum($minnum)
    {
        $this->minnum = $minnum;

        return $this;
    }

    /**
     * Get minnum
     *
     * @return integer
     */
    public function getMinnum()
    {
        return $this->minnum;
    }

    /**
     * Set observationhm
     *
     * @param string $observationhm
     *
     * @return Dsamheavymin2
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
     * @param \AppBundle\Entity\Dsamheavymin $idcollection
     *
     * @return Dsamheavymin2
     */
    public function setIdcollection(\AppBundle\Entity\Dsamheavymin $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Dsamheavymin
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
