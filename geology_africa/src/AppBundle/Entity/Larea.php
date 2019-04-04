<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Larea
 *
 * @ORM\Table(name="larea", uniqueConstraints={@ORM\UniqueConstraint(name="larea_unique", columns={"polyarea"})})
 * @ORM\Entity
 */
class Larea
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="larea_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="polyarea", type="string", nullable=false)
     */
    private $polyarea;

    /**
     * @var string
     *
     * @ORM\Column(name="parent", type="string", nullable=true)
     */
    private $parent;



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
     * Set polyarea
     *
     * @param string $polyarea
     *
     * @return Larea
     */
    public function setPolyarea($polyarea)
    {
        $this->polyarea = $polyarea;

        return $this;
    }

    /**
     * Get polyarea
     *
     * @return string
     */
    public function getPolyarea()
    {
        return $this->polyarea;
    }

    /**
     * Set parent
     *
     * @param string $parent
     *
     * @return Larea
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }
}
