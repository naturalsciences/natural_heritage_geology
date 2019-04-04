<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ddocaerphoto
 *
 * @ORM\Table(name="ddocaerphoto", uniqueConstraints={@ORM\UniqueConstraint(name="DDocAerPhoto_PID_key", columns={"pid"}), @ORM\UniqueConstraint(name="ddocaerphoto_unique", columns={"idcollection", "iddoc"}), @ORM\UniqueConstraint(name="ddocaerphoto_pid_unique", columns={"pid"})}, indexes={@ORM\Index(name="IDX_A43E8A964DFB1B2F", columns={"fid"})})
 * @ORM\Entity
 */
class Ddocaerphoto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ddocaerphoto_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="pid", type="string", nullable=true)
     */
    private $pid;

    /**
     * @var \AppBundle\Entity\Docplanvol
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Docplanvol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fid", referencedColumnName="fid")
     * })
     */
    private $fid;

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
     * Set pid
     *
     * @param string $pid
     *
     * @return Ddocaerphoto
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get pid
     *
     * @return string
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set fid
     *
     * @param \AppBundle\Entity\Docplanvol $fid
     *
     * @return Ddocaerphoto
     */
    public function setFid(\AppBundle\Entity\Docplanvol $fid = null)
    {
        $this->fid = $fid;

        return $this;
    }

    /**
     * Get fid
     *
     * @return \AppBundle\Entity\Docplanvol
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Ddocument $idcollection
     *
     * @return Ddocaerphoto
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
