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

/* layout/Footer.html.twig */
class __TwigTemplate_ca91db3ce28771d0c56af8f8a6db242eb4fb527e78b0c32312c1e579b6c1906c extends \Twig\Template
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
        echo "
  </div>

  <footer class=\"footer\">
    W3School hân hạnh tài trợ footer này  
  </footer>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "layout/Footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
  </div>

  <footer class=\"footer\">
    W3School hân hạnh tài trợ footer này  
  </footer>
  </body>
</html>", "layout/Footer.html.twig", "/home/dr-trange/Code/PHP/blog/View/layout/Footer.html.twig");
    }
}
