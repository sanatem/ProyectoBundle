<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_794b2e96b23569d7f04fcddb36d4d76a332dd2ec56669ab8fdaa58cd6def3274 extends Twig_Template
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

    // line 12
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 13
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 14
            echo "    <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</div>
";
        }
        // line 16
        $this->displayBlock('login', $context, $blocks);
        // line 54
        $this->displayBlock('register', $context, $blocks);
    }

    // line 16
    public function block_login($context, array $blocks = array())
    {
        // line 17
        echo "<nav class=\"navbar navbar-default\" role=\"navigation\">
  <div class=\"container-fluid\">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class=\"navbar-header\">
      <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
      <a class=\"navbar-brand\" href=\"#\">Proyecto de Software</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class=\"nav navbar-nav navbar-right\">
        <form class=\"navbar-form navbar-left\" role=\"search\">
            <div class=\"form-group\">
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

                <label for=\"username\">";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <input type=\"text\" id=\"username\"  class=\"form-control\" placeholder=\"Usuario\" name=\"_username\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" required=\"required\" />

                <label for=\"password\">";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <input type=\"password\" class=\"form-control\" placeholder=\"Password\" id=\"password\" name=\"_password\" required=\"required\" />

                <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\" />
                <label for=\"remember_me\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>

                <input type=\"submit\"  id=\"_submit\" class=\"btn btn-default\" name=\"_submit\" value=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
                <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 46
        echo "grupo51_proyecto_home";
        echo "\" />
            </div>
        </form>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
";
    }

    // line 54
    public function block_register($context, array $blocks = array())
    {
        // line 55
        echo "    <div class=\"row\">
        <div class=\"col-md-6\">

        </div>
        <div class=\"col-md-6\">
            <h3><span class=\"label label-info\">¿No tienes cuenta?, Registrate!</span></h3>       
            <form action=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
        echo "\"  method=\"POST\" class=\"fos_user_registration_register\">
            <table class=\"table table-condensed\">
            <tr>
            <td>
                    <label for=\"fos_user_registration_form_email\" class=\"required\">Email:</label>
            </td>
            <td>
                    <input type=\"email\" class=\"form-control\" id=\"fos_user_registration_form_email\" name=\"fos_user_registration_form[email]\" required=\"required\">
            </td>
            </tr>
            <tr> 
            <td>
                    <label for=\"fos_user_registration_form_username\" class=\"required\">Nombre de usuario:</label>
            </td>
            <td>
                    <input type=\"text\" class=\"form-control\" id=\"fos_user_registration_form_username\" name=\"fos_user_registration_form[username]\" required=\"required\" maxlength=\"255\" pattern=\".{2,}\">
            </td>
            </tr>
            <tr>
            <td>
                    <label for=\"fos_user_registration_form_plainPassword_first\" class=\"required\">Contraseña:</label>
            </td>
            <td>
                    <input type=\"password\" class=\"form-control\" id=\"fos_user_registration_form_plainPassword_first\" name=\"fos_user_registration_form[plainPassword][first]\" required=\"required\">
            </td>
            </tr>
            <tr>
            <td>
                    <label for=\"fos_user_registration_form_plainPassword_second\" class=\"required\">Repita la contraseña:</label>
            </td>
            <td>
                    <input type=\"password\" class=\"form-control\" id=\"fos_user_registration_form_plainPassword_second\" name=\"fos_user_registration_form[plainPassword][second]\" required=\"required\">
            </td>
            </tr>
            <tr>
            <td>
                    <div>
                        <input type=\"submit\" value=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("registration.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "\" />
                    </div>
            </td>
            </tr>
            </table>
            <input type=\"hidden\" id=\"fos_user_registration_form__token\" name=\"fos_user_registration_form[_token]\" value=\"ZIltcyVhUQX8JPdGWOGCmBwlYcwNCFF35hcVWfM3BsE\">
            </form>
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
        return array (  182 => 98,  142 => 61,  134 => 55,  131 => 54,  119 => 46,  115 => 45,  110 => 43,  103 => 39,  98 => 37,  94 => 36,  89 => 34,  70 => 17,  67 => 16,  63 => 54,  61 => 16,  55 => 14,  53 => 13,  50 => 12,  43 => 9,  40 => 8,  35 => 5,  32 => 4,);
    }
}
