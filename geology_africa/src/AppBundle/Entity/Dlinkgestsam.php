<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkgestsam
 *
 * @ORM\Table(name="dlinkgestsam", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkgestsam_unique", columns={"idgestion", "idcollection", "idsam"})}, indexes={@ORM\Index(name="IDX_6BC88CDA31E47808FF16137F", columns={"idcollection", "idsam"}), @ORM\Index(name="IDX_6BC88CDA10607DE", columns={"idgestion"})})
 * @ORM\Entity
 */
class Dlinkgestsam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkgestsam_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idsam", referencedColumnName="idsample")
     * })
     */
    private $idcollection;

    /**
     * @var \AppBundle\Entity\Dgestion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dgestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idgestion", referencedColumnName="idgestion")
     * })
     */
    private $idgestion;



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
     * @param \AppBundle\Entity\Dsample $idcollection
     *
     * @return Dlinkgestsam
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
     * Set idgestion
     *
     * @param \AppBundle\Entity\Dgestion $idgestion
     *
     * @return Dlinkgestsam
     */
    public function setIdgestion(\AppBundle\Entity\Dgestion $idgestion = null)
    {
        $this->idgestion = $idgestion;

        return $this;
    }

    /**
     * Get idgestion
     *
     * @return \AppBundle\Entity\Dgestion
     */
    public function getIdgestion()
    {
        return $this->idgestion;
    }
}
