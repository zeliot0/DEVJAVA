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

/* time_message/show.html.twig */
class __TwigTemplate_cc2c47c62a83f4a3b9c0ceeb79a2c885 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "time_message/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 3, $this->source); })()), "titleMsg", [], "any", false, false, false, 3), "html", null, true);
        
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
            <h1 class=\"tm-title\">
                ";
        // line 15
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 15, $this->source); })()), "messageTypeG", [], "any", false, false, false, 15) == "future")) {
            // line 16
            yield "                    <i class=\"fas fa-rocket\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 16, $this->source); })()), "titleMsg", [], "any", false, false, false, 16), "html", null, true);
            yield "
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 17
(isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 17, $this->source); })()), "messageTypeG", [], "any", false, false, false, 17) == "past")) {
            // line 18
            yield "                    <i class=\"fas fa-history\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 18, $this->source); })()), "titleMsg", [], "any", false, false, false, 18), "html", null, true);
            yield "
                ";
        } else {
            // line 20
            yield "                    <i class=\"fas fa-robot\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 20, $this->source); })()), "titleMsg", [], "any", false, false, false, 20), "html", null, true);
            yield "
                ";
        }
        // line 22
        yield "            </h1>
            <p class=\"tm-subtitle\">Created on ";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 23, $this->source); })()), "createdAtMsg", [], "any", false, false, false, 23), "F j, Y"), "html", null, true);
        yield "</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"";
        // line 26
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_index");
        yield "\" class=\"tm-btn\"><i class=\"fas fa-arrow-left\"></i> Back to Journal</a>
            <form method=\"post\" action=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_time_message_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 27, $this->source); })()), "idTimeMessage", [], "any", false, false, false, 27)]), "html", null, true);
        yield "\" onsubmit=\"return confirm('Are you sure you want to delete this message?');\">
                <input type=\"hidden\" name=\"_token\" value=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 28, $this->source); })()), "idTimeMessage", [], "any", false, false, false, 28))), "html", null, true);
        yield "\">
                <button class=\"tm-btn tm-btn-danger\" type=\"submit\"><i class=\"fas fa-trash\"></i> Delete</button>
            </form>
        </div>
    </div>

    <div class=\"tm-form-card\">
        <h3 class=\"tm-form-title\">Your Message</h3>
        <div class=\"tm-content-box\">";
        // line 36
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 36, $this->source); })()), "contentMsg", [], "any", false, false, false, 36), "html", null, true));
        yield "</div>

        <div class=\"tm-meta-grid\">
            <div class=\"tm-meta-card\">
                <h5>Type</h5>
                ";
        // line 41
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 41, $this->source); })()), "messageTypeG", [], "any", false, false, false, 41) == "future")) {
            // line 42
            yield "                    <span class=\"tm-chip tm-chip-primary\">To Future Self</span>
                ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 43
(isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 43, $this->source); })()), "messageTypeG", [], "any", false, false, false, 43) == "past")) {
            // line 44
            yield "                    <span class=\"tm-chip tm-chip-info\">To Past Self</span>
                ";
        } else {
            // line 46
            yield "                    <span class=\"tm-chip tm-chip-ai\">AI Response</span>
                ";
        }
        // line 48
        yield "            </div>

            ";
        // line 50
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 50, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 50)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 51
            yield "                <div class=\"tm-meta-card\">
                    <h5>Delivery Date</h5>
                    ";
            // line 53
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 53, $this->source); })()), "isDeliveredMsg", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 54
                yield "                        <span class=\"tm-chip\"><i class=\"fas fa-check-circle\"></i> Delivered on ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 54, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 54), "F j, Y"), "html", null, true);
                yield "</span>
                    ";
            } else {
                // line 56
                yield "                        <span class=\"tm-chip\"><i class=\"fas fa-clock\"></i> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 56, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 56), "F j, Y"), "html", null, true);
                yield "</span>
                    ";
            }
            // line 58
            yield "                </div>
            ";
        }
        // line 60
        yield "        </div>

        ";
        // line 62
        if ((($tmp = (isset($context["aiResponse"]) || array_key_exists("aiResponse", $context) ? $context["aiResponse"] : (function () { throw new RuntimeError('Variable "aiResponse" does not exist.', 62, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 63
            yield "            <div class=\"tm-note-card mt-3\">
                <h4><i class=\"fas fa-robot\"></i> Future Self Response</h4>
                <div class=\"tm-content-box\">";
            // line 65
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["aiResponse"]) || array_key_exists("aiResponse", $context) ? $context["aiResponse"] : (function () { throw new RuntimeError('Variable "aiResponse" does not exist.', 65, $this->source); })()), "contentMsg", [], "any", false, false, false, 65), "html", null, true));
            yield "</div>
                ";
            // line 66
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 66, $this->source); })()), "isDeliveredMsg", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                yield "                    <small class=\"text-muted d-block mt-2\">
                        This response is scheduled for ";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 68, $this->source); })()), "deliveryDateMsg", [], "any", false, false, false, 68), "F j, Y"), "html", null, true);
                yield ".
                    </small>
                ";
            }
            // line 71
            yield "            </div>
        ";
        }
        // line 73
        yield "
        ";
        // line 74
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 74, $this->source); })()), "videoPathMsg", [], "any", false, false, false, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 75
            yield "            <div class=\"mt-3\">
                <h4 class=\"tm-form-title\" style=\"font-size:1.1rem;\">Video Message</h4>
                <video controls class=\"tm-video\">
                    <source src=\"";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/videos/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 78, $this->source); })()), "videoPathMsg", [], "any", false, false, false, 78))), "html", null, true);
            yield "\" type=\"video/mp4\">
                    Your browser does not support the video tag.
                </video>
            </div>
        ";
        }
        // line 83
        yield "    </div>

    <div class=\"tm-note-card\">
        <h4><i class=\"fas fa-circle-info\"></i> About the AI Feature</h4>
        <p class=\"mb-1\">This feature uses OpenAI ChatGPT API (external service) to generate future-self responses.</p>
        <small class=\"text-muted\">External AI API integration is active.</small>
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
        return "time_message/show.html.twig";
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
        return array (  285 => 83,  277 => 78,  272 => 75,  270 => 74,  267 => 73,  263 => 71,  257 => 68,  254 => 67,  252 => 66,  248 => 65,  244 => 63,  242 => 62,  238 => 60,  234 => 58,  228 => 56,  222 => 54,  220 => 53,  216 => 51,  214 => 50,  210 => 48,  206 => 46,  202 => 44,  200 => 43,  197 => 42,  195 => 41,  187 => 36,  176 => 28,  172 => 27,  168 => 26,  162 => 23,  159 => 22,  153 => 20,  147 => 18,  145 => 17,  140 => 16,  138 => 15,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}{{ message.titleMsg }}{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/time-message-modern.css?v=20260220b') }}\">
{% endblock %}

{% block body %}
<div class=\"container mt-4 tm-page\">
    <div class=\"tm-header\">
        <div>
            <h1 class=\"tm-title\">
                {% if message.messageTypeG == 'future' %}
                    <i class=\"fas fa-rocket\"></i> {{ message.titleMsg }}
                {% elseif message.messageTypeG == 'past' %}
                    <i class=\"fas fa-history\"></i> {{ message.titleMsg }}
                {% else %}
                    <i class=\"fas fa-robot\"></i> {{ message.titleMsg }}
                {% endif %}
            </h1>
            <p class=\"tm-subtitle\">Created on {{ message.createdAtMsg|date('F j, Y') }}</p>
        </div>
        <div class=\"tm-actions\">
            <a href=\"{{ path('app_time_message_index') }}\" class=\"tm-btn\"><i class=\"fas fa-arrow-left\"></i> Back to Journal</a>
            <form method=\"post\" action=\"{{ path('app_time_message_delete', {'id': message.idTimeMessage}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this message?');\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ message.idTimeMessage) }}\">
                <button class=\"tm-btn tm-btn-danger\" type=\"submit\"><i class=\"fas fa-trash\"></i> Delete</button>
            </form>
        </div>
    </div>

    <div class=\"tm-form-card\">
        <h3 class=\"tm-form-title\">Your Message</h3>
        <div class=\"tm-content-box\">{{ message.contentMsg|nl2br }}</div>

        <div class=\"tm-meta-grid\">
            <div class=\"tm-meta-card\">
                <h5>Type</h5>
                {% if message.messageTypeG == 'future' %}
                    <span class=\"tm-chip tm-chip-primary\">To Future Self</span>
                {% elseif message.messageTypeG == 'past' %}
                    <span class=\"tm-chip tm-chip-info\">To Past Self</span>
                {% else %}
                    <span class=\"tm-chip tm-chip-ai\">AI Response</span>
                {% endif %}
            </div>

            {% if message.deliveryDateMsg %}
                <div class=\"tm-meta-card\">
                    <h5>Delivery Date</h5>
                    {% if message.isDeliveredMsg %}
                        <span class=\"tm-chip\"><i class=\"fas fa-check-circle\"></i> Delivered on {{ message.deliveryDateMsg|date('F j, Y') }}</span>
                    {% else %}
                        <span class=\"tm-chip\"><i class=\"fas fa-clock\"></i> {{ message.deliveryDateMsg|date('F j, Y') }}</span>
                    {% endif %}
                </div>
            {% endif %}
        </div>

        {% if aiResponse %}
            <div class=\"tm-note-card mt-3\">
                <h4><i class=\"fas fa-robot\"></i> Future Self Response</h4>
                <div class=\"tm-content-box\">{{ aiResponse.contentMsg|nl2br }}</div>
                {% if not message.isDeliveredMsg %}
                    <small class=\"text-muted d-block mt-2\">
                        This response is scheduled for {{ message.deliveryDateMsg|date('F j, Y') }}.
                    </small>
                {% endif %}
            </div>
        {% endif %}

        {% if message.videoPathMsg %}
            <div class=\"mt-3\">
                <h4 class=\"tm-form-title\" style=\"font-size:1.1rem;\">Video Message</h4>
                <video controls class=\"tm-video\">
                    <source src=\"{{ asset('uploads/videos/' ~ message.videoPathMsg) }}\" type=\"video/mp4\">
                    Your browser does not support the video tag.
                </video>
            </div>
        {% endif %}
    </div>

    <div class=\"tm-note-card\">
        <h4><i class=\"fas fa-circle-info\"></i> About the AI Feature</h4>
        <p class=\"mb-1\">This feature uses OpenAI ChatGPT API (external service) to generate future-self responses.</p>
        <small class=\"text-muted\">External AI API integration is active.</small>
    </div>
</div>
{% endblock %}
", "time_message/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\time_message\\show.html.twig");
    }
}
