<?php

namespace Evento\EventoBundle\Controller;

use Core\BaseBundle\Controller\BaseController;
use Evento\EventoBundle\Entity\Desconto;
use Evento\EventoBundle\Entity\Evento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EventoController extends BaseController
{
    /**
     * @Route("/evento", name="evento_lista", options={"expose"=true})
     * @Template()
     */
    public function listaAction()
    {
        return array();
    }

    /**
     * @Route("/desconto", name="desconto_lista", options={"expose"=true})
     * @Template()
     */
    public function listaDescontoAction()
    {
        return array();
    }

    /**
     * @Route("/evento/cadastro", name="evento_cadastro", options={"expose"=true})
     * @Template()
     */
    public function cadastroAction()
    {
        return array();
    }

    /**
     * @Route("/desconto/cadastro", name="desconto_cadastro", options={"expose"=true})
     * @Template()
     */
    public function descontoCadastroAction()
    {
        return array();
    }

    /**
     * @Route("/desconto/{id}/edit", name="desconto_edit", options={"expose"=true})
     */
    public function editDescontoAction($id)
    {
        try {
            /** @var EventoActions $service */
            $service = $this->get('EventoEventoBundle.DescontoActions');
            $resource = $service->find($id);

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
     * @Route("/evento/{id}/edit", name="evento_edit", options={"expose"=true})
     */
    public function editAction($id)
    {
        try {
            /** @var EventoActions $service */
            $service = $this->get('EventoEventoBundle.EventoActions');
            $resource = $service->find($id);

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
     * @Route("/desconto/listar", name="evento_listar", options={"expose"=true})
     */
    public function listarAction()
    {
        try {
            /** @var DescontoActions $service */
            $service = $this->get('EventoEventoBundle.EventoActions');
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
     * @Route("/desconto/listar", name="desconto_listar", options={"expose"=true})
     */
    public function listarDescontoAction()
    {
        try {
            /** @var DescontoActions $service */
            $service = $this->get('EventoEventoBundle.DescontoActions');
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
     * @Route("/desconto/save", name="desconto_save", options={"expose"=true})
     */
    public function saveDescontoAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            $entity = new Desconto($objData);

            /** @var EventoActions $service */
            $service = $this->get('EventoEventoBundle.DescontoActions');

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

    /**
     * @Route("/evento/save", name="evento_save", options={"expose"=true})
     */
    public function saveAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            $entity = new Evento($objData);
            $entity->setDataCadastro(new \DateTime());

            /** @var EventoActions $service */
            $service = $this->get('EventoEventoBundle.EventoActions');

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
