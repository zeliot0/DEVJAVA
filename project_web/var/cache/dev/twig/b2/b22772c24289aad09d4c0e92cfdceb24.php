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

/* home/landing.html.twig */
class __TwigTemplate_a15cff7892becf94f652d2d64c8eb640 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/landing.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/landing.html.twig"));

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

        yield "Accueil - NEXA";
        
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
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/home.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/landing.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/nexa-nav.css?v=20260220a"), "html", null, true);
        yield "\">
    <style>
        /* Fix scoped to Bienvenue page: enforce user profile pill style */
        .header-actions-new > .user-quick-nav {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            height: 52px !important;
            min-width: 190px !important;
            padding: 6px 12px !important;
            border-radius: 16px !important;
            border: 1px solid var(--border) !important;
            background: rgba(var(--surface-rgb), 0.5) !important;
            color: var(--text) !important;
            text-decoration: none !important;
            line-height: 1 !important;
            margin: 0 !important;
        }
        .header-actions-new > .user-quick-nav .uq-meta {
            display: flex !important;
            flex-direction: column !important;
            line-height: 1.1 !important;
        }
        .header-actions-new > .user-quick-nav .uq-avatar {
            width: 44px !important;
            height: 44px !important;
            border-radius: 50% !important;
            background: var(--gradient) !important;
            color: #fff !important;
            display: grid !important;
            place-items: center !important;
            font-weight: 900 !important;
            box-shadow: 0 8px 20px rgba(91, 92, 240, 0.28) !important;
        }
    </style>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 47
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

        // line 48
        yield "    ";
        $context["currentRoute"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 48), "attributes", [], "any", false, true, false, 48), "get", ["_route"], "method", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 48, $this->source); })()), "request", [], "any", false, false, false, 48), "attributes", [], "any", false, false, false, 48), "get", ["_route"], "method", false, false, false, 48), "")) : (""));
        // line 49
        yield "    <div class=\"backdrop-new\" id=\"backdropNav\" aria-hidden=\"true\"></div>

    <header class=\"navbar-custom\" id=\"topbarNav\">
        <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_landing");
        yield "\" class=\"logo-new\">NEXA</a>

        <nav class=\"desktop-nav\" aria-label=\"Main Navigation\">
            <div class=\"nav-pill-new\">
                <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_index");
        yield "\" id=\"nav_1\" class=\"";
        yield (((((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 56, $this->source); })()) == "app_landing") || (is_string($_v0 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 56, $this->source); })())) && is_string($_v1 = "app_task_") && str_starts_with($_v0, $_v1)))) ? ("active") : (""));
        yield "\">TASKS</a>
                <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" id=\"nav_2\" class=\"";
        yield ((CoreExtension::inFilter((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 57, $this->source); })()), ["app_conscience_index", "user_theme_index", "app_theme_answer", "app_theme_rapport", "app_theme_rapport_pdf", "app_user_answer"])) ? ("active") : (""));
        yield "\">CONSCIENCE</a>
                <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" id=\"nav_3\" class=\"";
        yield (((((((((is_string($_v2 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v3 = "app_goal_") && str_starts_with($_v2, $_v3)) || (is_string($_v4 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v5 = "app_motivation_") && str_starts_with($_v4, $_v5))) || (is_string($_v6 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v7 = "app_milestones_") && str_starts_with($_v6, $_v7))) || (is_string($_v8 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v9 = "app_time_message_") && str_starts_with($_v8, $_v9))) || (is_string($_v10 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v11 = "app_phoenix_goal_") && str_starts_with($_v10, $_v11))) || (is_string($_v12 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v13 = "app_theme_") && str_starts_with($_v12, $_v13))) || (is_string($_v14 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 58, $this->source); })())) && is_string($_v15 = "app_question_") && str_starts_with($_v14, $_v15)))) ? ("active") : (""));
        yield "\">GOALS</a>
                <a href=\"";
        // line 59
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" id=\"nav_4\" class=\"";
        yield ((((is_string($_v16 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 59, $this->source); })())) && is_string($_v17 = "app_produit_") && str_starts_with($_v16, $_v17)) || (is_string($_v18 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 59, $this->source); })())) && is_string($_v19 = "app_mouvement_") && str_starts_with($_v18, $_v19)))) ? ("active") : (""));
        yield "\">PRODUIT</a>
            </div>
        </nav>
        <div class=\"goals-popover-menu\" id=\"goalsPopoverNav\" hidden>
            <a href=\"";
        // line 63
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\"><i class=\"fa-solid fa-bullseye\"></i> Objectifs</a>
            <a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\"><i class=\"fa-solid fa-flag\"></i> Jalons</a>
            <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\"><i class=\"fa-solid fa-heart\"></i> Motivation</a>
            <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\"><i class=\"fa-solid fa-clock\"></i> Time Message</a>
            <a href=\"";
        // line 67
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_index");
        yield "\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goal</a>
        </div>

        <div class=\"header-actions-new\">
            <form class=\"search-new\" id=\"searchFormNav\" autocomplete=\"off\">
                <i class=\"fa-solid fa-magnifying-glass\" style=\"opacity:0.6\"></i>
                <input id=\"searchInputNav\" type=\"search\" placeholder=\"Search...\" />
                <button class=\"search-btn-new\" type=\"submit\"><i class=\"fa-solid fa-arrow-right\"></i></button>
            </form>

            <div class=\"lang-switch-new\">
                <button class=\"lang-btn-new\" id=\"langBtnNav\" type=\"button\">
                    <i class=\"fa-solid fa-globe\"></i>
                    <span id=\"currentLangNav\">FR</span>
                </button>
                <div class=\"lang-menu-new\" id=\"langMenuNav\">
                    <div data-lang=\"fr\">FR</div>
                    <div data-lang=\"en\">EN</div>
                    <div data-lang=\"ar\">AR</div>
                </div>
            </div>

            <button class=\"icon-btn\" id=\"themeToggleNav\" type=\"button\"><i class=\"fa-solid fa-moon\"></i></button>
            <div class=\"user-menu-nav\">
                <button type=\"button\" class=\"user-quick-nav user-menu-trigger-nav\" id=\"userMenuTriggerNav\" aria-expanded=\"false\" aria-controls=\"userMenuDropdownNav\">
                    <span class=\"uq-meta\">
                        <strong>";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 93, $this->source); })()), "user", [], "any", false, false, false, 93), "nom", [], "any", false, false, false, 93)), "html", null, true);
        yield "</strong>
                        <small>Plan Starter</small>
                    </span>
                    <span class=\"uq-avatar\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 96, $this->source); })()), "user", [], "any", false, false, false, 96), "nom", [], "any", false, false, false, 96))), "html", null, true);
        yield "</span>
                    <i class=\"fa-solid fa-chevron-down\"></i>
                </button>
                <div class=\"user-menu-dropdown-nav\" id=\"userMenuDropdownNav\" hidden>
                    <a href=\"";
        // line 100
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\"><i class=\"fa-regular fa-user\"></i> Mon profil</a>
                    ";
        // line 101
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 102
            yield "                        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
            yield "\"><i class=\"fa-solid fa-shield-halved\"></i> Dashboard</a>
                    ";
        }
        // line 104
        yield "                    <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"danger\"><i class=\"fa-solid fa-right-from-bracket\"></i> Deconnexion</a>
                </div>
            </div>
            <button class=\"icon-btn burger-new\" id=\"menuBtnNav\" type=\"button\"><i class=\"fa-solid fa-bars\"></i></button>
        </div>
    </header>

    <div class=\"solidarity-banner\" id=\"bannerNav\">
        <div class=\"solidarity-track\" id=\"bannerTrackNav\">
            <div class=\"solidarity-item\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"Palestine\">
                <span id=\"bannerTextNav\"><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
            <div class=\"solidarity-item\" aria-hidden=\"true\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"\">
                <span id=\"bannerTextCloneNav\"><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
            <div class=\"solidarity-item\" aria-hidden=\"true\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"\">
                <span><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
        </div>
    </div>

    <aside class=\"drawer-new\" id=\"drawerNav\">
        <div class=\"drawer-top-new\">
            <div class=\"drawer-title-new\" id=\"drawerTitleNav\">NEXA</div>
            <button class=\"icon-btn\" id=\"closeDrawerNav\" type=\"button\"><i class=\"fa-solid fa-xmark\"></i></button>
        </div>

        <form class=\"search-new\" id=\"searchFormMobileNav\" style=\"display:flex; min-width:unset\">
            <i class=\"fa-solid fa-magnifying-glass\"></i>
            <input id=\"searchInputMobileNav\" type=\"search\" placeholder=\"Search...\" />
        </form>

        <nav class=\"drawer-nav-new\">
            <a href=\"";
        // line 140
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_index");
        yield "\" id=\"mnav_1\">TASKS</a>
            <a href=\"";
        // line 141
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" id=\"mnav_2\">CONSCIENCE</a>
            <a href=\"";
        // line 142
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" id=\"mnav_3\">GOALS</a>
            <div class=\"drawer-goals-subnav\">
                <a href=\"";
        // line 144
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"";
        yield (((is_string($_v20 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 144, $this->source); })())) && is_string($_v21 = "app_goal_") && str_starts_with($_v20, $_v21))) ? ("active") : (""));
        yield "\">
                    <i class=\"fa-solid fa-bullseye\"></i> Objectifs
                </a>
                <a href=\"";
        // line 147
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"";
        yield (((is_string($_v22 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 147, $this->source); })())) && is_string($_v23 = "app_milestones_") && str_starts_with($_v22, $_v23))) ? ("active") : (""));
        yield "\">
                    <i class=\"fa-solid fa-flag\"></i> Jalons
                </a>
                <a href=\"";
        // line 150
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\" class=\"";
        yield (((is_string($_v24 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 150, $this->source); })())) && is_string($_v25 = "app_motivation_") && str_starts_with($_v24, $_v25))) ? ("active") : (""));
        yield "\">
                    <i class=\"fa-solid fa-heart\"></i> Motivation
                </a>
                <a href=\"";
        // line 153
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\" class=\"";
        yield (((is_string($_v26 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 153, $this->source); })())) && is_string($_v27 = "app_time_message_") && str_starts_with($_v26, $_v27))) ? ("active") : (""));
        yield "\">
                    <i class=\"fa-solid fa-clock\"></i> Time Message
                </a>
                <a href=\"";
        // line 156
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_index");
        yield "\" class=\"";
        yield (((is_string($_v28 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 156, $this->source); })())) && is_string($_v29 = "app_phoenix_goal_") && str_starts_with($_v28, $_v29))) ? ("active") : (""));
        yield "\">
                    <i class=\"fa-solid fa-fire\"></i> Phoenix Goal
                </a>
            </div>
            <a href=\"";
        // line 160
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" id=\"mnav_4\">PRODUIT</a>
        </nav>

        <a href=\"";
        // line 163
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"cta-new\" style=\"margin-top:auto; text-align:center;\">Mon profil</a>
    </aside>

    <div class=\"toast-new\" id=\"toastNav\"></div>

    <section class=\"welcome-hero\">
        <div class=\"welcome-content\">
            <h1 class=\"welcome-title\">
                Bienvenue ";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 171), "nom", [], "any", true, true, false, 171)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "user", [], "any", false, false, false, 171), "nom", [], "any", false, false, false, 171), CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "user", [], "any", false, false, false, 171), "email", [], "any", false, false, false, 171), "@"), 0, [], "array", false, false, false, 171))) : (CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 171, $this->source); })()), "user", [], "any", false, false, false, 171), "email", [], "any", false, false, false, 171), "@"), 0, [], "array", false, false, false, 171)))), "html", null, true);
        yield "
            </h1>
            <p class=\"welcome-subtitle\">
                Votre espace de travail intelligent pour maitriser votre quotidien
            </p>
        </div>
    </section>

    <section class=\"overview-section\">
        <div class=\"overview-grid\">
            <div class=\"overview-card primary\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon\"><i class=\"fas fa-list-check\"></i></div>
                    <div class=\"overview-badge\">8 actives</div>
                </div>
                <h3 class=\"overview-title\">Taches du jour</h3>
                <p class=\"overview-desc\">3 priorite haute · 5 en cours</p>
            </div>

            <div class=\"overview-card\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon accent\"><i class=\"fas fa-brain\"></i></div>
                    <div class=\"overview-badge success\">Actif</div>
                </div>
                <h3 class=\"overview-title\">Conscience</h3>
                <p class=\"overview-desc\">Priorisation intelligente activee</p>
            </div>

            <div class=\"overview-card\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon goals\"><i class=\"fas fa-bullseye\"></i></div>
                    <div class=\"overview-badge warning\">2/5</div>
                </div>
                <h3 class=\"overview-title\">Objectifs</h3>
                <p class=\"overview-desc\">Progression de la semaine</p>
            </div>
        </div>
    </section>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 211
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

        // line 212
        yield "    <script src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/nexa-nav.js?v=20260220b"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 213
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/home.js"), "html", null, true);
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
        return "home/landing.html.twig";
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
        return array (  464 => 213,  459 => 212,  446 => 211,  396 => 171,  385 => 163,  379 => 160,  370 => 156,  362 => 153,  354 => 150,  346 => 147,  338 => 144,  333 => 142,  329 => 141,  325 => 140,  285 => 104,  279 => 102,  277 => 101,  273 => 100,  266 => 96,  260 => 93,  231 => 67,  227 => 66,  223 => 65,  219 => 64,  215 => 63,  206 => 59,  200 => 58,  194 => 57,  188 => 56,  181 => 52,  176 => 49,  173 => 48,  160 => 47,  111 => 8,  107 => 7,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'base.html.twig' %}

{% block title %}Accueil - NEXA{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/home.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/landing.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/nexa-nav.css?v=20260220a') }}\">
    <style>
        /* Fix scoped to Bienvenue page: enforce user profile pill style */
        .header-actions-new > .user-quick-nav {
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            height: 52px !important;
            min-width: 190px !important;
            padding: 6px 12px !important;
            border-radius: 16px !important;
            border: 1px solid var(--border) !important;
            background: rgba(var(--surface-rgb), 0.5) !important;
            color: var(--text) !important;
            text-decoration: none !important;
            line-height: 1 !important;
            margin: 0 !important;
        }
        .header-actions-new > .user-quick-nav .uq-meta {
            display: flex !important;
            flex-direction: column !important;
            line-height: 1.1 !important;
        }
        .header-actions-new > .user-quick-nav .uq-avatar {
            width: 44px !important;
            height: 44px !important;
            border-radius: 50% !important;
            background: var(--gradient) !important;
            color: #fff !important;
            display: grid !important;
            place-items: center !important;
            font-weight: 900 !important;
            box-shadow: 0 8px 20px rgba(91, 92, 240, 0.28) !important;
        }
    </style>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>
    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">
{% endblock %}

{% block body %}
    {% set currentRoute = app.request.attributes.get('_route')|default('') %}
    <div class=\"backdrop-new\" id=\"backdropNav\" aria-hidden=\"true\"></div>

    <header class=\"navbar-custom\" id=\"topbarNav\">
        <a href=\"{{ path('app_landing') }}\" class=\"logo-new\">NEXA</a>

        <nav class=\"desktop-nav\" aria-label=\"Main Navigation\">
            <div class=\"nav-pill-new\">
                <a href=\"{{ path('app_task_index') }}\" id=\"nav_1\" class=\"{{ currentRoute == 'app_landing' or currentRoute starts with 'app_task_' ? 'active' : '' }}\">TASKS</a>
                <a href=\"{{ path('app_conscience_index') }}\" id=\"nav_2\" class=\"{{ currentRoute in ['app_conscience_index', 'user_theme_index', 'app_theme_answer', 'app_theme_rapport', 'app_theme_rapport_pdf', 'app_user_answer'] ? 'active' : '' }}\">CONSCIENCE</a>
                <a href=\"{{ path('app_goal_index') }}\" id=\"nav_3\" class=\"{{ currentRoute starts with 'app_goal_' or currentRoute starts with 'app_motivation_' or currentRoute starts with 'app_milestones_' or currentRoute starts with 'app_time_message_' or currentRoute starts with 'app_phoenix_goal_' or currentRoute starts with 'app_theme_' or currentRoute starts with 'app_question_' ? 'active' : '' }}\">GOALS</a>
                <a href=\"{{ path('app_produit_index') }}\" id=\"nav_4\" class=\"{{ currentRoute starts with 'app_produit_' or currentRoute starts with 'app_mouvement_' ? 'active' : '' }}\">PRODUIT</a>
            </div>
        </nav>
        <div class=\"goals-popover-menu\" id=\"goalsPopoverNav\" hidden>
            <a href=\"{{ path('app_goal_index') }}\"><i class=\"fa-solid fa-bullseye\"></i> Objectifs</a>
            <a href=\"{{ path('app_milestones_index') }}\"><i class=\"fa-solid fa-flag\"></i> Jalons</a>
            <a href=\"{{ path('app_motivation_index') }}\"><i class=\"fa-solid fa-heart\"></i> Motivation</a>
            <a href=\"{{ path('app_time_message_index') }}\"><i class=\"fa-solid fa-clock\"></i> Time Message</a>
            <a href=\"{{ path('app_phoenix_goal_index') }}\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goal</a>
        </div>

        <div class=\"header-actions-new\">
            <form class=\"search-new\" id=\"searchFormNav\" autocomplete=\"off\">
                <i class=\"fa-solid fa-magnifying-glass\" style=\"opacity:0.6\"></i>
                <input id=\"searchInputNav\" type=\"search\" placeholder=\"Search...\" />
                <button class=\"search-btn-new\" type=\"submit\"><i class=\"fa-solid fa-arrow-right\"></i></button>
            </form>

            <div class=\"lang-switch-new\">
                <button class=\"lang-btn-new\" id=\"langBtnNav\" type=\"button\">
                    <i class=\"fa-solid fa-globe\"></i>
                    <span id=\"currentLangNav\">FR</span>
                </button>
                <div class=\"lang-menu-new\" id=\"langMenuNav\">
                    <div data-lang=\"fr\">FR</div>
                    <div data-lang=\"en\">EN</div>
                    <div data-lang=\"ar\">AR</div>
                </div>
            </div>

            <button class=\"icon-btn\" id=\"themeToggleNav\" type=\"button\"><i class=\"fa-solid fa-moon\"></i></button>
            <div class=\"user-menu-nav\">
                <button type=\"button\" class=\"user-quick-nav user-menu-trigger-nav\" id=\"userMenuTriggerNav\" aria-expanded=\"false\" aria-controls=\"userMenuDropdownNav\">
                    <span class=\"uq-meta\">
                        <strong>{{ app.user.nom|capitalize }}</strong>
                        <small>Plan Starter</small>
                    </span>
                    <span class=\"uq-avatar\">{{ app.user.nom|first|upper }}</span>
                    <i class=\"fa-solid fa-chevron-down\"></i>
                </button>
                <div class=\"user-menu-dropdown-nav\" id=\"userMenuDropdownNav\" hidden>
                    <a href=\"{{ path('app_profile') }}\"><i class=\"fa-regular fa-user\"></i> Mon profil</a>
                    {% if is_granted('ROLE_ADMIN') %}
                        <a href=\"{{ path('admin_dashboard') }}\"><i class=\"fa-solid fa-shield-halved\"></i> Dashboard</a>
                    {% endif %}
                    <a href=\"{{ path('app_logout') }}\" class=\"danger\"><i class=\"fa-solid fa-right-from-bracket\"></i> Deconnexion</a>
                </div>
            </div>
            <button class=\"icon-btn burger-new\" id=\"menuBtnNav\" type=\"button\"><i class=\"fa-solid fa-bars\"></i></button>
        </div>
    </header>

    <div class=\"solidarity-banner\" id=\"bannerNav\">
        <div class=\"solidarity-track\" id=\"bannerTrackNav\">
            <div class=\"solidarity-item\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"Palestine\">
                <span id=\"bannerTextNav\"><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
            <div class=\"solidarity-item\" aria-hidden=\"true\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"\">
                <span id=\"bannerTextCloneNav\"><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
            <div class=\"solidarity-item\" aria-hidden=\"true\">
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Palestine.svg\" alt=\"\">
                <span><strong>Stand for Freedom</strong> • Justice • Dignity • Humanity</span>
            </div>
        </div>
    </div>

    <aside class=\"drawer-new\" id=\"drawerNav\">
        <div class=\"drawer-top-new\">
            <div class=\"drawer-title-new\" id=\"drawerTitleNav\">NEXA</div>
            <button class=\"icon-btn\" id=\"closeDrawerNav\" type=\"button\"><i class=\"fa-solid fa-xmark\"></i></button>
        </div>

        <form class=\"search-new\" id=\"searchFormMobileNav\" style=\"display:flex; min-width:unset\">
            <i class=\"fa-solid fa-magnifying-glass\"></i>
            <input id=\"searchInputMobileNav\" type=\"search\" placeholder=\"Search...\" />
        </form>

        <nav class=\"drawer-nav-new\">
            <a href=\"{{ path('app_task_index') }}\" id=\"mnav_1\">TASKS</a>
            <a href=\"{{ path('app_conscience_index') }}\" id=\"mnav_2\">CONSCIENCE</a>
            <a href=\"{{ path('app_goal_index') }}\" id=\"mnav_3\">GOALS</a>
            <div class=\"drawer-goals-subnav\">
                <a href=\"{{ path('app_goal_index') }}\" class=\"{{ currentRoute starts with 'app_goal_' ? 'active' : '' }}\">
                    <i class=\"fa-solid fa-bullseye\"></i> Objectifs
                </a>
                <a href=\"{{ path('app_milestones_index') }}\" class=\"{{ currentRoute starts with 'app_milestones_' ? 'active' : '' }}\">
                    <i class=\"fa-solid fa-flag\"></i> Jalons
                </a>
                <a href=\"{{ path('app_motivation_index') }}\" class=\"{{ currentRoute starts with 'app_motivation_' ? 'active' : '' }}\">
                    <i class=\"fa-solid fa-heart\"></i> Motivation
                </a>
                <a href=\"{{ path('app_time_message_index') }}\" class=\"{{ currentRoute starts with 'app_time_message_' ? 'active' : '' }}\">
                    <i class=\"fa-solid fa-clock\"></i> Time Message
                </a>
                <a href=\"{{ path('app_phoenix_goal_index') }}\" class=\"{{ currentRoute starts with 'app_phoenix_goal_' ? 'active' : '' }}\">
                    <i class=\"fa-solid fa-fire\"></i> Phoenix Goal
                </a>
            </div>
            <a href=\"{{ path('app_produit_index') }}\" id=\"mnav_4\">PRODUIT</a>
        </nav>

        <a href=\"{{ path('app_profile') }}\" class=\"cta-new\" style=\"margin-top:auto; text-align:center;\">Mon profil</a>
    </aside>

    <div class=\"toast-new\" id=\"toastNav\"></div>

    <section class=\"welcome-hero\">
        <div class=\"welcome-content\">
            <h1 class=\"welcome-title\">
                Bienvenue {{ app.user.nom|default(app.user.email|split('@')[0])|capitalize }}
            </h1>
            <p class=\"welcome-subtitle\">
                Votre espace de travail intelligent pour maitriser votre quotidien
            </p>
        </div>
    </section>

    <section class=\"overview-section\">
        <div class=\"overview-grid\">
            <div class=\"overview-card primary\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon\"><i class=\"fas fa-list-check\"></i></div>
                    <div class=\"overview-badge\">8 actives</div>
                </div>
                <h3 class=\"overview-title\">Taches du jour</h3>
                <p class=\"overview-desc\">3 priorite haute · 5 en cours</p>
            </div>

            <div class=\"overview-card\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon accent\"><i class=\"fas fa-brain\"></i></div>
                    <div class=\"overview-badge success\">Actif</div>
                </div>
                <h3 class=\"overview-title\">Conscience</h3>
                <p class=\"overview-desc\">Priorisation intelligente activee</p>
            </div>

            <div class=\"overview-card\">
                <div class=\"overview-header\">
                    <div class=\"overview-icon goals\"><i class=\"fas fa-bullseye\"></i></div>
                    <div class=\"overview-badge warning\">2/5</div>
                </div>
                <h3 class=\"overview-title\">Objectifs</h3>
                <p class=\"overview-desc\">Progression de la semaine</p>
            </div>
        </div>
    </section>
{% endblock %}

{% block javascripts %}
    <script src=\"{{ asset('assets/nexa-nav.js?v=20260220b') }}\"></script>
    <script src=\"{{ asset('js/home.js') }}\"></script>
{% endblock %}




", "home/landing.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\home\\landing.html.twig");
    }
}
