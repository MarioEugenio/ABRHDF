<?php

namespace Evento\EventoBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Desconto
 *
 * @ORM\Table(name="tb_desconto")
 * @ORM\Entity(repositoryClass="Evento\EventoBundle\Repository\DescontoRepository")
 */
class Desconto extends Entity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="descontoPorcentagem", type="boolean")
     */
    private $descontoPorcentagem;

    /**
     * @var integer
     *
     * @ORM\Column(name="porcentagem", type="integer")
     */
    private $porcentagem;

    /**
     * @var float
     *
     * @ORM\Column(name="valorDesconto", type="float")
     */
    private $valorDesconto;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoDesconto", type="string", length=255, nullable=true)
     */
    private $codigoDesconto;

    /**
     * @var \Core\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="pessoaFisica", referencedColumnName="id")
     */
    private $pessoaFisica;

    /**
     * @var \Core\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="pessoaJuridica", referencedColumnName="id")
     */
    private $pessoaJuridica;

    /**
     * @var \Evento\EventoBundle\Entity\Evento
     *
     * @ORM\ManyToOne(targetEntity="Evento\EventoBundle\Entity\Evento", cascade={"persist"})
     * @ORM\JoinColumn(name="evento", referencedColumnName="id")
     */
    private $evento;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $codigoDesconto
     */
    public function setCodigoDesconto($codigoDesconto)
    {
        $this->codigoDesconto = $codigoDesconto;
    }

    /**
     * @return string
     */
    public function getCodigoDesconto()
    {
        return $this->codigoDesconto;
    }

    /**
     * @param boolean $descontoPorcentagem
     */
    public function setDescontoPorcentagem($descontoPorcentagem)
    {
        $this->descontoPorcentagem = $descontoPorcentagem;
    }

    /**
     * @return boolean
     */
    public function getDescontoPorcentagem()
    {
        return $this->descontoPorcentagem;
    }

    /**
     * @param int $porcentagem
     */
    public function setPorcentagem($porcentagem)
    {
        $this->porcentagem = $porcentagem;
    }

    /**
     * @return int
     */
    public function getPorcentagem()
    {
        return $this->porcentagem;
    }

    /**
     * @param mixed $evento
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;
    }

    /**
     * @return mixed
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * @param mixed $pessoaFisica
     */
    public function setPessoaFisica($pessoaFisica)
    {
        $this->pessoaFisica = $pessoaFisica;
    }

    /**
     * @return mixed
     */
    public function getPessoaFisica()
    {
        return $this->pessoaFisica;
    }

    /**
     * @param mixed $pessoaJuridica
     */
    public function setPessoaJuridica($pessoaJuridica)
    {
        $this->pessoaJuridica = $pessoaJuridica;
    }

    /**
     * @return mixed
     */
    public function getPessoaJuridica()
    {
        return $this->pessoaJuridica;
    }

    /**
     * @param float $valorDesconto
     */
    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto = $valorDesconto;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }


}
