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
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i&display=swap&subset=vietnamese\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/style.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js\"></script>
</head>
<body>
    <header class=\"header\">
        <div>
            <a href=\"/blogs\"> <h1 class='Title_web'>Trung blog </h1> </a> 
            <div class=\"navmenu\">
                    <ul>
                        <li><a href=/blogs>bài viết</a></li>
                        <li><a href=/blogs>sản phẩm </a></li>
                        <li><a href=/blogs>tìm kiếm</a></li>
                    </ul>
                </div>
            <div class='sign'>  
                ";
        // line 19
        $context["user"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["App"] ?? null), "session", [], "any", false, false, false, 19), "getUser", [], "method", false, false, false, 19);
        // line 20
        echo "
                ";
        // line 22
        echo "                ";
        if (($context["user"] ?? null)) {
            // line 23
            echo "                    <span class=\"user\">
                            <a id='username' href='/author/update' > ";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getNickname", [], "method", false, false, false, 24), "html", null, true);
            echo "</a>
                    </span>
                    <span id=\"logout\">
                        <a href='/author/logout' >đăng xuất  </a>
                    </span>
                ";
        } else {
            // line 30
            echo "                    <a href=\"/author\"> <span> Đăng nhập </span> </a>
                ";
        }
        // line 32
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
        return array (  81 => 32,  77 => 30,  68 => 24,  65 => 23,  62 => 22,  59 => 20,  57 => 19,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html>
<head>
    <link href=\"https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i&display=swap&subset=vietnamese\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/static/style.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js\"></script>
</head>
<body>
    <header class=\"header\">
        <div>
            <a href=\"/blogs\"> <h1 class='Title_web'>Trung blog </h1> </a> 
            <div class=\"navmenu\">
                    <ul>
                        <li><a href=/blogs>bài viết</a></li>
                        <li><a href=/blogs>sản phẩm </a></li>
                        <li><a href=/blogs>tìm kiếm</a></li>
                    </ul>
                </div>
            <div class='sign'>  
                {% set user = App.session.getUser() %}

                {# {{dump(user)}} #}
                {% if user %}
                    <span class=\"user\">
                            <a id='username' href='/author/update' > {{ user.getNickname() }}</a>
                    </span>
                    <span id=\"logout\">
                        <a href='/author/logout' >đăng xuất  </a>
                    </span>
                {% else %}
                    <a href=\"/author\"> <span> Đăng nhập </span> </a>
                {% endif %}
            </div>
        </div>
    </header>", "layout/Header.html.twig", "/home/dr-trange/Code/PHP/blog/View/layout/Header.html.twig");
    }
}
