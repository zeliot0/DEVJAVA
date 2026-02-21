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

/* Milestones/new.html.twig */
class __TwigTemplate_faf1304b94be2ed16ebf7cbac7c3a86d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Milestones/new.html.twig"));

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

        yield "Nouveau Jalon";
        
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
            <h1><i class=\"bi bi-flag\"></i> Créer un nouveau jalon</h1>
            <p class=\"nexa-form-subtitle\">Définissez une étape importante pour votre objectif</p>
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
                <div class=\"nexa-char-counter\" id=\"title-counter\">0/100</div>
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
                <div class=\"nexa-char-counter\" id=\"description-counter\">0/255</div>
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
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "dueDate", [], "any", false, false, false, 74), 'widget', ["attr" => ["class" => "form-control", "required" => "required", "min" => $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d")]]);
        // line 80
        yield "
                        </div>
                        ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 82, $this->source); })()), "dueDate", [], "any", false, false, false, 82), 'errors');
        yield "
                        <div class=\"nexa-form-help\">Date à laquelle ce jalon doit être atteint</div>
                    </div>
                </div>
                
                <div class=\"col-md-6\">
                    <div class=\"nexa-form-group\">
                        ";
        // line 89
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "completedDate", [], "any", false, false, false, 89), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                        <div class=\"input-group\">
                            <span class=\"input-group-text\"><i class=\"bi bi-calendar-plus\"></i></span>
                            ";
        // line 92
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "completedDate", [], "any", false, false, false, 92), 'widget', ["attr" => ["class" => "form-control"]]);
        // line 96
        yield "
                        </div>
                        ";
        // line 98
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "completedDate", [], "any", false, false, false, 98), 'errors');
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
        // line 109
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), "goalGoa", [], "any", false, false, false, 109), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                <div class=\"input-group\">
                    <span class=\"input-group-text\"><i class=\"bi bi-link\"></i></span>
                    ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 112, $this->source); })()), "goalGoa", [], "any", false, false, false, 112), 'widget', ["attr" => ["class" => "form-control nexa-form-select", "required" => "required"]]);
        // line 117
        yield "
                </div>
                ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "goalGoa", [], "any", false, false, false, 119), 'errors');
        yield "
                <div class=\"nexa-form-help\">Sélectionnez l'objectif auquel ce jalon appartient</div>
            </div>
        </div>

        <div class=\"nexa-form-actions milestones-form-actions\">
            <a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"btn btn-outline-secondary me-2 goals-btn goals-btn-secondary\">
                <i class=\"bi bi-x-circle\"></i> Annuler
            </a>
            <button type=\"submit\" class=\"btn btn-success goals-btn goals-btn-primary\">
                <i class=\"bi bi-check-circle\"></i> Créer le jalon
            </button>
        </div>
        ";
        // line 132
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 132, $this->source); })()), 'form_end');
        yield "
        
        <div class=\"form-loading\" id=\"form-loading\">
            <div class=\"spinner\"></div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 141
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

        // line 142
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
                
                // Initialiser
                updateCounter(input, counter, limit);
                input.addEventListener('input', function() {
                    updateCounter(this, counter, limit);
                });
            }
        }
        
        updateCounter(titleInput, titleCounter, 100);
        updateCounter(descInput, descCounter, 255);
        
        // Validation du formulaire
        const form = document.getElementById('milestone-form');
        const loading = document.getElementById('form-loading');
        
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                loading.classList.add('active');
            }
            form.classList.add('was-validated');
        });
        
        // Validation des dates
        const dueDate = document.querySelector('[name*=\"dueDate\"]');
        const completedDate = document.querySelector('[name*=\"completedDate\"]');
        
        if (dueDate && completedDate) {
            dueDate.addEventListener('change', function() {
                if (completedDate.value && new Date(this.value) > new Date(completedDate.value)) {
                    completedDate.value = '';
                }
            });
            
            completedDate.addEventListener('change', function() {
                if (dueDate.value && new Date(this.value) < new Date(dueDate.value)) {
                    this.setCustomValidity('La date de complétion doit être après la date d\\'échéance');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
        
        // Validation en temps réel
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
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
        return "Milestones/new.html.twig";
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
        return array (  310 => 142,  297 => 141,  278 => 132,  268 => 125,  259 => 119,  255 => 117,  253 => 112,  247 => 109,  233 => 98,  229 => 96,  227 => 92,  221 => 89,  211 => 82,  207 => 80,  205 => 74,  199 => 71,  185 => 60,  180 => 57,  178 => 47,  172 => 44,  164 => 39,  159 => 36,  157 => 27,  151 => 24,  142 => 18,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Nouveau Jalon{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/milestones-form-modern.css?v=20260214b') }}\">
{% endblock %}

{% block body %}
<div class=\"nexa-container milestones-form-page\">
    <div class=\"nexa-form-container\">
        <div class=\"nexa-form-header\">
            <h1><i class=\"bi bi-flag\"></i> Créer un nouveau jalon</h1>
            <p class=\"nexa-form-subtitle\">Définissez une étape importante pour votre objectif</p>
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
                <div class=\"nexa-char-counter\" id=\"title-counter\">0/100</div>
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
                <div class=\"nexa-char-counter\" id=\"description-counter\">0/255</div>
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
                                    'required': 'required',
                                    'min': \"now\"|date('Y-m-d')
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
                <i class=\"bi bi-check-circle\"></i> Créer le jalon
            </button>
        </div>
        {{ form_end(form) }}
        
        <div class=\"form-loading\" id=\"form-loading\">
            <div class=\"spinner\"></div>
        </div>
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
                
                // Initialiser
                updateCounter(input, counter, limit);
                input.addEventListener('input', function() {
                    updateCounter(this, counter, limit);
                });
            }
        }
        
        updateCounter(titleInput, titleCounter, 100);
        updateCounter(descInput, descCounter, 255);
        
        // Validation du formulaire
        const form = document.getElementById('milestone-form');
        const loading = document.getElementById('form-loading');
        
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                loading.classList.add('active');
            }
            form.classList.add('was-validated');
        });
        
        // Validation des dates
        const dueDate = document.querySelector('[name*=\"dueDate\"]');
        const completedDate = document.querySelector('[name*=\"completedDate\"]');
        
        if (dueDate && completedDate) {
            dueDate.addEventListener('change', function() {
                if (completedDate.value && new Date(this.value) > new Date(completedDate.value)) {
                    completedDate.value = '';
                }
            });
            
            completedDate.addEventListener('change', function() {
                if (dueDate.value && new Date(this.value) < new Date(dueDate.value)) {
                    this.setCustomValidity('La date de complétion doit être après la date d\\'échéance');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
        
        // Validation en temps réel
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.checkValidity()) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });
    });
</script>
{% endblock %}

", "Milestones/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\Milestones\\new.html.twig");
    }
}
