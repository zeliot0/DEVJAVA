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

/* goal/edit.html.twig */
class __TwigTemplate_9e01fbe8e76c2802e86747cfaf73316c extends Template
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
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/edit.html.twig"));

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

        yield "Modifier Objectif";
        
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
        yield "<div class=\"container-fluid mt-4 goals-form-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-pen-to-square me-2\"></i>Modifier l'objectif</h1>
            <p class=\"mb-0\">Mettez a jour les informations de votre objectif</p>
        </div>
        <div class=\"goals-inline-actions\">
            <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-flag me-1\"></i> Jalons
            </a>
            <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                <i class=\"fas fa-arrow-left me-1\"></i> Retour
            </a>
        </div>
    </div>

    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "flashes", ["success"], "method", false, false, false, 22));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 23
            yield "        <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "flashes", ["error"], "method", false, false, false, 25));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 26
            yield "        <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        yield "
    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            ";
        // line 31
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                        <div class=\"mb-3\">
                            ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "titleGoa", [], "any", false, false, false, 38), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Titre"]);
        yield "
                            ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "titleGoa", [], "any", false, false, false, 39), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            <div class=\"text-danger\">";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "titleGoa", [], "any", false, false, false, 40), 'errors');
        yield "</div>
                        </div>

                        <div class=\"mb-0\">
                            ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 44), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Description"]);
        yield "
                            ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 45), 'widget', ["attr" => ["class" => "form-control", "rows" => 4]]);
        yield "
                            <div class=\"text-danger\">";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 46), 'errors');
        yield "</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Date de début"]);
        yield "
                                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 55), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                                <div class=\"text-danger\">";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 56), 'errors');
        yield "</div>
                            </div>

                            <div class=\"col-md-6 mb-3\">
                                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 60), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Date de fin"]);
        yield "
                                ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 61), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                                <div class=\"text-danger\">";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 62), 'errors');
        yield "</div>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"col-md-4 mb-3\">
                                ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "statusGoa", [], "any", false, false, false, 68), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Statut"]);
        yield "
                                ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "statusGoa", [], "any", false, false, false, 69), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                                <div class=\"text-danger\">";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "statusGoa", [], "any", false, false, false, 70), 'errors');
        yield "</div>
                            </div>

                            <div class=\"col-md-4 mb-3\">
                                <div class=\"progress-edit-container\">
                                    <label class=\"form-label fw-semibold\">Progression</label>

                                    ";
        // line 77
        $context["p"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "progressGoa", [], "any", false, true, false, 77), "vars", [], "any", false, true, false, 77), "value", [], "any", true, true, false, 77) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "progressGoa", [], "any", false, false, false, 77), "vars", [], "any", false, false, false, 77), "value", [], "any", false, false, false, 77)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "progressGoa", [], "any", false, false, false, 77), "vars", [], "any", false, false, false, 77), "value", [], "any", false, false, false, 77)) : (0));
        // line 78
        yield "                                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 78, $this->source); })()), "progressGoa", [], "any", false, false, false, 78), 'widget', ["attr" => ["class" => "d-none", "id" => "realProgress"]]);
        yield "

                                    <div class=\"progress-modern\">
                                        <button type=\"button\" class=\"progress-btn down\">-</button>
                                        <div class=\"progress-bar-modern\">
                                            <div class=\"progress-fill-modern\" id=\"progressFill\"></div>
                                        </div>
                                        <button type=\"button\" class=\"progress-btn up\">+</button>
                                    </div>

                                    <div class=\"progress-percent\" id=\"progressText\">";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 88, $this->source); })()), "html", null, true);
        yield "%</div>
                                </div>
                            </div>

                            <div class=\"col-md-4 mb-3\">
                                ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "priorityGoa", [], "any", false, false, false, 93), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Priorité"]);
        yield "
                                ";
        // line 94
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "priorityGoa", [], "any", false, false, false, 94), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                                <div class=\"text-danger\">";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "priorityGoa", [], "any", false, false, false, 95), 'errors');
        yield "</div>
                            </div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-sliders-h\"></i> Détails complémentaires</h3>
                        <div class=\"mb-3\">
                            ";
        // line 103
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 103, $this->source); })()), "categoryGoa", [], "any", false, false, false, 103), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Catégorie"]);
        yield "
                            ";
        // line 104
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "categoryGoa", [], "any", false, false, false, 104), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            <div class=\"text-danger\">";
        // line 105
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "categoryGoa", [], "any", false, false, false, 105), 'errors');
        yield "</div>
                        </div>

                        <div class=\"mb-3\">
                            ";
        // line 109
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), "notesGoa", [], "any", false, false, false, 109), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Notes"]);
        yield "
                            ";
        // line 110
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "notesGoa", [], "any", false, false, false, 110), 'widget', ["attr" => ["class" => "form-control", "rows" => 3]]);
        yield "
                            <div class=\"text-danger\">";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), "notesGoa", [], "any", false, false, false, 111), 'errors');
        yield "</div>
                        </div>

                        <div class=\"mb-0\">
                            ";
        // line 115
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 115, $this->source); })()), "colorGoa", [], "any", false, false, false, 115), 'label', ["label_attr" => ["class" => "form-label fw-semibold"], "label" => "Couleur"]);
        yield "
                            ";
        // line 116
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 116, $this->source); })()), "colorGoa", [], "any", false, false, false, 116), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                            <div class=\"text-danger\">";
        // line 117
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 117, $this->source); })()), "colorGoa", [], "any", false, false, false, 117), 'errors');
        yield "</div>
                        </div>
                    </section>

                    <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                        <a href=\"";
        // line 122
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                            <i class=\"fas fa-times me-1\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                            <i class=\"fas fa-check me-1\"></i> Mettre à jour
                        </button>
                    </div>
                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aide\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-lightbulb\"></i> Conseils rapides</h3>
                        <ul>
                            <li>Vérifiez les dates avant d'enregistrer.</li>
                            <li>Maintenez la progression réaliste.</li>
                            <li>Utilisez des notes courtes et claires.</li>
                        </ul>
                    </div>
                </aside>
            </div>

            <!-- SUCCESS CELEBRATION -->
            <div id=\"goalSuccessPopup\" class=\"goal-success-popup\">
                <div class=\"goal-success-card\">
                    <div class=\"goal-success-flag\"></div>
                    <h2>Congrats! &#127881;</h2>
                    <p class=\"lead\">You've reached your goal!</p>
                    <p class=\"goal-message\">
                        Do not forget, our goal is to <strong>\"Free Palestine\"</strong>.
                    </p>
                    <button type=\"button\" class=\"btn btn-light mt-3\" id=\"closeGoalPopup\">
                        Close
                    </button>
                </div>
            </div>

            ";
        // line 158
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 158, $this->source); })()), 'form_end');
        yield "
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 164
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 165
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "

<script>
document.addEventListener(\"DOMContentLoaded\", function () {

    const input = document.querySelector('[name\$=\"[progressGoa]\"]');
    const fill = document.getElementById(\"progressFill\");
    const text = document.getElementById(\"progressText\");

    const popup = document.getElementById(\"goalSuccessPopup\");
    const closeBtn = document.getElementById(\"closeGoalPopup\");

    if (!input || !fill || !text) return;

    function color(v) {
        if (v == 100) return \"#22c55e\";
        if (v > 60) return \"#3b82f6\";
        if (v > 30) return \"#f59e0b\";
        return \"#ef4444\";
    }

    function update(v) {
        v = Math.max(0, Math.min(100, v));
        input.value = v;
        fill.style.width = v + \"%\";
        fill.style.background = color(v);
        text.innerText = v + \"%\";

        // Show popup when 100%
        if (v === 100 && popup) {
            popup.classList.add(\"show\");
        }
    }

    // load value from database
    update(parseFloat(input.value || 0));

    document.querySelector(\".progress-btn.up\").addEventListener(\"click\", () => {
        update(parseFloat(input.value || 0) + 10);
    });

    document.querySelector(\".progress-btn.down\").addEventListener(\"click\", () => {
        update(parseFloat(input.value || 0) - 10);
    });

    if (closeBtn) {
        closeBtn.addEventListener(\"click\", () => {
            popup.classList.remove(\"show\");
        });
    }

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
        return "goal/edit.html.twig";
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
        return array (  408 => 165,  395 => 164,  379 => 158,  340 => 122,  332 => 117,  328 => 116,  324 => 115,  317 => 111,  313 => 110,  309 => 109,  302 => 105,  298 => 104,  294 => 103,  283 => 95,  279 => 94,  275 => 93,  267 => 88,  253 => 78,  251 => 77,  241 => 70,  237 => 69,  233 => 68,  224 => 62,  220 => 61,  216 => 60,  209 => 56,  205 => 55,  201 => 54,  190 => 46,  186 => 45,  182 => 44,  175 => 40,  171 => 39,  167 => 38,  157 => 31,  152 => 28,  143 => 26,  138 => 25,  129 => 23,  125 => 22,  116 => 16,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Modifier Objectif{% endblock %}

{% block body %}
<div class=\"container-fluid mt-4 goals-form-page\">
    <div class=\"d-flex justify-content-between align-items-center mb-4 goals-form-header\">
        <div>
            <h1 class=\"h2 mb-1\"><i class=\"fas fa-pen-to-square me-2\"></i>Modifier l'objectif</h1>
            <p class=\"mb-0\">Mettez a jour les informations de votre objectif</p>
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

    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">{{ message }}</div>
    {% endfor %}
    {% for message in app.flashes('error') %}
        <div class=\"alert alert-danger\">{{ message }}</div>
    {% endfor %}

    <div class=\"card border-0 shadow-sm goals-form-card\">
        <div class=\"card-body\">
            {{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}

            <div class=\"goals-form-layout\">
                <div class=\"goals-form-main\">
                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-pen\"></i> Informations principales</h3>
                        <div class=\"mb-3\">
                            {{ form_label(form.titleGoa, 'Titre', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.titleGoa, {'attr': {'class': 'form-control'}}) }}
                            <div class=\"text-danger\">{{ form_errors(form.titleGoa) }}</div>
                        </div>

                        <div class=\"mb-0\">
                            {{ form_label(form.descriptionGoa, 'Description', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.descriptionGoa, {'attr': {'class': 'form-control', 'rows': 4}}) }}
                            <div class=\"text-danger\">{{ form_errors(form.descriptionGoa) }}</div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-calendar-alt\"></i> Planification</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.dateDebutGoa, 'Date de début', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.dateDebutGoa, {'attr': {'class': 'form-control'}}) }}
                                <div class=\"text-danger\">{{ form_errors(form.dateDebutGoa) }}</div>
                            </div>

                            <div class=\"col-md-6 mb-3\">
                                {{ form_label(form.dateFinalGoa, 'Date de fin', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.dateFinalGoa, {'attr': {'class': 'form-control'}}) }}
                                <div class=\"text-danger\">{{ form_errors(form.dateFinalGoa) }}</div>
                            </div>
                        </div>

                        <div class=\"row\">
                            <div class=\"col-md-4 mb-3\">
                                {{ form_label(form.statusGoa, 'Statut', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.statusGoa, {'attr': {'class': 'form-control'}}) }}
                                <div class=\"text-danger\">{{ form_errors(form.statusGoa) }}</div>
                            </div>

                            <div class=\"col-md-4 mb-3\">
                                <div class=\"progress-edit-container\">
                                    <label class=\"form-label fw-semibold\">Progression</label>

                                    {% set p = form.progressGoa.vars.value ?? 0 %}
                                    {{ form_widget(form.progressGoa, {'attr': {'class': 'd-none', 'id': 'realProgress'}}) }}

                                    <div class=\"progress-modern\">
                                        <button type=\"button\" class=\"progress-btn down\">-</button>
                                        <div class=\"progress-bar-modern\">
                                            <div class=\"progress-fill-modern\" id=\"progressFill\"></div>
                                        </div>
                                        <button type=\"button\" class=\"progress-btn up\">+</button>
                                    </div>

                                    <div class=\"progress-percent\" id=\"progressText\">{{ p }}%</div>
                                </div>
                            </div>

                            <div class=\"col-md-4 mb-3\">
                                {{ form_label(form.priorityGoa, 'Priorité', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                                {{ form_widget(form.priorityGoa, {'attr': {'class': 'form-control'}}) }}
                                <div class=\"text-danger\">{{ form_errors(form.priorityGoa) }}</div>
                            </div>
                        </div>
                    </section>

                    <section class=\"goals-section\">
                        <h3 class=\"goals-section-title\"><i class=\"fas fa-sliders-h\"></i> Détails complémentaires</h3>
                        <div class=\"mb-3\">
                            {{ form_label(form.categoryGoa, 'Catégorie', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.categoryGoa, {'attr': {'class': 'form-control'}}) }}
                            <div class=\"text-danger\">{{ form_errors(form.categoryGoa) }}</div>
                        </div>

                        <div class=\"mb-3\">
                            {{ form_label(form.notesGoa, 'Notes', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.notesGoa, {'attr': {'class': 'form-control', 'rows': 3}}) }}
                            <div class=\"text-danger\">{{ form_errors(form.notesGoa) }}</div>
                        </div>

                        <div class=\"mb-0\">
                            {{ form_label(form.colorGoa, 'Couleur', {'label_attr': {'class': 'form-label fw-semibold'}}) }}
                            {{ form_widget(form.colorGoa, {'attr': {'class': 'form-control'}}) }}
                            <div class=\"text-danger\">{{ form_errors(form.colorGoa) }}</div>
                        </div>
                    </section>

                    <div class=\"d-flex gap-2 justify-content-end mt-4 pt-3 border-top goals-form-actions\">
                        <a href=\"{{ path('app_goal_index') }}\" class=\"btn btn-outline-secondary goals-btn goals-btn-secondary\">
                            <i class=\"fas fa-times me-1\"></i> Annuler
                        </a>
                        <button type=\"submit\" class=\"btn btn-primary goals-btn goals-btn-primary\">
                            <i class=\"fas fa-check me-1\"></i> Mettre à jour
                        </button>
                    </div>
                </div>

                <aside class=\"goals-form-aside\" aria-label=\"Aide\">
                    <div class=\"goals-aside-card\">
                        <h3><i class=\"fas fa-lightbulb\"></i> Conseils rapides</h3>
                        <ul>
                            <li>Vérifiez les dates avant d'enregistrer.</li>
                            <li>Maintenez la progression réaliste.</li>
                            <li>Utilisez des notes courtes et claires.</li>
                        </ul>
                    </div>
                </aside>
            </div>

            <!-- SUCCESS CELEBRATION -->
            <div id=\"goalSuccessPopup\" class=\"goal-success-popup\">
                <div class=\"goal-success-card\">
                    <div class=\"goal-success-flag\"></div>
                    <h2>Congrats! &#127881;</h2>
                    <p class=\"lead\">You've reached your goal!</p>
                    <p class=\"goal-message\">
                        Do not forget, our goal is to <strong>\"Free Palestine\"</strong>.
                    </p>
                    <button type=\"button\" class=\"btn btn-light mt-3\" id=\"closeGoalPopup\">
                        Close
                    </button>
                </div>
            </div>

            {{ form_end(form) }}
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}

<script>
document.addEventListener(\"DOMContentLoaded\", function () {

    const input = document.querySelector('[name\$=\"[progressGoa]\"]');
    const fill = document.getElementById(\"progressFill\");
    const text = document.getElementById(\"progressText\");

    const popup = document.getElementById(\"goalSuccessPopup\");
    const closeBtn = document.getElementById(\"closeGoalPopup\");

    if (!input || !fill || !text) return;

    function color(v) {
        if (v == 100) return \"#22c55e\";
        if (v > 60) return \"#3b82f6\";
        if (v > 30) return \"#f59e0b\";
        return \"#ef4444\";
    }

    function update(v) {
        v = Math.max(0, Math.min(100, v));
        input.value = v;
        fill.style.width = v + \"%\";
        fill.style.background = color(v);
        text.innerText = v + \"%\";

        // Show popup when 100%
        if (v === 100 && popup) {
            popup.classList.add(\"show\");
        }
    }

    // load value from database
    update(parseFloat(input.value || 0));

    document.querySelector(\".progress-btn.up\").addEventListener(\"click\", () => {
        update(parseFloat(input.value || 0) + 10);
    });

    document.querySelector(\".progress-btn.down\").addEventListener(\"click\", () => {
        update(parseFloat(input.value || 0) - 10);
    });

    if (closeBtn) {
        closeBtn.addEventListener(\"click\", () => {
            popup.classList.remove(\"show\");
        });
    }

});
</script>

{% endblock %}


", "goal/edit.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\goal\\edit.html.twig");
    }
}
