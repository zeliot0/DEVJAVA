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

/* theme/_themes_list.html.twig */
class __TwigTemplate_9917c7c46ca9e3694b64070d6167b2a9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/_themes_list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/_themes_list.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["themes"]) || array_key_exists("themes", $context) ? $context["themes"] : (function () { throw new RuntimeError('Variable "themes" does not exist.', 1, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 2
            yield "    <article class=\"theme-card\">

        <div class=\"theme-card-header\">
            <div class=\"theme-left\">
                <div class=\"theme-icon\" style=\"--theme-accent: ";
            // line 6
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", false, false, false, 6)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "couleur", [], "any", false, false, false, 6), "html", null, true)) : ("#6366f1"));
            yield "\">
                    ";
            // line 7
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 7) && (is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 7)) && is_string($_v1 = "fa") && str_starts_with($_v0, $_v1)))) {
                // line 8
                yield "                        <i class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 8), "html", null, true);
                yield "\"></i>
                    ";
            } else {
                // line 10
                yield "                        ";
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", true, true, false, 10)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "icone", [], "any", false, false, false, 10), "")) : (""));
                yield "
                    ";
            }
            // line 12
            yield "                </div>


                <div class=\"theme-info\">
                    <h3>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "nom", [], "any", false, false, false, 16), "html", null, true);
            yield "</h3>
                    <span>";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "createdAt", [], "any", false, false, false, 17), "d M Y"), "html", null, true);
            yield "</span>
                </div>
            </div>

            <span class=\"theme-status ";
            // line 21
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "actif", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("inactive"));
            yield "\">
                ";
            // line 22
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "actif", [], "any", false, false, false, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Active") : ("Inactive"));
            yield "
            </span>
        </div>

        <div class=\"theme-card-body\">
            <p>";
            // line 27
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", true, true, false, 27) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 27)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "intention", [], "any", false, false, false, 27), "html", null, true)) : ("No description_q provided."));
            yield "</p>
        </div>

            <div class=\"theme-card-footer\">
            <div class=\"theme-stats\">
                <span>
                    <i class=\"fa-solid fa-circle-question\"></i>
                    ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "questions", [], "any", false, false, false, 34)), "html", null, true);
            yield "
                </span>
                <span class=\"priority-chip\">
                    <i class=\"fa-solid fa-flag\"></i>
                    <em>P";
            // line 38
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 38) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 38)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 38), "html", null, true)) : (2));
            yield "</em>
                    <small class=\"priority-stars\" aria-label=\"Priorité ";
            // line 39
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 39) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 39)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 39), "html", null, true)) : (2));
            yield " sur 3\">
                        ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 41
                yield "                            <i class=\"fa-star ";
                yield ((($context["i"] <= (((CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", true, true, false, 41) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 41)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "priorite", [], "any", false, false, false, 41)) : (2)))) ? ("fa-solid") : ("fa-regular"));
                yield "\"></i>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            yield "                    </small>
                </span>
            </div>

            <div class=\"theme-actions\">
                <a href=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 48)]), "html", null, true);
            yield "\">
                    <i class=\"fa-solid fa-eye\"></i>
                </a>

                <a href=\"";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["theme"], "idT", [], "any", false, false, false, 52)]), "html", null, true);
            yield "\">
                    <i class=\"fa-solid fa-pen\"></i>
                </a>
            </div>
        </div>

    </article>
";
            $context['_iterated'] = true;
        }
        // line 59
        if (!$context['_iterated']) {
            // line 60
            yield "    <div class=\"empty-state\">No themes found.</div>
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
        return "theme/_themes_list.html.twig";
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
        return array (  172 => 60,  170 => 59,  158 => 52,  151 => 48,  144 => 43,  135 => 41,  131 => 40,  127 => 39,  123 => 38,  116 => 34,  106 => 27,  98 => 22,  94 => 21,  87 => 17,  83 => 16,  77 => 12,  71 => 10,  65 => 8,  63 => 7,  59 => 6,  53 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% for theme in themes %}
    <article class=\"theme-card\">

        <div class=\"theme-card-header\">
            <div class=\"theme-left\">
                <div class=\"theme-icon\" style=\"--theme-accent: {{ theme.couleur ?: '#6366f1' }}\">
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
            <p>{{ theme.intention ?? 'No description_q provided.' }}</p>
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
                <a href=\"{{ path('app_questions_by_theme', { id: theme.idT }) }}\">
                    <i class=\"fa-solid fa-eye\"></i>
                </a>

                <a href=\"{{ path('app_theme_edit', { id: theme.idT }) }}\">
                    <i class=\"fa-solid fa-pen\"></i>
                </a>
            </div>
        </div>

    </article>
{% else %}
    <div class=\"empty-state\">No themes found.</div>
{% endfor %}
", "theme/_themes_list.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\theme\\_themes_list.html.twig");
    }
}
