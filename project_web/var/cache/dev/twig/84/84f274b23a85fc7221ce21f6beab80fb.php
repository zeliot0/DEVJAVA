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

/* theme/base.html.twig */
class __TwigTemplate_7baf42bab0ebd6152cbdc0d0984c5324 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "theme/base.html.twig"));

        // line 1
        yield "﻿<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\" dir=\"ltr\">
<head>
    <meta charset=\"UTF-8\">

    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>

    <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/base.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/nexaa.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/ui-refine.css?v=20260213af"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/stock-pages.css?v=20260213c"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/premium-refine.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/global-bubbles-bg.css?v=20260214a"), "html", null, true);
        yield "\">
    ";
        // line 19
        $context["__route"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 19), "attributes", [], "any", false, true, false, 19), "get", ["_route"], "method", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "request", [], "any", false, false, false, 19), "attributes", [], "any", false, false, false, 19), "get", ["_route"], "method", false, false, false, 19), "")) : (""));
        // line 20
        yield "    ";
        if ((((((is_string($_v0 = (isset($context["__route"]) || array_key_exists("__route", $context) ? $context["__route"] : (function () { throw new RuntimeError('Variable "__route" does not exist.', 20, $this->source); })())) && is_string($_v1 = "app_goal_") && str_starts_with($_v0, $_v1)) || (is_string($_v2 = (isset($context["__route"]) || array_key_exists("__route", $context) ? $context["__route"] : (function () { throw new RuntimeError('Variable "__route" does not exist.', 20, $this->source); })())) && is_string($_v3 = "app_motivation_") && str_starts_with($_v2, $_v3))) || (is_string($_v4 = (isset($context["__route"]) || array_key_exists("__route", $context) ? $context["__route"] : (function () { throw new RuntimeError('Variable "__route" does not exist.', 20, $this->source); })())) && is_string($_v5 = "app_milestones_") && str_starts_with($_v4, $_v5))) || (is_string($_v6 = (isset($context["__route"]) || array_key_exists("__route", $context) ? $context["__route"] : (function () { throw new RuntimeError('Variable "__route" does not exist.', 20, $this->source); })())) && is_string($_v7 = "app_time_message_") && str_starts_with($_v6, $_v7))) || (is_string($_v8 = (isset($context["__route"]) || array_key_exists("__route", $context) ? $context["__route"] : (function () { throw new RuntimeError('Variable "__route" does not exist.', 20, $this->source); })())) && is_string($_v9 = "app_phoenix_goal_") && str_starts_with($_v8, $_v9)))) {
            // line 21
            yield "        <link rel=\"stylesheet\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
            yield "\">
    ";
        }
        // line 23
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/nexa-nav.css?v=20260220a"), "html", null, true);
        yield "\">
    ";
        // line 24
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 25
        yield "    <link rel=\"stylesheet\" href=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/page-white-bg-overrides.css?v=20260214d"), "html", null, true);
        yield "\">
</head>

";
        // line 28
        $context["currentRoute"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 28), "attributes", [], "any", false, true, false, 28), "get", ["_route"], "method", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "request", [], "any", false, false, false, 28), "attributes", [], "any", false, false, false, 28), "get", ["_route"], "method", false, false, false, 28), "")) : (""));
        // line 29
        $context["isStockRoute"] = ((is_string($_v10 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 29, $this->source); })())) && is_string($_v11 = "app_produit_") && str_starts_with($_v10, $_v11)) || (is_string($_v12 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 29, $this->source); })())) && is_string($_v13 = "app_mouvement_") && str_starts_with($_v12, $_v13)));
        // line 30
        $context["isConscienceRoute"] = (CoreExtension::inFilter((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 30, $this->source); })()), ["app_conscience_index", "user_theme_index", "app_theme_answer", "app_theme_rapport", "app_theme_rapport_pdf", "app_user_answer"]) || (is_string($_v14 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 30, $this->source); })())) && is_string($_v15 = "app_question_") && str_starts_with($_v14, $_v15)));
        // line 31
        $context["isGoalsRoute"] = (((((is_string($_v16 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 31, $this->source); })())) && is_string($_v17 = "app_goal_") && str_starts_with($_v16, $_v17)) || (is_string($_v18 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 31, $this->source); })())) && is_string($_v19 = "app_motivation_") && str_starts_with($_v18, $_v19))) || (is_string($_v20 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 31, $this->source); })())) && is_string($_v21 = "app_milestones_") && str_starts_with($_v20, $_v21))) || (is_string($_v22 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 31, $this->source); })())) && is_string($_v23 = "app_time_message_") && str_starts_with($_v22, $_v23))) || (is_string($_v24 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 31, $this->source); })())) && is_string($_v25 = "app_phoenix_goal_") && str_starts_with($_v24, $_v25)));
        // line 32
        $context["isMilestonesRoute"] = (is_string($_v26 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 32, $this->source); })())) && is_string($_v27 = "app_milestones_") && str_starts_with($_v26, $_v27));
        // line 33
        $context["isTaskRoute"] = (is_string($_v28 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 33, $this->source); })())) && is_string($_v29 = "app_task_") && str_starts_with($_v28, $_v29));
        // line 34
        $context["currentUserName"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34))) ? (Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34))) : ("Utilisateur"));
        // line 35
        $context["currentUserEmail"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "user", [], "any", false, false, false, 35) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "user", [], "any", false, false, false, 35), "email", [], "any", false, false, false, 35))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 35, $this->source); })()), "user", [], "any", false, false, false, 35), "email", [], "any", false, false, false, 35)) : (""));
        // line 36
        $context["currentUserInitial"] = (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "nom", [], "any", false, false, false, 36))) ? (Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "user", [], "any", false, false, false, 36), "nom", [], "any", false, false, false, 36)))) : ("U"));
        // line 37
        yield "
<body class=\"has-global-bubbles ";
        // line 38
        yield (((($tmp = (isset($context["isStockRoute"]) || array_key_exists("isStockRoute", $context) ? $context["isStockRoute"] : (function () { throw new RuntimeError('Variable "isStockRoute" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("stock-pages ") : (""));
        yield (((($tmp = (isset($context["isConscienceRoute"]) || array_key_exists("isConscienceRoute", $context) ? $context["isConscienceRoute"] : (function () { throw new RuntimeError('Variable "isConscienceRoute" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("conscience-page ") : (""));
        yield (((($tmp = (isset($context["isGoalsRoute"]) || array_key_exists("isGoalsRoute", $context) ? $context["isGoalsRoute"] : (function () { throw new RuntimeError('Variable "isGoalsRoute" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("goals-page-theme ") : (""));
        yield (((($tmp = (isset($context["isMilestonesRoute"]) || array_key_exists("isMilestonesRoute", $context) ? $context["isMilestonesRoute"] : (function () { throw new RuntimeError('Variable "isMilestonesRoute" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("milestones-page-theme ") : (""));
        yield (((($tmp = (isset($context["isTaskRoute"]) || array_key_exists("isTaskRoute", $context) ? $context["isTaskRoute"] : (function () { throw new RuntimeError('Variable "isTaskRoute" does not exist.', 38, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("task-page-theme") : (""));
        yield "\">

";
        // line 40
        yield Twig\Extension\CoreExtension::include($this->env, $context, "_global_bubbles_bg.html.twig");
        yield "

<div class=\"backdrop-new\" id=\"backdropNav\" aria-hidden=\"true\"></div>

<header class=\"navbar-custom\" id=\"topbarNav\">
    <a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_landing");
        yield "\" class=\"logo-new\">NEXA</a>

    <nav class=\"desktop-nav\" aria-label=\"Main Navigation\">
        <div class=\"nav-pill-new\">
            <a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_index");
        yield "\" id=\"nav_1\" class=\"";
        yield (((is_string($_v30 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 49, $this->source); })())) && is_string($_v31 = "app_task_") && str_starts_with($_v30, $_v31))) ? ("active") : (""));
        yield "\">TASKS</a>
            <a href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" id=\"nav_2\" class=\"";
        yield ((CoreExtension::inFilter((isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 50, $this->source); })()), ["app_conscience_index", "user_theme_index", "app_theme_answer", "app_theme_rapport", "app_theme_rapport_pdf", "app_user_answer"])) ? ("active") : (""));
        yield "\">CONSCIENCE</a>
            <a href=\"";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" id=\"nav_3\" class=\"";
        yield (((((((((is_string($_v32 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v33 = "app_goal_") && str_starts_with($_v32, $_v33)) || (is_string($_v34 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v35 = "app_motivation_") && str_starts_with($_v34, $_v35))) || (is_string($_v36 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v37 = "app_milestones_") && str_starts_with($_v36, $_v37))) || (is_string($_v38 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v39 = "app_time_message_") && str_starts_with($_v38, $_v39))) || (is_string($_v40 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v41 = "app_phoenix_goal_") && str_starts_with($_v40, $_v41))) || (is_string($_v42 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v43 = "app_theme_") && str_starts_with($_v42, $_v43))) || (is_string($_v44 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 51, $this->source); })())) && is_string($_v45 = "app_question_") && str_starts_with($_v44, $_v45)))) ? ("active") : (""));
        yield "\">GOALS</a>
            <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" id=\"nav_4\" class=\"";
        yield ((((is_string($_v46 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 52, $this->source); })())) && is_string($_v47 = "app_produit_") && str_starts_with($_v46, $_v47)) || (is_string($_v48 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 52, $this->source); })())) && is_string($_v49 = "app_mouvement_") && str_starts_with($_v48, $_v49)))) ? ("active") : (""));
        yield "\">PRODUIT</a>
        </div>
    </nav>
    <div class=\"goals-popover-menu\" id=\"goalsPopoverNav\" hidden>
        <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\"><i class=\"fa-solid fa-bullseye\"></i> Objectifs</a>
        <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\"><i class=\"fa-solid fa-flag\"></i> Jalons</a>
        <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\"><i class=\"fa-solid fa-heart\"></i> Motivation</a>
        <a href=\"";
        // line 59
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\"><i class=\"fa-solid fa-clock\"></i> Time Message</a>
        <a href=\"";
        // line 60
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_index");
        yield "\"><i class=\"fa-solid fa-fire\"></i> Phoenix Goal</a>
    </div>

    <div class=\"header-actions-new\">
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
        <button class=\"icon-btn burger-new\" id=\"menuBtnNav\" type=\"button\"><i class=\"fa-solid fa-bars\"></i></button>
        <div class=\"user-menu-nav\">
            <button type=\"button\" class=\"user-quick-nav user-menu-trigger-nav\" id=\"userMenuTriggerNav\" aria-expanded=\"false\" aria-controls=\"userMenuDropdownNav\">
                <span class=\"uq-meta\">
                    <strong>";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentUserName"]) || array_key_exists("currentUserName", $context) ? $context["currentUserName"] : (function () { throw new RuntimeError('Variable "currentUserName" does not exist.', 81, $this->source); })()), "html", null, true);
        yield "</strong>
                    <small>Plan Starter</small>
                </span>
                <span class=\"uq-avatar\">";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentUserInitial"]) || array_key_exists("currentUserInitial", $context) ? $context["currentUserInitial"] : (function () { throw new RuntimeError('Variable "currentUserInitial" does not exist.', 84, $this->source); })()), "html", null, true);
        yield "</span>
                <i class=\"fa-solid fa-chevron-down\"></i>
            </button>
            <div class=\"user-menu-dropdown-nav\" id=\"userMenuDropdownNav\" hidden>
                <a href=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\"><i class=\"fa-regular fa-user\"></i> Mon profil</a>
                ";
        // line 89
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 90
            yield "                    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
            yield "\"><i class=\"fa-solid fa-shield-halved\"></i> Dashboard</a>
                ";
        }
        // line 92
        yield "                <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"danger\"><i class=\"fa-solid fa-right-from-bracket\"></i> Deconnexion</a>
            </div>
        </div>
    </div>
</header>

<aside class=\"drawer-new\" id=\"drawerNav\">
    <div class=\"drawer-top-new\">
        <div class=\"drawer-title-new\" id=\"drawerTitleNav\">NEXA</div>
        <button class=\"icon-btn\" id=\"closeDrawerNav\" type=\"button\"><i class=\"fa-solid fa-xmark\"></i></button>
    </div>

    <nav class=\"drawer-nav-new\">
        <a href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_index");
        yield "\" id=\"mnav_1\">TASKS</a>
        <a href=\"";
        // line 106
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conscience_index");
        yield "\" id=\"mnav_2\">CONSCIENCE</a>
        <a href=\"";
        // line 107
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" id=\"mnav_3\">GOALS</a>
        <div class=\"drawer-goals-subnav\">
            <a href=\"";
        // line 109
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_goal_index");
        yield "\" class=\"";
        yield (((is_string($_v50 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 109, $this->source); })())) && is_string($_v51 = "app_goal_") && str_starts_with($_v50, $_v51))) ? ("active") : (""));
        yield "\">
                <i class=\"fa-solid fa-bullseye\"></i> Objectifs
            </a>
            <a href=\"";
        // line 112
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_milestones_index");
        yield "\" class=\"";
        yield (((is_string($_v52 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 112, $this->source); })())) && is_string($_v53 = "app_milestones_") && str_starts_with($_v52, $_v53))) ? ("active") : (""));
        yield "\">
                <i class=\"fa-solid fa-flag\"></i> Jalons
            </a>
            <a href=\"";
        // line 115
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\" class=\"";
        yield (((is_string($_v54 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 115, $this->source); })())) && is_string($_v55 = "app_motivation_") && str_starts_with($_v54, $_v55))) ? ("active") : (""));
        yield "\">
                <i class=\"fa-solid fa-heart\"></i> Motivation
            </a>
            <a href=\"";
        // line 118
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\" class=\"";
        yield (((is_string($_v56 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 118, $this->source); })())) && is_string($_v57 = "app_time_message_") && str_starts_with($_v56, $_v57))) ? ("active") : (""));
        yield "\">
                <i class=\"fa-solid fa-clock\"></i> Time Message
            </a>
            <a href=\"";
        // line 121
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_phoenix_goal_index");
        yield "\" class=\"";
        yield (((is_string($_v58 = (isset($context["currentRoute"]) || array_key_exists("currentRoute", $context) ? $context["currentRoute"] : (function () { throw new RuntimeError('Variable "currentRoute" does not exist.', 121, $this->source); })())) && is_string($_v59 = "app_phoenix_goal_") && str_starts_with($_v58, $_v59))) ? ("active") : (""));
        yield "\">
                <i class=\"fa-solid fa-fire\"></i> Phoenix Goal
            </a>
        </div>
        <a href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" id=\"mnav_4\">PRODUIT</a>
    </nav>

    <a href=\"";
        // line 128
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\" class=\"drawer-user-card\">
        <span class=\"uq-avatar\">";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentUserInitial"]) || array_key_exists("currentUserInitial", $context) ? $context["currentUserInitial"] : (function () { throw new RuntimeError('Variable "currentUserInitial" does not exist.', 129, $this->source); })()), "html", null, true);
        yield "</span>
        <span class=\"uq-meta\">
            <strong>";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentUserName"]) || array_key_exists("currentUserName", $context) ? $context["currentUserName"] : (function () { throw new RuntimeError('Variable "currentUserName" does not exist.', 131, $this->source); })()), "html", null, true);
        yield "</strong>
            <small>";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentUserEmail"]) || array_key_exists("currentUserEmail", $context) ? $context["currentUserEmail"] : (function () { throw new RuntimeError('Variable "currentUserEmail" does not exist.', 132, $this->source); })()), "html", null, true);
        yield "</small>
        </span>
    </a>
</aside>

<div class=\"toast-new\" id=\"toastNav\"></div>

<main style=\"padding-top: calc(var(--nav-height) + 10px);\">
    ";
        // line 140
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 141
        yield "</main>

<script src=\"";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/board.js"), "html", null, true);
        yield "\"></script>
<script src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/global-bubbles-bg.js?v=20260214a"), "html", null, true);
        yield "\"></script>
<script src=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/nexa-nav.js?v=20260220b"), "html", null, true);
        yield "\"></script>

";
        // line 147
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 148
        yield "
</body>
</html>










";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
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

        yield "NEXA";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 24
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 140
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 147
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "theme/base.html.twig";
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
        return array (  468 => 147,  446 => 140,  424 => 24,  401 => 6,  377 => 148,  375 => 147,  370 => 145,  366 => 144,  362 => 143,  358 => 141,  356 => 140,  345 => 132,  341 => 131,  336 => 129,  332 => 128,  326 => 125,  317 => 121,  309 => 118,  301 => 115,  293 => 112,  285 => 109,  280 => 107,  276 => 106,  272 => 105,  255 => 92,  249 => 90,  247 => 89,  243 => 88,  236 => 84,  230 => 81,  206 => 60,  202 => 59,  198 => 58,  194 => 57,  190 => 56,  181 => 52,  175 => 51,  169 => 50,  163 => 49,  156 => 45,  148 => 40,  139 => 38,  136 => 37,  134 => 36,  132 => 35,  130 => 34,  128 => 33,  126 => 32,  124 => 31,  122 => 30,  120 => 29,  118 => 28,  111 => 25,  109 => 24,  104 => 23,  98 => 21,  95 => 20,  93 => 19,  89 => 18,  85 => 17,  81 => 16,  77 => 15,  73 => 14,  69 => 13,  59 => 6,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\" dir=\"ltr\">
<head>
    <meta charset=\"UTF-8\">

    <title>{% block title %}NEXA{% endblock %}</title>

    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800;900&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>

    <link rel=\"stylesheet\" href=\"{{ asset('css/base.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/nexaa.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/ui-refine.css?v=20260213af') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/stock-pages.css?v=20260213c') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/premium-refine.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/global-bubbles-bg.css?v=20260214a') }}\">
    {% set __route = app.request.attributes.get('_route')|default('') %}
    {% if __route starts with 'app_goal_' or __route starts with 'app_motivation_' or __route starts with 'app_milestones_' or __route starts with 'app_time_message_' or __route starts with 'app_phoenix_goal_' %}
        <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
    {% endif %}
    <link rel=\"stylesheet\" href=\"{{ asset('assets/nexa-nav.css?v=20260220a') }}\">
    {% block stylesheets %}{% endblock %}
    <link rel=\"stylesheet\" href=\"{{ asset('css/page-white-bg-overrides.css?v=20260214d') }}\">
</head>

{% set currentRoute = app.request.attributes.get('_route')|default('') %}
{% set isStockRoute = currentRoute starts with 'app_produit_' or currentRoute starts with 'app_mouvement_' %}
{% set isConscienceRoute = currentRoute in ['app_conscience_index', 'user_theme_index', 'app_theme_answer', 'app_theme_rapport', 'app_theme_rapport_pdf', 'app_user_answer'] or currentRoute starts with 'app_question_' %}
{% set isGoalsRoute = currentRoute starts with 'app_goal_' or currentRoute starts with 'app_motivation_' or currentRoute starts with 'app_milestones_' or currentRoute starts with 'app_time_message_' or currentRoute starts with 'app_phoenix_goal_' %}
{% set isMilestonesRoute = currentRoute starts with 'app_milestones_' %}
{% set isTaskRoute = currentRoute starts with 'app_task_' %}
{% set currentUserName = app.user and app.user.nom ? app.user.nom|capitalize : 'Utilisateur' %}
{% set currentUserEmail = app.user and app.user.email ? app.user.email : '' %}
{% set currentUserInitial = app.user and app.user.nom ? app.user.nom|first|upper : 'U' %}

<body class=\"has-global-bubbles {{ isStockRoute ? 'stock-pages ' : '' }}{{ isConscienceRoute ? 'conscience-page ' : '' }}{{ isGoalsRoute ? 'goals-page-theme ' : '' }}{{ isMilestonesRoute ? 'milestones-page-theme ' : '' }}{{ isTaskRoute ? 'task-page-theme' : '' }}\">

{{ include('_global_bubbles_bg.html.twig') }}

<div class=\"backdrop-new\" id=\"backdropNav\" aria-hidden=\"true\"></div>

<header class=\"navbar-custom\" id=\"topbarNav\">
    <a href=\"{{ path('app_landing') }}\" class=\"logo-new\">NEXA</a>

    <nav class=\"desktop-nav\" aria-label=\"Main Navigation\">
        <div class=\"nav-pill-new\">
            <a href=\"{{ path('app_task_index') }}\" id=\"nav_1\" class=\"{{ currentRoute starts with 'app_task_' ? 'active' : '' }}\">TASKS</a>
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
        <button class=\"icon-btn burger-new\" id=\"menuBtnNav\" type=\"button\"><i class=\"fa-solid fa-bars\"></i></button>
        <div class=\"user-menu-nav\">
            <button type=\"button\" class=\"user-quick-nav user-menu-trigger-nav\" id=\"userMenuTriggerNav\" aria-expanded=\"false\" aria-controls=\"userMenuDropdownNav\">
                <span class=\"uq-meta\">
                    <strong>{{ currentUserName }}</strong>
                    <small>Plan Starter</small>
                </span>
                <span class=\"uq-avatar\">{{ currentUserInitial }}</span>
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
    </div>
</header>

<aside class=\"drawer-new\" id=\"drawerNav\">
    <div class=\"drawer-top-new\">
        <div class=\"drawer-title-new\" id=\"drawerTitleNav\">NEXA</div>
        <button class=\"icon-btn\" id=\"closeDrawerNav\" type=\"button\"><i class=\"fa-solid fa-xmark\"></i></button>
    </div>

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

    <a href=\"{{ path('app_profile') }}\" class=\"drawer-user-card\">
        <span class=\"uq-avatar\">{{ currentUserInitial }}</span>
        <span class=\"uq-meta\">
            <strong>{{ currentUserName }}</strong>
            <small>{{ currentUserEmail }}</small>
        </span>
    </a>
</aside>

<div class=\"toast-new\" id=\"toastNav\"></div>

<main style=\"padding-top: calc(var(--nav-height) + 10px);\">
    {% block body %}{% endblock %}
</main>

<script src=\"{{ asset('js/board.js') }}\"></script>
<script src=\"{{ asset('js/global-bubbles-bg.js?v=20260214a') }}\"></script>
<script src=\"{{ asset('assets/nexa-nav.js?v=20260220b') }}\"></script>

{% block javascripts %}{% endblock %}

</body>
</html>










", "theme/base.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\theme\\base.html.twig");
    }
}
