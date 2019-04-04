<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddocument
 *
 * @ORM\Table(name="ddocument", uniqueConstraints={@ORM\UniqueConstraint(name="ddocument_unique", columns={"idcollection", "iddoc"})}, indexes={@ORM\Index(name="IDX_5ACD9119C67345B7", columns={"medium"})})
 * @ORM\Entity
 */
class Ddocument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ddocument_pk_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="iddoc", type="integer", nullable=false)
     */
    private $iddoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpt", type="integer", nullable=true)
     */
    private $idpt = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="numarchive", type="string", nullable=true)
     */
    private $numarchive;

    /**
     * @var string
     *
     * @ORM\Column(name="caption", type="text", nullable=true)
     */
    private $caption;

    /**
     * @var string
     *
     * @ORM\Column(name="centralnum", type="string", nullable=true)
     */
    private $centralnum;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="numericallocation", type="string", nullable=true)
     */
    private $numericallocation;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", nullable=true)
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="docinfo", type="string", nullable=true)
     */
    private $docinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="edition", type="string", nullable=true)
     */
    private $edition;

    /**
     * @var string
     *
     * @ORM\Column(name="pubplace", type="string", nullable=true)
     */
    private $pubplace;

    /**
     * @var string
     *
     * @ORM\Column(name="doccartotype", type="string", nullable=true)
     */
    private $doccartotype;

    /**
     * @var \AppBundle\Entity\Lmedium
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lmedium")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medium", referencedColumnName="medium")
     * })
     */
    private $medium;



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
     * @return Ddocument
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
     * Set iddoc
     *
     * @param integer $iddoc
     *
     * @return Ddocument
     */
    public function setIddoc($iddoc)
    {
        $this->iddoc = $iddoc;

        return $this;
    }

    /**
     * Get iddoc
     *
     * @return integer
     */
    public function getIddoc()
    {
        return $this->iddoc;
    }

    /**
     * Set idpt
     *
     * @param integer $idpt
     *
     * @return Ddocument
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
     * Set numarchive
     *
     * @param string $numarchive
     *
     * @return Ddocument
     */
    public function setNumarchive($numarchive)
    {
        $this->numarchive = $numarchive;

        return $this;
    }

    /**
     * Get numarchive
     *
     * @return string
     */
    public function getNumarchive()
    {
        return $this->numarchive;
    }

    /**
     * Set caption
     *
     * @param string $caption
     *
     * @return Ddocument
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set centralnum
     *
     * @param string $centralnum
     *
     * @return Ddocument
     */
    public function setCentralnum($centralnum)
    {
        $this->centralnum = $centralnum;

        return $this;
    }

    /**
     * Get centralnum
     *
     * @return string
     */
    public function getCentralnum()
    {
        return $this->centralnum;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Ddocument
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set numericallocation
     *
     * @param string $numericallocation
     *
     * @return Ddocument
     */
    public function setNumericallocation($numericallocation)
    {
        $this->numericallocation = $numericallocation;

        return $this;
    }

    /**
     * Get numericallocation
     *
     * @return string
     */
    public function getNumericallocation()
    {
        return $this->numericallocation;
    }

    /**
     * Set filename
     *
     * @param string $filename
     *
     * @return Ddocument
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set docinfo
     *
     * @param string $docinfo
     *
     * @return Ddocument
     */
    public function setDocinfo($docinfo)
    {
        $this->docinfo = $docinfo;

        return $this;
    }

    /**
     * Get docinfo
     *
     * @return string
     */
    public function getDocinfo()
    {
        return $this->docinfo;
    }

    /**
     * Set edition
     *
     * @param string $edition
     *
     * @return Ddocument
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return string
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set pubplace
     *
     * @param string $pubplace
     *
     * @return Ddocument
     */
    public function setPubplace($pubplace)
    {
        $this->pubplace = $pubplace;

        return $this;
    }

    /**
     * Get pubplace
     *
     * @return string
     */
    public function getPubplace()
    {
        return $this->pubplace;
    }

    /**
     * Set doccartotype
     *
     * @param string $doccartotype
     *
     * @return Ddocument
     */
    public function setDoccartotype($doccartotype)
    {
        $this->doccartotype = $doccartotype;

        return $this;
    }

    /**
     * Get doccartotype
     *
     * @return string
     */
    public function getDoccartotype()
    {
        return $this->doccartotype;
    }

    /**
     * Set medium
     *
     * @param \AppBundle\Entity\Lmedium $medium
     *
     * @return Ddocument
     */
    public function setMedium(\AppBundle\Entity\Lmedium $medium = null)
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * Get medium
     *
     * @return \AppBundle\Entity\Lmedium
     */
    public function getMedium()
    {
        return $this->medium;
    }
}
