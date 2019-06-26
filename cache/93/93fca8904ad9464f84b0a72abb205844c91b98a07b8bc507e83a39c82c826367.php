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

/* layout/Header.html.twig */
class __TwigTemplate_aa3c37e3ccc48b0e4e844ba320b55b1aca8817469cb2660a052bab2cd555d572 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<html>
<head>
    <link rel=\"stylesheet\"  href=\"/static/font.css\" >
    <link rel=\"stylesheet\" href=\"/static/style.css\">

    <script src=\"/static/jquery.min.js\"></script>
    <script src='https://jqueryvalidation.org/files/lib/jquery-1.11.1.js' > </script>
    <script src=\"https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js\"></script>

    
</head>
<body>
    <header class=\"header\">
        <div class='row'>
            <a class=\"col-3\" href=\"/blogs\"> <span class='Title_web'>Trung blog </span> </a> 
            <div class=\"navmenu col-5\">
                <ul>
                    ";
        // line 18
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 18), "getUser", [], "method", false, false, false, 18);
        // line 19
        echo "                    ";
        if (($context["user"] ?? null)) {
            // line 20
            echo "                        <li><a href=/blog>viết bài</a></li>
                    ";
        }
        // line 22
        echo "                    <li><a href=/blogs> tác giả </a></li>
                    <li><a href=/blogs>tìm kiếm</a></li>
                </ul>
            </div>
            <div class='sign col-4'>  
                ";
        // line 27
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 27), "getUser", [], "method", false, false, false, 27);
        // line 28
        echo "                ";
        if (($context["user"] ?? null)) {
            // line 29
            echo "                    ";
            // line 30
            echo "                    <span id=\"user\">
                        <a id='username' href='/author/update' > ";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getNickname", [], "method", false, false, false, 31), "html", null, true);
            echo "</a>
                    </span>
                    <span  id=\"logout\">
                        <a href='/author/logout' >đăng xuất  </a>
                    </span>
                ";
        } else {
            // line 37
            echo "                    <a id='login' href=\"/author\"> Đăng nhập </a>
                ";
        }
        // line 39
        echo "            </div>
        </div>
    </header>";
    }

    public function getTemplateName()
    {
        return "layout/Header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 39,  91 => 37,  82 => 31,  79 => 30,  77 => 29,  74 => 28,  72 => 27,  65 => 22,  61 => 20,  58 => 19,  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
    <link rel=\"stylesheet\"  href=\"/static/font.css\" >
    <link rel=\"stylesheet\" href=\"/static/style.css\">

    <script src=\"/static/jquery.min.js\"></script>
    <script src='https://jqueryvalidation.org/files/lib/jquery-1.11.1.js' > </script>
    <script src=\"https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js\"></script>

    
</head>
<body>
    <header class=\"header\">
        <div class='row'>
            <a class=\"col-3\" href=\"/blogs\"> <span class='Title_web'>Trung blog </span> </a> 
            <div class=\"navmenu col-5\">
                <ul>
                    {% set user = App.session.getUser() %}
                    {% if user %}
                        <li><a href=/blog>viết bài</a></li>
                    {% endif %}
                    <li><a href=/blogs> tác giả </a></li>
                    <li><a href=/blogs>tìm kiếm</a></li>
                </ul>
            </div>
            <div class='sign col-4'>  
                {% set user = App.session.getUser() %}
                {% if user %}
                    {# {{dump(user)}} #}
                    <span id=\"user\">
                        <a id='username' href='/author/update' > {{ user.getNickname() }}</a>
                    </span>
                    <span  id=\"logout\">
                        <a href='/author/logout' >đăng xuất  </a>
                    </span>
                {% else %}
                    <a id='login' href=\"/author\"> Đăng nhập </a>
                {% endif %}
            </div>
        </div>
    </header>", "layout/Header.html.twig", "/home/dr-trange/Code/PHP/blog/View/layout/Header.html.twig");
    }
}
