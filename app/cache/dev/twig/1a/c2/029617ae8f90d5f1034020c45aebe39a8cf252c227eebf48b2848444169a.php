<?php

/* EventoEventoBundle:Evento:cadastro.html.twig */
class __TwigTemplate_1ac2029617ae8f90d5f1034020c45aebe39a8cf252c227eebf48b2848444169a extends Twig_Template
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
        echo "<form ng-controller=\"EventoCadastroCtrl\" ng-init=\"init()\" ng-submit=\"save()\">
    <h2>Cadastro de Evento<br> <small>Todos os campos deste formuário são obrigatórios</small></h2>
    <hr>

    <ol class=\"breadcrumb\">
        <li><a href=\"#/\">Inicial</a></li>
        <li><a href=\"#/evento\">Evento</a></li>
        <li class=\"active\">Cadastro</li>
    </ol>

    <input type=\"hidden\" ng-model=\"form.id\" value=\"form.id\">

            <div class=\"form-group\">
                <input bs-switch ng-model=\"form.publicar\" type=\"radio\" switch-label=\"PUBLICAR\"
                       switch-on-text=\"Sim\" switch-off-text=\"Não\" ng-true-value=\"1\" ng-false-value=\"0\">
            </div>

            <div class=\"form-group\">
                <label for=\"exampleInputEmail1\">Título</label>
                <input type=\"text\" class=\"form-control\" maxlength=\"255\" ng-model=\"form.titulo\" placeholder=\"Digite o título do evento\" required>
            </div>

            <div class=\"form-group\">
                <label for=\"exampleInputEmail1\">Descrição</label>
                <input type=\"text\" class=\"form-control\" maxlength=\"2000\" ng-model=\"form.descricao\" placeholder=\"Digite a descrição do evento\" required>
            </div>

            <div class=\"row\">

                <div class=\"form-group col-md-3\" ng-class=\"{'has-error': form.inscricaoInicio.\$invalid}\">
                    <label >Início das Inscrições</label>
                    <p class=\"input-group\">
                        <input type=\"date\" class=\"form-control\" ng-model=\"form.inscricaoInicio\" is-open=\"opened\" datepicker-options=\"dateOptions\" datepicker-popup=\"{[{ format }]}\" ng-required=\"true\" close-text=\"Fechar\" />
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\" ng-click=\"open(\$event)\"><i class=\"glyphicon glyphicon-calendar\"></i></button>
                        </span>
                    </p>
                </div>

                <div class=\"form-group col-md-3\" ng-class=\"{'has-error': form.inscricaoFim.\$invalid}\">
                    <label >Fim das Inscrições</label>
                    <p class=\"input-group\">
                        <input type=\"date\" class=\"form-control\" ng-model=\"form.inscricaoFim\" datepicker-options=\"dateOptions\" is-open=\"opened\" datepicker-popup=\"{[{ format }]}\" ng-required=\"true\" close-text=\"Fechar\" />
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\" ng-click=\"open(\$event)\"><i class=\"glyphicon glyphicon-calendar\"></i></button>
                        </span>
                    </p>
                </div>

            </div>

            <div class=\"row\">

                <div class=\"form-group col-md-3\" ng-class=\"{'has-error': form.dataInicio.\$invalid}\">
                    <label >Início do Evento</label>
                    <p class=\"input-group\">
                        <input type=\"date\" class=\"form-control\"  ng-model=\"form.dataInicio\" is-open=\"opened\" datepicker-options=\"dateOptions\" datepicker-popup=\"{[{ format }]}\" ng-required=\"true\" close-text=\"Fechar\" />
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\" ng-click=\"open(\$event)\"><i class=\"glyphicon glyphicon-calendar\"></i></button>
                        </span>
                    </p>
                </div>

                <div class=\"form-group col-md-3\" ng-class=\"{'has-error': form.dataFim.\$invalid}\">
                    <label >Fim do Evento</label>
                    <p class=\"input-group\">
                        <input type=\"date\" class=\"form-control\" ng-model=\"form.dataFim\" is-open=\"opened\" datepicker-options=\"dateOptions\" datepicker-popup=\"{[{ format }]}\" ng-required=\"true\" close-text=\"Fechar\" />
                        <span class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\" ng-click=\"open(\$event)\"><i class=\"glyphicon glyphicon-calendar\"></i></button>
                        </span>
                    </p>
                </div>

            </div>

            <div class=\"form-group\">
                <label for=\"exampleInputEmail1\">Local</label>
                <input type=\"text\" class=\"form-control\" maxlength=\"2000\" ng-model=\"form.local\" placeholder=\"Digite o local do evento\" required>
            </div>

            <div class=\"row\">
                <div class=\"form-group col-md-2\">
                    <label ><i class=\"fa fa-clock-o\"></i> Carga horária (H)</label>
                    <input type=\"number\" maxlength=\"10\" class=\"form-control\" ng-model=\"form.cargaHoraria\" placeholder=\"Digite a carga horária\" required>
                </div>
            </div>

            <div class=\"form-group\">
                <input bs-switch ng-model=\"form.eventoPago\" type=\"radio\" switch-label=\"EVENTO PAGO\"
                       switch-on-text=\"Sim\" switch-off-text=\"Não\" ng-true-value=\"1\" ng-false-value=\"0\">
            </div>

            <fieldset ng-show=\"form.eventoPago == 1\">
                <legend>Valor do Evento</legend>

                <div class=\"row\">
                    <div class=\"form-group col-md-3\">
                        <label ><i class=\"fa fa-money\"></i> Valor Sócio</label>
                        <input mask-money prefix=\"real.prefix\"  type=\"text\" maxlength=\"20\" class=\"form-control\" ng-model=\"form.valorSocio\" placeholder=\"Digite o valor\" ng-required=\"form.eventoPago == 1\">
                    </div>

                    <div class=\"form-group col-md-3\">
                        <label ><i class=\"fa fa-money\"></i> Valor não Sócio</label>
                        <input mask-money prefix=\"real.prefix\" type=\"text\" maxlength=\"20\" class=\"form-control\" ng-model=\"form.valorNSocio\" placeholder=\"Digite o valor\" ng-required=\"form.eventoPago == 1\">
                    </div>

                    <div class=\"form-group col-md-3\">
                        <label ><i class=\"fa fa-money\"></i> Valor Estudante</label>
                        <input mask-money prefix=\"real.prefix\" type=\"text\" maxlength=\"20\" class=\"form-control\" ng-model=\"form.valorEstudante\" placeholder=\"Digite o valor\" ng-required=\"form.eventoPago == 1\">
                    </div>

                    <div class=\"form-group col-md-3\">
                        <label ><i class=\"fa fa-money\"></i> Valor Estudante Associado</label>
                        <input mask-money prefix=\"real.prefix\" type=\"text\" maxlength=\"20\" class=\"form-control\" ng-model=\"form.valorEstudanteAssociado\" placeholder=\"Digite o valor\" ng-required=\"form.eventoPago == 1\">
                    </div>
                </div>
            </fieldset>


    <hr>

    <div class=\"box\">
        <a href=\"#/evento\" class=\"btn btn-default\">CANCELAR</a>
        <button type=\"submit\" class=\"btn btn-primary\">SALVAR</button>
    </div>

</form>";
    }

    public function getTemplateName()
    {
        return "EventoEventoBundle:Evento:cadastro.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
