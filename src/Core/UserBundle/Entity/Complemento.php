<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Complemento
 *
 * @ORM\Table(name="tb_complemento")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\ComplementoRepository")
 */
class Complemento extends Entity
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
     * @ORM\Column(name="profissao", type="string", length=255, nullable=true)
     */
    private $profissao;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255, nullable=true)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="grauInstrucao", type="string", length=255, nullable=true)
     */
    private $grauInstrucao;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoCivil", type="string", length=255, nullable=true)
     */
    private $estadoCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="integer", length=255, nullable=true)
     */
    private $telefone;

    /**
     * @var User $tipoUser
     * @ORM\ManyToOne(targetEntity="\Core\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;

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
     * Set profissao
     *
     * @param string $profissao
     * @return User
     */
    public function setProfissao($profissao)
    {
        $this->profissao = $profissao;

        return $this;
    }

    /**
     * Get profissao
     *
     * @return string
     */
    public function getProfissao()
    {
        return $this->profissao;
    }

    /**
     * Set $cargo
     *
     * @param string $cargo
     * @return User
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get $cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setGrauInstrucao($value)
    {
        $this->grauInstrucao = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getGrauInstrucao()
    {
        return $this->grauInstrucao;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setEstadoCivil($value)
    {
        $this->estadoCivil = $value;

        return $this;
    }

    /**
     * Get
     *
     * @return string
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set
     *
     * @param string $value
     * @return User
     */
    public function setTelefone($value)
    {
        $this->telefone = $value;

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
}
