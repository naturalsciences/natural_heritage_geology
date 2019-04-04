<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dlocquadril
 *
 * @ORM\Table(name="dlocquadril", uniqueConstraints={@ORM\UniqueConstraint(name="dlocquadril_unique", columns={"idcollection", "idpt"})})
 * @ORM\Entity
 */
class Dlocquadril
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dlocquadril_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var float
     *
     * @ORM\Column(name="x1", type="float", precision=10, scale=0, nullable=true)
     */
    private $x1;

    /**
     * @var float
     *
     * @ORM\Column(name="y1", type="float", precision=10, scale=0, nullable=true)
     */
    private $y1;

    /**
     * @var float
     *
     * @ORM\Column(name="x2", type="float", precision=10, scale=0, nullable=true)
     */
    private $x2;

    /**
     * @var float
     *
     * @ORM\Column(name="y2", type="float", precision=10, scale=0, nullable=true)
     */
    private $y2;

    /**
     * @var float
     *
     * @ORM\Column(name="x3", type="float", precision=10, scale=0, nullable=true)
     */
    private $x3;

    /**
     * @var float
     *
     * @ORM\Column(name="y3", type="float", precision=10, scale=0, nullable=true)
     */
    private $y3;

    /**
     * @var float
     *
     * @ORM\Column(name="x4", type="float", precision=10, scale=0, nullable=true)
     */
    private $x4;

    /**
     * @var float
     *
     * @ORM\Column(name="y4", type="float", precision=10, scale=0, nullable=true)
     */
    private $y4;

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
     * Set x1
     *
     * @param float $x1
     *
     * @return Dlocquadril
     */
    public function setX1($x1)
    {
        $this->x1 = $x1;

        return $this;
    }

    /**
     * Get x1
     *
     * @return float
     */
    public function getX1()
    {
        return $this->x1;
    }

    /**
     * Set y1
     *
     * @param float $y1
     *
     * @return Dlocquadril
     */
    public function setY1($y1)
    {
        $this->y1 = $y1;

        return $this;
    }

    /**
     * Get y1
     *
     * @return float
     */
    public function getY1()
    {
        return $this->y1;
    }

    /**
     * Set x2
     *
     * @param float $x2
     *
     * @return Dlocquadril
     */
    public function setX2($x2)
    {
        $this->x2 = $x2;

        return $this;
    }

    /**
     * Get x2
     *
     * @return float
     */
    public function getX2()
    {
        return $this->x2;
    }

    /**
     * Set y2
     *
     * @param float $y2
     *
     * @return Dlocquadril
     */
    public function setY2($y2)
    {
        $this->y2 = $y2;

        return $this;
    }

    /**
     * Get y2
     *
     * @return float
     */
    public function getY2()
    {
        return $this->y2;
    }

    /**
     * Set x3
     *
     * @param float $x3
     *
     * @return Dlocquadril
     */
    public function setX3($x3)
    {
        $this->x3 = $x3;

        return $this;
    }

    /**
     * Get x3
     *
     * @return float
     */
    public function getX3()
    {
        return $this->x3;
    }

    /**
     * Set y3
     *
     * @param float $y3
     *
     * @return Dlocquadril
     */
    public function setY3($y3)
    {
        $this->y3 = $y3;

        return $this;
    }

    /**
     * Get y3
     *
     * @return float
     */
    public function getY3()
    {
        return $this->y3;
    }

    /**
     * Set x4
     *
     * @param float $x4
     *
     * @return Dlocquadril
     */
    public function setX4($x4)
    {
        $this->x4 = $x4;

        return $this;
    }

    /**
     * Get x4
     *
     * @return float
     */
    public function getX4()
    {
        return $this->x4;
    }

    /**
     * Set y4
     *
     * @param float $y4
     *
     * @return Dlocquadril
     */
    public function setY4($y4)
    {
        $this->y4 = $y4;

        return $this;
    }

    /**
     * Get y4
     *
     * @return float
     */
    public function getY4()
    {
        return $this->y4;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Dloccenter $idcollection
     *
     * @return Dlocquadril
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
