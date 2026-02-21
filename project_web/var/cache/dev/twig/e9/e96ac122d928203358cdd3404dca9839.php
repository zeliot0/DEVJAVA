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

/* Milestones/show.html.twig */
class __TwigTemplate_22b83a26737c12dde0befed7961650fd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/show.html.twig"));

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

        yield "Détails du Jalon";
        
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
        yield "<div class=\"container-fluid mt-4 goals-form-page goal-show-form-page milestone-show-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-flag me-2\"></i>";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 9, $this->source); })()), "title", [], "any", false, false, false, 9), "html", null, true);
        yield "</h1>
            <p class=\"mb-0\">Détails du jalon</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour aux jalons
            </a>
        </div>
    </div>

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-file-alt\"></i> Informations du jalon</h3>

                        <div class=\"mb-3 d-flex gap-2 flex-wrap\">
                            <span class=\"milestone-status-pill ";
        // line 27
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 27, $this->source); })()), "completedDate", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "is-done";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 27, $this->source); })()), "dueDate", [], "any", false, false, false, 27) < $this->extensions['Twig\Extension\CoreExtension']->convertDate())) {
            yield "is-late";
        } else {
            yield "is-open";
        }
        yield "\">
                                ";
        // line 28
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 28, $this->source); })()), "completedDate", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Terminé";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 28, $this->source); })()), "dueDate", [], "any", false, false, false, 28) < $this->extensions['Twig\Extension\CoreExtension']->convertDate())) {
            yield "En retard";
        } else {
            yield "En cours";
        }
        // line 29
        yield "                            </span>
                            ";
        // line 30
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 30, $this->source); })()), "goalGoa", [], "any", false, false, false, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 31
            yield "                                <span class=\"milestone-goal-pill\">
                                    <i class=\"fas fa-bullseye me-1\"></i> ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 32, $this->source); })()), "goalGoa", [], "any", false, false, false, 32), "titleGoa", [], "any", false, false, false, 32), "html", null, true);
            yield "
                                </span>
                            ";
        }
        // line 35
        yield "                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Titre</label>
                            <div class=\"goal-readonly-field\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 39, $this->source); })()), "title", [], "any", false, false, false, 39), "html", null, true);
        yield "</div>
                        </div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Description</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 44, $this->source); })()), "description", [], "any", false, false, false, 44), "html", null, true);
        yield "</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Dates</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date d'échéance</label>
                                <div class=\"goal-readonly-field\">";
        // line 53
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 53, $this->source); })()), "dueDate", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 53, $this->source); })()), "dueDate", [], "any", false, false, false, 53), "d/m/Y"), "html", null, true)) : ("N/A"));
        yield "</div>
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de complétion</label>
                                <div class=\"goal-readonly-field\">";
        // line 57
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 57, $this->source); })()), "completedDate", [], "any", false, false, false, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 57, $this->source); })()), "completedDate", [], "any", false, false, false, 57), "d/m/Y"), "html", null, true)) : ("Non terminée"));
        yield "</div>
                            </div>
                        </div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Créé le</label>
                            <div class=\"goal-readonly-field\">";
        // line 63
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 63, $this->source); })()), "createdAt", [], "any", false, false, false, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 63, $this->source); })()), "createdAt", [], "any", false, false, false, 63), "d/m/Y à H:i"), "html", null, true)) : ("N/A"));
        yield "</div>
                        </div>
                    </section>

                    ";
        // line 67
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 68
            yield "                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 69, $this->source); })()), "id", [], "any", false, false, false, 69)]), "html", null, true);
            yield "\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-pen me-1\"></i> Modifier
                            </a>
                            <form method=\"post\" action=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 72, $this->source); })()), "id", [], "any", false, false, false, 72)]), "html", null, true);
            yield "\" class=\"d-inline-flex\"
                                  onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce jalon ?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 74, $this->source); })()), "id", [], "any", false, false, false, 74))), "html", null, true);
            yield "\">
                                <button type=\"submit\" class=\"btn btn-outline-danger goals-btn goals-btn-secondary\">
                                    <i class=\"fas fa-trash me-1\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    ";
        }
        // line 81
        yield "                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aperçu\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-info-circle\"></i> Aperçu</h3>
                        <ul>
                            <li><strong>ID:</strong> ";
        // line 87
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 87, $this->source); })()), "id", [], "any", false, false, false, 87), "html", null, true);
        yield "</li>
                            <li><strong>Objectif:</strong> ";
        // line 88
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 88, $this->source); })()), "goalGoa", [], "any", false, false, false, 88)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 88, $this->source); })()), "goalGoa", [], "any", false, false, false, 88), "titleGoa", [], "any", false, false, false, 88), "html", null, true)) : ("Aucun"));
        yield "</li>
                            <li><strong>Échéance:</strong> ";
        // line 89
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 89, $this->source); })()), "dueDate", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 89, $this->source); })()), "dueDate", [], "any", false, false, false, 89), "d/m/Y"), "html", null, true)) : ("N/A"));
        yield "</li>
                            <li><strong>Statut:</strong> ";
        // line 90
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 90, $this->source); })()), "completedDate", [], "any", false, false, false, 90)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Terminé";
        } else {
            yield "En attente";
        }
        yield "</li>
                        </ul>

                        ";
        // line 93
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 93, $this->source); })()), "goalGoa", [], "any", false, false, false, 93)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 94
            yield "                            <hr>
                            <p class=\"mb-2\"><strong>Progression objectif</strong></p>
                            <div class=\"goal-readonly-progress\">
                                <div class=\"goal-readonly-progress-fill\" style=\"width: ";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["milestone"] ?? null), "goalGoa", [], "any", false, true, false, 97), "progressGoa", [], "any", true, true, false, 97)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 97, $this->source); })()), "goalGoa", [], "any", false, false, false, 97), "progressGoa", [], "any", false, false, false, 97), 0)) : (0)), "html", null, true);
            yield "%;\"></div>
                            </div>
                            <div class=\"goal-readonly-progress-text\">";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["milestone"] ?? null), "goalGoa", [], "any", false, true, false, 99), "progressGoa", [], "any", true, true, false, 99)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 99, $this->source); })()), "goalGoa", [], "any", false, false, false, 99), "progressGoa", [], "any", false, false, false, 99), 0)) : (0)), "html", null, true);
            yield "%</div>
                            <a href=\"";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_show", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["milestone"]) || array_key_exists("milestone", $context) ? $context["milestone"] : (function () { throw new RuntimeError('Variable "milestone" does not exist.', 100, $this->source); })()), "goalGoa", [], "any", false, false, false, 100), "idGoa", [], "any", false, false, false, 100)]), "html", null, true);
            yield "\"
                               class=\"btn btn-outline-secondary goals-btn goals-btn-secondary w-100 mt-2\">
                                <i class=\"fas fa-arrow-right me-1\"></i> Voir l'objectif
                            </a>
                        ";
        }
        // line 105
        yield "                    </div>
                </aside>
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
        return "Milestones/show.html.twig";
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
        return array (  290 => 105,  282 => 100,  278 => 99,  273 => 97,  268 => 94,  266 => 93,  256 => 90,  252 => 89,  248 => 88,  244 => 87,  236 => 81,  226 => 74,  221 => 72,  215 => 69,  212 => 68,  210 => 67,  203 => 63,  194 => 57,  187 => 53,  175 => 44,  167 => 39,  161 => 35,  155 => 32,  152 => 31,  150 => 30,  147 => 29,  139 => 28,  129 => 27,  112 => 13,  105 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Détails du Jalon{% endblock %}

{% block body %}
<div class=\"container-fluid mt-4 goals-form-page goal-show-form-page milestone-show-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-flag me-2\"></i>{{ milestone.title }}</h1>
            <p class=\"mb-0\">Détails du jalon</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"{{ path('app_milestones_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour aux jalons
            </a>
        </div>
    </div>

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-file-alt\"></i> Informations du jalon</h3>

                        <div class=\"mb-3 d-flex gap-2 flex-wrap\">
                            <span class=\"milestone-status-pill {% if milestone.completedDate %}is-done{% elseif milestone.dueDate < date() %}is-late{% else %}is-open{% endif %}\">
                                {% if milestone.completedDate %}Terminé{% elseif milestone.dueDate < date() %}En retard{% else %}En cours{% endif %}
                            </span>
                            {% if milestone.goalGoa %}
                                <span class=\"milestone-goal-pill\">
                                    <i class=\"fas fa-bullseye me-1\"></i> {{ milestone.goalGoa.titleGoa }}
                                </span>
                            {% endif %}
                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Titre</label>
                            <div class=\"goal-readonly-field\">{{ milestone.title }}</div>
                        </div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Description</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">{{ milestone.description }}</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Dates</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date d'échéance</label>
                                <div class=\"goal-readonly-field\">{{ milestone.dueDate ? milestone.dueDate|date('d/m/Y') : 'N/A' }}</div>
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de complétion</label>
                                <div class=\"goal-readonly-field\">{{ milestone.completedDate ? milestone.completedDate|date('d/m/Y') : 'Non terminée' }}</div>
                            </div>
                        </div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Créé le</label>
                            <div class=\"goal-readonly-field\">{{ milestone.createdAt ? milestone.createdAt|date('d/m/Y à H:i') : 'N/A' }}</div>
                        </div>
                    </section>

                    {% if not is_granted('ROLE_ADMIN') %}
                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"{{ path('app_milestones_edit', {'id': milestone.id}) }}\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-pen me-1\"></i> Modifier
                            </a>
                            <form method=\"post\" action=\"{{ path('app_milestones_delete', {'id': milestone.id}) }}\" class=\"d-inline-flex\"
                                  onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer ce jalon ?');\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ milestone.id) }}\">
                                <button type=\"submit\" class=\"btn btn-outline-danger goals-btn goals-btn-secondary\">
                                    <i class=\"fas fa-trash me-1\"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    {% endif %}
                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aperçu\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-info-circle\"></i> Aperçu</h3>
                        <ul>
                            <li><strong>ID:</strong> {{ milestone.id }}</li>
                            <li><strong>Objectif:</strong> {{ milestone.goalGoa ? milestone.goalGoa.titleGoa : 'Aucun' }}</li>
                            <li><strong>Échéance:</strong> {{ milestone.dueDate ? milestone.dueDate|date('d/m/Y') : 'N/A' }}</li>
                            <li><strong>Statut:</strong> {% if milestone.completedDate %}Terminé{% else %}En attente{% endif %}</li>
                        </ul>

                        {% if milestone.goalGoa %}
                            <hr>
                            <p class=\"mb-2\"><strong>Progression objectif</strong></p>
                            <div class=\"goal-readonly-progress\">
                                <div class=\"goal-readonly-progress-fill\" style=\"width: {{ milestone.goalGoa.progressGoa|default(0) }}%;\"></div>
                            </div>
                            <div class=\"goal-readonly-progress-text\">{{ milestone.goalGoa.progressGoa|default(0) }}%</div>
                            <a href=\"{{ path('app_goal_show', {'id_g': milestone.goalGoa.idGoa}) }}\"
                               class=\"btn btn-outline-secondary goals-btn goals-btn-secondary w-100 mt-2\">
                                <i class=\"fas fa-arrow-right me-1\"></i> Voir l'objectif
                            </a>
                        {% endif %}
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
{% endblock %}


", "Milestones/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\Milestones\\show.html.twig");
    }
}
