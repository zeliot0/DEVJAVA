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

/* user_response/answer.html.twig */
class __TwigTemplate_10784aca8afa2dc65f2bdd36e237a9ff extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/answer.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/answer.html.twig"));

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

        yield "Répondre à la question";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/question.css"), "html", null, true);
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
        yield "<div class=\"page\">

    <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_questions_by_theme", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 13, $this->source); })()), "theme", [], "any", false, false, false, 13), "idT", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\"
       class=\"back-link\">
        ← Retour aux thèmes
    </a>

    <h1>";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 18, $this->source); })()), "texte", [], "any", false, false, false, 18), "html", null, true);
        yield "</h1>

    <p class=\"muted\">
        Type : ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 21, $this->source); })()), "typeReponse", [], "any", false, false, false, 21), "html", null, true);
        yield " • Fréquence : ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 21, $this->source); })()), "frequence", [], "any", false, false, false, 21), "html", null, true);
        yield "
    </p>

    <div class=\"form-card\">

        ";
        // line 26
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_answer", ["id" => CoreExtension::getAttribute($this->env, $this->source,         // line 27
(isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 27, $this->source); })()), "id", [], "any", false, false, false, 27)]), "method" => "POST"]);
        // line 29
        yield "

        ";
        // line 32
        yield "        ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 32, $this->source); })()), "typeReponse", [], "any", false, false, false, 32) == "boolean")) {
            // line 33
            yield "            <div class=\"form-group\">
                <label>Votre réponse</label>

                <div class=\"radio-group\">
                    <label class=\"radio-option\">
                        <input type=\"radio\"
                               name=\"";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "valeur", [], "any", false, false, false, 39), "vars", [], "any", false, false, false, 39), "full_name", [], "any", false, false, false, 39), "html", null, true);
            yield "\"
                               value=\"1\"
                               required>
                        Oui
                    </label>

                    <label class=\"radio-option\">
                        <input type=\"radio\"
                               name=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "valeur", [], "any", false, false, false, 47), "vars", [], "any", false, false, false, 47), "full_name", [], "any", false, false, false, 47), "html", null, true);
            yield "\"
                               value=\"0\">
                        Non
                    </label>
                </div>
            </div>

        ";
            // line 55
            yield "        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 55, $this->source); })()), "typeReponse", [], "any", false, false, false, 55) == "number")) {
            // line 56
            yield "            ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "valeur", [], "any", false, false, false, 56), 'row', ["label" => "Votre réponse", "attr" => ["placeholder" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 59
(isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 59, $this->source); })()), "unite", [], "any", false, false, false, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((("Valeur (" . CoreExtension::getAttribute($this->env, $this->source,             // line 60
(isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 60, $this->source); })()), "unite", [], "any", false, false, false, 60)) . ")")) : ("Valeur"))]]);
            // line 63
            yield "

        ";
            // line 66
            yield "        ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 66, $this->source); })()), "typeReponse", [], "any", false, false, false, 66) == "text")) {
            // line 67
            yield "            <div class=\"form-group\">
                <label>Votre réponse</label>
                <textarea
                    name=\"";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "humeur", [], "any", false, false, false, 70), "vars", [], "any", false, false, false, 70), "full_name", [], "any", false, false, false, 70), "html", null, true);
            yield "\"
                    class=\"text-answer\"
                    rows=\"4\"
                    placeholder=\"Écrivez votre réponse ici...\"
                    required
                ></textarea>
            </div>
        ";
        }
        // line 78
        yield "
        ";
        // line 80
        yield "        ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "date", [], "any", false, false, false, 80), 'row');
        yield "

        <button type=\"submit\" class=\"btn primary\">
            <i class=\"fas fa-check\"></i>
            Enregistrer ma réponse
        </button>

        ";
        // line 87
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), 'form_end');
        yield "

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
        return "user_response/answer.html.twig";
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
        return array (  244 => 87,  233 => 80,  230 => 78,  219 => 70,  214 => 67,  211 => 66,  207 => 63,  205 => 60,  204 => 59,  202 => 56,  199 => 55,  189 => 47,  178 => 39,  170 => 33,  167 => 32,  163 => 29,  161 => 27,  160 => 26,  150 => 21,  144 => 18,  136 => 13,  132 => 11,  119 => 10,  106 => 7,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Répondre à la question{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/question.css') }}\">
{% endblock %}

{% block body %}
<div class=\"page\">

    <a href=\"{{ path('app_questions_by_theme', { id: question.theme.idT }) }}\"
       class=\"back-link\">
        ← Retour aux thèmes
    </a>

    <h1>{{ question.texte }}</h1>

    <p class=\"muted\">
        Type : {{ question.typeReponse }} • Fréquence : {{ question.frequence }}
    </p>

    <div class=\"form-card\">

        {{ form_start(form, {
            action: path('app_user_answer', { id: question.id }),
            method: 'POST'
        }) }}

        {# ===== BOOLEAN ===== #}
        {% if question.typeReponse == 'boolean' %}
            <div class=\"form-group\">
                <label>Votre réponse</label>

                <div class=\"radio-group\">
                    <label class=\"radio-option\">
                        <input type=\"radio\"
                               name=\"{{ form.valeur.vars.full_name }}\"
                               value=\"1\"
                               required>
                        Oui
                    </label>

                    <label class=\"radio-option\">
                        <input type=\"radio\"
                               name=\"{{ form.valeur.vars.full_name }}\"
                               value=\"0\">
                        Non
                    </label>
                </div>
            </div>

        {# ===== NUMBER ===== #}
        {% elseif question.typeReponse == 'number' %}
            {{ form_row(form.valeur, {
                label: 'Votre réponse',
                attr: {
                    placeholder: question.unite
                        ? 'Valeur (' ~ question.unite ~ ')'
                        : 'Valeur'
                }
            }) }}

        {# ===== TEXT ===== #}
        {% elseif question.typeReponse == 'text' %}
            <div class=\"form-group\">
                <label>Votre réponse</label>
                <textarea
                    name=\"{{ form.humeur.vars.full_name }}\"
                    class=\"text-answer\"
                    rows=\"4\"
                    placeholder=\"Écrivez votre réponse ici...\"
                    required
                ></textarea>
            </div>
        {% endif %}

        {# ===== DATE (cachée ou visible حسب تحب) ===== #}
        {{ form_row(form.date) }}

        <button type=\"submit\" class=\"btn primary\">
            <i class=\"fas fa-check\"></i>
            Enregistrer ma réponse
        </button>

        {{ form_end(form) }}

    </div>
</div>
{% endblock %}

", "user_response/answer.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\user_response\\answer.html.twig");
    }
}
