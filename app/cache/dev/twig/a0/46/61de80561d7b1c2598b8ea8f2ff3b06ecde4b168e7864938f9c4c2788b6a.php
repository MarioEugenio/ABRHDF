<?php

/* CoreUserBundle:Default:login.html.twig */
class __TwigTemplate_a04661de80561d7b1c2598b8ea8f2ff3b06ecde4b168e7864938f9c4c2788b6a extends Twig_Template
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
        echo "<div class=\"row\" style=\"margin-left:20%;\" ng-show=\"login\">
    <form  ng-controller=\"LoginCtrl\" ng-submit=\"autenticar()\">
        <div class=\"col-md-4\">
            <div class=\"login-panel panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Por favor, entre com seus dados</h3>
                </div>
                <div class=\"panel-body\">
                    <form role=\"form\">
                        <fieldset>
                            <div class=\"form-group\">
                                <input class=\"form-control\" placeholder=\"E-mail\" ng-model=\"form.email\" name=\"email\" type=\"email\" autofocus required>
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" placeholder=\"Password\" name=\"password\" ng-model=\"form.senha\" type=\"password\" value=\"\" required>
                            </div>
                            <div class=\"checkbox\">
                                <label>
                                    <input name=\"remember\" type=\"checkbox\" value=\"Remember Me\">Relembrar
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\"><span class=\"glyphicon glyphicon-log-in\"></span> Logar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class=\"col-md-4\">
            <div class=\"login-panel panel panel-default\">
                <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">Nao Tenho Cadastro</h3>
                </div>
                <div class=\"panel-body\">
                    <form role=\"form\" ng-submit=\"cadastrar()\">
                        <fieldset>
                            <div class=\"form-group\">
                                Criar Cadastro
                            </div>
                            <div class=\"form-group\">
                                <input class=\"form-control\" placeholder=\"E-mail\" ng-model=\"verify.email\" name=\"email\" type=\"email\" autofocus required>
                            </div>
                            <div class=\"form-group\" style=\"height: 29px;\">
                                &nbsp;
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\"><span class=\"glyphicon glyphicon-log-in\"></span> Criar Cadastro</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
<div class=\"row\"  ng-show=\"tipo\">
    <div class=\"col-md-4 col-md-push-4\">
        <div class=\"login-panel panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Tipo de cadastro</h3>
            </div>
            <div class=\"panel-body\">
                <form role=\"form\" ng-submit=\"tipoCadastro()\">
                    <fieldset>
                        <div class=\"form-group\">
                            <!-- Change this to a button or input when using this as a form -->
                            <button class=\"btn btn-lg btn-primary btn-block\" ng-click=\"fisico()\">Cadastro de Pessoa Fisica</button>
                        </div>
                        <div class=\"form-group\">
                            <!-- Change this to a button or input when using this as a form -->
                            <button class=\"btn btn-lg btn-primary btn-block\" ng-click=\"juridico()\">Cadastro de Pessoa Juridica</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=\"row\"  ng-show=\"tipoFisico\">
    <div class=\"col-md-12\" style=\"top:-205px\">
        <div class=\"login-panel panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Cadastro de Pessoa Fisica</h3>
            </div>
            <div class=\"panel-body\">
                <form role=\"form\" ng-submit=\"cadastroFisico()\" name=\"formCadFisica\">
                    <fieldset>
                        <div ng-include=\"formulario\"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=\"row\"  ng-show=\"tipoJuridico\">
    <div class=\"col-md-12\" style=\"top:-205px\">
        <div class=\"login-panel panel panel-default\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Cadastro de Pessoa Juridica</h3>
            </div>
            <div class=\"panel-body\">
                <form role=\"form\" ng-submit=\"cadastroJuridico()\"  name=\"formCadJurico\">
                    <fieldset>
                        <div ng-include=\"formulario\"></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "CoreUserBundle:Default:login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
