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

/* question/admin/question/new.html.twig */
class __TwigTemplate_872cbabb05e4289f3cd07df11851ed8d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/admin/question/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "question/admin/question/new.html.twig"));

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

        yield "Ajouter une question - NEXA";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 9, $this->source); })()), "idT", [], "any", false, false, false, 9)]), "html", null, true);
        yield "\" class=\"back-link\">
        Retour aux questions
      </a>
      <h1>Ajouter une question</h1>
      <p class=\"muted\">Theme : <strong>";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 13, $this->source); })()), "nom", [], "any", false, false, false, 13), "html", null, true);
        yield "</strong></p>
      <p class=\"form-intro\">
        Construis une question utile, mesurable et facile a repondre.
      </p>
      <div class=\"hero-badges\">
        <span><i class=\"fa-solid fa-bolt\"></i> Rapide</span>
        <span><i class=\"fa-solid fa-chart-line\"></i> Mesurable</span>
        <span><i class=\"fa-solid fa-wand-magic-sparkles\"></i> Moderne</span>
      </div>
    </div>
  </div>

  ";
        // line 25
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "

  <div class=\"question-create-layout\">
    <section class=\"question-create-main form-card modern-main-card\">
      ";
        // line 29
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "vars", [], "any", false, false, false, 29), "submitted", [], "any", false, false, false, 29) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "vars", [], "any", false, false, false, 29), "valid", [], "any", false, false, false, 29))) {
            // line 30
            yield "        <div class=\"form-errors-box\">
          <strong>Le formulaire contient des erreurs. Corrige les champs indiques.</strong>
        </div>
      ";
        }
        // line 34
        yield "
      <div class=\"form-section\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-pen-nib\"></i> Contenu de la question</h3>
          <span class=\"section-chip\">Etape 1</span>
        </div>
        <label class=\"field-label\">Texte de la question *</label>
        ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "texte", [], "any", false, false, false, 41), 'widget', ["attr" => ["class" => "field js-track", "placeholder" => "Ex: As-tu bu suffisamment d eau aujourd hui ?"]]);
        // line 46
        yield "
        <p class=\"form-help\">Conseil: une seule idee par question.</p>
        ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "texte", [], "any", false, false, false, 48), 'errors');
        yield "
      </div>

      <div class=\"form-section grid-2\">
        <div>
          <label class=\"field-label\">Type de question *</label>
          ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "type", [], "any", false, false, false, 54), 'widget', ["attr" => ["class" => "field js-track js-question-type"]]);
        yield "
          <p class=\"form-help\">";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "type", [], "any", false, false, false, 55), "vars", [], "any", false, false, false, 55), "help", [], "any", false, false, false, 55), "html", null, true);
        yield "</p>
          ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "type", [], "any", false, false, false, 56), 'errors');
        yield "
        </div>
        <div>
          <label class=\"field-label\">Type de reponse *</label>
          ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "typeReponse", [], "any", false, false, false, 60), 'widget', ["attr" => ["class" => "field js-track js-response-type"]]);
        yield "
          <p class=\"form-help\">";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "typeReponse", [], "any", false, false, false, 61), "vars", [], "any", false, false, false, 61), "help", [], "any", false, false, false, 61), "html", null, true);
        yield "</p>
          ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "typeReponse", [], "any", false, false, false, 62), 'errors');
        yield "
        </div>
      </div>

      <div class=\"form-section grid-2 js-numeric-block\">
        <div>
          <label class=\"field-label\">Unite</label>
          ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "unite", [], "any", false, false, false, 69), 'widget', ["attr" => ["class" => "field js-track", "placeholder" => "Ex: litres, heures, minutes"]]);
        // line 74
        yield "
          <p class=\"form-help\">";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "unite", [], "any", false, false, false, 75), "vars", [], "any", false, false, false, 75), "help", [], "any", false, false, false, 75), "html", null, true);
        yield "</p>
          ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), "unite", [], "any", false, false, false, 76), 'errors');
        yield "
        </div>
        <div>
          <label class=\"field-label\">Valeur ideale</label>
          ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 80), 'widget', ["attr" => ["class" => "field js-track", "placeholder" => "Ex: 2"]]);
        // line 85
        yield "
          <p class=\"form-help\">";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 86), "vars", [], "any", false, false, false, 86), "help", [], "any", false, false, false, 86), "html", null, true);
        yield "</p>
          ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "valeurIdeale", [], "any", false, false, false, 87), 'errors');
        yield "
        </div>
      </div>

      <div class=\"form-section\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-sliders\"></i> Pilotage</h3>
          <span class=\"section-chip\">Etape 2</span>
        </div>
        <label class=\"field-label\">Niveau d importance</label>
        <div class=\"stars-radio js-track-group\">
          ";
        // line 98
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "niveau", [], "any", false, false, false, 98), 'widget');
        yield "
        </div>
        <p class=\"form-help\">";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "niveau", [], "any", false, false, false, 100), "vars", [], "any", false, false, false, 100), "help", [], "any", false, false, false, 100), "html", null, true);
        yield "</p>
        ";
        // line 101
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "niveau", [], "any", false, false, false, 101), 'errors');
        yield "
      </div>

      <div class=\"form-section\">
        <label class=\"field-label\">Frequence *</label>
        ";
        // line 106
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 106, $this->source); })()), "frequence", [], "any", false, false, false, 106), 'widget', ["attr" => ["class" => "field js-track"]]);
        yield "
        <p class=\"form-help\">";
        // line 107
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "frequence", [], "any", false, false, false, 107), "vars", [], "any", false, false, false, 107), "help", [], "any", false, false, false, 107), "html", null, true);
        yield "</p>
        ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "frequence", [], "any", false, false, false, 108), 'errors');
        yield "
      </div>

      <div class=\"form-section switch-stack\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-robot\"></i> Automatisation</h3>
          <span class=\"section-chip\">Etape 3</span>
        </div>

        <label class=\"switch-label\">
          ";
        // line 118
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 118, $this->source); })()), "genereTache", [], "any", false, false, false, 118), 'widget', ["attr" => ["class" => "js-track"]]);
        yield "
          Generer une tache automatiquement
        </label>
        <p class=\"form-help\">";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 121, $this->source); })()), "genereTache", [], "any", false, false, false, 121), "vars", [], "any", false, false, false, 121), "help", [], "any", false, false, false, 121), "html", null, true);
        yield "</p>

        <label class=\"switch-label\">
          ";
        // line 124
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 124, $this->source); })()), "actif", [], "any", false, false, false, 124), 'widget', ["attr" => ["class" => "js-track"]]);
        yield "
          Question active
        </label>
        <p class=\"form-help\">";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 127, $this->source); })()), "actif", [], "any", false, false, false, 127), "vars", [], "any", false, false, false, 127), "help", [], "any", false, false, false, 127), "html", null, true);
        yield "</p>
      </div>

      <div class=\"form-actions\">
        <button class=\"btn primary\" type=\"submit\">Enregistrer la question</button>
        <a href=\"";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 132, $this->source); })()), "idT", [], "any", false, false, false, 132)]), "html", null, true);
        yield "\" class=\"btn\">Annuler</a>
      </div>
    </section>

    <aside class=\"question-create-side\">
      <div class=\"form-card side-card modern-side-card\">
        <h3>Qualite</h3>
        <ul class=\"quality-list\">
          <li>Question claire et directe</li>
          <li>Reponse adaptee au besoin</li>
          <li>Frequence pertinente</li>
          <li>Importance coherente</li>
        </ul>
      </div>

      <div class=\"form-card side-card modern-side-card\">
        <h3>Progression</h3>
        <div class=\"progress-line\">
          <div class=\"progress-line-fill\" id=\"formProgress\"></div>
        </div>
        <p class=\"form-help\"><span id=\"formProgressText\">0%</span> des champs renseignes.</p>
      </div>

      <div class=\"form-card side-card conditional-hint modern-side-card\" id=\"responseHint\">
        <strong>Suggestion</strong>
        <p>Pour une reponse numerique, renseigne aussi une unite et une valeur ideale.</p>
      </div>
    </aside>
  </div>

  ";
        // line 162
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 162, $this->source); })()), 'form_end');
        yield "
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 166
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

        // line 167
        yield "  ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const responseType = document.querySelector('.js-response-type');
      const numericBlock = document.querySelector('.js-numeric-block');
      const hint = document.getElementById('responseHint');
      const progressFill = document.getElementById('formProgress');
      const progressText = document.getElementById('formProgressText');
      const tracked = Array.from(document.querySelectorAll('.js-track'));
      if (!responseType || !numericBlock || !hint || !progressFill || !progressText) return;

      function isFilled(el) {
        if (el.type === 'checkbox' || el.type === 'radio') return el.checked;
        return (el.value || '').toString().trim() !== '';
      }

      function refreshProgress() {
        const total = tracked.length || 1;
        const done = tracked.filter(isFilled).length;
        const percent = Math.round((done / total) * 100);
        progressFill.style.width = percent + '%';
        progressText.textContent = percent + '%';
      }

      function refreshResponseUI() {
        const isNumber = responseType.value === 'number';
        numericBlock.style.opacity = isNumber ? '1' : '0.58';
        hint.querySelector('p').textContent = isNumber
          ? 'Bonne pratique: precise unite + valeur ideale pour des rapports pertinents.'
          : 'Pour ce type de reponse, Unite et Valeur ideale sont optionnelles.';
      }

      document.addEventListener('input', refreshProgress);
      document.addEventListener('change', function () {
        refreshProgress();
        refreshResponseUI();
      });

      refreshProgress();
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
        return "question/admin/question/new.html.twig";
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
        return array (  363 => 167,  350 => 166,  336 => 162,  303 => 132,  295 => 127,  289 => 124,  283 => 121,  277 => 118,  264 => 108,  260 => 107,  256 => 106,  248 => 101,  244 => 100,  239 => 98,  225 => 87,  221 => 86,  218 => 85,  216 => 80,  209 => 76,  205 => 75,  202 => 74,  200 => 69,  190 => 62,  186 => 61,  182 => 60,  175 => 56,  171 => 55,  167 => 54,  158 => 48,  154 => 46,  152 => 41,  143 => 34,  137 => 30,  135 => 29,  128 => 25,  113 => 13,  106 => 9,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Ajouter une question - NEXA{% endblock %}

{% block body %}
<div class=\"form-page\">
  <div class=\"page-header\">
    <div>
      <a href=\"{{ path('app_questions_by_theme', { id: theme.idT }) }}\" class=\"back-link\">
        Retour aux questions
      </a>
      <h1>Ajouter une question</h1>
      <p class=\"muted\">Theme : <strong>{{ theme.nom }}</strong></p>
      <p class=\"form-intro\">
        Construis une question utile, mesurable et facile a repondre.
      </p>
      <div class=\"hero-badges\">
        <span><i class=\"fa-solid fa-bolt\"></i> Rapide</span>
        <span><i class=\"fa-solid fa-chart-line\"></i> Mesurable</span>
        <span><i class=\"fa-solid fa-wand-magic-sparkles\"></i> Moderne</span>
      </div>
    </div>
  </div>

  {{ form_start(form, { attr: { novalidate: 'novalidate' } }) }}

  <div class=\"question-create-layout\">
    <section class=\"question-create-main form-card modern-main-card\">
      {% if form.vars.submitted and not form.vars.valid %}
        <div class=\"form-errors-box\">
          <strong>Le formulaire contient des erreurs. Corrige les champs indiques.</strong>
        </div>
      {% endif %}

      <div class=\"form-section\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-pen-nib\"></i> Contenu de la question</h3>
          <span class=\"section-chip\">Etape 1</span>
        </div>
        <label class=\"field-label\">Texte de la question *</label>
        {{ form_widget(form.texte, {
          attr: {
            class: 'field js-track',
            placeholder: 'Ex: As-tu bu suffisamment d eau aujourd hui ?'
          }
        }) }}
        <p class=\"form-help\">Conseil: une seule idee par question.</p>
        {{ form_errors(form.texte) }}
      </div>

      <div class=\"form-section grid-2\">
        <div>
          <label class=\"field-label\">Type de question *</label>
          {{ form_widget(form.type, { attr: { class: 'field js-track js-question-type' } }) }}
          <p class=\"form-help\">{{ form.type.vars.help }}</p>
          {{ form_errors(form.type) }}
        </div>
        <div>
          <label class=\"field-label\">Type de reponse *</label>
          {{ form_widget(form.typeReponse, { attr: { class: 'field js-track js-response-type' } }) }}
          <p class=\"form-help\">{{ form.typeReponse.vars.help }}</p>
          {{ form_errors(form.typeReponse) }}
        </div>
      </div>

      <div class=\"form-section grid-2 js-numeric-block\">
        <div>
          <label class=\"field-label\">Unite</label>
          {{ form_widget(form.unite, {
            attr: {
              class: 'field js-track',
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
              class: 'field js-track',
              placeholder: 'Ex: 2'
            }
          }) }}
          <p class=\"form-help\">{{ form.valeurIdeale.vars.help }}</p>
          {{ form_errors(form.valeurIdeale) }}
        </div>
      </div>

      <div class=\"form-section\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-sliders\"></i> Pilotage</h3>
          <span class=\"section-chip\">Etape 2</span>
        </div>
        <label class=\"field-label\">Niveau d importance</label>
        <div class=\"stars-radio js-track-group\">
          {{ form_widget(form.niveau) }}
        </div>
        <p class=\"form-help\">{{ form.niveau.vars.help }}</p>
        {{ form_errors(form.niveau) }}
      </div>

      <div class=\"form-section\">
        <label class=\"field-label\">Frequence *</label>
        {{ form_widget(form.frequence, { attr: { class: 'field js-track' } }) }}
        <p class=\"form-help\">{{ form.frequence.vars.help }}</p>
        {{ form_errors(form.frequence) }}
      </div>

      <div class=\"form-section switch-stack\">
        <div class=\"section-title-row\">
          <h3><i class=\"fa-solid fa-robot\"></i> Automatisation</h3>
          <span class=\"section-chip\">Etape 3</span>
        </div>

        <label class=\"switch-label\">
          {{ form_widget(form.genereTache, { attr: { class: 'js-track' } }) }}
          Generer une tache automatiquement
        </label>
        <p class=\"form-help\">{{ form.genereTache.vars.help }}</p>

        <label class=\"switch-label\">
          {{ form_widget(form.actif, { attr: { class: 'js-track' } }) }}
          Question active
        </label>
        <p class=\"form-help\">{{ form.actif.vars.help }}</p>
      </div>

      <div class=\"form-actions\">
        <button class=\"btn primary\" type=\"submit\">Enregistrer la question</button>
        <a href=\"{{ path('app_questions_by_theme', { id: theme.idT }) }}\" class=\"btn\">Annuler</a>
      </div>
    </section>

    <aside class=\"question-create-side\">
      <div class=\"form-card side-card modern-side-card\">
        <h3>Qualite</h3>
        <ul class=\"quality-list\">
          <li>Question claire et directe</li>
          <li>Reponse adaptee au besoin</li>
          <li>Frequence pertinente</li>
          <li>Importance coherente</li>
        </ul>
      </div>

      <div class=\"form-card side-card modern-side-card\">
        <h3>Progression</h3>
        <div class=\"progress-line\">
          <div class=\"progress-line-fill\" id=\"formProgress\"></div>
        </div>
        <p class=\"form-help\"><span id=\"formProgressText\">0%</span> des champs renseignes.</p>
      </div>

      <div class=\"form-card side-card conditional-hint modern-side-card\" id=\"responseHint\">
        <strong>Suggestion</strong>
        <p>Pour une reponse numerique, renseigne aussi une unite et une valeur ideale.</p>
      </div>
    </aside>
  </div>

  {{ form_end(form) }}
</div>
{% endblock %}

{% block javascripts %}
  {{ parent() }}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const responseType = document.querySelector('.js-response-type');
      const numericBlock = document.querySelector('.js-numeric-block');
      const hint = document.getElementById('responseHint');
      const progressFill = document.getElementById('formProgress');
      const progressText = document.getElementById('formProgressText');
      const tracked = Array.from(document.querySelectorAll('.js-track'));
      if (!responseType || !numericBlock || !hint || !progressFill || !progressText) return;

      function isFilled(el) {
        if (el.type === 'checkbox' || el.type === 'radio') return el.checked;
        return (el.value || '').toString().trim() !== '';
      }

      function refreshProgress() {
        const total = tracked.length || 1;
        const done = tracked.filter(isFilled).length;
        const percent = Math.round((done / total) * 100);
        progressFill.style.width = percent + '%';
        progressText.textContent = percent + '%';
      }

      function refreshResponseUI() {
        const isNumber = responseType.value === 'number';
        numericBlock.style.opacity = isNumber ? '1' : '0.58';
        hint.querySelector('p').textContent = isNumber
          ? 'Bonne pratique: precise unite + valeur ideale pour des rapports pertinents.'
          : 'Pour ce type de reponse, Unite et Valeur ideale sont optionnelles.';
      }

      document.addEventListener('input', refreshProgress);
      document.addEventListener('change', function () {
        refreshProgress();
        refreshResponseUI();
      });

      refreshProgress();
      refreshResponseUI();
    });
  </script>
{% endblock %}

", "question/admin/question/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\question\\admin\\question\\new.html.twig");
    }
}
