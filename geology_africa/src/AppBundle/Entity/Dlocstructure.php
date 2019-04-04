<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocstructure
 *
 * @ORM\Table(name="dlocstructure", uniqueConstraints={@ORM\UniqueConstraint(name="dlocstructure_unique", columns={"idcollection", "idpt", "idstratum", "nummesure"})})
 * @ORM\Entity
 */
class Dlocstructure
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocstructure_pk_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="idpt", type="integer", nullable=false)
     */
    private $idpt;

    /**
     * @var integer
     *
     * @ORM\Column(name="idstratum", type="integer", nullable=false)
     */
    private $idstratum;

    /**
     * @var integer
     *
     * @ORM\Column(name="nummesure", type="integer", nullable=false)
     */
    private $nummesure;

    /**
     * @var string
     *
     * @ORM\Column(name="objectmesure", type="string", nullable=true)
     */
    private $objectmesure;

    /**
     * @var integer
     *
     * @ORM\Column(name="dip", type="integer", nullable=true)
     */
    private $dip;

    /**
     * @var integer
     *
     * @ORM\Column(name="dipdirection", type="integer", nullable=true)
     */
    private $dipdirection;

    /**
     * @var integer
     *
     * @ORM\Column(name="orientation", type="integer", nullable=true)
     */
    private $orientation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="striation", type="boolean", nullable=true)
     */
    private $striation;

    /**
     * @var string
     *
     * @ORM\Column(name="sens", type="string", nullable=true)
     */
    private $sens;

    /**
     * @var string
     *
     * @ORM\Column(name="structureinfo", type="string", nullable=true)
     */
    private $structureinfo;



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
     * @return Dlocstructure
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
     * Set idpt
     *
     * @param integer $idpt
     *
     * @return Dlocstructure
     */
    public function setIdpt($idpt)
    {
        $this->idpt = $idpt;

        return $this;
    }

    /**
     * Get idpt
     *
     * @return integer
     */
    public function getIdpt()
    {
        return $this->idpt;
    }

    /**
     * Set idstratum
     *
     * @param integer $idstratum
     *
     * @return Dlocstructure
     */
    public function setIdstratum($idstratum)
    {
        $this->idstratum = $idstratum;

        return $this;
    }

    /**
     * Get idstratum
     *
     * @return integer
     */
    public function getIdstratum()
    {
        return $this->idstratum;
    }

    /**
     * Set nummesure
     *
     * @param integer $nummesure
     *
     * @return Dlocstructure
     */
    public function setNummesure($nummesure)
    {
        $this->nummesure = $nummesure;

        return $this;
    }

    /**
     * Get nummesure
     *
     * @return integer
     */
    public function getNummesure()
    {
        return $this->nummesure;
    }

    /**
     * Set objectmesure
     *
     * @param string $objectmesure
     *
     * @return Dlocstructure
     */
    public function setObjectmesure($objectmesure)
    {
        $this->objectmesure = $objectmesure;

        return $this;
    }

    /**
     * Get objectmesure
     *
     * @return string
     */
    public function getObjectmesure()
    {
        return $this->objectmesure;
    }

    /**
     * Set dip
     *
     * @param integer $dip
     *
     * @return Dlocstructure
     */
    public function setDip($dip)
    {
        $this->dip = $dip;

        return $this;
    }

    /**
     * Get dip
     *
     * @return integer
     */
    public function getDip()
    {
        return $this->dip;
    }

    /**
     * Set dipdirection
     *
     * @param integer $dipdirection
     *
     * @return Dlocstructure
     */
    public function setDipdirection($dipdirection)
    {
        $this->dipdirection = $dipdirection;

        return $this;
    }

    /**
     * Get dipdirection
     *
     * @return integer
     */
    public function getDipdirection()
    {
        return $this->dipdirection;
    }

    /**
     * Set orientation
     *
     * @param integer $orientation
     *
     * @return Dlocstructure
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * Get orientation
     *
     * @return integer
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * Set striation
     *
     * @param boolean $striation
     *
     * @return Dlocstructure
     */
    public function setStriation($striation)
    {
        $this->striation = $striation;

        return $this;
    }

    /**
     * Get striation
     *
     * @return boolean
     */
    public function getStriation()
    {
        return $this->striation;
    }

    /**
     * Set sens
     *
     * @param string $sens
     *
     * @return Dlocstructure
     */
    public function setSens($sens)
    {
        $this->sens = $sens;

        return $this;
    }

    /**
     * Get sens
     *
     * @return string
     */
    public function getSens()
    {
        return $this->sens;
    }

    /**
     * Set structureinfo
     *
     * @param string $structureinfo
     *
     * @return Dlocstructure
     */
    public function setStructureinfo($structureinfo)
    {
        $this->structureinfo = $structureinfo;

        return $this;
    }

    /**
     * Get structureinfo
     *
     * @return string
     */
    public function getStructureinfo()
    {
        return $this->structureinfo;
    }
}
