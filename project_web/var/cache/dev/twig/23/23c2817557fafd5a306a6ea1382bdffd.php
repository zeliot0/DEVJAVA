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

/* theme/new.html.twig */
class __TwigTemplate_5735a43c8fff8aedd447c6222b0269f0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/new.html.twig"));

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

        yield "Nouveau thème — NEXA";
        
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
        yield "<div class=\"theme-new-page\">

<div class=\"page-header\">
    <div>
        <h1>Créer un nouveau thème</h1>
        <p>Définissez les informations principales du thème</p>
    </div>

    <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\" class=\"btn\">
        ← Retour à la liste
    </a>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        ";
        // line 22
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

        ";
        // line 24
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "vars", [], "any", false, false, false, 24), "submitted", [], "any", false, false, false, 24) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "vars", [], "any", false, false, false, 24), "valid", [], "any", false, false, false, 24))) {
            // line 25
            yield "            <div class=\"form-errors-box\">
                <strong>⚠️ Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 29
                yield "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 29), "errors", [], "any", false, false, false, 29));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 30
                    yield "                            <li>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 30), "html", null, true);
                    yield "</li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                yield "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            yield "                </ul>
            </div>
        ";
        }
        // line 36
        yield "
        <div class=\"form-two-columns\">
            <div class=\"form-column-left\">
                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-thumbtack\"></i> Informations générales</h3>

                    <div>
                        <label class=\"field-label\">Nom du thème</label>
                        ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "nom", [], "any", false, false, false, 44), 'widget', ["attr" => ["class" => "field", "placeholder" => "Choisir un domaine"]]);
        yield "
                    </div>

                    <div style=\"margin-top: 1.25rem;\">
                        <label class=\"field-label\">Priorité</label>
                        <div class=\"priority-control\">
                            ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "priorite", [], "any", false, false, false, 50), 'widget', ["attr" => ["class" => "field priority-select js-priority-select"]]);
        yield "
                            <div class=\"priority-preview js-priority-preview\" aria-hidden=\"true\">
                                <span class=\"priority-preview-title\">Niveau visuel</span>
                                <div class=\"priority-preview-stars\">
                                    <i class=\"fa-regular fa-star\" data-level=\"1\"></i>
                                    <i class=\"fa-regular fa-star\" data-level=\"2\"></i>
                                    <i class=\"fa-regular fa-star\" data-level=\"3\"></i>
                                </div>
                                <small class=\"priority-preview-text js-priority-text\">Moyenne</small>
                            </div>
                        </div>
                    </div>

                    <div style=\"margin-top: 1.25rem;\">
                        <label class=\"field-label\">Description</label>
                        ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "description_q", [], "any", false, false, false, 65), 'widget', ["attr" => ["class" => "field", "rows" => 5, "placeholder" => "Décrivez brièvement ce thème..."]]);
        // line 67
        yield "
                    </div>
                </div>

                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-bullseye\"></i> Intention</h3>
                    ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "intention", [], "any", false, false, false, 73), 'widget', ["attr" => ["class" => "field", "placeholder" => "Ex: Améliorer le bien-être quotidien"]]);
        // line 75
        yield "
                </div>
            </div>

            <div class=\"form-column-right\">
                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-palette\"></i> Apparence</h3>

                    <div>
                        <label class=\"field-label\">Icône</label>
                        <div class=\"icon-grid\">
                            ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "icone", [], "any", false, false, false, 86));
        foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
            // line 87
            yield "                                <label class=\"icon-option\">
                                    ";
            // line 88
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["choice"], 'widget');
            yield "
                                    <div class=\"icon-box\">
                                        <i class=\"";
            // line 90
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["choice"], "vars", [], "any", false, false, false, 90), "value", [], "any", false, false, false, 90), "html", null, true);
            yield "\"></i>
                                    </div>
                                </label>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['choice'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        yield "                        </div>
                    </div>

                    <div style=\"margin-top: 1.5rem;\">
                        <label class=\"field-label\">Couleur</label>
                        <div class=\"color-picker-wrapper\">
                            ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "couleur", [], "any", false, false, false, 100), 'widget', ["attr" => ["class" => "color-input"]]);
        yield "
                        </div>
                    </div>
                </div>

                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-gear\"></i> Statut</h3>
                    <label class=\"switch-label\">
                        ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "actif", [], "any", false, false, false, 108), 'widget');
        yield "
                        Activer ce thème
                    </label>
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-check\"></i>
                Créer le thème
            </button>

            <a href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\" class=\"btn\">
                Annuler
            </a>
        </div>

        ";
        // line 126
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 126, $this->source); })()), 'form_end');
        yield "

    </div>
</div>

</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 134
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

        // line 135
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const select = document.querySelector('.js-priority-select');
        const preview = document.querySelector('.js-priority-preview');
        if (!select || !preview) return;

        const stars = preview.querySelectorAll('[data-level]');
        const text = preview.querySelector('.js-priority-text');
        const labels = { 1: 'Basse', 2: 'Moyenne', 3: 'Haute' };

        function refresh() {
          const level = parseInt(select.value || '2', 10);
          stars.forEach((star) => {
            const starLevel = parseInt(star.getAttribute('data-level'), 10);
            star.classList.toggle('fa-solid', starLevel <= level);
            star.classList.toggle('fa-regular', starLevel > level);
          });
          if (text) text.textContent = labels[level] || 'Moyenne';
        }

        select.addEventListener('change', refresh);
        refresh();
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
        return "theme/new.html.twig";
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
        return array (  321 => 135,  308 => 134,  290 => 126,  282 => 121,  266 => 108,  255 => 100,  247 => 94,  237 => 90,  232 => 88,  229 => 87,  225 => 86,  212 => 75,  210 => 73,  202 => 67,  200 => 65,  182 => 50,  173 => 44,  163 => 36,  158 => 33,  152 => 32,  143 => 30,  138 => 29,  134 => 28,  129 => 25,  127 => 24,  122 => 22,  111 => 14,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Nouveau thème — NEXA{% endblock %}

{% block body %}
<div class=\"theme-new-page\">

<div class=\"page-header\">
    <div>
        <h1>Créer un nouveau thème</h1>
        <p>Définissez les informations principales du thème</p>
    </div>

    <a href=\"{{ path('app_theme_index') }}\" class=\"btn\">
        ← Retour à la liste
    </a>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        {{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}

        {% if form.vars.submitted and not form.vars.valid %}
            <div class=\"form-errors-box\">
                <strong>⚠️ Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    {% for field in form %}
                        {% for error in field.vars.errors %}
                            <li>{{ error.message }}</li>
                        {% endfor %}
                    {% endfor %}
                </ul>
            </div>
        {% endif %}

        <div class=\"form-two-columns\">
            <div class=\"form-column-left\">
                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-thumbtack\"></i> Informations générales</h3>

                    <div>
                        <label class=\"field-label\">Nom du thème</label>
                        {{ form_widget(form.nom, { attr: { class: 'field', placeholder: 'Choisir un domaine' } }) }}
                    </div>

                    <div style=\"margin-top: 1.25rem;\">
                        <label class=\"field-label\">Priorité</label>
                        <div class=\"priority-control\">
                            {{ form_widget(form.priorite, { attr: { class: 'field priority-select js-priority-select' } }) }}
                            <div class=\"priority-preview js-priority-preview\" aria-hidden=\"true\">
                                <span class=\"priority-preview-title\">Niveau visuel</span>
                                <div class=\"priority-preview-stars\">
                                    <i class=\"fa-regular fa-star\" data-level=\"1\"></i>
                                    <i class=\"fa-regular fa-star\" data-level=\"2\"></i>
                                    <i class=\"fa-regular fa-star\" data-level=\"3\"></i>
                                </div>
                                <small class=\"priority-preview-text js-priority-text\">Moyenne</small>
                            </div>
                        </div>
                    </div>

                    <div style=\"margin-top: 1.25rem;\">
                        <label class=\"field-label\">Description</label>
                        {{ form_widget(form.description_q, {
                            attr: { class: 'field', rows: 5, placeholder: 'Décrivez brièvement ce thème...' }
                        }) }}
                    </div>
                </div>

                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-bullseye\"></i> Intention</h3>
                    {{ form_widget(form.intention, {
                        attr: { class: 'field', placeholder: 'Ex: Améliorer le bien-être quotidien' }
                    }) }}
                </div>
            </div>

            <div class=\"form-column-right\">
                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-palette\"></i> Apparence</h3>

                    <div>
                        <label class=\"field-label\">Icône</label>
                        <div class=\"icon-grid\">
                            {% for choice in form.icone %}
                                <label class=\"icon-option\">
                                    {{ form_widget(choice) }}
                                    <div class=\"icon-box\">
                                        <i class=\"{{ choice.vars.value }}\"></i>
                                    </div>
                                </label>
                            {% endfor %}
                        </div>
                    </div>

                    <div style=\"margin-top: 1.5rem;\">
                        <label class=\"field-label\">Couleur</label>
                        <div class=\"color-picker-wrapper\">
                            {{ form_widget(form.couleur, { attr: { class: 'color-input' } }) }}
                        </div>
                    </div>
                </div>

                <div class=\"form-section\">
                    <h3><i class=\"fa-solid fa-gear\"></i> Statut</h3>
                    <label class=\"switch-label\">
                        {{ form_widget(form.actif) }}
                        Activer ce thème
                    </label>
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-check\"></i>
                Créer le thème
            </button>

            <a href=\"{{ path('app_theme_index') }}\" class=\"btn\">
                Annuler
            </a>
        </div>

        {{ form_end(form) }}

    </div>
</div>

</div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const select = document.querySelector('.js-priority-select');
        const preview = document.querySelector('.js-priority-preview');
        if (!select || !preview) return;

        const stars = preview.querySelectorAll('[data-level]');
        const text = preview.querySelector('.js-priority-text');
        const labels = { 1: 'Basse', 2: 'Moyenne', 3: 'Haute' };

        function refresh() {
          const level = parseInt(select.value || '2', 10);
          stars.forEach((star) => {
            const starLevel = parseInt(star.getAttribute('data-level'), 10);
            star.classList.toggle('fa-solid', starLevel <= level);
            star.classList.toggle('fa-regular', starLevel > level);
          });
          if (text) text.textContent = labels[level] || 'Moyenne';
        }

        select.addEventListener('change', refresh);
        refresh();
      });
    </script>
{% endblock %}
", "theme/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\theme\\new.html.twig");
    }
}
