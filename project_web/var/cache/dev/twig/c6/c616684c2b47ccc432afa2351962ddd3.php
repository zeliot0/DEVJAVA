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

/* time_message/index.html.twig */
class __TwigTemplate_b671afda9ee1feba06e6289d77171e2d extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/index.html.twig"));

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

        yield "Time Traveler's Journal";
        
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
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/time-message-modern.css?v=20260220b"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<div class=\"container mt-4 tm-page\">
    <div class=\"tm-header\">
        <div>
            <h1 class=\"tm-title\"><i class=\"fa-solid fa-clock-rotate-left\"></i> Time Traveler's Journal</h1>
            <p class=\"tm-subtitle\">Connect with your past and future selves through AI-powered reflection.</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"";
        // line 18
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_new", ["type" => "past"]);
        yield "\" class=\"tm-btn\">
                <i class=\"fas fa-history\"></i> Write to Past
            </a>
            <a href=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_new", ["type" => "future"]);
        yield "\" class=\"tm-btn tm-btn-primary\">
                <i class=\"fas fa-rocket\"></i> Write to Future
            </a>
        </div>
    </div>

    <div class=\"tm-grid\">
        <section class=\"tm-panel\">
            <div class=\"tm-panel-head\">
                <h3><i class=\"fas fa-envelope-open\"></i> Received Letters</h3>
                <span class=\"tm-panel-count\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["delivered"]) || array_key_exists("delivered", $context) ? $context["delivered"] : (function () { throw new RuntimeError('Variable "delivered" does not exist.', 31, $this->source); })())), "html", null, true);
        yield "</span>
            </div>
            <div class=\"tm-panel-body\">
                ";
        // line 34
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["delivered"]) || array_key_exists("delivered", $context) ? $context["delivered"] : (function () { throw new RuntimeError('Variable "delivered" does not exist.', 34, $this->source); })())) > 0)) {
            // line 35
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["delivered"]) || array_key_exists("delivered", $context) ? $context["delivered"] : (function () { throw new RuntimeError('Variable "delivered" does not exist.', 35, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 36
                yield "                        <article class=\"tm-message-card\">
                            <div class=\"tm-message-meta\">
                                <div>
                                    ";
                // line 39
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "messageTypeG", [], "any", false, false, false, 39) == "future")) {
                    // line 40
                    yield "                                        <span class=\"tm-chip tm-chip-primary\">From: Future You</span>
                                    ";
                } else {
                    // line 42
                    yield "                                        <span class=\"tm-chip tm-chip-info\">From: Past You</span>
                                    ";
                }
                // line 44
                yield "                                </div>
                                <small class=\"text-muted\">";
                // line 45
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "createdAtMsg", [], "any", false, false, false, 45), "M d, Y"), "html", null, true);
                yield "</small>
                            </div>
                            <h4 class=\"tm-message-title\">";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "titleMsg", [], "any", false, false, false, 47), "html", null, true);
                yield "</h4>
                            <p class=\"tm-message-text\">";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "contentMsg", [], "any", false, false, false, 48), 0, 150), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "contentMsg", [], "any", false, false, false, 48)) > 150)) {
                    yield "...";
                }
                yield "</p>
                            ";
                // line 49
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["aiResponses"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "idTimeMessage", [], "any", false, false, false, 49), [], "array", true, true, false, 49)) {
                    // line 50
                    yield "                                <div class=\"mb-2\">
                                    <span class=\"tm-chip tm-chip-ai\"><i class=\"fas fa-robot\"></i> AI Response Available</span>
                                </div>
                            ";
                }
                // line 54
                yield "                            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["message"], "idTimeMessage", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" class=\"tm-btn\">
                                Read Full Letter
                            </a>
                        </article>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            yield "                ";
        } else {
            // line 60
            yield "                    <p class=\"tm-empty\">No received letters yet.</p>
                ";
        }
        // line 62
        yield "            </div>
        </section>

        <section class=\"tm-panel\">
            <div class=\"tm-panel-head\">
                <h3><i class=\"fas fa-clock\"></i> Scheduled Messages</h3>
                <span class=\"tm-panel-count\">";
        // line 68
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["upcoming"]) || array_key_exists("upcoming", $context) ? $context["upcoming"] : (function () { throw new RuntimeError('Variable "upcoming" does not exist.', 68, $this->source); })())), "html", null, true);
        yield "</span>
            </div>
            <div class=\"tm-panel-body\">
                ";
        // line 71
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["upcoming"]) || array_key_exists("upcoming", $context) ? $context["upcoming"] : (function () { throw new RuntimeError('Variable "upcoming" does not exist.', 71, $this->source); })())) > 0)) {
            // line 72
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["upcoming"]) || array_key_exists("upcoming", $context) ? $context["upcoming"] : (function () { throw new RuntimeError('Variable "upcoming" does not exist.', 72, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 73
                yield "                        <article class=\"tm-message-card\">
                            <div class=\"tm-message-meta\">
                                <div>
                                    ";
                // line 76
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["message"], "messageTypeG", [], "any", false, false, false, 76) == "future")) {
                    // line 77
                    yield "                                        <span class=\"tm-chip tm-chip-primary\">To: Future You</span>
                                    ";
                } else {
                    // line 79
                    yield "                                        <span class=\"tm-chip tm-chip-info\">To: Past You</span>
                                    ";
                }
                // line 81
                yield "                                </div>
                                <small class=\"text-muted\">Delivers: ";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "deliveryDateMsg", [], "any", false, false, false, 82), "M d, Y"), "html", null, true);
                yield "</small>
                            </div>
                            <h4 class=\"tm-message-title\">";
                // line 84
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "titleMsg", [], "any", false, false, false, 84), "html", null, true);
                yield "</h4>
                            <p class=\"tm-message-text\">";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "contentMsg", [], "any", false, false, false, 85), 0, 150), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["message"], "contentMsg", [], "any", false, false, false, 85)) > 150)) {
                    yield "...";
                }
                yield "</p>
                            <a href=\"";
                // line 86
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["message"], "idTimeMessage", [], "any", false, false, false, 86)]), "html", null, true);
                yield "\" class=\"tm-btn\">
                                View Details
                            </a>
                        </article>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            yield "                ";
        } else {
            // line 92
            yield "                    <p class=\"tm-empty\">No scheduled messages.</p>
                ";
        }
        // line 94
        yield "            </div>
        </section>
    </div>
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
        return "time_message/index.html.twig";
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
        return array (  307 => 94,  303 => 92,  300 => 91,  289 => 86,  282 => 85,  278 => 84,  273 => 82,  270 => 81,  266 => 79,  262 => 77,  260 => 76,  255 => 73,  250 => 72,  248 => 71,  242 => 68,  234 => 62,  230 => 60,  227 => 59,  215 => 54,  209 => 50,  207 => 49,  200 => 48,  196 => 47,  191 => 45,  188 => 44,  184 => 42,  180 => 40,  178 => 39,  173 => 36,  168 => 35,  166 => 34,  160 => 31,  147 => 21,  141 => 18,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Time Traveler's Journal{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/time-message-modern.css?v=20260220b') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 tm-page\">
    <div class=\"tm-header\">
        <div>
            <h1 class=\"tm-title\"><i class=\"fa-solid fa-clock-rotate-left\"></i> Time Traveler's Journal</h1>
            <p class=\"tm-subtitle\">Connect with your past and future selves through AI-powered reflection.</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"{{ path('app_time_message_new', {'type': 'past'}) }}\" class=\"tm-btn\">
                <i class=\"fas fa-history\"></i> Write to Past
            </a>
            <a href=\"{{ path('app_time_message_new', {'type': 'future'}) }}\" class=\"tm-btn tm-btn-primary\">
                <i class=\"fas fa-rocket\"></i> Write to Future
            </a>
        </div>
    </div>

    <div class=\"tm-grid\">
        <section class=\"tm-panel\">
            <div class=\"tm-panel-head\">
                <h3><i class=\"fas fa-envelope-open\"></i> Received Letters</h3>
                <span class=\"tm-panel-count\">{{ delivered|length }}</span>
            </div>
            <div class=\"tm-panel-body\">
                {% if delivered|length > 0 %}
                    {% for message in delivered %}
                        <article class=\"tm-message-card\">
                            <div class=\"tm-message-meta\">
                                <div>
                                    {% if message.messageTypeG == 'future' %}
                                        <span class=\"tm-chip tm-chip-primary\">From: Future You</span>
                                    {% else %}
                                        <span class=\"tm-chip tm-chip-info\">From: Past You</span>
                                    {% endif %}
                                </div>
                                <small class=\"text-muted\">{{ message.createdAtMsg|date('M d, Y') }}</small>
                            </div>
                            <h4 class=\"tm-message-title\">{{ message.titleMsg }}</h4>
                            <p class=\"tm-message-text\">{{ message.contentMsg|slice(0, 150) }}{% if message.contentMsg|length > 150 %}...{% endif %}</p>
                            {% if aiResponses[message.idTimeMessage] is defined %}
                                <div class=\"mb-2\">
                                    <span class=\"tm-chip tm-chip-ai\"><i class=\"fas fa-robot\"></i> AI Response Available</span>
                                </div>
                            {% endif %}
                            <a href=\"{{ path('app_time_message_show', {'id': message.idTimeMessage}) }}\" class=\"tm-btn\">
                                Read Full Letter
                            </a>
                        </article>
                    {% endfor %}
                {% else %}
                    <p class=\"tm-empty\">No received letters yet.</p>
                {% endif %}
            </div>
        </section>

        <section class=\"tm-panel\">
            <div class=\"tm-panel-head\">
                <h3><i class=\"fas fa-clock\"></i> Scheduled Messages</h3>
                <span class=\"tm-panel-count\">{{ upcoming|length }}</span>
            </div>
            <div class=\"tm-panel-body\">
                {% if upcoming|length > 0 %}
                    {% for message in upcoming %}
                        <article class=\"tm-message-card\">
                            <div class=\"tm-message-meta\">
                                <div>
                                    {% if message.messageTypeG == 'future' %}
                                        <span class=\"tm-chip tm-chip-primary\">To: Future You</span>
                                    {% else %}
                                        <span class=\"tm-chip tm-chip-info\">To: Past You</span>
                                    {% endif %}
                                </div>
                                <small class=\"text-muted\">Delivers: {{ message.deliveryDateMsg|date('M d, Y') }}</small>
                            </div>
                            <h4 class=\"tm-message-title\">{{ message.titleMsg }}</h4>
                            <p class=\"tm-message-text\">{{ message.contentMsg|slice(0, 150) }}{% if message.contentMsg|length > 150 %}...{% endif %}</p>
                            <a href=\"{{ path('app_time_message_show', {'id': message.idTimeMessage}) }}\" class=\"tm-btn\">
                                View Details
                            </a>
                        </article>
                    {% endfor %}
                {% else %}
                    <p class=\"tm-empty\">No scheduled messages.</p>
                {% endif %}
            </div>
        </section>
    </div>
</div>
{% endblock %}
", "time_message/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\time_message\\index.html.twig");
    }
}
