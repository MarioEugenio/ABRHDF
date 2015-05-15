<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contato
 *
 * @ORM\Table(name="tb_contato")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\ContatoRepository")
 */
class Contato extends Entity
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
     * @var integer
     *
     * @ORM\Column(name="telefone", type="integer", length=255, nullable=true)
     */
    private $telefone;

    /**
     * @var integer
     *
     * @ORM\Column(name="comercial", type="integer", length=255, nullable=true)
     */
    private $comercial;

    /**
     * @var integer
     *
     * @ORM\Column(name="fax", type="integer", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="celular", type="integer", length=255, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

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
     * @var User $tipoUser
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;

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
     * Set
     *
     * @param string $telefone
     * @return User
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setComercial($value)
    {
        $this->comercial = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getComercial()
    {
        return $this->comercial;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setFax($value)
    {
        $this->fax = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setCelular($value)
    {
        $this->celular = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
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
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setEndereco($value)
    {
        $this->endereco = $value;

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
        $this->bairro = $value;

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
        $this->complemento = $value;

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
     * @param int $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
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
