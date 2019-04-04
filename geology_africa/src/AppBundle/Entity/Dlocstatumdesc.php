<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocstatumdesc
 *
 * @ORM\Table(name="dlocstatumdesc", uniqueConstraints={@ORM\UniqueConstraint(name="dlocstatumdesc_unique", columns={"idcollection", "idpt", "idstratum", "descript"})}, indexes={@ORM\Index(name="IDX_E798BD8931E4780850E3C8BA3D607B62", columns={"idcollection", "idpt", "idstratum"})})
 * @ORM\Entity
 */
class Dlocstatumdesc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocstatumdesc_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="descript", type="string", nullable=false)
     */
    private $descript;

    /**
     * @var \AppBundle\Entity\Dloclitho
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dloclitho")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="idpt", referencedColumnName="idpt"),
     *   @ORM\JoinColumn(name="idstratum", referencedColumnName="idstratum")
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
     * Set descript
     *
     * @param string $descript
     *
     * @return Dlocstatumdesc
     */
    public function setDescript($descript)
    {
        $this->descript = $descript;

        return $this;
    }

    /**
     * Get descript
     *
     * @return string
     */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloclitho $idcollection
     *
     * @return Dlocstatumdesc
     */
    public function setIdcollection(\AppBundle\Entity\Dloclitho $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Dloclitho
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
