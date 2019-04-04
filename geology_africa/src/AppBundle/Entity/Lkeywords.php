<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkeywords
 *
 * @ORM\Table(name="lkeywords", uniqueConstraints={@ORM\UniqueConstraint(name="unique_keywords", columns={"wordson", "wordfather"})})
 * @ORM\Entity
 */
class Lkeywords
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lkeywords_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="wordson", type="string", nullable=false)
     */
    private $wordson;

    /**
     * @var string
     *
     * @ORM\Column(name="wordfather", type="string", nullable=false)
     */
    private $wordfather;



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
     * Set wordson
     *
     * @param string $wordson
     *
     * @return Lkeywords
     */
    public function setWordson($wordson)
    {
        $this->wordson = $wordson;

        return $this;
    }

    /**
     * Get wordson
     *
     * @return string
     */
    public function getWordson()
    {
        return $this->wordson;
    }

    /**
     * Set wordfather
     *
     * @param string $wordfather
     *
     * @return Lkeywords
     */
    public function setWordfather($wordfather)
    {
        $this->wordfather = $wordfather;

        return $this;
    }

    /**
     * Get wordfather
     *
     * @return string
     */
    public function getWordfather()
    {
        return $this->wordfather;
    }
}
