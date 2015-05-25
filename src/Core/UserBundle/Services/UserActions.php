<?php

namespace Core\UserBundle\Services;

use Core\UserBundle\Entity\Complemento;
use Core\UserBundle\Entity\Contato;
use Core\UserBundle\Entity\Dependentes;
use Core\UserBundle\Entity\Empresa;
use Core\UserBundle\Entity\Representantes;
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

        if (isset($objData['form']['id'])) {
            $entity = $this->find($objData['form']['id']);
            $entity->setData($objData['form']);
        }
        $entity->setDtCadastro(new \DateTime());
        $entity->setFlActive(true);
        $entity->setTipoUser($tipoPessoa);
        $entity = $this->repository->save($entity);

        $this->cidadeRep = $this->entityManager->getRepository("CoreUserBundle:Cidade");
        $this->estadoRep = $this->entityManager->getRepository("CoreUserBundle:Estado");

        if(isset($objData['contato'])) {
            $this->contatoRep = $this->entityManager->getRepository("CoreUserBundle:Contato");
            /** @var Contato $contato */
            $contato = $this->contatoRep->findOneBy(array('user' => $entity));
            if (!$contato) {
                $contato = new Contato($objData['contato']);
            } else {
                $contato->setData($objData['contato']);
            }
            if(isset($objData['contato']['celular'])) {
                $contato->setCelular((int)$objData['contato']['celular']);
            }
            if(isset($objData['contato']['comercial'])) {
                $contato->setComercial((int)$objData['contato']['comercial']);
            }
            $contato->setCidade($this->cidadeRep->find((int)$objData['contato']['cidade']));
            $contato->setEstado($this->estadoRep->find((int)$objData['contato']['estado']));
            $contato->setUser($entity);
            $this->contatoRep->save($contato);
        }

        if(isset($objData['complemento'])) {
            $this->complementoRep = $this->entityManager->getRepository("CoreUserBundle:Complemento");
            $complemento = $this->complementoRep->findOneBy(array('user' => $entity));
            if (!$complemento) {
                $complemento = new Complemento($objData['complemento']);
            } else {
                $complemento->setData($objData['complemento']);
            }
            if(isset($objData['complemento']['telefone']))
            {
                $complemento->setTelefone((int) $objData['complemento']['telefone']);
            }
            $complemento->setUser($entity);
            $this->complementoRep->save($complemento);
        }

        if(isset($objData['empresa']))
        {
            $this->empresaRep = $this->entityManager->getRepository("CoreUserBundle:Empresa");
            $empresa = $this->empresaRep->findOneBy(array('user' => $entity));
            if (!$empresa) {
                $empresa = new Empresa($objData['empresa']);
            } else {
                $empresa->setData($objData['empresa']);
            }
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
        /** @var Paginator $paginator */
        $paginator = $this->repository->getListUser($tipoPessoa, $params);
        $objResult = array();
        if ($paginator->getIterator())
        {
            /** @var User $user */
            foreach($paginator->getIterator() as $user)
            {
                $data = array(
                    'id' => $user->getId(),
                    'nome' => $user->getNome(),
                    'email' => $user->getEmail(),
                    'cnpj' => '',
                    'nomeFantasia' => ''
                );
                if ($user->getTipoUser()->getId() == 2){
                    $this->empresaRep = $this->entityManager->getRepository("CoreUserBundle:Empresa");
                    /** @var Empresa $empresa */
                    $empresa = $this->empresaRep->findOneBy(array('user' => $user));

                    if($empresa) {
                        $data['cnpj'] = $empresa->getCnpj();
                        $data['nomeFantasia'] = $empresa->getNomeFantasia();
                    }
                }
                $objResult[] = $data;
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

    public function getInfoUser($id)
    {
        /** @var User $user */
        $user =  $this->repository->find($id);
        $arrUser = array();
        $arrContato = null;
        $arrComplemento = null;
        $arrEmpresa = null;

        if ($user){
            $date = null;
            if ($user->getDtNascimento())
            {
                $date = $user->getDtNascimento();
            }
            $arrUser = array(
                'id' => $user->getId(),
                'nome' => $user->getNome(),
                'cpf' => $user->getCpf(),
                'email' => $user->getEmail(),
                'dtNascimento' => $date,
                'sexo' => $user->getSexo(),
                'rg' => (int) $user->getRg(),
                'emissor' => $user->getEmissor(),
                'senha' => $user->getSenha()
            );

            $this->contatoRep = $this->entityManager->getRepository("CoreUserBundle:Contato");
            /** @var Contato $contato */
            $contato = $this->contatoRep->findOneBy(array('user' => $user));
            if($contato) {
                $arrContato = array(
                    'telefone' => $contato->getTelefone(),
                    'celular' => $contato->getCelular(),
                    'comercial' => $contato->getComercial(),
                    'fax' => (int) $contato->getFax(),
                    'endereco' => $contato->getEndereco(),
                    'bairro' => $contato->getBairro(),
                    'complemento' => $contato->getComplemento(),
                    'estado' => $contato->getEstado()->getId(),
                    'cidade' => $contato->getCidade()->getId(),
                    'cep' => (int) $contato->getCep(),
                    'email' => $contato->getEmail()
                );
            }

            $this->complementoRep = $this->entityManager->getRepository("CoreUserBundle:Complemento");
            /** @var Complemento $complemento */
            $complemento = $this->complementoRep->findOneBy(array('user' => $user));

            if($complemento) {
                $arrComplemento = array(
                    'profissao' => $complemento->getProfissao(),
                    'cargo' => $complemento->getCargo(),
                    'grauInstrucao' => $complemento->getGrauInstrucao(),
                    'estadoCivil' => $complemento->getEstadoCivil()
                );
            }

            $this->empresaRep = $this->entityManager->getRepository("CoreUserBundle:Empresa");
            /** @var Empresa $empresa */
            $empresa = $this->empresaRep->findOneBy(array('user' => $user));

            if($empresa) {
                $arrEmpresa = array(
                    'cnpj' => $empresa->getCnpj(),
                    'inscEstadual' => $empresa->getInscEstadual(),
                    'razaoSocial' => $empresa->getRazaoSocial(),
                    'nomeFantasia' => $empresa->getNomeFantasia()
                );
            }
        }

        return array(
            'form' => $arrUser,
            'contato' => $arrContato,
            'complemento' => $arrComplemento,
            'empresa' => $arrEmpresa
        );
    }

    /**
     * metodo responsavel por salvar dados
     */
    public function saveRepresentante($objData)
    {

        $juridico = $this->find($objData['form']['id_juridico']);
        unset($objData['form']['id_juridico']);
        $this->representantesRep = $this->entityManager->getRepository("CoreUserBundle:Representantes");
        $entity = new Representantes($objData['form']);

        if (isset($objData['form']['id'])) {
            $entity = $this->representantesRep->find($objData['form']['id']);
            $entity->setData($objData['form']);
        }
        $entity->setFlActive(true);
        $entity->setPessoaJuridica($juridico);
        $entity = $this->representantesRep->save($entity);

        return $entity;
    }

    public function getInfoRepresentantes($id)
    {

        $this->representantesRep = $this->entityManager->getRepository("CoreUserBundle:Representantes");
        /** @var Representantes $user */
        $user =  $this->representantesRep->find($id);
        $arrUser = null;

        if ($user){
            $date = null;
            if ($user->getDataNascimento())
            {
                $date = $user->getDataNascimento();
            }
            $arrUser = array(
                'id' => $user->getId(),
                'nome' => $user->getNome(),
                'email' => $user->getEmail(),
                'dataNascimento' => $date,
                'sexo' => $user->getSexo(),
                'cargo' => $user->getCargo(),
                'celular' => $user->getCelular(),
                'telefone' => $user->getTelefone(),
                'id_juridico' => $user->getPessoaJuridica()->getId()
            );
        }

        return array(
            'form' => $arrUser,
        );
    }

    public function getListRepresentantes($params = array())
    {
        if (!isset($params['page']))
        {
            $params['page'] = 0;
        }

        /** @var Paginator $paginator */
        $paginator = $this->repository->getListRepresentantes($params);
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

    public function removerRepresentantes($id)
    {
        $this->representantesRep = $this->entityManager->getRepository("CoreUserBundle:Representantes");
        /** @var Representantes $user */
        $user =  $this->representantesRep->find($id);
        $user->setFlActive(false);
        $this->representantesRep->save($user);
    }

    /**
     * metodo responsavel por salvar dados
     */
    public function saveDependentes($objData)
    {

        $id_fisico = $this->find($objData['form']['id_fisico']);
        unset($objData['form']['id_fisico']);
        $this->dependentesRep = $this->entityManager->getRepository("CoreUserBundle:Dependentes");
        $entity = new Dependentes($objData['form']);

        if (isset($objData['form']['id'])) {
            $entity = $this->dependentesRep->find($objData['form']['id']);
            $entity->setData($objData['form']);
        }
        $entity->setFlActive(true);
        $entity->setPessoaFisica($id_fisico);
        $entity = $this->dependentesRep->save($entity);

        return $entity;
    }

    public function getInfoDependentes($id)
    {

        $this->dependentesRep = $this->entityManager->getRepository("CoreUserBundle:Dependentes");
        /** @var Dependentes $user */
        $user =  $this->dependentesRep->find($id);
        $arrUser = null;

        if ($user){
            $date = null;
            if ($user->getDataNascimento())
            {
                $date = $user->getDataNascimento();
            }
            $arrUser = array(
                'id' => $user->getId(),
                'nome' => $user->getNome(),
                'email' => $user->getEmail(),
                'dataNascimento' => $date,
                'sexo' => $user->getSexo(),
                'parentesco' => $user->getParentesco(),
                'id_fisico' => $user->getPessoaFisica()->getId()
            );
        }

        return array(
            'form' => $arrUser,
        );
    }

    public function getListDependentes($params = array())
    {
        if (!isset($params['page']))
        {
            $params['page'] = 0;
        }

        /** @var Paginator $paginator */
        $paginator = $this->repository->getListDependentes($params);
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

    public function removerDependentes($id)
    {
        $this->dependentesRep = $this->entityManager->getRepository("CoreUserBundle:Dependentes");
        /** @var Representantes $user */
        $user =  $this->dependentesRep->find($id);
        $user->setFlActive(false);
        $this->dependentesRep->save($user);
    }

    public function getInfoEmail($post) {
        $user = $this->repository->getInfoEmail($post);
        if($user){
            return false;
        } else {
            return true;
        }
    }
}