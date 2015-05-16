<?php

namespace Evento\EventoBundle\Entity;

use Core\BaseBundle\Entity\Entity;
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
     * @ORM\Column(name="inscricaoInicio", type="datetime")
     */
    private $inscricaoInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="inscricaoFim", type="datetime")
     */
    private $inscricaoFim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicio", type="datetime")
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="datetime")
     */
    private $dataFim;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=2000)
     */
    private $local;

    /**
     * @var integer
     *
     * @ORM\Column(name="cargaHoraria", type="integer")
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
     * @ORM\Column(name="publicar", type="boolean")
     */
    private $publicar;

    /**
     * @var float
     *
     * @ORM\Column(name="valorSocio", type="float")
     */
    private $valorSocio;

    /**
     * @var float
     *
     * @ORM\Column(name="valorNSocio", type="float")
     */
    private $valorNSocio;

    /**
     * @var float
     *
     * @ORM\Column(name="valorEstudante", type="float")
     */
    private $valorEstudante;

    /**
     * @var float
     *
     * @ORM\Column(name="valorEstudanteAssociado", type="float")
     */
    private $valorEstudanteAssociado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="eventoPago", type="boolean")
     */
    private $eventoPago;

    /**
     * @ORM\OneToMany(targetEntity="Evento\EventoBundle\Entity\Desconto", mappedBy="evento")
     */
    protected $descontos;


    public function __construct()
    {
        $this->descontos = new ArrayCollection();
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
        $this->inscricaoInicio = $inscricaoInicio;

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
        $this->inscricaoFim = $inscricaoFim;

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
        $this->dataInicio = $dataInicio;

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
        $this->dataFim = $dataFim;

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
}
