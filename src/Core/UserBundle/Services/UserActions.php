<?php

namespace Core\UserBundle\Services;

use Core\UserBundle\Entity\Complemento;
use Core\UserBundle\Entity\Contato;
use Core\UserBundle\Entity\Empresa;
use Core\UserBundle\Entity\User;
use Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;
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
    public function save($objData, $tipoPessoa)
    {
        $entity = new User($objData['form']);

        if (isset($objData['id'])) {
            $entity = $this->find($objData['id']);
            $entity->setData($objData);
        }
        $entity->setDtCadastro(new \DateTime());
        $entity->setFlActive(true);
        if (isset($objData['form']['dtNascimento']))
        {
            $date = new \DateTime($objData['form']['dtNascimento']);
            $date->setTime(0,0,0);
            $entity->setDtNascimento($date);
        }
        $entity->setTipoUser($tipoPessoa);
        $entity = $this->repository->save($entity);

        $this->cidadeRep = $this->entityManager->getRepository("CoreUserBundle:Cidade");
        $this->estadoRep = $this->entityManager->getRepository("CoreUserBundle:Estado");

        if(isset($objData['contato'])) {
            $contato = new Contato($objData['contato']);
            if(isset($objData['contato']['celular'])) {
                $contato->setCelular((int)$objData['contato']['celular']);
            }
            if(isset($objData['contato']['comercial'])) {
                $contato->setComercial((int)$objData['contato']['comercial']);
            }
            $contato->setCidade($this->cidadeRep->find((int)$objData['contato']['cidade']));
            $contato->setEstado($this->estadoRep->find((int)$objData['contato']['estado']));
            $contato->setUser($entity);
            $this->contatoRep = $this->entityManager->getRepository("CoreUserBundle:Contato");
            $this->contatoRep->save($contato);
        }

        if(isset($objData['complemento'])) {
            $complemento = new Complemento($objData['complemento']);
            if(isset($objData['complemento']['telefone']))
            {
                $complemento->setTelefone((int) $objData['complemento']['telefone']);
            }
            $this->complementoRep = $this->entityManager->getRepository("CoreUserBundle:Complemento");
            $complemento->setUser($entity);
            $this->complementoRep->save($complemento);
        }

        if(isset($objData['empresa']))
        {
            $empresa = new Empresa($objData['empresa']);
            $this->empresaRep = $this->entityManager->getRepository("CoreUserBundle:Empresa");
            $empresa->setUser($entity);
            $this->empresaRep->save($empresa);
        }

        return $entity;
    }

    public function remover($id)
    {
        $entity = $this->findOneById($id);
        $entity->setFlActive(false);
        $this->repository->save($entity);
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

    public function getTipoPessoa($nome)
    {
        $this->tipoPessoaRep = $this->entityManager->getRepository("CoreUserBundle:TipoUser");
        $tipoPessoa = $this->tipoPessoaRep->findBy(array('nome' => $nome));
        return current($tipoPessoa);
    }

    public function getListUser($tipoPessoa, $params = array())
    {
        if (!isset($params['page']))
        {
            $params['page'] = 1;
        }

        /** @var Paginator $paginator */
        $paginator = $this->repository->getListUser($tipoPessoa, $params);
        $objResult = array();
        if ($paginator->getIterator())
        {
            /** @var User $user */
            foreach($paginator->getIterator() as $user)
            {
                $objResult[] = array(
                    'id' => $user->getId(),
                    'nome' => $user->getNome(),
                    'email' => $user->getEmail()
                );
            }
        }

        $pageEnd = $params['page'] * 20;
        if ($pageEnd > $paginator->count()) {
            $pageEnd = $paginator->count();
        }
        return array(
            'itemPerPage' => 20,
            'pageEnd' => $pageEnd,
            'items' => $objResult,
            'count' => $paginator->count(),
            'page' => $params['page'],
            'pageCount' => (int)ceil($paginator->count() / 20),
        );
    }
}