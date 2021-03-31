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

/* SearchView.twig */
class __TwigTemplate_8d112a3eef01faffb6f5aa69c1341a99153179f9195252149cccb23124302083 extends Template
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
<h2 class=\"ml-10\">Search by:</h2>
<form method=\"get\">
<button type=\"submit\" formaction=\"/searchname\" formmethod=\"GET\" class=\"ml-10 bg-green-200 hover:bg-red-700 p-2\">Name</button>
<button type=\"submit\" formaction=\"/searchage\" formmethod=\"GET\" class=\" bg-green-200 hover:bg-red-700 p-2\">Age</button>
<button type=\"submit\" formaction=\"/searchaddress\" formmethod=\"GET\" class=\" bg-green-200 hover:bg-red-700 p-2\">Address</button>
</form>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "SearchView.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "SearchView.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\searchView.twig");
    }
}
