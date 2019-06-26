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
        echo "<div class='row'>
    <div class=\"col-9\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 9
            echo "        <div class=\"col-4\">
            <div>
                <a href = ";
            // line 11
            echo twig_escape_filter($this->env, ("/blog/" . twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 11)), "html", null, true);
            echo " > 
                <div class=\"card col-12\">
                    <img class=\"image col-12\" src='/static/download.jpeg' />
                    <div class=\"body-card\">
                        <span id=\"title_blog\">";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getTitle", [], "method", false, false, false, 15), "html", null, true);
            echo "</span> <br/>
                        <span id=\"author_blog\"> 
                            ";
            // line 17
            echo twig_escape_filter($this->env, ("write by " . twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 17)), "html", null, true);
            echo "
                        </span>
                    </div>
                </div>  
                </a>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "    </div>
    
    <div class=\"col-3\">
        <img class=\"image col-12 \" src=\"/static/qc.jpeg\" alt=\"quảng cáo\"/>
        <span> quảng cáo </span>
    </div>
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
        return array (  96 => 25,  82 => 17,  77 => 15,  70 => 11,  66 => 9,  62 => 8,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '/layout/base.html.twig' %}

{% block title %} index {% endblock %}

{% block body %}
<div class='row'>
    <div class=\"col-9\">
        {% for blog in list %}
        <div class=\"col-4\">
            <div>
                <a href = {{ \"/blog/\"~ blog.getId() }} > 
                <div class=\"card col-12\">
                    <img class=\"image col-12\" src='/static/download.jpeg' />
                    <div class=\"body-card\">
                        <span id=\"title_blog\">{{ blog.getTitle() }}</span> <br/>
                        <span id=\"author_blog\"> 
                            {{ \"write by \"~ blog.getAuthor() }}
                        </span>
                    </div>
                </div>  
                </a>
            </div>
        </div>
        {% endfor %}
    </div>
    
    <div class=\"col-3\">
        <img class=\"image col-12 \" src=\"/static/qc.jpeg\" alt=\"quảng cáo\"/>
        <span> quảng cáo </span>
    </div>
</div>
    

{% endblock %}", "/Blog/index.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/index.html.twig");
    }
}
