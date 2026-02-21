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

/* goal/show.html.twig */
class __TwigTemplate_eaca4dbeff5f36a2d15195b7365521ef extends Template
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
        // line 2
        return "theme/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/show.html.twig"));

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

        yield "Détails de l'objectif - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 4, $this->source); })()), "titleGoa", [], "any", false, false, false, 4), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<div class=\"container-fluid mt-4 goals-form-page goal-show-form-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-bullseye me-2\"></i>";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 10, $this->source); })()), "titleGoa", [], "any", false, false, false, 10), "html", null, true);
        yield "</h1>
            <p class=\"mb-0\">Détails de l'objectif</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-flag me-1\"></i> Jalons
            </a>
            <a href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour à la liste
            </a>
        </div>
    </div>

    ";
        // line 24
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["goal"] ?? null), "phoenixGoal", [], "any", true, true, false, 24) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 24, $this->source); })()), "phoenixGoal", [], "any", false, false, false, 24))) {
            // line 25
            yield "        ";
            $context["phoenix"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 25, $this->source); })()), "phoenixGoal", [], "any", false, false, false, 25);
            // line 26
            yield "        <div class=\"alert alert-";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 26, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 26) == "risen")) {
                yield "success";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 26, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 26) == "flame")) {
                yield "danger";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 26, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 26) == "spark")) {
                yield "warning";
            } else {
                yield "secondary";
            }
            yield " mb-4\">
            <div class=\"d-flex align-items-center\">
                <div class=\"me-3\">
                    ";
            // line 29
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 29, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 29) == "risen")) {
                // line 30
                yield "                        <span class=\"display-6\">🦅</span>
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 31
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 31, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 31) == "flame")) {
                // line 32
                yield "                        <span class=\"display-6\">🔥</span>
                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 33
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 33, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 33) == "spark")) {
                // line 34
                yield "                        <span class=\"display-6\">✨</span>
                    ";
            } else {
                // line 36
                yield "                        <span class=\"display-6\">🌑</span>
                    ";
            }
            // line 38
            yield "                </div>
                <div class=\"flex-grow-1\">
                    <h4 class=\"alert-heading\">
                        ";
            // line 41
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 41, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 41) == "risen")) {
                // line 42
                yield "                            🦅 Phoenix Ressuscité !
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 43
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 43, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 43) == "flame")) {
                // line 44
                yield "                            🔥 En Pleine Renaissance
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 45
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 45, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 45) == "spark")) {
                // line 46
                yield "                            ✨ L'Étincelle Reprend
                        ";
            } else {
                // line 48
                yield "                            🌑 Dans les Cendres
                        ";
            }
            // line 50
            yield "                    </h4>
                    <p class=\"mb-0\">
                        ";
            // line 52
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 52, $this->source); })()), "rebornGoal", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 53
                yield "                            <i class=\"fas fa-fire\"></i> Reborn as: 
                            <a href=\"";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_show", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 54, $this->source); })()), "rebornGoal", [], "any", false, false, false, 54), "id", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" class=\"alert-link\">
                                ";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 55, $this->source); })()), "rebornGoal", [], "any", false, false, false, 55), "titleGoa", [], "any", false, false, false, 55), "html", null, true);
                yield "
                            </a>
                        ";
            } else {
                // line 58
                yield "                            Niveau Phoenix: 🔥 ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 58, $this->source); })()), "phoenixLevel", [], "any", false, false, false, 58), "html", null, true);
                yield " | Phase: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 58, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 58)), "html", null, true);
                yield "
                        ";
            }
            // line 60
            yield "                    </p>
                </div>
                <div>
                    <a href=\"";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 63, $this->source); })()), "id", [], "any", false, false, false, 63)]), "html", null, true);
            yield "\" 
                       class=\"btn btn-";
            // line 64
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 64, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 64) == "risen")) {
                yield "success";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 64, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 64) == "flame")) {
                yield "danger";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 64, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 64) == "spark")) {
                yield "warning";
            } else {
                yield "secondary";
            }
            yield " btn-sm\">
                        Voir le Voyage Phoenix <i class=\"fas fa-arrow-right ms-1\"></i>
                    </a>
                </div>
            </div>
        </div>
    ";
        }
        // line 71
        yield "
    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Titre</label>
                            <div class=\"goal-readonly-field\">";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 80, $this->source); })()), "titleGoa", [], "any", false, false, false, 80), "html", null, true);
        yield "</div>
                        </div>
                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Description</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">";
        // line 84
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 84, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 84)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 84, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 84), "html", null, true)) : ("Aucune description"));
        yield "</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de début</label>
                                <div class=\"goal-readonly-field\">";
        // line 93
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 93, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 93)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 93, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 93), "d/m/Y"), "html", null, true)) : ("Non définie"));
        yield "</div>
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de fin</label>
                                <div class=\"goal-readonly-field\">";
        // line 97
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 97, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 97)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 97, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 97), "d/m/Y"), "html", null, true)) : ("Non définie"));
        yield "</div>
                            </div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-chart-line\"></i> Suivi</h3>
                        <div class=\"row\">
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Catégorie</label>
                                <div class=\"goal-readonly-field\">";
        // line 107
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 107, $this->source); })()), "categoryGoa", [], "any", false, false, false, 107)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 107, $this->source); })()), "categoryGoa", [], "any", false, false, false, 107), "html", null, true)) : ("N/A"));
        yield "</div>
                            </div>
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Statut</label>
                                <div class=\"goal-readonly-field\">
                                    ";
        // line 112
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 112, $this->source); })()), "statusGoa", [], "any", false, false, false, 112)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 112, $this->source); })()), "statusGoa", [], "any", false, false, false, 112), "html", null, true)) : ("N/A"));
        yield "
                                    ";
        // line 113
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["goal"] ?? null), "isDead", [], "method", true, true, false, 113) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 113, $this->source); })()), "isDead", [], "method", false, false, false, 113))) {
            // line 114
            yield "                                        <span class=\"badge bg-danger ms-2\">💀 Abandonné</span>
                                    ";
        }
        // line 116
        yield "                                </div>
                            </div>
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Priorité</label>
                                <div class=\"goal-readonly-field\">";
        // line 120
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 120, $this->source); })()), "priorityGoa", [], "any", false, false, false, 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 120, $this->source); })()), "priorityGoa", [], "any", false, false, false, 120), "html", null, true)) : ("N/A"));
        yield "</div>
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Progression</label>
                            <div class=\"goal-readonly-progress\">
                               ";
        // line 127
        $context["progress"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 127, $this->source); })()), "calculatedProgress", [], "any", false, false, false, 127);
        // line 128
        yield "<div class=\"goal-readonly-progress-fill\" style=\"width: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 128, $this->source); })()), "html", null, true);
        yield "%;\"></div>
<div class=\"goal-readonly-progress-text\">";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["progress"]) || array_key_exists("progress", $context) ? $context["progress"] : (function () { throw new RuntimeError('Variable "progress" does not exist.', 129, $this->source); })()), "html", null, true);
        yield "% complété</div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Notes</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">";
        // line 133
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 133, $this->source); })()), "notesGoa", [], "any", false, false, false, 133)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 133, $this->source); })()), "notesGoa", [], "any", false, false, false, 133), "html", null, true)) : ("Aucune note"));
        yield "</div>
                        </div>
                    </section>

                    ";
        // line 138
        yield "                    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["goal"] ?? null), "canBeResurrected", [], "any", true, true, false, 138) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 138, $this->source); })()), "canBeResurrected", [], "method", false, false, false, 138))) {
            // line 139
            yield "                        <div class=\"alert alert-warning mt-4\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"me-3\">
                                    <span class=\"display-6\">🪷</span>
                                </div>
                                <div class=\"flex-grow-1\">
                                    <h5 class=\"alert-heading\">Cet objectif peut renaître de ses cendres !</h5>
                                    <p class=\"mb-0\">Le système Phoenix peut analyser l'échec et créer un plan de résurrection.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class=\"d-flex gap-2 justify-content-between align-items-center mt-3\">
                            <div class=\"d-flex gap-2\">
                                <form action=\"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_resurrect_from_goal", ["goalId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 153, $this->source); })()), "id", [], "any", false, false, false, 153)]), "html", null, true);
            yield "\" 
                                      method=\"post\" 
                                      onsubmit=\"return confirm('🔥 Lancer la résurrection Phoenix ? Cette action va analyser votre échec et créer un plan de renaissance.')\">
                                    <button type=\"submit\" class=\"btn btn-danger goals-btn\">
                                        <i class=\"fas fa-fire me-1\"></i> Résurrection Phoenix 🔥
                                    </button>
                                </form>
                            </div>
                            <small class=\"text-muted\">
                                <i class=\"fas fa-info-circle\"></i> L'IA va analyser pourquoi cet objectif a échoué
                            </small>
                        </div>
                    ";
        }
        // line 166
        yield "
                    ";
        // line 167
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 168
            yield "                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_edit", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 169, $this->source); })()), "getIdGoa", [], "method", false, false, false, 169)]), "html", null, true);
            yield "\"
                               class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-edit me-1\"></i> Modifier
                            </a>
                            ";
            // line 173
            yield Twig\Extension\CoreExtension::include($this->env, $context, "goal/_delete_form.html.twig");
            yield "
                        </div>
                    ";
        }
        // line 176
        yield "                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aperçu\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-info-circle\"></i> Aperçu</h3>
                        <ul>
                            <li><strong>ID:</strong> ";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 182, $this->source); })()), "getIdGoa", [], "method", false, false, false, 182), "html", null, true);
        yield "</li>
                            <li><strong>Couleur:</strong> <span class=\"goal-color-chip\" style=\"background: ";
        // line 183
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 183, $this->source); })()), "colorGoa", [], "any", false, false, false, 183)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 183, $this->source); })()), "colorGoa", [], "any", false, false, false, 183), "html", null, true)) : ("#7c3aed"));
        yield ";\"></span></li>
                            <li><strong>Début:</strong> ";
        // line 184
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 184, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 184)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 184, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 184), "d/m/Y"), "html", null, true)) : ("N/A"));
        yield "</li>
                            <li><strong>Fin:</strong> ";
        // line 185
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 185, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 185)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 185, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 185), "d/m/Y"), "html", null, true)) : ("N/A"));
        yield "</li>
                        </ul>
                        
                        ";
        // line 189
        yield "                        ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["goal"] ?? null), "phoenixGoal", [], "any", true, true, false, 189) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 189, $this->source); })()), "phoenixGoal", [], "any", false, false, false, 189))) {
            // line 190
            yield "                            ";
            $context["phoenix"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 190, $this->source); })()), "phoenixGoal", [], "any", false, false, false, 190);
            // line 191
            yield "                            <hr>
                            <h4 class=\"h6\"><i class=\"fas fa-dove\"></i> Stats Phoenix</h4>
                            <ul class=\"small\">
                                <li><strong>Niveau:</strong> 🔥 ";
            // line 194
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 194, $this->source); })()), "phoenixLevel", [], "any", false, false, false, 194), "html", null, true);
            yield "</li>
                                <li><strong>Phase:</strong> 
                                    <span class=\"badge ";
            // line 196
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 196, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 196) == "risen")) {
                yield "bg-success
                                                      ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 197
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 197, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 197) == "flame")) {
                yield "bg-danger
                                                      ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 198
(isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 198, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 198) == "spark")) {
                yield "bg-warning
                                                      ";
            } else {
                // line 199
                yield "bg-secondary";
            }
            yield "\">
                                        ";
            // line 200
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 200, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 200)), "html", null, true);
            yield "
                                    </span>
                                </li>
                                ";
            // line 203
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 203, $this->source); })()), "immortalityEnabled", [], "any", false, false, false, 203)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 204
                yield "                                    <li><strong>Immortalité:</strong> <span class=\"text-success\">✨ Active</span></li>
                                ";
            }
            // line 206
            yield "                                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 206, $this->source); })()), "rebirthDate", [], "any", false, false, false, 206)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 207
                yield "                                    <li><strong>Renaissance:</strong> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix"]) || array_key_exists("phoenix", $context) ? $context["phoenix"] : (function () { throw new RuntimeError('Variable "phoenix" does not exist.', 207, $this->source); })()), "rebirthDate", [], "any", false, false, false, 207), "d/m/Y"), "html", null, true);
                yield "</li>
                                ";
            }
            // line 209
            yield "                            </ul>
                        ";
        }
        // line 211
        yield "                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<div class=\"phoenix-call\">
    <form action=\"";
        // line 219
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_resurrect_from_goal", ["goalId" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["goal"]) || array_key_exists("goal", $context) ? $context["goal"] : (function () { throw new RuntimeError('Variable "goal" does not exist.', 219, $this->source); })()), "idGoa", [], "any", false, false, false, 219)]), "html", null, true);
        yield "\" method=\"post\">
        <button type=\"submit\" class=\"phoenix-call-btn\" title=\"Ressusciter cet objectif\">
            🔥
        </button>
    </form>
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
        return "goal/show.html.twig";
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
        return array (  504 => 219,  494 => 211,  490 => 209,  484 => 207,  481 => 206,  477 => 204,  475 => 203,  469 => 200,  464 => 199,  459 => 198,  455 => 197,  451 => 196,  446 => 194,  441 => 191,  438 => 190,  435 => 189,  429 => 185,  425 => 184,  421 => 183,  417 => 182,  409 => 176,  403 => 173,  396 => 169,  393 => 168,  391 => 167,  388 => 166,  372 => 153,  356 => 139,  353 => 138,  346 => 133,  339 => 129,  334 => 128,  332 => 127,  322 => 120,  316 => 116,  312 => 114,  310 => 113,  306 => 112,  298 => 107,  285 => 97,  278 => 93,  266 => 84,  259 => 80,  248 => 71,  230 => 64,  226 => 63,  221 => 60,  213 => 58,  207 => 55,  203 => 54,  200 => 53,  198 => 52,  194 => 50,  190 => 48,  186 => 46,  184 => 45,  181 => 44,  179 => 43,  176 => 42,  174 => 41,  169 => 38,  165 => 36,  161 => 34,  159 => 33,  156 => 32,  154 => 31,  151 => 30,  149 => 29,  134 => 26,  131 => 25,  128 => 24,  119 => 17,  113 => 14,  106 => 10,  101 => 7,  88 => 6,  64 => 4,  41 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/goal/show.html.twig - Version avec Phoenix Resurrection #}
{% extends 'theme/base.html.twig' %}

{% block title %}Détails de l'objectif - {{ goal.titleGoa }}{% endblock %}

{% block body %}
<div class=\"container-fluid mt-4 goals-form-page goal-show-form-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-bullseye me-2\"></i>{{ goal.titleGoa }}</h1>
            <p class=\"mb-0\">Détails de l'objectif</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"{{ path('app_milestones_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-flag me-1\"></i> Jalons
            </a>
            <a href=\"{{ path('app_goal_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour à la liste
            </a>
        </div>
    </div>

    {# 🔥 PHOENIX STATUS BANNER - Show if goal is a phoenix or can be resurrected #}
    {% if goal.phoenixGoal is defined and goal.phoenixGoal %}
        {% set phoenix = goal.phoenixGoal %}
        <div class=\"alert alert-{% if phoenix.phoenixPhase == 'risen' %}success{% elseif phoenix.phoenixPhase == 'flame' %}danger{% elseif phoenix.phoenixPhase == 'spark' %}warning{% else %}secondary{% endif %} mb-4\">
            <div class=\"d-flex align-items-center\">
                <div class=\"me-3\">
                    {% if phoenix.phoenixPhase == 'risen' %}
                        <span class=\"display-6\">🦅</span>
                    {% elseif phoenix.phoenixPhase == 'flame' %}
                        <span class=\"display-6\">🔥</span>
                    {% elseif phoenix.phoenixPhase == 'spark' %}
                        <span class=\"display-6\">✨</span>
                    {% else %}
                        <span class=\"display-6\">🌑</span>
                    {% endif %}
                </div>
                <div class=\"flex-grow-1\">
                    <h4 class=\"alert-heading\">
                        {% if phoenix.phoenixPhase == 'risen' %}
                            🦅 Phoenix Ressuscité !
                        {% elseif phoenix.phoenixPhase == 'flame' %}
                            🔥 En Pleine Renaissance
                        {% elseif phoenix.phoenixPhase == 'spark' %}
                            ✨ L'Étincelle Reprend
                        {% else %}
                            🌑 Dans les Cendres
                        {% endif %}
                    </h4>
                    <p class=\"mb-0\">
                        {% if phoenix.rebornGoal %}
                            <i class=\"fas fa-fire\"></i> Reborn as: 
                            <a href=\"{{ path('app_goal_show', {'id_g': phoenix.rebornGoal.id}) }}\" class=\"alert-link\">
                                {{ phoenix.rebornGoal.titleGoa }}
                            </a>
                        {% else %}
                            Niveau Phoenix: 🔥 {{ phoenix.phoenixLevel }} | Phase: {{ phoenix.phoenixPhase|capitalize }}
                        {% endif %}
                    </p>
                </div>
                <div>
                    <a href=\"{{ path('app_phoenix_goal_show', {'id': phoenix.id}) }}\" 
                       class=\"btn btn-{% if phoenix.phoenixPhase == 'risen' %}success{% elseif phoenix.phoenixPhase == 'flame' %}danger{% elseif phoenix.phoenixPhase == 'spark' %}warning{% else %}secondary{% endif %} btn-sm\">
                        Voir le Voyage Phoenix <i class=\"fas fa-arrow-right ms-1\"></i>
                    </a>
                </div>
            </div>
        </div>
    {% endif %}

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Titre</label>
                            <div class=\"goal-readonly-field\">{{ goal.titleGoa }}</div>
                        </div>
                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Description</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">{{ goal.descriptionGoa ?: 'Aucune description' }}</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de début</label>
                                <div class=\"goal-readonly-field\">{{ goal.dateDebutGoa ? goal.dateDebutGoa|date('d/m/Y') : 'Non définie' }}</div>
                            </div>
                            <div class=\"col-md-6 mb-3\">
                                <label class=\"form-label fw-semibold\">Date de fin</label>
                                <div class=\"goal-readonly-field\">{{ goal.dateFinalGoa ? goal.dateFinalGoa|date('d/m/Y') : 'Non définie' }}</div>
                            </div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-chart-line\"></i> Suivi</h3>
                        <div class=\"row\">
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Catégorie</label>
                                <div class=\"goal-readonly-field\">{{ goal.categoryGoa ?: 'N/A' }}</div>
                            </div>
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Statut</label>
                                <div class=\"goal-readonly-field\">
                                    {{ goal.statusGoa ?: 'N/A' }}
                                    {% if goal.isDead() is defined and goal.isDead() %}
                                        <span class=\"badge bg-danger ms-2\">💀 Abandonné</span>
                                    {% endif %}
                                </div>
                            </div>
                            <div class=\"col-md-4 mb-3\">
                                <label class=\"form-label fw-semibold\">Priorité</label>
                                <div class=\"goal-readonly-field\">{{ goal.priorityGoa ?: 'N/A' }}</div>
                            </div>
                        </div>

                        <div class=\"mb-3\">
                            <label class=\"form-label fw-semibold\">Progression</label>
                            <div class=\"goal-readonly-progress\">
                               {% set progress = goal.calculatedProgress %}
<div class=\"goal-readonly-progress-fill\" style=\"width: {{ progress }}%;\"></div>
<div class=\"goal-readonly-progress-text\">{{ progress }}% complété</div>

                        <div class=\"mb-0\">
                            <label class=\"form-label fw-semibold\">Notes</label>
                            <div class=\"goal-readonly-field goal-readonly-multiline\">{{ goal.notesGoa ?: 'Aucune note' }}</div>
                        </div>
                    </section>

                    {# 🔥 PHOENIX ACTION BUTTONS #}
                    {% if goal.canBeResurrected is defined and goal.canBeResurrected() %}
                        <div class=\"alert alert-warning mt-4\">
                            <div class=\"d-flex align-items-center\">
                                <div class=\"me-3\">
                                    <span class=\"display-6\">🪷</span>
                                </div>
                                <div class=\"flex-grow-1\">
                                    <h5 class=\"alert-heading\">Cet objectif peut renaître de ses cendres !</h5>
                                    <p class=\"mb-0\">Le système Phoenix peut analyser l'échec et créer un plan de résurrection.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class=\"d-flex gap-2 justify-content-between align-items-center mt-3\">
                            <div class=\"d-flex gap-2\">
                                <form action=\"{{ path('app_phoenix_resurrect_from_goal', {'goalId': goal.id}) }}\" 
                                      method=\"post\" 
                                      onsubmit=\"return confirm('🔥 Lancer la résurrection Phoenix ? Cette action va analyser votre échec et créer un plan de renaissance.')\">
                                    <button type=\"submit\" class=\"btn btn-danger goals-btn\">
                                        <i class=\"fas fa-fire me-1\"></i> Résurrection Phoenix 🔥
                                    </button>
                                </form>
                            </div>
                            <small class=\"text-muted\">
                                <i class=\"fas fa-info-circle\"></i> L'IA va analyser pourquoi cet objectif a échoué
                            </small>
                        </div>
                    {% endif %}

                    {% if not is_granted('ROLE_ADMIN') %}
                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"{{ path('app_goal_edit', {'id_g': goal.getIdGoa()}) }}\"
                               class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-edit me-1\"></i> Modifier
                            </a>
                            {{ include('goal/_delete_form.html.twig') }}
                        </div>
                    {% endif %}
                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aperçu\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-info-circle\"></i> Aperçu</h3>
                        <ul>
                            <li><strong>ID:</strong> {{ goal.getIdGoa() }}</li>
                            <li><strong>Couleur:</strong> <span class=\"goal-color-chip\" style=\"background: {{ goal.colorGoa ?: '#7c3aed' }};\"></span></li>
                            <li><strong>Début:</strong> {{ goal.dateDebutGoa ? goal.dateDebutGoa|date('d/m/Y') : 'N/A' }}</li>
                            <li><strong>Fin:</strong> {{ goal.dateFinalGoa ? goal.dateFinalGoa|date('d/m/Y') : 'N/A' }}</li>
                        </ul>
                        
                        {# 🔥 PHOENIX STATS IN SIDEBAR #}
                        {% if goal.phoenixGoal is defined and goal.phoenixGoal %}
                            {% set phoenix = goal.phoenixGoal %}
                            <hr>
                            <h4 class=\"h6\"><i class=\"fas fa-dove\"></i> Stats Phoenix</h4>
                            <ul class=\"small\">
                                <li><strong>Niveau:</strong> 🔥 {{ phoenix.phoenixLevel }}</li>
                                <li><strong>Phase:</strong> 
                                    <span class=\"badge {% if phoenix.phoenixPhase == 'risen' %}bg-success
                                                      {% elseif phoenix.phoenixPhase == 'flame' %}bg-danger
                                                      {% elseif phoenix.phoenixPhase == 'spark' %}bg-warning
                                                      {% else %}bg-secondary{% endif %}\">
                                        {{ phoenix.phoenixPhase|capitalize }}
                                    </span>
                                </li>
                                {% if phoenix.immortalityEnabled %}
                                    <li><strong>Immortalité:</strong> <span class=\"text-success\">✨ Active</span></li>
                                {% endif %}
                                {% if phoenix.rebirthDate %}
                                    <li><strong>Renaissance:</strong> {{ phoenix.rebirthDate|date('d/m/Y') }}</li>
                                {% endif %}
                            </ul>
                        {% endif %}
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<div class=\"phoenix-call\">
    <form action=\"{{ path('app_phoenix_resurrect_from_goal', {'goalId': goal.idGoa}) }}\" method=\"post\">
        <button type=\"submit\" class=\"phoenix-call-btn\" title=\"Ressusciter cet objectif\">
            🔥
        </button>
    </form>
</div>

{% endblock %}", "goal/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\goal\\show.html.twig");
    }
}
