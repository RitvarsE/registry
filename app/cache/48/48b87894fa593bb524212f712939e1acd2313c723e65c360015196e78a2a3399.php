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

/* searchIDView.twig */
class __TwigTemplate_97d0a252ebdb25177e0ce034bca410a1143c296b744ae1b9a76031c5bd0e5341 extends Template
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
        echo "<html lang=\"en\">
<body>
<form method=\"get\">
    <label for=\"id\" class=\"ml-9\">Search by id:</label>
    <input type=\"text\" id=\"id\" name=\"id\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 \"><br><br>
    <button type=\"submit\" formmethod=\"post\" class=\"ml-32 bg-red-500 hover:bg-red-700 p-2\">Submit</button>
</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "searchIDView.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "searchIDView.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\searchIDView.twig");
    }
}
