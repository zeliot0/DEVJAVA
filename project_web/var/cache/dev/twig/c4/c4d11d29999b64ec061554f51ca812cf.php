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

/* Milestones/index.html.twig */
class __TwigTemplate_4b1e91767a243c9daeae2abe7919d08e extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "theme/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/index.html.twig"));

        $this->parent = $this->load("theme/base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Jalons";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/milestones-index-modern.css?v=20260214b"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        // line 12
        yield "<div class=\"nexa-milestones-container milestones-page-modern\">
    <div class=\"page-header\">
        <div>
            <h1>Jalons</h1>
            <p>Suivez vos jalons et étapes importantes</p>
        </div>
        <div class=\"page-actions\">
            ";
        // line 19
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_new");
            yield "\" class=\"btn primary milestones-add-btn\">
                    <i class=\"fas fa-plus-circle\"></i> Ajouter un jalon
                </a>
            ";
        }
        // line 24
        yield "        </div>
    </div>

    <div class=\"nexa-milestone-progress\">
        <div class=\"nexa-milestone-progress-header\">
            <h4 class=\"nexa-milestone-progress-title\">Vos jalons</h4>
            <span class=\"nexa-milestone-progress-count\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["milestones"]) || array_key_exists("milestones", $context) ? $context["milestones"] : (function () { throw new RuntimeError('Variable "milestones" does not exist.', 30, $this->source); })())), "html", null, true);
        yield " jalon(s)</span>
        </div>
    </div>

    <div class=\"nexa-milestones-list\">
        ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["milestones"]) || array_key_exists("milestones", $context) ? $context["milestones"] : (function () { throw new RuntimeError('Variable "milestones" does not exist.', 35, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["milestone"]) {
            // line 36
            yield "        <div class=\"nexa-milestone-card milestones-modern-card\">
            <div class=\"nexa-milestone-header\">
                <h3 class=\"nexa-milestone-title\">";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "title", [], "any", false, false, false, 38), "html", null, true);
            yield "</h3>
                <span class=\"nexa-badge\">";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "getStatus", [], "method", false, false, false, 39)), "html", null, true);
            yield "</span>
            </div>
            
            <p class=\"milestones-modern-description\">
                ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "description", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "description", [], "any", false, false, false, 43), "—")) : ("—")), "html", null, true);
            yield "
            </p>
            
            <div class=\"milestones-modern-meta\">
                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-calendar-alt\"></i>
                    <span>";
            // line 49
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "dueDate", [], "any", false, false, false, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "dueDate", [], "any", false, false, false, 49), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</span>
                </div>
                ";
            // line 51
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "goalGoa", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-bullseye\"></i>
                    <span>";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "goalGoa", [], "any", false, false, false, 54), "titleGoa", [], "any", false, false, false, 54), 0, 26), "html", null, true);
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "goalGoa", [], "any", false, false, false, 54), "titleGoa", [], "any", false, false, false, 54)) > 26)) ? ("...") : (""));
                yield "</span>
                </div>
                ";
            }
            // line 57
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "completedDate", [], "any", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 58
                yield "                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-check-circle is-success\"></i>
                    <span>";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "completedDate", [], "any", false, false, false, 60), "d/m/Y"), "html", null, true);
                yield "</span>
                </div>
                ";
            }
            // line 63
            yield "            </div>

            <div class=\"nexa-table-actions milestones-modern-actions\">
                <a href=\"";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "id", [], "any", false, false, false, 66)]), "html", null, true);
            yield "\" class=\"nexa-btn-action nexa-btn-view\" title=\"Voir\">
                    <i class=\"fas fa-eye\"></i>
                </a>
                ";
            // line 69
            if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 70
                yield "                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "id", [], "any", false, false, false, 70)]), "html", null, true);
                yield "\" class=\"nexa-btn-action nexa-btn-edit\" title=\"Modifier\">
                    <i class=\"fas fa-pen\"></i>
                </a>
                <form method=\"post\" action=\"";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "id", [], "any", false, false, false, 73)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer ce jalon ?');\">
                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 74
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "id", [], "any", false, false, false, 74))), "html", null, true);
                yield "\">
                    <button type=\"submit\" class=\"nexa-btn-action nexa-btn-delete\" title=\"Supprimer\">
                        <i class=\"fas fa-trash\"></i>
                    </button>
                </form>
                ";
            }
            // line 80
            yield "            </div>
        </div>
        ";
            $context['_iterated'] = true;
        }
        // line 82
        if (!$context['_iterated']) {
            // line 83
            yield "        <div class=\"nexa-milestones-empty milestones-modern-empty\">
            <p>Aucun jalon trouvé.</p>
            <a href=\"";
            // line 85
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_new");
            yield "\" class=\"btn primary milestones-add-btn\">Ajouter un jalon</a>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['milestone'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "    </div>
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
        return "Milestones/index.html.twig";
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
        return array (  281 => 88,  272 => 85,  268 => 83,  266 => 82,  260 => 80,  251 => 74,  247 => 73,  240 => 70,  238 => 69,  232 => 66,  227 => 63,  221 => 60,  217 => 58,  214 => 57,  207 => 54,  203 => 52,  201 => 51,  196 => 49,  187 => 43,  180 => 39,  176 => 38,  172 => 36,  167 => 35,  159 => 30,  151 => 24,  143 => 20,  141 => 19,  132 => 12,  119 => 11,  106 => 8,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/Milestones/index.html.twig #}
{% extends 'theme/base.html.twig' %}

{% block title %}Jalons{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/milestones-index-modern.css?v=20260214b') }}\">
{% endblock %}

{% block body %}
<div class=\"nexa-milestones-container milestones-page-modern\">
    <div class=\"page-header\">
        <div>
            <h1>Jalons</h1>
            <p>Suivez vos jalons et étapes importantes</p>
        </div>
        <div class=\"page-actions\">
            {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_milestones_new') }}\" class=\"btn primary milestones-add-btn\">
                    <i class=\"fas fa-plus-circle\"></i> Ajouter un jalon
                </a>
            {% endif %}
        </div>
    </div>

    <div class=\"nexa-milestone-progress\">
        <div class=\"nexa-milestone-progress-header\">
            <h4 class=\"nexa-milestone-progress-title\">Vos jalons</h4>
            <span class=\"nexa-milestone-progress-count\">{{ milestones|length }} jalon(s)</span>
        </div>
    </div>

    <div class=\"nexa-milestones-list\">
        {% for milestone in milestones %}
        <div class=\"nexa-milestone-card milestones-modern-card\">
            <div class=\"nexa-milestone-header\">
                <h3 class=\"nexa-milestone-title\">{{ milestone.title }}</h3>
                <span class=\"nexa-badge\">{{ milestone.getStatus()|upper }}</span>
            </div>
            
            <p class=\"milestones-modern-description\">
                {{ milestone.description|default('—') }}
            </p>
            
            <div class=\"milestones-modern-meta\">
                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-calendar-alt\"></i>
                    <span>{{ milestone.dueDate ? milestone.dueDate|date('d/m/Y') : '—' }}</span>
                </div>
                {% if milestone.goalGoa %}
                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-bullseye\"></i>
                    <span>{{ milestone.goalGoa.titleGoa|slice(0, 26) }}{{ milestone.goalGoa.titleGoa|length > 26 ? '...' : '' }}</span>
                </div>
                {% endif %}
                {% if milestone.completedDate %}
                <div class=\"nexa-meta-item\">
                    <i class=\"fas fa-check-circle is-success\"></i>
                    <span>{{ milestone.completedDate|date('d/m/Y') }}</span>
                </div>
                {% endif %}
            </div>

            <div class=\"nexa-table-actions milestones-modern-actions\">
                <a href=\"{{ path('app_milestones_show', {'id': milestone.id}) }}\" class=\"nexa-btn-action nexa-btn-view\" title=\"Voir\">
                    <i class=\"fas fa-eye\"></i>
                </a>
                {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_milestones_edit', {'id': milestone.id}) }}\" class=\"nexa-btn-action nexa-btn-edit\" title=\"Modifier\">
                    <i class=\"fas fa-pen\"></i>
                </a>
                <form method=\"post\" action=\"{{ path('app_milestones_delete', {'id': milestone.id}) }}\" onsubmit=\"return confirm('Supprimer ce jalon ?');\">
                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ milestone.id) }}\">
                    <button type=\"submit\" class=\"nexa-btn-action nexa-btn-delete\" title=\"Supprimer\">
                        <i class=\"fas fa-trash\"></i>
                    </button>
                </form>
                {% endif %}
            </div>
        </div>
        {% else %}
        <div class=\"nexa-milestones-empty milestones-modern-empty\">
            <p>Aucun jalon trouvé.</p>
            <a href=\"{{ path('app_milestones_new') }}\" class=\"btn primary milestones-add-btn\">Ajouter un jalon</a>
        </div>
        {% endfor %}
    </div>
</div>
{% endblock %}
", "Milestones/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\Milestones\\index.html.twig");
    }
}
