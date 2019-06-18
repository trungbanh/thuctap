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

/* /Blog/update.html.twig */
class __TwigTemplate_8adde68366b788fbf82c117fa12555167afd312cf15556cc1489965b58585810 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("layout/base.html.twig", "/Blog/update.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["blog"]) {
            // line 6
            echo "
";
            // line 7
            if ((twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "getIdAuthor", [], "method", false, false, false, 7) != twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 7))) {
                // line 8
                echo "    <h1 style='color:red;'> bạn không có quyền tác động bài viết này </h1>
";
            } else {
                // line 9
                echo "  
<div class='updatebox row'>
    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  ";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 13), "html", null, true);
                echo "  </label>
            <input name=\"id\" value= ";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 14), "html", null, true);
                echo " type=hidden  /> <br/>
            <input name=\"idAuthor\" value= ";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 15), "html", null, true);
                echo " type=hidden  /> <br/>
            <label for=\"title\">tên bài viết :</label>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" > ";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getTitle", [], "method", false, false, false, 17), "html", null, true);
                echo " </textarea> <br> <br>
            <input type=\"submit\" value='cập nhập tên ' name='updateblog'/>
        </form> 
    </div>

    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  ";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 24), "html", null, true);
                echo " </label>
            <input name=\"id\" value= ";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getId", [], "method", false, false, false, 25), "html", null, true);
                echo " type=hidden  /> <br/>
            <input name=\"idAuthor\" value= ";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getAuthor", [], "method", false, false, false, 26), "html", null, true);
                echo " type=hidden  /> <br/>
            <textarea type=text name=\"content\" id=\"nodung\"  rows=\"30\" cols=\"35\"> ";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["blog"], "getContent", [], "method", false, false, false, 27), "html", null, true);
                echo "</textarea><br><br>
            <input type=\"submit\" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>

";
            }
            // line 34
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
";
    }

    public function getTemplateName()
    {
        return "/Blog/update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 36,  117 => 34,  107 => 27,  103 => 26,  99 => 25,  95 => 24,  85 => 17,  80 => 15,  76 => 14,  72 => 13,  66 => 9,  62 => 8,  60 => 7,  57 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}

{% for blog in list %}

{% if ( session.getIdAuthor() != blog.getAuthor() ) %}
    <h1 style='color:red;'> bạn không có quyền tác động bài viết này </h1>
{% else %}  
<div class='updatebox row'>
    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  {{blog.getId()}}  </label>
            <input name=\"id\" value= {{blog.getId()}} type=hidden  /> <br/>
            <input name=\"idAuthor\" value= {{ blog.getAuthor()}} type=hidden  /> <br/>
            <label for=\"title\">tên bài viết :</label>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" > {{ blog.getTitle()}} </textarea> <br> <br>
            <input type=\"submit\" value='cập nhập tên ' name='updateblog'/>
        </form> 
    </div>

    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  {{blog.getId()}} </label>
            <input name=\"id\" value= {{blog.getId()}} type=hidden  /> <br/>
            <input name=\"idAuthor\" value= {{ blog.getAuthor()}} type=hidden  /> <br/>
            <textarea type=text name=\"content\" id=\"nodung\"  rows=\"30\" cols=\"35\"> {{ blog.getContent()}}</textarea><br><br>
            <input type=\"submit\" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>

{% endif %}

{% endfor %}

{% endblock %}", "/Blog/update.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/update.html.twig");
    }
}
