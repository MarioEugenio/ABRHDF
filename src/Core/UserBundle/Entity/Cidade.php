<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="tb_cidade")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\CidadeRepository")
 */
class Cidade extends Entity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @var Estado $estado
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\Estado")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_uf", referencedColumnName="id")
     * })
     */
    private $idUf;

    /**
     * @var string $noCidade
     *
     * @ORM\Column(name="noCidade", type="string", length=255)
     */
    private $noCidade;

    /**
     * Set id
     *
     * @param integer $Id
     */
    public function setId ($Id)
    {
        $this->id = $Id;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * Set idUf
     *
     * @param integer $idUf
     */
    public function setidUf ($idUf)
    {
        $this->idUf = $idUf;
    }

    /**
     * Get idUf
     *
     * @return integer
     */
    public function getidUf ()
    {
        return $this->idUf;
    }

    /**
     * Set noCidade
     *
     * @param string $NoCidade
     */
    public function setNoCidade ($NoCidade)
    {
        $this->noCidade = $NoCidade;
    }

    /**
     * Get noCidade
     *
     * @return string
     */
    public function getNoCidade ()
    {
        return $this->noCidade;
    }
}
