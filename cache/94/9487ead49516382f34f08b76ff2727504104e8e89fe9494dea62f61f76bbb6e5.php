<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* User/detailuser.html.twig */
class __TwigTemplate_2223523fefef73b787d1c1cecdf9f7df444fcd50a0bf7b1bfacdf014b427eb81 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout/base.html.twig", "User/detailuser.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <div id=\"mgs\">
    </div>
    <script >
        \$(document).ready(function(){
            \$(\"#updatedetail\").on(\"click\",function(event){
                \$.ajax({
                    type : 'POST',
                    url : '/author/update/detail',
                    data : \$(\"#detai\").serialize(),
                    success: function(data) {
                        console.log(data);
                        \$(\"#mgs\").html(data);
                        //window.location=\"/blogs\";
                        // alert(data);
                    }
                });
                return false;
            });

            \$(\"#updatepass\").on(\"click\",function(event){
                event.preventDefault();
                let re = \$('input[name=passre]').val(); 
                let newp = \$('input[name=passnew]').val(); 
                if (re != newp) {
                    alert(\"password khong giong nhau\");
                }
            });
        });
    </script>

    ";
        // line 34
        echo twig_var_dump($this->env, $context, ...[0 => ($context["session"] ?? null)]);
        echo "
    <div class='updatebox row'>
        <form id='detai' enctype='multipart/form-data'>
            <input name=\"idAuthor\" type=\"hidden\" value= ";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getIdAuthor", [], "method", false, false, false, 37), "html", null, true);
        echo " > <br/>
            Tên: <input name=\"nickname\" type=\"text\" value= ";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getNickname", [], "method", false, false, false, 38), "html", null, true);
        echo " > <br/>
            Email: <input name=\"mail\" type=\"text\" value= ";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getMail", [], "method", false, false, false, 39), "html", null, true);
        echo "> <br/>
            Mật khẩu cũ : <input name=\"passold\" type=\"password\" > <br/>
            Mật khẩu mới : <input name=\"passnew\" type=\"password\" > <br/>
            Mật khẩu mới nhập lại : <input name=\"passre\" type=\"password\" > <br/>
            
            <button id='updatedetail' name=\"update\" >Cập nhập</button>
        </form>
    </div>

";
    }

    public function getTemplateName()
    {
        return "User/detailuser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 39,  92 => 38,  88 => 37,  82 => 34,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}
    <div id=\"mgs\">
    </div>
    <script >
        \$(document).ready(function(){
            \$(\"#updatedetail\").on(\"click\",function(event){
                \$.ajax({
                    type : 'POST',
                    url : '/author/update/detail',
                    data : \$(\"#detai\").serialize(),
                    success: function(data) {
                        console.log(data);
                        \$(\"#mgs\").html(data);
                        //window.location=\"/blogs\";
                        // alert(data);
                    }
                });
                return false;
            });

            \$(\"#updatepass\").on(\"click\",function(event){
                event.preventDefault();
                let re = \$('input[name=passre]').val(); 
                let newp = \$('input[name=passnew]').val(); 
                if (re != newp) {
                    alert(\"password khong giong nhau\");
                }
            });
        });
    </script>

    {{dump(session)}}
    <div class='updatebox row'>
        <form id='detai' enctype='multipart/form-data'>
            <input name=\"idAuthor\" type=\"hidden\" value= {{user.getIdAuthor()}} > <br/>
            Tên: <input name=\"nickname\" type=\"text\" value= {{user.getNickname()}} > <br/>
            Email: <input name=\"mail\" type=\"text\" value= {{ user.getMail()}}> <br/>
            Mật khẩu cũ : <input name=\"passold\" type=\"password\" > <br/>
            Mật khẩu mới : <input name=\"passnew\" type=\"password\" > <br/>
            Mật khẩu mới nhập lại : <input name=\"passre\" type=\"password\" > <br/>
            
            <button id='updatedetail' name=\"update\" >Cập nhập</button>
        </form>
    </div>

{% endblock %}
", "User/detailuser.html.twig", "/home/dr-trange/Code/PHP/blog/View/User/detailuser.html.twig");
    }
}
