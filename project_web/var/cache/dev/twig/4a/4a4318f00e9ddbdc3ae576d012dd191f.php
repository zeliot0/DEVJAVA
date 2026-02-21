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

/* time_message/new.html.twig */
class __TwigTemplate_2a0c691320eaea4792984be5fb07465c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/new.html.twig"));

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

        yield "Write to ";
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 3, $this->source); })()) == "future")) ? ("Future Self") : ("Past Self"));
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/time-message-modern.css?v=20260220b"), "html", null, true);
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
        yield "<div class=\"container mt-4 tm-page\">
    <div class=\"tm-header\">
        <div>
            <h1 class=\"tm-title\">
                ";
        // line 15
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 15, $this->source); })()) == "future")) {
            // line 16
            yield "                    <i class=\"fas fa-rocket\"></i> Write to Your Future Self
                ";
        } else {
            // line 18
            yield "                    <i class=\"fas fa-history\"></i> Write to Your Past Self
                ";
        }
        // line 20
        yield "            </h1>
            <p class=\"tm-subtitle\">Write an intentional message and schedule it for the right moment.</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\" class=\"tm-btn\"><i class=\"fas fa-arrow-left\"></i> Back to Journal</a>
        </div>
    </div>

    <div class=\"tm-form-card\">
        <div class=\"tm-form-note\" id=\"promptContainer\">
            <div class=\"d-flex align-items-center gap-2\">
                <i class=\"fas fa-lightbulb text-primary\"></i>
                <small class=\"text-muted\" id=\"reflectionPrompt\">Select your mood to get a writing prompt.</small>
                <button type=\"button\" class=\"tm-btn ms-auto\" id=\"generatePrompt\" style=\"display: none; min-height: 36px; padding: 0 12px;\">
                    <i class=\"fas fa-sync-alt\"></i> New Prompt
                </button>
            </div>
        </div>

        ";
        // line 39
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), 'form_start', ["attr" => ["id" => "timeMessageForm"]]);
        yield "

        <div class=\"tm-field\">
            ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "titleMsg", [], "any", false, false, false, 42), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "titleMsg", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
            ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "titleMsg", [], "any", false, false, false, 44), 'errors');
        yield "
        </div>

        <div class=\"tm-field\">
            ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "contentMsg", [], "any", false, false, false, 48), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "contentMsg", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
            ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "contentMsg", [], "any", false, false, false, 50), 'errors');
        yield "
        </div>

        <div class=\"tm-form-grid\">
            <div class=\"tm-field\">
                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "moodAtCreation", [], "any", false, false, false, 55), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "moodAtCreation", [], "any", false, false, false, 56), 'widget', ["attr" => ["class" => "form-select", "id" => "moodSelect"]]);
        yield "
                ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "moodAtCreation", [], "any", false, false, false, 57), 'errors');
        yield "
            </div>

            ";
        // line 60
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 60, $this->source); })()) == "future")) {
            // line 61
            yield "                <div class=\"tm-field\">
                    ";
            // line 62
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 62), 'label', ["label_attr" => ["class" => "form-label"]]);
            yield "
                    ";
            // line 63
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 63), 'widget', ["attr" => ["class" => "form-control"]]);
            yield "
                    ";
            // line 64
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 64, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 64), 'errors');
            yield "
                </div>
            ";
        }
        // line 67
        yield "        </div>

        ";
        // line 69
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 69, $this->source); })())) > 0)) {
            // line 70
            yield "            <div class=\"tm-field\">
                <label class=\"form-label\">Link to a Goal (Optional)</label>
                <select name=\"goal_id\" class=\"form-select\">
                    <option value=\"\">-- Select a goal --</option>
                    ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["goals"]) || array_key_exists("goals", $context) ? $context["goals"] : (function () { throw new RuntimeError('Variable "goals" does not exist.', 74, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["goal"]) {
                // line 75
                yield "                        <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "idGoa", [], "any", false, false, false, 75), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["goal"], "titleGoa", [], "any", false, false, false, 75), "html", null, true);
                yield "</option>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['goal'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            yield "                </select>
                <small class=\"text-muted\">Linking a goal helps generate more personalized AI responses.</small>
            </div>
        ";
        }
        // line 81
        yield "
        <div class=\"tm-field\">
            ";
        // line 83
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "video", [], "any", false, false, false, 83), 'label', ["label_attr" => ["class" => "form-label"]]);
        yield "
            ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "video", [], "any", false, false, false, 84), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
            ";
        // line 85
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "video", [], "any", false, false, false, 85), 'errors');
        yield "
            <small class=\"text-muted\">Max size: 50MB. Supported formats: MP4, MOV, AVI, WEBM</small>
        </div>

        <div class=\"tm-form-actions\">
            <button type=\"submit\" class=\"tm-btn tm-btn-primary\">
                ";
        // line 91
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 91, $this->source); })()) == "future")) {
            // line 92
            yield "                    <i class=\"fas fa-paper-plane\"></i> Send to Future Self
                ";
        } else {
            // line 94
            yield "                    <i class=\"fas fa-save\"></i> Save Letter to Past Self
                ";
        }
        // line 96
        yield "            </button>
            <a href=\"";
        // line 97
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\" class=\"tm-btn\">Cancel</a>
        </div>

        ";
        // line 100
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), 'form_end');
        yield "
    </div>

    ";
        // line 103
        if (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 103, $this->source); })()) == "future")) {
            // line 104
            yield "        <div class=\"tm-note-card\">
            <h4><i class=\"fas fa-robot\"></i> AI-powered Future Self</h4>
            <p class=\"mb-1\">When you write to your future self, OpenAI generates a reflective response to help you gain perspective.</p>
            <small class=\"text-muted\">Powered by external AI API integration.</small>
        </div>
    ";
        }
        // line 110
        yield "</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const moodSelect = document.getElementById('moodSelect');
    const promptContainer = document.getElementById('reflectionPrompt');
    const generateBtn = document.getElementById('generatePrompt');

    if (moodSelect) {
        moodSelect.addEventListener('change', function() {
            const mood = this.value;
            if (mood) {
                fetch(`/time-message/api/reflection-prompt/\${mood}`)
                    .then(response => response.json())
                    .then(data => {
                        promptContainer.textContent = data.prompt;
                        generateBtn.style.display = 'inline-flex';
                    })
                    .catch(() => {
                        promptContainer.textContent = 'Unable to load prompt right now.';
                    });
            }
        });
    }

    if (generateBtn) {
        generateBtn.addEventListener('click', function() {
            const mood = moodSelect.value;
            if (mood) {
                fetch(`/time-message/api/reflection-prompt/\${mood}`)
                    .then(response => response.json())
                    .then(data => {
                        promptContainer.textContent = data.prompt;
                    });
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
        return "time_message/new.html.twig";
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
        return array (  332 => 110,  324 => 104,  322 => 103,  316 => 100,  310 => 97,  307 => 96,  303 => 94,  299 => 92,  297 => 91,  288 => 85,  284 => 84,  280 => 83,  276 => 81,  270 => 77,  259 => 75,  255 => 74,  249 => 70,  247 => 69,  243 => 67,  237 => 64,  233 => 63,  229 => 62,  226 => 61,  224 => 60,  218 => 57,  214 => 56,  210 => 55,  202 => 50,  198 => 49,  194 => 48,  187 => 44,  183 => 43,  179 => 42,  173 => 39,  155 => 24,  149 => 20,  145 => 18,  141 => 16,  139 => 15,  133 => 11,  120 => 10,  107 => 7,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Write to {{ type == 'future' ? 'Future Self' : 'Past Self' }}{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/time-message-modern.css?v=20260220b') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 tm-page\">
    <div class=\"tm-header\">
        <div>
            <h1 class=\"tm-title\">
                {% if type == 'future' %}
                    <i class=\"fas fa-rocket\"></i> Write to Your Future Self
                {% else %}
                    <i class=\"fas fa-history\"></i> Write to Your Past Self
                {% endif %}
            </h1>
            <p class=\"tm-subtitle\">Write an intentional message and schedule it for the right moment.</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"{{ path('app_time_message_index') }}\" class=\"tm-btn\"><i class=\"fas fa-arrow-left\"></i> Back to Journal</a>
        </div>
    </div>

    <div class=\"tm-form-card\">
        <div class=\"tm-form-note\" id=\"promptContainer\">
            <div class=\"d-flex align-items-center gap-2\">
                <i class=\"fas fa-lightbulb text-primary\"></i>
                <small class=\"text-muted\" id=\"reflectionPrompt\">Select your mood to get a writing prompt.</small>
                <button type=\"button\" class=\"tm-btn ms-auto\" id=\"generatePrompt\" style=\"display: none; min-height: 36px; padding: 0 12px;\">
                    <i class=\"fas fa-sync-alt\"></i> New Prompt
                </button>
            </div>
        </div>

        {{ form_start(form, {'attr': {'id': 'timeMessageForm'}}) }}

        <div class=\"tm-field\">
            {{ form_label(form.titleMsg, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(form.titleMsg, {'attr': {'class': 'form-control'}}) }}
            {{ form_errors(form.titleMsg) }}
        </div>

        <div class=\"tm-field\">
            {{ form_label(form.contentMsg, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(form.contentMsg, {'attr': {'class': 'form-control'}}) }}
            {{ form_errors(form.contentMsg) }}
        </div>

        <div class=\"tm-form-grid\">
            <div class=\"tm-field\">
                {{ form_label(form.moodAtCreation, null, {'label_attr': {'class': 'form-label'}}) }}
                {{ form_widget(form.moodAtCreation, {'attr': {'class': 'form-select', 'id': 'moodSelect'}}) }}
                {{ form_errors(form.moodAtCreation) }}
            </div>

            {% if type == 'future' %}
                <div class=\"tm-field\">
                    {{ form_label(form.deliveryDateMsg, null, {'label_attr': {'class': 'form-label'}}) }}
                    {{ form_widget(form.deliveryDateMsg, {'attr': {'class': 'form-control'}}) }}
                    {{ form_errors(form.deliveryDateMsg) }}
                </div>
            {% endif %}
        </div>

        {% if goals|length > 0 %}
            <div class=\"tm-field\">
                <label class=\"form-label\">Link to a Goal (Optional)</label>
                <select name=\"goal_id\" class=\"form-select\">
                    <option value=\"\">-- Select a goal --</option>
                    {% for goal in goals %}
                        <option value=\"{{ goal.idGoa }}\">{{ goal.titleGoa }}</option>
                    {% endfor %}
                </select>
                <small class=\"text-muted\">Linking a goal helps generate more personalized AI responses.</small>
            </div>
        {% endif %}

        <div class=\"tm-field\">
            {{ form_label(form.video, null, {'label_attr': {'class': 'form-label'}}) }}
            {{ form_widget(form.video, {'attr': {'class': 'form-control'}}) }}
            {{ form_errors(form.video) }}
            <small class=\"text-muted\">Max size: 50MB. Supported formats: MP4, MOV, AVI, WEBM</small>
        </div>

        <div class=\"tm-form-actions\">
            <button type=\"submit\" class=\"tm-btn tm-btn-primary\">
                {% if type == 'future' %}
                    <i class=\"fas fa-paper-plane\"></i> Send to Future Self
                {% else %}
                    <i class=\"fas fa-save\"></i> Save Letter to Past Self
                {% endif %}
            </button>
            <a href=\"{{ path('app_time_message_index') }}\" class=\"tm-btn\">Cancel</a>
        </div>

        {{ form_end(form) }}
    </div>

    {% if type == 'future' %}
        <div class=\"tm-note-card\">
            <h4><i class=\"fas fa-robot\"></i> AI-powered Future Self</h4>
            <p class=\"mb-1\">When you write to your future self, OpenAI generates a reflective response to help you gain perspective.</p>
            <small class=\"text-muted\">Powered by external AI API integration.</small>
        </div>
    {% endif %}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const moodSelect = document.getElementById('moodSelect');
    const promptContainer = document.getElementById('reflectionPrompt');
    const generateBtn = document.getElementById('generatePrompt');

    if (moodSelect) {
        moodSelect.addEventListener('change', function() {
            const mood = this.value;
            if (mood) {
                fetch(`/time-message/api/reflection-prompt/\${mood}`)
                    .then(response => response.json())
                    .then(data => {
                        promptContainer.textContent = data.prompt;
                        generateBtn.style.display = 'inline-flex';
                    })
                    .catch(() => {
                        promptContainer.textContent = 'Unable to load prompt right now.';
                    });
            }
        });
    }

    if (generateBtn) {
        generateBtn.addEventListener('click', function() {
            const mood = moodSelect.value;
            if (mood) {
                fetch(`/time-message/api/reflection-prompt/\${mood}`)
                    .then(response => response.json())
                    .then(data => {
                        promptContainer.textContent = data.prompt;
                    });
            }
        });
    }
});
</script>
{% endblock %}
", "time_message/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\time_message\\new.html.twig");
    }
}
