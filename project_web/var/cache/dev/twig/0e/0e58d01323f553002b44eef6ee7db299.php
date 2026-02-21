<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* _global_bubbles_bg.html.twig */
class __TwigTemplate_90da6d5c50577136ec935b720cc435bb extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_global_bubbles_bg.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_global_bubbles_bg.html.twig"));

        // line 1
        yield "<div class=\"global-bubbles-bg\" aria-hidden=\"true\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" aria-hidden=\"true\">
        <defs>
            <filter id=\"goo-global\">
                <feGaussianBlur in=\"SourceGraphic\" stdDeviation=\"10\" result=\"blur\" />
                <feColorMatrix in=\"blur\" mode=\"matrix\"
                    values=\"1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -8\"
                    result=\"goo\" />
                <feBlend in=\"SourceGraphic\" in2=\"goo\" />
            </filter>
        </defs>
    </svg>
    <div class=\"global-bubbles-gradients\">
        <div class=\"g1\"></div>
        <div class=\"g2\"></div>
        <div class=\"g3\"></div>
        <div class=\"g4\"></div>
        <div class=\"g5\"></div>
        <div class=\"interactive\"></div>
    </div>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "_global_bubbles_bg.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"global-bubbles-bg\" aria-hidden=\"true\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" aria-hidden=\"true\">
        <defs>
            <filter id=\"goo-global\">
                <feGaussianBlur in=\"SourceGraphic\" stdDeviation=\"10\" result=\"blur\" />
                <feColorMatrix in=\"blur\" mode=\"matrix\"
                    values=\"1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -8\"
                    result=\"goo\" />
                <feBlend in=\"SourceGraphic\" in2=\"goo\" />
            </filter>
        </defs>
    </svg>
    <div class=\"global-bubbles-gradients\">
        <div class=\"g1\"></div>
        <div class=\"g2\"></div>
        <div class=\"g3\"></div>
        <div class=\"g4\"></div>
        <div class=\"g5\"></div>
        <div class=\"interactive\"></div>
    </div>
</div>
", "_global_bubbles_bg.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\_global_bubbles_bg.html.twig");
    }
}
