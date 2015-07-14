<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_associacao' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::associacaoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro/associacao',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_boleto' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::boletoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro/boleto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_pagamento' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::pagamentoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro/pagamento',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_desconto' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::checkDesconto',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro/desconto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/financeiro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'associacao_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::editAssociacaoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/associacao',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::saveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/financeiro/save',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_gerar_boleto' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::gerarBoletoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/financeiro/gerar/boleto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'financeiro_gerar_pagseguro' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\FinanceiroBundle\\Controller\\FinanceiroController::callPagSeguroAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/financeiro/gerar/pagseguro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_lista' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_detalhe' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::detalhesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento/detalhe',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_lista' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listaDescontoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/desconto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_cadastro' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::cadastroAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento/cadastro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_cadastro' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::descontoCadastroAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/desconto/cadastro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::editDescontoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/desconto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/evento',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_listar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento/listar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_listar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listarDescontoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/desconto/listar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::saveDescontoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/desconto/save',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::saveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento/save',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_remover' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::removerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/evento/remover',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'desconto_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::removerDescontoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/desconto/remover',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'evento_pessoa_default_index' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Evento\\PessoaBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'core_base_default_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'core_base_default_admin' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::adminAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/admin',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'core_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/admin/home',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\DefaultController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_logar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::logarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/logar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_associacao' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::associacaoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/associacao',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_lista' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/lista',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_lista_juridico' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaJuridicoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/lista/juridico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_lista_representantes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaRepresentantesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/lista/representantes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_lista_dependentes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaDependentesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/lista/dependentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_cadastro' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastroAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/cadastro',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_cadastro_juridico' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastroJuridicoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/cadastro/juridico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_cadastrar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastrarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/cadastrar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_logoff' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::logoffAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/colih/user/logoff',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_auth' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::antenticarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/autenticar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_remove' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/remove',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_listar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/listar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_listar_juridico' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarJuridicoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/listar/juridico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_save' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/save',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_save_juridico' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveJuridicoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/save/juridico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'get_estado' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::getEstadoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/get/estado',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'get_cidade' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::getCidadeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/get/cidade',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_save_representante' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveRepresentanteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/save/representante',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_listar_representantes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarRepresentantesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/listar/representantes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_remove_representantes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeRepresentantesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/remove/representantes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_edit_representante' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::editRepresentanteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user/representante',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_save_dependentes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveDependentesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/save/dependentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_listar_dependentes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarDependentesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/listar/dependentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_remove_dependentes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeDependentesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/remove/dependentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_edit_dependentes' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::editDependentesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/user/dependentes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_valid_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::validEmailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/valid/email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_alter_senha' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::alterSenhaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/alter/senha',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'user_get' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Core\\UserBundle\\Controller\\UserController::userGetAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/user/get',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_js_routing_js' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'fos_js_routing.controller:indexAction',    '_format' => 'js',  ),  2 =>   array (    '_format' => 'js|json',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'js|json',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/js/routing',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'tritoq_manager_boleto' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Tritoq\\Bundle\\ManagerBoletoBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/boleto',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/app/example',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_welcome' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/secured/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/secured/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/secured/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'acme_demo_secured_hello' => array (  0 =>   array (  ),  1 =>   array (    'name' => 'World',    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/secured/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_secured_hello' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/demo/secured/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_secured_hello_admin' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/demo/secured/hello/admin',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_hello' => array (  0 =>   array (    0 => 'name',  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'name',    ),    1 =>     array (      0 => 'text',      1 => '/demo/hello',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_demo_contact' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/demo/contact',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
