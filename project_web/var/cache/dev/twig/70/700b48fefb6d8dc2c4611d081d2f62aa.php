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

/* motivation/new.html.twig */
class __TwigTemplate_250e7b0430a7923c297caf4c2cd04a16 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/new.html.twig"));

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

        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier") : ("Nouvelle"));
        yield " Motivation - GOALS";
        
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
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/motivation-form-modern.css?v=20260214a"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
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

        // line 14
        yield "<div class=\"motivation-form-page\">
    <div class=\"motivation-form-container\">
        <header class=\"motivation-form-header\">
            <div class=\"motivation-kicker\">Workspace goals</div>
            <h1>
                <i class=\"bi bi-emoji-smile\"></i>
                ";
        // line 20
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Modifier la motivation") : ("Nouvelle motivation"));
        yield "
            </h1>
            <p>Créez un message inspirant adapté à votre humeur du moment.</p>
        </header>

        ";
        // line 25
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), 'form_start', ["attr" => ["class" => "motivation-form"]]);
        yield "
            <section class=\"motivation-form-section\">
                <h2 class=\"motivation-section-title\">
                    <i class=\"bi bi-pencil-square\"></i> Informations de la motivation
                </h2>

                <div class=\"row g-3\">
                    <div class=\"col-lg-7\">
                        ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "title", [], "any", false, false, false, 33), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Titre"]);
        yield "
                        ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "title", [], "any", false, false, false, 34), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "Ex: Restez positif !"]]);
        yield "
                    </div>
                    <div class=\"col-lg-5\">
                        ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "mood", [], "any", false, false, false, 37), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Humeur"]);
        yield "
                        ";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "mood", [], "any", false, false, false, 38), 'widget', ["attr" => ["class" => "form-select"]]);
        yield "
                    </div>
                </div>

                <div class=\"mt-3\">
                    ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "description", [], "any", false, false, false, 43), 'label', ["label_attr" => ["class" => "form-label"], "label" => "Description"]);
        yield "
                    ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "description", [], "any", false, false, false, 44), 'widget', ["attr" => ["class" => "form-control", "rows" => 5, "placeholder" => "Ex: Chaque petit pas compte..."]]);
        yield "
                    <div class=\"nexa-form-help\">Écrivez un message encourageant et motivant.</div>
                </div>

                <div class=\"mt-3\">
                    ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "image", [], "any", false, false, false, 49), 'label', ["label_attr" => ["class" => "form-label"], "label" => "URL de l'image (optionnel)"]);
        yield "
                    ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "image", [], "any", false, false, false, 50), 'widget', ["attr" => ["class" => "form-control", "placeholder" => "https://example.com/image.jpg"]]);
        yield "
                    <div class=\"nexa-form-help\">URL d'une image inspirante (optionnel).</div>
                </div>
            </section>

            <div class=\"motivation-form-actions\">
                <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\" class=\"goals-btn goals-btn-secondary\">
                    <i class=\"bi bi-arrow-left\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"goals-btn goals-btn-primary\">
                    <i class=\"bi bi-save\"></i> ";
        // line 60
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 60, $this->source); })()), "id", [], "any", false, false, false, 60)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Mettre à jour") : ("Créer la motivation"));
        yield "
                </button>
            </div>
        ";
        // line 63
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), 'form_end');
        yield "
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
        return "motivation/new.html.twig";
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
        return array (  223 => 63,  217 => 60,  210 => 56,  201 => 50,  197 => 49,  189 => 44,  185 => 43,  177 => 38,  173 => 37,  167 => 34,  163 => 33,  152 => 25,  144 => 20,  136 => 14,  123 => 13,  110 => 10,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}{{ motivation.id ? 'Modifier' : 'Nouvelle' }} Motivation - GOALS{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/motivation-form-modern.css?v=20260214a') }}\">
{% endblock %}

{% block body %}
<div class=\"motivation-form-page\">
    <div class=\"motivation-form-container\">
        <header class=\"motivation-form-header\">
            <div class=\"motivation-kicker\">Workspace goals</div>
            <h1>
                <i class=\"bi bi-emoji-smile\"></i>
                {{ motivation.id ? 'Modifier la motivation' : 'Nouvelle motivation' }}
            </h1>
            <p>Créez un message inspirant adapté à votre humeur du moment.</p>
        </header>

        {{ form_start(form, {'attr': {'class': 'motivation-form'}}) }}
            <section class=\"motivation-form-section\">
                <h2 class=\"motivation-section-title\">
                    <i class=\"bi bi-pencil-square\"></i> Informations de la motivation
                </h2>

                <div class=\"row g-3\">
                    <div class=\"col-lg-7\">
                        {{ form_label(form.title, 'Titre', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(form.title, {'attr': {'class': 'form-control', 'placeholder': 'Ex: Restez positif !'}}) }}
                    </div>
                    <div class=\"col-lg-5\">
                        {{ form_label(form.mood, 'Humeur', {'label_attr': {'class': 'form-label'}}) }}
                        {{ form_widget(form.mood, {'attr': {'class': 'form-select'}}) }}
                    </div>
                </div>

                <div class=\"mt-3\">
                    {{ form_label(form.description, 'Description', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(form.description, {'attr': {'class': 'form-control', 'rows': 5, 'placeholder': 'Ex: Chaque petit pas compte...'}}) }}
                    <div class=\"nexa-form-help\">Écrivez un message encourageant et motivant.</div>
                </div>

                <div class=\"mt-3\">
                    {{ form_label(form.image, 'URL de l\\'image (optionnel)', {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(form.image, {'attr': {'class': 'form-control', 'placeholder': 'https://example.com/image.jpg'}}) }}
                    <div class=\"nexa-form-help\">URL d'une image inspirante (optionnel).</div>
                </div>
            </section>

            <div class=\"motivation-form-actions\">
                <a href=\"{{ path('app_motivation_index') }}\" class=\"goals-btn goals-btn-secondary\">
                    <i class=\"bi bi-arrow-left\"></i> Annuler
                </a>
                <button type=\"submit\" class=\"goals-btn goals-btn-primary\">
                    <i class=\"bi bi-save\"></i> {{ motivation.id ? 'Mettre à jour' : 'Créer la motivation' }}
                </button>
            </div>
        {{ form_end(form) }}
        </div>
</div>
{% endblock %}

", "motivation/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\motivation\\new.html.twig");
    }
}
