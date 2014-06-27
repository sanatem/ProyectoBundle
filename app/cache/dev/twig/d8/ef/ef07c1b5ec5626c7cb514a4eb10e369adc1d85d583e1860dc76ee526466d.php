<?php

/* Grupo51ProyectoBundle::base.html.twig */
class __TwigTemplate_d8efef07c1b5ec5626c7cb514a4eb10e369adc1d85d583e1860dc76ee526466d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 9
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 19
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Bienvenido!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\">
        ";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "            <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/jquery.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.js"), "html", null, true);
        echo "\"></script> 
            <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("highcharts/js/highcharts.js"), "html", null, true);
        echo "\"></script> 
            <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("funcionGraficos.js"), "html", null, true);
        echo "\"></script>    
        ";
    }

    public function getTemplateName()
    {
        return "Grupo51ProyectoBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 17,  86 => 16,  69 => 12,  62 => 7,  53 => 5,  47 => 19,  44 => 13,  42 => 12,  33 => 6,  29 => 5,  23 => 1,  169 => 62,  167 => 61,  161 => 57,  158 => 56,  154 => 53,  148 => 51,  146 => 50,  136 => 43,  132 => 42,  127 => 40,  120 => 36,  115 => 34,  111 => 33,  106 => 31,  101 => 29,  89 => 19,  82 => 15,  79 => 14,  77 => 14,  74 => 13,  71 => 11,  65 => 70,  63 => 56,  59 => 6,  57 => 11,  54 => 10,  51 => 9,  46 => 73,  43 => 9,  40 => 8,  35 => 9,  32 => 4,);
    }
}
