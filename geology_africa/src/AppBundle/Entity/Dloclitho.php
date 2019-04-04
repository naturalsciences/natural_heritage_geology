<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dloclitho
 *
 * @ORM\Table(name="dloclitho", uniqueConstraints={@ORM\UniqueConstraint(name="dloclitho_unique", columns={"idcollection", "idpt", "idstratum"})}, indexes={@ORM\Index(name="IDX_AA614F2531E4780850E3C8BA", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dloclitho
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dloclitho_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idstratum", type="integer", nullable=false)
     */
    private $idstratum;

    /**
     * @var string
     *
     * @ORM\Column(name="lithostratum", type="string", nullable=true)
     */
    private $lithostratum;

    /**
     * @var float
     *
     * @ORM\Column(name="topstratum", type="float", precision=10, scale=0, nullable=true)
     */
    private $topstratum;

    /**
     * @var float
     *
     * @ORM\Column(name="bottomstratum", type="float", precision=10, scale=0, nullable=true)
     */
    private $bottomstratum;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alternance", type="boolean", nullable=true)
     */
    private $alternance;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionstratum", type="string", nullable=true)
     */
    private $descriptionstratum;

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
     * Set idstratum
     *
     * @param integer $idstratum
     *
     * @return Dloclitho
     */
    public function setIdstratum($idstratum)
    {
        $this->idstratum = $idstratum;

        return $this;
    }

    /**
     * Get idstratum
     *
     * @return integer
     */
    public function getIdstratum()
    {
        return $this->idstratum;
    }

    /**
     * Set lithostratum
     *
     * @param string $lithostratum
     *
     * @return Dloclitho
     */
    public function setLithostratum($lithostratum)
    {
        $this->lithostratum = $lithostratum;

        return $this;
    }

    /**
     * Get lithostratum
     *
     * @return string
     */
    public function getLithostratum()
    {
        return $this->lithostratum;
    }

    /**
     * Set topstratum
     *
     * @param float $topstratum
     *
     * @return Dloclitho
     */
    public function setTopstratum($topstratum)
    {
        $this->topstratum = $topstratum;

        return $this;
    }

    /**
     * Get topstratum
     *
     * @return float
     */
    public function getTopstratum()
    {
        return $this->topstratum;
    }

    /**
     * Set bottomstratum
     *
     * @param float $bottomstratum
     *
     * @return Dloclitho
     */
    public function setBottomstratum($bottomstratum)
    {
        $this->bottomstratum = $bottomstratum;

        return $this;
    }

    /**
     * Get bottomstratum
     *
     * @return float
     */
    public function getBottomstratum()
    {
        return $this->bottomstratum;
    }

    /**
     * Set alternance
     *
     * @param boolean $alternance
     *
     * @return Dloclitho
     */
    public function setAlternance($alternance)
    {
        $this->alternance = $alternance;

        return $this;
    }

    /**
     * Get alternance
     *
     * @return boolean
     */
    public function getAlternance()
    {
        return $this->alternance;
    }

    /**
     * Set descriptionstratum
     *
     * @param string $descriptionstratum
     *
     * @return Dloclitho
     */
    public function setDescriptionstratum($descriptionstratum)
    {
        $this->descriptionstratum = $descriptionstratum;

        return $this;
    }

    /**
     * Get descriptionstratum
     *
     * @return string
     */
    public function getDescriptionstratum()
    {
        return $this->descriptionstratum;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dloclitho
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
