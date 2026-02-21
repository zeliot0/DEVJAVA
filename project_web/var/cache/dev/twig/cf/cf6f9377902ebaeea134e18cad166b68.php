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

/* mouvement/stats.html.twig */
class __TwigTemplate_058347c0a2835ba1e9bf29086058026f extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "theme/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/stats.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/stats.html.twig"));

        $this->parent = $this->load("theme/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Statistiques Mouvements — NEXA";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "
<div class=\"page-header\">
    <div>
        <h1>Statistiques mouvements</h1>
        <p>Répartition par type</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
        yield "\" class=\"btn\">
            ← Retour
        </a>
        <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_pdf");
        yield "\" class=\"btn primary\">
            Export PDF
        </a>
    </div>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        <div class=\"form-section\">
            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Total mouvements</span>
                    <span class=\"info-value\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalMouvements"]) || array_key_exists("totalMouvements", $context) ? $context["totalMouvements"] : (function () { throw new RuntimeError('Variable "totalMouvements" does not exist.', 30, $this->source); })()), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité totale</span>
                    <span class=\"info-value\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuantite"]) || array_key_exists("totalQuantite", $context) ? $context["totalQuantite"] : (function () { throw new RuntimeError('Variable "totalQuantite" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "</span>
                </div>
            </div>
        </div>

        <div class=\"form-section\">
            <h3 style=\"margin-top:0\">Histogramme (quantité totale)</h3>

            <div class=\"histo\">
                ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stats"]) || array_key_exists("stats", $context) ? $context["stats"] : (function () { throw new RuntimeError('Variable "stats" does not exist.', 44, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 45
            yield "                    ";
            $context["value"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "totalQuantite", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "totalQuantite", [], "any", false, false, false, 45), 0)) : (0));
            // line 46
            yield "                    ";
            $context["percent"] = ((((isset($context["maxTotalQuantite"]) || array_key_exists("maxTotalQuantite", $context) ? $context["maxTotalQuantite"] : (function () { throw new RuntimeError('Variable "maxTotalQuantite" does not exist.', 46, $this->source); })()) > 0)) ? ((((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 46, $this->source); })()) / (isset($context["maxTotalQuantite"]) || array_key_exists("maxTotalQuantite", $context) ? $context["maxTotalQuantite"] : (function () { throw new RuntimeError('Variable "maxTotalQuantite" does not exist.', 46, $this->source); })())) * 100)) : (0));
            // line 47
            yield "
                    <div class=\"histo-row\">
                        <div class=\"histo-label\">";
            // line 49
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 49)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "type", [], "any", false, false, false, 49), "html", null, true)) : ("—"));
            yield "</div>
                        <div class=\"histo-track\">
                            <div class=\"histo-fill\" style=\"width: ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percent"]) || array_key_exists("percent", $context) ? $context["percent"] : (function () { throw new RuntimeError('Variable "percent" does not exist.', 51, $this->source); })()), "html", null, true);
            yield "%\"></div>
                        </div>
                        <div class=\"histo-value\">";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 53, $this->source); })()), "html", null, true);
            yield " (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "totalMouvements", [], "any", false, false, false, 53), "html", null, true);
            yield ")</div>
                    </div>
                ";
            $context['_iterated'] = true;
        }
        // line 55
        if (!$context['_iterated']) {
            // line 56
            yield "                    <div class=\"warning\">Aucune donnée</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['row'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        yield "            </div>
            <div style=\"margin-top:10px; color: var(--muted); font-weight:800; font-size:.85rem\">
                Valeur = quantité totale, ( ) = nombre de mouvements.
            </div>
        </div>

    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "mouvement/stats.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  195 => 58,  188 => 56,  186 => 55,  177 => 53,  172 => 51,  167 => 49,  163 => 47,  160 => 46,  157 => 45,  152 => 44,  140 => 35,  132 => 30,  116 => 17,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Statistiques Mouvements — NEXA{% endblock %}

{% block body %}

<div class=\"page-header\">
    <div>
        <h1>Statistiques mouvements</h1>
        <p>Répartition par type</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        <a href=\"{{ path('app_mouvement_index') }}\" class=\"btn\">
            ← Retour
        </a>
        <a href=\"{{ path('app_mouvement_pdf') }}\" class=\"btn primary\">
            Export PDF
        </a>
    </div>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        <div class=\"form-section\">
            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Total mouvements</span>
                    <span class=\"info-value\">{{ totalMouvements }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité totale</span>
                    <span class=\"info-value\">{{ totalQuantite }}</span>
                </div>
            </div>
        </div>

        <div class=\"form-section\">
            <h3 style=\"margin-top:0\">Histogramme (quantité totale)</h3>

            <div class=\"histo\">
                {% for row in stats %}
                    {% set value = row.totalQuantite|default(0) %}
                    {% set percent = maxTotalQuantite > 0 ? (value / maxTotalQuantite * 100) : 0 %}

                    <div class=\"histo-row\">
                        <div class=\"histo-label\">{{ row.type ?: '—' }}</div>
                        <div class=\"histo-track\">
                            <div class=\"histo-fill\" style=\"width: {{ percent }}%\"></div>
                        </div>
                        <div class=\"histo-value\">{{ value }} ({{ row.totalMouvements }})</div>
                    </div>
                {% else %}
                    <div class=\"warning\">Aucune donnée</div>
                {% endfor %}
            </div>
            <div style=\"margin-top:10px; color: var(--muted); font-weight:800; font-size:.85rem\">
                Valeur = quantité totale, ( ) = nombre de mouvements.
            </div>
        </div>

    </div>
</div>

{% endblock %}


", "mouvement/stats.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\mouvement\\stats.html.twig");
    }
}
