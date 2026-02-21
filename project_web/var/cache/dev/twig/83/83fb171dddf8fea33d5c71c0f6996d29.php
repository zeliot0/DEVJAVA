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

/* phoenix_goal/index.html.twig */
class __TwigTemplate_fb6d2a2e9b3d98758ea02a433a5d6c35 extends Template
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
        // line 1
        return "theme/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "phoenix_goal/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "phoenix_goal/index.html.twig"));

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

        yield "Phoenix Goals - NEXA";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/phoenix-goal-modern.css?v=20260220a"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<div class=\"container mt-4 pg-page\">
    ";
        // line 12
        $context["total"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["phoenix_goals"]) || array_key_exists("phoenix_goals", $context) ? $context["phoenix_goals"] : (function () { throw new RuntimeError('Variable "phoenix_goals" does not exist.', 12, $this->source); })()));
        // line 13
        yield "    ";
        $context["immortals"] = 0;
        // line 14
        yield "    ";
        $context["risen"] = 0;
        // line 15
        yield "    ";
        $context["avgLevel"] = 0;
        // line 16
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["phoenix_goals"]) || array_key_exists("phoenix_goals", $context) ? $context["phoenix_goals"] : (function () { throw new RuntimeError('Variable "phoenix_goals" does not exist.', 16, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 17
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["p"], "immortalityEnabled", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                $context["immortals"] = ((isset($context["immortals"]) || array_key_exists("immortals", $context) ? $context["immortals"] : (function () { throw new RuntimeError('Variable "immortals" does not exist.', 17, $this->source); })()) + 1);
            }
            // line 18
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["p"], "phoenixPhase", [], "any", false, false, false, 18) == "risen")) {
                $context["risen"] = ((isset($context["risen"]) || array_key_exists("risen", $context) ? $context["risen"] : (function () { throw new RuntimeError('Variable "risen" does not exist.', 18, $this->source); })()) + 1);
            }
            // line 19
            yield "        ";
            $context["avgLevel"] = ((isset($context["avgLevel"]) || array_key_exists("avgLevel", $context) ? $context["avgLevel"] : (function () { throw new RuntimeError('Variable "avgLevel" does not exist.', 19, $this->source); })()) + ((CoreExtension::getAttribute($this->env, $this->source, $context["p"], "phoenixLevel", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "phoenixLevel", [], "any", false, false, false, 19), 0)) : (0)));
            // line 20
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        yield "    ";
        $context["avgLevel"] = ((((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 21, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round(((isset($context["avgLevel"]) || array_key_exists("avgLevel", $context) ? $context["avgLevel"] : (function () { throw new RuntimeError('Variable "avgLevel" does not exist.', 21, $this->source); })()) / (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 21, $this->source); })())), 1)) : (0));
        // line 22
        yield "
    <div class=\"pg-header\">
        <div>
            <h1 class=\"pg-title\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goals</h1>
            <p class=\"pg-subtitle\">Resurrection journeys, phases, and rebirth progress.</p>
        </div>
        <div class=\"pg-actions\">
            <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"pg-btn\"><i class=\"fas fa-bullseye\"></i> Goals</a>
            <a href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_new");
        yield "\" class=\"pg-btn pg-btn-primary\"><i class=\"fas fa-plus\"></i> New Phoenix Goal</a>
        </div>
    </div>

    <div class=\"pg-kpis\">
        <article class=\"pg-kpi\"><span>Total Phoenix</span><strong>";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 35, $this->source); })()), "html", null, true);
        yield "</strong></article>
        <article class=\"pg-kpi\"><span>Risen</span><strong>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["risen"]) || array_key_exists("risen", $context) ? $context["risen"] : (function () { throw new RuntimeError('Variable "risen" does not exist.', 36, $this->source); })()), "html", null, true);
        yield "</strong></article>
        <article class=\"pg-kpi\"><span>Immortals</span><strong>";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["immortals"]) || array_key_exists("immortals", $context) ? $context["immortals"] : (function () { throw new RuntimeError('Variable "immortals" does not exist.', 37, $this->source); })()), "html", null, true);
        yield "</strong></article>
        <article class=\"pg-kpi\"><span>Avg Level</span><strong>";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgLevel"]) || array_key_exists("avgLevel", $context) ? $context["avgLevel"] : (function () { throw new RuntimeError('Variable "avgLevel" does not exist.', 38, $this->source); })()), "html", null, true);
        yield "</strong></article>
    </div>

    <div class=\"pg-table-wrap\">
        <table class=\"pg-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Goal</th>
                    <th>Phase</th>
                    <th>Level</th>
                    <th>Death Date</th>
                    <th>Rebirth Date</th>
                    <th>Immortality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["phoenix_goals"]) || array_key_exists("phoenix_goals", $context) ? $context["phoenix_goals"] : (function () { throw new RuntimeError('Variable "phoenix_goals" does not exist.', 56, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["phoenix_goal"]) {
            // line 57
            yield "                <tr>
                    <td>#";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "id", [], "any", false, false, false, 58), "html", null, true);
            yield "</td>
                    <td>
                        <strong>";
            // line 60
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "originalGoal", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "originalGoal", [], "any", false, false, false, 60), "titleGoa", [], "any", false, false, false, 60), "html", null, true)) : ("N/A"));
            yield "</strong>
                        ";
            // line 61
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "deathAnalysis", [], "any", false, false, false, 61)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 62
                yield "                            <div class=\"text-muted small\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "deathAnalysis", [], "any", false, false, false, 62), 0, 90), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "deathAnalysis", [], "any", false, false, false, 62)) > 90)) {
                    yield "...";
                }
                yield "</div>
                        ";
            }
            // line 64
            yield "                    </td>
                    <td><span class=\"pg-pill phase-";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "phoenixPhase", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "phoenixPhase", [], "any", false, false, false, 65), "ashes")) : ("ashes"))), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "phoenixPhase", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "phoenixPhase", [], "any", false, false, false, 65), "ashes")) : ("ashes"))), "html", null, true);
            yield "</span></td>
                    <td>";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "phoenixLevel", [], "any", false, false, false, 66), "html", null, true);
            yield "</td>
                    <td>";
            // line 67
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "deathDate", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "deathDate", [], "any", false, false, false, 67), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                    <td>";
            // line 68
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "rebirthDate", [], "any", false, false, false, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "rebirthDate", [], "any", false, false, false, 68), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
                    <td>
                        ";
            // line 70
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "immortalityEnabled", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 71
                yield "                            <span class=\"pg-pill phase-risen\">Enabled</span>
                        ";
            } else {
                // line 73
                yield "                            <span class=\"pg-pill\">Disabled</span>
                        ";
            }
            // line 75
            yield "                    </td>
                    <td>
                        <div class=\"pg-actions\">
                            <a href=\"";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "id", [], "any", false, false, false, 78)]), "html", null, true);
            yield "\" class=\"pg-btn\"><i class=\"fas fa-eye\"></i></a>
                            <a href=\"";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["phoenix_goal"], "id", [], "any", false, false, false, 79)]), "html", null, true);
            yield "\" class=\"pg-btn\"><i class=\"fas fa-pen\"></i></a>
                        </div>
                    </td>
                </tr>
            ";
            $context['_iterated'] = true;
        }
        // line 83
        if (!$context['_iterated']) {
            // line 84
            yield "                <tr>
                    <td colspan=\"8\" class=\"pg-empty\">No phoenix goals yet. Start your first resurrection journey.</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['phoenix_goal'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        yield "            </tbody>
        </table>
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
        return "phoenix_goal/index.html.twig";
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
        return array (  316 => 88,  307 => 84,  305 => 83,  296 => 79,  292 => 78,  287 => 75,  283 => 73,  279 => 71,  277 => 70,  272 => 68,  268 => 67,  264 => 66,  258 => 65,  255 => 64,  246 => 62,  244 => 61,  240 => 60,  235 => 58,  232 => 57,  227 => 56,  206 => 38,  202 => 37,  198 => 36,  194 => 35,  186 => 30,  182 => 29,  173 => 22,  170 => 21,  164 => 20,  161 => 19,  156 => 18,  151 => 17,  146 => 16,  143 => 15,  140 => 14,  137 => 13,  135 => 12,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Phoenix Goals - NEXA{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/phoenix-goal-modern.css?v=20260220a') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 pg-page\">
    {% set total = phoenix_goals|length %}
    {% set immortals = 0 %}
    {% set risen = 0 %}
    {% set avgLevel = 0 %}
    {% for p in phoenix_goals %}
        {% if p.immortalityEnabled %}{% set immortals = immortals + 1 %}{% endif %}
        {% if p.phoenixPhase == 'risen' %}{% set risen = risen + 1 %}{% endif %}
        {% set avgLevel = avgLevel + (p.phoenixLevel|default(0)) %}
    {% endfor %}
    {% set avgLevel = total > 0 ? (avgLevel / total)|round(1) : 0 %}

    <div class=\"pg-header\">
        <div>
            <h1 class=\"pg-title\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goals</h1>
            <p class=\"pg-subtitle\">Resurrection journeys, phases, and rebirth progress.</p>
        </div>
        <div class=\"pg-actions\">
            <a href=\"{{ path('app_goal_index') }}\" class=\"pg-btn\"><i class=\"fas fa-bullseye\"></i> Goals</a>
            <a href=\"{{ path('app_phoenix_goal_new') }}\" class=\"pg-btn pg-btn-primary\"><i class=\"fas fa-plus\"></i> New Phoenix Goal</a>
        </div>
    </div>

    <div class=\"pg-kpis\">
        <article class=\"pg-kpi\"><span>Total Phoenix</span><strong>{{ total }}</strong></article>
        <article class=\"pg-kpi\"><span>Risen</span><strong>{{ risen }}</strong></article>
        <article class=\"pg-kpi\"><span>Immortals</span><strong>{{ immortals }}</strong></article>
        <article class=\"pg-kpi\"><span>Avg Level</span><strong>{{ avgLevel }}</strong></article>
    </div>

    <div class=\"pg-table-wrap\">
        <table class=\"pg-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Goal</th>
                    <th>Phase</th>
                    <th>Level</th>
                    <th>Death Date</th>
                    <th>Rebirth Date</th>
                    <th>Immortality</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {% for phoenix_goal in phoenix_goals %}
                <tr>
                    <td>#{{ phoenix_goal.id }}</td>
                    <td>
                        <strong>{{ phoenix_goal.originalGoal ? phoenix_goal.originalGoal.titleGoa : 'N/A' }}</strong>
                        {% if phoenix_goal.deathAnalysis %}
                            <div class=\"text-muted small\">{{ phoenix_goal.deathAnalysis|slice(0, 90) }}{% if phoenix_goal.deathAnalysis|length > 90 %}...{% endif %}</div>
                        {% endif %}
                    </td>
                    <td><span class=\"pg-pill phase-{{ phoenix_goal.phoenixPhase|default('ashes')|lower }}\">{{ phoenix_goal.phoenixPhase|default('ashes')|capitalize }}</span></td>
                    <td>{{ phoenix_goal.phoenixLevel }}</td>
                    <td>{{ phoenix_goal.deathDate ? phoenix_goal.deathDate|date('d/m/Y') : '-' }}</td>
                    <td>{{ phoenix_goal.rebirthDate ? phoenix_goal.rebirthDate|date('d/m/Y') : '-' }}</td>
                    <td>
                        {% if phoenix_goal.immortalityEnabled %}
                            <span class=\"pg-pill phase-risen\">Enabled</span>
                        {% else %}
                            <span class=\"pg-pill\">Disabled</span>
                        {% endif %}
                    </td>
                    <td>
                        <div class=\"pg-actions\">
                            <a href=\"{{ path('app_phoenix_goal_show', {'id': phoenix_goal.id}) }}\" class=\"pg-btn\"><i class=\"fas fa-eye\"></i></a>
                            <a href=\"{{ path('app_phoenix_goal_edit', {'id': phoenix_goal.id}) }}\" class=\"pg-btn\"><i class=\"fas fa-pen\"></i></a>
                        </div>
                    </td>
                </tr>
            {% else %}
                <tr>
                    <td colspan=\"8\" class=\"pg-empty\">No phoenix goals yet. Start your first resurrection journey.</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
", "phoenix_goal/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\phoenix_goal\\index.html.twig");
    }
}
