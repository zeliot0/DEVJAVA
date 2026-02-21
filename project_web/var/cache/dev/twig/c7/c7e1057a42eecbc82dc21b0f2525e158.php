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

/* produit/index.html.twig */
class __TwigTemplate_742c532372d43ab9abe08139ceb7505f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/index.html.twig"));

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

        yield "Produits - NEXA";
        
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
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/product-index-modern.css?v=20260214b"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
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

        // line 14
        $context["currentSort"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "get", ["sort"], "method", false, false, false, 14);
        // line 15
        $context["currentDir"] = Twig\Extension\CoreExtension::upper($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "request", [], "any", false, false, false, 15), "get", ["dir"], "method", false, false, false, 15)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "request", [], "any", false, false, false, 15), "get", ["dir"], "method", false, false, false, 15)) : ("DESC")));
        // line 16
        $context["queryParams"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "request", [], "any", false, false, false, 16), "query", [], "any", false, false, false, 16), "all", [], "any", false, false, false, 16);
        // line 17
        $context["totalProducts"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 17, $this->source); })()));
        // line 18
        $context["totalStock"] = 0;
        // line 19
        $context["lowStockCount"] = 0;
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 21
            yield "    ";
            $context["qty"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["p"], "quantiteStock", [], "any", true, true, false, 21) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["p"], "quantiteStock", [], "any", false, false, false, 21)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["p"], "quantiteStock", [], "any", false, false, false, 21)) : (0));
            // line 22
            yield "    ";
            $context["totalStock"] = ((isset($context["totalStock"]) || array_key_exists("totalStock", $context) ? $context["totalStock"] : (function () { throw new RuntimeError('Variable "totalStock" does not exist.', 22, $this->source); })()) + (isset($context["qty"]) || array_key_exists("qty", $context) ? $context["qty"] : (function () { throw new RuntimeError('Variable "qty" does not exist.', 22, $this->source); })()));
            // line 23
            yield "    ";
            if (((isset($context["qty"]) || array_key_exists("qty", $context) ? $context["qty"] : (function () { throw new RuntimeError('Variable "qty" does not exist.', 23, $this->source); })()) < 5)) {
                // line 24
                yield "        ";
                $context["lowStockCount"] = ((isset($context["lowStockCount"]) || array_key_exists("lowStockCount", $context) ? $context["lowStockCount"] : (function () { throw new RuntimeError('Variable "lowStockCount" does not exist.', 24, $this->source); })()) + 1);
                // line 25
                yield "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "
<div class=\"produits-page-modern\">
    <div class=\"page-header produits-header-modern\">
        <div>
            <div class=\"produits-kicker\">Stock manager</div>
            <h1>Produits</h1>
            <p>";
        // line 33
        yield (((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Consultation du stock (admin)") : ("Gestion du stock et des informations produits"));
        yield "</p>
        </div>

        <div class=\"page-actions produits-actions-modern\">
            <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
        yield "\" class=\"btn\">
                <i class=\"fa-solid fa-right-left\"></i> Mouvements
            </a>
            ";
        // line 40
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 41
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_stats");
            yield "\" class=\"btn\">Stats</a>
                <a href=\"";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_pdf", (isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 42, $this->source); })())), "html", null, true);
            yield "\" class=\"btn\">PDF</a>
                <a href=\"";
            // line 43
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_new");
            yield "\" class=\"btn primary\">+ Ajouter un produit</a>
            ";
        }
        // line 45
        yield "        </div>
    </div>

    <section class=\"produits-kpi-row\" aria-label=\"Indicateurs produits\">
        <article class=\"produits-kpi\">
            <span>Total produits</span>
            <strong>";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalProducts"]) || array_key_exists("totalProducts", $context) ? $context["totalProducts"] : (function () { throw new RuntimeError('Variable "totalProducts" does not exist.', 51, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
        <article class=\"produits-kpi\">
            <span>Stock cumulé</span>
            <strong>";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalStock"]) || array_key_exists("totalStock", $context) ? $context["totalStock"] : (function () { throw new RuntimeError('Variable "totalStock" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
        <article class=\"produits-kpi ";
        // line 57
        yield ((((isset($context["lowStockCount"]) || array_key_exists("lowStockCount", $context) ? $context["lowStockCount"] : (function () { throw new RuntimeError('Variable "lowStockCount" does not exist.', 57, $this->source); })()) > 0)) ? ("is-alert") : (""));
        yield "\">
            <span>Stock critique</span>
            <strong>";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["lowStockCount"]) || array_key_exists("lowStockCount", $context) ? $context["lowStockCount"] : (function () { throw new RuntimeError('Variable "lowStockCount" does not exist.', 59, $this->source); })()), "html", null, true);
        yield "</strong>
        </article>
    </section>

    <form method=\"get\" class=\"search-bar produits-search-modern\">
        <div class=\"produits-search-input\">
            <i class=\"fa-solid fa-magnifying-glass\"></i>
            <input type=\"text\" name=\"q\" value=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 66, $this->source); })()), "html", null, true);
        yield "\" placeholder=\"Rechercher un produit...\" autocomplete=\"off\">
        </div>

        <div class=\"produits-search-right\">
            <label for=\"sort\">Trier par :</label>
            <select id=\"sort\" name=\"sort\">
                <option value=\"\" ";
        // line 72
        yield ((Twig\Extension\CoreExtension::testEmpty((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 72, $this->source); })()))) ? ("selected") : (""));
        yield ">Date d'ajout</option>
                <option value=\"nom\" ";
        // line 73
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 73, $this->source); })()) == "nom")) ? ("selected") : (""));
        yield ">Nom</option>
                <option value=\"categorie\" ";
        // line 74
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 74, $this->source); })()) == "categorie")) ? ("selected") : (""));
        yield ">Catégorie</option>
                <option value=\"stock\" ";
        // line 75
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 75, $this->source); })()) == "stock")) ? ("selected") : (""));
        yield ">Stock</option>
            </select>

            <select name=\"dir\">
                <option value=\"DESC\" ";
        // line 79
        yield ((((isset($context["currentDir"]) || array_key_exists("currentDir", $context) ? $context["currentDir"] : (function () { throw new RuntimeError('Variable "currentDir" does not exist.', 79, $this->source); })()) == "DESC")) ? ("selected") : (""));
        yield ">DESC</option>
                <option value=\"ASC\" ";
        // line 80
        yield ((((isset($context["currentDir"]) || array_key_exists("currentDir", $context) ? $context["currentDir"] : (function () { throw new RuntimeError('Variable "currentDir" does not exist.', 80, $this->source); })()) == "ASC")) ? ("selected") : (""));
        yield ">ASC</option>
            </select>

            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-filter\"></i> Rechercher
            </button>

            ";
        // line 87
        if (((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 87, $this->source); })()) || (isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 87, $this->source); })()))) {
            // line 88
            yield "                <a class=\"btn\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
            yield "\">
                    <i class=\"fa-solid fa-rotate-left\"></i> Reset
                </a>
            ";
        }
        // line 92
        yield "        </div>
    </form>

    <div class=\"pack-grid produits-grid-modern\">
        ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 96, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 97
            yield "            ";
            $context["lowStock"] = ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 97)) && (CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 97) < 5));
            // line 98
            yield "            ";
            $context["watchStock"] = (( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 98)) && (CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 98) >= 5)) && (CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 98) < 15));
            // line 99
            yield "            ";
            $context["stockStateClass"] = (((($tmp = (isset($context["lowStock"]) || array_key_exists("lowStock", $context) ? $context["lowStock"] : (function () { throw new RuntimeError('Variable "lowStock" does not exist.', 99, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("is-low") : ((((($tmp = (isset($context["watchStock"]) || array_key_exists("watchStock", $context) ? $context["watchStock"] : (function () { throw new RuntimeError('Variable "watchStock" does not exist.', 99, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("is-watch") : ("is-ok"))));
            // line 100
            yield "            ";
            $context["stockStateLabel"] = (((($tmp = (isset($context["lowStock"]) || array_key_exists("lowStock", $context) ? $context["lowStock"] : (function () { throw new RuntimeError('Variable "lowStock" does not exist.', 100, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Critique") : ((((($tmp = (isset($context["watchStock"]) || array_key_exists("watchStock", $context) ? $context["watchStock"] : (function () { throw new RuntimeError('Variable "watchStock" does not exist.', 100, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("A surveiller") : ("Stable"))));
            // line 101
            yield "
            <article class=\"pack-card produits-card-modern ";
            // line 102
            yield (((($tmp = (isset($context["lowStock"]) || array_key_exists("lowStock", $context) ? $context["lowStock"] : (function () { throw new RuntimeError('Variable "lowStock" does not exist.', 102, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("low-stock") : (""));
            yield "\">
                <div class=\"produits-card-head\">
                    <div class=\"produits-item-media\">
                        <div class=\"thumb produits-thumb-modern\">
                            ";
            // line 106
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photoP", [], "any", false, false, false, 106)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 107
                yield "                                <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/produits/" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "photoP", [], "any", false, false, false, 107))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 107), "html", null, true);
                yield "\">
                            ";
            } else {
                // line 109
                yield "                                <span class=\"thumb-placeholder\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 109), 0, 1)), "html", null, true);
                yield "</span>
                            ";
            }
            // line 111
            yield "                        </div>
                        <div class=\"produits-item-text\">
                            <h3>";
            // line 113
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "nomP", [], "any", false, false, false, 113), "html", null, true);
            yield "</h3>
                            <span>#";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 114), "html", null, true);
            yield "</span>
                            <div class=\"produits-health ";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["stockStateClass"]) || array_key_exists("stockStateClass", $context) ? $context["stockStateClass"] : (function () { throw new RuntimeError('Variable "stockStateClass" does not exist.', 115, $this->source); })()), "html", null, true);
            yield "\">
                                <i class=\"fa-solid fa-wave-square\"></i> ";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["stockStateLabel"]) || array_key_exists("stockStateLabel", $context) ? $context["stockStateLabel"] : (function () { throw new RuntimeError('Variable "stockStateLabel" does not exist.', 116, $this->source); })()), "html", null, true);
            yield "
                            </div>
                        </div>
                    </div>
                    <span class=\"nexa-badge ";
            // line 120
            yield (((($tmp = (isset($context["lowStock"]) || array_key_exists("lowStock", $context) ? $context["lowStock"] : (function () { throw new RuntimeError('Variable "lowStock" does not exist.', 120, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("high") : (""));
            yield "\">";
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "categorieP", [], "any", false, false, false, 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "categorieP", [], "any", false, false, false, 120), "html", null, true)) : ("Stock"));
            yield "</span>
                </div>

                <div class=\"produits-stock-box\">
                    <span>Stock actuel</span>
                    <strong>";
            // line 125
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "quantiteStock", [], "any", false, false, false, 125), "html", null, true);
            yield " <small>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "uniteP", [], "any", false, false, false, 125), "html", null, true);
            yield "</small></strong>
                </div>

                <div class=\"produits-meta\">
                    <div class=\"nexa-meta-item produits-meta-item\">
                        <i class=\"fa-solid fa-location-dot\"></i>
                        <span>";
            // line 131
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "emplacement", [], "any", false, false, false, 131)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "emplacement", [], "any", false, false, false, 131), "html", null, true)) : ("—"));
            yield "</span>
                    </div>
                    <div class=\"nexa-meta-item produits-meta-item\">
                        <i class=\"fa-solid fa-calendar\"></i>
                        <span>Ajout: ";
            // line 135
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateAjout", [], "any", false, false, false, 135)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "dateAjout", [], "any", false, false, false, 135), "d/m/Y"), "html", null, true)) : ("—"));
            yield "</span>
                    </div>
                </div>

                <div class=\"nexa-actions-cell produits-actions-row\">
                    <a href=\"";
            // line 140
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 140)]), "html", null, true);
            yield "\" class=\"nexa-btn-icon view\" title=\"Voir\">
                        <i class=\"fa-solid fa-eye\"></i>
                    </a>
                    ";
            // line 143
            if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 144
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_edit", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 144)]), "html", null, true);
                yield "\" class=\"nexa-btn-icon edit\" title=\"Modifier\">
                        <i class=\"fa-solid fa-pen\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_delete", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 147)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer ?');\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["produit"], "idP", [], "any", false, false, false, 148))), "html", null, true);
                yield "\">
                        <button class=\"nexa-btn-icon delete\" title=\"Supprimer\" type=\"submit\">
                            <i class=\"fa-solid fa-trash\"></i>
                        </button>
                    </form>
                    ";
            }
            // line 154
            yield "                </div>
            </article>
        ";
            $context['_iterated'] = true;
        }
        // line 156
        if (!$context['_iterated']) {
            // line 157
            yield "            <div class=\"produits-empty\">Aucun produit enregistré.</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['produit'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 159
        yield "    </div>
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
        return "produit/index.html.twig";
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
        return array (  445 => 159,  438 => 157,  436 => 156,  430 => 154,  421 => 148,  417 => 147,  410 => 144,  408 => 143,  402 => 140,  394 => 135,  387 => 131,  376 => 125,  366 => 120,  359 => 116,  355 => 115,  351 => 114,  347 => 113,  343 => 111,  337 => 109,  329 => 107,  327 => 106,  320 => 102,  317 => 101,  314 => 100,  311 => 99,  308 => 98,  305 => 97,  300 => 96,  294 => 92,  286 => 88,  284 => 87,  274 => 80,  270 => 79,  263 => 75,  259 => 74,  255 => 73,  251 => 72,  242 => 66,  232 => 59,  227 => 57,  222 => 55,  215 => 51,  207 => 45,  202 => 43,  198 => 42,  193 => 41,  191 => 40,  185 => 37,  178 => 33,  170 => 27,  163 => 25,  160 => 24,  157 => 23,  154 => 22,  151 => 21,  147 => 20,  145 => 19,  143 => 18,  141 => 17,  139 => 16,  137 => 15,  135 => 14,  122 => 13,  109 => 10,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Produits - NEXA{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('css/product-index-modern.css?v=20260214b') }}\">
{% endblock %}

{% block body %}
{% set currentSort = app.request.get('sort') %}
{% set currentDir = (app.request.get('dir') ?: 'DESC')|upper %}
{% set queryParams = app.request.query.all %}
{% set totalProducts = produits|length %}
{% set totalStock = 0 %}
{% set lowStockCount = 0 %}
{% for p in produits %}
    {% set qty = p.quantiteStock ?? 0 %}
    {% set totalStock = totalStock + qty %}
    {% if qty < 5 %}
        {% set lowStockCount = lowStockCount + 1 %}
    {% endif %}
{% endfor %}

<div class=\"produits-page-modern\">
    <div class=\"page-header produits-header-modern\">
        <div>
            <div class=\"produits-kicker\">Stock manager</div>
            <h1>Produits</h1>
            <p>{{ is_granted('ROLE_ADMIN') ? 'Consultation du stock (admin)' : 'Gestion du stock et des informations produits' }}</p>
        </div>

        <div class=\"page-actions produits-actions-modern\">
            <a href=\"{{ path('app_mouvement_index') }}\" class=\"btn\">
                <i class=\"fa-solid fa-right-left\"></i> Mouvements
            </a>
            {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_produit_stats') }}\" class=\"btn\">Stats</a>
                <a href=\"{{ path('app_produit_pdf', queryParams) }}\" class=\"btn\">PDF</a>
                <a href=\"{{ path('app_produit_new') }}\" class=\"btn primary\">+ Ajouter un produit</a>
            {% endif %}
        </div>
    </div>

    <section class=\"produits-kpi-row\" aria-label=\"Indicateurs produits\">
        <article class=\"produits-kpi\">
            <span>Total produits</span>
            <strong>{{ totalProducts }}</strong>
        </article>
        <article class=\"produits-kpi\">
            <span>Stock cumulé</span>
            <strong>{{ totalStock }}</strong>
        </article>
        <article class=\"produits-kpi {{ lowStockCount > 0 ? 'is-alert' : '' }}\">
            <span>Stock critique</span>
            <strong>{{ lowStockCount }}</strong>
        </article>
    </section>

    <form method=\"get\" class=\"search-bar produits-search-modern\">
        <div class=\"produits-search-input\">
            <i class=\"fa-solid fa-magnifying-glass\"></i>
            <input type=\"text\" name=\"q\" value=\"{{ q }}\" placeholder=\"Rechercher un produit...\" autocomplete=\"off\">
        </div>

        <div class=\"produits-search-right\">
            <label for=\"sort\">Trier par :</label>
            <select id=\"sort\" name=\"sort\">
                <option value=\"\" {{ currentSort is empty ? 'selected' : '' }}>Date d'ajout</option>
                <option value=\"nom\" {{ currentSort == 'nom' ? 'selected' : '' }}>Nom</option>
                <option value=\"categorie\" {{ currentSort == 'categorie' ? 'selected' : '' }}>Catégorie</option>
                <option value=\"stock\" {{ currentSort == 'stock' ? 'selected' : '' }}>Stock</option>
            </select>

            <select name=\"dir\">
                <option value=\"DESC\" {{ currentDir == 'DESC' ? 'selected' : '' }}>DESC</option>
                <option value=\"ASC\" {{ currentDir == 'ASC' ? 'selected' : '' }}>ASC</option>
            </select>

            <button type=\"submit\" class=\"btn primary\">
                <i class=\"fa-solid fa-filter\"></i> Rechercher
            </button>

            {% if q or currentSort %}
                <a class=\"btn\" href=\"{{ path('app_produit_index') }}\">
                    <i class=\"fa-solid fa-rotate-left\"></i> Reset
                </a>
            {% endif %}
        </div>
    </form>

    <div class=\"pack-grid produits-grid-modern\">
        {% for produit in produits %}
            {% set lowStock = produit.quantiteStock is not null and produit.quantiteStock < 5 %}
            {% set watchStock = produit.quantiteStock is not null and produit.quantiteStock >= 5 and produit.quantiteStock < 15 %}
            {% set stockStateClass = lowStock ? 'is-low' : (watchStock ? 'is-watch' : 'is-ok') %}
            {% set stockStateLabel = lowStock ? 'Critique' : (watchStock ? 'A surveiller' : 'Stable') %}

            <article class=\"pack-card produits-card-modern {{ lowStock ? 'low-stock' : '' }}\">
                <div class=\"produits-card-head\">
                    <div class=\"produits-item-media\">
                        <div class=\"thumb produits-thumb-modern\">
                            {% if produit.photoP %}
                                <img src=\"{{ asset('uploads/produits/' ~ produit.photoP) }}\" alt=\"{{ produit.nomP }}\">
                            {% else %}
                                <span class=\"thumb-placeholder\">{{ produit.nomP|slice(0, 1)|upper }}</span>
                            {% endif %}
                        </div>
                        <div class=\"produits-item-text\">
                            <h3>{{ produit.nomP }}</h3>
                            <span>#{{ produit.idP }}</span>
                            <div class=\"produits-health {{ stockStateClass }}\">
                                <i class=\"fa-solid fa-wave-square\"></i> {{ stockStateLabel }}
                            </div>
                        </div>
                    </div>
                    <span class=\"nexa-badge {{ lowStock ? 'high' : '' }}\">{{ produit.categorieP ?: 'Stock' }}</span>
                </div>

                <div class=\"produits-stock-box\">
                    <span>Stock actuel</span>
                    <strong>{{ produit.quantiteStock }} <small>{{ produit.uniteP }}</small></strong>
                </div>

                <div class=\"produits-meta\">
                    <div class=\"nexa-meta-item produits-meta-item\">
                        <i class=\"fa-solid fa-location-dot\"></i>
                        <span>{{ produit.emplacement ?: '—' }}</span>
                    </div>
                    <div class=\"nexa-meta-item produits-meta-item\">
                        <i class=\"fa-solid fa-calendar\"></i>
                        <span>Ajout: {{ produit.dateAjout ? produit.dateAjout|date('d/m/Y') : '—' }}</span>
                    </div>
                </div>

                <div class=\"nexa-actions-cell produits-actions-row\">
                    <a href=\"{{ path('app_produit_show', {'id_p': produit.idP}) }}\" class=\"nexa-btn-icon view\" title=\"Voir\">
                        <i class=\"fa-solid fa-eye\"></i>
                    </a>
                    {% if not is_granted('ROLE_ADMIN') %}
                    <a href=\"{{ path('app_produit_edit', {'id_p': produit.idP}) }}\" class=\"nexa-btn-icon edit\" title=\"Modifier\">
                        <i class=\"fa-solid fa-pen\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_produit_delete', {'id_p': produit.idP}) }}\" onsubmit=\"return confirm('Supprimer ?');\" style=\"display:inline;\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ produit.idP) }}\">
                        <button class=\"nexa-btn-icon delete\" title=\"Supprimer\" type=\"submit\">
                            <i class=\"fa-solid fa-trash\"></i>
                        </button>
                    </form>
                    {% endif %}
                </div>
            </article>
        {% else %}
            <div class=\"produits-empty\">Aucun produit enregistré.</div>
        {% endfor %}
    </div>
</div>
{% endblock %}
", "produit/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\produit\\index.html.twig");
    }
}
