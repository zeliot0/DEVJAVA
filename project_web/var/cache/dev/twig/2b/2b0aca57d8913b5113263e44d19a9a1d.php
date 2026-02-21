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

/* theme/index.html.twig */
class __TwigTemplate_8741836e3cf776f0106dc21f62a1cf32 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/index.html.twig"));

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

        yield "Theme Management — NEXA";
        
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
<!-- ================= HEADER ================= -->
<section class=\"page-header\">

    <div class=\"page-header-top\">

        <div class=\"page-title\">
            <h1>Theme Management</h1>
            <p>Manage themes, questions and priorities</p>
        </div>

        <div class=\"page-actions\">

            <!-- SEARCH -->
            <form method=\"get\"
                  action=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\"
                  class=\"search-form\"
                  onsubmit=\"return false;\">
                <div class=\"search-wrapper\">
                    <i class=\"fa-solid fa-magnifying-glass\"></i>
                    <input
                        type=\"text\"
                        name=\"q\"
                        value=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 29, $this->source); })()), "html", null, true);
        yield "\"
                        placeholder=\"Search theme...\"
                        class=\"search-input\"
                        autocomplete=\"off\"
                    >
                </div>
            </form>

            <!-- NEW THEME -->
            <a href=\"";
        // line 38
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_new");
        yield "\" class=\"btn-cta\">
                <i class=\"fa-solid fa-plus\"></i>
                New theme
            </a>

            <a href=\"";
        // line 43
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" class=\"btn-cta\" style=\"background: transparent; color: var(--text); border: 1px solid var(--border);\">
                <i class=\"fa-solid fa-brain\"></i>
                Conscience
            </a>

        </div>
    </div>

</section>

<!-- ================= KPI ================= -->
<section class=\"kpi-grid\">
    <div class=\"kpi-card\">
        <span>Total themes</span>
        <strong>";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 57, $this->source); })())), "html", null, true);
        yield "</strong>
    </div>

    <div class=\"kpi-card\">
        <span>Active themes</span>
        <strong>";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 62, $this->source); })()), function ($__t__) use ($context, $macros) { $context["t"] = $__t__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["t"]) || array_key_exists("t", $context) ? $context["t"] : (function () { throw new RuntimeError('Variable "t" does not exist.', 62, $this->source); })()), "actif", [], "any", false, false, false, 62); })), "html", null, true);
        yield "</strong>
    </div>
</section>

<!-- ================= THEMES ================= -->
<section class=\"themes-grid\" id=\"themes-container\">

    ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 69, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 70
            yield "        <article class=\"theme-card\">

            <div class=\"theme-card-header\">
                <div class=\"theme-left\">
                    <div class=\"theme-icon\"
                         style=\"--theme-accent: ";
            // line 75
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", false, false, false, 75)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", false, false, false, 75), "html", null, true)) : ("#6366f1"));
            yield "\">
                        ";
            // line 76
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 76) && (is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 76)) && is_string($_v1 = "fa") && str_starts_with($_v0, $_v1)))) {
                // line 77
                yield "                            <i class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 77), "html", null, true);
                yield "\"></i>
                        ";
            } else {
                // line 79
                yield "                            ";
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 79), "")) : (""));
                yield "
                        ";
            }
            // line 81
            yield "                    </div>

                    <div class=\"theme-info\">
                        <h3>";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "nom", [], "any", false, false, false, 84), "html", null, true);
            yield "</h3>
                        <span>";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "createdAt", [], "any", false, false, false, 85), "d M Y"), "html", null, true);
            yield "</span>
                    </div>
                </div>

                <span class=\"theme-status ";
            // line 89
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "actif", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("inactive"));
            yield "\">
                    ";
            // line 90
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "actif", [], "any", false, false, false, 90)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Active") : ("Inactive"));
            yield "
                </span>
            </div>

            <div class=\"theme-card-body\">
                <p>";
            // line 95
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", true, true, false, 95) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 95)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 95), "html", null, true)) : ("No description provided."));
            yield "</p>
            </div>

            <div class=\"theme-card-footer\">
                <div class=\"theme-stats\">
                    <span>
                        <i class=\"fa-solid fa-circle-question\"></i>
                        ";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "questions", [], "any", false, false, false, 102)), "html", null, true);
            yield "
                    </span>
                    <span class=\"priority-chip\">
                        <i class=\"fa-solid fa-flag\"></i>
                        <em>P";
            // line 106
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 106) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 106)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 106), "html", null, true)) : (2));
            yield "</em>
                        <small class=\"priority-stars\" aria-label=\"Priorité ";
            // line 107
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 107) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 107)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 107), "html", null, true)) : (2));
            yield " sur 3\">
                            ";
            // line 108
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 109
                yield "                                <i class=\"fa-star ";
                yield ((($context["i"] <= (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 109) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 109)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 109)) : (2)))) ? ("fa-solid") : ("fa-regular"));
                yield "\"></i>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            yield "                        </small>
                    </span>
                </div>

                <div class=\"theme-actions\">
                    <!-- VIEW QUESTIONS -->
                    <a href=\"";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 117)]), "html", null, true);
            yield "\">
                        <i class=\"fa-solid fa-eye\"></i>
                    </a>

                    <!-- EDIT -->
                    <a href=\"";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 122)]), "html", null, true);
            yield "\">
                        <i class=\"fa-solid fa-pen\"></i>
                    </a>

                    <!-- DELETE -->
                    <form method=\"post\"
                          action=\"";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 128)]), "html", null, true);
            yield "\"
                          onsubmit=\"return confirm('Delete this theme?')\">
                        <input type=\"hidden\"
                               name=\"_token\"
                               value=\"";
            // line 132
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 132))), "html", null, true);
            yield "\">
                        <button type=\"submit\">
                            <i class=\"fa-solid fa-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>

        </article>
    ";
            $context['_iterated'] = true;
        }
        // line 141
        if (!$context['_iterated']) {
            // line 142
            yield "        <div class=\"empty-state\">
            No themes found.
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        yield "
</section>

<!-- ================= JS : SEARCH ================= -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.search-input');
    const container = document.getElementById('themes-container');

    let timeout = null;

    input.addEventListener('input', () => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            fetch(`";
        // line 161
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "?q=` + encodeURIComponent(input.value), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html;
            });
        }, 250);
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
        return "theme/index.html.twig";
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
        return array (  353 => 161,  336 => 146,  327 => 142,  325 => 141,  311 => 132,  304 => 128,  295 => 122,  287 => 117,  279 => 111,  270 => 109,  266 => 108,  262 => 107,  258 => 106,  251 => 102,  241 => 95,  233 => 90,  229 => 89,  222 => 85,  218 => 84,  213 => 81,  207 => 79,  201 => 77,  199 => 76,  195 => 75,  188 => 70,  183 => 69,  173 => 62,  165 => 57,  148 => 43,  140 => 38,  128 => 29,  117 => 21,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Theme Management — NEXA{% endblock %}

{% block body %}

<!-- ================= HEADER ================= -->
<section class=\"page-header\">

    <div class=\"page-header-top\">

        <div class=\"page-title\">
            <h1>Theme Management</h1>
            <p>Manage themes, questions and priorities</p>
        </div>

        <div class=\"page-actions\">

            <!-- SEARCH -->
            <form method=\"get\"
                  action=\"{{ path('app_theme_index') }}\"
                  class=\"search-form\"
                  onsubmit=\"return false;\">
                <div class=\"search-wrapper\">
                    <i class=\"fa-solid fa-magnifying-glass\"></i>
                    <input
                        type=\"text\"
                        name=\"q\"
                        value=\"{{ search }}\"
                        placeholder=\"Search theme...\"
                        class=\"search-input\"
                        autocomplete=\"off\"
                    >
                </div>
            </form>

            <!-- NEW THEME -->
            <a href=\"{{ path('app_theme_new') }}\" class=\"btn-cta\">
                <i class=\"fa-solid fa-plus\"></i>
                New theme
            </a>

            <a href=\"{{ path('app_conscience_index') }}\" class=\"btn-cta\" style=\"background: transparent; color: var(--text); border: 1px solid var(--border);\">
                <i class=\"fa-solid fa-brain\"></i>
                Conscience
            </a>

        </div>
    </div>

</section>

<!-- ================= KPI ================= -->
<section class=\"kpi-grid\">
    <div class=\"kpi-card\">
        <span>Total themes</span>
        <strong>{{ themes|length }}</strong>
    </div>

    <div class=\"kpi-card\">
        <span>Active themes</span>
        <strong>{{ themes|filter(t => t.actif)|length }}</strong>
    </div>
</section>

<!-- ================= THEMES ================= -->
<section class=\"themes-grid\" id=\"themes-container\">

    {% for theme in themes %}
        <article class=\"theme-card\">

            <div class=\"theme-card-header\">
                <div class=\"theme-left\">
                    <div class=\"theme-icon\"
                         style=\"--theme-accent: {{ theme.couleur ?: '#6366f1' }}\">
                        {% if theme.icone and (theme.icone starts with 'fa') %}
                            <i class=\"{{ theme.icone }}\"></i>
                        {% else %}
                            {{ theme.icone|default('')|raw }}
                        {% endif %}
                    </div>

                    <div class=\"theme-info\">
                        <h3>{{ theme.nom }}</h3>
                        <span>{{ theme.createdAt|date('d M Y') }}</span>
                    </div>
                </div>

                <span class=\"theme-status {{ theme.actif ? 'active' : 'inactive' }}\">
                    {{ theme.actif ? 'Active' : 'Inactive' }}
                </span>
            </div>

            <div class=\"theme-card-body\">
                <p>{{ theme.intention ?? 'No description provided.' }}</p>
            </div>

            <div class=\"theme-card-footer\">
                <div class=\"theme-stats\">
                    <span>
                        <i class=\"fa-solid fa-circle-question\"></i>
                        {{ theme.questions|length }}
                    </span>
                    <span class=\"priority-chip\">
                        <i class=\"fa-solid fa-flag\"></i>
                        <em>P{{ theme.priorite ?? 2 }}</em>
                        <small class=\"priority-stars\" aria-label=\"Priorité {{ theme.priorite ?? 2 }} sur 3\">
                            {% for i in 1..3 %}
                                <i class=\"fa-star {{ i <= (theme.priorite ?? 2) ? 'fa-solid' : 'fa-regular' }}\"></i>
                            {% endfor %}
                        </small>
                    </span>
                </div>

                <div class=\"theme-actions\">
                    <!-- VIEW QUESTIONS -->
                    <a href=\"{{ path('app_questions_by_theme', { id: theme.idT }) }}\">
                        <i class=\"fa-solid fa-eye\"></i>
                    </a>

                    <!-- EDIT -->
                    <a href=\"{{ path('app_theme_edit', { id: theme.idT }) }}\">
                        <i class=\"fa-solid fa-pen\"></i>
                    </a>

                    <!-- DELETE -->
                    <form method=\"post\"
                          action=\"{{ path('app_theme_delete', { id: theme.idT }) }}\"
                          onsubmit=\"return confirm('Delete this theme?')\">
                        <input type=\"hidden\"
                               name=\"_token\"
                               value=\"{{ csrf_token('delete' ~ theme.idT) }}\">
                        <button type=\"submit\">
                            <i class=\"fa-solid fa-trash\"></i>
                        </button>
                    </form>
                </div>
            </div>

        </article>
    {% else %}
        <div class=\"empty-state\">
            No themes found.
        </div>
    {% endfor %}

</section>

<!-- ================= JS : SEARCH ================= -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector('.search-input');
    const container = document.getElementById('themes-container');

    let timeout = null;

    input.addEventListener('input', () => {
        clearTimeout(timeout);

        timeout = setTimeout(() => {
            fetch(`{{ path('app_theme_index') }}?q=` + encodeURIComponent(input.value), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                container.innerHTML = html;
            });
        }, 250);
    });
});
</script>

{% endblock %}

", "theme/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\theme\\index.html.twig");
    }
}
