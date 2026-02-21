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

/* question/admin/question/by_theme.html.twig */
class __TwigTemplate_414acaa4bcd3092f98efefa2d6c25cac extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/admin/question/by_theme.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/admin/question/by_theme.html.twig"));

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

        yield "Questions - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
        yield "<div class=\"wrap\">

  <section class=\"page-header\">
    <div class=\"page-title\">
      <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_index");
        yield "\" class=\"btn ghost\">
        Retour aux themes
      </a>

      <h1>
        Questions
        <span style=\"opacity:.5;font-weight:600\">- ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 16, $this->source); })()), "nom", [], "any", false, false, false, 16), "html", null, true);
        yield "</span>
      </h1>

      <div class=\"meta-row\">
        <span class=\"badge ";
        // line 20
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 20, $this->source); })()), "actif", [], "any", false, false, false, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("inactive"));
        yield "\">
          ";
        // line 21
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 21, $this->source); })()), "actif", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Actif") : ("Inactif"));
        yield "
        </span>

        <span class=\"priority-chip\">
          <i class=\"fa-solid fa-flag\"></i>
          <em>P";
        // line 26
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "priorite", [], "any", true, true, false, 26) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 26, $this->source); })()), "priorite", [], "any", false, false, false, 26)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 26, $this->source); })()), "priorite", [], "any", false, false, false, 26), "html", null, true)) : (2));
        yield "</em>
          <small class=\"priority-stars\" aria-label=\"Priorite ";
        // line 27
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "priorite", [], "any", true, true, false, 27) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 27, $this->source); })()), "priorite", [], "any", false, false, false, 27)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 27, $this->source); })()), "priorite", [], "any", false, false, false, 27), "html", null, true)) : (2));
        yield " sur 5\">
            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 29
            yield "              <i class=\"fa-star ";
            yield ((($context["i"] <= (((CoreExtension::getAttribute($this->env, $this->source, ($context["theme"] ?? null), "priorite", [], "any", true, true, false, 29) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 29, $this->source); })()), "priorite", [], "any", false, false, false, 29)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 29, $this->source); })()), "priorite", [], "any", false, false, false, 29)) : (2)))) ? ("fa-solid") : ("fa-regular"));
            yield "\"></i>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        yield "          </small>
        </span>
      </div>

      ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 35, $this->source); })()), "descriptionQ", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "        <p class=\"description_q\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 36, $this->source); })()), "descriptionQ", [], "any", false, false, false, 36), "html", null, true);
            yield "</p>
      ";
        }
        // line 38
        yield "    </div>

    <div class=\"actions\">
      <a href=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 41, $this->source); })()), "idT", [], "any", false, false, false, 41)]), "html", null, true);
        yield "\" class=\"btn primary\">
        Ajouter une question
      </a>

      <a href=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_answer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 45, $this->source); })()), "idT", [], "any", false, false, false, 45)]), "html", null, true);
        yield "\" class=\"btn secondary\">
        Voir cote utilisateur
      </a>
    </div>
  </section>

  <section class=\"questions-grid\">

    ";
        // line 53
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 53, $this->source); })()))) {
            // line 54
            yield "      <div class=\"empty-state\">
        <i class=\"fa-regular fa-circle-question\"></i>
        <h3>Aucune question</h3>
        <p>Ce theme ne contient encore aucune question.</p>
      </div>
    ";
        } else {
            // line 60
            yield "
      <div class=\"questions-grid\">
        ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 62, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                // line 63
                yield "          <div class=\"question-card\">

            <div class=\"question-header\">
              <span class=\"status ";
                // line 66
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "actif", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("inactive"));
                yield "\">
                ";
                // line 67
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "actif", [], "any", false, false, false, 67)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Active") : ("Inactive"));
                yield "
              </span>

              <div class=\"meta\">
                <span>
                  <i class=\"fa-solid fa-tag\"></i>
                  ";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "type", [], "any", false, false, false, 73), "html", null, true);
                yield "
                </span>

                <span>
                  <i class=\"fa-solid fa-clock\"></i>
                  ";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "frequence", [], "any", false, false, false, 78), "html", null, true);
                yield "
                </span>
              </div>
            </div>

            <div class=\"question-body\">
              <p>";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "texte", [], "any", false, false, false, 84), "html", null, true);
                yield "</p>
            </div>

            <div class=\"question-footer\">
              <div class=\"extra\">
                ";
                // line 89
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "unite", [], "any", false, false, false, 89)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 90
                    yield "                  <span>
                    <i class=\"fa-solid fa-ruler\"></i>
                    ";
                    // line 92
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "unite", [], "any", false, false, false, 92), "html", null, true);
                    yield "
                  </span>
                ";
                }
                // line 95
                yield "
                ";
                // line 96
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "valeurIdeale", [], "any", false, false, false, 96)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 97
                    yield "                  <span>
                    ";
                    // line 98
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "valeurIdeale", [], "any", false, false, false, 98), "html", null, true);
                    yield "
                  </span>
                ";
                }
                // line 101
                yield "              </div>

              <div class=\"actions\">
                <a href=\"";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 104)]), "html", null, true);
                yield "\" class=\"btn small\">
                  Modifier
                </a>

                <form method=\"post\"
                      action=\"";
                // line 109
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 109)]), "html", null, true);
                yield "\"
                      onsubmit=\"return confirm('Supprimer cette question ?')\">
                  <input type=\"hidden\"
                         name=\"_token\"
                         value=\"";
                // line 113
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 113))), "html", null, true);
                yield "\">
                  <button class=\"btn danger small\">
                    Supprimer
                  </button>
                </form>
              </div>
            </div>

          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['question'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            yield "      </div>

    ";
        }
        // line 126
        yield "  </section>

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
        return "question/admin/question/by_theme.html.twig";
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
        return array (  321 => 126,  316 => 123,  300 => 113,  293 => 109,  285 => 104,  280 => 101,  274 => 98,  271 => 97,  269 => 96,  266 => 95,  260 => 92,  256 => 90,  254 => 89,  246 => 84,  237 => 78,  229 => 73,  220 => 67,  216 => 66,  211 => 63,  207 => 62,  203 => 60,  195 => 54,  193 => 53,  182 => 45,  175 => 41,  170 => 38,  164 => 36,  162 => 35,  156 => 31,  147 => 29,  143 => 28,  139 => 27,  135 => 26,  127 => 21,  123 => 20,  116 => 16,  107 => 10,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Questions - {{ theme.nom }}{% endblock %}

{% block body %}
<div class=\"wrap\">

  <section class=\"page-header\">
    <div class=\"page-title\">
      <a href=\"{{ path('app_theme_index') }}\" class=\"btn ghost\">
        Retour aux themes
      </a>

      <h1>
        Questions
        <span style=\"opacity:.5;font-weight:600\">- {{ theme.nom }}</span>
      </h1>

      <div class=\"meta-row\">
        <span class=\"badge {{ theme.actif ? 'active' : 'inactive' }}\">
          {{ theme.actif ? 'Actif' : 'Inactif' }}
        </span>

        <span class=\"priority-chip\">
          <i class=\"fa-solid fa-flag\"></i>
          <em>P{{ theme.priorite ?? 2 }}</em>
          <small class=\"priority-stars\" aria-label=\"Priorite {{ theme.priorite ?? 2 }} sur 5\">
            {% for i in 1..5 %}
              <i class=\"fa-star {{ i <= (theme.priorite ?? 2) ? 'fa-solid' : 'fa-regular' }}\"></i>
            {% endfor %}
          </small>
        </span>
      </div>

      {% if theme.descriptionQ %}
        <p class=\"description_q\">{{ theme.descriptionQ }}</p>
      {% endif %}
    </div>

    <div class=\"actions\">
      <a href=\"{{ path('app_question_new', { id: theme.idT }) }}\" class=\"btn primary\">
        Ajouter une question
      </a>

      <a href=\"{{ path('app_theme_answer', { id: theme.idT }) }}\" class=\"btn secondary\">
        Voir cote utilisateur
      </a>
    </div>
  </section>

  <section class=\"questions-grid\">

    {% if questions is empty %}
      <div class=\"empty-state\">
        <i class=\"fa-regular fa-circle-question\"></i>
        <h3>Aucune question</h3>
        <p>Ce theme ne contient encore aucune question.</p>
      </div>
    {% else %}

      <div class=\"questions-grid\">
        {% for question in questions %}
          <div class=\"question-card\">

            <div class=\"question-header\">
              <span class=\"status {{ question.actif ? 'active' : 'inactive' }}\">
                {{ question.actif ? 'Active' : 'Inactive' }}
              </span>

              <div class=\"meta\">
                <span>
                  <i class=\"fa-solid fa-tag\"></i>
                  {{ question.type }}
                </span>

                <span>
                  <i class=\"fa-solid fa-clock\"></i>
                  {{ question.frequence }}
                </span>
              </div>
            </div>

            <div class=\"question-body\">
              <p>{{ question.texte }}</p>
            </div>

            <div class=\"question-footer\">
              <div class=\"extra\">
                {% if question.unite %}
                  <span>
                    <i class=\"fa-solid fa-ruler\"></i>
                    {{ question.unite }}
                  </span>
                {% endif %}

                {% if question.valeurIdeale %}
                  <span>
                    {{ question.valeurIdeale }}
                  </span>
                {% endif %}
              </div>

              <div class=\"actions\">
                <a href=\"{{ path('app_question_edit', { id: question.id }) }}\" class=\"btn small\">
                  Modifier
                </a>

                <form method=\"post\"
                      action=\"{{ path('app_question_delete', { id: question.id }) }}\"
                      onsubmit=\"return confirm('Supprimer cette question ?')\">
                  <input type=\"hidden\"
                         name=\"_token\"
                         value=\"{{ csrf_token('delete' ~ question.id) }}\">
                  <button class=\"btn danger small\">
                    Supprimer
                  </button>
                </form>
              </div>
            </div>

          </div>
        {% endfor %}
      </div>

    {% endif %}
  </section>

</div>
{% endblock %}

", "question/admin/question/by_theme.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\question\\admin\\question\\by_theme.html.twig");
    }
}
