<?php

namespace Evento\EventoBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Core\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="tb_evento")
 * @ORM\Entity(repositoryClass="Evento\EventoBundle\Repository\EventoRepository")
 */
class Evento extends Entity
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
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=2000)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscricaoInicio", type="datetime", nullable=true)
     */
    private $inscricaoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscricaoFim", type="datetime", nullable=true)
     */
    private $inscricaoFim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicio", type="datetime", nullable=true)
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="datetime", nullable=true)
     */
    private $dataFim;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=2000, nullable=true)
     */
    private $local;

    /**
     * @var integer
     *
     * @ORM\Column(name="cargaHoraria", type="integer", nullable=true)
     */
    private $cargaHoraria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCadastro", type="datetime")
     */
    private $dataCadastro;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicar", type="boolean", nullable=true)
     */
    private $publicar;

    /**
     * @var float
     *
     * @ORM\Column(name="valorSocio", type="float", nullable=true)
     */
    private $valorSocio;

    /**
     * @var float
     *
     * @ORM\Column(name="valorNSocio", type="float", nullable=true)
     */
    private $valorNSocio;

    /**
     * @var float
     *
     * @ORM\Column(name="valorEstudante", type="float", nullable=true)
     */
    private $valorEstudante;

    /**
     * @var float
     *
     * @ORM\Column(name="valorEstudanteAssociado", type="float", nullable=true)
     */
    private $valorEstudanteAssociado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eventoPago", type="boolean", nullable=true)
     */
    private $eventoPago;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;


    /**
     * @ORM\OneToMany(targetEntity="Evento\EventoBundle\Entity\Desconto", mappedBy="evento")
     */
    protected $descontos;


    public function __construct($data)
    {
        $this->setData($data);
        $this->descontos = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $descontos
     */
    public function setDescontos($descontos)
    {
        $this->descontos = $descontos;
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
     * Set titulo
     *
     * @param string $titulo
     * @return Evento
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Evento
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set inscricaoInicio
     *
     * @param \DateTime $inscricaoInicio
     * @return Evento
     */
    public function setInscricaoInicio($inscricaoInicio)
    {
        $this->inscricaoInicio = new \DateTime($inscricaoInicio);

        return $this;
    }

    /**
     * Get inscricaoInicio
     *
     * @return \DateTime 
     */
    public function getInscricaoInicio()
    {
        return $this->inscricaoInicio;
    }

    /**
     * Set inscricaoFim
     *
     * @param \DateTime $inscricaoFim
     * @return Evento
     */
    public function setInscricaoFim($inscricaoFim)
    {
        $this->inscricaoFim = new \DateTime($inscricaoFim);

        return $this;
    }

    /**
     * Get inscricaoFim
     *
     * @return \DateTime 
     */
    public function getInscricaoFim()
    {
        return $this->inscricaoFim;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Evento
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = new \DateTime($dataInicio);

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Evento
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = new \DateTime($dataFim);

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set local
     *
     * @param string $local
     * @return Evento
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return string 
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * Set cargaHoraria
     *
     * @param integer $cargaHoraria
     * @return Evento
     */
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;

        return $this;
    }

    /**
     * Get cargaHoraria
     *
     * @return integer 
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return Evento
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set publicar
     *
     * @param boolean $publicar
     * @return Evento
     */
    public function setPublicar($publicar)
    {
        $this->publicar = $publicar;

        return $this;
    }

    /**
     * Get publicar
     *
     * @return boolean 
     */
    public function getPublicar()
    {
        return $this->publicar;
    }

    /**
     * Set valorSocio
     *
     * @param float $valorSocio
     * @return Evento
     */
    public function setValorSocio($valorSocio)
    {
        $this->valorSocio = $valorSocio;

        return $this;
    }

    /**
     * Get valorSocio
     *
     * @return float 
     */
    public function getValorSocio()
    {
        return $this->valorSocio;
    }

    /**
     * Set valorNSocio
     *
     * @param float $valorNSocio
     * @return Evento
     */
    public function setValorNSocio($valorNSocio)
    {
        $this->valorNSocio = $valorNSocio;

        return $this;
    }

    /**
     * Get valorNSocio
     *
     * @return float 
     */
    public function getValorNSocio()
    {
        return $this->valorNSocio;
    }

    /**
     * Set valorEstudante
     *
     * @param float $valorEstudante
     * @return Evento
     */
    public function setValorEstudante($valorEstudante)
    {
        $this->valorEstudante = $valorEstudante;

        return $this;
    }

    /**
     * Get valorEstudante
     *
     * @return float 
     */
    public function getValorEstudante()
    {
        return $this->valorEstudante;
    }

    /**
     * Set valorEstudanteAssociado
     *
     * @param float $valorEstudanteAssociado
     * @return Evento
     */
    public function setValorEstudanteAssociado($valorEstudanteAssociado)
    {
        $this->valorEstudanteAssociado = $valorEstudanteAssociado;

        return $this;
    }

    /**
     * Get valorEstudanteAssociado
     *
     * @return float 
     */
    public function getValorEstudanteAssociado()
    {
        return $this->valorEstudanteAssociado;
    }

    /**
     * Set eventoPago
     *
     * @param boolean $eventoPago
     * @return Evento
     */
    public function setEventoPago($eventoPago)
    {
        $this->eventoPago = $eventoPago;

        return $this;
    }

    /**
     * Get eventoPago
     *
     * @return boolean 
     */
    public function getEventoPago()
    {
        return $this->eventoPago;
    }

    /**
     * @param boolean $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * @return boolean
     */
    public function getAtivo()
    {
        return $this->ativo;
    }


}
