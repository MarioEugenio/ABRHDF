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
     * @Route("/user/cadastro", name="user_cadastro", options={"expose"=true})
     * @Template()
     */
    public function cadastroAction()
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
        return $this->redirect($this->getRequest()->getBaseUrl() . '/colih');
    }

    /**
     * @Route("/user/autenticar", name="user_auth", options={"expose"=true})
     */
    public function antenticarAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('COLIHUserBundle.UserActions');
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
            $service = $this->get('COLIHUserBundle.UserActions');
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
            $service = $this->get('COLIHUserBundle.UserActions');
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
            /** @var UserActions $service */
            $service = $this->get('COLIHUserBundle.UserActions');
            $resource = $service->findAll();

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
            $entity = new User($objData);

            /** @var MedicoActions $service */
            $service = $this->get('COLIHUserBundle.UserActions');

            if (isset($objData['id'])) {
                $entity =  $service->find($objData['id']);
                $entity->setData($objData);
            }

            $resource = $service->save($entity);

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
}
