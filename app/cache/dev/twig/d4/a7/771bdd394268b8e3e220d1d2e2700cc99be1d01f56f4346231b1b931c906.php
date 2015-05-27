<?php

/* CoreUserBundle:User:lista.html.twig */
class __TwigTemplate_d4a7771bdd394268b8e3e220d1d2e2700cc99be1d01f56f4346231b1b931c906 extends Twig_Template
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
        echo "
<div class=\"row\">
    <div class=\"col-lg-12\" ng-controller=\"UserListaCtrl\" ng-init=\"init()\">
        <h2>Usuário</h2>
        <hr>

        <ol class=\"breadcrumb\">
            <li><a href=\"#/\">Inicial</a></li>
            <li class=\"active\">Usuário</li>
        </ol>

        <div class=\"box\">
            <div class=\"input-group\">
                <input type=\"text\" class=\"form-control\" ng-model=\"searchText\" placeholder=\"Pesquisar usuário ...\">
                <span class=\"input-group-btn\">
                    <div class=\"btn btn-primary\" ng-click=\"buscar()\"><span class=\"glyphicon glyphicon-plus\"></span> Buscar</div>
                </span>
                <span class=\"input-group-btn\">
                    <a class=\"btn btn-primary\" href=\"#/user/cadastro\"><span class=\"glyphicon glyphicon-plus\"></span> Cadastrar</a>
                </span>
            </div>
        </div>

        <div class=\"panel panel-default\">
            <!-- Default panel contents -->
            <div class=\"panel-heading\"><span class=\"glyphicon glyphicon-info-sign\"></span> selecione abaixo o usuário que deseja alterar ou remover <span class=\"pull-right\">Total de registros: <span class=\"label label-info\">{[{ list.count  }]}</span></span></div>

            <!-- Table -->
            <table class=\"table\">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-show=\"list.items.length == 0 || list.length == 0\">
                        <td colspan=\"10\" style=\"text-align: center;\"><span class=\"glyphicon glyphicon-info-sign\"></span> Não houve retorno de registros</td>
                    </tr>

                    <tr ng-show=\"list.items.length > 0\" ng-repeat=\"item in list.items | filter:searchText\">
                        <td>{[{ item.nome }]}</td>
                        <td>{[{ item.email }]}</td>
                        <td style=\"width: 150px\">
                            <a href=\"#/user/{[{ item.id }]}/dependentes\" class=\"btn btn-default\" ng-show=\"item.flAssociado\"><span class=\"glyphicon glyphicon-user\"></span></a>
                            <a href=\"#/user/{[{ item.id }]}/edit\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-pencil\"></span></a>
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
        return "CoreUserBundle:User:lista.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
