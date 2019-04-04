<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ltitlelevel
 *
 * @ORM\Table(name="ltitlelevel", uniqueConstraints={@ORM\UniqueConstraint(name="ltitlelevel_unique", columns={"titlelevel"})})
 * @ORM\Entity
 */
class Ltitlelevel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ltitlelevel_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="titlelevel", type="smallint", nullable=false)
     */
    private $titlelevel = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="titlecaption", type="string", nullable=true)
     */
    private $titlecaption;



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
     * Set titlelevel
     *
     * @param integer $titlelevel
     *
     * @return Ltitlelevel
     */
    public function setTitlelevel($titlelevel)
    {
        $this->titlelevel = $titlelevel;

        return $this;
    }

    /**
     * Get titlelevel
     *
     * @return integer
     */
    public function getTitlelevel()
    {
        return $this->titlelevel;
    }

    /**
     * Set titlecaption
     *
     * @param string $titlecaption
     *
     * @return Ltitlelevel
     */
    public function setTitlecaption($titlecaption)
    {
        $this->titlecaption = $titlecaption;

        return $this;
    }

    /**
     * Get titlecaption
     *
     * @return string
     */
    public function getTitlecaption()
    {
        return $this->titlecaption;
    }
}
