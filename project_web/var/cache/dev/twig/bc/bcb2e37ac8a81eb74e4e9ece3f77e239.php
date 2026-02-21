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

/* theme/edit.html.twig */
class __TwigTemplate_a2310ffe41365e197df3dd38e210649e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/edit.html.twig"));

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

        yield "Modifier le thème — NEXA";
        
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
        yield "
<div class=\"page-header\">
    <div>
        <h1>✏️ Modifier le thème</h1>
        <p>Mettre à jour les informations du thème</p>
    </div>

    <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\" class=\"btn\">
        ← Retour à la liste
    </a>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        ";
        // line 21
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

        ";
        // line 24
        yield "        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div>
                    <label class=\"field-label\">Nom du thème</label>
                    ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "nom", [], "any", false, false, false, 30), 'widget', ["attr" => ["class" => "field"]]);
        yield "
                    ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "nom", [], "any", false, false, false, 31), 'errors');
        yield "
                </div>

                <div>
                    <label class=\"field-label\">Priorité</label>
                    <div class=\"priority-control\">
                        ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "priorite", [], "any", false, false, false, 37), 'widget', ["attr" => ["class" => "field priority-select js-priority-select"]]);
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
                    ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "priorite", [], "any", false, false, false, 48), 'errors');
        yield "
                </div>
            </div>

            <div style=\"margin-top:16px\">
                <label class=\"field-label\">Description</label>
                ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "description_q", [], "any", false, false, false, 54), 'widget', ["attr" => ["class" => "field", "rows" => 4]]);
        yield "
                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "description_q", [], "any", false, false, false, 55), 'errors');
        yield "
            </div>
        </div>

        ";
        // line 60
        yield "        <div class=\"form-section\">
            <h3>Apparence</h3>

            <div class=\"icon-color-grid\">
                <div>
                    <label class=\"field-label\">Icône</label>
                    <div class=\"icon-grid\">
                        ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "icone", [], "any", false, false, false, 67));
        foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
            // line 68
            yield "                            <label class=\"icon-option\">
                                ";
            // line 69
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["choice"], 'widget');
            yield "
                                <div class=\"icon-box\">
                                    <i class=\"";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["choice"], "vars", [], "any", false, false, false, 71), "value", [], "any", false, false, false, 71), "html", null, true);
            yield "\"></i>
                                </div>
                            </label>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['choice'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        yield "                    </div>
                    ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), "icone", [], "any", false, false, false, 76), 'errors');
        yield "
                </div>

                <div>
                    <label class=\"field-label\">Couleur</label>
                    ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "couleur", [], "any", false, false, false, 81), 'widget', ["attr" => ["class" => "color-input"]]);
        yield "
                    ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 82, $this->source); })()), "couleur", [], "any", false, false, false, 82), 'errors');
        yield "
                </div>
            </div>
        </div>

        ";
        // line 88
        yield "        <div class=\"form-section\">
            <h3>Statut</h3>
            <label class=\"switch-label\">
                ";
        // line 91
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "actif", [], "any", false, false, false, 91), 'widget');
        yield "
                Activer ce thème
            </label>
        </div>

        ";
        // line 97
        yield "        <div class=\"form-section\">
            <h3>Intention</h3>
            ";
        // line 99
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "intention", [], "any", false, false, false, 99), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "intention", [], "any", false, false, false, 100), 'errors');
        yield "
        </div>

        ";
        // line 104
        yield "        <div class=\"form-actions\">
            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-save\"></i>
                Enregistrer
            </button>

            <a href=\"";
        // line 110
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\" class=\"btn\">
                Annuler
            </a>
        </div>

        ";
        // line 115
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 115, $this->source); })()), 'form_end');
        yield "

    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 122
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

        // line 123
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
        return "theme/edit.html.twig";
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
        return array (  308 => 123,  295 => 122,  278 => 115,  270 => 110,  262 => 104,  256 => 100,  252 => 99,  248 => 97,  240 => 91,  235 => 88,  227 => 82,  223 => 81,  215 => 76,  212 => 75,  202 => 71,  197 => 69,  194 => 68,  190 => 67,  181 => 60,  174 => 55,  170 => 54,  161 => 48,  147 => 37,  138 => 31,  134 => 30,  126 => 24,  121 => 21,  110 => 13,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Modifier le thème — NEXA{% endblock %}

{% block body %}

<div class=\"page-header\">
    <div>
        <h1>✏️ Modifier le thème</h1>
        <p>Mettre à jour les informations du thème</p>
    </div>

    <a href=\"{{ path('app_theme_index') }}\" class=\"btn\">
        ← Retour à la liste
    </a>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        {{ form_start(form, {'attr': {'novalidate': 'novalidate'}}) }}

        {# ================= INFOS ================= #}
        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div>
                    <label class=\"field-label\">Nom du thème</label>
                    {{ form_widget(form.nom, { attr: { class: 'field' } }) }}
                    {{ form_errors(form.nom) }}
                </div>

                <div>
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
                    {{ form_errors(form.priorite) }}
                </div>
            </div>

            <div style=\"margin-top:16px\">
                <label class=\"field-label\">Description</label>
                {{ form_widget(form.description_q, { attr: { class: 'field', rows: 4 } }) }}
                {{ form_errors(form.description_q) }}
            </div>
        </div>

        {# ================= APPARENCE ================= #}
        <div class=\"form-section\">
            <h3>Apparence</h3>

            <div class=\"icon-color-grid\">
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
                    {{ form_errors(form.icone) }}
                </div>

                <div>
                    <label class=\"field-label\">Couleur</label>
                    {{ form_widget(form.couleur, { attr: { class: 'color-input' } }) }}
                    {{ form_errors(form.couleur) }}
                </div>
            </div>
        </div>

        {# ================= STATUT ================= #}
        <div class=\"form-section\">
            <h3>Statut</h3>
            <label class=\"switch-label\">
                {{ form_widget(form.actif) }}
                Activer ce thème
            </label>
        </div>

        {# ================= INTENTION ================= #}
        <div class=\"form-section\">
            <h3>Intention</h3>
            {{ form_widget(form.intention, { attr: { class: 'field' } }) }}
            {{ form_errors(form.intention) }}
        </div>

        {# ================= ACTIONS ================= #}
        <div class=\"form-actions\">
            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-save\"></i>
                Enregistrer
            </button>

            <a href=\"{{ path('app_theme_index') }}\" class=\"btn\">
                Annuler
            </a>
        </div>

        {{ form_end(form) }}

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

", "theme/edit.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\theme\\edit.html.twig");
    }
}
