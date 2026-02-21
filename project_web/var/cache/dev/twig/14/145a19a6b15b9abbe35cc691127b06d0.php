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

/* conscience/index.html.twig */
class __TwigTemplate_04f6212cf07ea475b23038f1a4879137 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conscience/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conscience/index.html.twig"));

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

        yield "Conscience - NEXA";
        
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
        yield "<div class=\"page-header\">
    <div>
        <h1>Conscience</h1>
        <p>Choisissez un thème actif et répondez aux questions du jour.</p>
    </div>

    <div class=\"page-actions\">
        ";
        // line 13
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_new");
            yield "\" class=\"btn primary\">
                <i class=\"fa-solid fa-plus\"></i> Nouveau thème
            </a>
            <a href=\"";
            // line 17
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
            yield "\" class=\"btn\">
                <i class=\"fa-solid fa-sliders\"></i> Gestion thèmes
            </a>
        ";
        }
        // line 21
        yield "    </div>
</div>

<form method=\"get\" action=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" class=\"search-bar conscience-toolbar\">
    <div class=\"conscience-search-box\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" value=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 27, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher un thème...\" autocomplete=\"off\">
        <button type=\"button\" class=\"conscience-voice-btn\" id=\"conscienceVoiceBtn\" title=\"Recherche vocale\">
            <i class=\"fa-solid fa-microphone\"></i>
        </button>
    </div>

    <div class=\"conscience-filter-box\">
        <label>Trier par :</label>
        <select name=\"sort\">
            <option value=\"newest\" ";
        // line 36
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 36, $this->source); })()), "newest")) : ("newest")) == "newest")) ? ("selected") : (""));
        yield ">Plus récents</option>
            <option value=\"priority_desc\" ";
        // line 37
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 37, $this->source); })()), "newest")) : ("newest")) == "priority_desc")) ? ("selected") : (""));
        yield ">Priorité haute</option>
            <option value=\"priority_asc\" ";
        // line 38
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 38, $this->source); })()), "newest")) : ("newest")) == "priority_asc")) ? ("selected") : (""));
        yield ">Priorité basse</option>
            <option value=\"questions_desc\" ";
        // line 39
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 39, $this->source); })()), "newest")) : ("newest")) == "questions_desc")) ? ("selected") : (""));
        yield ">Plus de questions</option>
        </select>
    </div>
</form>

<section class=\"kpi-grid\">
    <div class=\"kpi-card\">
        <span>Thèmes actifs</span>
        <strong>";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 47, $this->source); })())), "html", null, true);
        yield "</strong>
    </div>

    <div class=\"kpi-card\">
        <span>Questions à traiter</span>
        <strong>
            ";
        // line 53
        $context["totalQuestions"] = 0;
        // line 54
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 54, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 55
            yield "                ";
            $context["totalQuestions"] = ((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 55, $this->source); })()) + Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "questions", [], "any", false, false, false, 55)));
            // line 56
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        yield "            ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalQuestions"]) || array_key_exists("totalQuestions", $context) ? $context["totalQuestions"] : (function () { throw new RuntimeError('Variable "totalQuestions" does not exist.', 57, $this->source); })()), "html", null, true);
        yield "
        </strong>
    </div>
</section>

<section class=\"themes-grid\" id=\"themes-container\">
    ";
        // line 63
        yield from $this->load("conscience/_themes_list.html.twig", 63)->unwrap()->yield(CoreExtension::merge($context, ["themes" => (isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 63, $this->source); })())]));
        // line 64
        yield "</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.conscience-search-box input[name=\"q\"]');
    const sortSelect = document.querySelector('.conscience-filter-box select[name=\"sort\"]');
    const voiceBtn = document.getElementById('conscienceVoiceBtn');
    const container = document.getElementById('themes-container');
    if (!input || !container) return;

    let timeout = null;
    const buildUrl = () => {
        const q = encodeURIComponent(input.value || '');
        const s = encodeURIComponent(sortSelect ? sortSelect.value : 'newest');
        return `";
        // line 78
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "?q=\${q}&sort=\${s}`;
    };

    const refreshThemes = () => {
        fetch(buildUrl(), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
        });
    };

    input.addEventListener('input', () => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            refreshThemes();
        }, 250);
    });

    if (sortSelect) {
        sortSelect.addEventListener('change', refreshThemes);
    }

    if (voiceBtn) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            voiceBtn.style.display = 'none';
        } else {
            const recognition = new SpeechRecognition();
            recognition.lang = document.documentElement.lang === 'en' ? 'en-US' : 'fr-FR';
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            voiceBtn.addEventListener('click', () => {
                recognition.start();
            });

            recognition.addEventListener('result', (event) => {
                const transcript = event.results?.[0]?.[0]?.transcript || '';
                if (!transcript) return;
                input.value = transcript;
                refreshThemes();
            });
        }
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
        return "conscience/index.html.twig";
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
        return array (  224 => 78,  208 => 64,  206 => 63,  196 => 57,  190 => 56,  187 => 55,  182 => 54,  180 => 53,  171 => 47,  160 => 39,  156 => 38,  152 => 37,  148 => 36,  136 => 27,  130 => 24,  125 => 21,  118 => 17,  111 => 14,  109 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Conscience - NEXA{% endblock %}

{% block body %}
<div class=\"page-header\">
    <div>
        <h1>Conscience</h1>
        <p>Choisissez un thème actif et répondez aux questions du jour.</p>
    </div>

    <div class=\"page-actions\">
        {% if is_granted('ROLE_ADMIN') %}
            <a href=\"{{ path('app_theme_new') }}\" class=\"btn primary\">
                <i class=\"fa-solid fa-plus\"></i> Nouveau thème
            </a>
            <a href=\"{{ path('app_theme_index') }}\" class=\"btn\">
                <i class=\"fa-solid fa-sliders\"></i> Gestion thèmes
            </a>
        {% endif %}
    </div>
</div>

<form method=\"get\" action=\"{{ path('app_conscience_index') }}\" class=\"search-bar conscience-toolbar\">
    <div class=\"conscience-search-box\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" value=\"{{ search }}\" placeholder=\"Rechercher un thème...\" autocomplete=\"off\">
        <button type=\"button\" class=\"conscience-voice-btn\" id=\"conscienceVoiceBtn\" title=\"Recherche vocale\">
            <i class=\"fa-solid fa-microphone\"></i>
        </button>
    </div>

    <div class=\"conscience-filter-box\">
        <label>Trier par :</label>
        <select name=\"sort\">
            <option value=\"newest\" {{ (sort|default('newest')) == 'newest' ? 'selected' : '' }}>Plus récents</option>
            <option value=\"priority_desc\" {{ (sort|default('newest')) == 'priority_desc' ? 'selected' : '' }}>Priorité haute</option>
            <option value=\"priority_asc\" {{ (sort|default('newest')) == 'priority_asc' ? 'selected' : '' }}>Priorité basse</option>
            <option value=\"questions_desc\" {{ (sort|default('newest')) == 'questions_desc' ? 'selected' : '' }}>Plus de questions</option>
        </select>
    </div>
</form>

<section class=\"kpi-grid\">
    <div class=\"kpi-card\">
        <span>Thèmes actifs</span>
        <strong>{{ themes|length }}</strong>
    </div>

    <div class=\"kpi-card\">
        <span>Questions à traiter</span>
        <strong>
            {% set totalQuestions = 0 %}
            {% for theme in themes %}
                {% set totalQuestions = totalQuestions + (theme.questions|length) %}
            {% endfor %}
            {{ totalQuestions }}
        </strong>
    </div>
</section>

<section class=\"themes-grid\" id=\"themes-container\">
    {% include 'conscience/_themes_list.html.twig' with { themes: themes } %}
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.conscience-search-box input[name=\"q\"]');
    const sortSelect = document.querySelector('.conscience-filter-box select[name=\"sort\"]');
    const voiceBtn = document.getElementById('conscienceVoiceBtn');
    const container = document.getElementById('themes-container');
    if (!input || !container) return;

    let timeout = null;
    const buildUrl = () => {
        const q = encodeURIComponent(input.value || '');
        const s = encodeURIComponent(sortSelect ? sortSelect.value : 'newest');
        return `{{ path('app_conscience_index') }}?q=\${q}&sort=\${s}`;
    };

    const refreshThemes = () => {
        fetch(buildUrl(), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            container.innerHTML = html;
        });
    };

    input.addEventListener('input', () => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            refreshThemes();
        }, 250);
    });

    if (sortSelect) {
        sortSelect.addEventListener('change', refreshThemes);
    }

    if (voiceBtn) {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            voiceBtn.style.display = 'none';
        } else {
            const recognition = new SpeechRecognition();
            recognition.lang = document.documentElement.lang === 'en' ? 'en-US' : 'fr-FR';
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;

            voiceBtn.addEventListener('click', () => {
                recognition.start();
            });

            recognition.addEventListener('result', (event) => {
                const transcript = event.results?.[0]?.[0]?.transcript || '';
                if (!transcript) return;
                input.value = transcript;
                refreshThemes();
            });
        }
    }
});
</script>
{% endblock %}

", "conscience/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\conscience\\index.html.twig");
    }
}
