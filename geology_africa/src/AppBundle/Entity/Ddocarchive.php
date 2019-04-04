<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddocarchive
 *
 * @ORM\Table(name="ddocarchive", uniqueConstraints={@ORM\UniqueConstraint(name="pk_ddoc_archives", columns={"idcollection", "iddoc"})})
 * @ORM\Entity
 */
class Ddocarchive
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ddocarchive_pk_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="extend", type="integer", nullable=true)
     */
    private $extend = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="geology", type="boolean", nullable=true)
     */
    private $geology;

    /**
     * @var boolean
     *
     * @ORM\Column(name="geochemistry", type="boolean", nullable=true)
     */
    private $geochemistry;

    /**
     * @var boolean
     *
     * @ORM\Column(name="geophysics", type="boolean", nullable=true)
     */
    private $geophysics;

    /**
     * @var boolean
     *
     * @ORM\Column(name="exploration", type="boolean", nullable=true)
     */
    private $exploration;

    /**
     * @var boolean
     *
     * @ORM\Column(name="production", type="boolean", nullable=true)
     */
    private $production;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reserves", type="boolean", nullable=true)
     */
    private $reserves;

    /**
     * @var boolean
     *
     * @ORM\Column(name="exploitation", type="boolean", nullable=true)
     */
    private $exploitation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="processing", type="boolean", nullable=true)
     */
    private $processing;

    /**
     * @var boolean
     *
     * @ORM\Column(name="management", type="boolean", nullable=true)
     */
    private $management;

    /**
     * @var boolean
     *
     * @ORM\Column(name="report", type="boolean", nullable=true)
     */
    private $report;

    /**
     * @var boolean
     *
     * @ORM\Column(name="drillingcores", type="boolean", nullable=true)
     */
    private $drillingcores;

    /**
     * @var boolean
     *
     * @ORM\Column(name="maps", type="boolean", nullable=true)
     */
    private $maps;

    /**
     * @var boolean
     *
     * @ORM\Column(name="paleontology", type="boolean", nullable=true)
     */
    private $paleontology;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sedimentology", type="boolean", nullable=true)
     */
    private $sedimentology;

    /**
     * @var boolean
     *
     * @ORM\Column(name="economy", type="boolean", nullable=true)
     */
    private $economy;

    /**
     * @var string
     *
     * @ORM\Column(name="sample", type="text", nullable=true)
     */
    private $sample;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sgeology", type="boolean", nullable=true)
     */
    private $sgeology;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smineralogy", type="boolean", nullable=true)
     */
    private $smineralogy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="spaleontology", type="boolean", nullable=true)
     */
    private $spaleontology;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sconcentre", type="boolean", nullable=true)
     */
    private $sconcentre;

    /**
     * @var integer
     *
     * @ORM\Column(name="yearlow", type="integer", nullable=true)
     */
    private $yearlow;

    /**
     * @var integer
     *
     * @ORM\Column(name="yearhigh", type="integer", nullable=true)
     */
    private $yearhigh;



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
     * @return Ddocarchive
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
     * @return Ddocarchive
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
     * Set extend
     *
     * @param integer $extend
     *
     * @return Ddocarchive
     */
    public function setExtend($extend)
    {
        $this->extend = $extend;

        return $this;
    }

    /**
     * Get extend
     *
     * @return integer
     */
    public function getExtend()
    {
        return $this->extend;
    }

    /**
     * Set geology
     *
     * @param boolean $geology
     *
     * @return Ddocarchive
     */
    public function setGeology($geology)
    {
        $this->geology = $geology;

        return $this;
    }

    /**
     * Get geology
     *
     * @return boolean
     */
    public function getGeology()
    {
        return $this->geology;
    }

    /**
     * Set geochemistry
     *
     * @param boolean $geochemistry
     *
     * @return Ddocarchive
     */
    public function setGeochemistry($geochemistry)
    {
        $this->geochemistry = $geochemistry;

        return $this;
    }

    /**
     * Get geochemistry
     *
     * @return boolean
     */
    public function getGeochemistry()
    {
        return $this->geochemistry;
    }

    /**
     * Set geophysics
     *
     * @param boolean $geophysics
     *
     * @return Ddocarchive
     */
    public function setGeophysics($geophysics)
    {
        $this->geophysics = $geophysics;

        return $this;
    }

    /**
     * Get geophysics
     *
     * @return boolean
     */
    public function getGeophysics()
    {
        return $this->geophysics;
    }

    /**
     * Set exploration
     *
     * @param boolean $exploration
     *
     * @return Ddocarchive
     */
    public function setExploration($exploration)
    {
        $this->exploration = $exploration;

        return $this;
    }

    /**
     * Get exploration
     *
     * @return boolean
     */
    public function getExploration()
    {
        return $this->exploration;
    }

    /**
     * Set production
     *
     * @param boolean $production
     *
     * @return Ddocarchive
     */
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }

    /**
     * Get production
     *
     * @return boolean
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Set reserves
     *
     * @param boolean $reserves
     *
     * @return Ddocarchive
     */
    public function setReserves($reserves)
    {
        $this->reserves = $reserves;

        return $this;
    }

    /**
     * Get reserves
     *
     * @return boolean
     */
    public function getReserves()
    {
        return $this->reserves;
    }

    /**
     * Set exploitation
     *
     * @param boolean $exploitation
     *
     * @return Ddocarchive
     */
    public function setExploitation($exploitation)
    {
        $this->exploitation = $exploitation;

        return $this;
    }

    /**
     * Get exploitation
     *
     * @return boolean
     */
    public function getExploitation()
    {
        return $this->exploitation;
    }

    /**
     * Set processing
     *
     * @param boolean $processing
     *
     * @return Ddocarchive
     */
    public function setProcessing($processing)
    {
        $this->processing = $processing;

        return $this;
    }

    /**
     * Get processing
     *
     * @return boolean
     */
    public function getProcessing()
    {
        return $this->processing;
    }

    /**
     * Set management
     *
     * @param boolean $management
     *
     * @return Ddocarchive
     */
    public function setManagement($management)
    {
        $this->management = $management;

        return $this;
    }

    /**
     * Get management
     *
     * @return boolean
     */
    public function getManagement()
    {
        return $this->management;
    }

    /**
     * Set report
     *
     * @param boolean $report
     *
     * @return Ddocarchive
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return boolean
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set drillingcores
     *
     * @param boolean $drillingcores
     *
     * @return Ddocarchive
     */
    public function setDrillingcores($drillingcores)
    {
        $this->drillingcores = $drillingcores;

        return $this;
    }

    /**
     * Get drillingcores
     *
     * @return boolean
     */
    public function getDrillingcores()
    {
        return $this->drillingcores;
    }

    /**
     * Set maps
     *
     * @param boolean $maps
     *
     * @return Ddocarchive
     */
    public function setMaps($maps)
    {
        $this->maps = $maps;

        return $this;
    }

    /**
     * Get maps
     *
     * @return boolean
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * Set paleontology
     *
     * @param boolean $paleontology
     *
     * @return Ddocarchive
     */
    public function setPaleontology($paleontology)
    {
        $this->paleontology = $paleontology;

        return $this;
    }

    /**
     * Get paleontology
     *
     * @return boolean
     */
    public function getPaleontology()
    {
        return $this->paleontology;
    }

    /**
     * Set sedimentology
     *
     * @param boolean $sedimentology
     *
     * @return Ddocarchive
     */
    public function setSedimentology($sedimentology)
    {
        $this->sedimentology = $sedimentology;

        return $this;
    }

    /**
     * Get sedimentology
     *
     * @return boolean
     */
    public function getSedimentology()
    {
        return $this->sedimentology;
    }

    /**
     * Set economy
     *
     * @param boolean $economy
     *
     * @return Ddocarchive
     */
    public function setEconomy($economy)
    {
        $this->economy = $economy;

        return $this;
    }

    /**
     * Get economy
     *
     * @return boolean
     */
    public function getEconomy()
    {
        return $this->economy;
    }

    /**
     * Set sample
     *
     * @param string $sample
     *
     * @return Ddocarchive
     */
    public function setSample($sample)
    {
        $this->sample = $sample;

        return $this;
    }

    /**
     * Get sample
     *
     * @return string
     */
    public function getSample()
    {
        return $this->sample;
    }

    /**
     * Set sgeology
     *
     * @param boolean $sgeology
     *
     * @return Ddocarchive
     */
    public function setSgeology($sgeology)
    {
        $this->sgeology = $sgeology;

        return $this;
    }

    /**
     * Get sgeology
     *
     * @return boolean
     */
    public function getSgeology()
    {
        return $this->sgeology;
    }

    /**
     * Set smineralogy
     *
     * @param boolean $smineralogy
     *
     * @return Ddocarchive
     */
    public function setSmineralogy($smineralogy)
    {
        $this->smineralogy = $smineralogy;

        return $this;
    }

    /**
     * Get smineralogy
     *
     * @return boolean
     */
    public function getSmineralogy()
    {
        return $this->smineralogy;
    }

    /**
     * Set spaleontology
     *
     * @param boolean $spaleontology
     *
     * @return Ddocarchive
     */
    public function setSpaleontology($spaleontology)
    {
        $this->spaleontology = $spaleontology;

        return $this;
    }

    /**
     * Get spaleontology
     *
     * @return boolean
     */
    public function getSpaleontology()
    {
        return $this->spaleontology;
    }

    /**
     * Set sconcentre
     *
     * @param boolean $sconcentre
     *
     * @return Ddocarchive
     */
    public function setSconcentre($sconcentre)
    {
        $this->sconcentre = $sconcentre;

        return $this;
    }

    /**
     * Get sconcentre
     *
     * @return boolean
     */
    public function getSconcentre()
    {
        return $this->sconcentre;
    }

    /**
     * Set yearlow
     *
     * @param integer $yearlow
     *
     * @return Ddocarchive
     */
    public function setYearlow($yearlow)
    {
        $this->yearlow = $yearlow;

        return $this;
    }

    /**
     * Get yearlow
     *
     * @return integer
     */
    public function getYearlow()
    {
        return $this->yearlow;
    }

    /**
     * Set yearhigh
     *
     * @param integer $yearhigh
     *
     * @return Ddocarchive
     */
    public function setYearhigh($yearhigh)
    {
        $this->yearhigh = $yearhigh;

        return $this;
    }

    /**
     * Get yearhigh
     *
     * @return integer
     */
    public function getYearhigh()
    {
        return $this->yearhigh;
    }
}
