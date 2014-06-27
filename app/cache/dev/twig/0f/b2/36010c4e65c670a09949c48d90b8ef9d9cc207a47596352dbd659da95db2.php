<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_0fb236010c4e65c670a09949c48d90b8ef9d9cc207a47596352dbd659da95db2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("Grupo51ProyectoBundle::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'login' => array($this, 'block_login'),
            'register' => array($this, 'block_register'),
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

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "    Bienvenido al sistema de FBA
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 73
        echo "
";
    }

    // line 9
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 10
        echo "      
        ";
        // line 11
        $this->displayBlock('login', $context, $blocks);
        // line 54
        echo "        

        ";
        // line 56
        $this->displayBlock('register', $context, $blocks);
        // line 70
        echo " 

    ";
    }

    // line 11
    public function block_login($context, array $blocks = array())
    {
        // line 12
        echo "
        ";
        // line 13
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 14
            echo "            <script type=\"text/javascript\">
                location.href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("grupo51_proyecto_home");
            echo "\";
            </script>

        ";
        }
        // line 19
        echo "        <nav class=\"navbar navbar-default\" role=\"navigation\">
          <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
              
              <a class=\"navbar-brand\" href=\"#\">Proyecto de Software</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
              <ul class=\"nav navbar-nav navbar-right\">
                <form class=\"navbar-form navbar-left\"  action=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\"  method=\"POST\">
                    <div class=\"form-group\">
                        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

                        <label for=\"username\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                        <input type=\"text\" id=\"username\"  class=\"form-control\" placeholder=\"Usuario\" name=\"_username\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />

                        <label for=\"password\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                        <input type=\"password\" class=\"form-control\" placeholder=\"Password\" id=\"password\" name=\"_password\" required=\"required\" />

                        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                        <label for=\"remember_me\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>

                        <input type=\"submit\"  id=\"_submit\" class=\"btn btn-default\" name=\"_submit\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
                        <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 43
        echo "grupo51_proyecto_home";
        echo "\" />
                    </div>
                </form>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        ";
        // line 50
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 51
            echo "            <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
        ";
        }
        // line 53
        echo "        ";
    }

    // line 56
    public function block_register($context, array $blocks = array())
    {
        // line 57
        echo "          <div class=\"row\">
                <div class=\"col-md-8\">
                                <h3><span class=\"label label-info\">¿No tienes cuenta? Registrate!</span></h3> 

                        ";
        // line 61
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('routing')->getUrl("fos_user_registration_register"), array());
        // line 62
        echo "
                </div>
                <div class=\"col-md-4\">

                </div>

            </div>
            
        ";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 62,  167 => 61,  161 => 57,  158 => 56,  154 => 53,  148 => 51,  146 => 50,  136 => 43,  132 => 42,  127 => 40,  120 => 36,  115 => 34,  111 => 33,  106 => 31,  101 => 29,  89 => 19,  82 => 15,  79 => 14,  77 => 13,  74 => 12,  71 => 11,  65 => 70,  63 => 56,  59 => 54,  57 => 11,  54 => 10,  51 => 9,  46 => 73,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
