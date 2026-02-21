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

/* produit/pdf.html.twig */
class __TwigTemplate_a287f76d1da4940502e3710748b0a466 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/pdf.html.twig"));

        // line 1
        yield "<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Produits</title>
    <style>
        @page { margin: 18px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111; }
        h1 { margin: 0; font-size: 18px; }
        .meta { margin-top: 4px; color: #555; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; vertical-align: top; }
        th { background: #f3f3f3; text-align: left; }
        .num { text-align: right; }
    </style>
</head>
<body>
<h1>Liste des produits</h1>
<div class=\"meta\">
    Généré le ";
        // line 20
        yield (((($tmp = (isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 20, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 20, $this->source); })()), "d/m/Y H:i"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y H:i"), "html", null, true)));
        yield "
    ";
        // line 21
        if ((($tmp = (isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " — Recherche : “";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 21, $this->source); })()), "html", null, true);
            yield "”";
        }
        // line 22
        yield "    ";
        if ((($tmp = (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 22, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " — Tri : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 22, $this->source); })()), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (isset($context["dir"]) || array_key_exists("dir", $context) ? $context["dir"] : (function () { throw new RuntimeError('Variable "dir" does not exist.', 22, $this->source); })())), "html", null, true);
        }
        // line 23
        yield "</div>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Produit</th>
        <th>Catégorie</th>
        <th class=\"num\">Stock</th>
        <th>Unité</th>
        <th>Ajout</th>
        <th>Expiration</th>
        <th>Emplacement</th>
    </tr>
    </thead>
    <tbody>
    
    ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 40, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 41
            yield "        <tr>
            <td class=\"num\">";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 42), "html", null, true);
            yield "</td>
            <td>";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 43), "html", null, true);
            yield "</td>
            <td>";
            // line 44
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "categorieP", [], "any", false, false, false, 44), "html", null, true);
            yield "</td>
            <td class=\"num\">";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 45), "html", null, true);
            yield "</td>
            <td>";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "uniteP", [], "any", false, false, false, 46), "html", null, true);
            yield "</td>
            <td>";
            // line 47
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateAjout", [], "any", false, false, false, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateAjout", [], "any", false, false, false, 47), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
            <td>";
            // line 48
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateExpiration", [], "any", false, false, false, 48)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateExpiration", [], "any", false, false, false, 48), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</td>
            <td>";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "emplacement", [], "any", false, false, false, 49), "html", null, true);
            yield "</td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        // line 51
        if (!$context['_iterated']) {
            // line 52
            yield "        <tr>
            <td colspan=\"8\" style=\"text-align:center; padding:18px; color:#777\">
                Aucun produit
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        yield "    </tbody>
</table>
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
        return "produit/pdf.html.twig";
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
        return array (  162 => 58,  151 => 52,  149 => 51,  142 => 49,  138 => 48,  134 => 47,  130 => 46,  126 => 45,  122 => 44,  118 => 43,  114 => 42,  111 => 41,  106 => 40,  87 => 23,  79 => 22,  73 => 21,  69 => 20,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Produits</title>
    <style>
        @page { margin: 18px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111; }
        h1 { margin: 0; font-size: 18px; }
        .meta { margin-top: 4px; color: #555; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; vertical-align: top; }
        th { background: #f3f3f3; text-align: left; }
        .num { text-align: right; }
    </style>
</head>
<body>
<h1>Liste des produits</h1>
<div class=\"meta\">
    Généré le {{ generatedAt ? generatedAt|date('d/m/Y H:i') : \"now\"|date('d/m/Y H:i') }}
    {% if q %} — Recherche : “{{ q }}”{% endif %}
    {% if sort %} — Tri : {{ sort }} {{ dir|upper }}{% endif %}
</div>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Produit</th>
        <th>Catégorie</th>
        <th class=\"num\">Stock</th>
        <th>Unité</th>
        <th>Ajout</th>
        <th>Expiration</th>
        <th>Emplacement</th>
    </tr>
    </thead>
    <tbody>
    
    {% for produit in produits %}
        <tr>
            <td class=\"num\">{{ produit.idP }}</td>
            <td>{{ produit.nomP }}</td>
            <td>{{ produit.categorieP }}</td>
            <td class=\"num\">{{ produit.quantiteStock }}</td>
            <td>{{ produit.uniteP }}</td>
            <td>{{ produit.dateAjout ? produit.dateAjout|date('d/m/Y') : '-' }}</td>
            <td>{{ produit.dateExpiration ? produit.dateExpiration|date('d/m/Y') : '—' }}</td>
            <td>{{ produit.emplacement }}</td>
        </tr>
    {% else %}
        <tr>
            <td colspan=\"8\" style=\"text-align:center; padding:18px; color:#777\">
                Aucun produit
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
</body>
</html>

", "produit/pdf.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\produit\\pdf.html.twig");
    }
}
