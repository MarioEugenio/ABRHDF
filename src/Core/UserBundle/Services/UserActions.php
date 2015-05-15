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
        $this->repository = $em->getRepository("CoreUserBundle:User");
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

    public function getEstados()
    {
        $this->estadoRep = $this->entityManager->getRepository("CoreUserBundle:Estado");
        $estados = $this->estadoRep->findAll();
        $result = array();
        if ($estados) {
            foreach($estados as $estado){
                $result[] = array(
                    'id' => $estado->getId(),
                    'estado' => $estado->getEstado()
                );
            }
        }

        return $result;
    }

    public function getCidadePorEstado($id)
    {
        $this->cidadeRep = $this->entityManager->getRepository("CoreUserBundle:Cidade");
        $cidades = $this->cidadeRep->findBy(array('idUf' => $id));
        $result = array();
        if ($cidades) {
            foreach($cidades as $cidade){
                $result[] = array(
                    'id' => $cidade->getId(),
                    'noCidade' => $cidade->getNoCidade()
                );
            }
        }

        return $result;
    }
}