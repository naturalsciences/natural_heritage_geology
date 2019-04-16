<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkcontsam
 *
 * @ORM\Table(name="dlinkcontsam", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkcontsam_unique", columns={"idcontribution", "idcollection", "id"})}, indexes={@ORM\Index(name="IDX_A66CD89C31E47808BF396750", columns={"idcollection", "id"}), @ORM\Index(name="IDX_A66CD89CAC9A611C", columns={"idcontribution"})})
 * @ORM\Entity
 */
class Dlinkcontsam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkcontsam_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     * })
     */
    private $idcollection;

    /**
     * @var \AppBundle\Entity\Dcontribution
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dcontribution",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcontribution", referencedColumnName="idcontribution")
     * })
     */
    private $idcontribution;

	/**
     * @var \AppBundle\Entity\Dsample
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dsample",  fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="idsample")
     * })
     */
    private $id;

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
     * @return Dlinkcontsam
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
     * Set idcontribution
     *
     * @param \AppBundle\Entity\Dcontribution $idcontribution
     *
     * @return Dlinkcontsam
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
	
	    /**
     * Set id
     *
     * @param \AppBundle\Entity\Dsample $id
     *
     * @return DLinkContSam
     */
    public function setId(\AppBundle\Entity\Dsample $id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Dsample
     */
    public function getId()
    {
        return $this->id;
    }
}
