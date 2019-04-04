<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkcontdoc
 *
 * @ORM\Table(name="dlinkcontdoc", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkcontdoc_unique", columns={"idcontribution", "idcollection", "id"})}, indexes={@ORM\Index(name="IDX_C63E6DE031E47808BF396750", columns={"idcollection", "id"}), @ORM\Index(name="IDX_C63E6DE0AC9A611C", columns={"idcontribution"})})
 * @ORM\Entity
 */
class Dlinkcontdoc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkcontdoc_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Ddocument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ddocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="id", referencedColumnName="iddoc")
     * })
     */
    private $idcollection;

    /**
     * @var \AppBundle\Entity\Dcontribution
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dcontribution")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcontribution", referencedColumnName="idcontribution")
     * })
     */
    private $idcontribution;



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
     * @param \AppBundle\Entity\Ddocument $idcollection
     *
     * @return Dlinkcontdoc
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

    /**
     * Set idcontribution
     *
     * @param \AppBundle\Entity\Dcontribution $idcontribution
     *
     * @return Dlinkcontdoc
     */
    public function setIdcontribution(\AppBundle\Entity\Dcontribution $idcontribution = null)
    {
        $this->idcontribution = $idcontribution;

        return $this;
    }

    /**
     * Get idcontribution
     *
     * @return \AppBundle\Entity\Dcontribution
     */
    public function getIdcontribution()
    {
        return $this->idcontribution;
    }
}
