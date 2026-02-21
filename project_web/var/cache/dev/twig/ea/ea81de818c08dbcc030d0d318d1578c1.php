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

/* user_response/rapport.twig */
class __TwigTemplate_7b83738c7e77c194cc37a293e9d92f8a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/rapport.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "user_response/rapport.twig"));

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

        yield "Rapport - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
        yield "<div class=\"wrap report-wrap\">

  <section class=\"page-header report-hero\">
    <div class=\"page-header-top\">
      <div class=\"page-title\">
        <h1><i class=\"fa-solid fa-chart-column\"></i> Rapport - ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 11, $this->source); })()), "nom", [], "any", false, false, false, 11), "html", null, true);
        yield "</h1>
        <p>Synthese de vos reponses et recommandations.</p>
      </div>

      <div class=\"page-actions\">
        <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_answer", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 16, $this->source); })()), "idT", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\" class=\"btn ghost\">
          Retour aux questions
        </a>
        <a href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_theme_rapport_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["theme"]) || array_key_exists("theme", $context) ? $context["theme"] : (function () { throw new RuntimeError('Variable "theme" does not exist.', 19, $this->source); })()), "idT", [], "any", false, false, false, 19)]), "html", null, true);
        yield "\" class=\"btn primary\">
          <i class=\"fa-solid fa-file-pdf\"></i> Exporter en PDF
        </a>
      </div>
    </div>
  </section>

  ";
        // line 26
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 26, $this->source); })()))) {
            // line 27
            yield "    <div class=\"report-empty\">
      <i class=\"fa-regular fa-folder-open\"></i>
      <h3>Aucune reponse enregistree</h3>
      <p>Commencez par repondre aux questions pour generer le rapport.</p>
    </div>
  ";
        } else {
            // line 33
            yield "    ";
            $context["total"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 33, $this->source); })()));
            // line 34
            yield "    ";
            $context["good"] = 0;
            // line 35
            yield "    ";
            $context["warn"] = 0;
            // line 36
            yield "    ";
            $context["neutral"] = 0;
            // line 37
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 37, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 38
                yield "      ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 38) === true)) {
                    // line 39
                    yield "        ";
                    $context["good"] = ((isset($context["good"]) || array_key_exists("good", $context) ? $context["good"] : (function () { throw new RuntimeError('Variable "good" does not exist.', 39, $this->source); })()) + 1);
                    // line 40
                    yield "      ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 40) === false)) {
                    // line 41
                    yield "        ";
                    $context["warn"] = ((isset($context["warn"]) || array_key_exists("warn", $context) ? $context["warn"] : (function () { throw new RuntimeError('Variable "warn" does not exist.', 41, $this->source); })()) + 1);
                    // line 42
                    yield "      ";
                } else {
                    // line 43
                    yield "        ";
                    $context["neutral"] = ((isset($context["neutral"]) || array_key_exists("neutral", $context) ? $context["neutral"] : (function () { throw new RuntimeError('Variable "neutral" does not exist.', 43, $this->source); })()) + 1);
                    // line 44
                    yield "      ";
                }
                // line 45
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            yield "    ";
            $context["score"] = ((((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 46, $this->source); })()) > 0)) ? (Twig\Extension\CoreExtension::round((((isset($context["good"]) || array_key_exists("good", $context) ? $context["good"] : (function () { throw new RuntimeError('Variable "good" does not exist.', 46, $this->source); })()) / (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 46, $this->source); })())) * 100))) : (0));
            // line 47
            yield "
    <section class=\"report-kpi-strip\">
      <article class=\"report-kpi\">
        <span>Total</span>
        <strong>";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 51, $this->source); })()), "html", null, true);
            yield "</strong>
      </article>
      <article class=\"report-kpi good\">
        <span>Bonnes habitudes</span>
        <strong>";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["good"]) || array_key_exists("good", $context) ? $context["good"] : (function () { throw new RuntimeError('Variable "good" does not exist.', 55, $this->source); })()), "html", null, true);
            yield "</strong>
      </article>
      <article class=\"report-kpi warn\">
        <span>A ameliorer</span>
        <strong>";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["warn"]) || array_key_exists("warn", $context) ? $context["warn"] : (function () { throw new RuntimeError('Variable "warn" does not exist.', 59, $this->source); })()), "html", null, true);
            yield "</strong>
      </article>
      <article class=\"report-kpi score\">
        <span>Score global</span>
        <strong>";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 63, $this->source); })()), "html", null, true);
            yield "%</strong>
      </article>
    </section>

    <section class=\"report-scorebar\">
      <div class=\"report-scorebar-track\">
        <div class=\"report-scorebar-fill\" style=\"width: ";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 69, $this->source); })()), "html", null, true);
            yield "%\"></div>
      </div>
      <small>Progression globale sur ce theme</small>
    </section>

    <section class=\"report-grid\">
      ";
            // line 75
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["details"]) || array_key_exists("details", $context) ? $context["details"] : (function () { throw new RuntimeError('Variable "details" does not exist.', 75, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 76
                yield "        ";
                $context["badgeText"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 76) === true)) ? ("Bonne habitude") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 76) === false)) ? ("A ameliorer") : ("Information utile"))));
                // line 77
                yield "        ";
                $context["adviceText"] = Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", true, true, false, 77) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", false, false, false, 77)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "advice", [], "any", false, false, false, 77)) : ("")));
                // line 78
                yield "        ";
                $context["adviceLower"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), (isset($context["adviceText"]) || array_key_exists("adviceText", $context) ? $context["adviceText"] : (function () { throw new RuntimeError('Variable "adviceText" does not exist.', 78, $this->source); })()));
                // line 79
                yield "        ";
                $context["hideAdvice"] = false;
                // line 80
                yield "        ";
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 80) === true) && CoreExtension::inFilter("bonne habitude", (isset($context["adviceLower"]) || array_key_exists("adviceLower", $context) ? $context["adviceLower"] : (function () { throw new RuntimeError('Variable "adviceLower" does not exist.', 80, $this->source); })())))) {
                    // line 81
                    yield "          ";
                    $context["hideAdvice"] = true;
                    // line 82
                    yield "        ";
                } elseif (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 82) === false) && CoreExtension::inFilter("amelior", (isset($context["adviceLower"]) || array_key_exists("adviceLower", $context) ? $context["adviceLower"] : (function () { throw new RuntimeError('Variable "adviceLower" does not exist.', 82, $this->source); })())))) {
                    // line 83
                    yield "          ";
                    $context["hideAdvice"] = true;
                    // line 84
                    yield "        ";
                } elseif (((null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 84)) && CoreExtension::inFilter("information", (isset($context["adviceLower"]) || array_key_exists("adviceLower", $context) ? $context["adviceLower"] : (function () { throw new RuntimeError('Variable "adviceLower" does not exist.', 84, $this->source); })())))) {
                    // line 85
                    yield "          ";
                    $context["hideAdvice"] = true;
                    // line 86
                    yield "        ";
                }
                // line 87
                yield "
        <article class=\"report-card ";
                // line 88
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 88) === true)) ? ("is-good") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 88) === false)) ? ("is-warn") : ("is-neutral"))));
                yield "\">
          <div class=\"report-card-top\">
            <h3>
              <i class=\"fa-solid ";
                // line 91
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 91) == "boolean")) ? ("fa-toggle-on") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 91) == "number")) ? ("fa-hashtag") : ("fa-message"))));
                yield "\"></i>
              ";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "question", [], "any", false, false, false, 92), "html", null, true);
                yield "
            </h3>
            <span class=\"report-badge ";
                // line 94
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 94) === true)) ? ("good") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 94) === false)) ? ("warn") : ("neutral"))));
                yield "\">
              ";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["badgeText"]) || array_key_exists("badgeText", $context) ? $context["badgeText"] : (function () { throw new RuntimeError('Variable "badgeText" does not exist.', 95, $this->source); })()), "html", null, true);
                yield "
            </span>
          </div>

          <div class=\"report-line\">
            <span class=\"report-label\">Votre reponse</span>
            <strong class=\"report-value\">
              ";
                // line 102
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 102) == "boolean")) {
                    // line 103
                    yield "                ";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 103) == "1")) ? ("Oui") : ("Non"));
                    yield "
              ";
                } else {
                    // line 105
                    yield "                ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "value", [], "any", false, false, false, 105), "html", null, true);
                    yield "
                ";
                    // line 106
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 106), "html", null, true);
                    }
                    // line 107
                    yield "              ";
                }
                // line 108
                yield "            </strong>
          </div>

          ";
                // line 111
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 111) == "number") &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ideal", [], "any", false, false, false, 111)))) {
                    // line 112
                    yield "            <div class=\"report-line report-target\">
              <span class=\"report-label\">Objectif</span>
              <strong class=\"report-value\">
                ";
                    // line 115
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ideal", [], "any", false, false, false, 115), "html", null, true);
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "unite", [], "any", false, false, false, 115), "html", null, true);
                    }
                    // line 116
                    yield "              </strong>
            </div>
          ";
                }
                // line 119
                yield "
          ";
                // line 120
                if (( !Twig\Extension\CoreExtension::testEmpty((isset($context["adviceText"]) || array_key_exists("adviceText", $context) ? $context["adviceText"] : (function () { throw new RuntimeError('Variable "adviceText" does not exist.', 120, $this->source); })())) &&  !(isset($context["hideAdvice"]) || array_key_exists("hideAdvice", $context) ? $context["hideAdvice"] : (function () { throw new RuntimeError('Variable "hideAdvice" does not exist.', 120, $this->source); })()))) {
                    // line 121
                    yield "            <p class=\"report-advice ";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 121) === true)) ? ("good") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "ok", [], "any", false, false, false, 121) === false)) ? ("warn") : ("info"))));
                    yield "\">
              ";
                    // line 122
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["adviceText"]) || array_key_exists("adviceText", $context) ? $context["adviceText"] : (function () { throw new RuntimeError('Variable "adviceText" does not exist.', 122, $this->source); })()), "html", null, true);
                    yield "
            </p>
          ";
                }
                // line 125
                yield "
          <small class=\"report-date\">
            <i class=\"fa-regular fa-clock\"></i>
            Repondu le ";
                // line 128
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, false, 128), "d/m/Y a H:i"), "html", null, true);
                yield "
          </small>
        </article>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            yield "    </section>
  ";
        }
        // line 134
        yield "
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
        return "user_response/rapport.twig";
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
        return array (  382 => 134,  378 => 132,  368 => 128,  363 => 125,  357 => 122,  352 => 121,  350 => 120,  347 => 119,  342 => 116,  336 => 115,  331 => 112,  329 => 111,  324 => 108,  321 => 107,  316 => 106,  311 => 105,  305 => 103,  303 => 102,  293 => 95,  289 => 94,  284 => 92,  280 => 91,  274 => 88,  271 => 87,  268 => 86,  265 => 85,  262 => 84,  259 => 83,  256 => 82,  253 => 81,  250 => 80,  247 => 79,  244 => 78,  241 => 77,  238 => 76,  234 => 75,  225 => 69,  216 => 63,  209 => 59,  202 => 55,  195 => 51,  189 => 47,  186 => 46,  180 => 45,  177 => 44,  174 => 43,  171 => 42,  168 => 41,  165 => 40,  162 => 39,  159 => 38,  154 => 37,  151 => 36,  148 => 35,  145 => 34,  142 => 33,  134 => 27,  132 => 26,  122 => 19,  116 => 16,  108 => 11,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Rapport - {{ theme.nom }}{% endblock %}

{% block body %}
<div class=\"wrap report-wrap\">

  <section class=\"page-header report-hero\">
    <div class=\"page-header-top\">
      <div class=\"page-title\">
        <h1><i class=\"fa-solid fa-chart-column\"></i> Rapport - {{ theme.nom }}</h1>
        <p>Synthese de vos reponses et recommandations.</p>
      </div>

      <div class=\"page-actions\">
        <a href=\"{{ path('app_theme_answer', { id: theme.idT }) }}\" class=\"btn ghost\">
          Retour aux questions
        </a>
        <a href=\"{{ path('app_theme_rapport_pdf', { id: theme.idT }) }}\" class=\"btn primary\">
          <i class=\"fa-solid fa-file-pdf\"></i> Exporter en PDF
        </a>
      </div>
    </div>
  </section>

  {% if details is empty %}
    <div class=\"report-empty\">
      <i class=\"fa-regular fa-folder-open\"></i>
      <h3>Aucune reponse enregistree</h3>
      <p>Commencez par repondre aux questions pour generer le rapport.</p>
    </div>
  {% else %}
    {% set total = details|length %}
    {% set good = 0 %}
    {% set warn = 0 %}
    {% set neutral = 0 %}
    {% for item in details %}
      {% if item.ok is same as(true) %}
        {% set good = good + 1 %}
      {% elseif item.ok is same as(false) %}
        {% set warn = warn + 1 %}
      {% else %}
        {% set neutral = neutral + 1 %}
      {% endif %}
    {% endfor %}
    {% set score = total > 0 ? ((good / total) * 100)|round : 0 %}

    <section class=\"report-kpi-strip\">
      <article class=\"report-kpi\">
        <span>Total</span>
        <strong>{{ total }}</strong>
      </article>
      <article class=\"report-kpi good\">
        <span>Bonnes habitudes</span>
        <strong>{{ good }}</strong>
      </article>
      <article class=\"report-kpi warn\">
        <span>A ameliorer</span>
        <strong>{{ warn }}</strong>
      </article>
      <article class=\"report-kpi score\">
        <span>Score global</span>
        <strong>{{ score }}%</strong>
      </article>
    </section>

    <section class=\"report-scorebar\">
      <div class=\"report-scorebar-track\">
        <div class=\"report-scorebar-fill\" style=\"width: {{ score }}%\"></div>
      </div>
      <small>Progression globale sur ce theme</small>
    </section>

    <section class=\"report-grid\">
      {% for item in details %}
        {% set badgeText = item.ok is same as(true) ? 'Bonne habitude' : (item.ok is same as(false) ? 'A ameliorer' : 'Information utile') %}
        {% set adviceText = (item.advice ?? '')|trim %}
        {% set adviceLower = adviceText|lower %}
        {% set hideAdvice = false %}
        {% if item.ok is same as(true) and ('bonne habitude' in adviceLower) %}
          {% set hideAdvice = true %}
        {% elseif item.ok is same as(false) and ('amelior' in adviceLower) %}
          {% set hideAdvice = true %}
        {% elseif item.ok is null and ('information' in adviceLower) %}
          {% set hideAdvice = true %}
        {% endif %}

        <article class=\"report-card {{ item.ok is same as(true) ? 'is-good' : (item.ok is same as(false) ? 'is-warn' : 'is-neutral') }}\">
          <div class=\"report-card-top\">
            <h3>
              <i class=\"fa-solid {{ item.type == 'boolean' ? 'fa-toggle-on' : (item.type == 'number' ? 'fa-hashtag' : 'fa-message') }}\"></i>
              {{ item.question }}
            </h3>
            <span class=\"report-badge {{ item.ok is same as(true) ? 'good' : (item.ok is same as(false) ? 'warn' : 'neutral') }}\">
              {{ badgeText }}
            </span>
          </div>

          <div class=\"report-line\">
            <span class=\"report-label\">Votre reponse</span>
            <strong class=\"report-value\">
              {% if item.type == 'boolean' %}
                {{ item.value == '1' ? 'Oui' : 'Non' }}
              {% else %}
                {{ item.value }}
                {% if item.unite %} {{ item.unite }}{% endif %}
              {% endif %}
            </strong>
          </div>

          {% if item.type == 'number' and item.ideal is not null %}
            <div class=\"report-line report-target\">
              <span class=\"report-label\">Objectif</span>
              <strong class=\"report-value\">
                {{ item.ideal }}{% if item.unite %} {{ item.unite }}{% endif %}
              </strong>
            </div>
          {% endif %}

          {% if adviceText is not empty and not hideAdvice %}
            <p class=\"report-advice {{ item.ok is same as(true) ? 'good' : (item.ok is same as(false) ? 'warn' : 'info') }}\">
              {{ adviceText }}
            </p>
          {% endif %}

          <small class=\"report-date\">
            <i class=\"fa-regular fa-clock\"></i>
            Repondu le {{ item.date|date('d/m/Y a H:i') }}
          </small>
        </article>
      {% endfor %}
    </section>
  {% endif %}

</div>
{% endblock %}

", "user_response/rapport.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\user_response\\rapport.twig");
    }
}
