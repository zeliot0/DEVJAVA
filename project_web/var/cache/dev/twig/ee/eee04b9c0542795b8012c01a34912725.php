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

/* phoenix_goal/show.html.twig */
class __TwigTemplate_7d51ab85113a69ed9f7dfda55a3311fd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "phoenix_goal/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "phoenix_goal/show.html.twig"));

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

        yield "Phoenix Goal #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/phoenix-goal-modern.css?v=20260221b"), "html", null, true);
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
    <div class=\"pg-header\">
        <div>
            <h1 class=\"pg-title\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goal #";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 14, $this->source); })()), "id", [], "any", false, false, false, 14), "html", null, true);
        yield "</h1>
            <p class=\"pg-subtitle\">
                ";
        // line 16
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 16, $this->source); })()), "originalGoal", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 16, $this->source); })()), "originalGoal", [], "any", false, false, false, 16), "titleGoa", [], "any", false, false, false, 16), "html", null, true)) : ("Linked Goal not available"));
        yield "
            </p>
            <p class=\"pg-journey-phase\">
                Journey Phase:
                <span class=\"phoenix-badge phoenix-phase-";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "phoenixPhase", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 20, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 20), "ashes")) : ("ashes"))), "html", null, true);
        yield "\">
                    ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "phoenixPhase", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 21, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 21), "ashes")) : ("ashes"))), "html", null, true);
        yield "
                </span>
            </p>
        </div>
        <div class=\"pg-actions\">
            <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_index");
        yield "\" class=\"pg-btn\"><i class=\"fas fa-arrow-left\"></i> Back</a>
            <a href=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 27, $this->source); })()), "id", [], "any", false, false, false, 27)]), "html", null, true);
        yield "\" class=\"pg-btn\"><i class=\"fas fa-pen\"></i> Edit</a>
            ";
        // line 28
        yield Twig\Extension\CoreExtension::include($this->env, $context, "phoenix_goal/_delete_form.html.twig");
        yield "
        </div>
    </div>

    <div class=\"pg-content\">
        <section class=\"pg-card\">
            <div class=\"pg-section\">
                <h3>Death Analysis</h3>
                <div class=\"pg-death-scroll\">
                    <p class=\"pg-pre\">";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "deathAnalysis", [], "any", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 37, $this->source); })()), "deathAnalysis", [], "any", false, false, false, 37), "No analysis provided.")) : ("No analysis provided.")), "html", null, true);
        yield "</p>
                </div>
            </div>
            <div class=\"pg-section\">
                <h3>Ashes Data</h3>
                ";
        // line 42
        $context["ashes"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "ashesData", [], "any", false, true, false, 42), "ashes", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 42, $this->source); })()), "ashesData", [], "any", false, false, false, 42), "ashes", [], "any", false, false, false, 42), [])) : ([]));
        // line 43
        yield "                ";
        $context["lessons"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "ashesData", [], "any", false, true, false, 43), "lessons", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 43, $this->source); })()), "ashesData", [], "any", false, false, false, 43), "lessons", [], "any", false, false, false, 43), [])) : ([]));
        // line 44
        yield "                ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["ashes"]) || array_key_exists("ashes", $context) ? $context["ashes"] : (function () { throw new RuntimeError('Variable "ashes" does not exist.', 44, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "                    <p class=\"pg-label pg-phase-title pg-phase-ashes\">Ashes</p>
                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-ashes\">
                        ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["ashes"]) || array_key_exists("ashes", $context) ? $context["ashes"] : (function () { throw new RuntimeError('Variable "ashes" does not exist.', 47, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 48
                yield "                            <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["item"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            yield "                    </ul>
                ";
        }
        // line 52
        yield "                ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["lessons"]) || array_key_exists("lessons", $context) ? $context["lessons"] : (function () { throw new RuntimeError('Variable "lessons" does not exist.', 52, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 53
            yield "                    <p class=\"pg-label pg-phase-title pg-phase-risen\">Lessons</p>
                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-risen\">
                        ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["lessons"]) || array_key_exists("lessons", $context) ? $context["lessons"] : (function () { throw new RuntimeError('Variable "lessons" does not exist.', 55, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 56
                yield "                            <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["item"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            yield "                    </ul>
                ";
        }
        // line 60
        yield "                ";
        if ((Twig\Extension\CoreExtension::testEmpty((isset($context["ashes"]) || array_key_exists("ashes", $context) ? $context["ashes"] : (function () { throw new RuntimeError('Variable "ashes" does not exist.', 60, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["lessons"]) || array_key_exists("lessons", $context) ? $context["lessons"] : (function () { throw new RuntimeError('Variable "lessons" does not exist.', 60, $this->source); })())))) {
            // line 61
            yield "                    <p class=\"pg-pre\">No ashes data.</p>
                ";
        }
        // line 63
        yield "            </div>
            <div class=\"pg-section\">
                <h3>Resurrection Plan</h3>
                ";
        // line 66
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 66, $this->source); })()), "resurrectionPlan", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "                    ";
            $context["phaseOrder"] = ["ashes", "spark", "flame", "risen"];
            // line 68
            yield "                    ";
            $context["phaseIndexMap"] = ["ashes" => 0, "spark" => 1, "flame" => 2, "risen" => 3];
            // line 69
            yield "                    ";
            $context["currentPhase"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "phoenixPhase", [], "any", true, true, false, 69)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 69, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 69), "ashes")) : ("ashes")));
            // line 70
            yield "                    ";
            $context["currentIndex"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["phaseIndexMap"] ?? null), (isset($context["currentPhase"]) || array_key_exists("currentPhase", $context) ? $context["currentPhase"] : (function () { throw new RuntimeError('Variable "currentPhase" does not exist.', 70, $this->source); })()), [], "array", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phaseIndexMap"]) || array_key_exists("phaseIndexMap", $context) ? $context["phaseIndexMap"] : (function () { throw new RuntimeError('Variable "phaseIndexMap" does not exist.', 70, $this->source); })()), (isset($context["currentPhase"]) || array_key_exists("currentPhase", $context) ? $context["currentPhase"] : (function () { throw new RuntimeError('Variable "currentPhase" does not exist.', 70, $this->source); })()), [], "array", false, false, false, 70), 0)) : (0));
            // line 71
            yield "                    <div class=\"pg-phase-grid\">
                    ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["phaseOrder"]) || array_key_exists("phaseOrder", $context) ? $context["phaseOrder"] : (function () { throw new RuntimeError('Variable "phaseOrder" does not exist.', 72, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["phase"]) {
                // line 73
                yield "                        ";
                $context["phaseData"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "resurrectionPlan", [], "any", false, true, false, 73), $context["phase"], [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 73, $this->source); })()), "resurrectionPlan", [], "any", false, false, false, 73), $context["phase"], [], "any", false, false, false, 73), null)) : (null));
                // line 74
                yield "                        ";
                if ((($tmp =  !(null === (isset($context["phaseData"]) || array_key_exists("phaseData", $context) ? $context["phaseData"] : (function () { throw new RuntimeError('Variable "phaseData" does not exist.', 74, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 75
                    yield "                            ";
                    $context["actions"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["phaseData"] ?? null), "actions", [], "any", true, true, false, 75)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["phaseData"]) || array_key_exists("phaseData", $context) ? $context["phaseData"] : (function () { throw new RuntimeError('Variable "phaseData" does not exist.', 75, $this->source); })()), "actions", [], "any", false, false, false, 75)) : ((isset($context["phaseData"]) || array_key_exists("phaseData", $context) ? $context["phaseData"] : (function () { throw new RuntimeError('Variable "phaseData" does not exist.', 75, $this->source); })())));
                    // line 76
                    yield "                            ";
                    $context["phaseIndex"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["phaseIndexMap"] ?? null), $context["phase"], [], "array", true, true, false, 76)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phaseIndexMap"]) || array_key_exists("phaseIndexMap", $context) ? $context["phaseIndexMap"] : (function () { throw new RuntimeError('Variable "phaseIndexMap" does not exist.', 76, $this->source); })()), $context["phase"], [], "array", false, false, false, 76), 0)) : (0));
                    // line 77
                    yield "                            ";
                    $context["phaseProgress"] = ((((isset($context["phaseIndex"]) || array_key_exists("phaseIndex", $context) ? $context["phaseIndex"] : (function () { throw new RuntimeError('Variable "phaseIndex" does not exist.', 77, $this->source); })()) < (isset($context["currentIndex"]) || array_key_exists("currentIndex", $context) ? $context["currentIndex"] : (function () { throw new RuntimeError('Variable "currentIndex" does not exist.', 77, $this->source); })()))) ? (100) : (((((isset($context["phaseIndex"]) || array_key_exists("phaseIndex", $context) ? $context["phaseIndex"] : (function () { throw new RuntimeError('Variable "phaseIndex" does not exist.', 77, $this->source); })()) == (isset($context["currentIndex"]) || array_key_exists("currentIndex", $context) ? $context["currentIndex"] : (function () { throw new RuntimeError('Variable "currentIndex" does not exist.', 77, $this->source); })()))) ? (68) : (18))));
                    // line 78
                    yield "                            <article class=\"pg-phase-card pg-phase-card-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["phase"], "html", null, true);
                    yield " ";
                    if (($context["phase"] == (isset($context["currentPhase"]) || array_key_exists("currentPhase", $context) ? $context["currentPhase"] : (function () { throw new RuntimeError('Variable "currentPhase" does not exist.', 78, $this->source); })()))) {
                        yield "is-current";
                    }
                    yield "\">
                                <header class=\"pg-phase-card-head\">
                                    <p class=\"pg-label pg-phase-title pg-phase-";
                    // line 80
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["phase"], "html", null, true);
                    yield "\">
                                        <strong>";
                    // line 81
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["phase"]), "html", null, true);
                    yield "</strong>
                                        ";
                    // line 82
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["phaseData"] ?? null), "duration", [], "any", true, true, false, 82)) {
                        // line 83
                        yield "                                            <span class=\"pg-duration\">(";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phaseData"]) || array_key_exists("phaseData", $context) ? $context["phaseData"] : (function () { throw new RuntimeError('Variable "phaseData" does not exist.', 83, $this->source); })()), "duration", [], "any", false, false, false, 83), "html", null, true);
                        yield ")</span>
                                        ";
                    }
                    // line 85
                    yield "                                    </p>
                                    ";
                    // line 86
                    if (($context["phase"] == (isset($context["currentPhase"]) || array_key_exists("currentPhase", $context) ? $context["currentPhase"] : (function () { throw new RuntimeError('Variable "currentPhase" does not exist.', 86, $this->source); })()))) {
                        // line 87
                        yield "                                        <span class=\"pg-current-chip\"><i class=\"fa-solid fa-fire-flame-curved\"></i> Current</span>
                                    ";
                    }
                    // line 89
                    yield "                                </header>
                                <div class=\"pg-phase-progress\" aria-label=\"";
                    // line 90
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["phase"]), "html", null, true);
                    yield " progress\">
                                    <span style=\"width: ";
                    // line 91
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["phaseProgress"]) || array_key_exists("phaseProgress", $context) ? $context["phaseProgress"] : (function () { throw new RuntimeError('Variable "phaseProgress" does not exist.', 91, $this->source); })()), "html", null, true);
                    yield "%\"></span>
                                </div>
                                ";
                    // line 93
                    if (is_iterable((isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 93, $this->source); })()))) {
                        // line 94
                        yield "                                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["phase"], "html", null, true);
                        yield "\">
                                        ";
                        // line 95
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 95, $this->source); })()));
                        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                            // line 96
                            yield "                                            <li><i class=\"fa-solid fa-circle-check\"></i><span>";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["action"], "html", null, true);
                            yield "</span></li>
                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['action'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 98
                        yield "                                    </ul>
                                ";
                    } else {
                        // line 100
                        yield "                                    <p class=\"pg-pre\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["actions"]) || array_key_exists("actions", $context) ? $context["actions"] : (function () { throw new RuntimeError('Variable "actions" does not exist.', 100, $this->source); })()), "html", null, true);
                        yield "</p>
                                ";
                    }
                    // line 102
                    yield "                            </article>
                        ";
                }
                // line 104
                yield "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['phase'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            yield "                    </div>
                ";
        } else {
            // line 107
            yield "                    <p class=\"pg-pre\">No resurrection plan.</p>
                ";
        }
        // line 109
        yield "            </div>
        </section>

        <aside class=\"pg-card\">
            <div class=\"pg-section\">
                <h3>Status</h3>
                <p><strong>Phase:</strong> <span class=\"pg-pill phase-";
        // line 115
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "phoenixPhase", [], "any", true, true, false, 115)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 115, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 115), "ashes")) : ("ashes"))), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, ($context["phoenix_goal"] ?? null), "phoenixPhase", [], "any", true, true, false, 115)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 115, $this->source); })()), "phoenixPhase", [], "any", false, false, false, 115), "ashes")) : ("ashes"))), "html", null, true);
        yield "</span></p>
                <p><strong>Level:</strong> ";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 116, $this->source); })()), "phoenixLevel", [], "any", false, false, false, 116), "html", null, true);
        yield "</p>
                <p><strong>Immortality:</strong>
                    ";
        // line 118
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 118, $this->source); })()), "immortalityEnabled", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 119
            yield "                        <span class=\"pg-pill phase-risen\">Enabled</span>
                    ";
        } else {
            // line 121
            yield "                        <span class=\"pg-pill\">Disabled</span>
                    ";
        }
        // line 123
        yield "                </p>
                <div class=\"pg-cta-stack\">
                    <a href=\"";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 125, $this->source); })()), "id", [], "any", false, false, false, 125)]), "html", null, true);
        yield "#rebornGoal\" class=\"pg-btn pg-btn-primary pg-btn-float\">
                        <i class=\"fa-solid fa-seedling\"></i> Begin Rebirth
                    </a>
                    <a href=\"";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 128, $this->source); })()), "id", [], "any", false, false, false, 128)]), "html", null, true);
        yield "#immortalityEnabled\" class=\"pg-btn pg-btn-immortal\">
                        <i class=\"fa-solid fa-infinity\"></i> Enable Immortality
                    </a>
                </div>
            </div>
            <div class=\"pg-section\">
                <h3>Timeline</h3>
                <p><strong>Death Date:</strong> ";
        // line 135
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 135, $this->source); })()), "deathDate", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 135, $this->source); })()), "deathDate", [], "any", false, false, false, 135), "d/m/Y H:i"), "html", null, true)) : ("-"));
        yield "</p>
                <p><strong>Rebirth Date:</strong> ";
        // line 136
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 136, $this->source); })()), "rebirthDate", [], "any", false, false, false, 136)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 136, $this->source); })()), "rebirthDate", [], "any", false, false, false, 136), "d/m/Y H:i"), "html", null, true)) : ("-"));
        yield "</p>
                ";
        // line 137
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 137, $this->source); })()), "rebornGoal", [], "any", false, false, false, 137)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 138
            yield "                    <p><strong>Reborn Goal:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["phoenix_goal"]) || array_key_exists("phoenix_goal", $context) ? $context["phoenix_goal"] : (function () { throw new RuntimeError('Variable "phoenix_goal" does not exist.', 138, $this->source); })()), "rebornGoal", [], "any", false, false, false, 138), "titleGoa", [], "any", false, false, false, 138), "html", null, true);
            yield "</p>
                ";
        }
        // line 140
        yield "            </div>
        </aside>
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
        return "phoenix_goal/show.html.twig";
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
        return array (  451 => 140,  445 => 138,  443 => 137,  439 => 136,  435 => 135,  425 => 128,  419 => 125,  415 => 123,  411 => 121,  407 => 119,  405 => 118,  400 => 116,  394 => 115,  386 => 109,  382 => 107,  378 => 105,  372 => 104,  368 => 102,  362 => 100,  358 => 98,  349 => 96,  345 => 95,  340 => 94,  338 => 93,  333 => 91,  329 => 90,  326 => 89,  322 => 87,  320 => 86,  317 => 85,  311 => 83,  309 => 82,  305 => 81,  301 => 80,  291 => 78,  288 => 77,  285 => 76,  282 => 75,  279 => 74,  276 => 73,  272 => 72,  269 => 71,  266 => 70,  263 => 69,  260 => 68,  257 => 67,  255 => 66,  250 => 63,  246 => 61,  243 => 60,  239 => 58,  230 => 56,  226 => 55,  222 => 53,  219 => 52,  215 => 50,  206 => 48,  202 => 47,  198 => 45,  195 => 44,  192 => 43,  190 => 42,  182 => 37,  170 => 28,  166 => 27,  162 => 26,  154 => 21,  150 => 20,  143 => 16,  138 => 14,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Phoenix Goal #{{ phoenix_goal.id }}{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/phoenix-goal-modern.css?v=20260221b') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 pg-page\">
    <div class=\"pg-header\">
        <div>
            <h1 class=\"pg-title\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goal #{{ phoenix_goal.id }}</h1>
            <p class=\"pg-subtitle\">
                {{ phoenix_goal.originalGoal ? phoenix_goal.originalGoal.titleGoa : 'Linked Goal not available' }}
            </p>
            <p class=\"pg-journey-phase\">
                Journey Phase:
                <span class=\"phoenix-badge phoenix-phase-{{ phoenix_goal.phoenixPhase|default('ashes')|lower }}\">
                    {{ phoenix_goal.phoenixPhase|default('ashes')|capitalize }}
                </span>
            </p>
        </div>
        <div class=\"pg-actions\">
            <a href=\"{{ path('app_phoenix_goal_index') }}\" class=\"pg-btn\"><i class=\"fas fa-arrow-left\"></i> Back</a>
            <a href=\"{{ path('app_phoenix_goal_edit', {'id': phoenix_goal.id}) }}\" class=\"pg-btn\"><i class=\"fas fa-pen\"></i> Edit</a>
            {{ include('phoenix_goal/_delete_form.html.twig') }}
        </div>
    </div>

    <div class=\"pg-content\">
        <section class=\"pg-card\">
            <div class=\"pg-section\">
                <h3>Death Analysis</h3>
                <div class=\"pg-death-scroll\">
                    <p class=\"pg-pre\">{{ phoenix_goal.deathAnalysis|default('No analysis provided.') }}</p>
                </div>
            </div>
            <div class=\"pg-section\">
                <h3>Ashes Data</h3>
                {% set ashes = phoenix_goal.ashesData.ashes|default([]) %}
                {% set lessons = phoenix_goal.ashesData.lessons|default([]) %}
                {% if ashes is not empty %}
                    <p class=\"pg-label pg-phase-title pg-phase-ashes\">Ashes</p>
                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-ashes\">
                        {% for item in ashes %}
                            <li>{{ item }}</li>
                        {% endfor %}
                    </ul>
                {% endif %}
                {% if lessons is not empty %}
                    <p class=\"pg-label pg-phase-title pg-phase-risen\">Lessons</p>
                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-risen\">
                        {% for item in lessons %}
                            <li>{{ item }}</li>
                        {% endfor %}
                    </ul>
                {% endif %}
                {% if ashes is empty and lessons is empty %}
                    <p class=\"pg-pre\">No ashes data.</p>
                {% endif %}
            </div>
            <div class=\"pg-section\">
                <h3>Resurrection Plan</h3>
                {% if phoenix_goal.resurrectionPlan %}
                    {% set phaseOrder = ['ashes', 'spark', 'flame', 'risen'] %}
                    {% set phaseIndexMap = {'ashes': 0, 'spark': 1, 'flame': 2, 'risen': 3} %}
                    {% set currentPhase = phoenix_goal.phoenixPhase|default('ashes')|lower %}
                    {% set currentIndex = phaseIndexMap[currentPhase]|default(0) %}
                    <div class=\"pg-phase-grid\">
                    {% for phase in phaseOrder %}
                        {% set phaseData = attribute(phoenix_goal.resurrectionPlan, phase)|default(null) %}
                        {% if phaseData is not null %}
                            {% set actions = phaseData.actions is defined ? phaseData.actions : phaseData %}
                            {% set phaseIndex = phaseIndexMap[phase]|default(0) %}
                            {% set phaseProgress = phaseIndex < currentIndex ? 100 : (phaseIndex == currentIndex ? 68 : 18) %}
                            <article class=\"pg-phase-card pg-phase-card-{{ phase }} {% if phase == currentPhase %}is-current{% endif %}\">
                                <header class=\"pg-phase-card-head\">
                                    <p class=\"pg-label pg-phase-title pg-phase-{{ phase }}\">
                                        <strong>{{ phase|capitalize }}</strong>
                                        {% if phaseData.duration is defined %}
                                            <span class=\"pg-duration\">({{ phaseData.duration }})</span>
                                        {% endif %}
                                    </p>
                                    {% if phase == currentPhase %}
                                        <span class=\"pg-current-chip\"><i class=\"fa-solid fa-fire-flame-curved\"></i> Current</span>
                                    {% endif %}
                                </header>
                                <div class=\"pg-phase-progress\" aria-label=\"{{ phase|capitalize }} progress\">
                                    <span style=\"width: {{ phaseProgress }}%\"></span>
                                </div>
                                {% if actions is iterable %}
                                    <ul class=\"pg-list pg-list-danger pg-phase-list pg-phase-{{ phase }}\">
                                        {% for action in actions %}
                                            <li><i class=\"fa-solid fa-circle-check\"></i><span>{{ action }}</span></li>
                                        {% endfor %}
                                    </ul>
                                {% else %}
                                    <p class=\"pg-pre\">{{ actions }}</p>
                                {% endif %}
                            </article>
                        {% endif %}
                    {% endfor %}
                    </div>
                {% else %}
                    <p class=\"pg-pre\">No resurrection plan.</p>
                {% endif %}
            </div>
        </section>

        <aside class=\"pg-card\">
            <div class=\"pg-section\">
                <h3>Status</h3>
                <p><strong>Phase:</strong> <span class=\"pg-pill phase-{{ phoenix_goal.phoenixPhase|default('ashes')|lower }}\">{{ phoenix_goal.phoenixPhase|default('ashes')|capitalize }}</span></p>
                <p><strong>Level:</strong> {{ phoenix_goal.phoenixLevel }}</p>
                <p><strong>Immortality:</strong>
                    {% if phoenix_goal.immortalityEnabled %}
                        <span class=\"pg-pill phase-risen\">Enabled</span>
                    {% else %}
                        <span class=\"pg-pill\">Disabled</span>
                    {% endif %}
                </p>
                <div class=\"pg-cta-stack\">
                    <a href=\"{{ path('app_phoenix_goal_edit', {'id': phoenix_goal.id}) }}#rebornGoal\" class=\"pg-btn pg-btn-primary pg-btn-float\">
                        <i class=\"fa-solid fa-seedling\"></i> Begin Rebirth
                    </a>
                    <a href=\"{{ path('app_phoenix_goal_edit', {'id': phoenix_goal.id}) }}#immortalityEnabled\" class=\"pg-btn pg-btn-immortal\">
                        <i class=\"fa-solid fa-infinity\"></i> Enable Immortality
                    </a>
                </div>
            </div>
            <div class=\"pg-section\">
                <h3>Timeline</h3>
                <p><strong>Death Date:</strong> {{ phoenix_goal.deathDate ? phoenix_goal.deathDate|date('d/m/Y H:i') : '-' }}</p>
                <p><strong>Rebirth Date:</strong> {{ phoenix_goal.rebirthDate ? phoenix_goal.rebirthDate|date('d/m/Y H:i') : '-' }}</p>
                {% if phoenix_goal.rebornGoal %}
                    <p><strong>Reborn Goal:</strong> {{ phoenix_goal.rebornGoal.titleGoa }}</p>
                {% endif %}
            </div>
        </aside>
    </div>
</div>
{% endblock %}
", "phoenix_goal/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\phoenix_goal\\show.html.twig");
    }
}
