<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lmapreftype
 *
 * @ORM\Table(name="lmapreftype", uniqueConstraints={@ORM\UniqueConstraint(name="lmapreftype_unique", columns={"reftype"})})
 * @ORM\Entity
 */
class Lmapreftype
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lmapreftype_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="reftype", type="string", nullable=false)
     */
    private $reftype;



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
     * Set reftype
     *
     * @param string $reftype
     *
     * @return Lmapreftype
     */
    public function setReftype($reftype)
    {
        $this->reftype = $reftype;

        return $this;
    }

    /**
     * Get reftype
     *
     * @return string
     */
    public function getReftype()
    {
        return $this->reftype;
    }
}
