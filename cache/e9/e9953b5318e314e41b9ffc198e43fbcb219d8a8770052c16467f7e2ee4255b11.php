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

/* User/logon.html.twig */
class __TwigTemplate_034410570192692f18adee72efb68e55798f841a5bf0e370650674f96d53d623 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout/base.html.twig", "User/logon.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<script >

    \$(document).ready(function(){
        \$(\"#login\").on(\"click\",function(event){
            // event.preventDefault();
            \$.ajax({
                type : 'PATCH',
                url : '/author',
                data : \$(\"#myform\").serialize(),
                success: function() {
                    window.location=\"/blogs\";
                }
            });
            return false;
        });

        \$(\"#signin\").on(\"click\",function(event){
            // event.preventDefault();
            \$.ajax({
                type : 'PUT',
                url : '/author',
                data : \$(\"#myform\").serialize(),
                success: function() {
                    window.location=\"/blogs\";
                }
            });
            return false;
        });
    });
</script>
<div class='updatebox'>
    <form id='myform' enctype='multipart/form-data'>
        Tên: <input name=\"nickname\" type=\"text\"> <br/>
        Email: <input name=\"mail\" type=\"text\"> <br/>
        Mật khẩu : <input name=\"pass\" type=\"password\"> <br/>
        <button id='login' name=\"login\" >Đăng Nhập</button>
        <button id='signin' name=\"signin\" >Đăng Ký</button> 
    </form>
</div>

";
    }

    public function getTemplateName()
    {
        return "User/logon.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}
<script >

    \$(document).ready(function(){
        \$(\"#login\").on(\"click\",function(event){
            // event.preventDefault();
            \$.ajax({
                type : 'PATCH',
                url : '/author',
                data : \$(\"#myform\").serialize(),
                success: function() {
                    window.location=\"/blogs\";
                }
            });
            return false;
        });

        \$(\"#signin\").on(\"click\",function(event){
            // event.preventDefault();
            \$.ajax({
                type : 'PUT',
                url : '/author',
                data : \$(\"#myform\").serialize(),
                success: function() {
                    window.location=\"/blogs\";
                }
            });
            return false;
        });
    });
</script>
<div class='updatebox'>
    <form id='myform' enctype='multipart/form-data'>
        Tên: <input name=\"nickname\" type=\"text\"> <br/>
        Email: <input name=\"mail\" type=\"text\"> <br/>
        Mật khẩu : <input name=\"pass\" type=\"password\"> <br/>
        <button id='login' name=\"login\" >Đăng Nhập</button>
        <button id='signin' name=\"signin\" >Đăng Ký</button> 
    </form>
</div>

{% endblock %}

", "User/logon.html.twig", "/home/dr-trange/Code/PHP/blog/View/User/logon.html.twig");
    }
}
