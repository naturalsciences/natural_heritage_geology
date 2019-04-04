<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinklocsam
 *
 * @ORM\Table(name="dlinklocsam", uniqueConstraints={@ORM\UniqueConstraint(name="dlinklocsam_unique", columns={"idcollectionloc", "idpt", "idstratum", "idcollecsample", "idsample"})}, indexes={@ORM\Index(name="IDX_A8D4CB9BB28ADCE995B6DB6F", columns={"idcollecsample", "idsample"}), @ORM\Index(name="IDX_A8D4CB9BC6C028CA50E3C8BA3D607B62", columns={"idcollectionloc", "idpt", "idstratum"})})
 * @ORM\Entity
 */
class Dlinklocsam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinklocsam_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollecsample", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idsample", referencedColumnName="idsample")
     * })
     */
    private $idcollecsample;

    /**
     * @var \AppBundle\Entity\Dloclitho
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dloclitho")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollectionloc", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idpt", referencedColumnName="idpt"),
     *   @ORM\JoinColumn(name="idstratum", referencedColumnName="idstratum")
     * })
     */
    private $idcollectionloc;



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
     * Set idcollecsample
     *
     * @param \AppBundle\Entity\Dsample $idcollecsample
     *
     * @return Dlinklocsam
     */
    public function setIdcollecsample(\AppBundle\Entity\Dsample $idcollecsample = null)
    {
        $this->idcollecsample = $idcollecsample;

        return $this;
    }

    /**
     * Get idcollecsample
     *
     * @return \AppBundle\Entity\Dsample
     */
    public function getIdcollecsample()
    {
        return $this->idcollecsample;
    }

    /**
     * Set idcollectionloc
     *
     * @param \AppBundle\Entity\Dloclitho $idcollectionloc
     *
     * @return Dlinklocsam
     */
    public function setIdcollectionloc(\AppBundle\Entity\Dloclitho $idcollectionloc = null)
    {
        $this->idcollectionloc = $idcollectionloc;

        return $this;
    }

    /**
     * Get idcollectionloc
     *
     * @return \AppBundle\Entity\Dloclitho
     */
    public function getIdcollectionloc()
    {
        return $this->idcollectionloc;
    }
}
