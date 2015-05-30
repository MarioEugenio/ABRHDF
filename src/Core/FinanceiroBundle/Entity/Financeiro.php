<?php

namespace Core\FinanceiroBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\JoinColumn;
use Tritoq\Bundle\ManagerBoletoBundle\Entity\Boleto;

/**
 * Financeiro
 *
 * @ORM\Table(name="tb_financeiro")
 * @ORM\Entity(repositoryClass="Core\FinanceiroBundle\Repository\FinanceiroRepository")
 */
class Financeiro extends Entity
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
     * @var float
     *
     * @ORM\Column(name="valor", type="float")
     */
    private $valor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCadastro", type="datetime")
     */
    private $dataCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataPagamento", type="datetime")
     */
    private $dataPagamento;

    /**
     * @var \Core\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @var \Core\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="usuarioGerador", referencedColumnName="id")
     */
    private $usuarioGerador;

    /**
     * @ManyToMany(targetEntity="Tritoq\Bundle\ManagerBoletoBundle\Entity\Boleto")
     * @JoinTable(name="financeiro_boletos",
     *      joinColumns={@JoinColumn(name="boleto_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="id", referencedColumnName="id")}
     *      )
     **/
    private $boletos;

    /**
     * @var float
     *
     * @ORM\Column(name="valorPagamento", type="float")
     */
    private $valorPagamento;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoPagamento", type="string", length=1)
     */
    private $tipoPagamento;

    /**
     * @var string
     *
     * @ORM\Column(name="formaPagamento", type="string", length=1)
     */
    private $formaPagamento;


    public function __construct($data = array()) {
        $this->__construct($data);

        $this->boletos = new ArrayCollection();
    }

    /**
     * @param mixed $boletos
     */
    public function addBoletos(Boleto $boletos)
    {
        $this->boletos[] = $boletos;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBoletos()
    {
        return $this->boletos;
    }

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
     * Set valor
     *
     * @param float $valor
     * @return Financeiro
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param \DateTime $dataCadastro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    /**
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set dataPagamento
     *
     * @param \DateTime $dataPagamento
     * @return Financeiro
     */
    public function setDataPagamento($dataPagamento)
    {
        $this->dataPagamento = $dataPagamento;

        return $this;
    }

    /**
     * Get dataPagamento
     *
     * @return \DateTime 
     */
    public function getDataPagamento()
    {
        return $this->dataPagamento;
    }

    /**
     * @param \Core\UserBundle\Entity\User $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return \Core\UserBundle\Entity\User
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param \Core\UserBundle\Entity\User $usuarioGerador
     */
    public function setUsuarioGerador($usuarioGerador)
    {
        $this->usuarioGerador = $usuarioGerador;
    }

    /**
     * @return \Core\UserBundle\Entity\User
     */
    public function getUsuarioGerador()
    {
        return $this->usuarioGerador;
    }

    /**
     * Set valorPagamento
     *
     * @param float $valorPagamento
     * @return Financeiro
     */
    public function setValorPagamento($valorPagamento)
    {
        $this->valorPagamento = $valorPagamento;

        return $this;
    }

    /**
     * Get valorPagamento
     *
     * @return float 
     */
    public function getValorPagamento()
    {
        return $this->valorPagamento;
    }

    /**
     * Set tipoPagamento
     *
     * @param string $tipoPagamento
     * @return Financeiro
     */
    public function setTipoPagamento($tipoPagamento)
    {
        $this->tipoPagamento = $tipoPagamento;

        return $this;
    }

    /**
     * Get tipoPagamento
     *
     * @return string 
     */
    public function getTipoPagamento()
    {
        return $this->tipoPagamento;
    }

    /**
     * Set formaPagamento
     *
     * @param string $formaPagamento
     * @return Financeiro
     */
    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;

        return $this;
    }

    /**
     * Get formaPagamento
     *
     * @return string 
     */
    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }
}
