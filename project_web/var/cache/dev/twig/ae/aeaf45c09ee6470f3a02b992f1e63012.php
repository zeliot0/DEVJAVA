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

/* admin/dashboard.html.twig */
class __TwigTemplate_a505aedcf757d2f6f374bd4d862c1149 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

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

        yield "Dashboard Général";
        
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

        yield "État de santé et statistiques globales de la plateforme NEXA";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "    <div class=\"kpi-row\">
        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--primary);\">
            <div class=\"kpi-label\">Utilisateurs</div>
            <div class=\"kpi-value\">";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalUsers"]) || array_key_exists("totalUsers", $context) ? $context["totalUsers"] : (function () { throw new RuntimeError('Variable "totalUsers" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-sub\">Comptes actifs sur NEXA</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--accent);\">
            <div class=\"kpi-label\">Tâches</div>
            <div class=\"kpi-value\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTasks"]) || array_key_exists("totalTasks", $context) ? $context["totalTasks"] : (function () { throw new RuntimeError('Variable "totalTasks" does not exist.', 16, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-sub\">Volume global de travail</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--good);\">
            <div class=\"kpi-label\">Actions</div>
            <div class=\"kpi-value\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalExecutions"]) || array_key_exists("totalExecutions", $context) ? $context["totalExecutions"] : (function () { throw new RuntimeError('Variable "totalExecutions" does not exist.', 22, $this->source); })()), "html", null, true);
        yield "</div>
            <div class=\"kpi-sub\">Exécutions suivies</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--warn);\">
            <div class=\"kpi-label\">Uptime</div>
            <div class=\"kpi-value\">99.9%</div>
            <div class=\"kpi-sub\">Système stable</div>
        </div>
    </div>

    <div class=\"adm-grid\" style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
        <div class=\"panel\">
            <div class=\"panel-title\" style=\"font-weight: 900; margin-bottom: 20px;\"><i class=\"fa-solid fa-user-plus\" style=\"color: var(--primary);\"></i> Nouveaux Membres</div>
            <table class=\"adm-table\" style=\"width: 100%;\">
                <tbody>
                    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["latestUsers"]) || array_key_exists("latestUsers", $context) ? $context["latestUsers"] : (function () { throw new RuntimeError('Variable "latestUsers" does not exist.', 38, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["u"]) {
            // line 39
            yield "                        <tr>
                            <td style=\"background: rgba(255,255,255,0.03); padding: 15px; border-radius: 12px; margin-bottom: 10px;\">
                                <div style=\"display: flex; align-items: center; gap: 15px;\">
                                    <div class=\"badge\" style=\"background: var(--gradient); width: 35px; height: 35px; border-radius: 10px; display: grid; place-items: center;\"><i class=\"fa-solid fa-user\"></i></div>
                                    <div style=\"font-weight: 800;\">";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["u"], "email", [], "any", false, false, false, 43), "html", null, true);
            yield "</div>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 47
        if (!$context['_iterated']) {
            // line 48
            yield "                        <tr><td style=\"color: var(--muted);\">Aucun utilisateur récent.</td></tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['u'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "                </tbody>
            </table>
        </div>

        <div class=\"panel\">
            <div class=\"panel-title\" style=\"font-weight: 900; margin-bottom: 20px;\"><i class=\"fa-solid fa-bolt\" style=\"color: var(--warn);\"></i> Activité Récente</div>
            <table class=\"adm-table\" style=\"width: 100%;\">
                <tbody>
                    ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["latestTasks"]) || array_key_exists("latestTasks", $context) ? $context["latestTasks"] : (function () { throw new RuntimeError('Variable "latestTasks" does not exist.', 58, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 59
            yield "                        <tr>
                            <td style=\"background: rgba(255,255,255,0.03); padding: 15px; border-radius: 12px; margin-bottom: 10px;\">
                                <div style=\"display: flex; align-items: center; gap: 15px;\">
                                    <div class=\"badge\" style=\"background: rgba(159, 122, 234, 0.2); color: var(--accent); width: 35px; height: 35px; border-radius: 10px; display: grid; place-items: center;\"><i class=\"fa-solid fa-file-invoice\"></i></div>
                                    <div style=\"font-weight: 800;\">";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "title", [], "any", false, false, false, 63), "html", null, true);
            yield "</div>
                                </div>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 67
        if (!$context['_iterated']) {
            // line 68
            yield "                        <tr><td style=\"color: var(--muted);\">Aucune activité récente.</td></tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['t'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
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
        return "admin/dashboard.html.twig";
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
        return array (  234 => 70,  227 => 68,  225 => 67,  216 => 63,  210 => 59,  205 => 58,  195 => 50,  188 => 48,  186 => 47,  177 => 43,  171 => 39,  166 => 38,  147 => 22,  138 => 16,  129 => 10,  124 => 7,  111 => 6,  88 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block admin_page_title %}Dashboard Général{% endblock %}
{% block admin_page_hint %}État de santé et statistiques globales de la plateforme NEXA{% endblock %}

{% block admin_content %}
    <div class=\"kpi-row\">
        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--primary);\">
            <div class=\"kpi-label\">Utilisateurs</div>
            <div class=\"kpi-value\">{{ totalUsers }}</div>
            <div class=\"kpi-sub\">Comptes actifs sur NEXA</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--accent);\">
            <div class=\"kpi-label\">Tâches</div>
            <div class=\"kpi-value\">{{ totalTasks }}</div>
            <div class=\"kpi-sub\">Volume global de travail</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--good);\">
            <div class=\"kpi-label\">Actions</div>
            <div class=\"kpi-value\">{{ totalExecutions }}</div>
            <div class=\"kpi-sub\">Exécutions suivies</div>
        </div>

        <div class=\"kpi-card\" style=\"border-left: 5px solid var(--warn);\">
            <div class=\"kpi-label\">Uptime</div>
            <div class=\"kpi-value\">99.9%</div>
            <div class=\"kpi-sub\">Système stable</div>
        </div>
    </div>

    <div class=\"adm-grid\" style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
        <div class=\"panel\">
            <div class=\"panel-title\" style=\"font-weight: 900; margin-bottom: 20px;\"><i class=\"fa-solid fa-user-plus\" style=\"color: var(--primary);\"></i> Nouveaux Membres</div>
            <table class=\"adm-table\" style=\"width: 100%;\">
                <tbody>
                    {% for u in latestUsers %}
                        <tr>
                            <td style=\"background: rgba(255,255,255,0.03); padding: 15px; border-radius: 12px; margin-bottom: 10px;\">
                                <div style=\"display: flex; align-items: center; gap: 15px;\">
                                    <div class=\"badge\" style=\"background: var(--gradient); width: 35px; height: 35px; border-radius: 10px; display: grid; place-items: center;\"><i class=\"fa-solid fa-user\"></i></div>
                                    <div style=\"font-weight: 800;\">{{ u.email }}</div>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr><td style=\"color: var(--muted);\">Aucun utilisateur récent.</td></tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>

        <div class=\"panel\">
            <div class=\"panel-title\" style=\"font-weight: 900; margin-bottom: 20px;\"><i class=\"fa-solid fa-bolt\" style=\"color: var(--warn);\"></i> Activité Récente</div>
            <table class=\"adm-table\" style=\"width: 100%;\">
                <tbody>
                    {% for t in latestTasks %}
                        <tr>
                            <td style=\"background: rgba(255,255,255,0.03); padding: 15px; border-radius: 12px; margin-bottom: 10px;\">
                                <div style=\"display: flex; align-items: center; gap: 15px;\">
                                    <div class=\"badge\" style=\"background: rgba(159, 122, 234, 0.2); color: var(--accent); width: 35px; height: 35px; border-radius: 10px; display: grid; place-items: center;\"><i class=\"fa-solid fa-file-invoice\"></i></div>
                                    <div style=\"font-weight: 800;\">{{ t.title }}</div>
                                </div>
                            </td>
                        </tr>
                    {% else %}
                        <tr><td style=\"color: var(--muted);\">Aucune activité récente.</td></tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
{% endblock %}
", "admin/dashboard.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\admin\\dashboard.html.twig");
    }
}
