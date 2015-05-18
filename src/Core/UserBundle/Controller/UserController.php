<?php

namespace Core\UserBundle\Controller;

use Core\BaseBundle\Controller\BaseController;
use Core\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserController extends BaseController
{
    /**
     * @Route("/user/logar", name="user_logar", options={"expose"=true})
     */
    public function logarAction()
    {
        return array();
    }

    /**
     * @Route("/user/lista", name="user_lista", options={"expose"=true})
     * @Template()
     */
    public function listaAction()
    {
        return array();
    }

    /**
     * @Route("/user/lista/juridico", name="user_lista_juridico", options={"expose"=true})
     * @Template()
     */
    public function listaJuridicoAction()
    {
        return array();
    }

    /**
     * @Route("/user/cadastro", name="user_cadastro", options={"expose"=true})
     * @Template()
     */
    public function cadastroAction()
    {
        return array();
    }

    /**
     * @Route("/user/cadastro/juridico", name="user_cadastro_juridico", options={"expose"=true})
     * @Template()
     */
    public function cadastroJuridicoAction()
    {
        return array();
    }

    /**
     * @Route("/user/cadastrar", name="user_cadastrar", options={"expose"=true})
     */
    public function cadastrarAction()
    {
        try {

        } catch (Exception $ex) {

        }
    }

    /**
     * @Route("/colih/user/logoff", name="user_logoff", options={"expose"=true})
     */
    public function logoffAction()
    {
        return $this->redirect($this->getRequest()->getBaseUrl() . '/');
    }

    /**
     * @Route("/user/autenticar", name="user_auth", options={"expose"=true})
     */
    public function antenticarAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $result = $service->autenticar(new User($objData));

            if ($result) {
                return $this->createJsonResponse(array(
                    'success' => true,
                    'message' => 'Usuário autenticado com sucesso'
                ));
            }

            return $this->createJsonResponse(array(
                'success' => false,
                'message' => 'Usuário não encontrado, tente novemente'
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/remove", name="user_remove", options={"expose"=true})
     */
    public function removeAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $service->remover($objData['id']);

            return $this->createJsonResponse(array(
                'success' => true,
                'message' => 'Registro removido com sucesso'
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/{id}/edit", name="user_edit", options={"expose"=true})
     */
    public function editAction($id)
    {
        try {
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->findOneById($id);

            return $this->createJsonResponse(array(
                'success' => true,
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/listar", name="user_listar", options={"expose"=true})
     */
    public function listarAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $tipoPessoa = $service->getTipoPessoa("Pessoa Fisica");

            $resource = $service->getListUser($tipoPessoa, $objData);

            return $this->createJsonResponse(array(
                'success' => true,
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/listar/juridico", name="user_listar_juridico", options={"expose"=true})
     */
    public function listarJuridicoAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $tipoPessoa = $service->getTipoPessoa("Pessoa Jurídica");

            $resource = $service->getListUser($tipoPessoa, $objData);

            return $this->createJsonResponse(array(
                'success' => true,
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/save", name="user_save", options={"expose"=true})
     */
    public function saveAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var MedicoActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $tipoPessoa = $service->getTipoPessoa("Pessoa Fisica");

            $resource = $service->save($objData, $tipoPessoa);

            return $this->createJsonResponse(array(
                'success' => true,
                'message' => 'Processo realizado com sucesso',
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/user/save/juridico", name="user_save_juridico", options={"expose"=true})
     */
    public function saveJuridicoAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var MedicoActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $tipoPessoa = $service->getTipoPessoa("Pessoa Jurídica");

            $resource = $service->save($objData, $tipoPessoa);

            return $this->createJsonResponse(array(
                'success' => true,
                'message' => 'Processo realizado com sucesso',
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/get/estado", name="get_estado", options={"expose"=true})
     */
    public function getEstadoAction()
    {
        try {
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getEstados();

            return $this->createJsonResponse(array(
                'success' => true,
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }

    /**
     * @Route("/get/cidade/{id}", name="get_cidade", options={"expose"=true})
     */
    public function getCidadeAction($id)
    {
        try {
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getCidadePorEstado($id);

            return $this->createJsonResponse(array(
                'success' => true,
                'data' => $resource,
            ));

        } catch (Exception $ex) {
            return $this->createJsonResponse(array(
                'success' => false,
                'message' => $ex->getMessage(),
                'trace' => $ex->getTrace()
            ), 404);
        }
    }
}
