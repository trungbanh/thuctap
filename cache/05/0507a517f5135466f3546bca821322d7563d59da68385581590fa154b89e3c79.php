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
        $context["blog"] = ($context["detail"] ?? null);
        // line 6
        echo "
";
        // line 7
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 7), "getUser", [], "method", false, false, false, 7);
        // line 8
        echo "
";
        // line 9
        if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getIdAuthor", [], "method", false, false, false, 9) != twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 9))) {
            // line 10
            echo "    <h1 style='color:red;'> bạn không có quyền tác động bài viết này </h1>
";
        } else {
            // line 11
            echo "  
<div class='updatebox row'>
    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  ";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 15), "html", null, true);
            echo "  </label>
            <input name=\"id\" value= ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 16), "html", null, true);
            echo " type=hidden  /> <br/>
            <input name=\"idAuthor\" value= ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 17), "html", null, true);
            echo " type=hidden  /> <br/>
            <label for=\"title\">tên bài viết :</label>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" >";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getTitle", [], "method", false, false, false, 19), "html", null, true);
            echo "</textarea><br><br>
            <input type=\"submit\" value='cập nhập tên ' name='updateblog'/>
        </form> 
    </div>

    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  ";
            // line 26
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 26), "html", null, true);
            echo " </label>
            <input name=\"id\" value= ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getId", [], "method", false, false, false, 27), "html", null, true);
            echo " type=hidden  /> <br/>
            <input name=\"idAuthor\" value= ";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getAuthor", [], "method", false, false, false, 28), "html", null, true);
            echo " type=hidden  /><br/>
            <textarea type=text name=\"content\" id=\"nodung\"  rows=\"30\" cols=\"35\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["blog"] ?? null), "getContent", [], "method", false, false, false, 29), "html", null, true);
            echo "</textarea><br><br>
            <input type=\"submit\" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>

";
        }
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
        return array (  120 => 36,  110 => 29,  106 => 28,  102 => 27,  98 => 26,  88 => 19,  83 => 17,  79 => 16,  75 => 15,  69 => 11,  65 => 10,  63 => 9,  60 => 8,  58 => 7,  55 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout/base.html.twig' %}

{% block body %}

{% set blog = detail %}

{% set user = App.session.getUser() %}

{% if ( user.getIdAuthor() != blog.getAuthor() ) %}
    <h1 style='color:red;'> bạn không có quyền tác động bài viết này </h1>
{% else %}  
<div class='updatebox row'>
    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  {{blog.getId()}}  </label>
            <input name=\"id\" value= {{blog.getId()}} type=hidden  /> <br/>
            <input name=\"idAuthor\" value= {{ blog.getAuthor()}} type=hidden  /> <br/>
            <label for=\"title\">tên bài viết :</label>
            <textarea type=\"text\" name=\"title\" id=\"title\" rows=\"2\" cols=\"35\" >{{ blog.getTitle()}}</textarea><br><br>
            <input type=\"submit\" value='cập nhập tên ' name='updateblog'/>
        </form> 
    </div>

    <div class='form'>
        <form action='/blog' method=\"POST\">
            <label for=\"id\">id bài viết hiện tại:  {{blog.getId()}} </label>
            <input name=\"id\" value= {{blog.getId()}} type=hidden  /> <br/>
            <input name=\"idAuthor\" value= {{ blog.getAuthor()}} type=hidden  /><br/>
            <textarea type=text name=\"content\" id=\"nodung\"  rows=\"30\" cols=\"35\">{{ blog.getContent()}}</textarea><br><br>
            <input type=\"submit\" value='cập nhập nội dung' name='updateblog'/>
        </form> 
    </div>
</div>

{% endif %}


{% endblock %}", "/Blog/update.html.twig", "/home/dr-trange/Code/PHP/blog/View/Blog/update.html.twig");
    }
}
