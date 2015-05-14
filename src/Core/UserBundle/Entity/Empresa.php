<?php

namespace Core\UserBundle\Entity;

use Core\BaseBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="tb_empresa")
 * @ORM\Entity(repositoryClass="Core\UserBundle\Repository\EmpresaRepository")
 */
class Empresa extends Entity
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
     * @ORM\Column(name="cnpj", type="string", length=255, nullable=true)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="inscEstadual", type="string", length=255, nullable=true)
     */
    private $inscEstadual;

    /**
     * @var string
     *
     * @ORM\Column(name="razaoSocial", type="string", length=255, nullable=true)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="nomeFantasia", type="string", length=255, nullable=true)
     */
    private $nomeFantasia;

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
     * Set cnpj
     *
     * @param string $cnpj
     * @return User
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set $descricao
     *
     * @param string $descricao
     * @return User
     */
    public function setInscEstadual($inscEstadual)
    {
        $this->inscEstadual = $inscEstadual;

        return $this;
    }

    /**
     * Get $inscEstadual
     *
     * @return string
     */
    public function getInscEstadual()
    {
        return $this->inscEstadual;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     * @return User
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get razaoSocial
     *
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set nomeFantasia
     *
     * @param string $nomeFantasia
     * @return User
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    /**
     * Get nomeFantasia
     *
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
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
