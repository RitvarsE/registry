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

/* SearchNameView.twig */
class __TwigTemplate_4ff92a30ee9ad2bd87aa71568fe2b164808123cd5b9508778f29e485904bbea6 extends Template
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
    <label for=\"name\" class=\"ml-9\">Search by name:</label>
    <input type=\"text\" id=\"name\" name=\"name\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 \"><br><br>
    <button type=\"submit\" formmethod=\"post\" class=\"ml-32 bg-red-500 hover:bg-red-700 p-2\">Submit</button>
</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "SearchNameView.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<html lang=\"en\">
<body>
<form method=\"get\">
    <label for=\"name\" class=\"ml-9\">Search by name:</label>
    <input type=\"text\" id=\"name\" name=\"name\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 \"><br><br>
    <button type=\"submit\" formmethod=\"post\" class=\"ml-32 bg-red-500 hover:bg-red-700 p-2\">Submit</button>
</form>
</body>
</html>", "SearchNameView.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\searchNameView.twig");
    }
}
