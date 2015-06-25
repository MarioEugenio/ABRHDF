<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Evento\EventoBundle\Entity\Evento;

/**
 * User
 *
 * @ORM\Table(name="tb_user")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\UserRepository")
 */
class User extends Entity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", nullable=true)
     */
    private $cpf;

    /**
     * @var datetime
     *
     * @ORM\Column(name="dtNascimento", type="datetime", nullable=true)
     */
    private $dtNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="emissor", type="string", length=10, nullable=true)
     */
    private $emissor;

    /**
     * @var string
     *
     * @ORM\Column(name="dtCadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var TipoUser $tipoUser
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\TipoUser")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_tipo", referencedColumnName="id", nullable=false)
     * })
     */
    private $tipoUser;

    /**
     * @var string
     *
     * @ORM\Column(name="flActive", type="boolean", nullable=true)
     */
    private $flActive;

    /**
     * @var string
     *
     * @ORM\Column(name="flAdmin", type="boolean", nullable=true)
     */
    private $flAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="flAssociado", type="boolean", nullable=true)
     */
    private $flAssociado;

    /**
     * @ORM\OneToMany(targetEntity="Evento\EventoBundle\Entity\Desconto", mappedBy="pessoaJuridica")
     */
    protected $descontoPessoaJuridica;

    /**
     * @ORM\OneToMany(targetEntity="Evento\EventoBundle\Entity\Desconto", mappedBy="pessoaFisica")
     */
    protected $descontoPessoaFisica;


    public function __construct(array $data = null)
    {
        $this->setData($data);
        $this->descontoPessoaJuridica = new ArrayCollection();
        $this->descontoPessoaFisica = new ArrayCollection();
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Set nome
     *
     * @param string $nome
     * @return User
     */
    public function setNome($nome)
    {
        $this->nome = strtoupper($nome);

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set login
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = strtoupper($email);

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return User
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setCpf($value)
    {
        $this->cpf = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setDtNascimento($value)
    {
        $this->dtNascimento = new \DateTime($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setSexo($value)
    {
        $this->sexo = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
 * Set
 *
 * @param string $value
 * @return User
 */
    public function setRg($value)
    {
        $this->rg = strtoupper($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setEmissor($value)
    {
        $this->emissor = strtoupper($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getEmissor()
    {
        return $this->emissor;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setDtCadastro($value)
    {
        $this->dtCadastro = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param int $tipoUser
     */
    public function setTipoUser($tipoUser)
    {
        $this->tipoUser = $tipoUser;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getTipoUser()
    {
        return $this->tipoUser;
    }

    /**
     * @param mixed $descontoPessoaFisica
     */
    public function setDescontoPessoaFisica($descontoPessoaFisica)
    {
        $this->descontoPessoaFisica = $descontoPessoaFisica;
    }

    /**
     * @return mixed
     */
    public function getDescontoPessoaFisica()
    {
        return $this->descontoPessoaFisica;
    }

    /**
     * @param mixed $descontoPessoaJuridica
     */
    public function setDescontoPessoaJuridica($descontoPessoaJuridica)
    {
        $this->descontoPessoaJuridica = $descontoPessoaJuridica;
    }

    /**
     * @return mixed
     */
    public function getDescontoPessoaJuridica()
    {
        return $this->descontoPessoaJuridica;
    }

    /**
     * @param int $value
     */
    public function setFlActive($value)
    {
        $this->flActive = $value;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getFlActive()
    {
        return $this->flActive;
    }

    /**
     * @param int $value
     */
    public function setFlAdmin($value)
    {
        $this->flAdmin = $value;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getFlAdmin()
    {
        return $this->flAdmin;
    }

    /**
     * @param int $value
     */
    public function setFlAssociado($value)
    {
        $this->flAssociado = $value;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getFlAssociado()
    {
        return $this->flAssociado;
    }
}
