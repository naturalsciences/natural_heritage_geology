<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lmedium
 *
 * @ORM\Table(name="lmedium", uniqueConstraints={@ORM\UniqueConstraint(name="lmedium_unique", columns={"medium"})})
 * @ORM\Entity
 */
class Lmedium
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lmedium_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="medium", type="string", nullable=false)
     */
    private $medium;

    /**
     * @var string
     *
     * @ORM\Column(name="domaincode", type="string", nullable=true)
     */
    private $domaincode;

    /**
     * @var string
     *
     * @ORM\Column(name="definition", type="string", nullable=true)
     */
    private $definition;



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
     * Set medium
     *
     * @param string $medium
     *
     * @return Lmedium
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * Get medium
     *
     * @return string
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Set domaincode
     *
     * @param string $domaincode
     *
     * @return Lmedium
     */
    public function setDomaincode($domaincode)
    {
        $this->domaincode = $domaincode;

        return $this;
    }

    /**
     * Get domaincode
     *
     * @return string
     */
    public function getDomaincode()
    {
        return $this->domaincode;
    }

    /**
     * Set definition
     *
     * @param string $definition
     *
     * @return Lmedium
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}
