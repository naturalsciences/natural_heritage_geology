<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkgestdoc
 *
 * @ORM\Table(name="dlinkgestdoc", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkgestdoc_unique", columns={"idgestion", "idcollecdoc", "iddoc"})}, indexes={@ORM\Index(name="IDX_B9A39A6C656DF3B9F44A603", columns={"idcollecdoc", "iddoc"}), @ORM\Index(name="IDX_B9A39A610607DE", columns={"idgestion"})})
 * @ORM\Entity
 */
class Dlinkgestdoc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkgestdoc_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Ddocument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ddocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollecdoc", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="iddoc", referencedColumnName="iddoc")
     * })
     */
    private $idcollecdoc;

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
     * Set idcollecdoc
     *
     * @param \AppBundle\Entity\Ddocument $idcollecdoc
     *
     * @return Dlinkgestdoc
     */
    public function setIdcollecdoc(\AppBundle\Entity\Ddocument $idcollecdoc = null)
    {
        $this->idcollecdoc = $idcollecdoc;

        return $this;
    }

    /**
     * Get idcollecdoc
     *
     * @return \AppBundle\Entity\Ddocument
     */
    public function getIdcollecdoc()
    {
        return $this->idcollecdoc;
    }

    /**
     * Set idgestion
     *
     * @param \AppBundle\Entity\Dgestion $idgestion
     *
     * @return Dlinkgestdoc
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
