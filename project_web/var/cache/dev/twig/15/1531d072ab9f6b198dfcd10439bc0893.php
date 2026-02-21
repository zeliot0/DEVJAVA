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

/* user_response/rapport_pdf.html.twig */
class __TwigTemplate_0e9bf9c28395b218c951bda6fad2e535 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/rapport_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/rapport_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">

    <title>Rapport – ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 6, $this->source); })()), "nom", [], "any", false, false, false, 6), "html", null, true);
        yield "</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #222;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .theme {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
            color: #555;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 12px;
            margin-bottom: 15px;
            page-break-inside: avoid;
        }

        .question {
            font-weight: bold;
            margin-bottom: 6px;
        }

        .answer {
            margin-bottom: 6px;
        }

        .objective {
            font-size: 11px;
            color: #444;
            margin-bottom: 6px;
        }

        .success {
            color: #0a7d2f;
            font-weight: bold;
        }

        .warning {
            color: #c0392b;
            font-weight: bold;
        }

        .neutral {
            color: #555;
        }

        .date {
            font-size: 10px;
            color: #888;
            margin-top: 6px;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #aaa;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <h1>📊 Rapport</h1>
    <div class=\"theme\">
        Thème : <strong>";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 88, $this->source); })()), "nom", [], "any", false, false, false, 88), "html", null, true);
        yield "</strong>
    </div>

    <hr style=\"margin-bottom: 25px;\">

    <!-- CONTENT -->
    ";
        // line 94
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 94, $this->source); })()))) {
            // line 95
            yield "        <p>Aucune réponse enregistrée.</p>
    ";
        } else {
            // line 97
            yield "
        ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 98, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 99
                yield "            <div class=\"card\">

                <!-- QUESTION -->
                <div class=\"question\">
                    ";
                // line 103
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 103), "html", null, true);
                yield "
                </div>

                <!-- RÉPONSE -->
                <div class=\"answer\">
                    👉 <strong>Votre réponse :</strong>
                    ";
                // line 109
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 109) == "boolean")) {
                    // line 110
                    yield "                        ";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 110) == "1")) ? ("Oui") : ("Non"));
                    yield "
                    ";
                } else {
                    // line 112
                    yield "                        ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 112), "html", null, true);
                    yield "
                        ";
                    // line 113
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 113)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 114
                        yield "                            ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 114), "html", null, true);
                        yield "
                        ";
                    }
                    // line 116
                    yield "                    ";
                }
                // line 117
                yield "                </div>

                <!-- OBJECTIF -->
                ";
                // line 120
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 120) == "number") &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ideal", [], "any", false, false, false, 120)))) {
                    // line 121
                    yield "                    <div class=\"objective\">
                        🎯 <strong>Objectif :</strong>
                        ";
                    // line 123
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ideal", [], "any", false, false, false, 123), "html", null, true);
                    yield "
                        ";
                    // line 124
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 124)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 125
                        yield "                            ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 125), "html", null, true);
                        yield "
                        ";
                    }
                    // line 127
                    yield "                    </div>
                ";
                }
                // line 129
                yield "
                <!-- ÉVALUATION -->
                ";
                // line 131
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 131) === true)) {
                    // line 132
                    yield "                    <div class=\"success\">
                        ";
                    // line 133
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", false, false, false, 133), "html", null, true);
                    yield "
                    </div>
                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 135
$context["item"], "ok", [], "any", false, false, false, 135) === false)) {
                    // line 136
                    yield "                    <div class=\"warning\">
                        ";
                    // line 137
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", false, false, false, 137), "html", null, true);
                    yield "
                    </div>
                ";
                } else {
                    // line 140
                    yield "                    <div class=\"neutral\">
                        ";
                    // line 141
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", false, false, false, 141), "html", null, true);
                    yield "
                    </div>
                ";
                }
                // line 144
                yield "
                <!-- DATE -->
                <div class=\"date\">
                    Répondu le ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 147), "d/m/Y à H:i"), "html", null, true);
                yield "
                </div>

            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            yield "
    ";
        }
        // line 154
        yield "
    <!-- FOOTER -->
    <div class=\"footer\">
        Généré le ";
        // line 157
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield "
    </div>

</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user_response/rapport_pdf.html.twig";
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
        return array (  287 => 157,  282 => 154,  278 => 152,  267 => 147,  262 => 144,  256 => 141,  253 => 140,  247 => 137,  244 => 136,  242 => 135,  237 => 133,  234 => 132,  232 => 131,  228 => 129,  224 => 127,  218 => 125,  216 => 124,  212 => 123,  208 => 121,  206 => 120,  201 => 117,  198 => 116,  192 => 114,  190 => 113,  185 => 112,  179 => 110,  177 => 109,  168 => 103,  162 => 99,  158 => 98,  155 => 97,  151 => 95,  149 => 94,  140 => 88,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">

    <title>Rapport – {{ theme.nom }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #222;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .theme {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
            color: #555;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 12px;
            margin-bottom: 15px;
            page-break-inside: avoid;
        }

        .question {
            font-weight: bold;
            margin-bottom: 6px;
        }

        .answer {
            margin-bottom: 6px;
        }

        .objective {
            font-size: 11px;
            color: #444;
            margin-bottom: 6px;
        }

        .success {
            color: #0a7d2f;
            font-weight: bold;
        }

        .warning {
            color: #c0392b;
            font-weight: bold;
        }

        .neutral {
            color: #555;
        }

        .date {
            font-size: 10px;
            color: #888;
            margin-top: 6px;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #aaa;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <h1>📊 Rapport</h1>
    <div class=\"theme\">
        Thème : <strong>{{ theme.nom }}</strong>
    </div>

    <hr style=\"margin-bottom: 25px;\">

    <!-- CONTENT -->
    {% if details is empty %}
        <p>Aucune réponse enregistrée.</p>
    {% else %}

        {% for item in details %}
            <div class=\"card\">

                <!-- QUESTION -->
                <div class=\"question\">
                    {{ item.question }}
                </div>

                <!-- RÉPONSE -->
                <div class=\"answer\">
                    👉 <strong>Votre réponse :</strong>
                    {% if item.type == 'boolean' %}
                        {{ item.value == '1' ? 'Oui' : 'Non' }}
                    {% else %}
                        {{ item.value }}
                        {% if item.unite %}
                            {{ item.unite }}
                        {% endif %}
                    {% endif %}
                </div>

                <!-- OBJECTIF -->
                {% if item.type == 'number' and item.ideal is not null %}
                    <div class=\"objective\">
                        🎯 <strong>Objectif :</strong>
                        {{ item.ideal }}
                        {% if item.unite %}
                            {{ item.unite }}
                        {% endif %}
                    </div>
                {% endif %}

                <!-- ÉVALUATION -->
                {% if item.ok is same as(true) %}
                    <div class=\"success\">
                        {{ item.advice }}
                    </div>
                {% elseif item.ok is same as(false) %}
                    <div class=\"warning\">
                        {{ item.advice }}
                    </div>
                {% else %}
                    <div class=\"neutral\">
                        {{ item.advice }}
                    </div>
                {% endif %}

                <!-- DATE -->
                <div class=\"date\">
                    Répondu le {{ item.date|date('d/m/Y à H:i') }}
                </div>

            </div>
        {% endfor %}

    {% endif %}

    <!-- FOOTER -->
    <div class=\"footer\">
        Généré le {{ \"now\"|date(\"d/m/Y à H:i\") }}
    </div>

</body>
</html>
", "user_response/rapport_pdf.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\user_response\\rapport_pdf.html.twig");
    }
}
