<?php

/* Grupo51ProyectoBundle:Default:index.html.twig */
class __TwigTemplate_e56b2cbfcdd0be1bc01a004397cb2c115664b29c3811a696a41b17eb45739ca8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Grupo51ProyectoBundle::base.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Grupo51ProyectoBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 3
        echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\">
";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo " <script type=\"text/javascript\">
 \t\tlocation.href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
        echo "\";
 </script>
";
    }

    // line 10
    public function block_javascript($context, array $blocks = array())
    {
        // line 11
        echo " <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
 <script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("jquery.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "Grupo51ProyectoBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  56 => 11,  53 => 10,  46 => 7,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
