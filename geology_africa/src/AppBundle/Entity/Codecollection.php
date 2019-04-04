<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Codecollection
 * @ORM\Table(name="codecollection", uniqueConstraints={@ORM\UniqueConstraint(name="codecollection_unique", columns={"codecollection"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\codecollectionRepository")
 */
class Codecollection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="codecollection_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="codecollection", type="string", nullable=false)
     */
    private $codecollection;

    /**
     * @var string
     *
     * @ORM\Column(name="collection", type="string", nullable=true)
     */
    private $collection;

    /**
     * @var string
     *
     * @ORM\Column(name="typeobjets", type="string", nullable=true)
     */
    private $typeobjets;

    /**
     * @var string
     *
     * @ORM\Column(name="zoneutilisation", type="string", nullable=true)
     */
    private $zoneutilisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="idresponsable", type="integer", nullable=true)
     */
    private $idresponsable = '0';



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
     * Set codecollection
     *
     * @param string $codecollection
     *
     * @return Codecollection
     */
    public function setCodecollection($codecollection)
    {
        $this->codecollection = $codecollection;

        return $this;
    }

    /**
     * Get codecollection
     *
     * @return string
     */
    public function getCodecollection()
    {
        return $this->codecollection;
    }

    /**
     * Set collection
     *
     * @param string $collection
     *
     * @return Codecollection
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return string
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set typeobjets
     *
     * @param string $typeobjets
     *
     * @return Codecollection
     */
    public function setTypeobjets($typeobjets)
    {
        $this->typeobjets = $typeobjets;

        return $this;
    }

    /**
     * Get typeobjets
     *
     * @return string
     */
    public function getTypeobjets()
    {
        return $this->typeobjets;
    }

    /**
     * Set zoneutilisation
     *
     * @param string $zoneutilisation
     *
     * @return Codecollection
     */
    public function setZoneutilisation($zoneutilisation)
    {
        $this->zoneutilisation = $zoneutilisation;

        return $this;
    }

    /**
     * Get zoneutilisation
     *
     * @return string
     */
    public function getZoneutilisation()
    {
        return $this->zoneutilisation;
    }

    /**
     * Set idresponsable
     *
     * @param integer $idresponsable
     *
     * @return Codecollection
     */
    public function setIdresponsable($idresponsable)
    {
        $this->idresponsable = $idresponsable;

        return $this;
    }

    /**
     * Get idresponsable
     *
     * @return integer
     */
    public function getIdresponsable()
    {
        return $this->idresponsable;
    }
}
