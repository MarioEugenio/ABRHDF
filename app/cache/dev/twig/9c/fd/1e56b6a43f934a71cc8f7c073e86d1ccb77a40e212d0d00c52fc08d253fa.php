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
    <!-- /.col-lg-12 -->
</div>
<div ng-controller=\"BaseCtrl\" ng-init=\"init()\">
    <div class=\"row\">
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
        <div class=\"col-lg-8\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-clock-o fa-fw\"></i> Minha timeline de participações
                </div>
                <!-- /.panel-heading -->
                <div class=\"panel-body\">
                    <div class=\"row col-xs-12\">
                        <li class=\"glyphicon glyphicon-alert\"></li> Não há participações em eventos para este associado
                    </div>
                    <ul ng-show=\"false\" class=\"timeline\">
                        <li>
                            <div class=\"timeline-badge\"><i class=\"fa fa-check\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                    <p><small class=\"text-muted\"><i class=\"fa fa-clock-o\"></i> 11 hours ago via Twitter</small>
                                    </p>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                </div>
                            </div>
                        </li>
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-badge warning\"><i class=\"fa fa-credit-card\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class=\"timeline-badge danger\"><i class=\"fa fa-bomb\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                </div>
                            </div>
                        </li>
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class=\"timeline-badge info\"><i class=\"fa fa-save\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                                    <hr>
                                    <div class=\"btn-group\">
                                        <button type=\"button\" class=\"btn btn-primary btn-sm dropdown-toggle\" data-toggle=\"dropdown\">
                                            <i class=\"fa fa-gear\"></i>  <span class=\"caret\"></span>
                                        </button>
                                        <ul class=\"dropdown-menu\" role=\"menu\">
                                            <li><a href=\"#\">Action</a>
                                            </li>
                                            <li><a href=\"#\">Another action</a>
                                            </li>
                                            <li><a href=\"#\">Something else here</a>
                                            </li>
                                            <li class=\"divider\"></li>
                                            <li><a href=\"#\">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                                </div>
                            </div>
                        </li>
                        <li class=\"timeline-inverted\">
                            <div class=\"timeline-badge success\"><i class=\"fa fa-graduation-cap\"></i>
                            </div>
                            <div class=\"timeline-panel\">
                                <div class=\"timeline-heading\">
                                    <h4 class=\"timeline-title\">Lorem ipsum dolor</h4>
                                </div>
                                <div class=\"timeline-body\">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class=\"col-lg-4\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <i class=\"fa fa-list fa-fw\"></i> Novos eventos
                </div>
                <!-- /.panel-heading -->
                <div class=\"panel-body\">
                    <div class=\"list-group\">
                        <a href=\"#/evento/{[{ evento.id }]}/detalhe\" class=\"list-group-item\" ng-repeat=\"evento in listEventos\">
                            <i class=\"fa fa-calendar fa-fw\"></i> {[{ evento.titulo }]}
                                        <span class=\"pull-right text-muted small\"><em>{[{ formatarData(evento.inscricao_inicio) }]}</em>
                                        </span>
                        </a>

                    </div>
                    <!-- /.list-group -->
                    <a ng-show=\"listEventos.length > 10\" href=\"#/evento\" class=\"btn btn-default btn-block\">Visualisar todos ...</a>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>

</div>";
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
