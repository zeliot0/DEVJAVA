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

/* mouvement/pdf.html.twig */
class __TwigTemplate_1a82ff33ec96a389c16299532ec655af extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/pdf.html.twig"));

        // line 1
        yield "<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Mouvements</title>
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
<h1>Historique des mouvements</h1>
<div class=\"meta\">
    Généré le ";
        // line 20
        yield (((($tmp = (isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 20, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate((isset($context["generatedAt"]) || array_key_exists("generatedAt", $context) ? $context["generatedAt"] : (function () { throw new RuntimeError('Variable "generatedAt" does not exist.', 20, $this->source); })()), "d/m/Y H:i"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y H:i"), "html", null, true)));
        yield "
    ";
        // line 21
        if ((($tmp = (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 21, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " — Produit : “";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 21, $this->source); })()), "nomP", [], "any", false, false, false, 21), "html", null, true);
            yield "”";
        }
        // line 22
        yield "    ";
        if ((($tmp = (isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 22, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " — Recherche : “";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 22, $this->source); })()), "html", null, true);
            yield "”";
        }
        // line 23
        yield "    ";
        if ((($tmp = (isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " — Tri : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 23, $this->source); })()), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), (isset($context["dir"]) || array_key_exists("dir", $context) ? $context["dir"] : (function () { throw new RuntimeError('Variable "dir" does not exist.', 23, $this->source); })())), "html", null, true);
        }
        // line 24
        yield "</div>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Produit</th>
        <th class=\"num\">Quantité</th>
        <th>Date</th>
        <th>Motif</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["mouvements"]) || array_key_exists("mouvements", $context) ? $context["mouvements"] : (function () { throw new RuntimeError('Variable "mouvements" does not exist.', 38, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["mouvement"]) {
            // line 39
            yield "        <tr>
            <td class=\"num\">";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 40), "html", null, true);
            yield "</td>
            <td>";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "typeM", [], "any", false, false, false, 41), "html", null, true);
            yield "</td>
            <td>";
            // line 42
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 42)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 42), "nomP", [], "any", false, false, false, 42), "html", null, true)) : ("—"));
            yield "</td>
            <td class=\"num\">";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "quantite", [], "any", false, false, false, 43), "html", null, true);
            yield "</td>
            <td>";
            // line 44
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 44), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</td>
            <td>";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "motif", [], "any", false, false, false, 45), "html", null, true);
            yield "</td>
        </tr>
    ";
            $context['_iterated'] = true;
        }
        // line 47
        if (!$context['_iterated']) {
            // line 48
            yield "        <tr>
            <td colspan=\"6\" style=\"text-align:center; padding:18px; color:#777\">
                Aucun mouvement
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mouvement'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
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
        return "mouvement/pdf.html.twig";
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
        return array (  158 => 54,  147 => 48,  145 => 47,  138 => 45,  134 => 44,  130 => 43,  126 => 42,  122 => 41,  118 => 40,  115 => 39,  110 => 38,  94 => 24,  86 => 23,  79 => 22,  73 => 21,  69 => 20,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Mouvements</title>
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
<h1>Historique des mouvements</h1>
<div class=\"meta\">
    Généré le {{ generatedAt ? generatedAt|date('d/m/Y H:i') : \"now\"|date('d/m/Y H:i') }}
    {% if produit %} — Produit : “{{ produit.nomP }}”{% endif %}
    {% if q %} — Recherche : “{{ q }}”{% endif %}
    {% if sort %} — Tri : {{ sort }} {{ dir|upper }}{% endif %}
</div>

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Produit</th>
        <th class=\"num\">Quantité</th>
        <th>Date</th>
        <th>Motif</th>
    </tr>
    </thead>
    <tbody>
    {% for mouvement in mouvements %}
        <tr>
            <td class=\"num\">{{ mouvement.idMo }}</td>
            <td>{{ mouvement.typeM }}</td>
            <td>{{ mouvement.produit ? mouvement.produit.nomP : '—' }}</td>
            <td class=\"num\">{{ mouvement.quantite }}</td>
            <td>{{ mouvement.dateMouvement ? mouvement.dateMouvement|date('d/m/Y') : '-' }}</td>
            <td>{{ mouvement.motif }}</td>
        </tr>
    {% else %}
        <tr>
            <td colspan=\"6\" style=\"text-align:center; padding:18px; color:#777\">
                Aucun mouvement
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
</body>
</html>
", "mouvement/pdf.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\mouvement\\pdf.html.twig");
    }
}
