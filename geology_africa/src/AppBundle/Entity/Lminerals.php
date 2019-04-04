<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lminerals
 *
 * @ORM\Table(name="lminerals", uniqueConstraints={@ORM\UniqueConstraint(name="lminerals_unique", columns={"idmineral"})})
 * @ORM\Entity
 */
class Lminerals
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lminerals_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idmineral", type="integer", nullable=false)
     */
    private $idmineral;

    /**
     * @var string
     *
     * @ORM\Column(name="rank", type="string", nullable=true)
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="fmname", type="string", nullable=true)
     */
    private $fmname;

    /**
     * @var string
     *
     * @ORM\Column(name="mname", type="string", nullable=true)
     */
    private $mname;

    /**
     * @var string
     *
     * @ORM\Column(name="mformula", type="string", nullable=true)
     */
    private $mformula;

    /**
     * @var string
     *
     * @ORM\Column(name="fmparent", type="string", nullable=true)
     */
    private $fmparent;

    /**
     * @var string
     *
     * @ORM\Column(name="mparent", type="string", nullable=true)
     */
    private $mparent;



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
     * Set pk
     *
     * @param integer $pk
     *
     * @return Lminerals
     */
    public function setPk($pk)
    {
        $this->pk = $pk;

        return $this;
    }

    /**
     * Set idmineral
     *
     * @param integer $idmineral
     *
     * @return Lminerals
     */
    public function setIdmineral($idmineral)
    {
        $this->idmineral = $idmineral;

        return $this;
    }

    /**
     * Get idmineral
     *
     * @return integer
     */
    public function getIdmineral()
    {
        return $this->idmineral;
    }

    /**
     * Set rank
     *
     * @param string $rank
     *
     * @return Lminerals
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return string
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set fmname
     *
     * @param string $fmname
     *
     * @return Lminerals
     */
    public function setFmname($fmname)
    {
        $this->fmname = $fmname;

        return $this;
    }

    /**
     * Get fmname
     *
     * @return string
     */
    public function getFmname()
    {
        return $this->fmname;
    }

    /**
     * Set mname
     *
     * @param string $mname
     *
     * @return Lminerals
     */
    public function setMname($mname)
    {
        $this->mname = $mname;

        return $this;
    }

    /**
     * Get mname
     *
     * @return string
     */
    public function getMname()
    {
        return $this->mname;
    }

    /**
     * Set mformula
     *
     * @param string $mformula
     *
     * @return Lminerals
     */
    public function setMformula($mformula)
    {
        $this->mformula = $mformula;

        return $this;
    }

    /**
     * Get mformula
     *
     * @return string
     */
    public function getMformula()
    {
        return $this->mformula;
    }

    /**
     * Set fmparent
     *
     * @param string $fmparent
     *
     * @return Lminerals
     */
    public function setFmparent($fmparent)
    {
        $this->fmparent = $fmparent;

        return $this;
    }

    /**
     * Get fmparent
     *
     * @return string
     */
    public function getFmparent()
    {
        return $this->fmparent;
    }

    /**
     * Set mparent
     *
     * @param string $mparent
     *
     * @return Lminerals
     */
    public function setMparent($mparent)
    {
        $this->mparent = $mparent;

        return $this;
    }

    /**
     * Get mparent
     *
     * @return string
     */
    public function getMparent()
    {
        return $this->mparent;
    }
	

	 /*public function __toString()
	{
		return "test";
	}*/
}
