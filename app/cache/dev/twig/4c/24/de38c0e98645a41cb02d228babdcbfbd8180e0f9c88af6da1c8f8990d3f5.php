<?php

/* Grupo51ProyectoBundle:Default:index.html.twig */
class __TwigTemplate_4c24de38c0e98645a41cb02d228babdcbfbd8180e0f9c88af6da1c8f8990d3f5 extends Twig_Template
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
 <div class=\"alert alert-warning\">que puto que es el que no modula</div>
";
    }

    // line 11
    public function block_javascript($context, array $blocks = array())
    {
        // line 12
        echo " <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
 <script type=\"text/javascript\" src=\"";
        // line 13
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
        return array (  62 => 13,  57 => 12,  54 => 11,  46 => 7,  43 => 6,  40 => 5,  33 => 3,  30 => 2,);
    }
}
