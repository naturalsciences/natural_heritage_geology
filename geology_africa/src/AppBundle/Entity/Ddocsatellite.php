<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddocsatellite
 *
 * @ORM\Table(name="ddocsatellite", uniqueConstraints={@ORM\UniqueConstraint(name="DDocSatellite_IDDoc_key", columns={"iddoc"}), @ORM\UniqueConstraint(name="ddocsatellite_unique", columns={"idcollection", "iddoc"}), @ORM\UniqueConstraint(name="ddocsatellite_iddoc_unique", columns={"iddoc"})})
 * @ORM\Entity
 */
class Ddocsatellite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ddocsatellite_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="sattype", type="string", nullable=true)
     */
    private $sattype;

    /**
     * @var integer
     *
     * @ORM\Column(name="satnum", type="integer", nullable=true)
     */
    private $satnum = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="orbit", type="string", nullable=true)
     */
    private $orbit;

    /**
     * @var string
     *
     * @ORM\Column(name="pathtrack", type="string", nullable=true)
     */
    private $pathtrack;

    /**
     * @var string
     *
     * @ORM\Column(name="rowframe", type="string", nullable=true)
     */
    private $rowframe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=true)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="sensor", type="string", nullable=true)
     */
    private $sensor;

    /**
     * @var string
     *
     * @ORM\Column(name="moderadar", type="string", nullable=true)
     */
    private $moderadar;

    /**
     * @var string
     *
     * @ORM\Column(name="split", type="string", nullable=true)
     */
    private $split;

    /**
     * @var string
     *
     * @ORM\Column(name="ascdesc", type="string", nullable=true)
     */
    private $ascdesc;

    /**
     * @var string
     *
     * @ORM\Column(name="originale", type="string", nullable=true)
     */
    private $originale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="original", type="boolean", nullable=true)
     */
    private $original;

    /**
     * @var string
     *
     * @ORM\Column(name="backupnum", type="string", nullable=true)
     */
    private $backupnum;

    /**
     * @var float
     *
     * @ORM\Column(name="backupno", type="float", precision=10, scale=0, nullable=true)
     */
    private $backupno;

    /**
     * @var string
     *
     * @ORM\Column(name="backupform", type="string", nullable=true)
     */
    private $backupform;

    /**
     * @var boolean
     *
     * @ORM\Column(name="modified", type="boolean", nullable=true)
     */
    private $modified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="orthorectified", type="boolean", nullable=true)
     */
    private $orthorectified;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", nullable=true)
     */
    private $format;

    /**
     * @var \AppBundle\Entity\Ddocument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ddocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="iddoc", referencedColumnName="iddoc")
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
     * Set sattype
     *
     * @param string $sattype
     *
     * @return Ddocsatellite
     */
    public function setSattype($sattype)
    {
        $this->sattype = $sattype;

        return $this;
    }

    /**
     * Get sattype
     *
     * @return string
     */
    public function getSattype()
    {
        return $this->sattype;
    }

    /**
     * Set satnum
     *
     * @param integer $satnum
     *
     * @return Ddocsatellite
     */
    public function setSatnum($satnum)
    {
        $this->satnum = $satnum;

        return $this;
    }

    /**
     * Get satnum
     *
     * @return integer
     */
    public function getSatnum()
    {
        return $this->satnum;
    }

    /**
     * Set orbit
     *
     * @param string $orbit
     *
     * @return Ddocsatellite
     */
    public function setOrbit($orbit)
    {
        $this->orbit = $orbit;

        return $this;
    }

    /**
     * Get orbit
     *
     * @return string
     */
    public function getOrbit()
    {
        return $this->orbit;
    }

    /**
     * Set pathtrack
     *
     * @param string $pathtrack
     *
     * @return Ddocsatellite
     */
    public function setPathtrack($pathtrack)
    {
        $this->pathtrack = $pathtrack;

        return $this;
    }

    /**
     * Get pathtrack
     *
     * @return string
     */
    public function getPathtrack()
    {
        return $this->pathtrack;
    }

    /**
     * Set rowframe
     *
     * @param string $rowframe
     *
     * @return Ddocsatellite
     */
    public function setRowframe($rowframe)
    {
        $this->rowframe = $rowframe;

        return $this;
    }

    /**
     * Get rowframe
     *
     * @return string
     */
    public function getRowframe()
    {
        return $this->rowframe;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Ddocsatellite
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
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Ddocsatellite
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set sensor
     *
     * @param string $sensor
     *
     * @return Ddocsatellite
     */
    public function setSensor($sensor)
    {
        $this->sensor = $sensor;

        return $this;
    }

    /**
     * Get sensor
     *
     * @return string
     */
    public function getSensor()
    {
        return $this->sensor;
    }

    /**
     * Set moderadar
     *
     * @param string $moderadar
     *
     * @return Ddocsatellite
     */
    public function setModeradar($moderadar)
    {
        $this->moderadar = $moderadar;

        return $this;
    }

    /**
     * Get moderadar
     *
     * @return string
     */
    public function getModeradar()
    {
        return $this->moderadar;
    }

    /**
     * Set split
     *
     * @param string $split
     *
     * @return Ddocsatellite
     */
    public function setSplit($split)
    {
        $this->split = $split;

        return $this;
    }

    /**
     * Get split
     *
     * @return string
     */
    public function getSplit()
    {
        return $this->split;
    }

    /**
     * Set ascdesc
     *
     * @param string $ascdesc
     *
     * @return Ddocsatellite
     */
    public function setAscdesc($ascdesc)
    {
        $this->ascdesc = $ascdesc;

        return $this;
    }

    /**
     * Get ascdesc
     *
     * @return string
     */
    public function getAscdesc()
    {
        return $this->ascdesc;
    }

    /**
     * Set originale
     *
     * @param string $originale
     *
     * @return Ddocsatellite
     */
    public function setOriginale($originale)
    {
        $this->originale = $originale;

        return $this;
    }

    /**
     * Get originale
     *
     * @return string
     */
    public function getOriginale()
    {
        return $this->originale;
    }

    /**
     * Set original
     *
     * @param boolean $original
     *
     * @return Ddocsatellite
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get original
     *
     * @return boolean
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set backupnum
     *
     * @param string $backupnum
     *
     * @return Ddocsatellite
     */
    public function setBackupnum($backupnum)
    {
        $this->backupnum = $backupnum;

        return $this;
    }

    /**
     * Get backupnum
     *
     * @return string
     */
    public function getBackupnum()
    {
        return $this->backupnum;
    }

    /**
     * Set backupno
     *
     * @param float $backupno
     *
     * @return Ddocsatellite
     */
    public function setBackupno($backupno)
    {
        $this->backupno = $backupno;

        return $this;
    }

    /**
     * Get backupno
     *
     * @return float
     */
    public function getBackupno()
    {
        return $this->backupno;
    }

    /**
     * Set backupform
     *
     * @param string $backupform
     *
     * @return Ddocsatellite
     */
    public function setBackupform($backupform)
    {
        $this->backupform = $backupform;

        return $this;
    }

    /**
     * Get backupform
     *
     * @return string
     */
    public function getBackupform()
    {
        return $this->backupform;
    }

    /**
     * Set modified
     *
     * @param boolean $modified
     *
     * @return Ddocsatellite
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return boolean
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set orthorectified
     *
     * @param boolean $orthorectified
     *
     * @return Ddocsatellite
     */
    public function setOrthorectified($orthorectified)
    {
        $this->orthorectified = $orthorectified;

        return $this;
    }

    /**
     * Get orthorectified
     *
     * @return boolean
     */
    public function getOrthorectified()
    {
        return $this->orthorectified;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Ddocsatellite
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Ddocument $idcollection
     *
     * @return Ddocsatellite
     */
    public function setIdcollection(\AppBundle\Entity\Ddocument $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Ddocument
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
