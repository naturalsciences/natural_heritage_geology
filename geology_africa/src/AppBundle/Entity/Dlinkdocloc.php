<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlinkdocloc
 *
 * @ORM\Table(name="dlinkdocloc", uniqueConstraints={@ORM\UniqueConstraint(name="dlinkdocloc_unique", columns={"idcollecloc", "idpt", "idcollecdoc", "iddoc"})}, indexes={@ORM\Index(name="IDX_2AC6AD32C656DF3B9F44A603", columns={"idcollecdoc", "iddoc"}), @ORM\Index(name="IDX_2AC6AD32C8458E8350E3C8BA", columns={"idcollecloc", "idpt"})})
 * @ORM\Entity
 */
class Dlinkdocloc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlinkdocloc_pk_seq", allocationSize=1, initialValue=1)
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
     * @var \AppBundle\Entity\Dloccenter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dloccenter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollecloc", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idpt", referencedColumnName="idpt")
     * })
     */
    private $idcollecloc;



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
     * @return Dlinkdocloc
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
     * Set idcollecloc
     *
     * @param \AppBundle\Entity\Dloccenter $idcollecloc
     *
     * @return Dlinkdocloc
     */
    public function setIdcollecloc(\AppBundle\Entity\Dloccenter $idcollecloc = null)
    {
        $this->idcollecloc = $idcollecloc;

        return $this;
    }

    /**
     * Get idcollecloc
     *
     * @return \AppBundle\Entity\Dloccenter
     */
    public function getIdcollecloc()
    {
        return $this->idcollecloc;
    }
}
