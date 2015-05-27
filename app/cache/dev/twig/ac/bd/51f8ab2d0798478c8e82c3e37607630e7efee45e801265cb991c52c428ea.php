<?php

/* CoreBaseBundle:Default:index.html.twig */
class __TwigTemplate_acbd51f8ab2d0798478c8e82c3e37607630e7efee45e801265cb991c52c428ea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "CoreBaseBundle:Default:index.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/corebase/css/base.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" />

";
    }

    // line 8
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        // line 10
        echo "    <script type=\"text/javascript\"> var baseUrl = \"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "baseurl", array()), "html", null, true);
        echo "\"; </script>
    <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/controller/loginCtrl.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coreuser/js/router/routers.js"), "html", null, true);
        echo "\"></script>

";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "    <div style=\"width: 40%;position: absolute;left: 55%;margin-top: 20px;z-index: 999999;\" id=\"alerts-container\"></div>
    <div id=\"content\" class=\"container\" ng-view></div>
";
    }

    public function getTemplateName()
    {
        return "CoreBaseBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 17,  62 => 16,  55 => 12,  51 => 11,  46 => 10,  44 => 9,  41 => 8,  33 => 4,  30 => 3,  11 => 1,);
    }
}
