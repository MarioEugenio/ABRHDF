<?php

namespace Core\FinanceiroBundle\Controller;

use Core\BaseBundle\Controller\BaseController;
use Core\FinanceiroBundle\Entity\Financeiro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FinanceiroController extends BaseController
{
    /**
     * @Route("/financeiro", name="financeiro", options={"expose"=true})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/financeiro/associacao", name="financeiro_associacao", options={"expose"=true})
     * @Template()
     */
    public function associacaoAction()
    {
        return array();
    }

    /**
     * @Route("/financeiro/boleto", name="financeiro_boleto", options={"expose"=true})
     * @Template()
     */
    public function boletoAction()
    {
        return array();
    }

    /**
     * @Route("/financeiro/pagamento", name="financeiro_pagamento", options={"expose"=true})
     * @Template()
     */
    public function pagamentoAction()
    {
        return array();
    }

    /**
     * @Route("/financeiro/{id}/edit", name="financeiro_edit", options={"expose"=true})
     */
    public function editAction($id)
    {
        try {
            /** @var EventoActions $service */
            $service = $this->get('CoreFinanceiroBundle.FinanceiroActions');
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
     * @Route("/associacao/{id}/edit", name="associacao_edit", options={"expose"=true})
     */
    public function editAssociacaoAction($id)
    {
        try {
            /** @var EventoActions $service */
            $service = $this->get('CoreFinanceiroBundle.FinanceiroActions');
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
     * @Route("/financeiro/save", name="financeiro_save", options={"expose"=true})
     */
    public function saveAction()
    {
        try {
            $request = $this->getRequest();
            $user = $request->getSession()->get('user');
            $objData = json_decode($this->getRequest()->getContent(), true);
            $serviceUser = $this->get('CoreUserBundle.UserActions');
            $service = $this->get('EventoEventoBundle.EventoActions');

            $entity = new Financeiro($objData);
            $entity->setValor($objData["valor"]);
            $entity->setDataCadastro(new \DateTime());
            $entity->setUsuarioGerador($serviceUser->find($user["id"]));

            if (isset($objData["usuario"])) {
                $entity->setUsuario($serviceUser->find($objData["usuario"]));
            }

            if (isset($objData["evento"])) {
                $entity->setEvento($service->find($objData["evento"]));
            }

            if (isset($objData['id'])) {
                $entity =  $service->find($objData['id']);
                $entity->setData($objData);
            }

            $serviceFinanceiro = $this->get('CoreFinanceiroBundle.FinanceiroActions');
            $resource = $serviceFinanceiro->save($entity);

            return $this->createJsonResponse(array(
                'success' => true,
                'message' => 'Inscrição realizada com sucesso',
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
     * @Route("/financeiro/gerar/boleto/{id}", name="financeiro_gerar_boleto", options={"expose"=true})
     * @Template()
     */
    public function gerarBoletoAction($id)
    {
        $request = $this->getRequest();
        $user = $request->getSession()->get('user');


        $url = $request->getBaseUrl() . '/boleto/';

        /** @var FinanceiroService $service */
        $service = $this->get('CoreFinanceiroBundle.FinanceiroActions');
        $serviceUser = $this->get('CoreUserBundle.UserActions');

        /** @var Financeiro $financeiro */
        $financeiro = $service->find($id);
        $financeiro->setUsuario($serviceUser->find($user["id"]));

        $user = $serviceUser->getInfoUser($user["id"]);
        $cep = substr($user['contato']['cep'], 0, 5) . '-' . substr($user['contato']['cep'], 5, 3);

        $boleto = $this->container->get('tritoq.manager.boleto');
        $data = $boleto->add(array(
                'value' => $financeiro->getValor(),
                'payer' => $financeiro->getUsuario()->getNome(),
                'payer_doc' => $financeiro->getUsuario()->getCpf(),
                'payer_address' => $cep . ' - ' . $user['contato']['endereco'] . ' - ' . $user['contato']['bairro'],
                'sequence' => $financeiro->getId()  // Sequencial do boleto para nosso numero
            )
        );

        $entity = ($data['entity']);

        $financeiro->addBoletos($entity);
        $service->save($financeiro);

        // Pegando a rota para gerar o link do boleto
        return $this->redirect( $url . $entity->getHash());
    }

    /**
     * @Route("/financeiro/gerar/pagseguro/{id}", name="financeiro_gerar_pagseguro", options={"expose"=true})
     * @Template()
     */
    public function callPagSeguroAction($id) {
        $request = $this->getRequest();
        $user = $request->getSession()->get('user');

        //Instancia a Classe PaymenteRequest
        $pagseguro = new \PagSeguroPaymentRequest();

        //Informa o tipo de moeda
        $pagseguro->setCurrency('BRL');

        /** Informo o Tipo de Frete:
         * 1 => Encomenda normal (PAC)
         * 2 => SEDEX
         * 3 => Tipo de frete não especificado
         */
        $pagseguro->setShippingType(3);

        /**
         * Informo o código de referência do Pedido.
         * É importante para identificar o pedido, e também caso queira trabalhar
         * com retorno automatico.
         * Se estivesse trabalho com tabelas pra guardar o pedido
         * seria o ID do Pedido.
         * Nesse exemplo irei colocar um valor aleatório
         */
        $pagseguro->setReference(uniqid(true));

        $url = $request->getBaseUrl() . '/boleto/';

        /** @var FinanceiroService $service */
        $service = $this->get('CoreFinanceiroBundle.FinanceiroActions');
        $serviceUser = $this->get('CoreUserBundle.UserActions');

        /** @var Financeiro $financeiro */
        $financeiro = $service->find($id);
        $financeiro->setUsuario($serviceUser->find($user["id"]));

        $user = $serviceUser->getInfoUser($user["id"]);

        /**
         * Informo os dados do Cliente
         * Nome:
         * Email:
         * DDD:
         * Telefone : (valor numerico , exemplo: 6998522)
         */
        $pagseguro->setSender($financeiro->getUsuario()->getNome(), $financeiro->getUsuario()->getEmail(),
            substr($user['contato']['celular'], 0,2), substr($user['contato']['celular'], 2,strlen($user['contato']['celular'])));

        $cep = substr($user['contato']['cep'], 0, 5) . '-' . substr($user['contato']['cep'], 5, 3);

        $pagseguro->setShippingAddress($cep, $user['contato']['endereco'], '0',
            $user['contato']['complemento'],  $user['contato']['bairro'], $user['contato']['bairro'], 'DF', 'BRA');

        $pagseguro->addItem(1, 'Evento', 1, $financeiro->getValor(), 0);

        $credenciais = new \PagSeguroAccountCredentials('abrhdf@abrhdf.com.br', '4A0B40552B114805A5A06AC5E2432B9D');

        $url = $pagseguro->register($credenciais);

        // Pegando a rota para gerar o link do boleto
        return $this->redirect( $url );
    }
}
