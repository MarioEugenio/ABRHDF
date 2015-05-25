<?php

/* EventoEventoBundle:Evento:lista.html.twig */
class __TwigTemplate_dfe2ee63a1c849fb8e40e829fc705c3b57604096642bf60bcf414edb76c20cc3 extends Twig_Template
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
    <div class=\"col-md-12\" ng-controller=\"EventoListaCtrl\" ng-init=\"init()\">
        <h2>Evento</h2>
        <hr>

        <ol class=\"breadcrumb\">
            <li><a href=\"#/\">Inicial</a></li>
            <li class=\"active\">Evento</li>
        </ol>

        <div class=\"box\">
            <div class=\"input-group\">
                <input type=\"text\" class=\"form-control\" ng-model=\"searchText\" placeholder=\"Pesquisar evento ...\">
              <span class=\"input-group-btn\">
                <a class=\"btn btn-primary\" href=\"#/evento/cadastro\"><span class=\"glyphicon glyphicon-plus\"></span> Cadastrar</a>
              </span>
            </div>
        </div>

        <div class=\"panel panel-default\">
            <!-- Default panel contents -->
            <div class=\"panel-heading\"><span class=\"glyphicon glyphicon-info-sign\"></span> selecione abaixo o evento que deseja alterar ou remover <span class=\"pull-right\">Total de registros: <span class=\"label label-info\">{[{ list.length  }]}</span></span></div>

            <!-- Table -->
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show=\"list.length == 0\">
                        <td colspan=\"10\" style=\"text-align: center;\"><span class=\"glyphicon glyphicon-info-sign\"></span> Não houve retorno de registros</td>
                    </tr>

                    <tr ng-show=\"list.length > 0\" ng-repeat=\"item in list | filter:searchText\">
                        <td>{[{ item.titulo }]}</td>
                        <td>{[{ item.descricao }]}</td>
                        <td style=\"width: 100px\">
                            <a href=\"#/evento/{[{ item.id }]}/edit\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
                            <a ng-click=\"remove(\$index, item.id)\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "EventoEventoBundle:Evento:lista.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
