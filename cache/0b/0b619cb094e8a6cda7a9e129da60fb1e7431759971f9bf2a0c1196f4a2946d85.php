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

/* /Blog/detail.html.twig */
class __TwigTemplate_bb05c55ffe2ef15c5bd587d63f97d874ac3b1d275917efb75f9f864da05db06f extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout/base.html.twig", "/Blog/detail.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        $context["blog"] = ($context["detail"] ?? null);
        // line 6
        echo "    <div class='row'>
        <div class='slide col-3'>
            ";
        // line 8
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 8), "getUser", [], "method", false, false, false, 8);
        // line 9
        echo "            ";
        if ((twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 9) == twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getIdAuthor", [], "method", false, false, false, 9))) {
            // line 10
            echo "                <script >
                    \$(document).ready(function(){
                        \$(\"#myform\").on(\"submit\",function(event){
                            event.preventDefault();
                            \$.ajax({
                                type       : 'DELETE',
                                url        : '/blog',
                                data       : \$(\"#myform\").serialize(),
                                success: function() {
                                    window.location=\"/blogs\";
                                }
                            });
                            return true;
                        });
                    });
                </script>
                <form id='myform' enctype='multipart/form-data'>
                    <input name=\"id\" type=hidden value=";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 27), "html", null, true);
            echo " />
                    <input name=\"idAuthor\" type=hidden value=";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 28), "html", null, true);
            echo " />
                    <input type=\"submit\" name='delblog' value='xóa bài này '/>
                </form> 
                <br/>
                <a class=\"btn\" href= ";
            // line 32
            echo twig_escape_filter($this->env, ("/blog/update/" . twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 32)), "html", null, true);
            echo ">cập nhập nội dung</a>
            ";
        } else {
            // line 34
            echo "                <div >
                    <img src=\"/static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                    <p> phần này thuộc tác giả ";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 37), "html", null, true);
            echo " </p>
                </div>
                

        ";
        }
        // line 42
        echo "        </div>
            <article class='col-9'>
                <p id=\"header\"> ";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getTitle", [], "method", false, false, false, 44), "html", null, true);
        echo " </p>
                <p id=\"contend\"> 
                        ";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getContent", [], "method", false, false, false, 46), "html", null, true);
        echo "
                </p>
                <p id=\"author_blog\"> 
                    ";
        // line 49
        echo twig_escape_filter($this->env, ("write by " . twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 49)), "html", null, true);
        echo "
                </p>
            </article>
        </div>
";
    }

    public function getTemplateName()
    {
        return "/Blog/detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 49,  118 => 46,  113 => 44,  109 => 42,  101 => 37,  96 => 34,  91 => 32,  84 => 28,  80 => 27,  61 => 10,  58 => 9,  56 => 8,  52 => 6,  50 => 5,  46 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}


{% block body %}
{% set blog = detail %}
    <div class='row'>
        <div class='slide col-3'>
            {% set user = App.session.getUser() %}
            {% if blog.getAuthor() == user.getIdAuthor() %}
                <script >
                    \$(document).ready(function(){
                        \$(\"#myform\").on(\"submit\",function(event){
                            event.preventDefault();
                            \$.ajax({
                                type       : 'DELETE',
                                url        : '/blog',
                                data       : \$(\"#myform\").serialize(),
                                success: function() {
                                    window.location=\"/blogs\";
                                }
                            });
                            return true;
                        });
                    });
                </script>
                <form id='myform' enctype='multipart/form-data'>
                    <input name=\"id\" type=hidden value={{blog.getId()}} />
                    <input name=\"idAuthor\" type=hidden value={{blog.getAuthor()}} />
                    <input type=\"submit\" name='delblog' value='xóa bài này '/>
                </form> 
                <br/>
                <a class=\"btn\" href= {{\"/blog/update/\"~blog.getId()}}>cập nhập nội dung</a>
            {% else %}
                <div >
                    <img src=\"/static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                    <p> phần này thuộc tác giả {{blog.getAuthor()}} </p>
                </div>
                

        {% endif %}
        </div>
            <article class='col-9'>
                <p id=\"header\"> {{ blog.getTitle() }} </p>
                <p id=\"contend\"> 
                        {{ blog.getContent() }}
                </p>
                <p id=\"author_blog\"> 
                    {{\"write by \" ~blog.getAuthor() }}
                </p>
            </article>
        </div>
{% endblock %}", "/Blog/detail.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/detail.html.twig");
    }
}
