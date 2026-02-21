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

/* mouvement/index.html.twig */
class __TwigTemplate_31ed1040170179509a37f0c93eb6a02e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/index.html.twig"));

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

        yield "Mouvements - NEXA";
        
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
        yield "
";
        // line 7
        $context["currentSort"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "request", [], "any", false, false, false, 7), "get", ["sort"], "method", false, false, false, 7);
        // line 8
        $context["currentDir"] = Twig\Extension\CoreExtension::upper($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "request", [], "any", false, false, false, 8), "get", ["dir"], "method", false, false, false, 8)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "request", [], "any", false, false, false, 8), "get", ["dir"], "method", false, false, false, 8)) : ("DESC")));
        // line 9
        $context["queryParams"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "request", [], "any", false, false, false, 9), "query", [], "any", false, false, false, 9), "all", [], "any", false, false, false, 9);
        // line 10
        yield "
<div class=\"page-header\">
    <div>
        <h1>Historique des mouvements</h1>
        <p>
            Entrees et sorties de stock";
        // line 15
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " (admin)";
        }
        // line 16
        yield "            ";
        if ((($tmp = (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 16, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 17
            yield "                • Produit : <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 17, $this->source); })()), "nomP", [], "any", false, false, false, 17), "html", null, true);
            yield "</strong>
            ";
        }
        // line 19
        yield "        </p>
    </div>

    <div style=\"display:flex; gap:12px; align-items:center\">
        ";
        // line 23
        if ((($tmp = (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 23, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
            yield "\" class=\"btn\">
                Tous les mouvements
            </a>
        ";
        }
        // line 28
        yield "
        <div style=\"display:flex; flex-direction:column; gap:10px\">
            <a href=\"";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn\">
                <i class=\"fa-solid fa-box\"></i>
                Produits
            </a>
            ";
        // line 34
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_stats");
            yield "\" class=\"btn\">
                    Stats
                </a>
                <a href=\"";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_pdf", (isset($context["queryParams"]) || array_key_exists("queryParams", $context) ? $context["queryParams"] : (function () { throw new RuntimeError('Variable "queryParams" does not exist.', 38, $this->source); })())), "html", null, true);
            yield "\" class=\"btn\">
                    PDF
                </a>
                <a href=\"";
            // line 41
            yield (((($tmp = (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 41, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_new", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 41, $this->source); })()), "idP", [], "any", false, false, false, 41)]), "html", null, true)) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_new")));
            yield "\" class=\"btn primary\">
                    + Nouveau mouvement
                </a>
            ";
        }
        // line 45
        yield "        </div>
    </div>
</div>

<form method=\"get\" class=\"search-bar\">
    ";
        // line 50
        if ((($tmp = (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 50, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 51
            yield "        <input type=\"hidden\" name=\"id_p\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 51, $this->source); })()), "idP", [], "any", false, false, false, 51), "html", null, true);
            yield "\">
    ";
        }
        // line 53
        yield "    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un mouvement (type, motif, produit)...\" value=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 55, $this->source); })()), "html", null, true);
        yield "\">
    </div>
    <div class=\"search-select\">
        <i class=\"fa-solid fa-arrow-up-a-z\"></i>
        <select name=\"sort\">
            <option value=\"\" ";
        // line 60
        yield ((Twig\Extension\CoreExtension::testEmpty((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 60, $this->source); })()))) ? ("selected") : (""));
        yield ">Tri: Date</option>
            <option value=\"nom\" ";
        // line 61
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 61, $this->source); })()) == "nom")) ? ("selected") : (""));
        yield ">Nom produit</option>
            <option value=\"type\" ";
        // line 62
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 62, $this->source); })()) == "type")) ? ("selected") : (""));
        yield ">Type</option>
            <option value=\"quantite\" ";
        // line 63
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 63, $this->source); })()) == "quantite")) ? ("selected") : (""));
        yield ">Quantite</option>
            <option value=\"date\" ";
        // line 64
        yield ((((isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 64, $this->source); })()) == "date")) ? ("selected") : (""));
        yield ">Date</option>
        </select>
    </div>
    <div class=\"search-select\">
        <i class=\"fa-solid fa-sort\"></i>
        <select name=\"dir\">
            <option value=\"DESC\" ";
        // line 70
        yield ((((isset($context["currentDir"]) || array_key_exists("currentDir", $context) ? $context["currentDir"] : (function () { throw new RuntimeError('Variable "currentDir" does not exist.', 70, $this->source); })()) == "DESC")) ? ("selected") : (""));
        yield ">DESC</option>
            <option value=\"ASC\" ";
        // line 71
        yield ((((isset($context["currentDir"]) || array_key_exists("currentDir", $context) ? $context["currentDir"] : (function () { throw new RuntimeError('Variable "currentDir" does not exist.', 71, $this->source); })()) == "ASC")) ? ("selected") : (""));
        yield ">ASC</option>
        </select>
    </div>
    <button class=\"btn primary\" type=\"submit\">Rechercher</button>
    ";
        // line 75
        if (((isset($context["q"]) || array_key_exists("q", $context) ? $context["q"] : (function () { throw new RuntimeError('Variable "q" does not exist.', 75, $this->source); })()) || (isset($context["currentSort"]) || array_key_exists("currentSort", $context) ? $context["currentSort"] : (function () { throw new RuntimeError('Variable "currentSort" does not exist.', 75, $this->source); })()))) {
            // line 76
            yield "        ";
            if ((($tmp = (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 76, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 77
                yield "            <a class=\"btn\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produitFilter"]) || array_key_exists("produitFilter", $context) ? $context["produitFilter"] : (function () { throw new RuntimeError('Variable "produitFilter" does not exist.', 77, $this->source); })()), "idP", [], "any", false, false, false, 77)]), "html", null, true);
                yield "\">
                <i class=\"fa-solid fa-rotate-left\"></i>
                Reset
            </a>
        ";
            } else {
                // line 82
                yield "            <a class=\"btn\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
                yield "\">
                <i class=\"fa-solid fa-rotate-left\"></i>
                Reset
            </a>
        ";
            }
            // line 87
            yield "    ";
        }
        // line 88
        yield "</form>

<div class=\"pack-grid\">
    ";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["mouvements"]) || array_key_exists("mouvements", $context) ? $context["mouvements"] : (function () { throw new RuntimeError('Variable "mouvements" does not exist.', 91, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["mouvement"]) {
            // line 92
            yield "        <article class=\"pack-card\">
            <div class=\"pack-head\">
                <a class=\"item-media\" href=\"";
            // line 94
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_show", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 94)]), "html", null, true);
            yield "\">
                    <div class=\"thumb\">
                        ";
            // line 96
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 96) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 96), "photoP", [], "any", false, false, false, 96))) {
                // line 97
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/produits/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 97), "photoP", [], "any", false, false, false, 97))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 97), "nomP", [], "any", false, false, false, 97), "html", null, true);
                yield "\">
                        ";
            } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 98
$context["mouvement"], "produit", [], "any", false, false, false, 98)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 99
                yield "                            <span class=\"thumb-placeholder\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 99), "nomP", [], "any", false, false, false, 99), 0, 1)), "html", null, true);
                yield "</span>
                        ";
            } else {
                // line 101
                yield "                            <span class=\"thumb-placeholder\">-</span>
                        ";
            }
            // line 103
            yield "                    </div>
                    <div class=\"item-text\">
                        <div class=\"item-title\">";
            // line 105
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 105)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 105), "nomP", [], "any", false, false, false, 105), "html", null, true)) : ("-"));
            yield "</div>
                        <div class=\"item-sub\">#";
            // line 106
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 106), "html", null, true);
            yield "</div>
                    </div>
                </a>

                <div class=\"pack-pill ";
            // line 110
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "typeM", [], "any", false, false, false, 110) == "ENTREE")) ? ("success") : ("danger"));
            yield "\">
                    ";
            // line 111
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "typeM", [], "any", false, false, false, 111), "html", null, true);
            yield "
                </div>
            </div>

            <div class=\"pack-metric\">
                ";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "quantite", [], "any", false, false, false, 116), "html", null, true);
            yield "
                <small>Quantite</small>
            </div>

            <ul class=\"pack-list\">
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Date :</strong> ";
            // line 123
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 123)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 123), "d/m/Y"), "html", null, true)) : ("-"));
            yield "</span>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Motif :</strong> ";
            // line 127
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "motif", [], "any", false, false, false, 127)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "motif", [], "any", false, false, false, 127), "html", null, true)) : ("-"));
            yield "</span>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Categorie :</strong> ";
            // line 131
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "produit", [], "any", false, false, false, 131), "categorieP", [], "any", false, false, false, 131), "html", null, true)) : ("-"));
            yield "</span>
                </li>
            </ul>

            ";
            // line 135
            if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 136
                yield "                <div class=\"pack-actions\">
                    <form method=\"post\"
                          action=\"";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_delete", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 138)]), "html", null, true);
                yield "\"
                          onsubmit=\"return confirm('Supprimer ce mouvement ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 140
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 140))), "html", null, true);
                yield "\">
                        <button class=\"btn danger\" type=\"submit\">
                            <i class=\"fa-regular fa-trash-can\"></i>
                            Supprimer
                        </button>
                    </form>
                    <a href=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_edit", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 146)]), "html", null, true);
                yield "\" class=\"btn primary\">
                        <i class=\"fa-regular fa-pen-to-square\"></i>
                        Modifier
                    </a>
                </div>
            ";
            }
            // line 152
            yield "        </article>
    ";
            $context['_iterated'] = true;
        }
        // line 153
        if (!$context['_iterated']) {
            // line 154
            yield "        <div class=\"warning\">Aucun mouvement trouve</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mouvement'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 156
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
        return "mouvement/index.html.twig";
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
        return array (  408 => 156,  401 => 154,  399 => 153,  394 => 152,  385 => 146,  376 => 140,  371 => 138,  367 => 136,  365 => 135,  358 => 131,  351 => 127,  344 => 123,  334 => 116,  326 => 111,  322 => 110,  315 => 106,  311 => 105,  307 => 103,  303 => 101,  297 => 99,  295 => 98,  288 => 97,  286 => 96,  281 => 94,  277 => 92,  272 => 91,  267 => 88,  264 => 87,  255 => 82,  246 => 77,  243 => 76,  241 => 75,  234 => 71,  230 => 70,  221 => 64,  217 => 63,  213 => 62,  209 => 61,  205 => 60,  197 => 55,  193 => 53,  187 => 51,  185 => 50,  178 => 45,  171 => 41,  165 => 38,  158 => 35,  156 => 34,  149 => 30,  145 => 28,  137 => 24,  135 => 23,  129 => 19,  123 => 17,  120 => 16,  116 => 15,  109 => 10,  107 => 9,  105 => 8,  103 => 7,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}Mouvements - NEXA{% endblock %}

{% block body %}

{% set currentSort = app.request.get('sort') %}
{% set currentDir = (app.request.get('dir') ?: 'DESC')|upper %}
{% set queryParams = app.request.query.all %}

<div class=\"page-header\">
    <div>
        <h1>Historique des mouvements</h1>
        <p>
            Entrees et sorties de stock{% if is_granted('ROLE_ADMIN') %} (admin){% endif %}
            {% if produitFilter %}
                • Produit : <strong>{{ produitFilter.nomP }}</strong>
            {% endif %}
        </p>
    </div>

    <div style=\"display:flex; gap:12px; align-items:center\">
        {% if produitFilter %}
            <a href=\"{{ path('app_mouvement_index') }}\" class=\"btn\">
                Tous les mouvements
            </a>
        {% endif %}

        <div style=\"display:flex; flex-direction:column; gap:10px\">
            <a href=\"{{ path('app_produit_index') }}\" class=\"btn\">
                <i class=\"fa-solid fa-box\"></i>
                Produits
            </a>
            {% if not is_granted('ROLE_ADMIN') %}
                <a href=\"{{ path('app_mouvement_stats') }}\" class=\"btn\">
                    Stats
                </a>
                <a href=\"{{ path('app_mouvement_pdf', queryParams) }}\" class=\"btn\">
                    PDF
                </a>
                <a href=\"{{ produitFilter ? path('app_mouvement_new', {'id_p': produitFilter.idP}) : path('app_mouvement_new') }}\" class=\"btn primary\">
                    + Nouveau mouvement
                </a>
            {% endif %}
        </div>
    </div>
</div>

<form method=\"get\" class=\"search-bar\">
    {% if produitFilter %}
        <input type=\"hidden\" name=\"id_p\" value=\"{{ produitFilter.idP }}\">
    {% endif %}
    <div class=\"search-input\">
        <i class=\"fa-solid fa-magnifying-glass\"></i>
        <input type=\"text\" name=\"q\" placeholder=\"Rechercher un mouvement (type, motif, produit)...\" value=\"{{ q }}\">
    </div>
    <div class=\"search-select\">
        <i class=\"fa-solid fa-arrow-up-a-z\"></i>
        <select name=\"sort\">
            <option value=\"\" {{ currentSort is empty ? 'selected' : '' }}>Tri: Date</option>
            <option value=\"nom\" {{ currentSort == 'nom' ? 'selected' : '' }}>Nom produit</option>
            <option value=\"type\" {{ currentSort == 'type' ? 'selected' : '' }}>Type</option>
            <option value=\"quantite\" {{ currentSort == 'quantite' ? 'selected' : '' }}>Quantite</option>
            <option value=\"date\" {{ currentSort == 'date' ? 'selected' : '' }}>Date</option>
        </select>
    </div>
    <div class=\"search-select\">
        <i class=\"fa-solid fa-sort\"></i>
        <select name=\"dir\">
            <option value=\"DESC\" {{ currentDir == 'DESC' ? 'selected' : '' }}>DESC</option>
            <option value=\"ASC\" {{ currentDir == 'ASC' ? 'selected' : '' }}>ASC</option>
        </select>
    </div>
    <button class=\"btn primary\" type=\"submit\">Rechercher</button>
    {% if q or currentSort %}
        {% if produitFilter %}
            <a class=\"btn\" href=\"{{ path('app_mouvement_index', {'id_p': produitFilter.idP}) }}\">
                <i class=\"fa-solid fa-rotate-left\"></i>
                Reset
            </a>
        {% else %}
            <a class=\"btn\" href=\"{{ path('app_mouvement_index') }}\">
                <i class=\"fa-solid fa-rotate-left\"></i>
                Reset
            </a>
        {% endif %}
    {% endif %}
</form>

<div class=\"pack-grid\">
    {% for mouvement in mouvements %}
        <article class=\"pack-card\">
            <div class=\"pack-head\">
                <a class=\"item-media\" href=\"{{ path('app_mouvement_show', {'id_mo': mouvement.idMo}) }}\">
                    <div class=\"thumb\">
                        {% if mouvement.produit and mouvement.produit.photoP %}
                            <img src=\"{{ asset('uploads/produits/' ~ mouvement.produit.photoP) }}\" alt=\"{{ mouvement.produit.nomP }}\">
                        {% elseif mouvement.produit %}
                            <span class=\"thumb-placeholder\">{{ mouvement.produit.nomP|slice(0, 1)|upper }}</span>
                        {% else %}
                            <span class=\"thumb-placeholder\">-</span>
                        {% endif %}
                    </div>
                    <div class=\"item-text\">
                        <div class=\"item-title\">{{ mouvement.produit ? mouvement.produit.nomP : '-' }}</div>
                        <div class=\"item-sub\">#{{ mouvement.idMo }}</div>
                    </div>
                </a>

                <div class=\"pack-pill {{ mouvement.typeM == 'ENTREE' ? 'success' : 'danger' }}\">
                    {{ mouvement.typeM }}
                </div>
            </div>

            <div class=\"pack-metric\">
                {{ mouvement.quantite }}
                <small>Quantite</small>
            </div>

            <ul class=\"pack-list\">
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Date :</strong> {{ mouvement.dateMouvement ? mouvement.dateMouvement|date('d/m/Y') : '-' }}</span>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Motif :</strong> {{ mouvement.motif ?: '-' }}</span>
                </li>
                <li>
                    <i class=\"fa-solid fa-circle-check\"></i>
                    <span><strong>Categorie :</strong> {{ mouvement.produit ? mouvement.produit.categorieP : '-' }}</span>
                </li>
            </ul>

            {% if not is_granted('ROLE_ADMIN') %}
                <div class=\"pack-actions\">
                    <form method=\"post\"
                          action=\"{{ path('app_mouvement_delete', {'id_mo': mouvement.idMo}) }}\"
                          onsubmit=\"return confirm('Supprimer ce mouvement ?');\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ mouvement.idMo) }}\">
                        <button class=\"btn danger\" type=\"submit\">
                            <i class=\"fa-regular fa-trash-can\"></i>
                            Supprimer
                        </button>
                    </form>
                    <a href=\"{{ path('app_mouvement_edit', {'id_mo': mouvement.idMo}) }}\" class=\"btn primary\">
                        <i class=\"fa-regular fa-pen-to-square\"></i>
                        Modifier
                    </a>
                </div>
            {% endif %}
        </article>
    {% else %}
        <div class=\"warning\">Aucun mouvement trouve</div>
    {% endfor %}
</div>

{% endblock %}
", "mouvement/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\mouvement\\index.html.twig");
    }
}
