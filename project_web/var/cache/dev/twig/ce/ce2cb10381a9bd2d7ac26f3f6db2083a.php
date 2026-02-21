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

/* question/edit.html.twig */
class __TwigTemplate_6b6c38b27eeb6fb25c299160a0bf4a1a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/edit.html.twig"));

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

        yield "Modifier la question";
        
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
        yield "<div class=\"form-page\">
  <div class=\"page-header\">
    <div>
      <a href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 9, $this->source); })()), "theme", [], "any", false, false, false, 9), "idT", [], "any", false, false, false, 9)]), "html", null, true);
        yield "\" class=\"back-link\">
        Retour aux questions
      </a>
      <h1>Modifier la question</h1>
      <p class=\"muted\">Theme : <strong>";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 13, $this->source); })()), "theme", [], "any", false, false, false, 13), "nom", [], "any", false, false, false, 13), "html", null, true);
        yield "</strong></p>
      <p class=\"form-intro\">
        Mets a jour le texte et le format de reponse pour garder un suivi clair.
      </p>
    </div>
  </div>

  <div class=\"form-card\">
    ";
        // line 21
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

    ";
        // line 23
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "vars", [], "any", false, false, false, 23), "submitted", [], "any", false, false, false, 23) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "vars", [], "any", false, false, false, 23), "valid", [], "any", false, false, false, 23))) {
            // line 24
            yield "      <div class=\"form-errors-box\">
        <strong>Le formulaire contient des erreurs. Corrige les champs indiques.</strong>
      </div>
    ";
        }
        // line 28
        yield "
    <div class=\"form-section\">
      <h3>Contenu de la question</h3>
      <label class=\"field-label\">Texte de la question *</label>
      ";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "texte", [], "any", false, false, false, 32), 'widget', ["attr" => ["class" => "field", "placeholder" => "Ex: As-tu bu suffisamment d eau aujourd hui ?"]]);
        // line 37
        yield "
      <p class=\"form-help\">Une phrase simple aide l utilisateur a repondre rapidement.</p>
      ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "texte", [], "any", false, false, false, 39), 'errors');
        yield "
    </div>

    <div class=\"form-section grid-2\">
      <div>
        <label class=\"field-label\">Type de question *</label>
        ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "type", [], "any", false, false, false, 45), 'widget', ["attr" => ["class" => "field js-question-type"]]);
        yield "
        <p class=\"form-help\">";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), "type", [], "any", false, false, false, 46), "vars", [], "any", false, false, false, 46), "help", [], "any", false, false, false, 46), "html", null, true);
        yield "</p>
        ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "type", [], "any", false, false, false, 47), 'errors');
        yield "
      </div>

      <div>
        <label class=\"field-label\">Type de reponse *</label>
        ";
        // line 52
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "typeReponse", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "field js-response-type"]]);
        yield "
        <p class=\"form-help\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "typeReponse", [], "any", false, false, false, 53), "vars", [], "any", false, false, false, 53), "help", [], "any", false, false, false, 53), "html", null, true);
        yield "</p>
        ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "typeReponse", [], "any", false, false, false, 54), 'errors');
        yield "
      </div>
    </div>

    <div class=\"form-section grid-2 js-numeric-block\">
      <div>
        <label class=\"field-label\">Unite</label>
        ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "unite", [], "any", false, false, false, 61), 'widget', ["attr" => ["class" => "field", "placeholder" => "Ex: litres, heures, minutes"]]);
        // line 66
        yield "
        <p class=\"form-help\">";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "unite", [], "any", false, false, false, 67), "vars", [], "any", false, false, false, 67), "help", [], "any", false, false, false, 67), "html", null, true);
        yield "</p>
        ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "unite", [], "any", false, false, false, 68), 'errors');
        yield "
      </div>

      <div>
        <label class=\"field-label\">Valeur ideale</label>
        ";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 73), 'widget', ["attr" => ["class" => "field", "placeholder" => "Ex: 2"]]);
        // line 78
        yield "
        <p class=\"form-help\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 79), "vars", [], "any", false, false, false, 79), "help", [], "any", false, false, false, 79), "html", null, true);
        yield "</p>
        ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 80), 'errors');
        yield "
      </div>
    </div>

    <div class=\"form-section\">
      <label class=\"field-label\">Niveau d importance</label>
      <div class=\"stars-radio\">
        ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "niveau", [], "any", false, false, false, 87), 'widget');
        yield "
      </div>
      <p class=\"form-help\">";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "niveau", [], "any", false, false, false, 89), "vars", [], "any", false, false, false, 89), "help", [], "any", false, false, false, 89), "html", null, true);
        yield "</p>
      ";
        // line 90
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), "niveau", [], "any", false, false, false, 90), 'errors');
        yield "
    </div>

    <div class=\"form-section\">
      <label class=\"field-label\">Frequence *</label>
      ";
        // line 95
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "frequence", [], "any", false, false, false, 95), 'widget', ["attr" => ["class" => "field"]]);
        yield "
      <p class=\"form-help\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "frequence", [], "any", false, false, false, 96), "vars", [], "any", false, false, false, 96), "help", [], "any", false, false, false, 96), "html", null, true);
        yield "</p>
      ";
        // line 97
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 97, $this->source); })()), "frequence", [], "any", false, false, false, 97), 'errors');
        yield "
    </div>

    <div class=\"form-section switch-stack\">
      <label class=\"switch-label\">
        ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 102, $this->source); })()), "genereTache", [], "any", false, false, false, 102), 'widget');
        yield "
        Generer une tache automatiquement
      </label>
      <p class=\"form-help\">";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "genereTache", [], "any", false, false, false, 105), "vars", [], "any", false, false, false, 105), "help", [], "any", false, false, false, 105), "html", null, true);
        yield "</p>

      <label class=\"switch-label\">
        ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "actif", [], "any", false, false, false, 108), 'widget');
        yield "
        Question active
      </label>
      <p class=\"form-help\">";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 111, $this->source); })()), "actif", [], "any", false, false, false, 111), "vars", [], "any", false, false, false, 111), "help", [], "any", false, false, false, 111), "html", null, true);
        yield "</p>
    </div>

    <div class=\"form-section conditional-hint\" id=\"responseHint\">
      <strong>Suggestion</strong>
      <p>Pour une reponse numerique, renseigne aussi une unite et une valeur ideale.</p>
    </div>

    <div class=\"form-actions\">
      <button class=\"btn primary\">Enregistrer les modifications</button>
      <a href=\"";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 121, $this->source); })()), "theme", [], "any", false, false, false, 121), "idT", [], "any", false, false, false, 121)]), "html", null, true);
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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 131
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

        // line 132
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const responseType = document.querySelector('.js-response-type');
      const numericBlock = document.querySelector('.js-numeric-block');
      const hint = document.getElementById('responseHint');
      if (!responseType || !numericBlock || !hint) return;

      function refreshResponseUI() {
        const value = responseType.value;
        const isNumber = value === 'number';

        numericBlock.style.opacity = isNumber ? '1' : '0.55';
        hint.querySelector('p').textContent = isNumber
          ? 'Bonne pratique: precise unite + valeur ideale pour analyser les resultats.'
          : 'Ici tu peux laisser Unite et Valeur ideale vides.';
      }

      responseType.addEventListener('change', refreshResponseUI);
      refreshResponseUI();
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
        return "question/edit.html.twig";
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
        return array (  328 => 132,  315 => 131,  300 => 126,  292 => 121,  279 => 111,  273 => 108,  267 => 105,  261 => 102,  253 => 97,  249 => 96,  245 => 95,  237 => 90,  233 => 89,  228 => 87,  218 => 80,  214 => 79,  211 => 78,  209 => 73,  201 => 68,  197 => 67,  194 => 66,  192 => 61,  182 => 54,  178 => 53,  174 => 52,  166 => 47,  162 => 46,  158 => 45,  149 => 39,  145 => 37,  143 => 32,  137 => 28,  131 => 24,  129 => 23,  124 => 21,  113 => 13,  106 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Modifier la question{% endblock %}

{% block body %}
<div class=\"form-page\">
  <div class=\"page-header\">
    <div>
      <a href=\"{{ path('app_questions_by_theme', { id: question.theme.idT }) }}\" class=\"back-link\">
        Retour aux questions
      </a>
      <h1>Modifier la question</h1>
      <p class=\"muted\">Theme : <strong>{{ question.theme.nom }}</strong></p>
      <p class=\"form-intro\">
        Mets a jour le texte et le format de reponse pour garder un suivi clair.
      </p>
    </div>
  </div>

  <div class=\"form-card\">
    {{ form_start(form, { attr: { novalidate: 'novalidate' } }) }}

    {% if form.vars.submitted and not form.vars.valid %}
      <div class=\"form-errors-box\">
        <strong>Le formulaire contient des erreurs. Corrige les champs indiques.</strong>
      </div>
    {% endif %}

    <div class=\"form-section\">
      <h3>Contenu de la question</h3>
      <label class=\"field-label\">Texte de la question *</label>
      {{ form_widget(form.texte, {
        attr: {
          class: 'field',
          placeholder: 'Ex: As-tu bu suffisamment d eau aujourd hui ?'
        }
      }) }}
      <p class=\"form-help\">Une phrase simple aide l utilisateur a repondre rapidement.</p>
      {{ form_errors(form.texte) }}
    </div>

    <div class=\"form-section grid-2\">
      <div>
        <label class=\"field-label\">Type de question *</label>
        {{ form_widget(form.type, { attr: { class: 'field js-question-type' } }) }}
        <p class=\"form-help\">{{ form.type.vars.help }}</p>
        {{ form_errors(form.type) }}
      </div>

      <div>
        <label class=\"field-label\">Type de reponse *</label>
        {{ form_widget(form.typeReponse, { attr: { class: 'field js-response-type' } }) }}
        <p class=\"form-help\">{{ form.typeReponse.vars.help }}</p>
        {{ form_errors(form.typeReponse) }}
      </div>
    </div>

    <div class=\"form-section grid-2 js-numeric-block\">
      <div>
        <label class=\"field-label\">Unite</label>
        {{ form_widget(form.unite, {
          attr: {
            class: 'field',
            placeholder: 'Ex: litres, heures, minutes'
          }
        }) }}
        <p class=\"form-help\">{{ form.unite.vars.help }}</p>
        {{ form_errors(form.unite) }}
      </div>

      <div>
        <label class=\"field-label\">Valeur ideale</label>
        {{ form_widget(form.valeurIdeale, {
          attr: {
            class: 'field',
            placeholder: 'Ex: 2'
          }
        }) }}
        <p class=\"form-help\">{{ form.valeurIdeale.vars.help }}</p>
        {{ form_errors(form.valeurIdeale) }}
      </div>
    </div>

    <div class=\"form-section\">
      <label class=\"field-label\">Niveau d importance</label>
      <div class=\"stars-radio\">
        {{ form_widget(form.niveau) }}
      </div>
      <p class=\"form-help\">{{ form.niveau.vars.help }}</p>
      {{ form_errors(form.niveau) }}
    </div>

    <div class=\"form-section\">
      <label class=\"field-label\">Frequence *</label>
      {{ form_widget(form.frequence, { attr: { class: 'field' } }) }}
      <p class=\"form-help\">{{ form.frequence.vars.help }}</p>
      {{ form_errors(form.frequence) }}
    </div>

    <div class=\"form-section switch-stack\">
      <label class=\"switch-label\">
        {{ form_widget(form.genereTache) }}
        Generer une tache automatiquement
      </label>
      <p class=\"form-help\">{{ form.genereTache.vars.help }}</p>

      <label class=\"switch-label\">
        {{ form_widget(form.actif) }}
        Question active
      </label>
      <p class=\"form-help\">{{ form.actif.vars.help }}</p>
    </div>

    <div class=\"form-section conditional-hint\" id=\"responseHint\">
      <strong>Suggestion</strong>
      <p>Pour une reponse numerique, renseigne aussi une unite et une valeur ideale.</p>
    </div>

    <div class=\"form-actions\">
      <button class=\"btn primary\">Enregistrer les modifications</button>
      <a href=\"{{ path('app_questions_by_theme', { id: question.theme.idT }) }}\" class=\"btn\">
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
      const responseType = document.querySelector('.js-response-type');
      const numericBlock = document.querySelector('.js-numeric-block');
      const hint = document.getElementById('responseHint');
      if (!responseType || !numericBlock || !hint) return;

      function refreshResponseUI() {
        const value = responseType.value;
        const isNumber = value === 'number';

        numericBlock.style.opacity = isNumber ? '1' : '0.55';
        hint.querySelector('p').textContent = isNumber
          ? 'Bonne pratique: precise unite + valeur ideale pour analyser les resultats.'
          : 'Ici tu peux laisser Unite et Valeur ideale vides.';
      }

      responseType.addEventListener('change', refreshResponseUI);
      refreshResponseUI();
    });
  </script>
{% endblock %}

", "question/edit.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\question\\edit.html.twig");
    }
}
