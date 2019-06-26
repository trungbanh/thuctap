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
class __TwigTemplate_568c1ec11096278a00083fa09cb84657674db167ab7f48f3cc00bdcc17326943 extends \Twig\Template
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

";
        // line 9
        $this->loadTemplate("layout/Header.html.twig", "/layout/base.html.twig", 9)->display($context);
        // line 10
        echo "
    ";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "

";
        // line 14
        $this->loadTemplate("layout/Footer.html.twig", "/layout/base.html.twig", 14)->display($context);
        // line 15
        echo "</html>";
    }

    // line 6
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 11
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
        return array (  75 => 11,  69 => 6,  65 => 15,  63 => 14,  59 => 12,  57 => 11,  54 => 10,  52 => 9,  46 => 6,  39 => 1,);
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

{% include 'layout/Header.html.twig' %}

    {% block body %}{% endblock %}


{% include 'layout/Footer.html.twig' %}
</html>", "/layout/base.html.twig", "/home/dr-trange/Code/PHP/blog/View/layout/base.html.twig");
    }
}
