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

/* header.twig */
class __TwigTemplate_b8cff0dfdb6fd8068bae64184dac99cb9ce7e27cda16fa22090f93ebf21dda58 extends Template
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
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <link href=\"https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css\" rel=\"stylesheet\">
    <title>Person Registry</title>
</head>
<body>
<h2 class=\"text-5xl font-bold ml-9\">Person Registry</h2>
<div class=\"bg-gray-50\">
    <div class=\"max-w-7xl mx-left py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between\">
        <div class=\"mt-8 flex lg:mt-0 lg:flex-shrink-0\">
            <div class=\"inline-flex rounded-md shadow\">
                <a href=\"/add\" class=\"inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700\">
                    Add people
                </a>
            </div>
            <div class=\"ml-3 inline-flex rounded-md shadow\">
                <a href=\"/update\" class=\"inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50\">
                    Update people
                </a>
            </div>
            <div class=\"ml-3 inline-flex rounded-md shadow\">
                <a href=\"/delete\" class=\"inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700\">
                    Delete people
                </a>
            </div>
            <div class=\"ml-3 inline-flex rounded-md shadow\">
                <a href=\"/search\" class=\"inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50\">
                    Search people
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\header.twig");
    }
}
