<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docplanvol
 *
 * @ORM\Table(name="docplanvol", uniqueConstraints={@ORM\UniqueConstraint(name="docplanvol_unique", columns={"fid"})})
 * @ORM\Entity
 */
class Docplanvol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="docplanvol_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="fid", type="string", nullable=false)
     */
    private $fid;

    /**
     * @var string
     *
     * @ORM\Column(name="nombloc", type="string", nullable=true)
     */
    private $nombloc;

    /**
     * @var string
     *
     * @ORM\Column(name="bid", type="string", nullable=true)
     */
    private $bid;

    /**
     * @var string
     *
     * @ORM\Column(name="bande", type="string", nullable=true)
     */
    private $bande;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", nullable=true)
     */
    private $comment;



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
     * Set fid
     *
     * @param string $fid
     *
     * @return Docplanvol
     */
    public function setFid($fid)
    {
        $this->fid = $fid;

        return $this;
    }

    /**
     * Get fid
     *
     * @return string
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * Set nombloc
     *
     * @param string $nombloc
     *
     * @return Docplanvol
     */
    public function setNombloc($nombloc)
    {
        $this->nombloc = $nombloc;

        return $this;
    }

    /**
     * Get nombloc
     *
     * @return string
     */
    public function getNombloc()
    {
        return $this->nombloc;
    }

    /**
     * Set bid
     *
     * @param string $bid
     *
     * @return Docplanvol
     */
    public function setBid($bid)
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * Get bid
     *
     * @return string
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * Set bande
     *
     * @param string $bande
     *
     * @return Docplanvol
     */
    public function setBande($bande)
    {
        $this->bande = $bande;

        return $this;
    }

    /**
     * Get bande
     *
     * @return string
     */
    public function getBande()
    {
        return $this->bande;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Docplanvol
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
