<?php

namespace Evento\EventoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventoUser
 *
 * @ORM\Table(name="tb_evento_user")
 * @ORM\Entity(repositoryClass="Evento\EventoBundle\Repository\EventoUserRepository")
 */
class EventoUser
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
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_evento", type="integer")
     */
    private $idEvento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inscricao", type="datetimetz")
     */
    private $dtInscricao;


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
     * Set idUser
     *
     * @param integer $idUser
     * @return EventoUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idEvento
     *
     * @param integer $idEvento
     * @return EventoUser
     */
    public function setIdEvento($idEvento)
    {
        $this->idEvento = $idEvento;

        return $this;
    }

    /**
     * Get idEvento
     *
     * @return integer 
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }

    /**
     * Set dtInscricao
     *
     * @param \DateTime $dtInscricao
     * @return EventoUser
     */
    public function setDtInscricao($dtInscricao)
    {
        $this->dtInscricao = $dtInscricao;

        return $this;
    }

    /**
     * Get dtInscricao
     *
     * @return \DateTime 
     */
    public function getDtInscricao()
    {
        return $this->dtInscricao;
    }
}
