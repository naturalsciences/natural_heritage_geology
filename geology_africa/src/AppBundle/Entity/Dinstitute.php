<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dinstitute
 *
 * @ORM\Table(name="dinstitute", uniqueConstraints={@ORM\UniqueConstraint(name="dinstitute_unique", columns={"idinstitution"})})
 * @ORM\Entity
 */
class Dinstitute
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dinstitute_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var integer
     *
     * @ORM\Column(name="idinstitution", type="integer", nullable=false)
     */
    private $idinstitution = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="acronyme", type="string", nullable=true)
     */
    private $acronyme;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", nullable=true)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", nullable=true)
     */
    private $contact;



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
     * Set idinstitution
     *
     * @param integer $idinstitution
     *
     * @return Dinstitute
     */
    public function setIdinstitution($idinstitution)
    {
        $this->idinstitution = $idinstitution;

        return $this;
    }

    /**
     * Get idinstitution
     *
     * @return integer
     */
    public function getIdinstitution()
    {
        return $this->idinstitution;
    }

    /**
     * Set acronyme
     *
     * @param string $acronyme
     *
     * @return Dinstitute
     */
    public function setAcronyme($acronyme)
    {
        $this->acronyme = $acronyme;

        return $this;
    }

    /**
     * Get acronyme
     *
     * @return string
     */
    public function getAcronyme()
    {
        return $this->acronyme;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Dinstitute
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Dinstitute
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Dinstitute
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Dinstitute
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }
}
