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

/* goal/index.html.twig */
class __TwigTemplate_b07c8abb6e98e3c2232ff12c7071b1b4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/index.html.twig"));

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

        yield "Objectifs - NEXA";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/goal-index-modern.css?v=20260214d"), "html", null, true);
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
        yield "<div class=\"container mt-4 goals-page goals-page-modern\">
    ";
        // line 13
        $context["totalGoals"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 13, $this->source); })()));
        // line 14
        yield "    ";
        $context["totalProgress"] = 0;
        // line 15
        yield "    ";
        $context["highPriorityCount"] = 0;
        // line 16
        yield "    ";
        $context["draftCount"] = 0;
        // line 17
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 17, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["goal"]) {
            // line 18
            yield "        ";
            $context["totalProgress"] = ((isset($context["totalProgress"]) || array_key_exists("totalProgress", $context) ? $context["totalProgress"] : (function () { throw new RuntimeError('Variable "totalProgress" does not exist.', 18, $this->source); })()) + ((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "progressGoa", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "progressGoa", [], "any", false, false, false, 18), 0)) : (0)));
            // line 19
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "priorityGoa", [], "any", false, false, false, 19) == "HAUTE")) {
                // line 20
                yield "            ";
                $context["highPriorityCount"] = ((isset($context["highPriorityCount"]) || array_key_exists("highPriorityCount", $context) ? $context["highPriorityCount"] : (function () { throw new RuntimeError('Variable "highPriorityCount" does not exist.', 20, $this->source); })()) + 1);
                // line 21
                yield "        ";
            }
            // line 22
            yield "        ";
            if ((Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "statusGoa", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "statusGoa", [], "any", false, false, false, 22), "")) : (""))) == "brouillon")) {
                // line 23
                yield "            ";
                $context["draftCount"] = ((isset($context["draftCount"]) || array_key_exists("draftCount", $context) ? $context["draftCount"] : (function () { throw new RuntimeError('Variable "draftCount" does not exist.', 23, $this->source); })()) + 1);
                // line 24
                yield "        ";
            }
            // line 25
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['goal'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "    ";
        $context["avgProgress"] = ((((isset($context["totalGoals"]) || array_key_exists("totalGoals", $context) ? $context["totalGoals"] : (function () { throw new RuntimeError('Variable "totalGoals" does not exist.', 26, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round(((isset($context["totalProgress"]) || array_key_exists("totalProgress", $context) ? $context["totalProgress"] : (function () { throw new RuntimeError('Variable "totalProgress" does not exist.', 26, $this->source); })()) / (isset($context["totalGoals"]) || array_key_exists("totalGoals", $context) ? $context["totalGoals"] : (function () { throw new RuntimeError('Variable "totalGoals" does not exist.', 26, $this->source); })())))) : (0));
        // line 27
        yield "
    <div class=\"goals-modern-header\">
        <div>
            <h1>NEXA Goals</h1>
            <p>Gestion intelligente de vos objectifs</p>
        </div>
        <div class=\"goals-modern-header-actions\">
            <a href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"goals-modern-btn goals-modern-btn-ghost\">
                <i class=\"fas fa-flag\"></i> Jalons
            </a>
            ";
        // line 37
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_new");
            yield "\" class=\"goals-modern-btn goals-modern-btn-primary\">
                    <i class=\"fas fa-plus\"></i> Nouvel objectif
                </a>
            ";
        }
        // line 42
        yield "        </div>
    </div>

    <div class=\"goals-modern-kpis\">
        <article class=\"goals-modern-kpi\">
            <span>Total objectifs</span>
            <strong>";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalGoals"]) || array_key_exists("totalGoals", $context) ? $context["totalGoals"] : (function () { throw new RuntimeError('Variable "totalGoals" does not exist.', 48, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Progression moyenne</span>
            <strong>";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgProgress"]) || array_key_exists("avgProgress", $context) ? $context["avgProgress"] : (function () { throw new RuntimeError('Variable "avgProgress" does not exist.', 52, $this->source); })()), "html", null, true);
        yield "%</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Priorité haute</span>
            <strong>";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["highPriorityCount"]) || array_key_exists("highPriorityCount", $context) ? $context["highPriorityCount"] : (function () { throw new RuntimeError('Variable "highPriorityCount" does not exist.', 56, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Brouillons</span>
            <strong>";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["draftCount"]) || array_key_exists("draftCount", $context) ? $context["draftCount"] : (function () { throw new RuntimeError('Variable "draftCount" does not exist.', 60, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
    </div>

    <form method=\"get\" action=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"goals-modern-toolbar goals-modern-toolbar-v2\">
        <div class=\"goals-modern-field goals-modern-search\">
            <i class=\"fas fa-search\"></i>
            <input
                id=\"goalsSearchInput\"
                type=\"text\"
                name=\"q\"
                value=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 71, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\"
                placeholder=\"Rechercher un objectif...\"
                list=\"goals-search-hints\"
            >
            <datalist id=\"goals-search-hints\">
                ";
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 76, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["goal"]) {
            // line 77
            yield "                    <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "titleGoa", [], "any", false, false, false, 77), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "categoryGoa", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "categoryGoa", [], "any", false, false, false, 77), "Objectif")) : ("Objectif")), "html", null, true);
            yield "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['goal'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        yield "            </datalist>
        </div>

        <div class=\"goals-modern-toolbar-actions\">
            <div class=\"goals-modern-field goals-modern-sort\">
                <label for=\"goals-sort-select\">Trier par :</label>
                <select id=\"goals-sort-select\" name=\"sort\" onchange=\"this.form.submit()\">
                    <option value=\"progress_desc\" ";
        // line 86
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 86, $this->source); })()), "progress_desc")) : ("progress_desc")) == "progress_desc")) ? ("selected") : (""));
        yield ">🔥 Progression (haute)</option>
                    <option value=\"progress_asc\" ";
        // line 87
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 87, $this->source); })()), "progress_desc")) : ("progress_desc")) == "progress_asc")) ? ("selected") : (""));
        yield ">🌱 Progression (basse)</option>
                    <option value=\"status\" ";
        // line 88
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 88, $this->source); })()), "progress_desc")) : ("progress_desc")) == "status")) ? ("selected") : (""));
        yield ">📌 Statut</option>
                </select>
            </div>

            <button type=\"submit\" class=\"goals-modern-btn goals-modern-btn-primary goals-modern-filter\">
                <i class=\"fas fa-filter\"></i> Filtrer
            </button>

            <a href=\"";
        // line 96
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"goals-modern-btn goals-modern-btn-reset\">
                Réinitialiser
            </a>
        </div>
    </form>

    ";
        // line 102
        if ((array_key_exists("search", $context) &&  !Twig\Extension\CoreExtension::testEmpty((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 102, $this->source); })())))) {
            // line 103
            yield "        <div class=\"goals-search-feedback\">
            <i class=\"fas fa-star\"></i>
            Résultats pour: <strong>";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 105, $this->source); })()), "html", null, true);
            yield "</strong> (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 105, $this->source); })())), "html", null, true);
            yield ")
        </div>
    ";
        }
        // line 108
        yield "
    ";
        // line 109
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 109, $this->source); })()))) {
            // line 110
            yield "        <div class=\"empty-state goals-empty\">
            <div class=\"empty-state-icon\">
                <i class=\"fas fa-bullseye\"></i>
            </div>
            <h3>Aucun objectif trouvé</h3>
            <p>Vous n'avez pas encore créé d'objectifs. Commencez par en créer un pour suivre votre progression.</p>
            ";
            // line 116
            if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 117
                yield "                <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_new");
                yield "\" class=\"goals-modern-btn goals-modern-btn-primary goals-cta-large\">
                    <i class=\"fas fa-plus\"></i> Créer votre premier objectif
                </a>
            ";
            }
            // line 121
            yield "        </div>
    ";
        } else {
            // line 123
            yield "        <div class=\"goals-modern-table-wrap\">
            <table class=\"goals-modern-table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Objectif</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Progression</th>
                    <th>Échéance</th>
                    <th class=\"goals-modern-actions-head\">Actions</th>
                </tr>
                </thead>
                <tbody>
                ";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 137, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["goal"]) {
                // line 138
                yield "                    ";
                $context["p"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "progressGoa", [], "any", true, true, false, 138)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "progressGoa", [], "any", false, false, false, 138), 0)) : (0));
                // line 139
                yield "                    <tr>
                        <td class=\"goals-modern-id\">#";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 140), "html", null, true);
                yield "</td>

                        <td>
                            <div class=\"goals-modern-title-wrap\">
                                <strong>";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "titleGoa", [], "any", false, false, false, 144), "html", null, true);
                yield "</strong>
                                <small>";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "descriptionGoa", [], "any", true, true, false, 145)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "descriptionGoa", [], "any", false, false, false, 145), "—")) : ("—")), 0, 60), "html", null, true);
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "descriptionGoa", [], "any", false, false, false, 145)) > 60)) ? ("...") : (""));
                yield "</small>
                            </div>
                        </td>

                        <td>
                            <span class=\"goals-modern-pill\">";
                // line 150
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "statusGoa", [], "any", true, true, false, 150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "statusGoa", [], "any", false, false, false, 150), "En cours")) : ("En cours")), "html", null, true);
                yield "</span>
                        </td>

                        <td>
                            <span class=\"goals-modern-pill ";
                // line 154
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "priorityGoa", [], "any", false, false, false, 154) == "HAUTE")) ? ("is-high") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "priorityGoa", [], "any", false, false, false, 154) == "MOYENNE")) ? ("is-mid") : ("is-low"))));
                yield "\">
                                ";
                // line 155
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "priorityGoa", [], "any", true, true, false, 155)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "priorityGoa", [], "any", false, false, false, 155), "Normale")) : ("Normale")), "html", null, true);
                yield "
                            </span>
                        </td>

                        <td>
                            <div class=\"goals-modern-progress-row\">
                                ";
                // line 161
                if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 162
                    yield "                                    <div class=\"goals-modern-progress-controls\">
                                        <form method=\"post\" action=\"";
                    // line 163
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_progress_up", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 163)]), "html", null, true);
                    yield "\">
                                            <button type=\"submit\" class=\"goals-modern-mini\" title=\"Augmenter\"><i class=\"fas fa-chevron-up\"></i></button>
                                        </form>
                                        <form method=\"post\" action=\"";
                    // line 166
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_progress_down", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 166)]), "html", null, true);
                    yield "\">
                                            <button type=\"submit\" class=\"goals-modern-mini\" title=\"Réduire\"><i class=\"fas fa-chevron-down\"></i></button>
                                        </form>
                                    </div>
                                ";
                }
                // line 171
                yield "                                <div class=\"goals-modern-progress-track\">
                                    <span style=\"width: ";
                // line 172
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 172, $this->source); })()), "html", null, true);
                yield "%\"></span>
                                </div>
                                <span class=\"goals-modern-progress-label\">";
                // line 174
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 174, $this->source); })()), "html", null, true);
                yield "%</span>
                            </div>
                        </td>

                        <td>
                            <div class=\"goals-modern-dates\">
                                <span>";
                // line 180
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "dateDebutGoa", [], "any", false, false, false, 180)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "dateDebutGoa", [], "any", false, false, false, 180), "d/m/Y"), "html", null, true)) : ("—"));
                yield "</span>
                                <i class=\"fas fa-arrow-right\"></i>
                                <span>";
                // line 182
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "dateFinalGoa", [], "any", false, false, false, 182)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "dateFinalGoa", [], "any", false, false, false, 182), "d/m/Y"), "html", null, true)) : ("—"));
                yield "</span>
                            </div>
                        </td>

                        <td class=\"goals-modern-actions-cell\">
                            <a href=\"";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_show", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 187)]), "html", null, true);
                yield "\" class=\"goals-modern-icon view\" title=\"Voir\">
                                <i class=\"fas fa-eye\"></i>
                            </a>
                            ";
                // line 190
                if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 191
                    yield "                                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_edit", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 191)]), "html", null, true);
                    yield "\" class=\"goals-modern-icon edit\" title=\"Modifier\">
                                    <i class=\"fas fa-pen\"></i>
                                </a>

                                <form action=\"";
                    // line 195
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_delete", ["id_g" => CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 195)]), "html", null, true);
                    yield "\" method=\"post\" onsubmit=\"return confirm('Supprimer cet objectif ?');\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 196
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 196))), "html", null, true);
                    yield "\">
                                    <button type=\"submit\" class=\"goals-modern-icon delete\" title=\"Supprimer\">
                                        <i class=\"fas fa-trash\"></i>
                                    </button>
                                </form>
                            ";
                }
                // line 202
                yield "                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['goal'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 205
            yield "                </tbody>
            </table>
        </div>
    ";
        }
        // line 209
        yield "</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('goalsSearchInput');
    if (!searchInput || !searchInput.form) return;

    searchInput.addEventListener('change', function () {
        if (this.value && this.value.trim().length > 0) {
            this.form.submit();
        }
    });
});
</script>
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
        return "goal/index.html.twig";
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
        return array (  511 => 209,  505 => 205,  497 => 202,  488 => 196,  484 => 195,  476 => 191,  474 => 190,  468 => 187,  460 => 182,  455 => 180,  446 => 174,  441 => 172,  438 => 171,  430 => 166,  424 => 163,  421 => 162,  419 => 161,  410 => 155,  406 => 154,  399 => 150,  390 => 145,  386 => 144,  379 => 140,  376 => 139,  373 => 138,  369 => 137,  353 => 123,  349 => 121,  341 => 117,  339 => 116,  331 => 110,  329 => 109,  326 => 108,  318 => 105,  314 => 103,  312 => 102,  303 => 96,  292 => 88,  288 => 87,  284 => 86,  275 => 79,  264 => 77,  260 => 76,  252 => 71,  242 => 64,  235 => 60,  228 => 56,  221 => 52,  214 => 48,  206 => 42,  198 => 38,  196 => 37,  190 => 34,  181 => 27,  178 => 26,  172 => 25,  169 => 24,  166 => 23,  163 => 22,  160 => 21,  157 => 20,  154 => 19,  151 => 18,  146 => 17,  143 => 16,  140 => 15,  137 => 14,  135 => 13,  132 => 12,  119 => 11,  106 => 8,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/goal/index.html.twig #}
{% extends 'theme/base.html.twig' %}

{% block title %}Objectifs - NEXA{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/goal-index-modern.css?v=20260214d') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 goals-page goals-page-modern\">
    {% set totalGoals = goals|length %}
    {% set totalProgress = 0 %}
    {% set highPriorityCount = 0 %}
    {% set draftCount = 0 %}
    {% for goal in goals %}
        {% set totalProgress = totalProgress + (goal.progressGoa|default(0)) %}
        {% if goal.priorityGoa == 'HAUTE' %}
            {% set highPriorityCount = highPriorityCount + 1 %}
        {% endif %}
        {% if goal.statusGoa|default('')|lower == 'brouillon' %}
            {% set draftCount = draftCount + 1 %}
        {% endif %}
    {% endfor %}
    {% set avgProgress = totalGoals > 0 ? (totalProgress / totalGoals)|round : 0 %}

    <div class=\"goals-modern-header\">
        <div>
            <h1>NEXA Goals</h1>
            <p>Gestion intelligente de vos objectifs</p>
        </div>
        <div class=\"goals-modern-header-actions\">
            <a href=\"{{ path('app_milestones_index') }}\" class=\"goals-modern-btn goals-modern-btn-ghost\">
                <i class=\"fas fa-flag\"></i> Jalons
            </a>
            {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_goal_new') }}\" class=\"goals-modern-btn goals-modern-btn-primary\">
                    <i class=\"fas fa-plus\"></i> Nouvel objectif
                </a>
            {% endif %}
        </div>
    </div>

    <div class=\"goals-modern-kpis\">
        <article class=\"goals-modern-kpi\">
            <span>Total objectifs</span>
            <strong>{{ totalGoals }}</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Progression moyenne</span>
            <strong>{{ avgProgress }}%</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Priorité haute</span>
            <strong>{{ highPriorityCount }}</strong>
        </article>
        <article class=\"goals-modern-kpi\">
            <span>Brouillons</span>
            <strong>{{ draftCount }}</strong>
        </article>
    </div>

    <form method=\"get\" action=\"{{ path('app_goal_index') }}\" class=\"goals-modern-toolbar goals-modern-toolbar-v2\">
        <div class=\"goals-modern-field goals-modern-search\">
            <i class=\"fas fa-search\"></i>
            <input
                id=\"goalsSearchInput\"
                type=\"text\"
                name=\"q\"
                value=\"{{ search|default('') }}\"
                placeholder=\"Rechercher un objectif...\"
                list=\"goals-search-hints\"
            >
            <datalist id=\"goals-search-hints\">
                {% for goal in goals %}
                    <option value=\"{{ goal.titleGoa }}\">{{ goal.categoryGoa|default('Objectif') }}</option>
                {% endfor %}
            </datalist>
        </div>

        <div class=\"goals-modern-toolbar-actions\">
            <div class=\"goals-modern-field goals-modern-sort\">
                <label for=\"goals-sort-select\">Trier par :</label>
                <select id=\"goals-sort-select\" name=\"sort\" onchange=\"this.form.submit()\">
                    <option value=\"progress_desc\" {{ (sort|default('progress_desc')) == 'progress_desc' ? 'selected' : '' }}>🔥 Progression (haute)</option>
                    <option value=\"progress_asc\" {{ (sort|default('progress_desc')) == 'progress_asc' ? 'selected' : '' }}>🌱 Progression (basse)</option>
                    <option value=\"status\" {{ (sort|default('progress_desc')) == 'status' ? 'selected' : '' }}>📌 Statut</option>
                </select>
            </div>

            <button type=\"submit\" class=\"goals-modern-btn goals-modern-btn-primary goals-modern-filter\">
                <i class=\"fas fa-filter\"></i> Filtrer
            </button>

            <a href=\"{{ path('app_goal_index') }}\" class=\"goals-modern-btn goals-modern-btn-reset\">
                Réinitialiser
            </a>
        </div>
    </form>

    {% if search is defined and search is not empty %}
        <div class=\"goals-search-feedback\">
            <i class=\"fas fa-star\"></i>
            Résultats pour: <strong>{{ search }}</strong> ({{ goals|length }})
        </div>
    {% endif %}

    {% if goals is empty %}
        <div class=\"empty-state goals-empty\">
            <div class=\"empty-state-icon\">
                <i class=\"fas fa-bullseye\"></i>
            </div>
            <h3>Aucun objectif trouvé</h3>
            <p>Vous n'avez pas encore créé d'objectifs. Commencez par en créer un pour suivre votre progression.</p>
            {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_goal_new') }}\" class=\"goals-modern-btn goals-modern-btn-primary goals-cta-large\">
                    <i class=\"fas fa-plus\"></i> Créer votre premier objectif
                </a>
            {% endif %}
        </div>
    {% else %}
        <div class=\"goals-modern-table-wrap\">
            <table class=\"goals-modern-table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Objectif</th>
                    <th>Statut</th>
                    <th>Priorité</th>
                    <th>Progression</th>
                    <th>Échéance</th>
                    <th class=\"goals-modern-actions-head\">Actions</th>
                </tr>
                </thead>
                <tbody>
                {% for goal in goals %}
                    {% set p = goal.progressGoa|default(0) %}
                    <tr>
                        <td class=\"goals-modern-id\">#{{ goal.idGoa }}</td>

                        <td>
                            <div class=\"goals-modern-title-wrap\">
                                <strong>{{ goal.titleGoa }}</strong>
                                <small>{{ goal.descriptionGoa|default('—')|slice(0, 60) }}{{ goal.descriptionGoa|length > 60 ? '...' : '' }}</small>
                            </div>
                        </td>

                        <td>
                            <span class=\"goals-modern-pill\">{{ goal.statusGoa|default('En cours') }}</span>
                        </td>

                        <td>
                            <span class=\"goals-modern-pill {{ goal.priorityGoa == 'HAUTE' ? 'is-high' : (goal.priorityGoa == 'MOYENNE' ? 'is-mid' : 'is-low') }}\">
                                {{ goal.priorityGoa|default('Normale') }}
                            </span>
                        </td>

                        <td>
                            <div class=\"goals-modern-progress-row\">
                                {% if not is_granted('ROLE_ADMIN') %}
                                    <div class=\"goals-modern-progress-controls\">
                                        <form method=\"post\" action=\"{{ path('app_goal_progress_up', {'id': goal.idGoa}) }}\">
                                            <button type=\"submit\" class=\"goals-modern-mini\" title=\"Augmenter\"><i class=\"fas fa-chevron-up\"></i></button>
                                        </form>
                                        <form method=\"post\" action=\"{{ path('app_goal_progress_down', {'id': goal.idGoa}) }}\">
                                            <button type=\"submit\" class=\"goals-modern-mini\" title=\"Réduire\"><i class=\"fas fa-chevron-down\"></i></button>
                                        </form>
                                    </div>
                                {% endif %}
                                <div class=\"goals-modern-progress-track\">
                                    <span style=\"width: {{ p }}%\"></span>
                                </div>
                                <span class=\"goals-modern-progress-label\">{{ p }}%</span>
                            </div>
                        </td>

                        <td>
                            <div class=\"goals-modern-dates\">
                                <span>{{ goal.dateDebutGoa ? goal.dateDebutGoa|date('d/m/Y') : '—' }}</span>
                                <i class=\"fas fa-arrow-right\"></i>
                                <span>{{ goal.dateFinalGoa ? goal.dateFinalGoa|date('d/m/Y') : '—' }}</span>
                            </div>
                        </td>

                        <td class=\"goals-modern-actions-cell\">
                            <a href=\"{{ path('app_goal_show', {'id_g': goal.idGoa}) }}\" class=\"goals-modern-icon view\" title=\"Voir\">
                                <i class=\"fas fa-eye\"></i>
                            </a>
                            {% if not is_granted('ROLE_ADMIN') %}
                                <a href=\"{{ path('app_goal_edit', {'id_g': goal.idGoa}) }}\" class=\"goals-modern-icon edit\" title=\"Modifier\">
                                    <i class=\"fas fa-pen\"></i>
                                </a>

                                <form action=\"{{ path('app_goal_delete', {'id_g': goal.idGoa}) }}\" method=\"post\" onsubmit=\"return confirm('Supprimer cet objectif ?');\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ goal.idGoa) }}\">
                                    <button type=\"submit\" class=\"goals-modern-icon delete\" title=\"Supprimer\">
                                        <i class=\"fas fa-trash\"></i>
                                    </button>
                                </form>
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>
    {% endif %}
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('goalsSearchInput');
    if (!searchInput || !searchInput.form) return;

    searchInput.addEventListener('change', function () {
        if (this.value && this.value.trim().length > 0) {
            this.form.submit();
        }
    });
});
</script>
{% endblock %}
", "goal/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\goal\\index.html.twig");
    }
}
