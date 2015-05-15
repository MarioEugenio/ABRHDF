<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="cpf", type="integer", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @var string
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
     * @ORM\Column(name="rg", type="integer", nullable=true)
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
        $this->nome = $nome;

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
        $this->email = $email;

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
        $this->dtNascimento = $value;

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
        $this->rg = $value;

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
        $this->emissor = $value;

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
}
