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

/* goal/new.html.twig */
class __TwigTemplate_e869919fb69ae0906c9621fdc3b3003f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/new.html.twig"));

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

        yield "Nouvel Objectif";
        
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
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/goal-form-modern.css?v=20260214a"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 14
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

        // line 15
        yield "<div class=\"container-fluid mt-4 goals-form-page goals-form-modern-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <div class=\"goals-kicker\">Goal planner</div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-plus-circle me-2\"></i>Créer un nouvel objectif</h1>
            <p class=\"text-muted mb-0\">Remplissez les détails de votre nouvel objectif</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-flag me-1\"></i> Jalons
            </a>
            <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour
            </a>
        </div>
    </div>

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            ";
        // line 34
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), 'form_start', ["attr" => ["class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
                ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), 'errors');
        yield "
                <div class=\"goals-form-layout\">
                    <div class=\"goals-form-main\">
                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                            <div class=\"mb-3\">
                                ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "titleGoa", [], "any", false, false, false, 41), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Titre*"]);
        yield "
                                ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "titleGoa", [], "any", false, false, false, 42), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: Apprendre Symfony", "required" => "required"]]);
        yield "
                                <div class=\"form-text\">Donnez un titre clair à votre objectif</div>
                                ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "titleGoa", [], "any", false, false, false, 44), 'errors');
        yield "
                            </div>

                            <div class=\"mb-0\">
                                ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 48), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Description"]);
        yield "
                                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => "form-control", "rows" => 3, "placeholder" => "Décrivez votre objectif en détail..."]]);
        yield "
                                <div class=\"form-text\">Décrivez ce que vous souhaitez accomplir</div>
                                ";
        // line 51
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 51), 'errors');
        yield "
                            </div>
                        </section>

                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                    ";
        // line 59
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 59), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Date de début*"]);
        yield "
                                    ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 60), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        yield "
                                    ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 61), 'errors');
        yield "
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    ";
        // line 64
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 64, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 64), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Date de fin*"]);
        yield "
                                    ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 65), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        yield "
                                    ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 66), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"row mb-0\">
                                <div class=\"col-md-4 mb-3\">
                                    ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "categoryGoa", [], "any", false, false, false, 72), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Catégorie*"]);
        yield "
                                    ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "categoryGoa", [], "any", false, false, false, 73), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        yield "
                                    ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "categoryGoa", [], "any", false, false, false, 74), 'errors');
        yield "
                                </div>
                                <div class=\"col-md-4 mb-3\">
                                    ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "priorityGoa", [], "any", false, false, false, 77), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Priorité*"]);
        yield "
                                    ";
        // line 78
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "priorityGoa", [], "any", false, false, false, 78), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        yield "
                                    ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "priorityGoa", [], "any", false, false, false, 79), 'errors');
        yield "
                                </div>
                                <div class=\"col-md-4 mb-3\">
                                    ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 82, $this->source); })()), "statusGoa", [], "any", false, false, false, 82), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Statut*"]);
        yield "
                                    ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "statusGoa", [], "any", false, false, false, 83), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        yield "
                                    ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "statusGoa", [], "any", false, false, false, 84), 'errors');
        yield "
                                </div>
                            </div>
                        </section>

                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-chart-line\"></i> Suivi</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                    ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "progressGoa", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Progression (%)"]);
        yield "
                                    ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "progressGoa", [], "any", false, false, false, 94), 'widget', ["attr" => ["class" => "form-control", "min" => "0", "max" => "100", "type" => "number"]]);
        yield "
                                    <div class=\"form-text\">Progression actuelle de 0 à 100%</div>
                                    ";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "progressGoa", [], "any", false, false, false, 96), 'errors');
        yield "
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    ";
        // line 99
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "colorGoa", [], "any", false, false, false, 99), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Couleur"]);
        yield "
                                    <div class=\"d-flex align-items-center gap-3\">
                                        ";
        // line 101
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "colorGoa", [], "any", false, false, false, 101), 'widget', ["attr" => ["class" => "form-control form-control-color w-auto", "type" => "color", "title" => "Choisissez une couleur"]]);
        yield "
                                        <div class=\"form-text\">Couleur d'identification</div>
                                    </div>
                                    ";
        // line 104
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "colorGoa", [], "any", false, false, false, 104), 'errors');
        yield "
                                </div>
                            </div>

                            <div class=\"mb-0\">
                                ";
        // line 109
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), "notesGoa", [], "any", false, false, false, 109), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Notes"]);
        yield "
                                ";
        // line 110
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "notesGoa", [], "any", false, false, false, 110), 'widget', ["attr" => ["class" => "form-control", "rows" => 2, "placeholder" => "Notes additionnelles..."]]);
        yield "
                                <div class=\"form-text\">Informations complémentaires optionnelles</div>
                                ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 112, $this->source); })()), "notesGoa", [], "any", false, false, false, 112), 'errors');
        yield "
                            </div>
                        </section>

                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"";
        // line 117
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                                <i class=\"fas fa-times me-1\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-check me-1\"></i> Créer l'objectif
                            </button>
                        </div>
                    </div>

                    <aside class=\"goals-form-aside\" aria-label=\"Aide\">
                        <div class=\"goals-aside-card\">
                            <h3><i class=\"fas fa-lightbulb\"></i> Conseils rapides</h3>
                            <ul>
                                <li>Utilisez un titre court et précis.</li>
                                <li>Définissez une date de fin réaliste.</li>
                                <li>Commencez à 10-20% si l’objectif vient d’être créé.</li>
                                <li>Ajoutez une note avec les prochaines actions.</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            ";
        // line 138
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 138, $this->source); })()), 'form_end');
        yield "
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
        return "goal/new.html.twig";
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
        return array (  365 => 138,  341 => 117,  333 => 112,  328 => 110,  324 => 109,  316 => 104,  310 => 101,  305 => 99,  299 => 96,  294 => 94,  290 => 93,  278 => 84,  274 => 83,  270 => 82,  264 => 79,  260 => 78,  256 => 77,  250 => 74,  246 => 73,  242 => 72,  233 => 66,  229 => 65,  225 => 64,  219 => 61,  215 => 60,  211 => 59,  200 => 51,  195 => 49,  191 => 48,  184 => 44,  179 => 42,  175 => 41,  166 => 35,  162 => 34,  151 => 26,  145 => 23,  135 => 15,  122 => 14,  109 => 11,  101 => 7,  88 => 6,  65 => 4,  42 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/goal/new.html.twig - FIXED #}
{% extends 'theme/base.html.twig' %}

{% block title %}Nouvel Objectif{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/goal-form-modern.css?v=20260214a') }}\">
{% endblock %}

{% block body %}
<div class=\"container-fluid mt-4 goals-form-page goals-form-modern-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <div class=\"goals-kicker\">Goal planner</div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-plus-circle me-2\"></i>Créer un nouvel objectif</h1>
            <p class=\"text-muted mb-0\">Remplissez les détails de votre nouvel objectif</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"{{ path('app_milestones_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-flag me-1\"></i> Jalons
            </a>
            <a href=\"{{ path('app_goal_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour
            </a>
        </div>
    </div>

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            {{ form_start(form, {'attr': {'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
                {{ form_errors(form) }}
                <div class=\"goals-form-layout\">
                    <div class=\"goals-form-main\">
                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                            <div class=\"mb-3\">
                                {{ form_label(form.titleGoa, 'Titre*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.titleGoa, {'attr': {'class': 'form-control', 'placeholder': 'Ex: Apprendre Symfony', 'required': 'required'}}) }}
                                <div class=\"form-text\">Donnez un titre clair à votre objectif</div>
                                {{ form_errors(form.titleGoa) }}
                            </div>

                            <div class=\"mb-0\">
                                {{ form_label(form.descriptionGoa, 'Description', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.descriptionGoa, {'attr': {'class': 'form-control', 'rows': 3, 'placeholder': 'Décrivez votre objectif en détail...'}}) }}
                                <div class=\"form-text\">Décrivez ce que vous souhaitez accomplir</div>
                                {{ form_errors(form.descriptionGoa) }}
                            </div>
                        </section>

                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.dateDebutGoa, 'Date de début*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.dateDebutGoa, {'attr': {'class': 'form-control', 'required': 'required'}}) }}
                                    {{ form_errors(form.dateDebutGoa) }}
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.dateFinalGoa, 'Date de fin*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.dateFinalGoa, {'attr': {'class': 'form-control', 'required': 'required'}}) }}
                                    {{ form_errors(form.dateFinalGoa) }}
                                </div>
                            </div>

                            <div class=\"row mb-0\">
                                <div class=\"col-md-4 mb-3\">
                                    {{ form_label(form.categoryGoa, 'Catégorie*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.categoryGoa, {'attr': {'class': 'form-control', 'required': 'required'}}) }}
                                    {{ form_errors(form.categoryGoa) }}
                                </div>
                                <div class=\"col-md-4 mb-3\">
                                    {{ form_label(form.priorityGoa, 'Priorité*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.priorityGoa, {'attr': {'class': 'form-control', 'required': 'required'}}) }}
                                    {{ form_errors(form.priorityGoa) }}
                                </div>
                                <div class=\"col-md-4 mb-3\">
                                    {{ form_label(form.statusGoa, 'Statut*', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.statusGoa, {'attr': {'class': 'form-control', 'required': 'required'}}) }}
                                    {{ form_errors(form.statusGoa) }}
                                </div>
                            </div>
                        </section>

                        <section class=\"goals-section\">
                            <h3 class=\"goals-section-title\"><i class=\"fas fa-chart-line\"></i> Suivi</h3>
                            <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.progressGoa, 'Progression (%)', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    {{ form_widget(form.progressGoa, {'attr': {'class': 'form-control', 'min': '0', 'max': '100', 'type': 'number'}}) }}
                                    <div class=\"form-text\">Progression actuelle de 0 à 100%</div>
                                    {{ form_errors(form.progressGoa) }}
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                    {{ form_label(form.colorGoa, 'Couleur', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                    <div class=\"d-flex align-items-center gap-3\">
                                        {{ form_widget(form.colorGoa, {'attr': {'class': 'form-control form-control-color w-auto', 'type': 'color', 'title': 'Choisissez une couleur'}}) }}
                                        <div class=\"form-text\">Couleur d'identification</div>
                                    </div>
                                    {{ form_errors(form.colorGoa) }}
                                </div>
                            </div>

                            <div class=\"mb-0\">
                                {{ form_label(form.notesGoa, 'Notes', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.notesGoa, {'attr': {'class': 'form-control', 'rows': 2, 'placeholder': 'Notes additionnelles...'}}) }}
                                <div class=\"form-text\">Informations complémentaires optionnelles</div>
                                {{ form_errors(form.notesGoa) }}
                            </div>
                        </section>

                        <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                            <a href=\"{{ path('app_goal_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                                <i class=\"fas fa-times me-1\"></i> Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                                <i class=\"fas fa-check me-1\"></i> Créer l'objectif
                            </button>
                        </div>
                    </div>

                    <aside class=\"goals-form-aside\" aria-label=\"Aide\">
                        <div class=\"goals-aside-card\">
                            <h3><i class=\"fas fa-lightbulb\"></i> Conseils rapides</h3>
                            <ul>
                                <li>Utilisez un titre court et précis.</li>
                                <li>Définissez une date de fin réaliste.</li>
                                <li>Commencez à 10-20% si l’objectif vient d’être créé.</li>
                                <li>Ajoutez une note avec les prochaines actions.</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            {{ form_end(form) }}
        </div>
    </div>
</div>

{% endblock %}

", "goal/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\goal\\new.html.twig");
    }
}
