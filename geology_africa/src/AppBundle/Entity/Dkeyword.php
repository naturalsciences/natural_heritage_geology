<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dkeyword
 *
 * @ORM\Table(name="dkeyword", uniqueConstraints={@ORM\UniqueConstraint(name="dkeyword_unique", columns={"id", "idcollection", "keyword"})}, indexes={@ORM\Index(name="IDX_F67CDF6D31E47808BF396750", columns={"idcollection", "id"})})
 * @ORM\Entity
 */
class Dkeyword
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pk", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dkeyword_pk_seq", allocationSize=1, initialValue=1)
     */
    private $pk;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", nullable=false)
     */
    private $keyword;

    /**
     * @var integer
     *
     * @ORM\Column(name="keywordlevel", type="smallint", nullable=false)
     */
    private $keywordlevel;

    /**
     * @var \AppBundle\Entity\Ddocument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Ddocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcollection", referencedColumnName="idcollection"),
     *   @ORM\JoinColumn(name="id", referencedColumnName="iddoc")
     * })
     */
    private $idcollection;



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
     * Set keyword
     *
     * @param string $keyword
     *
     * @return Dkeyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set keywordlevel
     *
     * @param integer $keywordlevel
     *
     * @return Dkeyword
     */
    public function setKeywordlevel($keywordlevel)
    {
        $this->keywordlevel = $keywordlevel;

        return $this;
    }

    /**
     * Get keywordlevel
     *
     * @return integer
     */
    public function getKeywordlevel()
    {
        return $this->keywordlevel;
    }

    /**
     * Set idcollection
     *
     * @param \AppBundle\Entity\Ddocument $idcollection
     *
     * @return Dkeyword
     */
    public function setIdcollection(\AppBundle\Entity\Ddocument $idcollection = null)
    {
        $this->idcollection = $idcollection;

        return $this;
    }

    /**
     * Get idcollection
     *
     * @return \AppBundle\Entity\Ddocument
     */
    public function getIdcollection()
    {
        return $this->idcollection;
    }
}
