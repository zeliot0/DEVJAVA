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

/* admin/users.html.twig */
class __TwigTemplate_40f0379ff9a72e067de6c30be44fc691 extends Template
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
            'admin_page_title' => [$this, 'block_admin_page_title'],
            'admin_page_hint' => [$this, 'block_admin_page_hint'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_page_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_page_title"));

        yield "Gestion Utilisateurs";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_page_hint(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_page_hint"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_page_hint"));

        yield "Membres et hierarchie du systeme NEXA";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<style>
    .users-toolbar {
        display: grid;
        grid-template-columns: minmax(280px, 1fr) minmax(220px, 280px) auto;
        gap: 12px;
        align-items: center;
        margin: 0 0 18px;
    }

    .users-search,
    .users-sort {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
        border-radius: 14px;
        border: 1px solid var(--border);
        background: rgba(var(--surface-rgb), 0.55);
        padding: 0 14px;
    }

    .users-search i,
    .users-sort i { color: var(--accent); opacity: 0.95; }

    .users-search input,
    .users-sort select {
        width: 100%;
        border: 0;
        outline: none;
        background: transparent;
        color: var(--text);
        font-size: 0.95rem;
        font-weight: 700;
    }

    .users-search input::placeholder { color: var(--muted); }

    .users-sort select { cursor: pointer; }

    .users-search:focus-within,
    .users-sort:focus-within {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(159, 122, 234, 0.16);
    }

    .users-reset {
        justify-content: center;
        min-height: 46px;
    }

    .adm-table th,
    .adm-table td {
        padding: 12px 18px !important;
    }

    .adm-table .td-user { border-radius: 18px 0 0 18px; }
    .adm-table .td-action { border-radius: 0 18px 18px 0; text-align: right; }
    .adm-table .td-id { color: var(--muted); font-family: monospace; }
    .user-line { display: flex; align-items: center; gap: 14px; }
    .user-mail { font-weight: 850; font-size: 0.95rem; }
    .role-list { display: flex; gap: 8px; flex-wrap: wrap; }
    .users-result-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: rgba(var(--surface-rgb), 0.5);
        font-size: 0.83rem;
        font-weight: 800;
        color: var(--muted);
    }

    @media (max-width: 980px) {
        .users-toolbar {
            grid-template-columns: 1fr;
        }

        .users-reset {
            width: 100%;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 94
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 95
        yield "    <div class=\"panel\">
        <div class=\"panel-title\"><i class=\"fa-solid fa-users-gear\" style=\"color: var(--primary);\"></i> Annuaire des Comptes</div>
        <form method=\"get\" action=\"";
        // line 97
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "request", [], "any", false, false, false, 97), "get", ["_route"], "method", false, false, false, 97));
        yield "\" class=\"users-toolbar\">
            <div class=\"users-search\">
                <i class=\"fa-solid fa-magnifying-glass\"></i>
                <input type=\"text\" name=\"q\" value=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 100, $this->source); })()), "")) : ("")), "html", null, true);
        yield "\" placeholder=\"Rechercher par nom ou email...\">
            </div>
            <div class=\"users-sort\">
                <i class=\"fa-solid fa-arrow-down-wide-short\"></i>
                <select name=\"sort\">
                    <option value=\"newest\" ";
        // line 105
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 105, $this->source); })()), "newest")) : ("newest")) == "newest")) ? ("selected") : (""));
        yield ">🆕 Plus récents</option>
                    <option value=\"admin_first\" ";
        // line 106
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 106, $this->source); })()), "newest")) : ("newest")) == "admin_first")) ? ("selected") : (""));
        yield ">🛡️ Admin d'abord</option>
                    <option value=\"name_asc\" ";
        // line 107
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 107, $this->source); })()), "newest")) : ("newest")) == "name_asc")) ? ("selected") : (""));
        yield ">👤 Nom (A-Z)</option>
                    <option value=\"email_asc\" ";
        // line 108
        yield (((((array_key_exists("sort", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 108, $this->source); })()), "newest")) : ("newest")) == "email_asc")) ? ("selected") : (""));
        yield ">✉️ Email (A-Z)</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn-adm active users-reset\">
                <i class=\"fa-solid fa-filter\"></i> Appliquer
            </button>
        </form>
        ";
        // line 115
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 115, $this->source); })()), "")) : ("")))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 116
            yield "            <div class=\"users-result-chip\">
                <i class=\"fa-solid fa-filter\"></i>
                Resultat pour \"";
            // line 118
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 118, $this->source); })()), "html", null, true);
            yield "\" (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 118, $this->source); })())), "html", null, true);
            yield ")
            </div>
        ";
        }
        // line 121
        yield "        <div class=\"table-wrap\">
            <table class=\"adm-table\" style=\"width: 100%;\">
                <thead>
                    <tr style=\"text-align: left; color: var(--muted); font-size: 0.8rem; text-transform: uppercase;\">
                        <th>Utilisateur</th>
                        <th>Identifiant</th>
                        <th>Permissions</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 132
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 132, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 133
            yield "                        <tr>
                            <td class=\"td-user\">
                                <div class=\"user-line\">
                                    <div class=\"brand-badge\" style=\"width: 38px; height: 38px; font-size: 0.9rem; background: rgba(var(--surface-rgb), 0.1); color: var(--primary); border: 1px solid var(--border); box-shadow: none;\">
                                        <i class=\"fa-solid fa-user\"></i>
                                    </div>
                                    <div class=\"user-mail\">";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 139), "html", null, true);
            yield "</div>
                                </div>
                            </td>
                            <td class=\"td-id\">#USR-";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 142), "html", null, true);
            yield "</td>
                            <td>
                                <div class=\"role-list\">
                                    ";
            // line 145
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "roles", [], "any", false, false, false, 145));
            foreach ($context['_seq'] as $context["_key"] => $context["role"]) {
                // line 146
                yield "                                        <span class=\"badge\" style=\"background: rgba(var(--surface-rgb), 0.2); color: var(--primary); border: 1px solid var(--border); font-size: 0.65rem;\">
                                            ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace($context["role"], ["ROLE_" => ""]), "html", null, true);
                yield "
                                        </span>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['role'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            yield "                                </div>
                            </td>
                            <td class=\"td-action\">
                                <a href=\"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_user_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["u"], "id", [], "any", false, false, false, 153)]), "html", null, true);
            yield "\" class=\"btn-adm\">
                                    <i class=\"fa-solid fa-eye\"></i> Voir
                                </a>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 158
        if (!$context['_iterated']) {
            // line 159
            yield "                        <tr>
                            <td colspan=\"4\" style=\"text-align: center; color: var(--muted); padding: 40px;\">Aucun membre enregistre.</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 163
        yield "                </tbody>
            </table>
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
        return "admin/users.html.twig";
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
        return array (  368 => 163,  359 => 159,  357 => 158,  347 => 153,  342 => 150,  333 => 147,  330 => 146,  326 => 145,  320 => 142,  314 => 139,  306 => 133,  301 => 132,  288 => 121,  280 => 118,  276 => 116,  274 => 115,  264 => 108,  260 => 107,  256 => 106,  252 => 105,  244 => 100,  238 => 97,  234 => 95,  221 => 94,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block admin_page_title %}Gestion Utilisateurs{% endblock %}
{% block admin_page_hint %}Membres et hierarchie du systeme NEXA{% endblock %}

{% block stylesheets %}
<style>
    .users-toolbar {
        display: grid;
        grid-template-columns: minmax(280px, 1fr) minmax(220px, 280px) auto;
        gap: 12px;
        align-items: center;
        margin: 0 0 18px;
    }

    .users-search,
    .users-sort {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
        border-radius: 14px;
        border: 1px solid var(--border);
        background: rgba(var(--surface-rgb), 0.55);
        padding: 0 14px;
    }

    .users-search i,
    .users-sort i { color: var(--accent); opacity: 0.95; }

    .users-search input,
    .users-sort select {
        width: 100%;
        border: 0;
        outline: none;
        background: transparent;
        color: var(--text);
        font-size: 0.95rem;
        font-weight: 700;
    }

    .users-search input::placeholder { color: var(--muted); }

    .users-sort select { cursor: pointer; }

    .users-search:focus-within,
    .users-sort:focus-within {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(159, 122, 234, 0.16);
    }

    .users-reset {
        justify-content: center;
        min-height: 46px;
    }

    .adm-table th,
    .adm-table td {
        padding: 12px 18px !important;
    }

    .adm-table .td-user { border-radius: 18px 0 0 18px; }
    .adm-table .td-action { border-radius: 0 18px 18px 0; text-align: right; }
    .adm-table .td-id { color: var(--muted); font-family: monospace; }
    .user-line { display: flex; align-items: center; gap: 14px; }
    .user-mail { font-weight: 850; font-size: 0.95rem; }
    .role-list { display: flex; gap: 8px; flex-wrap: wrap; }
    .users-result-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid var(--border);
        background: rgba(var(--surface-rgb), 0.5);
        font-size: 0.83rem;
        font-weight: 800;
        color: var(--muted);
    }

    @media (max-width: 980px) {
        .users-toolbar {
            grid-template-columns: 1fr;
        }

        .users-reset {
            width: 100%;
        }
    }
</style>
{% endblock %}

{% block admin_content %}
    <div class=\"panel\">
        <div class=\"panel-title\"><i class=\"fa-solid fa-users-gear\" style=\"color: var(--primary);\"></i> Annuaire des Comptes</div>
        <form method=\"get\" action=\"{{ path(app.request.get('_route')) }}\" class=\"users-toolbar\">
            <div class=\"users-search\">
                <i class=\"fa-solid fa-magnifying-glass\"></i>
                <input type=\"text\" name=\"q\" value=\"{{ search|default('') }}\" placeholder=\"Rechercher par nom ou email...\">
            </div>
            <div class=\"users-sort\">
                <i class=\"fa-solid fa-arrow-down-wide-short\"></i>
                <select name=\"sort\">
                    <option value=\"newest\" {{ (sort|default('newest')) == 'newest' ? 'selected' : '' }}>🆕 Plus récents</option>
                    <option value=\"admin_first\" {{ (sort|default('newest')) == 'admin_first' ? 'selected' : '' }}>🛡️ Admin d'abord</option>
                    <option value=\"name_asc\" {{ (sort|default('newest')) == 'name_asc' ? 'selected' : '' }}>👤 Nom (A-Z)</option>
                    <option value=\"email_asc\" {{ (sort|default('newest')) == 'email_asc' ? 'selected' : '' }}>✉️ Email (A-Z)</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn-adm active users-reset\">
                <i class=\"fa-solid fa-filter\"></i> Appliquer
            </button>
        </form>
        {% if (search|default('')) is not empty %}
            <div class=\"users-result-chip\">
                <i class=\"fa-solid fa-filter\"></i>
                Resultat pour \"{{ search }}\" ({{ users|length }})
            </div>
        {% endif %}
        <div class=\"table-wrap\">
            <table class=\"adm-table\" style=\"width: 100%;\">
                <thead>
                    <tr style=\"text-align: left; color: var(--muted); font-size: 0.8rem; text-transform: uppercase;\">
                        <th>Utilisateur</th>
                        <th>Identifiant</th>
                        <th>Permissions</th>
                        <th style=\"text-align: right;\">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {% for u in users %}
                        <tr>
                            <td class=\"td-user\">
                                <div class=\"user-line\">
                                    <div class=\"brand-badge\" style=\"width: 38px; height: 38px; font-size: 0.9rem; background: rgba(var(--surface-rgb), 0.1); color: var(--primary); border: 1px solid var(--border); box-shadow: none;\">
                                        <i class=\"fa-solid fa-user\"></i>
                                    </div>
                                    <div class=\"user-mail\">{{ u.email }}</div>
                                </div>
                            </td>
                            <td class=\"td-id\">#USR-{{ u.id }}</td>
                            <td>
                                <div class=\"role-list\">
                                    {% for role in u.roles %}
                                        <span class=\"badge\" style=\"background: rgba(var(--surface-rgb), 0.2); color: var(--primary); border: 1px solid var(--border); font-size: 0.65rem;\">
                                            {{ role|replace({'ROLE_': ''}) }}
                                        </span>
                                    {% endfor %}
                                </div>
                            </td>
                            <td class=\"td-action\">
                                <a href=\"{{ path('app_user_show', {id: u.id}) }}\" class=\"btn-adm\">
                                    <i class=\"fa-solid fa-eye\"></i> Voir
                                </a>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"4\" style=\"text-align: center; color: var(--muted); padding: 40px;\">Aucun membre enregistre.</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
{% endblock %}
", "admin/users.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\admin\\users.html.twig");
    }
}
