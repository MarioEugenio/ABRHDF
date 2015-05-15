<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="tb_estado")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\EstadoRepository")
 */
class Estado extends Entity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $abreviacao
     *
     * @ORM\Column(name="abreviacao", type="string", length=255)
     */
    private $abreviacao;

    /**
     * @var string $estado
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * Set id
     *
     * @param string $Id
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
     * Set abreviacao
     *
     * @param string $Abreviacao
     */
    public function setAbreviacao ($Abreviacao)
    {
        $this->abreviacao = $Abreviacao;
    }

    /**
     * Get abreviacao
     *
     * @return string
     */
    public function getAbreviacao ()
    {
        return $this->abreviacao;
    }

    /**
     * Set estado
     *
     * @param string $Estado
     */
    public function setEstado ($Estado)
    {
        $this->estado = $Estado;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado ()
    {
        return $this->estado;
    }

    /**
     * Set co_country
     *
     * @param integer $coCountry
     */
    public function setCoCountry ($coCountry)
    {
        $this->co_country = $coCountry;
    }

    /**
     * Get co_country
     *
     * @return integer
     */
    public function getCoCountry ()
    {
        return $this->co_country;
    }
}
