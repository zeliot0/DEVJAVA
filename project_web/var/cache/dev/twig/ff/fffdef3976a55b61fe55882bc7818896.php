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

/* mouvement/show.html.twig */
class __TwigTemplate_364fc63dc2aeb9e6a3ae925e4a0a4c6f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "mouvement/show.html.twig"));

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

        yield "Mouvement #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 3, $this->source); })()), "idMo", [], "any", false, false, false, 3), "html", null, true);
        
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
<div class=\"page-header\">
    <div>
        <h1>Détails du mouvement</h1>
        <p>Informations complètes</p>
    </div>

    <div style=\"display:flex;gap:12px\">
        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_index");
        yield "\" class=\"btn\">← Retour</a>

        ";
        // line 16
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 16, $this->source); })()), "produit", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 17
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_show", ["id_p" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 17, $this->source); })()), "produit", [], "any", false, false, false, 17), "idP", [], "any", false, false, false, 17)]), "html", null, true);
            yield "\" class=\"btn\">
                <i class=\"fa-solid fa-box\"></i>
                Voir produit
            </a>
        ";
        }
        // line 22
        yield "
        <a href=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_mouvement_edit", ["id_mo" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 23, $this->source); })()), "idMo", [], "any", false, false, false, 23)]), "html", null, true);
        yield "\" class=\"btn primary\">
            Modifier
        </a>
    </div>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        ";
        // line 32
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 32, $this->source); })()), "produit", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 33
            yield "            <div class=\"form-section\">
                <h3>Produit</h3>

                <div style=\"display:flex; gap:16px; align-items:center; margin-bottom:18px\">
                    <div class=\"thumb\" style=\"width:60px; height:60px\">
                        ";
            // line 38
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 38, $this->source); })()), "produit", [], "any", false, false, false, 38), "photoP", [], "any", false, false, false, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 39
                yield "                            <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/produits/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 39, $this->source); })()), "produit", [], "any", false, false, false, 39), "photoP", [], "any", false, false, false, 39))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 39, $this->source); })()), "produit", [], "any", false, false, false, 39), "nomP", [], "any", false, false, false, 39), "html", null, true);
                yield "\">
                        ";
            } else {
                // line 41
                yield "                            <span class=\"thumb-placeholder\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 41, $this->source); })()), "produit", [], "any", false, false, false, 41), "nomP", [], "any", false, false, false, 41), 0, 1)), "html", null, true);
                yield "</span>
                        ";
            }
            // line 43
            yield "                    </div>

                    <div>
                        <div style=\"font-weight:900; font-size:1.05rem\">";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 46, $this->source); })()), "produit", [], "any", false, false, false, 46), "nomP", [], "any", false, false, false, 46), "html", null, true);
            yield "</div>
                        <div style=\"color: var(--muted); font-weight:700\">
                            #";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 48, $this->source); })()), "produit", [], "any", false, false, false, 48), "idP", [], "any", false, false, false, 48), "html", null, true);
            yield " • ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 48, $this->source); })()), "produit", [], "any", false, false, false, 48), "categorieP", [], "any", false, false, false, 48), "html", null, true);
            yield "
                        </div>
                    </div>
                </div>

                <div class=\"form-grid-2\">
                    <div class=\"info-box\">
                        <span class=\"info-label\">Stock actuel</span>
                        <span class=\"info-value\">";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 56, $this->source); })()), "produit", [], "any", false, false, false, 56), "quantiteStock", [], "any", false, false, false, 56), "html", null, true);
            yield "</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Unité</span>
                        <span class=\"info-value\">";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 61, $this->source); })()), "produit", [], "any", false, false, false, 61), "uniteP", [], "any", false, false, false, 61), "html", null, true);
            yield "</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Emplacement</span>
                        <span class=\"info-value\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 66, $this->source); })()), "produit", [], "any", false, false, false, 66), "emplacement", [], "any", false, false, false, 66), "html", null, true);
            yield "</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Date d’ajout</span>
                        <span class=\"info-value\">
                            ";
            // line 72
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 72, $this->source); })()), "produit", [], "any", false, false, false, 72), "dateAjout", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 72, $this->source); })()), "produit", [], "any", false, false, false, 72), "dateAjout", [], "any", false, false, false, 72), "d/m/Y"), "html", null, true)) : ("—"));
            yield "
                        </span>
                    </div>
                </div>
            </div>
        ";
        }
        // line 78
        yield "
        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Type</span>
                    <span class=\"info-value\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 85, $this->source); })()), "typeM", [], "any", false, false, false, 85), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité</span>
                    <span class=\"info-value\">";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 90, $this->source); })()), "quantite", [], "any", false, false, false, 90), "html", null, true);
        yield "</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date</span>
                    <span class=\"info-value\">
                        ";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 96, $this->source); })()), "dateMouvement", [], "any", false, false, false, 96), "d/m/Y"), "html", null, true);
        yield "
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Motif</span>
                    <span class=\"info-value\">";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mouvement"]) || array_key_exists("mouvement", $context) ? $context["mouvement"] : (function () { throw new RuntimeError('Variable "mouvement" does not exist.', 102, $this->source); })()), "motif", [], "any", false, false, false, 102), "html", null, true);
        yield "</span>
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            ";
        // line 108
        yield Twig\Extension\CoreExtension::include($this->env, $context, "mouvement/_delete_form.html.twig");
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
        return "mouvement/show.html.twig";
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
        return array (  268 => 108,  259 => 102,  250 => 96,  241 => 90,  233 => 85,  224 => 78,  215 => 72,  206 => 66,  198 => 61,  190 => 56,  177 => 48,  172 => 46,  167 => 43,  161 => 41,  153 => 39,  151 => 38,  144 => 33,  142 => 32,  130 => 23,  127 => 22,  118 => 17,  116 => 16,  111 => 14,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'theme/base.html.twig' %}

{% block title %}Mouvement #{{ mouvement.idMo }}{% endblock %}

{% block body %}

<div class=\"page-header\">
    <div>
        <h1>Détails du mouvement</h1>
        <p>Informations complètes</p>
    </div>

    <div style=\"display:flex;gap:12px\">
        <a href=\"{{ path('app_mouvement_index') }}\" class=\"btn\">← Retour</a>

        {% if mouvement.produit %}
            <a href=\"{{ path('app_produit_show', {'id_p': mouvement.produit.idP}) }}\" class=\"btn\">
                <i class=\"fa-solid fa-box\"></i>
                Voir produit
            </a>
        {% endif %}

        <a href=\"{{ path('app_mouvement_edit', {'id_mo': mouvement.idMo}) }}\" class=\"btn primary\">
            Modifier
        </a>
    </div>
</div>

<div class=\"form-shell\">
    <div class=\"form-card\">

        {% if mouvement.produit %}
            <div class=\"form-section\">
                <h3>Produit</h3>

                <div style=\"display:flex; gap:16px; align-items:center; margin-bottom:18px\">
                    <div class=\"thumb\" style=\"width:60px; height:60px\">
                        {% if mouvement.produit.photoP %}
                            <img src=\"{{ asset('uploads/produits/' ~ mouvement.produit.photoP) }}\" alt=\"{{ mouvement.produit.nomP }}\">
                        {% else %}
                            <span class=\"thumb-placeholder\">{{ mouvement.produit.nomP|slice(0, 1)|upper }}</span>
                        {% endif %}
                    </div>

                    <div>
                        <div style=\"font-weight:900; font-size:1.05rem\">{{ mouvement.produit.nomP }}</div>
                        <div style=\"color: var(--muted); font-weight:700\">
                            #{{ mouvement.produit.idP }} • {{ mouvement.produit.categorieP }}
                        </div>
                    </div>
                </div>

                <div class=\"form-grid-2\">
                    <div class=\"info-box\">
                        <span class=\"info-label\">Stock actuel</span>
                        <span class=\"info-value\">{{ mouvement.produit.quantiteStock }}</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Unité</span>
                        <span class=\"info-value\">{{ mouvement.produit.uniteP }}</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Emplacement</span>
                        <span class=\"info-value\">{{ mouvement.produit.emplacement }}</span>
                    </div>

                    <div class=\"info-box\">
                        <span class=\"info-label\">Date d’ajout</span>
                        <span class=\"info-value\">
                            {{ mouvement.produit.dateAjout ? mouvement.produit.dateAjout|date('d/m/Y') : '—' }}
                        </span>
                    </div>
                </div>
            </div>
        {% endif %}

        <div class=\"form-section\">
            <h3>Informations générales</h3>

            <div class=\"form-grid-2\">
                <div class=\"info-box\">
                    <span class=\"info-label\">Type</span>
                    <span class=\"info-value\">{{ mouvement.typeM }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Quantité</span>
                    <span class=\"info-value\">{{ mouvement.quantite }}</span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Date</span>
                    <span class=\"info-value\">
                        {{ mouvement.dateMouvement|date('d/m/Y') }}
                    </span>
                </div>

                <div class=\"info-box\">
                    <span class=\"info-label\">Motif</span>
                    <span class=\"info-value\">{{ mouvement.motif }}</span>
                </div>
            </div>
        </div>

        <div class=\"form-actions\">
            {{ include('mouvement/_delete_form.html.twig') }}
        </div>

    </div>
</div>

{% endblock %}

", "mouvement/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\mouvement\\show.html.twig");
    }
}
