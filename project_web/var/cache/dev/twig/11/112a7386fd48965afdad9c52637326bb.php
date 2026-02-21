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

/* admin/mouvement/index.html.twig */
class __TwigTemplate_5902159932b71e96a6c4cd5a6198c4be extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/mouvement/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/mouvement/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Admin – Mouvements";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "
<div class=\"page-header\">
    <div>
        <h1>Historique des mouvements</h1>
        <p>Entrées et sorties de stock (admin)</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        
        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_produit_index");
        yield "\" class=\"btn ghost\">
            <i class=\"fa-solid fa-box\"></i>
            Produits
        </a>
    </div>
</div>

<form method=\"get\" class=\"search-bar\">
    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un mouvement...\" value=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 24, $this->source); })()), "html", null, true);
        yield "\">
    </div>

    <button class=\"btn primary\">Rechercher</button>
</form>

<div class=\"pack-grid\">
";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["mouvements"]) || array_key_exists("mouvements", $context) ? $context["mouvements"] : (function () { throw new RuntimeError('Variable "mouvements" does not exist.', 31, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 32
            yield "<article class=\"pack-card\">

    <div class=\"pack-head\">
        <div class=\"item-text\">
            <div class=\"item-title\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["m"], "produit", [], "any", false, false, false, 36), "nomP", [], "any", false, false, false, 36), "html", null, true);
            yield "</div>
            <div class=\"item-sub\">#";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["m"], "idMo", [], "any", false, false, false, 37), "html", null, true);
            yield "</div>
        </div>

        <span class=\"pack-pill ";
            // line 40
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["m"], "typeM", [], "any", false, false, false, 40) == "SORTIE")) ? ("danger") : ("success"));
            yield "\">
            ";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["m"], "typeM", [], "any", false, false, false, 41), "html", null, true);
            yield "
        </span>
    </div>

    <div class=\"pack-metric\">
        ";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["m"], "quantite", [], "any", false, false, false, 46), "html", null, true);
            yield "
        <small>Quantité</small>
    </div>

    <ul class=\"pack-list\">
        <li>📅 Date : ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["m"], "dateMouvement", [], "any", false, false, false, 51), "d/m/Y"), "html", null, true);
            yield "</li>
        <li>📝 Motif : ";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["m"], "motif", [], "any", false, false, false, 52), "html", null, true);
            yield "</li>
        <li>📦 Produit : ";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["m"], "produit", [], "any", false, false, false, 53), "nomP", [], "any", false, false, false, 53), "html", null, true);
            yield "</li>
    </ul>

    

</article>
";
            $context['_iterated'] = true;
        }
        // line 59
        if (!$context['_iterated']) {
            // line 60
            yield "    <div class=\"warning\">Aucun mouvement trouvé</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['m'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        yield "</div>

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
        return "admin/mouvement/index.html.twig";
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
        return array (  203 => 62,  196 => 60,  194 => 59,  183 => 53,  179 => 52,  175 => 51,  167 => 46,  159 => 41,  155 => 40,  149 => 37,  145 => 36,  139 => 32,  134 => 31,  124 => 24,  111 => 14,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Admin – Mouvements{% endblock %}

{% block body %}

<div class=\"page-header\">
    <div>
        <h1>Historique des mouvements</h1>
        <p>Entrées et sorties de stock (admin)</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        
        <a href=\"{{ path('admin_produit_index') }}\" class=\"btn ghost\">
            <i class=\"fa-solid fa-box\"></i>
            Produits
        </a>
    </div>
</div>

<form method=\"get\" class=\"search-bar\">
    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un mouvement...\" value=\"{{ q }}\">
    </div>

    <button class=\"btn primary\">Rechercher</button>
</form>

<div class=\"pack-grid\">
{% for m in mouvements %}
<article class=\"pack-card\">

    <div class=\"pack-head\">
        <div class=\"item-text\">
            <div class=\"item-title\">{{ m.produit.nomP }}</div>
            <div class=\"item-sub\">#{{ m.idMo }}</div>
        </div>

        <span class=\"pack-pill {{ m.typeM == 'SORTIE' ? 'danger' : 'success' }}\">
            {{ m.typeM }}
        </span>
    </div>

    <div class=\"pack-metric\">
        {{ m.quantite }}
        <small>Quantité</small>
    </div>

    <ul class=\"pack-list\">
        <li>📅 Date : {{ m.dateMouvement|date('d/m/Y') }}</li>
        <li>📝 Motif : {{ m.motif }}</li>
        <li>📦 Produit : {{ m.produit.nomP }}</li>
    </ul>

    

</article>
{% else %}
    <div class=\"warning\">Aucun mouvement trouvé</div>
{% endfor %}
</div>

{% endblock %}
", "admin/mouvement/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\admin\\mouvement\\index.html.twig");
    }
}
