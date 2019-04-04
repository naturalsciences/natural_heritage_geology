<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dloccenter
 *
 * @ORM\Table(name="dloccenter", uniqueConstraints={@ORM\UniqueConstraint(name="dloccenter_unique", columns={"idcollection", "idpt"})}, indexes={@ORM\Index(name="IDX_C376102433EB2703", columns={"idprecision"})})
 * @ORM\Entity
 */
class Dloccenter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dloccenter_pk_seq", allocationSize=1, initialValue=1)
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
    private $idpt = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="long", type="float", precision=10, scale=0, nullable=true)
     */
    private $long;

    /**
     * @var integer
     *
     * @ORM\Column(name="altitude", type="integer", nullable=true)
     */
    private $altitude = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldnum", type="string", nullable=true)
     */
    private $fieldnum;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", nullable=true)
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="geodescription", type="text", nullable=true)
     */
    private $geodescription;

    /**
     * @var string
     *
     * @ORM\Column(name="positiondescription", type="string", nullable=true)
     */
    private $positiondescription;

    /**
     * @var string
     *
     * @ORM\Column(name="variousinfo", type="string", nullable=true)
     */
    private $variousinfo;

    /**
     * @var string
     *
     * @ORM\Column(name="docref", type="string", nullable=true)
     */
    private $docref;

    /**
     * @var \AppBundle\Entity\Lprecision
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lprecision")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprecision", referencedColumnName="idprecision")
     * })
     */
    private $idprecision;



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
     * @return Dloccenter
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
     * @return Dloccenter
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
     * Set lat
     *
     * @param float $lat
     *
     * @return Dloccenter
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set long
     *
     * @param float $long
     *
     * @return Dloccenter
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get long
     *
     * @return float
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set altitude
     *
     * @param integer $altitude
     *
     * @return Dloccenter
     */
    public function setAltitude($altitude)
    {
        $this->altitude = $altitude;

        return $this;
    }

    /**
     * Get altitude
     *
     * @return integer
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Dloccenter
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
     * Set fieldnum
     *
     * @param string $fieldnum
     *
     * @return Dloccenter
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
     * Set place
     *
     * @param string $place
     *
     * @return Dloccenter
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set geodescription
     *
     * @param string $geodescription
     *
     * @return Dloccenter
     */
    public function setGeodescription($geodescription)
    {
        $this->geodescription = $geodescription;

        return $this;
    }

    /**
     * Get geodescription
     *
     * @return string
     */
    public function getGeodescription()
    {
        return $this->geodescription;
    }

    /**
     * Set positiondescription
     *
     * @param string $positiondescription
     *
     * @return Dloccenter
     */
    public function setPositiondescription($positiondescription)
    {
        $this->positiondescription = $positiondescription;

        return $this;
    }

    /**
     * Get positiondescription
     *
     * @return string
     */
    public function getPositiondescription()
    {
        return $this->positiondescription;
    }

    /**
     * Set variousinfo
     *
     * @param string $variousinfo
     *
     * @return Dloccenter
     */
    public function setVariousinfo($variousinfo)
    {
        $this->variousinfo = $variousinfo;

        return $this;
    }

    /**
     * Get variousinfo
     *
     * @return string
     */
    public function getVariousinfo()
    {
        return $this->variousinfo;
    }

    /**
     * Set docref
     *
     * @param string $docref
     *
     * @return Dloccenter
     */
    public function setDocref($docref)
    {
        $this->docref = $docref;

        return $this;
    }

    /**
     * Get docref
     *
     * @return string
     */
    public function getDocref()
    {
        return $this->docref;
    }

    /**
     * Set idprecision
     *
     * @param \AppBundle\Entity\Lprecision $idprecision
     *
     * @return Dloccenter
     */
    public function setIdprecision(\AppBundle\Entity\Lprecision $idprecision = null)
    {
        $this->idprecision = $idprecision;

        return $this;
    }

    /**
     * Get idprecision
     *
     * @return \AppBundle\Entity\Lprecision
     */
    public function getIdprecision()
    {
        return $this->idprecision;
    }
}
