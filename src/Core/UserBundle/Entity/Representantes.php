<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Representantes
 *
 * @ORM\Table(name="tb_representantes")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\RepresentantesRepository")
 */
class Representantes extends Entity
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
     * @ORM\Column(name="Nome", type="string", length=255)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20)
     */
    private $telefone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataNascimento", type="datetime")
     */
    private $dataNascimento;

    /**
     * @var \Core\UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="pessoaJuridica", referencedColumnName="id")
     */
    private $pessoaJuridica;

    /**
     * @var string
     *
     * @ORM\Column(name="flActive", type="boolean", nullable=true)
     */
    private $flActive;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255, nullable=true)
     */
    private $endereco;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255, nullable=true)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=255, nullable=true)
     */
    private $complemento;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=255, nullable=true)
     */
    private $cep;

    /**
     * @var Cidade $cidade
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\Cidade")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_cidade", referencedColumnName="id", nullable=false)
     * })
     */
    private $cidade;

    /**
     * @var Estado $estado
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_uf", referencedColumnName="id", nullable=false)
     * })
     */
    private $estado;

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
     * Set nome
     *
     * @param string $nome
     * @return Representantes
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
     * Set sexo
     *
     * @param string $sexo
     * @return Representantes
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Representantes
     */
    public function setCargo($cargo)
    {
        $this->cargo = strtoupper($cargo);

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Representantes
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
     * Set celular
     *
     * @param string $celular
     * @return Representantes
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     * @return Representantes
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string 
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     * @return Representantes
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = new \DateTime($dataNascimento);

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime 
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param \Core\UserBundle\Entity\User $pessoaJuridica
     */
    public function setPessoaJuridica($pessoaJuridica)
    {
        $this->pessoaJuridica = $pessoaJuridica;
    }

    /**
     * @return \Core\UserBundle\Entity\User
     */
    public function getPessoaJuridica()
    {
        return $this->pessoaJuridica;
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
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setEndereco($value)
    {
        $this->endereco = strtoupper($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setBairro($value)
    {
        $this->bairro = strtoupper($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setComplemento($value)
    {
        $this->complemento = strtoupper($value);

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setCep($value)
    {
        $this->cep = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param int $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param int $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
