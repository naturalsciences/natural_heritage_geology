<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dsamminerals
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\DSammineralsRepository")
 * @ORM\Table(name="dsamminerals", uniqueConstraints={@ORM\UniqueConstraint(name="dsamminerals_unique", columns={"idcollection", "idsample", "idmineral"})}, indexes={@ORM\Index(name="IDX_1AC34B3131E4780895B6DB6F", columns={"idcollection", "idsample"}), @ORM\Index(name="IDX_1AC34B31C29FFB11", columns={"idmineral"})})
 * @ORM\Entity
 */
class Dsamminerals
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsamminerals_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="grade", type="smallint", nullable=true)
     */
    private $grade;

	
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
     * @var \AppBundle\Entity\Lminerals
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lminerals",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmineral", referencedColumnName="idmineral")
     * })
     */
    private $idmineral;
	

	 
	
	




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
     * Set grade
     *
     * @param integer $grade
     *
     * @return Dsamminerals
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dsamminerals
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
	
	/**
     * Set idsample
     *
     * @param \AppBundle\Entity\Dsample $idsample
     *
     * @return Dsamminerals
     */
    public function setIdsample(\AppBundle\Entity\Dsample $idsample = null)
    {
        $this->idsample = $idsample;

        return $this;
    }

    /**
     * Get idsample
     *
     * @return \AppBundle\Entity\Dsample
     */
    public function getIdsample()
    {
        return $this->idsample;
    }
	

    /**
     * Set idmineral
     *
     * @param \AppBundle\Entity\Lminerals $idmineral
     *
     * @return Dsamminerals
     */
    public function setIdmineral(\AppBundle\Entity\Lminerals $idmineral = null)
    {
        $this->idmineral = $idmineral;

        return $this;
    }

    /**
     * Get idmineral
     *
     * @return \AppBundle\Entity\Lminerals
     */
    public function getIdmineral()
    {
        return $this->idmineral;
    }
}
