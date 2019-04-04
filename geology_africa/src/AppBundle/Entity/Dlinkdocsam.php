<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkdocsam
 *
 * @ORM\Table(name="dlinkdocsam", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkdocsam_unique", columns={"iddoc", "idcollectiondoc", "idsample", "idcollectionsample"})}, indexes={@ORM\Index(name="IDX_448749F6C8D379729F44A603", columns={"idcollectiondoc", "iddoc"}), @ORM\Index(name="IDX_448749F6A84E066895B6DB6F", columns={"idcollectionsample", "idsample"})})
 * @ORM\Entity
 */
class Dlinkdocsam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkdocsam_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Ddocument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ddocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollectiondoc", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="iddoc", referencedColumnName="iddoc")
     * })
     */
    private $idcollectiondoc;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollectionsample", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idsample", referencedColumnName="idsample")
     * })
     */
    private $idcollectionsample;



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
     * Set idcollectiondoc
     *
     * @param \AppBundle\Entity\Ddocument $idcollectiondoc
     *
     * @return Dlinkdocsam
     */
    public function setIdcollectiondoc(\AppBundle\Entity\Ddocument $idcollectiondoc = null)
    {
        $this->idcollectiondoc = $idcollectiondoc;

        return $this;
    }

    /**
     * Get idcollectiondoc
     *
     * @return \AppBundle\Entity\Ddocument
     */
    public function getIdcollectiondoc()
    {
        return $this->idcollectiondoc;
    }

    /**
     * Set idcollectionsample
     *
     * @param \AppBundle\Entity\Dsample $idcollectionsample
     *
     * @return Dlinkdocsam
     */
    public function setIdcollectionsample(\AppBundle\Entity\Dsample $idcollectionsample = null)
    {
        $this->idcollectionsample = $idcollectionsample;

        return $this;
    }

    /**
     * Get idcollectionsample
     *
     * @return \AppBundle\Entity\Dsample
     */
    public function getIdcollectionsample()
    {
        return $this->idcollectionsample;
    }
}
