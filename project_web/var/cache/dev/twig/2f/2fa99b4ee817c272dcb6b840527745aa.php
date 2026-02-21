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

/* mouvement/_form.html.twig */
class __TwigTemplate_dc9eff781d1ee5936e2f21b13a2befbb extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/_form.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/_form.html.twig"));

        // line 1
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), 'form_start');
        yield "

<div class=\"form-errors\">
    ";
        // line 4
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), 'errors');
        yield "
</div>

<div class=\"form-section\">
    <h3>Informations mouvement</h3>

    <div class=\"form-grid-2\">
        <div>
            ";
        // line 12
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "type_m", [], "any", false, false, false, 12), 'label', ["label_attr" => ["class" => "field-label"], "label" => "Type *"]);
        yield "
            ";
        // line 13
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "type_m", [], "any", false, false, false, 13), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 14
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "type_m", [], "any", false, false, false, 14), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 18
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "produit", [], "any", false, false, false, 18), 'label', ["label_attr" => ["class" => "field-label"], "label" => "Produit *"]);
        yield "
            ";
        // line 19
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "produit", [], "any", false, false, false, 19), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 20
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "produit", [], "any", false, false, false, 20), 'errors');
        yield "</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Détails</h3>

    <div class=\"form-grid-2\">
        <div>
            ";
        // line 30
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "quantite", [], "any", false, false, false, 30), 'label', ["label_attr" => ["class" => "field-label"], "label" => "Quantité *"]);
        yield "
            ";
        // line 31
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "quantite", [], "any", false, false, false, 31), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 32
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "quantite", [], "any", false, false, false, 32), 'errors');
        yield "</div>
        </div>

        <div>
            ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "date_mouvement", [], "any", false, false, false, 36), 'label', ["label_attr" => ["class" => "field-label"], "label" => "Date *"]);
        yield "
            ";
        // line 37
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), "date_mouvement", [], "any", false, false, false, 37), 'widget', ["attr" => ["class" => "field"]]);
        yield "
            <div class=\"field-errors\">";
        // line 38
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "date_mouvement", [], "any", false, false, false, 38), 'errors');
        yield "</div>
        </div>
    </div>

    <div style=\"margin-top:18px\">
        ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "motif", [], "any", false, false, false, 43), 'label', ["label_attr" => ["class" => "field-label"], "label" => "Motif *"]);
        yield "
        ";
        // line 44
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "motif", [], "any", false, false, false, 44), 'widget', ["attr" => ["class" => "field"]]);
        yield "
        <div class=\"field-errors\">";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "motif", [], "any", false, false, false, 45), 'errors');
        yield "</div>
    </div>
</div>

<div class=\"form-actions\" style=\"display:flex;gap:14px;justify-content:flex-end\">
    <button class=\"btn primary\">
        <i class=\"fa-solid fa-check\"></i>
        ";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("button_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 52, $this->source); })()), "Enregistrer")) : ("Enregistrer")), "html", null, true);
        yield "
    </button>

    <a href=\"";
        // line 55
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
        yield "\" class=\"btn\">
        Annuler
    </a>
</div>

";
        // line 60
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), 'form_end');
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
        return "mouvement/_form.html.twig";
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
        return array (  164 => 60,  156 => 55,  150 => 52,  140 => 45,  136 => 44,  132 => 43,  124 => 38,  120 => 37,  116 => 36,  109 => 32,  105 => 31,  101 => 30,  88 => 20,  84 => 19,  80 => 18,  73 => 14,  69 => 13,  65 => 12,  54 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ form_start(form) }}

<div class=\"form-errors\">
    {{ form_errors(form) }}
</div>

<div class=\"form-section\">
    <h3>Informations mouvement</h3>

    <div class=\"form-grid-2\">
        <div>
            {{ form_label(form.type_m, 'Type *', {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.type_m, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.type_m) }}</div>
        </div>

        <div>
            {{ form_label(form.produit, 'Produit *', {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.produit, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.produit) }}</div>
        </div>
    </div>
</div>

<div class=\"form-section\">
    <h3>Détails</h3>

    <div class=\"form-grid-2\">
        <div>
            {{ form_label(form.quantite, 'Quantité *', {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.quantite, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.quantite) }}</div>
        </div>

        <div>
            {{ form_label(form.date_mouvement, 'Date *', {'label_attr': {'class': 'field-label'}}) }}
            {{ form_widget(form.date_mouvement, {'attr': {'class': 'field'}}) }}
            <div class=\"field-errors\">{{ form_errors(form.date_mouvement) }}</div>
        </div>
    </div>

    <div style=\"margin-top:18px\">
        {{ form_label(form.motif, 'Motif *', {'label_attr': {'class': 'field-label'}}) }}
        {{ form_widget(form.motif, {'attr': {'class': 'field'}}) }}
        <div class=\"field-errors\">{{ form_errors(form.motif) }}</div>
    </div>
</div>

<div class=\"form-actions\" style=\"display:flex;gap:14px;justify-content:flex-end\">
    <button class=\"btn primary\">
        <i class=\"fa-solid fa-check\"></i>
        {{ button_label|default('Enregistrer') }}
    </button>

    <a href=\"{{ path('app_mouvement_index') }}\" class=\"btn\">
        Annuler
    </a>
</div>

{{ form_end(form) }}
", "mouvement/_form.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\mouvement\\_form.html.twig");
    }
}
