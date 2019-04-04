<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dloccarto
 *
 * @ORM\Table(name="dloccarto", uniqueConstraints={@ORM\UniqueConstraint(name="dloccarto_unique", columns={"idcollection", "idpt", "cartoref"})}, indexes={@ORM\Index(name="IDX_F7FD1F431E4780850E3C8BA", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dloccarto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dloccarto_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="cartoref", type="string", nullable=false)
     */
    private $cartoref;

    /**
     * @var string
     *
     * @ORM\Column(name="cartoname", type="string", nullable=true)
     */
    private $cartoname;

    /**
     * @var string
     *
     * @ORM\Column(name="cartoinfo", type="string", nullable=true)
     */
    private $cartoinfo;

    /**
     * @var \AppBundle\Entity\Dloccenter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dloccenter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idpt", referencedColumnName="idpt")
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
     * Set cartoref
     *
     * @param string $cartoref
     *
     * @return Dloccarto
     */
    public function setCartoref($cartoref)
    {
        $this->cartoref = $cartoref;

        return $this;
    }

    /**
     * Get cartoref
     *
     * @return string
     */
    public function getCartoref()
    {
        return $this->cartoref;
    }

    /**
     * Set cartoname
     *
     * @param string $cartoname
     *
     * @return Dloccarto
     */
    public function setCartoname($cartoname)
    {
        $this->cartoname = $cartoname;

        return $this;
    }

    /**
     * Get cartoname
     *
     * @return string
     */
    public function getCartoname()
    {
        return $this->cartoname;
    }

    /**
     * Set cartoinfo
     *
     * @param string $cartoinfo
     *
     * @return Dloccarto
     */
    public function setCartoinfo($cartoinfo)
    {
        $this->cartoinfo = $cartoinfo;

        return $this;
    }

    /**
     * Get cartoinfo
     *
     * @return string
     */
    public function getCartoinfo()
    {
        return $this->cartoinfo;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dloccarto
     */
    public function setIdcollection(\AppBundle\Entity\Dloccenter $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Dloccenter
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
