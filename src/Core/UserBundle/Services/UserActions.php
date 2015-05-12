<?php

namespace Core\UserBundle\Services;

use Core\UserBundle\Entity\User;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserActions
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
        $this->repository = $em->getRepository("COLIHUserBundle:User");
    }

    /**
    * metodo responsavel por salvar dados
    */
    public function save($entity)
    {
        $this->repository->save($entity);

        return $entity;
    }

    public function remover($id)
    {
        $entity = $this->findOneById($id);
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    public function autenticar(User $entity)
    {
        if (!$entity->getEmail()) {
            throw new Exception('Digite o campo login');
        }

        if (!$entity->getSenha()) {
            throw new Exception('Digite o campo senha');
        }
        $objResult = $this->repository->findOneBy(array('email' => $entity->getEmail(), 'senha' => $entity->getSenha()));

        if ($objResult instanceof User) {
            return true;
        }

        return false;
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