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

/* /layout/base.html.twig */
class __TwigTemplate_19d20cd140ff1c843b62eb35ed5c71bb941c7abff8f8df0d7dc4e89e36cb878d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<header>
    ";
        // line 9
        $this->loadTemplate("layout/Header.html.twig", "/layout/base.html.twig", 9)->display($context);
        // line 10
        echo "</header>
<body>

";
        // line 13
        $this->displayBlock('body', $context, $blocks);
        // line 14
        echo "
</body>

<footer>
    ";
        // line 18
        $this->loadTemplate("layout/Footer.html.twig", "/layout/base.html.twig", 18)->display($context);
        // line 19
        echo "</footer>

</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 13
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "/layout/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 13,  75 => 6,  69 => 19,  67 => 18,  61 => 14,  59 => 13,  54 => 10,  52 => 9,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}{% endblock %}</title>
</head>
<header>
    {% include 'layout/Header.html.twig' %}
</header>
<body>

{% block body %}{% endblock %}

</body>

<footer>
    {% include 'layout/Footer.html.twig' %}
</footer>

</html>", "/layout/base.html.twig", "/home/dr-trange/Code/PHP/blog/View/layout/base.html.twig");
    }
}
