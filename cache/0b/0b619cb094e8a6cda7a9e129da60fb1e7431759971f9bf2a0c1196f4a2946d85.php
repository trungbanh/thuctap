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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 6
            echo "    <div class='row'>
        <div class='slide'>
            ";
            // line 8
            if ((($context["session"] ?? null) && (twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 8) == twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "getIdAuthor", [], "method", false, false, false, 8)))) {
                // line 9
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
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 26), "html", null, true);
                echo " />
                    <input name=\"idAuthor\" type=hidden value=";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 27), "html", null, true);
                echo " />
                    <input type=\"submit\" name='delblog' value='xóa bài này '/>
                </form> 
                <br/>
                <a class=\"btn\" href= ";
                // line 31
                echo twig_escape_filter($this->env, ("/blog/update/" . twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 31)), "html", null, true);
                echo ">cập nhập nội dung</a>
            ";
            } else {
                // line 33
                echo "                <div class='ads'>
                    <img src=\"/static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                </div>
                <p> phần này thuộc tác giả ";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 37), "html", null, true);
                echo " </p>

        ";
            }
            // line 40
            echo "        </div>
            <article class='view_blog'>
                <p id=\"header\"> ";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getTitle", [], "method", false, false, false, 42), "html", null, true);
            echo " </p>
                <p id=\"contend\"> 
                        ";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getContent", [], "method", false, false, false, 44), "html", null, true);
            echo "
                </p>
                <p id=\"author_blog\"> 
                    ";
            // line 47
            echo twig_escape_filter($this->env, ("write by " . twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 47)), "html", null, true);
            echo "
                </p>
            </article>
        </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "
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
        return array (  133 => 52,  122 => 47,  116 => 44,  111 => 42,  107 => 40,  101 => 37,  95 => 33,  90 => 31,  83 => 27,  79 => 26,  60 => 9,  58 => 8,  54 => 6,  50 => 5,  46 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}


{% block body %}
{% for blog in list %}
    <div class='row'>
        <div class='slide'>
            {% if session and blog.getAuthor() == session.getIdAuthor() %}
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
                <div class='ads'>
                    <img src=\"/static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                    <p> quảng cáo  </p>
                </div>
                <p> phần này thuộc tác giả {{blog.getAuthor()}} </p>

        {% endif %}
        </div>
            <article class='view_blog'>
                <p id=\"header\"> {{ blog.getTitle() }} </p>
                <p id=\"contend\"> 
                        {{ blog.getContent() }}
                </p>
                <p id=\"author_blog\"> 
                    {{\"write by \" ~blog.getAuthor() }}
                </p>
            </article>
        </div>
{% endfor %}

{% endblock %}", "/Blog/detail.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/detail.html.twig");
    }
}
