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

/* Milestones/edit.html.twig */
class __TwigTemplate_46fd7d1395f3759fe4170a03cb3c165c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/edit.html.twig"));

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

        yield "Modifier le Jalon";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/milestones-form-modern.css?v=20260214b"), "html", null, true);
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
        yield "<div class=\"nexa-container milestones-form-page\">
    <div class=\"nexa-form-container\">
        <div class=\"nexa-form-header\">
            <h1><i class=\"bi bi-pencil-square\"></i> Modifier le jalon</h1>
            <p class=\"nexa-form-subtitle\">Mettez à jour les informations de votre jalon</p>
        </div>

        ";
        // line 18
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), 'form_start', ["attr" => ["id" => "milestone-form", "class" => "needs-validation", "novalidate" => "novalidate"]]);
        yield "
        
        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-card-heading\"></i> Informations du jalon</h2>
            
            <div class=\"nexa-form-group required\">
                ";
        // line 24
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "title", [], "any", false, false, false, 24), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-fonts\"></i></span>
                    ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()), "title", [], "any", false, false, false, 27), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: Première étape, Révision intermédiaire...", "minlength" => "3", "maxlength" => "100", "required" => "required", "data-counter" => "title-counter"]]);
        // line 36
        yield "
                </div>
                <div class=\"nexa-char-counter\" id=\"title-counter\">";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "title", [], "any", false, false, false, 38), "vars", [], "any", false, false, false, 38), "value", [], "any", false, false, false, 38)), "html", null, true);
        yield "/100</div>
                ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "title", [], "any", false, false, false, 39), 'errors');
        yield "
                <div class=\"nexa-form-help\">Minimum 3 caractères, maximum 100 caractères</div>
            </div>

            <div class=\"nexa-form-group required\">
                ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "description", [], "any", false, false, false, 44), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-text-paragraph\"></i></span>
                    ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "description", [], "any", false, false, false, 47), 'widget', ["attr" => ["class" => "form-control textarea", "rows" => "4", "placeholder" => "Décrivez ce jalon en détail...", "minlength" => "10", "maxlength" => "255", "required" => "required", "data-counter" => "description-counter"]]);
        // line 57
        yield "
                </div>
                <div class=\"nexa-char-counter\" id=\"description-counter\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 59, $this->source); })()), "description", [], "any", false, false, false, 59), "vars", [], "any", false, false, false, 59), "value", [], "any", false, false, false, 59)), "html", null, true);
        yield "/255</div>
                ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "description", [], "any", false, false, false, 60), 'errors');
        yield "
                <div class=\"nexa-form-help\">Minimum 10 caractères, maximum 255 caractères</div>
            </div>
        </div>

        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-calendar-range\"></i> Dates</h2>
            
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"nexa-form-group required\">
                        ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "dueDate", [], "any", false, false, false, 71), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                        <div class=\"input-group\">
                            <span class=\"input-group-text\"><i class=\"bi bi-calendar-check\"></i></span>
                            ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "dueDate", [], "any", false, false, false, 74), 'widget', ["attr" => ["class" => "form-control", "required" => "required"]]);
        // line 79
        yield "
                        </div>
                        ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "dueDate", [], "any", false, false, false, 81), 'errors');
        yield "
                        <div class=\"nexa-form-help\">Date à laquelle ce jalon doit être atteint</div>
                    </div>
                </div>
                
                <div class=\"col-md-6\">
                    <div class=\"nexa-form-group\">
                        ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "completedDate", [], "any", false, false, false, 88), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                        <div class=\"input-group\">
                            <span class=\"input-group-text\"><i class=\"bi bi-calendar-plus\"></i></span>
                            ";
        // line 91
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "completedDate", [], "any", false, false, false, 91), 'widget', ["attr" => ["class" => "form-control"]]);
        // line 95
        yield "
                        </div>
                        ";
        // line 97
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 97, $this->source); })()), "completedDate", [], "any", false, false, false, 97), 'errors');
        yield "
                        <div class=\"nexa-form-help\">Date à laquelle ce jalon a été atteint (optionnel)</div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-bullseye\"></i> Association</h2>
            
            <div class=\"nexa-form-group required\">
                ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "goalGoa", [], "any", false, false, false, 108), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-link\"></i></span>
                    ";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), "goalGoa", [], "any", false, false, false, 111), 'widget', ["attr" => ["class" => "form-control nexa-form-select", "required" => "required"]]);
        // line 116
        yield "
                </div>
                ";
        // line 118
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 118, $this->source); })()), "goalGoa", [], "any", false, false, false, 118), 'errors');
        yield "
                <div class=\"nexa-form-help\">Sélectionnez l'objectif auquel ce jalon appartient</div>
            </div>
        </div>

        <div class=\"nexa-form-actions milestones-form-actions\">
            <a href=\"";
        // line 124
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary me-2 goals-btn goals-btn-secondary\">
                <i class=\"bi bi-x-circle\"></i> Annuler
            </a>
            <button type=\"submit\" class=\"btn btn-success goals-btn goals-btn-primary\">
                <i class=\"bi bi-check-circle\"></i> Enregistrer les modifications
            </button>
        </div>
        ";
        // line 131
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 131, $this->source); })()), 'form_end');
        yield "
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 136
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

        // line 137
        yield "<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Compteurs de caractères
        const titleInput = document.querySelector('[name*=\"title\"]');
        const titleCounter = document.getElementById('title-counter');
        const descInput = document.querySelector('[name*=\"description\"]');
        const descCounter = document.getElementById('description-counter');
        
        function updateCounter(input, counter, limit) {
            if (input && counter) {
                const length = input.value.length;
                counter.textContent = `\${length}/\${limit}`;
                counter.classList.remove('near-limit', 'over-limit');
                
                if (length > limit * 0.9) {
                    counter.classList.add('near-limit');
                }
                if (length > limit) {
                    counter.classList.add('over-limit');
                }
                
                input.addEventListener('input', function() {
                    updateCounter(this, counter, limit);
                });
            }
        }
        
        updateCounter(titleInput, titleCounter, 100);
        updateCounter(descInput, descCounter, 255);
        
        // Validation des dates
        const dueDate = document.querySelector('[name*=\"dueDate\"]');
        const completedDate = document.querySelector('[name*=\"completedDate\"]');
        
        if (dueDate && completedDate) {
            completedDate.addEventListener('change', function() {
                if (dueDate.value && new Date(this.value) < new Date(dueDate.value)) {
                    this.setCustomValidity('La date de complétion doit être après la date d\\'échéance');
                } else {
                    this.setCustomValidity('');
                }
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
        return "Milestones/edit.html.twig";
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
        return array (  312 => 137,  299 => 136,  284 => 131,  274 => 124,  265 => 118,  261 => 116,  259 => 111,  253 => 108,  239 => 97,  235 => 95,  233 => 91,  227 => 88,  217 => 81,  213 => 79,  211 => 74,  205 => 71,  191 => 60,  187 => 59,  183 => 57,  181 => 47,  175 => 44,  167 => 39,  163 => 38,  159 => 36,  157 => 27,  151 => 24,  142 => 18,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Modifier le Jalon{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/milestones-form-modern.css?v=20260214b') }}\">
{% endblock %}

{% block body %}
<div class=\"nexa-container milestones-form-page\">
    <div class=\"nexa-form-container\">
        <div class=\"nexa-form-header\">
            <h1><i class=\"bi bi-pencil-square\"></i> Modifier le jalon</h1>
            <p class=\"nexa-form-subtitle\">Mettez à jour les informations de votre jalon</p>
        </div>

        {{ form_start(form, {'attr': {'id': 'milestone-form', 'class': 'needs-validation', 'novalidate': 'novalidate'}}) }}
        
        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-card-heading\"></i> Informations du jalon</h2>
            
            <div class=\"nexa-form-group required\">
                {{ form_label(form.title, null, {'label_attr': {'class': 'form-label'}}) }}
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-fonts\"></i></span>
                    {{ form_widget(form.title, {
                        'attr': {
                            'class': 'form-control',
                            'placeholder': 'Ex: Première étape, Révision intermédiaire...',
                            'minlength': '3',
                            'maxlength': '100',
                            'required': 'required',
                            'data-counter': 'title-counter'
                        }
                    }) }}
                </div>
                <div class=\"nexa-char-counter\" id=\"title-counter\">{{ form.title.vars.value|length }}/100</div>
                {{ form_errors(form.title) }}
                <div class=\"nexa-form-help\">Minimum 3 caractères, maximum 100 caractères</div>
            </div>

            <div class=\"nexa-form-group required\">
                {{ form_label(form.description, null, {'label_attr': {'class': 'form-label'}}) }}
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-text-paragraph\"></i></span>
                    {{ form_widget(form.description, {
                        'attr': {
                            'class': 'form-control textarea',
                            'rows': '4',
                            'placeholder': 'Décrivez ce jalon en détail...',
                            'minlength': '10',
                            'maxlength': '255',
                            'required': 'required',
                            'data-counter': 'description-counter'
                        }
                    }) }}
                </div>
                <div class=\"nexa-char-counter\" id=\"description-counter\">{{ form.description.vars.value|length }}/255</div>
                {{ form_errors(form.description) }}
                <div class=\"nexa-form-help\">Minimum 10 caractères, maximum 255 caractères</div>
            </div>
        </div>

        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-calendar-range\"></i> Dates</h2>
            
            <div class=\"row g-3\">
                <div class=\"col-md-6\">
                    <div class=\"nexa-form-group required\">
                        {{ form_label(form.dueDate, null, {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-group\">
                            <span class=\"input-group-text\"><i class=\"bi bi-calendar-check\"></i></span>
                            {{ form_widget(form.dueDate, {
                                'attr': {
                                    'class': 'form-control',
                                    'required': 'required'
                                }
                            }) }}
                        </div>
                        {{ form_errors(form.dueDate) }}
                        <div class=\"nexa-form-help\">Date à laquelle ce jalon doit être atteint</div>
                    </div>
                </div>
                
                <div class=\"col-md-6\">
                    <div class=\"nexa-form-group\">
                        {{ form_label(form.completedDate, null, {'label_attr': {'class': 'form-label'}}) }}
                        <div class=\"input-group\">
                            <span class=\"input-group-text\"><i class=\"bi bi-calendar-plus\"></i></span>
                            {{ form_widget(form.completedDate, {
                                'attr': {
                                    'class': 'form-control'
                                }
                            }) }}
                        </div>
                        {{ form_errors(form.completedDate) }}
                        <div class=\"nexa-form-help\">Date à laquelle ce jalon a été atteint (optionnel)</div>
                    </div>
                </div>
            </div>
        </div>

        <div class=\"milestone-form-section\">
            <h2 class=\"form-section-title\"><i class=\"bi bi-bullseye\"></i> Association</h2>
            
            <div class=\"nexa-form-group required\">
                {{ form_label(form.goalGoa, null, {'label_attr': {'class': 'form-label'}}) }}
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-link\"></i></span>
                    {{ form_widget(form.goalGoa, {
                        'attr': {
                            'class': 'form-control nexa-form-select',
                            'required': 'required'
                        }
                    }) }}
                </div>
                {{ form_errors(form.goalGoa) }}
                <div class=\"nexa-form-help\">Sélectionnez l'objectif auquel ce jalon appartient</div>
            </div>
        </div>

        <div class=\"nexa-form-actions milestones-form-actions\">
            <a href=\"{{ path('app_milestones_index') }}\" class=\"btn btn-outline-secondary me-2 goals-btn goals-btn-secondary\">
                <i class=\"bi bi-x-circle\"></i> Annuler
            </a>
            <button type=\"submit\" class=\"btn btn-success goals-btn goals-btn-primary\">
                <i class=\"bi bi-check-circle\"></i> Enregistrer les modifications
            </button>
        </div>
        {{ form_end(form) }}
    </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Compteurs de caractères
        const titleInput = document.querySelector('[name*=\"title\"]');
        const titleCounter = document.getElementById('title-counter');
        const descInput = document.querySelector('[name*=\"description\"]');
        const descCounter = document.getElementById('description-counter');
        
        function updateCounter(input, counter, limit) {
            if (input && counter) {
                const length = input.value.length;
                counter.textContent = `\${length}/\${limit}`;
                counter.classList.remove('near-limit', 'over-limit');
                
                if (length > limit * 0.9) {
                    counter.classList.add('near-limit');
                }
                if (length > limit) {
                    counter.classList.add('over-limit');
                }
                
                input.addEventListener('input', function() {
                    updateCounter(this, counter, limit);
                });
            }
        }
        
        updateCounter(titleInput, titleCounter, 100);
        updateCounter(descInput, descCounter, 255);
        
        // Validation des dates
        const dueDate = document.querySelector('[name*=\"dueDate\"]');
        const completedDate = document.querySelector('[name*=\"completedDate\"]');
        
        if (dueDate && completedDate) {
            completedDate.addEventListener('change', function() {
                if (dueDate.value && new Date(this.value) < new Date(dueDate.value)) {
                    this.setCustomValidity('La date de complétion doit être après la date d\\'échéance');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
    });
</script>
{% endblock %}

", "Milestones/edit.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\Milestones\\edit.html.twig");
    }
}
