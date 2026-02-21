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

/* security/login.html.twig */
class __TwigTemplate_e41b37ec468862cedfff29a5f910a98a extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "NEXA | Authentification";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "<link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/loginnn.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
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

        // line 10
        yield "<header class=\"main-header\">
  <div class=\"logo\">NEXA</div>

  <div class=\"nav-center\">
    <div class=\"nav-slogan\">Organisez. Priorisez. Avancez.</div>
    <div class=\"nav-sub\">NEXA vous accompagne chaque jour.</div>
  </div>

  <div class=\"header-actions\">
    <button class=\"theme-toggle\" id=\"themeToggle\" type=\"button\">
      <i class=\"fas fa-moon\"></i>
    </button>

    <a href=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_public_home");
        yield "\" class=\"cta-secondary\">
      &larr; Retour a l'accueil
    </a>
  </div>
</header>

<div class=\"nexa-illustrations\">
  <svg class=\"illus agenda\" viewBox=\"0 0 200 200\">
    <rect x=\"20\" y=\"40\" width=\"160\" height=\"120\" rx=\"18\"/>
    <line x1=\"20\" y1=\"70\" x2=\"180\" y2=\"70\"/>
    <circle cx=\"60\" cy=\"95\" r=\"6\"/>
    <circle cx=\"100\" cy=\"95\" r=\"6\"/>
    <circle cx=\"140\" cy=\"95\" r=\"6\"/>
  </svg>

  <svg class=\"illus checklist\" viewBox=\"0 0 200 200\">
    <rect x=\"30\" y=\"30\" width=\"140\" height=\"140\" rx=\"20\"/>
    <polyline points=\"60,80 75,95 105,65\"/>
    <polyline points=\"60,120 75,135 105,105\"/>
  </svg>

  <svg class=\"illus clock\" viewBox=\"0 0 200 200\">
    <circle cx=\"100\" cy=\"100\" r=\"70\"/>
    <circle cx=\"100\" cy=\"100\" r=\"8\"/>
    <line x1=\"100\" y1=\"100\" x2=\"100\" y2=\"55\"/>
    <line x1=\"100\" y1=\"100\" x2=\"135\" y2=\"115\"/>
  </svg>

  <svg class=\"illus bell\" viewBox=\"0 0 200 200\">
    <path d=\"M100,50 C80,50 65,65 65,85 L65,115 C65,125 55,130 55,140 L145,140 C145,130 135,125 135,115 L135,85 C135,65 120,50 100,50\"/>
    <path d=\"M85,140 Q85,160 100,160 Q115,160 115,140\"/>
    <circle cx=\"100\" cy=\"45\" r=\"8\"/>
  </svg>
</div>

<div class=\"login-page\">
  <div class=\"container ";
        // line 59
        if (( !array_key_exists("error", $context) ||  !(isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 59, $this->source); })()))) {
            yield "right-panel-active";
        }
        yield "\" id=\"container\">

    <div class=\"form-container sign-up-container\">
      <form method=\"post\" action=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("register"), "html", null, true);
        yield "\">

        <h1>Creer un compte</h1>
        <span>Rejoignez l'univers NEXA</span>

        ";
        // line 68
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "csrf", [], "any", true, true, false, 68)) {
            // line 69
            yield "          <small class=\"error-text\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 69, $this->source); })()), "csrf", [], "any", false, false, false, 69), "html", null, true);
            yield "</small>
        ";
        }
        // line 71
        yield "
        <input type=\"text\" name=\"nom\" placeholder=\"Nom complet\" value=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("old_nom", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["old_nom"]) || array_key_exists("old_nom", $context) ? $context["old_nom"] : (function () { throw new RuntimeError('Variable "old_nom" does not exist.', 72, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\" required>
        ";
        // line 73
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "nom", [], "any", true, true, false, 73)) {
            // line 74
            yield "          <small class=\"error-text\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 74, $this->source); })()), "nom", [], "any", false, false, false, 74), "html", null, true);
            yield "</small>
        ";
        }
        // line 76
        yield "
        <input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("old_email", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["old_email"]) || array_key_exists("old_email", $context) ? $context["old_email"] : (function () { throw new RuntimeError('Variable "old_email" does not exist.', 77, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\" required>
        ";
        // line 78
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "email", [], "any", true, true, false, 78)) {
            // line 79
            yield "          <small class=\"error-text\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 79, $this->source); })()), "email", [], "any", false, false, false, 79), "html", null, true);
            yield "</small>
        ";
        }
        // line 81
        yield "
        <div class=\"password-wrapper\">
          <input type=\"password\" name=\"password\" id=\"register-password\" placeholder=\"Mot de passe\" required>
          <span class=\"toggle-password\" id=\"toggleRegisterPassword\">Afficher</span>
        </div>

        ";
        // line 87
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["errors"] ?? null), "password", [], "any", true, true, false, 87)) {
            // line 88
            yield "          <small class=\"error-text\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 88, $this->source); })()), "password", [], "any", false, false, false, 88), "html", null, true);
            yield "</small>
        ";
        }
        // line 90
        yield "
        <button type=\"submit\">S'inscrire</button>
        <button type=\"button\" class=\"switch-link\" id=\"goSignIn\">J'ai deja un compte</button>
      </form>
    </div>

    <div class=\"form-container sign-in-container\">
      <form method=\"post\" action=\"";
        // line 97
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">
        <h1>Connexion</h1>

        ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 100, $this->source); })()), "flashes", ["success"], "method", false, false, false, 100));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 101
            yield "          <div class=\"success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 103
        yield "
        <span>Accedez a votre espace</span>

        ";
        // line 106
        if ((array_key_exists("error", $context) && (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 106, $this->source); })()))) {
            // line 107
            yield "          <div class=\"error\">
            ";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 108, $this->source); })()), "messageKey", [], "any", false, false, false, 108), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 108, $this->source); })()), "messageData", [], "any", false, false, false, 108), "security"), "html", null, true);
            yield "
          </div>
        ";
        }
        // line 111
        yield "
        <input type=\"email\" name=\"email\" value=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("last_username", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 112, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\" placeholder=\"Email\" required>
        <input type=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 114
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

        <button type=\"submit\">Se connecter</button>
        <button type=\"button\" class=\"switch-link\" id=\"goSignUp\">Creer un compte</button>
      </form>
    </div>

    <div class=\"overlay-container\">
      <div class=\"overlay\">
        <div class=\"overlay-panel overlay-left\">
          <h1 class=\"overlay-title\">
            Bon retour <img src=\"";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-n.png"), "html", null, true);
        yield "\" alt=\"NEXA\">
          </h1>
          <p>Votre organisation commence ici</p>
          <button class=\"ghost\" id=\"signIn\" type=\"button\">Connexion</button>
        </div>

        <div class=\"overlay-panel overlay-right\">
          <h1 class=\"overlay-title\">
            Bienvenue <img src=\"";
        // line 133
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo-n.png"), "html", null, true);
        yield "\" alt=\"NEXA\">
          </h1>
          <p>NEXA organise votre quotidien</p>
          <button class=\"ghost\" id=\"signUp\" type=\"button\">Inscription</button>
        </div>
      </div>
    </div>

  </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 145
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

        // line 146
        yield "<script>
  window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>
<script src=\"";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/loginn.js"), "html", null, true);
        yield "\"></script>
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
        return "security/login.html.twig";
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
        return array (  378 => 153,  369 => 146,  356 => 145,  334 => 133,  323 => 125,  309 => 114,  304 => 112,  301 => 111,  295 => 108,  292 => 107,  290 => 106,  285 => 103,  276 => 101,  272 => 100,  266 => 97,  257 => 90,  251 => 88,  249 => 87,  241 => 81,  235 => 79,  233 => 78,  229 => 77,  226 => 76,  220 => 74,  218 => 73,  214 => 72,  211 => 71,  205 => 69,  203 => 68,  195 => 63,  191 => 62,  183 => 59,  144 => 23,  129 => 10,  116 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}NEXA | Authentification{% endblock %}

{% block stylesheets %}
<link rel=\"stylesheet\" href=\"{{ asset('css/loginnn.css') }}\">
{% endblock %}

{% block body %}
<header class=\"main-header\">
  <div class=\"logo\">NEXA</div>

  <div class=\"nav-center\">
    <div class=\"nav-slogan\">Organisez. Priorisez. Avancez.</div>
    <div class=\"nav-sub\">NEXA vous accompagne chaque jour.</div>
  </div>

  <div class=\"header-actions\">
    <button class=\"theme-toggle\" id=\"themeToggle\" type=\"button\">
      <i class=\"fas fa-moon\"></i>
    </button>

    <a href=\"{{ path('app_public_home') }}\" class=\"cta-secondary\">
      &larr; Retour a l'accueil
    </a>
  </div>
</header>

<div class=\"nexa-illustrations\">
  <svg class=\"illus agenda\" viewBox=\"0 0 200 200\">
    <rect x=\"20\" y=\"40\" width=\"160\" height=\"120\" rx=\"18\"/>
    <line x1=\"20\" y1=\"70\" x2=\"180\" y2=\"70\"/>
    <circle cx=\"60\" cy=\"95\" r=\"6\"/>
    <circle cx=\"100\" cy=\"95\" r=\"6\"/>
    <circle cx=\"140\" cy=\"95\" r=\"6\"/>
  </svg>

  <svg class=\"illus checklist\" viewBox=\"0 0 200 200\">
    <rect x=\"30\" y=\"30\" width=\"140\" height=\"140\" rx=\"20\"/>
    <polyline points=\"60,80 75,95 105,65\"/>
    <polyline points=\"60,120 75,135 105,105\"/>
  </svg>

  <svg class=\"illus clock\" viewBox=\"0 0 200 200\">
    <circle cx=\"100\" cy=\"100\" r=\"70\"/>
    <circle cx=\"100\" cy=\"100\" r=\"8\"/>
    <line x1=\"100\" y1=\"100\" x2=\"100\" y2=\"55\"/>
    <line x1=\"100\" y1=\"100\" x2=\"135\" y2=\"115\"/>
  </svg>

  <svg class=\"illus bell\" viewBox=\"0 0 200 200\">
    <path d=\"M100,50 C80,50 65,65 65,85 L65,115 C65,125 55,130 55,140 L145,140 C145,130 135,125 135,115 L135,85 C135,65 120,50 100,50\"/>
    <path d=\"M85,140 Q85,160 100,160 Q115,160 115,140\"/>
    <circle cx=\"100\" cy=\"45\" r=\"8\"/>
  </svg>
</div>

<div class=\"login-page\">
  <div class=\"container {% if error is not defined or not error %}right-panel-active{% endif %}\" id=\"container\">

    <div class=\"form-container sign-up-container\">
      <form method=\"post\" action=\"{{ path('app_register') }}\">
        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('register') }}\">

        <h1>Creer un compte</h1>
        <span>Rejoignez l'univers NEXA</span>

        {% if errors.csrf is defined %}
          <small class=\"error-text\">{{ errors.csrf }}</small>
        {% endif %}

        <input type=\"text\" name=\"nom\" placeholder=\"Nom complet\" value=\"{{ old_nom|default('') }}\" required>
        {% if errors.nom is defined %}
          <small class=\"error-text\">{{ errors.nom }}</small>
        {% endif %}

        <input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"{{ old_email|default('') }}\" required>
        {% if errors.email is defined %}
          <small class=\"error-text\">{{ errors.email }}</small>
        {% endif %}

        <div class=\"password-wrapper\">
          <input type=\"password\" name=\"password\" id=\"register-password\" placeholder=\"Mot de passe\" required>
          <span class=\"toggle-password\" id=\"toggleRegisterPassword\">Afficher</span>
        </div>

        {% if errors.password is defined %}
          <small class=\"error-text\">{{ errors.password }}</small>
        {% endif %}

        <button type=\"submit\">S'inscrire</button>
        <button type=\"button\" class=\"switch-link\" id=\"goSignIn\">J'ai deja un compte</button>
      </form>
    </div>

    <div class=\"form-container sign-in-container\">
      <form method=\"post\" action=\"{{ path('app_login') }}\">
        <h1>Connexion</h1>

        {% for message in app.flashes('success') %}
          <div class=\"success\">{{ message }}</div>
        {% endfor %}

        <span>Accedez a votre espace</span>

        {% if error is defined and error %}
          <div class=\"error\">
            {{ error.messageKey|trans(error.messageData, 'security') }}
          </div>
        {% endif %}

        <input type=\"email\" name=\"email\" value=\"{{ last_username|default('') }}\" placeholder=\"Email\" required>
        <input type=\"password\" name=\"password\" placeholder=\"Mot de passe\" required>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

        <button type=\"submit\">Se connecter</button>
        <button type=\"button\" class=\"switch-link\" id=\"goSignUp\">Creer un compte</button>
      </form>
    </div>

    <div class=\"overlay-container\">
      <div class=\"overlay\">
        <div class=\"overlay-panel overlay-left\">
          <h1 class=\"overlay-title\">
            Bon retour <img src=\"{{ asset('images/logo-n.png') }}\" alt=\"NEXA\">
          </h1>
          <p>Votre organisation commence ici</p>
          <button class=\"ghost\" id=\"signIn\" type=\"button\">Connexion</button>
        </div>

        <div class=\"overlay-panel overlay-right\">
          <h1 class=\"overlay-title\">
            Bienvenue <img src=\"{{ asset('images/logo-n.png') }}\" alt=\"NEXA\">
          </h1>
          <p>NEXA organise votre quotidien</p>
          <button class=\"ghost\" id=\"signUp\" type=\"button\">Inscription</button>
        </div>
      </div>
    </div>

  </div>
</div>
{% endblock %}

{% block javascripts %}
<script>
  window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>
<script src=\"{{ asset('js/loginn.js') }}\"></script>
{% endblock %}
", "security/login.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\security\\login.html.twig");
    }
}
