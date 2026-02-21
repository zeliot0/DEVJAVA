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

/* admin/produit/index.html.twig */
class __TwigTemplate_75f5b1a95ccdf802e844dc1962ec54bf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/produit/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/produit/index.html.twig"));

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

        yield "Admin – Produits";
        
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
        yield "<div style=\"display:flex; gap:12px\">
    <a href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mouvement_index");
        yield "\" class=\"btn ghost\">
        <i class=\"fa-solid fa-right-left\"></i>
        Mouvements
    </a>
</div>

";
        // line 12
        $context["currentSort"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "request", [], "any", false, false, false, 12), "get", ["sort"], "method", false, false, false, 12);
        // line 13
        $context["currentDir"] = Twig\Extension\CoreExtension::upper($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "request", [], "any", false, false, false, 13), "get", ["dir"], "method", false, false, false, 13)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "request", [], "any", false, false, false, 13), "get", ["dir"], "method", false, false, false, 13)) : ("DESC")));
        // line 14
        yield "
<div class=\"page-header\">
    <div>
        <h1>Produits</h1>
        <p>Consultation du stock (Admin )</p>
    </div>

    
</div>

<form method=\"get\" class=\"search-bar\">
    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un produit...\" value=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 27, $this->source); })()), "html", null, true);
        yield "\">
    </div>

    <div class=\"search-select\">
        <select name=\"sort\">
            <option value=\"\">Tri : Date</option>
            <option value=\"nom\">Nom</option>
            <option value=\"categorie\">Catégorie</option>
            <option value=\"stock\">Stock</option>
        </select>
    </div>

    <div class=\"search-select\">
        <select name=\"dir\">
            <option value=\"DESC\">DESC</option>
            <option value=\"ASC\">ASC</option>
        </select>
    </div>

    <button class=\"btn primary\" type=\"submit\">Rechercher</button>
</form>

<div class=\"pack-grid\">
";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 50, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 51
            yield "<article class=\"pack-card\">

    <div class=\"pack-head\">
        <div class=\"item-media\">
            <div class=\"thumb\">
                ";
            // line 56
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photoP", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 57
                yield "                    <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/produits/" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photoP", [], "any", false, false, false, 57))), "html", null, true);
                yield "\" alt=\"\">
                ";
            } else {
                // line 59
                yield "                    <span class=\"thumb-placeholder\">
                        ";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 60), 0, 1)), "html", null, true);
                yield "
                    </span>
                ";
            }
            // line 63
            yield "            </div>

            <div class=\"item-text\">
                <div class=\"item-title\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 66), "html", null, true);
            yield "</div>
                <div class=\"item-sub\">#";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 67), "html", null, true);
            yield "</div>
            </div>
        </div>

        ";
            // line 71
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 71) < 5)) {
                // line 72
                yield "            <span class=\"pack-pill danger\">Stock faible</span>
        ";
            } else {
                // line 74
                yield "            <span class=\"pack-pill success\">Disponible</span>
        ";
            }
            // line 76
            yield "    </div>

    <div class=\"pack-metric\">
        ";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 79), "html", null, true);
            yield "
        <small>Stock • ";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "uniteP", [], "any", false, false, false, 80), "html", null, true);
            yield "</small>
    </div>

    <ul class=\"pack-list\">
        <li>📍 Emplacement : ";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "emplacement", [], "any", false, false, false, 84), "html", null, true);
            yield "</li>
        <li>📅 Ajout : ";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateAjout", [], "any", false, false, false, 85), "d/m/Y"), "html", null, true);
            yield "</li>
        <li>⏳ Expiration : ";
            // line 86
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateExpiration", [], "any", false, false, false, 86)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateExpiration", [], "any", false, false, false, 86), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</li>
    </ul>

   

</article>
";
            $context['_iterated'] = true;
        }
        // line 92
        if (!$context['_iterated']) {
            // line 93
            yield "    <div class=\"warning\">Aucun produit trouvé</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
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
        return "admin/produit/index.html.twig";
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
        return array (  256 => 95,  249 => 93,  247 => 92,  236 => 86,  232 => 85,  228 => 84,  221 => 80,  217 => 79,  212 => 76,  208 => 74,  204 => 72,  202 => 71,  195 => 67,  191 => 66,  186 => 63,  180 => 60,  177 => 59,  171 => 57,  169 => 56,  162 => 51,  157 => 50,  131 => 27,  116 => 14,  114 => 13,  112 => 12,  103 => 6,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Admin – Produits{% endblock %}

{% block body %}
<div style=\"display:flex; gap:12px\">
    <a href=\"{{ path('admin_mouvement_index') }}\" class=\"btn ghost\">
        <i class=\"fa-solid fa-right-left\"></i>
        Mouvements
    </a>
</div>

{% set currentSort = app.request.get('sort') %}
{% set currentDir = (app.request.get('dir') ?: 'DESC')|upper %}

<div class=\"page-header\">
    <div>
        <h1>Produits</h1>
        <p>Consultation du stock (Admin )</p>
    </div>

    
</div>

<form method=\"get\" class=\"search-bar\">
    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un produit...\" value=\"{{ q }}\">
    </div>

    <div class=\"search-select\">
        <select name=\"sort\">
            <option value=\"\">Tri : Date</option>
            <option value=\"nom\">Nom</option>
            <option value=\"categorie\">Catégorie</option>
            <option value=\"stock\">Stock</option>
        </select>
    </div>

    <div class=\"search-select\">
        <select name=\"dir\">
            <option value=\"DESC\">DESC</option>
            <option value=\"ASC\">ASC</option>
        </select>
    </div>

    <button class=\"btn primary\" type=\"submit\">Rechercher</button>
</form>

<div class=\"pack-grid\">
{% for produit in produits %}
<article class=\"pack-card\">

    <div class=\"pack-head\">
        <div class=\"item-media\">
            <div class=\"thumb\">
                {% if produit.photoP %}
                    <img src=\"{{ asset('uploads/produits/' ~ produit.photoP) }}\" alt=\"\">
                {% else %}
                    <span class=\"thumb-placeholder\">
                        {{ produit.nomP|slice(0,1)|upper }}
                    </span>
                {% endif %}
            </div>

            <div class=\"item-text\">
                <div class=\"item-title\">{{ produit.nomP }}</div>
                <div class=\"item-sub\">#{{ produit.idP }}</div>
            </div>
        </div>

        {% if produit.quantiteStock < 5 %}
            <span class=\"pack-pill danger\">Stock faible</span>
        {% else %}
            <span class=\"pack-pill success\">Disponible</span>
        {% endif %}
    </div>

    <div class=\"pack-metric\">
        {{ produit.quantiteStock }}
        <small>Stock • {{ produit.uniteP }}</small>
    </div>

    <ul class=\"pack-list\">
        <li>📍 Emplacement : {{ produit.emplacement }}</li>
        <li>📅 Ajout : {{ produit.dateAjout|date('d/m/Y') }}</li>
        <li>⏳ Expiration : {{ produit.dateExpiration ? produit.dateExpiration|date('d/m/Y') : '—' }}</li>
    </ul>

   

</article>
{% else %}
    <div class=\"warning\">Aucun produit trouvé</div>
{% endfor %}
</div>

{% endblock %}
", "admin/produit/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\admin\\produit\\index.html.twig");
    }
}
