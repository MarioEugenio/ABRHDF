<?php

/* CoreBaseBundle:Default:admin.html.twig */
class __TwigTemplate_ba1be230500d1b6bbc43978471f4b36bd295011fbda7b471782aaa79474c472e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "CoreBaseBundle:Default:admin.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corebase/css/admin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corebase/css/timeline.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
    }

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        echo "    <script type=\"text/javascript\"> var baseUrl = \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"; </script>
    <script type=\"text/javascript\"> var uri = \"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "uri", array()), "html", null, true);
        echo "\"; </script>
    <script type=\"text/javascript\"> var assetBase = \"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "basePath", array()), "html", null, true);
        echo "\"; </script>

    ";
        // line 14
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corebase/js/BaseCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corebase/js/HomeCtrl.js"), "html", null, true);
        echo "\"></script>

    ";
        // line 18
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/cadastroCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/cadastroJuridicoCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/listaCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/listaJuridicoCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/listaRepresentantesCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/listaDependentesCtrl.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefinanceiro/js/controller/financeiroCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefinanceiro/js/controller/associacaoCtrl.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/controller/cadastroCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/controller/listaCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/controller/descontoCadastroCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/controller/listaDescontoCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/controller/detalheCtrl.js"), "html", null, true);
        echo "\"></script>

    <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corefinanceiro/js/router/routers.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/eventoevento/js/router/routers.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/router/routerUser.js"), "html", null, true);
        echo "\"></script>


";
    }

    // line 41
    public function block_body($context, array $blocks = array())
    {
        // line 42
        echo "
    <div style=\"width: 40%;position: absolute;left: 55%;margin-top: 20px;z-index: 999999;\" id=\"alerts-container\"></div>
    <div id=\"wrapper\"  ng-controller=\"HomeCtrl\">
    <!-- Navigation -->
    <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
    <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        <a class=\"navbar-brand\" href=\"#/\">ABMRHDF ADMIN</a>
    </div>
    <!-- /.navbar-header -->

    <ul class=\"nav navbar-top-links navbar-right\">

    <!-- /.dropdown -->
    <li class=\"dropdown\">
        <a class=\"dropdown-toggle ng-cloak\" data-toggle=\"dropdown\">
            <i class=\"fa fa-user fa-fw\"></i> {[{ currentUser.nome }]} <i class=\"fa fa-caret-down\"></i>
        </a>
        <ul class=\"dropdown-menu dropdown-user\">

            <li><a ng-click=\"alterarSenha()\" style=\"cursor:pointer;\"><i class=\"fa fa-user fa-fw\"></i> Alterar Senha</a>
            </li>
            <li class=\"divider\"></li>
            <li><a href=\"/\"><i class=\"fa fa-sign-out fa-fw\"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->



    <div class=\"navbar-default sidebar\" role=\"navigation\">
        <div class=\"sidebar-nav navbar-collapse\">
            <ul class=\"nav\" id=\"side-menu\">
               <!-- <li class=\"sidebar-search\">
                    <div class=\"input-group custom-search-form\">
                        <input type=\"text\" class=\"form-control\" placeholder=\"Pesquisa...\">
                                <span class=\"input-group-btn\">
                                <button class=\"btn btn-default\" type=\"button\">
                                    <i class=\"fa fa-search\"></i>
                                </button>
                            </span>
                    </div>
                </li> -->
                <li>
                    <a href=\"#/\"><i class=\"fa fa-dashboard fa-fw\"></i> Dashboard</a>
                </li>
                <li><a href=\"{[{ urlPerfil }]}\"><i class=\"glyphicon glyphicon-cog\"></i> Perfil</a>
                </li>
                <li ng-show=\"currentUser.flAdmin\">
                    <a href=\"#\"><i class=\"fa fa-calendar-o fa-fw\"></i> Evento<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"#/evento\">Lista Evento</a>
                        </li>
                        <li>
                            <a href=\"#/desconto\">Lista Desconto</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li ng-show=\"currentUser.flAdmin\">
                    <a href=\"#\"><i class=\"fa fa-user fa-fw\"></i> Pessoa<span class=\"fa arrow\"></span></a>
                    <ul class=\"nav nav-second-level\">
                        <li>
                            <a href=\"#/user\">Lista Pessoa Física</a>
                        </li>
                        <li>
                            <a href=\"#/user/juridico\">Lista Pessoa Jurídica</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li ng-show=\"currentUser.associado\">
                    <a  ng-show=\"currentUser.tipoUsuario == 1\" href=\"#/user/{[{ currentUser.id }]}/dependentes/1\"><i class=\"fa fa-user fa-fw\"></i> Lista de Dependentes</a>
                    <a  ng-show=\"currentUser.tipoUsuario == 2\" href=\"#/user/{[{ currentUser.id }]}/representantes/1\"><i class=\"fa fa-user fa-fw\"></i> Lista de Representantes</a>
                    <!-- /.nav-second-level -->
                </li>
                <li ng-show=\"currentUser.associado\">
                    <a href=\"#/\" ng-click=\"associado = true\"><i class=\"fa fa-info fa-fw\"></i> Como está minha anuidade</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
    </nav>

    <div id=\"page-wrapper\" style=\"overflow: scroll\">
        <!-- Modal Alterar Senhas -->

        <div class=\"modal fade in ng-cloak\"  ng-cloak id=\"myModal\" role=\"dialog\" aria-labelledby=\"myModalLabel\" ng-show=\"alter\" style=\"display: block\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"  ng-click=\"close()\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\" id=\"myModalLabel\">Alterar Senha</h4>
                    </div>
                    <div class=\"clear-fix\">
                    <form name=\"formCad\" class=\"col-lg-12\">
                        <div name=\"formCad\" class=\"modal-body\">
                            <div class=\"form-group col-lg-12 col-md-6\">
                                <label for=\"exampleInputPassword1\">Senha Atual</label>
                                <input type=\"password\" maxlength=\"10\" class=\"form-control\" ng-model=\"form.senhaAtual\" placeholder=\"Digite senha\" required>
                            </div>

                            <div class=\"form-group col-lg-12 col-md-6\">
                                <label for=\"exampleInputPassword1\">Senha</label>
                                <input type=\"password\" maxlength=\"10\" class=\"form-control\" ng-model=\"form.senha\" placeholder=\"Digite senha\" required>
                            </div>

                            <div class=\"form-group col-lg-12 col-md-6\">
                                <label for=\"exampleInputPassword1\">Repita Senha</label>
                                <input type=\"password\" maxlength=\"10\" class=\"form-control\" ng-model=\"form.rsenha\" placeholder=\"Digite senha\" required>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class=\"modal-footer \">
                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" ng-click=\"close()\">Cancelar</button>
                        <button type=\"button\" class=\"btn btn-primary\" ng-click=\"altSenha()\">Alterar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"modal fade in ng-cloak\"  ng-cloak role=\"dialog\" aria-labelledby=\"associado\" ng-show=\"associado\" style=\"display: block\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"  ng-click=\"closeAssociado()\"><span aria-hidden=\"true\">&times;</span></button>
                        <h4 class=\"modal-title\">Como está minha anuidade</h4>
                    </div>
                    <div class=\"clear-fix\">
                        <div class=\"modal-body\">
                            <div class=\"row\">
                                <div class=\"col-xs-12 col-md-4\"><h3>ASSOCIADO</h3></div>
                                <div class=\"col-xs-12 col-md-8\"><h3>Vencimento: {[{ formatarData(currentUser.dtAssociado) }]}</h3></div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-xs-12 col-md-12\"><h4>Situação do Associado:</h4> {[{ pagamento(currentUser.flPagamento) }]}</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"modal-footer \">
                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" ng-click=\"closeAssociado()\">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- /.row -->
    <div class=\"row\" ng-view></div>
    <!-- /.row -->

    </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "CoreBaseBundle:Default:admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 42,  143 => 41,  135 => 36,  131 => 35,  127 => 34,  122 => 32,  118 => 31,  114 => 30,  110 => 29,  106 => 28,  101 => 26,  97 => 25,  92 => 23,  88 => 22,  84 => 21,  80 => 20,  76 => 19,  71 => 18,  66 => 15,  61 => 14,  56 => 11,  52 => 10,  47 => 9,  44 => 8,  38 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}
