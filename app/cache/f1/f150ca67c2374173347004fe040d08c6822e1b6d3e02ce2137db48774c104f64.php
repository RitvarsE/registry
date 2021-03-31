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

/* foundPersons.twig */
class __TwigTemplate_ddc56b979da71f905c6df75641075dd109688b9a11122c2fea0b5bd8770d03ba extends Template
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
<h1 class=\"ml-5\">Members</h1>
    <table class=\"ml-5 table-auto border-4 border-light-blue-500 border-opacity-100\">
        <tr>
        <td class=\"m-8 border-4 border-light-blue-500 border-opacity-100\">Name</td>
        <td class=\"m-8 border-4 border-light-blue-500 border-opacity-100\">Person code</td>
        <td class=\"border-4 border-light-blue-500 border-opacity-100\">Age</td>
        <td class=\"border-4 border-light-blue-500 border-opacity-100\">Address</td>
        <td class=\"border-4 border-light-blue-500 border-opacity-100\">Description</td>
        </tr>

                <tr>
                    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["person"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["persons"]) {
            // line 15
            echo "                    <td class=\"border-4 border-light-blue-500 border-opacity-100\">";
            echo twig_escape_filter($this->env, ($context["person"] ?? null), "html", null, true);
            echo "</td>
                    <td class=\"border-4 border-light-blue-500 border-opacity-100\"><?= \$code ?></td>
                    <td class=\"border-4 border-light-blue-500 border-opacity-100\"><?= \$age ?></td>
                    <td class=\"border-4 border-light-blue-500 border-opacity-100\"><?= \$address ?></td>
                    <td class=\"border-4 border-light-blue-500 border-opacity-100\"><?= \$description ?></td>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['persons'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "foundPersons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 21,  56 => 15,  52 => 14,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "foundPersons.twig", "C:\\laragon\\www\\codelex-di\\app\\Views\\foundPersons.twig");
    }
}
