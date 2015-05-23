<?php

namespace Evento\EventoBundle\Services;

use Core\BaseBundle\Entity\Entity;
use Evento\EventoBundle\Entity\Evento;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;

class EventoUserActions
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
        $this->repository = $em->getRepository("EventoEventoBundle:Evento");
    }

    /**
    * metodo responsavel por salvar dados
    */
    public function save(Entity $entity)
    {
        $this->repository->save($entity);

        return $entity;
    }

    public function findBy($params = array())
    {
        return $this->repository->findBy($params);
    }

    public function findOneById($id = 0) {
        return $this->repository->findOneBy(array('id' => $id));
    }

    public function find($id = 0) {
        return $this->repository->find($id);
    }

    public function findAll() {
        return $this->repository->findAll();
    }
}