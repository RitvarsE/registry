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

/* DeleteView.twig */
class __TwigTemplate_c1ca499e9da0e6f999094afe6ea02bad062bceeb9938e3d9ee66fd5379199d10 extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">

<body>
";
        // line 5
        $this->loadTemplate("searchIDView.twig", "DeleteView.twig", 5)->display($context);
        // line 6
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "DeleteView.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "DeleteView.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\DeleteView.twig");
    }
}
