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

/* question/user/question/answer_by_theme.html.twig */
class __TwigTemplate_5b30179df44d9015298d9c18029528cd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/user/question/answer_by_theme.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/user/question/answer_by_theme.html.twig"));

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

        yield "Repondre - ";
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
        yield "<div class=\"wrap stepper-wrap modern-answer-wrap\">

  <section class=\"page-header center answer-hero\">
    <div class=\"header-actions\">
      <a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("user_theme_index");
        yield "\" class=\"btn ghost\">
        Retour aux themes
      </a>

      <a href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_rapport", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 14, $this->source); })()), "idT", [], "any", false, false, false, 14)]), "html", null, true);
        yield "\" class=\"btn primary\">
        Voir mon rapport
      </a>
    </div>

    <h1><i class=\"fa-solid fa-clipboard-check\"></i> ";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 19, $this->source); })()), "nom", [], "any", false, false, false, 19), "html", null, true);
        yield "</h1>
    <p class=\"muted\">Merci de repondre aux questions ci-dessous.</p>
  </section>

  <div class=\"stepper-progress modern-progress\">
    <div class=\"bar\">
      <div class=\"bar-fill\" id=\"progressBar\"></div>
    </div>
    <span id=\"progressText\"></span>
  </div>

  <form method=\"post\"
        action=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_answer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 31, $this->source); })()), "idT", [], "any", false, false, false, 31)]), "html", null, true);
        yield "\"
        class=\"answers-form modern-answers-form\"
        id=\"stepperForm\"
        novalidate>

    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 36, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 37
            yield "      ";
            $context["answered"] = CoreExtension::getAttribute($this->env, $this->source, ($context["answers"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 37), [], "array", true, true, false, 37);
            // line 38
            yield "      ";
            $context["response"] = (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["answers"]) || array_key_exists("answers", $context) ? $context["answers"] : (function () { throw new RuntimeError('Variable "answers" does not exist.', 38, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 38), [], "array", false, false, false, 38), "valeur", [], "any", false, false, false, 38)) : (null));
            // line 39
            yield "
      <article class=\"question-step modern-question-step ";
            // line 40
            yield (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 40, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("answered") : (""));
            yield "\"
               data-step=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 41), "html", null, true);
            yield "\">

        <div class=\"question-head\">
          <h3 class=\"question-title\">";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "texte", [], "any", false, false, false, 44), "html", null, true);
            yield "</h3>
          ";
            // line 45
            if ((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 45, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 46
                yield "            <span class=\"badge-done\">Deja repondu</span>
          ";
            }
            // line 48
            yield "        </div>

        ";
            // line 50
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeReponse", [], "any", false, false, false, 50) == "boolean")) {
                // line 51
                yield "          <div class=\"choices modern-choices\">
            <label class=\"choice modern-choice\">
              <input type=\"radio\"
                     name=\"q";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 54), "html", null, true);
                yield "\"
                     value=\"1\"
                     ";
                // line 56
                yield (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 56, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
                yield "
                     ";
                // line 57
                yield ((((isset($context["response"]) || array_key_exists("response", $context) ? $context["response"] : (function () { throw new RuntimeError('Variable "response" does not exist.', 57, $this->source); })()) == "1")) ? ("checked") : (""));
                yield ">
              <span class=\"choice-label\">
                <i class=\"fa-solid fa-circle-check\"></i>
                Oui
              </span>
            </label>

            <label class=\"choice modern-choice\">
              <input type=\"radio\"
                     name=\"q";
                // line 66
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 66), "html", null, true);
                yield "\"
                     value=\"0\"
                     ";
                // line 68
                yield (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 68, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("disabled") : (""));
                yield "
                     ";
                // line 69
                yield ((((isset($context["response"]) || array_key_exists("response", $context) ? $context["response"] : (function () { throw new RuntimeError('Variable "response" does not exist.', 69, $this->source); })()) == "0")) ? ("checked") : (""));
                yield ">
              <span class=\"choice-label\">
                <i class=\"fa-solid fa-circle-xmark\"></i>
                Non
              </span>
            </label>
          </div>

        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 77
$context["question"], "typeReponse", [], "any", false, false, false, 77) == "number")) {
                // line 78
                yield "          <input type=\"number\"
                 name=\"q";
                // line 79
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 79), "html", null, true);
                yield "\"
                 class=\"field\"
                 value=\"";
                // line 81
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["response"]) || array_key_exists("response", $context) ? $context["response"] : (function () { throw new RuntimeError('Variable "response" does not exist.', 81, $this->source); })()), "html", null, true);
                yield "\"
                 placeholder=\"Valeur ";
                // line 82
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "unite", [], "any", false, false, false, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("(" . CoreExtension::getAttribute($this->env, $this->source, $context["question"], "unite", [], "any", false, false, false, 82)) . ")"), "html", null, true)) : (""));
                yield "\"
                 ";
                // line 83
                yield (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 83, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
                yield ">

        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 85
$context["question"], "typeReponse", [], "any", false, false, false, 85) == "text")) {
                // line 86
                yield "          <textarea name=\"q";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 86), "html", null, true);
                yield "\"
                    class=\"text-answer\"
                    rows=\"5\"
                    placeholder=\"Ecris ta reponse ici...\"
                    ";
                // line 90
                yield (((($tmp = (isset($context["answered"]) || array_key_exists("answered", $context) ? $context["answered"] : (function () { throw new RuntimeError('Variable "answered" does not exist.', 90, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("readonly") : (""));
                yield ">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["response"]) || array_key_exists("response", $context) ? $context["response"] : (function () { throw new RuntimeError('Variable "response" does not exist.', 90, $this->source); })()), "html", null, true);
                yield "</textarea>
        ";
            }
            // line 92
            yield "      </article>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        yield "
    <p id=\"stepError\" class=\"step-error\" role=\"alert\" aria-live=\"polite\"></p>

    <div class=\"stepper-actions modern-stepper-actions\">
      <button type=\"button\" class=\"btn ghost\" id=\"prevBtn\">Precedent</button>
      <button type=\"button\" class=\"btn primary\" id=\"nextBtn\">Suivant</button>
      <button type=\"submit\" class=\"btn primary\" id=\"submitBtn\">Enregistrer mes reponses</button>
    </div>

  </form>
</div>

<div id=\"bravoBox\" class=\"bravo-box\">
  <div class=\"bravo-content\">
    <h2>Bravo</h2>
    <p>Vous avez complete toutes les questions.</p>
    <a href=\"";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_rapport", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 110, $this->source); })()), "idT", [], "any", false, false, false, 110)]), "html", null, true);
        yield "\" class=\"btn primary\">Voir mon rapport</a>
  </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 115
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

        // line 116
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
  <script>
    const steps = document.querySelectorAll('.question-step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const bravoBox = document.getElementById('bravoBox');
    const form = document.getElementById('stepperForm');
    const stepError = document.getElementById('stepError');

    let current = 0;
    const total = steps.length || 1;

    function validateCurrentStep() {
      const activeStep = steps[current];
      if (!activeStep) return true;
      const radios = activeStep.querySelectorAll('input[type=\"radio\"]');
      if (radios.length > 0) {
        const checked = activeStep.querySelector('input[type=\"radio\"]:checked');
        return Boolean(checked);
      }
      const field = activeStep.querySelector('input[type=\"number\"], textarea');
      if (!field || field.readOnly || field.disabled) return true;
      return (field.value || '').toString().trim() !== '';
    }

    function updateStep() {
      steps.forEach((step, index) => {
        const active = index === current;
        step.classList.toggle('active', active);
      });

      const percent = ((current + 1) / total) * 100;
      progressBar.style.width = percent + '%';
      progressText.textContent = `Question \${current + 1} / \${total}`;

      prevBtn.style.display = current === 0 ? 'none' : 'inline-flex';
      nextBtn.style.display = current === total - 1 ? 'none' : 'inline-flex';
      submitBtn.style.display = current === total - 1 ? 'inline-flex' : 'none';
      stepError.textContent = '';
    }

    nextBtn.onclick = () => {
      if (!validateCurrentStep()) {
        stepError.textContent = 'Veuillez repondre a cette question avant de continuer.';
        return;
      }
      if (current < total - 1) {
        current++;
        updateStep();
      }
    };

    prevBtn.onclick = () => {
      if (current > 0) {
        current--;
        updateStep();
      }
    };

    form.addEventListener('submit', function (e) {
      if (!validateCurrentStep()) {
        e.preventDefault();
        stepError.textContent = 'Veuillez repondre a cette question avant de valider.';
        return;
      }

      e.preventDefault();
      bravoBox.classList.add('show');
      setTimeout(() => form.submit(), 1200);
    });

    updateStep();
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
        return "question/user/question/answer_by_theme.html.twig";
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
        return array (  345 => 116,  332 => 115,  317 => 110,  299 => 94,  284 => 92,  277 => 90,  269 => 86,  267 => 85,  262 => 83,  258 => 82,  254 => 81,  249 => 79,  246 => 78,  244 => 77,  233 => 69,  229 => 68,  224 => 66,  212 => 57,  208 => 56,  203 => 54,  198 => 51,  196 => 50,  192 => 48,  188 => 46,  186 => 45,  182 => 44,  176 => 41,  172 => 40,  169 => 39,  166 => 38,  163 => 37,  146 => 36,  138 => 31,  123 => 19,  115 => 14,  108 => 10,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Repondre - {{ theme.nom }}{% endblock %}

{% block body %}
<div class=\"wrap stepper-wrap modern-answer-wrap\">

  <section class=\"page-header center answer-hero\">
    <div class=\"header-actions\">
      <a href=\"{{ path('user_theme_index') }}\" class=\"btn ghost\">
        Retour aux themes
      </a>

      <a href=\"{{ path('app_theme_rapport', { id: theme.idT }) }}\" class=\"btn primary\">
        Voir mon rapport
      </a>
    </div>

    <h1><i class=\"fa-solid fa-clipboard-check\"></i> {{ theme.nom }}</h1>
    <p class=\"muted\">Merci de repondre aux questions ci-dessous.</p>
  </section>

  <div class=\"stepper-progress modern-progress\">
    <div class=\"bar\">
      <div class=\"bar-fill\" id=\"progressBar\"></div>
    </div>
    <span id=\"progressText\"></span>
  </div>

  <form method=\"post\"
        action=\"{{ path('app_theme_answer', { id: theme.idT }) }}\"
        class=\"answers-form modern-answers-form\"
        id=\"stepperForm\"
        novalidate>

    {% for question in questions %}
      {% set answered = answers[question.id] is defined %}
      {% set response = answered ? answers[question.id].valeur : null %}

      <article class=\"question-step modern-question-step {{ answered ? 'answered' : '' }}\"
               data-step=\"{{ loop.index0 }}\">

        <div class=\"question-head\">
          <h3 class=\"question-title\">{{ question.texte }}</h3>
          {% if answered %}
            <span class=\"badge-done\">Deja repondu</span>
          {% endif %}
        </div>

        {% if question.typeReponse == 'boolean' %}
          <div class=\"choices modern-choices\">
            <label class=\"choice modern-choice\">
              <input type=\"radio\"
                     name=\"q{{ question.id }}\"
                     value=\"1\"
                     {{ answered ? 'disabled' : '' }}
                     {{ response == '1' ? 'checked' : '' }}>
              <span class=\"choice-label\">
                <i class=\"fa-solid fa-circle-check\"></i>
                Oui
              </span>
            </label>

            <label class=\"choice modern-choice\">
              <input type=\"radio\"
                     name=\"q{{ question.id }}\"
                     value=\"0\"
                     {{ answered ? 'disabled' : '' }}
                     {{ response == '0' ? 'checked' : '' }}>
              <span class=\"choice-label\">
                <i class=\"fa-solid fa-circle-xmark\"></i>
                Non
              </span>
            </label>
          </div>

        {% elseif question.typeReponse == 'number' %}
          <input type=\"number\"
                 name=\"q{{ question.id }}\"
                 class=\"field\"
                 value=\"{{ response }}\"
                 placeholder=\"Valeur {{ question.unite ? '(' ~ question.unite ~ ')' : '' }}\"
                 {{ answered ? 'readonly' : '' }}>

        {% elseif question.typeReponse == 'text' %}
          <textarea name=\"q{{ question.id }}\"
                    class=\"text-answer\"
                    rows=\"5\"
                    placeholder=\"Ecris ta reponse ici...\"
                    {{ answered ? 'readonly' : '' }}>{{ response }}</textarea>
        {% endif %}
      </article>
    {% endfor %}

    <p id=\"stepError\" class=\"step-error\" role=\"alert\" aria-live=\"polite\"></p>

    <div class=\"stepper-actions modern-stepper-actions\">
      <button type=\"button\" class=\"btn ghost\" id=\"prevBtn\">Precedent</button>
      <button type=\"button\" class=\"btn primary\" id=\"nextBtn\">Suivant</button>
      <button type=\"submit\" class=\"btn primary\" id=\"submitBtn\">Enregistrer mes reponses</button>
    </div>

  </form>
</div>

<div id=\"bravoBox\" class=\"bravo-box\">
  <div class=\"bravo-content\">
    <h2>Bravo</h2>
    <p>Vous avez complete toutes les questions.</p>
    <a href=\"{{ path('app_theme_rapport', { id: theme.idT }) }}\" class=\"btn primary\">Voir mon rapport</a>
  </div>
</div>
{% endblock %}

{% block javascripts %}
  {{ parent() }}
  <script>
    const steps = document.querySelectorAll('.question-step');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const bravoBox = document.getElementById('bravoBox');
    const form = document.getElementById('stepperForm');
    const stepError = document.getElementById('stepError');

    let current = 0;
    const total = steps.length || 1;

    function validateCurrentStep() {
      const activeStep = steps[current];
      if (!activeStep) return true;
      const radios = activeStep.querySelectorAll('input[type=\"radio\"]');
      if (radios.length > 0) {
        const checked = activeStep.querySelector('input[type=\"radio\"]:checked');
        return Boolean(checked);
      }
      const field = activeStep.querySelector('input[type=\"number\"], textarea');
      if (!field || field.readOnly || field.disabled) return true;
      return (field.value || '').toString().trim() !== '';
    }

    function updateStep() {
      steps.forEach((step, index) => {
        const active = index === current;
        step.classList.toggle('active', active);
      });

      const percent = ((current + 1) / total) * 100;
      progressBar.style.width = percent + '%';
      progressText.textContent = `Question \${current + 1} / \${total}`;

      prevBtn.style.display = current === 0 ? 'none' : 'inline-flex';
      nextBtn.style.display = current === total - 1 ? 'none' : 'inline-flex';
      submitBtn.style.display = current === total - 1 ? 'inline-flex' : 'none';
      stepError.textContent = '';
    }

    nextBtn.onclick = () => {
      if (!validateCurrentStep()) {
        stepError.textContent = 'Veuillez repondre a cette question avant de continuer.';
        return;
      }
      if (current < total - 1) {
        current++;
        updateStep();
      }
    };

    prevBtn.onclick = () => {
      if (current > 0) {
        current--;
        updateStep();
      }
    };

    form.addEventListener('submit', function (e) {
      if (!validateCurrentStep()) {
        e.preventDefault();
        stepError.textContent = 'Veuillez repondre a cette question avant de valider.';
        return;
      }

      e.preventDefault();
      bravoBox.classList.add('show');
      setTimeout(() => form.submit(), 1200);
    });

    updateStep();
  </script>
{% endblock %}

", "question/user/question/answer_by_theme.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\question\\user\\question\\answer_by_theme.html.twig");
    }
}
