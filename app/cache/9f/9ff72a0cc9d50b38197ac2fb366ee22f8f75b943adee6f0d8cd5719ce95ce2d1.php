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

/* AddView.twig */
class __TwigTemplate_7f51cd3f3cb5d73b0a3dea4460dc2c722b17885af075c72c976c5a1f60be725e extends Template
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
    <label for=\"name\" class=\"ml-9\">Name, Surname</label>
    <input type=\"text\" id=\"name\" name=\"name\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 \"><br><br>

    <label for=\"code\" class=\"ml-9\">Person code</label>
    <input type=\"text\" id=\"code\" name=\"code\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 ml-5\"><br><br>

    <label for=\"description\" class=\"ml-9\">Description</label>
    <input type=\"text\" id=\"description\" name=\"description\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 ml-5\"><br><br>

    <label for=\"age\" class=\"ml-9\">Age</label>
    <input type=\"text\" id=\"age\" name=\"age\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 ml-16\"><br><br>

    <label for=\"address\" class=\"ml-9\">Address</label>
    <input type=\"text\" id=\"address\" name=\"address\" class=\"bg-gray-200 focus:bg-white border-2 border-red-500 ml-6\"><br><br>

    <button type=\"submit\" formmethod=\"post\" class=\"ml-32 bg-red-500 hover:bg-red-700 p-2\">Submit</button>
</form>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "AddView.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "AddView.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\AddView.twig");
    }
}
