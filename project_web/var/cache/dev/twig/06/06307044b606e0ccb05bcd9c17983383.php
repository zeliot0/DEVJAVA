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

/* admin/tasks.html.twig */
class __TwigTemplate_12afddf8349e92c500db09c314518f40 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tasks.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/tasks.html.twig"));

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

        yield "Modération & Analytics";
        
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

        yield "Gestion proactive et statistiques avancées de la plateforme";
        
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
        yield "    <!-- 📊 Analytics Section -->
    <div style=\"display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 24px; margin-bottom: 40px; min-height: 350px;\">
        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-chart-line\" style=\"color: var(--primary);\"></i> Flux Mensuel</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartMonths\"></canvas>
            </div>
        </div>

        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-pie-chart\" style=\"color: var(--good);\"></i> Statuts</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartStatus\"></canvas>
            </div>
        </div>

        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-fire\" style=\"color: var(--bad);\"></i> Priorités</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartPriority\"></canvas>
            </div>
        </div>
    </div>

    <!-- 🛠️ Moderation Table -->
    <div class=\"panel\">
        <div class=\"panel-title\" style=\"margin-bottom: 25px;\">
            <i class=\"fa-solid fa-hammer\" style=\"color: var(--bad);\"></i> Liste de Modération Active
        </div>
        
        <div style=\"overflow-x: auto;\">
            <table class=\"adm-table\" style=\"width: 100%;\">
                <thead>
                    <tr style=\"text-align: left; color: var(--muted); font-size: 0.8rem; text-transform: uppercase;\">
                        <th style=\"padding: 10px 20px;\">ID</th>
                        <th style=\"padding: 10px 20px;\">Titre de la tâche</th>
                        <th style=\"padding: 10px 20px;\">Statut</th>
                        <th style=\"padding: 10px 20px;\">Priorité</th>
                        <th style=\"padding: 10px 20px; text-align: right;\">Gouvernance</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 49
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tasks"]) || array_key_exists("tasks", $context) ? $context["tasks"] : (function () { throw new RuntimeError('Variable "tasks" does not exist.', 49, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 50
            yield "                        <tr>
                            <td style=\"color: var(--muted); padding: 15px 20px;\">#";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 51), "html", null, true);
            yield "</td>
                            <td style=\"font-weight: 800; padding: 15px 20px;\">";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["t"], "title", [], "any", false, false, false, 52), "html", null, true);
            yield "</td>
                            <td style=\"padding: 15px 20px;\">
                                <span class=\"badge\" style=\"background: rgba(var(--surface-rgb),0.2); color: var(--text); border: 1px solid var(--border);\">";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["t"], "status", [], "any", false, false, false, 54)), "html", null, true);
            yield "</span>
                            </td>
                            <td style=\"padding: 15px 20px;\">
                                <span class=\"badge\" style=\"background: ";
            // line 57
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["t"], "priority", [], "any", false, false, false, 57) == "high")) {
                yield "rgba(239, 68, 68, 0.15)";
            } else {
                yield "rgba(91, 92, 240, 0.15)";
            }
            yield "; color: ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["t"], "priority", [], "any", false, false, false, 57) == "high")) {
                yield "#ef4444";
            } else {
                yield "#5b5cf0";
            }
            yield "; border: 1px solid transparent;\">
                                    ";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["t"], "priority", [], "any", false, false, false, 58)), "html", null, true);
            yield "
                                </span>
                            </td>
                            <td style=\"padding: 15px 20px; text-align: right; border-radius: 0 18px 18px 0;\">
                                <form action=\"";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tasks_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 62)]), "html", null, true);
            yield "\" method=\"POST\" onsubmit=\"return confirm('Supprimer définitivement cette tâche ?');\" style=\"display: inline;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 63
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("admin_delete_task_" . CoreExtension::getAttribute($this->env, $this->source, $context["t"], "id", [], "any", false, false, false, 63))), "html", null, true);
            yield "\">
                                    <button type=\"submit\" class=\"btn-delete\">
                                        <i class=\"fa-solid fa-trash-can\"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 70
        if (!$context['_iterated']) {
            // line 71
            yield "                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; color: var(--muted); padding: 40px;\">Aucune tâche enregistrée.</td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['t'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        yield "                </tbody>
            </table>
        </div>
    </div>

    <!-- 📉 Data for JS -->
    <script id=\"chartsData\" type=\"application/json\">
        ";
        // line 82
        yield json_encode((isset($context["charts"]) || array_key_exists("charts", $context) ? $context["charts"] : (function () { throw new RuntimeError('Variable "charts" does not exist.', 82, $this->source); })()));
        yield "
    </script>

    <!-- 📉 Chart.js Loader -->
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js\"></script>
    <script>
    (function() {
        let chartsInstances = [];
        
        function getThemeColor(variable) {
            return getComputedStyle(document.documentElement).getPropertyValue(variable).trim() || '#93a4c7';
        }

        function initCharts() {
            const dataElement = document.getElementById('chartsData');
            if (!dataElement) return;
            
            const data = JSON.parse(dataElement.textContent);
            const isLight = document.documentElement.getAttribute('data-theme') === 'light';
            const labelColor = getThemeColor('--muted');
            const gridColor = isLight ? 'rgba(0,0,0,0.05)' : 'rgba(255,255,255,0.05)';

            // Clean up old charts
            chartsInstances.forEach(c => c.destroy());
            chartsInstances = [];

            const baseOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        grid: { color: gridColor }, 
                        border: { display: false }, 
                        ticks: { color: labelColor, font: { size: 10, weight: 'bold' } } 
                    },
                    x: { 
                        grid: { display: false }, 
                        border: { display: false }, 
                        ticks: { color: labelColor, font: { size: 10, weight: 'bold' } } 
                    }
                }
            };

            // 1. Line Chart
            const ctxLine = document.getElementById('chartMonths');
            if (ctxLine) {
                chartsInstances.push(new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: data.months.labels,
                        datasets: [{
                            label: 'Tâches',
                            data: data.months.data,
                            borderColor: '#5b5cf0',
                            backgroundColor: 'rgba(91, 92, 240, 0.15)',
                            fill: true,
                            tension: 0.4,
                            pointRadius: 3,
                            pointBackgroundColor: '#fff',
                            borderWidth: 3
                        }]
                    },
                    options: baseOptions
                }));
            }

            // 2. Status Chart (Donut)
            const ctxStatus = document.getElementById('chartStatus');
            if (ctxStatus) {
                chartsInstances.push(new Chart(ctxStatus, {
                    type: 'doughnut',
                    data: {
                        labels: data.status.labels,
                        datasets: [{
                            data: data.status.data,
                            backgroundColor: ['#f59e0b', '#5b5cf0', '#10b981'],
                            hoverOffset: 15,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        ...baseOptions,
                        plugins: { 
                            legend: { 
                                display: true, 
                                position: 'bottom', 
                                labels: { color: labelColor, boxWidth: 12, padding: 15, font: { size: 11, weight: 'bold' } } 
                            } 
                        },
                        scales: { y: { display: false }, x: { display: false } }
                    }
                }));
            }

            // 3. Priority Chart (Bar)
            const ctxPriority = document.getElementById('chartPriority');
            if (ctxPriority) {
                chartsInstances.push(new Chart(ctxPriority, {
                    type: 'bar',
                    data: {
                        labels: data.priority.labels,
                        datasets: [{
                            data: data.priority.data,
                            backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                            borderRadius: 8,
                            barThickness: 25
                        }]
                    },
                    options: baseOptions
                }));
            }
        }

        // Run when window loads
        window.addEventListener('load', initCharts);
        
        // Watch for theme changes
        const observer = new MutationObserver(() => {
            initCharts();
        });
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
        
        // Safety check if already loaded
        if (document.readyState === 'complete') initCharts();

    })();
    </script>
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
        return "admin/tasks.html.twig";
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
        return array (  248 => 82,  239 => 75,  230 => 71,  228 => 70,  216 => 63,  212 => 62,  205 => 58,  191 => 57,  185 => 54,  180 => 52,  176 => 51,  173 => 50,  168 => 49,  124 => 7,  111 => 6,  88 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block admin_page_title %}Modération & Analytics{% endblock %}
{% block admin_page_hint %}Gestion proactive et statistiques avancées de la plateforme{% endblock %}

{% block admin_content %}
    <!-- 📊 Analytics Section -->
    <div style=\"display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 24px; margin-bottom: 40px; min-height: 350px;\">
        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-chart-line\" style=\"color: var(--primary);\"></i> Flux Mensuel</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartMonths\"></canvas>
            </div>
        </div>

        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-pie-chart\" style=\"color: var(--good);\"></i> Statuts</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartStatus\"></canvas>
            </div>
        </div>

        <div class=\"panel\" style=\"display: flex; flex-direction: column;\">
            <div class=\"panel-title\" style=\"margin-bottom: 15px;\"><i class=\"fa-solid fa-fire\" style=\"color: var(--bad);\"></i> Priorités</div>
            <div style=\"flex: 1; position: relative; width: 100%; height: 250px;\">
                <canvas id=\"chartPriority\"></canvas>
            </div>
        </div>
    </div>

    <!-- 🛠️ Moderation Table -->
    <div class=\"panel\">
        <div class=\"panel-title\" style=\"margin-bottom: 25px;\">
            <i class=\"fa-solid fa-hammer\" style=\"color: var(--bad);\"></i> Liste de Modération Active
        </div>
        
        <div style=\"overflow-x: auto;\">
            <table class=\"adm-table\" style=\"width: 100%;\">
                <thead>
                    <tr style=\"text-align: left; color: var(--muted); font-size: 0.8rem; text-transform: uppercase;\">
                        <th style=\"padding: 10px 20px;\">ID</th>
                        <th style=\"padding: 10px 20px;\">Titre de la tâche</th>
                        <th style=\"padding: 10px 20px;\">Statut</th>
                        <th style=\"padding: 10px 20px;\">Priorité</th>
                        <th style=\"padding: 10px 20px; text-align: right;\">Gouvernance</th>
                    </tr>
                </thead>
                <tbody>
                    {% for t in tasks %}
                        <tr>
                            <td style=\"color: var(--muted); padding: 15px 20px;\">#{{ t.id }}</td>
                            <td style=\"font-weight: 800; padding: 15px 20px;\">{{ t.title }}</td>
                            <td style=\"padding: 15px 20px;\">
                                <span class=\"badge\" style=\"background: rgba(var(--surface-rgb),0.2); color: var(--text); border: 1px solid var(--border);\">{{ t.status|upper }}</span>
                            </td>
                            <td style=\"padding: 15px 20px;\">
                                <span class=\"badge\" style=\"background: {% if t.priority == 'high' %}rgba(239, 68, 68, 0.15){% else %}rgba(91, 92, 240, 0.15){% endif %}; color: {% if t.priority == 'high' %}#ef4444{% else %}#5b5cf0{% endif %}; border: 1px solid transparent;\">
                                    {{ t.priority|upper }}
                                </span>
                            </td>
                            <td style=\"padding: 15px 20px; text-align: right; border-radius: 0 18px 18px 0;\">
                                <form action=\"{{ path('admin_tasks_delete', {id: t.id}) }}\" method=\"POST\" onsubmit=\"return confirm('Supprimer définitivement cette tâche ?');\" style=\"display: inline;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('admin_delete_task_' ~ t.id) }}\">
                                    <button type=\"submit\" class=\"btn-delete\">
                                        <i class=\"fa-solid fa-trash-can\"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    {% else %}
                        <tr>
                            <td colspan=\"5\" style=\"text-align: center; color: var(--muted); padding: 40px;\">Aucune tâche enregistrée.</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>

    <!-- 📉 Data for JS -->
    <script id=\"chartsData\" type=\"application/json\">
        {{ charts|json_encode|raw }}
    </script>

    <!-- 📉 Chart.js Loader -->
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js\"></script>
    <script>
    (function() {
        let chartsInstances = [];
        
        function getThemeColor(variable) {
            return getComputedStyle(document.documentElement).getPropertyValue(variable).trim() || '#93a4c7';
        }

        function initCharts() {
            const dataElement = document.getElementById('chartsData');
            if (!dataElement) return;
            
            const data = JSON.parse(dataElement.textContent);
            const isLight = document.documentElement.getAttribute('data-theme') === 'light';
            const labelColor = getThemeColor('--muted');
            const gridColor = isLight ? 'rgba(0,0,0,0.05)' : 'rgba(255,255,255,0.05)';

            // Clean up old charts
            chartsInstances.forEach(c => c.destroy());
            chartsInstances = [];

            const baseOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        grid: { color: gridColor }, 
                        border: { display: false }, 
                        ticks: { color: labelColor, font: { size: 10, weight: 'bold' } } 
                    },
                    x: { 
                        grid: { display: false }, 
                        border: { display: false }, 
                        ticks: { color: labelColor, font: { size: 10, weight: 'bold' } } 
                    }
                }
            };

            // 1. Line Chart
            const ctxLine = document.getElementById('chartMonths');
            if (ctxLine) {
                chartsInstances.push(new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: data.months.labels,
                        datasets: [{
                            label: 'Tâches',
                            data: data.months.data,
                            borderColor: '#5b5cf0',
                            backgroundColor: 'rgba(91, 92, 240, 0.15)',
                            fill: true,
                            tension: 0.4,
                            pointRadius: 3,
                            pointBackgroundColor: '#fff',
                            borderWidth: 3
                        }]
                    },
                    options: baseOptions
                }));
            }

            // 2. Status Chart (Donut)
            const ctxStatus = document.getElementById('chartStatus');
            if (ctxStatus) {
                chartsInstances.push(new Chart(ctxStatus, {
                    type: 'doughnut',
                    data: {
                        labels: data.status.labels,
                        datasets: [{
                            data: data.status.data,
                            backgroundColor: ['#f59e0b', '#5b5cf0', '#10b981'],
                            hoverOffset: 15,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        ...baseOptions,
                        plugins: { 
                            legend: { 
                                display: true, 
                                position: 'bottom', 
                                labels: { color: labelColor, boxWidth: 12, padding: 15, font: { size: 11, weight: 'bold' } } 
                            } 
                        },
                        scales: { y: { display: false }, x: { display: false } }
                    }
                }));
            }

            // 3. Priority Chart (Bar)
            const ctxPriority = document.getElementById('chartPriority');
            if (ctxPriority) {
                chartsInstances.push(new Chart(ctxPriority, {
                    type: 'bar',
                    data: {
                        labels: data.priority.labels,
                        datasets: [{
                            data: data.priority.data,
                            backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                            borderRadius: 8,
                            barThickness: 25
                        }]
                    },
                    options: baseOptions
                }));
            }
        }

        // Run when window loads
        window.addEventListener('load', initCharts);
        
        // Watch for theme changes
        const observer = new MutationObserver(() => {
            initCharts();
        });
        observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-theme'] });
        
        // Safety check if already loaded
        if (document.readyState === 'complete') initCharts();

    })();
    </script>
{% endblock %}
", "admin/tasks.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\admin\\tasks.html.twig");
    }
}
