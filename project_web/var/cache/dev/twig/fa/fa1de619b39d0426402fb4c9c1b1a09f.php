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

/* produit/show.html.twig */
class __TwigTemplate_124a2dce5404d3521313a9e174bd5cec extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/show.html.twig"));

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

        yield "Produit — ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 3, $this->source); })()), "nomP", [], "any", false, false, false, 3), "html", null, true);
        
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
<!-- ================= HEADER ================= -->
<div class=\"page-header\">
    <div>
        <h1>Détails du produit</h1>
        <p>Informations complètes du produit sélectionné</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        <a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\" class=\"btn\">
            ← Retour
        </a>

        <a href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_new", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 19, $this->source); })()), "idP", [], "any", false, false, false, 19)]), "html", null, true);
        yield "\" class=\"btn\">
            <i class=\"fa-solid fa-right-left\"></i>
            Nouveau mouvement
        </a>

        <a href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_edit", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 24, $this->source); })()), "idP", [], "any", false, false, false, 24)]), "html", null, true);
        yield "\" class=\"btn primary\">
            Modifier
        </a>
    </div>
</div>

<!-- ================= CONTENT ================= -->
<div class=\"form-shell\">
    <div class=\"form-card\">

        <!-- ===== TITRE PRODUIT ===== -->
        <div style=\"margin-bottom:24px; display:flex; gap:16px; align-items:center\">
            <div class=\"thumb\" style=\"width:76px; height:76px\">
                ";
        // line 37
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 37, $this->source); })()), "photoP", [], "any", false, false, false, 37)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/produits/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 38, $this->source); })()), "photoP", [], "any", false, false, false, 38))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 38, $this->source); })()), "nomP", [], "any", false, false, false, 38), "html", null, true);
            yield "\">
                ";
        } else {
            // line 40
            yield "                    <span class=\"thumb-placeholder\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 40, $this->source); })()), "nomP", [], "any", false, false, false, 40), 0, 1)), "html", null, true);
            yield "</span>
                ";
        }
        // line 42
        yield "            </div>

            <div>
                <h2 style=\"margin:0\">";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 45, $this->source); })()), "nomP", [], "any", false, false, false, 45), "html", null, true);
        yield "</h2>
                <p style=\"color:#777;margin-top:6px\">
                    Catégorie : <strong>";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 47, $this->source); })()), "categorieP", [], "any", false, false, false, 47), "html", null, true);
        yield "</strong>
                </p>
            </div>
        </div>

        <!-- ===== INFOS ===== -->
        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité</span>
                    <span class=\"info-value\">";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 59, $this->source); })()), "quantiteStock", [], "any", false, false, false, 59), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Unité</span>
                    <span class=\"info-value\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 64, $this->source); })()), "uniteP", [], "any", false, false, false, 64), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date d’ajout</span>
                    <span class=\"info-value\">
                        ";
        // line 70
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 70, $this->source); })()), "dateAjout", [], "any", false, false, false, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 70, $this->source); })()), "dateAjout", [], "any", false, false, false, 70), "d/m/Y"), "html", null, true)) : ("—"));
        yield "
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date d’expiration</span>
                    <span class=\"info-value\">
                        ";
        // line 77
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 77, $this->source); })()), "dateExpiration", [], "any", false, false, false, 77)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 77, $this->source); })()), "dateExpiration", [], "any", false, false, false, 77), "d/m/Y"), "html", null, true)) : ("—"));
        yield "
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Emplacement</span>
                    <span class=\"info-value\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 83, $this->source); })()), "emplacement", [], "any", false, false, false, 83), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">ID Produit</span>
                    <span class=\"info-value\">#";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 88, $this->source); })()), "idP", [], "any", false, false, false, 88), "html", null, true);
        yield "</span>
                </div>
            </div>
        </div>

        <div class=\"form-section\">
            <div style=\"display:flex; align-items:center; justify-content:space-between; gap:12px\">
                <h3 style=\"margin:0\">Mouvements récents</h3>
                <a href=\"";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 96, $this->source); })()), "idP", [], "any", false, false, false, 96)]), "html", null, true);
        yield "\" class=\"btn\">
                    Voir tout
                </a>
            </div>

            <div class=\"pack-grid\" style=\"margin-top:16px\">
                ";
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["mouvements"]) || array_key_exists("mouvements", $context) ? $context["mouvements"] : (function () { throw new RuntimeError('Variable "mouvements" does not exist.', 102, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["mouvement"]) {
            // line 103
            yield "                    <article class=\"pack-card\">
                        <div class=\"pack-head\">
                            <a class=\"item-media\" href=\"";
            // line 105
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_show", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 105)]), "html", null, true);
            yield "\">
                                <div class=\"item-text\">
                                    <div class=\"item-title\">Mouvement #";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 107), "html", null, true);
            yield "</div>
                                    <div class=\"item-sub\">
                                        ";
            // line 109
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "dateMouvement", [], "any", false, false, false, 109), "d/m/Y"), "html", null, true)) : ("—"));
            yield "
                                    </div>
                                </div>
                            </a>

                            <div class=\"pack-pill ";
            // line 114
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "typeM", [], "any", false, false, false, 114) == "ENTREE")) ? ("success") : ("danger"));
            yield "\">
                                ";
            // line 115
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "typeM", [], "any", false, false, false, 115), "html", null, true);
            yield "
                            </div>
                        </div>

                        <div class=\"pack-metric\">
                            ";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "quantite", [], "any", false, false, false, 120), "html", null, true);
            yield "
                            <small>Quantité</small>
                        </div>

                        <ul class=\"pack-list\">
                            <li>
                                <i class=\"fa-solid fa-circle-check\"></i>
                                <span><strong>Motif :</strong> ";
            // line 127
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "motif", [], "any", false, false, false, 127)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "motif", [], "any", false, false, false, 127), "html", null, true)) : ("—"));
            yield "</span>
                            </li>
                        </ul>

                        <div class=\"pack-actions\">
                            <a href=\"";
            // line 132
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_edit", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, $context["mouvement"], "idMo", [], "any", false, false, false, 132)]), "html", null, true);
            yield "\" class=\"btn primary\">
                                <i class=\"fa-regular fa-pen-to-square\"></i>
                                Modifier
                            </a>
                        </div>
                    </article>
                ";
            $context['_iterated'] = true;
        }
        // line 138
        if (!$context['_iterated']) {
            // line 139
            yield "                    <div class=\"warning\">Aucun mouvement pour ce produit</div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mouvement'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        yield "            </div>
        </div>

        <!-- ===== ACTION DELETE ===== -->
        <div class=\"form-actions\" style=\"justify-content:flex-start\">
            ";
        // line 146
        yield Twig\Extension\CoreExtension::include($this->env, $context, "produit/_delete_form.html.twig");
        yield "
        </div>

    </div>
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
        return "produit/show.html.twig";
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
        return array (  332 => 146,  325 => 141,  318 => 139,  316 => 138,  305 => 132,  297 => 127,  287 => 120,  279 => 115,  275 => 114,  267 => 109,  262 => 107,  257 => 105,  253 => 103,  248 => 102,  239 => 96,  228 => 88,  220 => 83,  211 => 77,  201 => 70,  192 => 64,  184 => 59,  169 => 47,  164 => 45,  159 => 42,  153 => 40,  145 => 38,  143 => 37,  127 => 24,  119 => 19,  112 => 15,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Produit — {{ produit.nomP }}{% endblock %}

{% block body %}

<!-- ================= HEADER ================= -->
<div class=\"page-header\">
    <div>
        <h1>Détails du produit</h1>
        <p>Informations complètes du produit sélectionné</p>
    </div>

    <div style=\"display:flex; gap:12px\">
        <a href=\"{{ path('app_produit_index') }}\" class=\"btn\">
            ← Retour
        </a>

        <a href=\"{{ path('app_mouvement_new', {'id_p': produit.idP}) }}\" class=\"btn\">
            <i class=\"fa-solid fa-right-left\"></i>
            Nouveau mouvement
        </a>

        <a href=\"{{ path('app_produit_edit', {'id_p': produit.idP}) }}\" class=\"btn primary\">
            Modifier
        </a>
    </div>
</div>

<!-- ================= CONTENT ================= -->
<div class=\"form-shell\">
    <div class=\"form-card\">

        <!-- ===== TITRE PRODUIT ===== -->
        <div style=\"margin-bottom:24px; display:flex; gap:16px; align-items:center\">
            <div class=\"thumb\" style=\"width:76px; height:76px\">
                {% if produit.photoP %}
                    <img src=\"{{ asset('uploads/produits/' ~ produit.photoP) }}\" alt=\"{{ produit.nomP }}\">
                {% else %}
                    <span class=\"thumb-placeholder\">{{ produit.nomP|slice(0, 1)|upper }}</span>
                {% endif %}
            </div>

            <div>
                <h2 style=\"margin:0\">{{ produit.nomP }}</h2>
                <p style=\"color:#777;margin-top:6px\">
                    Catégorie : <strong>{{ produit.categorieP }}</strong>
                </p>
            </div>
        </div>

        <!-- ===== INFOS ===== -->
        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité</span>
                    <span class=\"info-value\">{{ produit.quantiteStock }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Unité</span>
                    <span class=\"info-value\">{{ produit.uniteP }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date d’ajout</span>
                    <span class=\"info-value\">
                        {{ produit.dateAjout ? produit.dateAjout|date('d/m/Y') : '—' }}
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date d’expiration</span>
                    <span class=\"info-value\">
                        {{ produit.dateExpiration ? produit.dateExpiration|date('d/m/Y') : '—' }}
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Emplacement</span>
                    <span class=\"info-value\">{{ produit.emplacement }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">ID Produit</span>
                    <span class=\"info-value\">#{{ produit.idP }}</span>
                </div>
            </div>
        </div>

        <div class=\"form-section\">
            <div style=\"display:flex; align-items:center; justify-content:space-between; gap:12px\">
                <h3 style=\"margin:0\">Mouvements récents</h3>
                <a href=\"{{ path('app_mouvement_index', {'id_p': produit.idP}) }}\" class=\"btn\">
                    Voir tout
                </a>
            </div>

            <div class=\"pack-grid\" style=\"margin-top:16px\">
                {% for mouvement in mouvements %}
                    <article class=\"pack-card\">
                        <div class=\"pack-head\">
                            <a class=\"item-media\" href=\"{{ path('app_mouvement_show', {'id_mo': mouvement.idMo}) }}\">
                                <div class=\"item-text\">
                                    <div class=\"item-title\">Mouvement #{{ mouvement.idMo }}</div>
                                    <div class=\"item-sub\">
                                        {{ mouvement.dateMouvement ? mouvement.dateMouvement|date('d/m/Y') : '—' }}
                                    </div>
                                </div>
                            </a>

                            <div class=\"pack-pill {{ mouvement.typeM == 'ENTREE' ? 'success' : 'danger' }}\">
                                {{ mouvement.typeM }}
                            </div>
                        </div>

                        <div class=\"pack-metric\">
                            {{ mouvement.quantite }}
                            <small>Quantité</small>
                        </div>

                        <ul class=\"pack-list\">
                            <li>
                                <i class=\"fa-solid fa-circle-check\"></i>
                                <span><strong>Motif :</strong> {{ mouvement.motif ?: '—' }}</span>
                            </li>
                        </ul>

                        <div class=\"pack-actions\">
                            <a href=\"{{ path('app_mouvement_edit', {'id_mo': mouvement.idMo}) }}\" class=\"btn primary\">
                                <i class=\"fa-regular fa-pen-to-square\"></i>
                                Modifier
                            </a>
                        </div>
                    </article>
                {% else %}
                    <div class=\"warning\">Aucun mouvement pour ce produit</div>
                {% endfor %}
            </div>
        </div>

        <!-- ===== ACTION DELETE ===== -->
        <div class=\"form-actions\" style=\"justify-content:flex-start\">
            {{ include('produit/_delete_form.html.twig') }}
        </div>

    </div>
</div>

{% endblock %}

", "produit/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\produit\\show.html.twig");
    }
}
