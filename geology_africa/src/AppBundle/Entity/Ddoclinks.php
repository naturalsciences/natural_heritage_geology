<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddoclinks
 *
 * @ORM\Table(name="ddoclinks", uniqueConstraints={@ORM\UniqueConstraint(name="ddoclinks_unique", columns={"idcollection", "iddoc", "idcollection2", "iddoc2"})}, indexes={@ORM\Index(name="IDX_57197DBA31E478089F44A603", columns={"idcollection", "iddoc"})})
 * @ORM\Entity
 */
class Ddoclinks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ddoclinks_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="idcollection2", type="string", nullable=false)
     */
    private $idcollection2;

    /**
     * @var integer
     *
     * @ORM\Column(name="iddoc2", type="integer", nullable=false)
     */
    private $iddoc2;

    /**
     * @var string
     *
     * @ORM\Column(name="noticeid", type="string", nullable=true)
     */
    private $noticeid;

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
     * Set idcollection2
     *
     * @param string $idcollection2
     *
     * @return Ddoclinks
     */
    public function setIdcollection2($idcollection2)
    {
        $this->idcollection2 = $idcollection2;

        return $this;
    }

    /**
     * Get idcollection2
     *
     * @return string
     */
    public function getIdcollection2()
    {
        return $this->idcollection2;
    }

    /**
     * Set iddoc2
     *
     * @param integer $iddoc2
     *
     * @return Ddoclinks
     */
    public function setIddoc2($iddoc2)
    {
        $this->iddoc2 = $iddoc2;

        return $this;
    }

    /**
     * Get iddoc2
     *
     * @return integer
     */
    public function getIddoc2()
    {
        return $this->iddoc2;
    }

    /**
     * Set noticeid
     *
     * @param string $noticeid
     *
     * @return Ddoclinks
     */
    public function setNoticeid($noticeid)
    {
        $this->noticeid = $noticeid;

        return $this;
    }

    /**
     * Get noticeid
     *
     * @return string
     */
    public function getNoticeid()
    {
        return $this->noticeid;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Ddocument $idcollection
     *
     * @return Ddoclinks
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
