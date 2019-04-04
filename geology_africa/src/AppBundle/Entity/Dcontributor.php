<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dcontributor
 *
 * @ORM\Table(name="dcontributor", uniqueConstraints={@ORM\UniqueConstraint(name="dcontributor_unique", columns={"idcontributor"})})
 * @ORM\Entity
 */
class Dcontributor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dcontributor_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcontributor", type="integer", nullable=false)
     */
    private $idcontributor;

    /**
     * @var string
     *
     * @ORM\Column(name="people", type="string", nullable=true)
     */
    private $people;

    /**
     * @var string
     *
     * @ORM\Column(name="peoplefonction", type="string", nullable=true)
     */
    private $peoplefonction;

    /**
     * @var string
     *
     * @ORM\Column(name="peopletitre", type="string", nullable=true)
     */
    private $peopletitre;

    /**
     * @var string
     *
     * @ORM\Column(name="peoplestatut", type="string", nullable=true)
     */
    private $peoplestatut;

    /**
     * @var string
     *
     * @ORM\Column(name="institut", type="string", nullable=true)
     */
    private $institut;



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
     * Set idcontributor
     *
     * @param integer $idcontributor
     *
     * @return Dcontributor
     */
    public function setIdcontributor($idcontributor)
    {
        $this->idcontributor = $idcontributor;

        return $this;
    }

    /**
     * Get idcontributor
     *
     * @return integer
     */
    public function getIdcontributor()
    {
        return $this->idcontributor;
    }

    /**
     * Set people
     *
     * @param string $people
     *
     * @return Dcontributor
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

    /**
     * Set peoplefonction
     *
     * @param string $peoplefonction
     *
     * @return Dcontributor
     */
    public function setPeoplefonction($peoplefonction)
    {
        $this->peoplefonction = $peoplefonction;

        return $this;
    }

    /**
     * Get peoplefonction
     *
     * @return string
     */
    public function getPeoplefonction()
    {
        return $this->peoplefonction;
    }

    /**
     * Set peopletitre
     *
     * @param string $peopletitre
     *
     * @return Dcontributor
     */
    public function setPeopletitre($peopletitre)
    {
        $this->peopletitre = $peopletitre;

        return $this;
    }

    /**
     * Get peopletitre
     *
     * @return string
     */
    public function getPeopletitre()
    {
        return $this->peopletitre;
    }

    /**
     * Set peoplestatut
     *
     * @param string $peoplestatut
     *
     * @return Dcontributor
     */
    public function setPeoplestatut($peoplestatut)
    {
        $this->peoplestatut = $peoplestatut;

        return $this;
    }

    /**
     * Get peoplestatut
     *
     * @return string
     */
    public function getPeoplestatut()
    {
        return $this->peoplestatut;
    }

    /**
     * Set institut
     *
     * @param string $institut
     *
     * @return Dcontributor
     */
    public function setInstitut($institut)
    {
        $this->institut = $institut;

        return $this;
    }

    /**
     * Get institut
     *
     * @return string
     */
    public function getInstitut()
    {
        return $this->institut;
    }
}
