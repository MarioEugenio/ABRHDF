<?php

namespace Evento\EventoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EventoController extends Controller
{
    /**
     * @Route("/evento")
     * @Template()
     */
    public function indexAction()
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
     * @Route("/evento/save", name="evento_save", options={"expose"=true})
     */
    public function saveAction()
    {
        try {
            $objData = json_decode($this->getRequest()->getContent(), true);
            $entity = new User($objData);

            /** @var MedicoActions $service */
            $service = $this->get('CoreUserBundle.UserActions');

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
