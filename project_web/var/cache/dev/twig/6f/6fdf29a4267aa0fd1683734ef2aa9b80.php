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

/* goal/_form.html.twig */
class __TwigTemplate_0de904825926eafa905bb902eb4ecc56 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "goal/_form.html.twig"));

        // line 1
        yield "﻿";
        // line 2
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start');
        yield "

    ";
        // line 5
        yield "    <div class=\"mb-3\">
        ";
        // line 6
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "titleGoa", [], "any", false, false, false, 6), 'label', ["label" => "Titre *"]);
        yield "
        ";
        // line 7
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "titleGoa", [], "any", false, false, false, 7), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "titleGoa", [], "any", false, false, false, 7), "vars", [], "any", false, false, false, 7), "errors", [], "any", false, false, false, 7))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 9
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "titleGoa", [], "any", false, false, false, 9), "vars", [], "any", false, false, false, 9), "errors", [], "any", false, false, false, 9)) > 0)) {
            // line 10
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "titleGoa", [], "any", false, false, false, 11), "vars", [], "any", false, false, false, 11), "errors", [], "any", false, false, false, 11));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 12
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 12), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            yield "            </div>
        ";
        }
        // line 16
        yield "    </div>

    ";
        // line 19
        yield "    <div class=\"mb-3\">
        ";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 20), 'label', ["label" => "Description *"]);
        yield "
        ";
        // line 21
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 21), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 21), "vars", [], "any", false, false, false, 21), "errors", [], "any", false, false, false, 21))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : (""))), "rows" => 4]]);
        yield "
        
        ";
        // line 23
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 23), "vars", [], "any", false, false, false, 23), "errors", [], "any", false, false, false, 23)) > 0)) {
            // line 24
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "descriptionGoa", [], "any", false, false, false, 25), "vars", [], "any", false, false, false, 25), "errors", [], "any", false, false, false, 25));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 26
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 26), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            yield "            </div>
        ";
        }
        // line 30
        yield "    </div>

    ";
        // line 33
        yield "    <div class=\"mb-3\">
        ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 34), 'label', ["label" => "Date de début"]);
        yield "
        ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 35), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 35), "vars", [], "any", false, false, false, 35), "errors", [], "any", false, false, false, 35))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 37
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 37), "vars", [], "any", false, false, false, 37), "errors", [], "any", false, false, false, 37)) > 0)) {
            // line 38
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "dateDebutGoa", [], "any", false, false, false, 39), "vars", [], "any", false, false, false, 39), "errors", [], "any", false, false, false, 39));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 40
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 40), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            yield "            </div>
        ";
        }
        // line 44
        yield "    </div>

    ";
        // line 47
        yield "    <div class=\"mb-3\">
        ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 48), 'label', ["label" => "Date de fin"]);
        yield "
        ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 49), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 49), "vars", [], "any", false, false, false, 49), "errors", [], "any", false, false, false, 49))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 51
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 51), "vars", [], "any", false, false, false, 51), "errors", [], "any", false, false, false, 51)) > 0)) {
            // line 52
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 53
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "dateFinalGoa", [], "any", false, false, false, 53), "vars", [], "any", false, false, false, 53), "errors", [], "any", false, false, false, 53));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 54
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 54), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            yield "            </div>
        ";
        }
        // line 58
        yield "    </div>

    ";
        // line 61
        yield "    <div class=\"mb-3\">
        ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "statusGoa", [], "any", false, false, false, 62), 'label', ["label" => "Statut *"]);
        yield "
        ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "statusGoa", [], "any", false, false, false, 63), 'widget', ["attr" => ["class" => ("form-select" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "statusGoa", [], "any", false, false, false, 63), "vars", [], "any", false, false, false, 63), "errors", [], "any", false, false, false, 63))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 65
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "statusGoa", [], "any", false, false, false, 65), "vars", [], "any", false, false, false, 65), "errors", [], "any", false, false, false, 65)) > 0)) {
            // line 66
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "statusGoa", [], "any", false, false, false, 67), "vars", [], "any", false, false, false, 67), "errors", [], "any", false, false, false, 67));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 68
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 68), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "            </div>
        ";
        }
        // line 72
        yield "    </div>

    ";
        // line 75
        yield "    <div class=\"mb-3\">
        ";
        // line 76
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 76, $this->source); })()), "progressGoa", [], "any", false, false, false, 76), 'label', ["label" => "Progression (%)"]);
        yield "
        ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "progressGoa", [], "any", false, false, false, 77), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 77, $this->source); })()), "progressGoa", [], "any", false, false, false, 77), "vars", [], "any", false, false, false, 77), "errors", [], "any", false, false, false, 77))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 79
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "progressGoa", [], "any", false, false, false, 79), "vars", [], "any", false, false, false, 79), "errors", [], "any", false, false, false, 79)) > 0)) {
            // line 80
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "progressGoa", [], "any", false, false, false, 81), "vars", [], "any", false, false, false, 81), "errors", [], "any", false, false, false, 81));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 82
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 82), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "            </div>
        ";
        }
        // line 86
        yield "    </div>

    ";
        // line 89
        yield "    <div class=\"mb-3\">
        ";
        // line 90
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), "categoryGoa", [], "any", false, false, false, 90), 'label', ["label" => "Catégorie *"]);
        yield "
        ";
        // line 91
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "categoryGoa", [], "any", false, false, false, 91), 'widget', ["attr" => ["class" => ("form-control" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 91, $this->source); })()), "categoryGoa", [], "any", false, false, false, 91), "vars", [], "any", false, false, false, 91), "errors", [], "any", false, false, false, 91))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 93
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "categoryGoa", [], "any", false, false, false, 93), "vars", [], "any", false, false, false, 93), "errors", [], "any", false, false, false, 93)) > 0)) {
            // line 94
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 95
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "categoryGoa", [], "any", false, false, false, 95), "vars", [], "any", false, false, false, 95), "errors", [], "any", false, false, false, 95));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 96
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 96), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            yield "            </div>
        ";
        }
        // line 100
        yield "    </div>

    ";
        // line 103
        yield "    <div class=\"mb-3\">
        ";
        // line 104
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "priorityGoa", [], "any", false, false, false, 104), 'label', ["label" => "Priorité *"]);
        yield "
        ";
        // line 105
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "priorityGoa", [], "any", false, false, false, 105), 'widget', ["attr" => ["class" => ("form-select" . (((($tmp = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 105, $this->source); })()), "priorityGoa", [], "any", false, false, false, 105), "vars", [], "any", false, false, false, 105), "errors", [], "any", false, false, false, 105))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" is-invalid") : ("")))]]);
        yield "
        
        ";
        // line 107
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "priorityGoa", [], "any", false, false, false, 107), "vars", [], "any", false, false, false, 107), "errors", [], "any", false, false, false, 107)) > 0)) {
            // line 108
            yield "            <div class=\"invalid-feedback d-block\">
                ";
            // line 109
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 109, $this->source); })()), "priorityGoa", [], "any", false, false, false, 109), "vars", [], "any", false, false, false, 109), "errors", [], "any", false, false, false, 109));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 110
                yield "                    <span class=\"text-danger\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 110), "html", null, true);
                yield "</span><br>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            yield "            </div>
        ";
        }
        // line 114
        yield "    </div>

    ";
        // line 117
        yield "    <div class=\"mb-3\">
        ";
        // line 118
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 118, $this->source); })()), "notesGoa", [], "any", false, false, false, 118), 'label', ["label" => "Notes"]);
        yield "
        ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "notesGoa", [], "any", false, false, false, 119), 'widget', ["attr" => ["class" => "form-control", "rows" => 3]]);
        yield "
    </div>

    ";
        // line 123
        yield "    <div class=\"mb-3\">
        ";
        // line 124
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 124, $this->source); })()), "colorGoa", [], "any", false, false, false, 124), 'label', ["label" => "Couleur"]);
        yield "
        ";
        // line 125
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 125, $this->source); })()), "colorGoa", [], "any", false, false, false, 125), 'widget', ["attr" => ["class" => "form-control form-control-color"]]);
        yield "
    </div>

    <button class=\"btn btn-primary\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 128, $this->source); })()), "Enregistrer")) : ("Enregistrer")), "html", null, true);
        yield "</button>

";
        // line 130
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 130, $this->source); })()), 'form_end');
        yield "
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
        return "goal/_form.html.twig";
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
        return array (  390 => 130,  385 => 128,  379 => 125,  375 => 124,  372 => 123,  366 => 119,  362 => 118,  359 => 117,  355 => 114,  351 => 112,  342 => 110,  338 => 109,  335 => 108,  333 => 107,  328 => 105,  324 => 104,  321 => 103,  317 => 100,  313 => 98,  304 => 96,  300 => 95,  297 => 94,  295 => 93,  290 => 91,  286 => 90,  283 => 89,  279 => 86,  275 => 84,  266 => 82,  262 => 81,  259 => 80,  257 => 79,  252 => 77,  248 => 76,  245 => 75,  241 => 72,  237 => 70,  228 => 68,  224 => 67,  221 => 66,  219 => 65,  214 => 63,  210 => 62,  207 => 61,  203 => 58,  199 => 56,  190 => 54,  186 => 53,  183 => 52,  181 => 51,  176 => 49,  172 => 48,  169 => 47,  165 => 44,  161 => 42,  152 => 40,  148 => 39,  145 => 38,  143 => 37,  138 => 35,  134 => 34,  131 => 33,  127 => 30,  123 => 28,  114 => 26,  110 => 25,  107 => 24,  105 => 23,  100 => 21,  96 => 20,  93 => 19,  89 => 16,  85 => 14,  76 => 12,  72 => 11,  69 => 10,  67 => 9,  62 => 7,  58 => 6,  55 => 5,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/goal/_form.html.twig #}
{{ form_start(form) }}

    {# Titre #}
    <div class=\"mb-3\">
        {{ form_label(form.titleGoa, 'Titre *') }}
        {{ form_widget(form.titleGoa, {'attr': {'class': 'form-control' ~ (form.titleGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.titleGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.titleGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Description #}
    <div class=\"mb-3\">
        {{ form_label(form.descriptionGoa, 'Description *') }}
        {{ form_widget(form.descriptionGoa, {'attr': {'class': 'form-control' ~ (form.descriptionGoa.vars.errors|length ? ' is-invalid' : ''), 'rows': 4}}) }}
        
        {% if form.descriptionGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.descriptionGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Date de début #}
    <div class=\"mb-3\">
        {{ form_label(form.dateDebutGoa, 'Date de début') }}
        {{ form_widget(form.dateDebutGoa, {'attr': {'class': 'form-control' ~ (form.dateDebutGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.dateDebutGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.dateDebutGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Date de fin #}
    <div class=\"mb-3\">
        {{ form_label(form.dateFinalGoa, 'Date de fin') }}
        {{ form_widget(form.dateFinalGoa, {'attr': {'class': 'form-control' ~ (form.dateFinalGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.dateFinalGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.dateFinalGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Statut #}
    <div class=\"mb-3\">
        {{ form_label(form.statusGoa, 'Statut *') }}
        {{ form_widget(form.statusGoa, {'attr': {'class': 'form-select' ~ (form.statusGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.statusGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.statusGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Progression #}
    <div class=\"mb-3\">
        {{ form_label(form.progressGoa, 'Progression (%)') }}
        {{ form_widget(form.progressGoa, {'attr': {'class': 'form-control' ~ (form.progressGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.progressGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.progressGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Catégorie #}
    <div class=\"mb-3\">
        {{ form_label(form.categoryGoa, 'Catégorie *') }}
        {{ form_widget(form.categoryGoa, {'attr': {'class': 'form-control' ~ (form.categoryGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.categoryGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.categoryGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Priorité #}
    <div class=\"mb-3\">
        {{ form_label(form.priorityGoa, 'Priorité *') }}
        {{ form_widget(form.priorityGoa, {'attr': {'class': 'form-select' ~ (form.priorityGoa.vars.errors|length ? ' is-invalid' : '')}}) }}
        
        {% if form.priorityGoa.vars.errors|length > 0 %}
            <div class=\"invalid-feedback d-block\">
                {% for error in form.priorityGoa.vars.errors %}
                    <span class=\"text-danger\">{{ error.message }}</span><br>
                {% endfor %}
            </div>
        {% endif %}
    </div>

    {# Notes #}
    <div class=\"mb-3\">
        {{ form_label(form.notesGoa, 'Notes') }}
        {{ form_widget(form.notesGoa, {'attr': {'class': 'form-control', 'rows': 3}}) }}
    </div>

    {# Couleur #}
    <div class=\"mb-3\">
        {{ form_label(form.colorGoa, 'Couleur') }}
        {{ form_widget(form.colorGoa, {'attr': {'class': 'form-control form-control-color'}}) }}
    </div>

    <button class=\"btn btn-primary\">{{ button_label|default('Enregistrer') }}</button>

{{ form_end(form) }}
", "goal/_form.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\goal\\_form.html.twig");
    }
}
