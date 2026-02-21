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

/* conscience/_themes_list.html.twig */
class __TwigTemplate_0d624a36b704956076afac3ccf2db249 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conscience/_themes_list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conscience/_themes_list.html.twig"));

        // line 1
        yield "﻿";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 1, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 2
            yield "    ";
            $context["pr"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 2) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 2)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 2)) : (2));
            // line 3
            yield "    ";
            $context["prClass"] = ((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 3, $this->source); })()) >= 4)) ? ("critical") : (((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 3, $this->source); })()) == 3)) ? ("high") : (((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 3, $this->source); })()) == 2)) ? ("medium") : ("low"))))));
            // line 4
            yield "    ";
            $context["prLabel"] = ((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 4, $this->source); })()) >= 4)) ? ("Critique") : (((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 4, $this->source); })()) == 3)) ? ("Elevee") : (((((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 4, $this->source); })()) == 2)) ? ("Moyenne") : ("Basse"))))));
            // line 5
            yield "
    <article class=\"theme-card conscience-theme-card\">
        <div class=\"conscience-card-top\">
            <div class=\"conscience-card-main\">
                <div class=\"conscience-theme-icon\" style=\"--theme-color: ";
            // line 9
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", false, false, false, 9), "#8b5cf6")) : ("#8b5cf6")), "html", null, true);
            yield ";\">
                    ";
            // line 10
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 10) && (is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 10)) && is_string($_v1 = "fa") && str_starts_with($_v0, $_v1)))) {
                // line 11
                yield "                        <i class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 11), "html", null, true);
                yield "\"></i>
                    ";
            } else {
                // line 13
                yield "                        ";
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 13), "<i class=\"fa-solid fa-brain\"></i>")) : ("<i class=\"fa-solid fa-brain\"></i>"));
                yield "
                    ";
            }
            // line 15
            yield "                </div>
                <div class=\"conscience-theme-info\">
                    <h3>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "nom", [], "any", false, false, false, 17), "html", null, true);
            yield "</h3>
                    <span>";
            // line 18
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "createdAt", [], "any", false, false, false, 18), "d/m/Y"), "html", null, true);
            yield "</span>
                </div>
            </div>
            <span class=\"theme-status active\">Actif</span>
        </div>

        <p class=\"conscience-theme-text\">
            ";
            // line 25
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 25), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "descriptionQ", [], "any", true, true, false, 25) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "descriptionQ", [], "any", false, false, false, 25)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "descriptionQ", [], "any", false, false, false, 25), "html", null, true)) : ("Participez a ce theme pour ameliorer votre conscience."))));
            yield "
        </p>

        <div class=\"conscience-card-bottom\">
            <div class=\"conscience-meta\">
                <span class=\"conscience-meta-pill\">
                    <i class=\"fa-solid fa-circle-question\"></i>
                    <strong>";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "questions", [], "any", false, false, false, 32)), "html", null, true);
            yield "</strong> q.
                </span>
                <span class=\"conscience-meta-pill conscience-priority ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["prClass"]) || array_key_exists("prClass", $context) ? $context["prClass"] : (function () { throw new RuntimeError('Variable "prClass" does not exist.', 34, $this->source); })()), "html", null, true);
            yield "\">
                    <i class=\"fa-solid fa-flag\"></i>
                    Priorite <strong>P";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["pr"]) || array_key_exists("pr", $context) ? $context["pr"] : (function () { throw new RuntimeError('Variable "pr" does not exist.', 36, $this->source); })()), "html", null, true);
            yield "</strong>
                    <em>";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["prLabel"]) || array_key_exists("prLabel", $context) ? $context["prLabel"] : (function () { throw new RuntimeError('Variable "prLabel" does not exist.', 37, $this->source); })()), "html", null, true);
            yield "</em>
                </span>
            </div>

            <div class=\"conscience-actions\">
                <a href=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_answer", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 42)]), "html", null, true);
            yield "\" class=\"conscience-action start\" title=\"Repondre\">
                    <i class=\"fa-solid fa-play\"></i>
                </a>
                <a href=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_rapport", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 45)]), "html", null, true);
            yield "\" class=\"conscience-action\" title=\"Rapport\">
                    <i class=\"fa-solid fa-chart-simple\"></i>
                </a>
                ";
            // line 48
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 49
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 49)]), "html", null, true);
                yield "\" class=\"conscience-action manage\" title=\"Gerer\">
                        <i class=\"fa-solid fa-list-check\"></i>
                    </a>
                ";
            }
            // line 53
            yield "            </div>
        </div>
    </article>
";
            $context['_iterated'] = true;
        }
        // line 56
        if (!$context['_iterated']) {
            // line 57
            yield "    <div style=\"grid-column: 1/-1; text-align: center; padding: 40px; background: white; border-radius: 20px;\">
        <p>Aucun theme trouve.</p>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['theme'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "conscience/_themes_list.html.twig";
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
        return array (  168 => 57,  166 => 56,  159 => 53,  151 => 49,  149 => 48,  143 => 45,  137 => 42,  129 => 37,  125 => 36,  120 => 34,  115 => 32,  105 => 25,  95 => 18,  91 => 17,  87 => 15,  81 => 13,  75 => 11,  73 => 10,  69 => 9,  63 => 5,  60 => 4,  57 => 3,  54 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% for theme in themes %}
    {% set pr = theme.priorite ?? 2 %}
    {% set prClass = pr >= 4 ? 'critical' : (pr == 3 ? 'high' : (pr == 2 ? 'medium' : 'low')) %}
    {% set prLabel = pr >= 4 ? 'Critique' : (pr == 3 ? 'Elevee' : (pr == 2 ? 'Moyenne' : 'Basse')) %}

    <article class=\"theme-card conscience-theme-card\">
        <div class=\"conscience-card-top\">
            <div class=\"conscience-card-main\">
                <div class=\"conscience-theme-icon\" style=\"--theme-color: {{ theme.couleur|default('#8b5cf6') }};\">
                    {% if theme.icone and (theme.icone starts with 'fa') %}
                        <i class=\"{{ theme.icone }}\"></i>
                    {% else %}
                        {{ theme.icone|default('<i class=\"fa-solid fa-brain\"></i>')|raw }}
                    {% endif %}
                </div>
                <div class=\"conscience-theme-info\">
                    <h3>{{ theme.nom }}</h3>
                    <span>{{ theme.createdAt|date('d/m/Y') }}</span>
                </div>
            </div>
            <span class=\"theme-status active\">Actif</span>
        </div>

        <p class=\"conscience-theme-text\">
            {{ theme.intention ?? theme.descriptionQ ?? 'Participez a ce theme pour ameliorer votre conscience.' }}
        </p>

        <div class=\"conscience-card-bottom\">
            <div class=\"conscience-meta\">
                <span class=\"conscience-meta-pill\">
                    <i class=\"fa-solid fa-circle-question\"></i>
                    <strong>{{ theme.questions|length }}</strong> q.
                </span>
                <span class=\"conscience-meta-pill conscience-priority {{ prClass }}\">
                    <i class=\"fa-solid fa-flag\"></i>
                    Priorite <strong>P{{ pr }}</strong>
                    <em>{{ prLabel }}</em>
                </span>
            </div>

            <div class=\"conscience-actions\">
                <a href=\"{{ path('app_theme_answer', { id: theme.idT }) }}\" class=\"conscience-action start\" title=\"Repondre\">
                    <i class=\"fa-solid fa-play\"></i>
                </a>
                <a href=\"{{ path('app_theme_rapport', { id: theme.idT }) }}\" class=\"conscience-action\" title=\"Rapport\">
                    <i class=\"fa-solid fa-chart-simple\"></i>
                </a>
                {% if is_granted('ROLE_ADMIN') %}
                    <a href=\"{{ path('app_questions_by_theme', { id: theme.idT }) }}\" class=\"conscience-action manage\" title=\"Gerer\">
                        <i class=\"fa-solid fa-list-check\"></i>
                    </a>
                {% endif %}
            </div>
        </div>
    </article>
{% else %}
    <div style=\"grid-column: 1/-1; text-align: center; padding: 40px; background: white; border-radius: 20px;\">
        <p>Aucun theme trouve.</p>
    </div>
{% endfor %}
", "conscience/_themes_list.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\conscience\\_themes_list.html.twig");
    }
}
