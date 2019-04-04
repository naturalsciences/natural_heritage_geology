<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dsample
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DsampleRepository")
 * @ORM\Table(name="dsample", uniqueConstraints={@ORM\UniqueConstraint(name="dsample_unique", columns={"idcollection", "idsample"})})
 */

class Dsample
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dsample_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="idcollection", type="string", nullable=false)
     */
    private $idcollection;

    /**
     * @var integer
     *
     * @ORM\Column(name="idsample", type="integer", nullable=false)
     */
    private $idsample;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldnum", type="string", nullable=true)
     */
    private $fieldnum;

    /**
     * @var string
     *
     * @ORM\Column(name="museumnum", type="string", nullable=true)
     */
    private $museumnum;

    /**
     * @var string
     *
     * @ORM\Column(name="museumlocation", type="string", nullable=true)
     */
    private $museumlocation;

    /**
     * @var string
     *
     * @ORM\Column(name="boxnumber", type="string", nullable=true)
     */
    private $boxnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="sampledescription", type="text", nullable=true)
     */
    private $sampledescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="quantity", type="string", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", nullable=true)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="dimentioncode", type="smallint", nullable=true)
     */
    private $dimentioncode;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", nullable=true)
     */
    private $quality;

    /**
     * @var boolean
     *
     * @ORM\Column(name="slimplate", type="boolean", nullable=true)
     */
    private $slimplate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="chemicalanalysis", type="boolean", nullable=true)
     */
    private $chemicalanalysis;

    /**
     * @var boolean
     *
     * @ORM\Column(name="holotype", type="boolean", nullable=true)
     */
    private $holotype;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paratype", type="boolean", nullable=true)
     */
    private $paratype;

    /**
     * @var integer
     *
     * @ORM\Column(name="radioactivity", type="smallint", nullable=true)
     */
    private $radioactivity;

    /**
     * @var string
     *
     * @ORM\Column(name="loaninformation", type="string", nullable=true)
     */
    private $loaninformation;

    /**
     * @var integer
     *
     * @ORM\Column(name="securitylevel", type="integer", nullable=true)
     */
    private $securitylevel;

    /**
     * @var string
     *
     * @ORM\Column(name="varioussampleinfo", type="string", nullable=true)
     */
    private $varioussampleinfo;
	
	
	/** 
   * @ORM\OneToMany(targetEntity="Dsamminerals", mappedBy="idsample") 
   */ 
    private $dsamminerals; 

	/*public function __construct() 
     { 
         $this->dsamminerals = new ArrayCollection(); 
     } 

	public function getDsamminerals()
     { 
         return $this->dsamminerals; 
     } */


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
     * Set idcollection
     *
     * @param string $idcollection
     *
     * @return Dsample
     */
    public function setIdcollection($idcollection)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return string
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }

    /**
     * Set idsample
     *
     * @param integer $idsample
     *
     * @return Dsample
     */
    public function setIdsample($idsample)
    {
        $this->idsample = $idsample;

        return $this;
    }

    /**
     * Get idsample
     *
     * @return integer
     */
    public function getIdsample()
    {
        return $this->idsample;
    }

    /**
     * Set fieldnum
     *
     * @param string $fieldnum
     *
     * @return Dsample
     */
    public function setFieldnum($fieldnum)
    {
        $this->fieldnum = $fieldnum;

        return $this;
    }

    /**
     * Get fieldnum
     *
     * @return string
     */
    public function getFieldnum()
    {
        return $this->fieldnum;
    }

    /**
     * Set museumnum
     *
     * @param string $museumnum
     *
     * @return Dsample
     */
    public function setMuseumnum($museumnum)
    {
        $this->museumnum = $museumnum;

        return $this;
    }

    /**
     * Get museumnum
     *
     * @return string
     */
    public function getMuseumnum()
    {
        return $this->museumnum;
    }

    /**
     * Set museumlocation
     *
     * @param string $museumlocation
     *
     * @return Dsample
     */
    public function setMuseumlocation($museumlocation)
    {
        $this->museumlocation = $museumlocation;

        return $this;
    }

    /**
     * Get museumlocation
     *
     * @return string
     */
    public function getMuseumlocation()
    {
        return $this->museumlocation;
    }

    /**
     * Set boxnumber
     *
     * @param string $boxnumber
     *
     * @return Dsample
     */
    public function setBoxnumber($boxnumber)
    {
        $this->boxnumber = $boxnumber;

        return $this;
    }

    /**
     * Get boxnumber
     *
     * @return string
     */
    public function getBoxnumber()
    {
        return $this->boxnumber;
    }

    /**
     * Set sampledescription
     *
     * @param string $sampledescription
     *
     * @return Dsample
     */
    public function setSampledescription($sampledescription)
    {
        $this->sampledescription = $sampledescription;

        return $this;
    }

    /**
     * Get sampledescription
     *
     * @return string
     */
    public function getSampledescription()
    {
        return $this->sampledescription;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Dsample
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set quantity
     *
     * @param string $quantity
     *
     * @return Dsample
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return Dsample
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set dimentioncode
     *
     * @param integer $dimentioncode
     *
     * @return Dsample
     */
    public function setDimentioncode($dimentioncode)
    {
        $this->dimentioncode = $dimentioncode;

        return $this;
    }

    /**
     * Get dimentioncode
     *
     * @return integer
     */
    public function getDimentioncode()
    {
        return $this->dimentioncode;
    }

    /**
     * Set quality
     *
     * @param string $quality
     *
     * @return Dsample
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set slimplate
     *
     * @param boolean $slimplate
     *
     * @return Dsample
     */
    public function setSlimplate($slimplate)
    {
        $this->slimplate = $slimplate;

        return $this;
    }

    /**
     * Get slimplate
     *
     * @return boolean
     */
    public function getSlimplate()
    {
        return $this->slimplate;
    }

    /**
     * Set chemicalanalysis
     *
     * @param boolean $chemicalanalysis
     *
     * @return Dsample
     */
    public function setChemicalanalysis($chemicalanalysis)
    {
        $this->chemicalanalysis = $chemicalanalysis;

        return $this;
    }

    /**
     * Get chemicalanalysis
     *
     * @return boolean
     */
    public function getChemicalanalysis()
    {
        return $this->chemicalanalysis;
    }

    /**
     * Set holotype
     *
     * @param boolean $holotype
     *
     * @return Dsample
     */
    public function setHolotype($holotype)
    {
        $this->holotype = $holotype;

        return $this;
    }

    /**
     * Get holotype
     *
     * @return boolean
     */
    public function getHolotype()
    {
        return $this->holotype;
    }

    /**
     * Set paratype
     *
     * @param boolean $paratype
     *
     * @return Dsample
     */
    public function setParatype($paratype)
    {
        $this->paratype = $paratype;

        return $this;
    }

    /**
     * Get paratype
     *
     * @return boolean
     */
    public function getParatype()
    {
        return $this->paratype;
    }

    /**
     * Set radioactivity
     *
     * @param integer $radioactivity
     *
     * @return Dsample
     */
    public function setRadioactivity($radioactivity)
    {
        $this->radioactivity = $radioactivity;

        return $this;
    }

    /**
     * Get radioactivity
     *
     * @return integer
     */
    public function getRadioactivity()
    {
        return $this->radioactivity;
    }

    /**
     * Set loaninformation
     *
     * @param string $loaninformation
     *
     * @return Dsample
     */
    public function setLoaninformation($loaninformation)
    {
        $this->loaninformation = $loaninformation;

        return $this;
    }

    /**
     * Get loaninformation
     *
     * @return string
     */
    public function getLoaninformation()
    {
        return $this->loaninformation;
    }

    /**
     * Set securitylevel
     *
     * @param integer $securitylevel
     *
     * @return Dsample
     */
    public function setSecuritylevel($securitylevel)
    {
        $this->securitylevel = $securitylevel;

        return $this;
    }

    /**
     * Get securitylevel
     *
     * @return integer
     */
    public function getSecuritylevel()
    {
        return $this->securitylevel;
    }

    /**
     * Set varioussampleinfo
     *
     * @param string $varioussampleinfo
     *
     * @return Dsample
     */
    public function setVarioussampleinfo($varioussampleinfo)
    {
        $this->varioussampleinfo = $varioussampleinfo;

        return $this;
    }

    /**
     * Get varioussampleinfo
     *
     * @return string
     */
    public function getVarioussampleinfo()
    {
        return $this->varioussampleinfo;
    }
}
