<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lprecision
 *
 * @ORM\Table(name="lprecision", uniqueConstraints={@ORM\UniqueConstraint(name="lprecision_unique", columns={"idprecision"})})
 * @ORM\Entity
 */
class Lprecision
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lprecision_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="precision", type="string", nullable=true)
     */
    private $precision;

    /**
     * @var integer
     *
     * @ORM\Column(name="idprecision", type="smallint", nullable=false)
     */
    private $idprecision;



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
     * Set precision
     *
     * @param string $precision
     *
     * @return Lprecision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Get precision
     *
     * @return string
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Set idprecision
     *
     * @param integer $idprecision
     *
     * @return Lprecision
     */
    public function setIdprecision($idprecision)
    {
        $this->idprecision = $idprecision;

        return $this;
    }

    /**
     * Get idprecision
     *
     * @return integer
     */
    public function getIdprecision()
    {
        return $this->idprecision;
    }
}
