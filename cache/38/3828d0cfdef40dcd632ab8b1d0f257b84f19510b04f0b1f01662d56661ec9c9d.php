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

/* /Blog/index.html.twig */
class __TwigTemplate_b2723f0b86c64897b6f360f5f3de002f699b9b254eb0eac036f3a228a36b9c3a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "/layout/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("/layout/base.html.twig", "/Blog/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " index ";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <div class='row'>
        <div class='slide'>

        ";
        // line 9
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 9), "getUser", [], "method", false, false, false, 9);
        // line 10
        echo "
            ";
        // line 11
        if (($context["user"] ?? null)) {
            // line 12
            echo "            <script >
                \$(document).ready(function(){
                    \$(\"#myform\").on(\"submit\",function(event){
                        event.preventDefault();
                        \$.ajax({
                            type       : 'PUT',
                            url        : '/blog',
                            data       : \$(\"#myform\").serialize(),
                            success: function() {
                                window.location=\"/blogs\";
                            }
                        });
                        return false;
                    });
                });
            </script>

            <div class='form'>
                <form id=\"myform\" enctype='multipart/form-data'> 
                    <label for=\"title\">tên bài viết :</label>
                    <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" > </textarea> <br> <br>
                    <label for=\"content\">nội dung bài viết :</label>
                    <textarea type=\"text\" name=\"content\" id=\"content\" rows=\"20\" cols=\"35\"> </textarea> <br> <br>
                    <input type=\"submit\" id='target' value=\"tạo bài viết mới\"/>
                </form> 
            </div>
            ";
        } else {
            // line 39
            echo "            <div class='ads'>
                <img src=\"./static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                <p> quảng cáo  </p>
            </div>
            ";
        }
        // line 44
        echo "        </div>
        <div class='body'>
            ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 47
            echo "            <a href = ";
            echo twig_escape_filter($this->env, ("/blog/" . twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 47)), "html", null, true);
            echo " > 
                <div class='card'>
                    <p id=\"title_blog\">";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getTitle", [], "method", false, false, false, 49), "html", null, true);
            echo "</p> <br/>
                    <span id=\"author_blog\"> 
                            ";
            // line 51
            echo twig_escape_filter($this->env, ("write by " . twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 51)), "html", null, true);
            echo "
                    </span>
                </div>  
            </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "        </div>

        </div>

";
    }

    public function getTemplateName()
    {
        return "/Blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 56,  125 => 51,  120 => 49,  114 => 47,  110 => 46,  106 => 44,  99 => 39,  70 => 12,  68 => 11,  65 => 10,  63 => 9,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '/layout/base.html.twig' %}

{% block title %} index {% endblock %}

{% block body %}
    <div class='row'>
        <div class='slide'>

        {% set user = App.session.getUser() %}

            {% if (user) %}
            <script >
                \$(document).ready(function(){
                    \$(\"#myform\").on(\"submit\",function(event){
                        event.preventDefault();
                        \$.ajax({
                            type       : 'PUT',
                            url        : '/blog',
                            data       : \$(\"#myform\").serialize(),
                            success: function() {
                                window.location=\"/blogs\";
                            }
                        });
                        return false;
                    });
                });
            </script>

            <div class='form'>
                <form id=\"myform\" enctype='multipart/form-data'> 
                    <label for=\"title\">tên bài viết :</label>
                    <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" > </textarea> <br> <br>
                    <label for=\"content\">nội dung bài viết :</label>
                    <textarea type=\"text\" name=\"content\" id=\"content\" rows=\"20\" cols=\"35\"> </textarea> <br> <br>
                    <input type=\"submit\" id='target' value=\"tạo bài viết mới\"/>
                </form> 
            </div>
            {% else %}
            <div class='ads'>
                <img src=\"./static/qc.jpeg\" alt=\"quảng cáo\" style='width: 10em;'/>
                <p> quảng cáo  </p>
            </div>
            {% endif %}
        </div>
        <div class='body'>
            {% for blog in list %}
            <a href = {{ \"/blog/\"~ blog.getId() }} > 
                <div class='card'>
                    <p id=\"title_blog\">{{ blog.getTitle() }}</p> <br/>
                    <span id=\"author_blog\"> 
                            {{ \"write by \"~ blog.getAuthor() }}
                    </span>
                </div>  
            </a>
            {% endfor %}
        </div>

        </div>

{% endblock %}", "/Blog/index.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/index.html.twig");
    }
}
