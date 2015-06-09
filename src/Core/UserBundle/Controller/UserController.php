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
     * @Route("/user/associacao", name="user_associacao", options={"expose"=true})
     * @Template()
     */
    public function associacaoAction()
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
     * @Route("/user/lista/representantes", name="user_lista_representantes", options={"expose"=true})
     * @Template()
     */
    public function listaRepresentantesAction()
    {
        return array();
    }

    /**
     * @Route("/user/lista/dependentes", name="user_lista_dependentes", options={"expose"=true})
     * @Template()
     */
    public function listaDependentesAction()
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
        $service = $this->get('CoreUserBundle.UserActions');
        $service->logout();
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
            $resource = $service->getInfoUser($id);

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
            $objData['form']['dtNascimento'] = null;
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

    /**
     * @Route("/user/save/representante", name="user_save_representante", options={"expose"=true})
     */
    public function saveRepresentanteAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->saveRepresentante($objData);

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
     * @Route("/user/listar/representantes", name="user_listar_representantes", options={"expose"=true})
     */
    public function listarRepresentantesAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getListRepresentantes($objData);

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
     * @Route("/user/remove/representantes", name="user_remove_representantes", options={"expose"=true})
     */
    public function removeRepresentantesAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $service->removerRepresentantes($objData['id']);

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
     * @Route("/user/representante/{id}/edit", name="user_edit_representante", options={"expose"=true})
     */
    public function editRepresentanteAction($id)
    {
        try {
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getInfoRepresentantes($id);

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
     * @Route("/user/save/dependentes", name="user_save_dependentes", options={"expose"=true})
     */
    public function saveDependentesAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->saveDependentes($objData);

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
     * @Route("/user/listar/dependentes", name="user_listar_dependentes", options={"expose"=true})
     */
    public function listarDependentesAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getListDependentes($objData);

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
     * @Route("/user/remove/dependentes", name="user_remove_dependentes", options={"expose"=true})
     */
    public function removeDependentesAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $service->removerDependentes($objData['id']);

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
     * @Route("/user/dependentes/{id}/edit", name="user_edit_dependentes", options={"expose"=true})
     */
    public function editDependentesAction($id)
    {
        try {
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getInfoDependentes($id);

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
     * @Route("/user/valid/email", name="user_valid_email", options={"expose"=true})
     */
    public function validEmailAction()
    {
        try {

            $objData = json_decode($this->getRequest()->getContent(), true);
            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $resource = $service->getInfoEmail($objData);

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
     * @Route("/user/get", name="user_get", options={"expose"=true})
     */
    public function userGetAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);

            /** @var UserActions $service */
            $service = $this->get('CoreUserBundle.UserActions');
            $result = $service->getUserAuth();

            if ($result) {
                return $this->createJsonResponse(array(
                    'success' => true,
                    'message' => 'Usuário autenticado com sucesso',
                    'data' => $result
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
}
