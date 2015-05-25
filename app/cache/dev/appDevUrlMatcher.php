<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/evento')) {
            // evento_lista
            if ($pathinfo === '/evento') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listaAction',  '_route' => 'evento_lista',);
            }

            // evento_detalhe
            if ($pathinfo === '/evento/detalhe') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::detalhesAction',  '_route' => 'evento_detalhe',);
            }

        }

        // desconto_lista
        if ($pathinfo === '/desconto') {
            return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listaDescontoAction',  '_route' => 'desconto_lista',);
        }

        // evento_cadastro
        if ($pathinfo === '/evento/cadastro') {
            return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::cadastroAction',  '_route' => 'evento_cadastro',);
        }

        if (0 === strpos($pathinfo, '/desconto')) {
            // desconto_cadastro
            if ($pathinfo === '/desconto/cadastro') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::descontoCadastroAction',  '_route' => 'desconto_cadastro',);
            }

            // desconto_edit
            if (preg_match('#^/desconto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'desconto_edit')), array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::editDescontoAction',));
            }

        }

        if (0 === strpos($pathinfo, '/evento')) {
            // evento_edit
            if (preg_match('#^/evento/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'evento_edit')), array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::editAction',));
            }

            // evento_listar
            if ($pathinfo === '/evento/listar') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listarAction',  '_route' => 'evento_listar',);
            }

        }

        if (0 === strpos($pathinfo, '/desconto')) {
            // desconto_listar
            if ($pathinfo === '/desconto/listar') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::listarDescontoAction',  '_route' => 'desconto_listar',);
            }

            // desconto_save
            if ($pathinfo === '/desconto/save') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::saveDescontoAction',  '_route' => 'desconto_save',);
            }

        }

        if (0 === strpos($pathinfo, '/evento')) {
            // evento_save
            if ($pathinfo === '/evento/save') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::saveAction',  '_route' => 'evento_save',);
            }

            // evento_remover
            if ($pathinfo === '/evento/remover') {
                return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::removerAction',  '_route' => 'evento_remover',);
            }

        }

        // desconto_remove
        if ($pathinfo === '/desconto/remover') {
            return array (  '_controller' => 'Evento\\EventoBundle\\Controller\\EventoController::removerDescontoAction',  '_route' => 'desconto_remove',);
        }

        // evento_pessoa_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'evento_pessoa_default_index')), array (  '_controller' => 'Evento\\PessoaBundle\\Controller\\DefaultController::indexAction',));
        }

        // core_base_default_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'core_base_default_index');
            }

            return array (  '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::indexAction',  '_route' => 'core_base_default_index',);
        }

        if (0 === strpos($pathinfo, '/core/a')) {
            if (0 === strpos($pathinfo, '/core/admin')) {
                // core_base_default_admin
                if ($pathinfo === '/core/admin') {
                    return array (  '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::adminAction',  '_route' => 'core_base_default_admin',);
                }

                // core_home
                if ($pathinfo === '/core/admin/home') {
                    return array (  '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::homeAction',  '_route' => 'core_home',);
                }

            }

            // core_base_default_apiatualizacao
            if ($pathinfo === '/core/api/atualizacao') {
                return array (  '_controller' => 'Core\\BaseBundle\\Controller\\DefaultController::apiAtualizacaoAction',  '_route' => 'core_base_default_apiatualizacao',);
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            if (0 === strpos($pathinfo, '/user/l')) {
                if (0 === strpos($pathinfo, '/user/log')) {
                    // user_login
                    if ($pathinfo === '/user/login') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\DefaultController::loginAction',  '_route' => 'user_login',);
                    }

                    // user_logar
                    if ($pathinfo === '/user/logar') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::logarAction',  '_route' => 'user_logar',);
                    }

                }

                if (0 === strpos($pathinfo, '/user/lista')) {
                    // user_lista
                    if ($pathinfo === '/user/lista') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaAction',  '_route' => 'user_lista',);
                    }

                    // user_lista_juridico
                    if ($pathinfo === '/user/lista/juridico') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaJuridicoAction',  '_route' => 'user_lista_juridico',);
                    }

                    // user_lista_representantes
                    if ($pathinfo === '/user/lista/representantes') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaRepresentantesAction',  '_route' => 'user_lista_representantes',);
                    }

                    // user_lista_dependentes
                    if ($pathinfo === '/user/lista/dependentes') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listaDependentesAction',  '_route' => 'user_lista_dependentes',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/user/cadastr')) {
                if (0 === strpos($pathinfo, '/user/cadastro')) {
                    // user_cadastro
                    if ($pathinfo === '/user/cadastro') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastroAction',  '_route' => 'user_cadastro',);
                    }

                    // user_cadastro_juridico
                    if ($pathinfo === '/user/cadastro/juridico') {
                        return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastroJuridicoAction',  '_route' => 'user_cadastro_juridico',);
                    }

                }

                // user_cadastrar
                if ($pathinfo === '/user/cadastrar') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::cadastrarAction',  '_route' => 'user_cadastrar',);
                }

            }

        }

        // user_logoff
        if ($pathinfo === '/colih/user/logoff') {
            return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::logoffAction',  '_route' => 'user_logoff',);
        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_auth
            if ($pathinfo === '/user/autenticar') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::antenticarAction',  '_route' => 'user_auth',);
            }

            // user_remove
            if ($pathinfo === '/user/remove') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeAction',  '_route' => 'user_remove',);
            }

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::editAction',));
            }

            if (0 === strpos($pathinfo, '/user/listar')) {
                // user_listar
                if ($pathinfo === '/user/listar') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarAction',  '_route' => 'user_listar',);
                }

                // user_listar_juridico
                if ($pathinfo === '/user/listar/juridico') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarJuridicoAction',  '_route' => 'user_listar_juridico',);
                }

            }

            if (0 === strpos($pathinfo, '/user/save')) {
                // user_save
                if ($pathinfo === '/user/save') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveAction',  '_route' => 'user_save',);
                }

                // user_save_juridico
                if ($pathinfo === '/user/save/juridico') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveJuridicoAction',  '_route' => 'user_save_juridico',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/get')) {
            // get_estado
            if ($pathinfo === '/get/estado') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::getEstadoAction',  '_route' => 'get_estado',);
            }

            // get_cidade
            if (0 === strpos($pathinfo, '/get/cidade') && preg_match('#^/get/cidade/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_cidade')), array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::getCidadeAction',));
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_save_representante
            if ($pathinfo === '/user/save/representante') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveRepresentanteAction',  '_route' => 'user_save_representante',);
            }

            // user_listar_representantes
            if ($pathinfo === '/user/listar/representantes') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarRepresentantesAction',  '_route' => 'user_listar_representantes',);
            }

            if (0 === strpos($pathinfo, '/user/re')) {
                // user_remove_representantes
                if ($pathinfo === '/user/remove/representantes') {
                    return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeRepresentantesAction',  '_route' => 'user_remove_representantes',);
                }

                // user_edit_representante
                if (0 === strpos($pathinfo, '/user/representante') && preg_match('#^/user/representante/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit_representante')), array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::editRepresentanteAction',));
                }

            }

            // user_save_dependentes
            if ($pathinfo === '/user/save/dependentes') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::saveDependentesAction',  '_route' => 'user_save_dependentes',);
            }

            // user_listar_dependentes
            if ($pathinfo === '/user/listar/dependentes') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::listarDependentesAction',  '_route' => 'user_listar_dependentes',);
            }

            // user_remove_dependentes
            if ($pathinfo === '/user/remove/dependentes') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::removeDependentesAction',  '_route' => 'user_remove_dependentes',);
            }

            // user_edit_dependentes
            if (0 === strpos($pathinfo, '/user/dependentes') && preg_match('#^/user/dependentes/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit_dependentes')), array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::editDependentesAction',));
            }

            // user_valid_email
            if ($pathinfo === '/user/valid/email') {
                return array (  '_controller' => 'Core\\UserBundle\\Controller\\UserController::validEmailAction',  '_route' => 'user_valid_email',);
            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        // tritoq_manager_boleto
        if (0 === strpos($pathinfo, '/boleto') && preg_match('#^/boleto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tritoq_manager_boleto')), array (  '_controller' => 'Tritoq\\Bundle\\ManagerBoletoBundle\\Controller\\DefaultController::indexAction',));
        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
