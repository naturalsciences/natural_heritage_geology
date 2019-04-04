<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dgestionnaire
 *
 * @ORM\Table(name="dgestionnaire", uniqueConstraints={@ORM\UniqueConstraint(name="dgestionnaire_unique", columns={"idencodeur"})})
 * @ORM\Entity
 */
class Dgestionnaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dgestionnaire_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idencodeur", type="smallint", nullable=false)
     */
    private $idencodeur = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="people", type="string", nullable=true)
     */
    private $people;



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
     * Set idencodeur
     *
     * @param integer $idencodeur
     *
     * @return Dgestionnaire
     */
    public function setIdencodeur($idencodeur)
    {
        $this->idencodeur = $idencodeur;

        return $this;
    }

    /**
     * Get idencodeur
     *
     * @return integer
     */
    public function getIdencodeur()
    {
        return $this->idencodeur;
    }

    /**
     * Set people
     *
     * @param string $people
     *
     * @return Dgestionnaire
     */
    public function setPeople($people)
    {
        $this->people = $people;

        return $this;
    }

    /**
     * Get people
     *
     * @return string
     */
    public function getPeople()
    {
        return $this->people;
    }
}
