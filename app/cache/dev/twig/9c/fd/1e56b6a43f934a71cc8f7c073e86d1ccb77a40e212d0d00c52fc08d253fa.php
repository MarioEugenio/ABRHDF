<?php

/* CoreBaseBundle:Default:home.html.twig */
class __TwigTemplate_9cfd1e56b6a43f934a71cc8f7c073e86d1ccb77a40e212d0d00c52fc08d253fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"row\">
    <div class=\"col-lg-12\">
        <h1 class=\"page-header\">Dashboard</h1>
    </div>

</div>
<div ng-controller=\"BaseCtrl\" ng-init=\"init()\">
    <div class=\"row\" ng-show=\"currentUser.flAdmin\">
        <div class=\"col-lg-3 col-md-6\">
            <div class=\"panel panel-primary\">
                <div class=\"panel-heading\">
                    <div class=\"row\">
                        <div class=\"col-xs-3\">
                            <i class=\"fa fa-calendar-o fa-5x\"></i>
                        </div>
                        <div class=\"col-xs-9 text-right\">
                            <div class=\"huge\">{[{ listEventos.length }]}</div>
                            <div>Eventos</div>
                        </div>
                    </div>
                </div>
                <a href=\"#/evento\">
                    <div class=\"panel-footer\">
                        <span class=\"pull-left\">Ver Detalhes</span>
                        <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                        <div class=\"clearfix\"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6\">
            <div class=\"panel panel-green\">
                <div class=\"panel-heading\">
                    <div class=\"row\">
                        <div class=\"col-xs-3\">
                            <i class=\"fa fa-user fa-5x\"></i>
                        </div>
                        <div class=\"col-xs-9 text-right\">
                            <div class=\"huge\">{[{ listFisica.length }]}</div>
                            <div>Pessoa Física</div>
                        </div>
                    </div>
                </div>
                <a href=\"#/user\">
                    <div class=\"panel-footer\">
                        <span class=\"pull-left\">Ver Detalhes</span>
                        <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                        <div class=\"clearfix\"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class=\"col-lg-3 col-md-6\">
            <div class=\"panel panel-yellow\">
                <div class=\"panel-heading\">
                    <div class=\"row\">
                        <div class=\"col-xs-3\">
                            <i class=\"fa fa-building fa-5x\"></i>
                        </div>
                        <div class=\"col-xs-9 text-right\">
                            <div class=\"huge\">{[{ listJuridica.length }]}</div>
                            <div>Pessoa Jurídica</div>
                        </div>
                    </div>
                </div>
                <a href=\"#/user/juridico\">
                    <div class=\"panel-footer\">
                        <span class=\"pull-left\">Ver Detalhes</span>
                        <span class=\"pull-right\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                        <div class=\"clearfix\"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-lg-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-list fa-fw\"></i> Novos eventos
                </div>
                <!-- /.panel-heading -->
                <div class=\"panel-body\">
                    <div class=\"list-group\">
                        <a href=\"#/evento/{[{ evento.id }]}/detalhe\" class=\"list-group-item\" ng-repeat=\"evento in listEventos\">
                            <i class=\"fa fa-calendar fa-fw\"></i> {[{ evento.titulo }]}
                                        <span class=\"pull-right text-muted small\">Data do Evento: <em>{[{ formatarData(evento.inscricao_inicio) }]}</em>
                                        </span>
                        </a>

                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "CoreBaseBundle:Default:home.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
