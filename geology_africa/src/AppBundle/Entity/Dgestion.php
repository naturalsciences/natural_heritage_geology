<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dgestion
 *
 * @ORM\Table(name="dgestion", uniqueConstraints={@ORM\UniqueConstraint(name="dgestion_unique", columns={"idgestion"})}, indexes={@ORM\Index(name="IDX_72EDFBE6F6C6757", columns={"idencodeur"})})
 * @ORM\Entity
 */
class Dgestion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dgestion_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idgestion", type="integer", nullable=false)
     */
    private $idgestion = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date = 'now()';

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", nullable=true)
     */
    private $action;

    /**
     * @var \AppBundle\Entity\Dgestionnaire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Dgestionnaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idencodeur", referencedColumnName="idencodeur")
     * })
     */
    private $idencodeur;



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
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return Dgestion
     */
    public function setIdgestion($idgestion)
    {
        $this->idgestion = $idgestion;

        return $this;
    }

    /**
     * Get idgestion
     *
     * @return integer
     */
    public function getIdgestion()
    {
        return $this->idgestion;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Dgestion
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Dgestion
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set idencodeur
     *
     * @param \AppBundle\Entity\Dgestionnaire $idencodeur
     *
     * @return Dgestion
     */
    public function setIdencodeur(\AppBundle\Entity\Dgestionnaire $idencodeur = null)
    {
        $this->idencodeur = $idencodeur;

        return $this;
    }

    /**
     * Get idencodeur
     *
     * @return \AppBundle\Entity\Dgestionnaire
     */
    public function getIdencodeur()
    {
        return $this->idencodeur;
    }
}
