<?php

/* Grupo51ProyectoBundle:LoggedUser:home.html.twig */
class __TwigTemplate_11708c0559556a92c5c8cf3109e4ce839155a17011acc6d7c087031db0649ca6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Grupo51ProyectoBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
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
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"jumbotron\">Vamo lo pibe </div>
<a href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
        echo "\">irme a la bosta</a>
";
    }

    public function getTemplateName()
    {
        return "Grupo51ProyectoBundle:LoggedUser:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 4,  31 => 3,  28 => 2,);
    }
}
