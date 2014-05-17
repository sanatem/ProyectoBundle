<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_0fb236010c4e65c670a09949c48d90b8ef9d9cc207a47596352dbd659da95db2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("FOSUserBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
            'login' => array($this, 'block_login'),
            'register' => array($this, 'block_register'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "Welcome
";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\">
";
    }

    // line 13
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 14
        echo "  
    ";
        // line 15
        $this->displayBlock('login', $context, $blocks);
        // line 58
        echo "    

    ";
        // line 60
        $this->displayBlock('register', $context, $blocks);
        // line 79
        echo " 

";
    }

    // line 15
    public function block_login($context, array $blocks = array())
    {
        // line 16
        echo "
    ";
        // line 17
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 18
            echo "        <script type=\"text/javascript\">
            location.href=\"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("grupo51_proyecto_home");
            echo "\";
        </script>

    ";
        }
        // line 23
        echo "    <nav class=\"navbar navbar-default\" role=\"navigation\">
      <div class=\"container-fluid\">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class=\"navbar-header\">
          
          <a class=\"navbar-brand\" href=\"#\">Proyecto de Software</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class=\"nav navbar-nav navbar-right\">
            <form class=\"navbar-form navbar-left\"  action=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("fos_user_security_check");
        echo "\"  method=\"POST\">
                <div class=\"form-group\">
                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

                    <label for=\"username\">";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    <input type=\"text\" id=\"username\"  class=\"form-control\" placeholder=\"Usuario\" name=\"_username\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />

                    <label for=\"password\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                    <input type=\"password\" class=\"form-control\" placeholder=\"Password\" id=\"password\" name=\"_password\" required=\"required\" />

                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                    <label for=\"remember_me\">";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>

                    <input type=\"submit\"  id=\"_submit\" class=\"btn btn-default\" name=\"_submit\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
                    <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 47
        echo "grupo51_proyecto_home";
        echo "\" />
                </div>
            </form>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    ";
        // line 54
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 55
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
    ";
        }
        // line 57
        echo "    ";
    }

    // line 60
    public function block_register($context, array $blocks = array())
    {
        // line 61
        echo "      <div class=\"row\">
            <div class=\"col-md-6\">

            </div>
            <div class=\"col-md-6\">
                <h3><span class=\"label label-info\">¿No tienes cuenta?, Registrate!</span></h3> 
                <table class=\"table table-condensed\">
                <tr>
                <td>
                    <label>";
        // line 70
        echo $this->env->getExtension('actions')->renderUri($this->env->getExtension('routing')->getUrl("fos_user_registration_register"), array());
        echo "</label>
                </td>
                </tr>
                     
                </table>
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
        return array (  171 => 70,  160 => 61,  157 => 60,  153 => 57,  147 => 55,  145 => 54,  135 => 47,  131 => 46,  126 => 44,  119 => 40,  114 => 38,  110 => 37,  105 => 35,  100 => 33,  88 => 23,  81 => 19,  78 => 18,  76 => 17,  73 => 16,  70 => 15,  64 => 79,  62 => 60,  58 => 58,  56 => 15,  53 => 14,  50 => 13,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
