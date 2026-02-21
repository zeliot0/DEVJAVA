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

/* layout/sidebar.html.twig */
class __TwigTemplate_1f59fa0b36cb815ce6e2164c7237edea extends Template
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
            'sidebar_menu' => [$this, 'block_sidebar_menu'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/sidebar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layout/sidebar.html.twig"));

        // line 1
        yield "<aside class=\"sidebar\">

  <!-- HEADER -->
  <div class=\"sb-head\">
    <div class=\"sb-brand\">
      <div class=\"sb-logo\">
        <i class=\"fa-solid fa-bolt\"></i>
      </div>
      <div class=\"sb-txt\">
        <div class=\"sb-title\">NEXA</div>
        <div class=\"sb-sub\">
          <span class=\"dot-online\"></span> Online
        </div>
      </div>
    </div>
  </div>

  <!-- MENU DYNAMIQUE -->
  ";
        // line 19
        yield from $this->unwrap()->yieldBlock('sidebar_menu', $context, $blocks);
        // line 20
        yield "
  <!-- ESPACE -->
  <div class=\"sb-sep\"></div>
<div class=\"sb-section\">Application</div>

<nav class=\"sb-nav\">

  <a href=\"#\" class=\"sb-item active\">
    <i class=\"fa-solid fa-house\"></i>
    <span>Accueil</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-list-check\"></i>
    <span>Tâches</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-box\"></i>
    <span>Packages</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-brain\"></i>
    <span>Conscience</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-bullseye\"></i>
    <span>Goals</span>
  </a>

</nav>
  <!-- PROFIL -->
  <div class=\"sb-profile\">
    <div class=\"sb-prof-top\">
      <div class=\"sb-avatar\">
        ";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 57, $this->source); })()), "user", [], "any", false, false, false, 57), "nom", [], "any", false, false, false, 57))), "html", null, true);
        yield "
      </div>
      <div class=\"sb-prof-txt\">
        <div class=\"sb-prof-name\">";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 60, $this->source); })()), "user", [], "any", false, false, false, 60), "nom", [], "any", false, false, false, 60), "html", null, true);
        yield "</div>
        <div class=\"sb-prof-role\">
          ";
        // line 62
        yield (((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Admin") : ("User"));
        yield "
        </div>
      </div>
    </div>

    <a href=\"";
        // line 67
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"sb-logout\">
      <i class=\"fa-solid fa-right-from-bracket\"></i>
      <span>Log out</span>
    </a>
  </div>


</aside>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 19
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_sidebar_menu(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_menu"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sidebar_menu"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "layout/sidebar.html.twig";
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
        return array (  149 => 19,  129 => 67,  121 => 62,  116 => 60,  110 => 57,  71 => 20,  69 => 19,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<aside class=\"sidebar\">

  <!-- HEADER -->
  <div class=\"sb-head\">
    <div class=\"sb-brand\">
      <div class=\"sb-logo\">
        <i class=\"fa-solid fa-bolt\"></i>
      </div>
      <div class=\"sb-txt\">
        <div class=\"sb-title\">NEXA</div>
        <div class=\"sb-sub\">
          <span class=\"dot-online\"></span> Online
        </div>
      </div>
    </div>
  </div>

  <!-- MENU DYNAMIQUE -->
  {% block sidebar_menu %}{% endblock %}

  <!-- ESPACE -->
  <div class=\"sb-sep\"></div>
<div class=\"sb-section\">Application</div>

<nav class=\"sb-nav\">

  <a href=\"#\" class=\"sb-item active\">
    <i class=\"fa-solid fa-house\"></i>
    <span>Accueil</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-list-check\"></i>
    <span>Tâches</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-box\"></i>
    <span>Packages</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-brain\"></i>
    <span>Conscience</span>
  </a>

  <a href=\"#\" class=\"sb-item\">
    <i class=\"fa-solid fa-bullseye\"></i>
    <span>Goals</span>
  </a>

</nav>
  <!-- PROFIL -->
  <div class=\"sb-profile\">
    <div class=\"sb-prof-top\">
      <div class=\"sb-avatar\">
        {{ app.user.nom|first|upper }}
      </div>
      <div class=\"sb-prof-txt\">
        <div class=\"sb-prof-name\">{{ app.user.nom }}</div>
        <div class=\"sb-prof-role\">
          {{ is_granted('ROLE_ADMIN') ? 'Admin' : 'User' }}
        </div>
      </div>
    </div>

    <a href=\"{{ path('app_logout') }}\" class=\"sb-logout\">
      <i class=\"fa-solid fa-right-from-bracket\"></i>
      <span>Log out</span>
    </a>
  </div>


</aside>
", "layout/sidebar.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\layout\\sidebar.html.twig");
    }
}
