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

/* produit/_form.html.twig */
class __TwigTemplate_c3cdc098678a0a7a0b002bc487ea5152 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/_form.html.twig"));

        // line 1
        yield "﻿";
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        yield "

<div class=\"form-errors\">
    ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), 'errors');
        yield "
</div>

<div class=\"form-section\">
    <h3>Informations générales</h3>

    <div class=\"form-grid-2\">
        <div>
            ";
        // line 12
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "nom_p", [], "any", false, false, false, 12), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 13
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "nom_p", [], "any", false, false, false, 13), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "nom_p", [], "any", false, false, false, 14), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "categorie_p", [], "any", false, false, false, 18), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 19
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "categorie_p", [], "any", false, false, false, 19), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "categorie_p", [], "any", false, false, false, 20), 'errors');
        yield "</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Stock</h3>

    <div class=\"form-grid-3\">
        <div>
            ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "quantite_stock", [], "any", false, false, false, 30), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "quantite_stock", [], "any", false, false, false, 31), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "quantite_stock", [], "any", false, false, false, 32), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "unite_p", [], "any", false, false, false, 36), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "unite_p", [], "any", false, false, false, 37), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "unite_p", [], "any", false, false, false, 38), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "emplacement", [], "any", false, false, false, 42), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "emplacement", [], "any", false, false, false, 43), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "emplacement", [], "any", false, false, false, 44), 'errors');
        yield "</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Dates</h3>

    <div class=\"form-grid-2\">
        <div>
            ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "date_ajout", [], "any", false, false, false, 54), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "date_ajout", [], "any", false, false, false, 55), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "date_ajout", [], "any", false, false, false, 56), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 60
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "date_expiration", [], "any", false, false, false, 60), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 61
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "date_expiration", [], "any", false, false, false, 61), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "date_expiration", [], "any", false, false, false, 62), 'errors');
        yield "</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <div class=\"form-grid-2\">
        <div>
            ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "photo_p", [], "any", false, false, false, 70), 'label', ["label_attr" => ["class" => "field-label"]]);
        yield "
            ";
        // line 71
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "photo_p", [], "any", false, false, false, 71), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-hint\">Formats: JPG / PNG / WEBP / GIF</div>
            <div class=\"field-errors\">";
        // line 73
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "photo_p", [], "any", false, false, false, 73), 'errors');
        yield "</div>
        </div>
    </div>
</div>

<div class=\"form-actions\" style=\"display:flex;gap:14px;justify-content:flex-end\">
    <button class=\"btn primary\" type=\"submit\">
        <i class=\"fa-solid fa-check\"></i>
        ";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 81, $this->source); })()), "Enregistrer")) : ("Enregistrer")), "html", null, true);
        yield "
    </button>

    <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn\">
        Annuler
    </a>
</div>

";
        // line 89
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), 'form_end');
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
        return "produit/_form.html.twig";
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
        return array (  221 => 89,  213 => 84,  207 => 81,  196 => 73,  191 => 71,  187 => 70,  176 => 62,  172 => 61,  168 => 60,  161 => 56,  157 => 55,  153 => 54,  140 => 44,  136 => 43,  132 => 42,  125 => 38,  121 => 37,  117 => 36,  110 => 32,  106 => 31,  102 => 30,  89 => 20,  85 => 19,  81 => 18,  74 => 14,  70 => 13,  66 => 12,  55 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{{ form_start(form) }}

<div class=\"form-errors\">
    {{ form_errors(form) }}
</div>

<div class=\"form-section\">
    <h3>Informations générales</h3>

    <div class=\"form-grid-2\">
        <div>
            {{ form_label(form.nom_p, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.nom_p, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.nom_p) }}</div>
        </div>

        <div>
            {{ form_label(form.categorie_p, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.categorie_p, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.categorie_p) }}</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Stock</h3>

    <div class=\"form-grid-3\">
        <div>
            {{ form_label(form.quantite_stock, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.quantite_stock, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.quantite_stock) }}</div>
        </div>

        <div>
            {{ form_label(form.unite_p, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.unite_p, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.unite_p) }}</div>
        </div>

        <div>
            {{ form_label(form.emplacement, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.emplacement, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.emplacement) }}</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Dates</h3>

    <div class=\"form-grid-2\">
        <div>
            {{ form_label(form.date_ajout, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.date_ajout, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.date_ajout) }}</div>
        </div>

        <div>
            {{ form_label(form.date_expiration, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.date_expiration, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.date_expiration) }}</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <div class=\"form-grid-2\">
        <div>
            {{ form_label(form.photo_p, null, {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.photo_p, {'attr': {'class': 'field'}}) }}
            <div class=\"field-hint\">Formats: JPG / PNG / WEBP / GIF</div>
            <div class=\"field-errors\">{{ form_errors(form.photo_p) }}</div>
        </div>
    </div>
</div>

<div class=\"form-actions\" style=\"display:flex;gap:14px;justify-content:flex-end\">
    <button class=\"btn primary\" type=\"submit\">
        <i class=\"fa-solid fa-check\"></i>
        {{ button_label|default('Enregistrer') }}
    </button>

    <a href=\"{{ path('app_produit_index') }}\" class=\"btn\">
        Annuler
    </a>
</div>

{{ form_end(form) }}
", "produit/_form.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\produit\\_form.html.twig");
    }
}
