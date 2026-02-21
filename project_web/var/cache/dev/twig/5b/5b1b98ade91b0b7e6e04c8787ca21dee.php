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

/* task/new.html.twig */
class __TwigTemplate_a09a704ecb014e7e002d1c597f4110ad extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/new.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "NEXA – Task Hub";
        
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
        yield "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>

<div class=\"layout\">

  <!-- ✅ Sidebar overlay (mobile) -->
  <div class=\"sb-overlay\" id=\"sbOverlay\"></div>

  <!-- ✅ Sidebar -->
  <aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sb-head\">
      <div class=\"sb-brand\">
        <div class=\"logo\"><i class=\"fa-solid fa-bolt\"></i></div>
        <div class=\"txt\">
          <strong>NEXA</strong>
          <span>Task Hub</span>
        </div>
      </div>

      <button class=\"sb-toggle\" id=\"sbToggle\" title=\"Menu\">
        <i class=\"fa-solid fa-bars\"></i>
      </button>
    </div>

    <nav class=\"sb-nav\">
      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-house\"></i> Dashboard
      </a>

      <a class=\"sb-item active\" href=\"";
        // line 34
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_task_index");
        yield "\">
        <i class=\"fa-solid fa-list-check\"></i> Tasks
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-layer-group\"></i> Projects
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-calendar-days\"></i> Calendar
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-regular fa-note-sticky\"></i> Notes
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-brain\"></i> AI Quiz
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-box\"></i> Packs
      </a>

      <div class=\"sb-sep\"></div>

      <div class=\"sb-foot\">
        <a class=\"sb-logout\" href=\"#\">
          <i class=\"fa-solid fa-right-from-bracket\"></i> Log out
        </a>
      </div>
    </nav>
  </aside>

  <!-- ✅ Main content -->
  <main class=\"main\">

    <!-- Topbar -->
    <div class=\"topbar\">
      <div class=\"brand\">
        <div class=\"brand-badge\"><i class=\"fa-solid fa-bolt\"></i></div>
        <div>
          <div class=\"brand-name\">NEXA Task Hub</div>
      
        </div>
      </div>

      <div class=\"actions\">
        <button class=\"btn primary\" id=\"newBtn\"><i class=\"fa-solid fa-plus\"></i> Nouvelle tâche</button>
        <button class=\"toggle\" id=\"themeToggle\" title=\"Changer de thème\"><i class=\"fas fa-moon\"></i></button>
      </div>
    </div>

    <div class=\"wrap\">

      <!-- Toolbar -->
      <div class=\"toolbar\">
        <div class=\"field\">
          <i class=\"fa-solid fa-magnifying-glass\"></i>
          <input id=\"searchInput\" placeholder=\"Rechercher (titre, description)...\" />
          
        </div>

        <div class=\"field\">
          <i class=\"fa-solid fa-flag\"></i>
          <select id=\"prioFilter\">
            <option value=\"all\">Toutes priorités</option>
            <option value=\"low\">Basse</option>
            <option value=\"med\">Moyenne</option>
            <option value=\"high\">Haute</option>
          </select>
        </div>

        <div class=\"field\">
          <i class=\"fa-solid fa-layer-group\"></i>
          <select id=\"statusFilter\">
            <option value=\"all\">Tous statuts</option>
            <option value=\"todo\">À faire</option>
            <option value=\"doing\">En cours</option>
            <option value=\"done\">Terminé</option>
          </select>
        </div>

        <button class=\"btn\" id=\"clearBtn\">
          <i class=\"fa-solid fa-broom\"></i> Reset filtres
        </button>
      </div>

      <!-- KPI -->
      <div class=\"kpis\">
        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">Total</div>
              <div class=\"kpi-value\" id=\"kpiTotal\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-database\"></i> DB</div>
          </div>
        </div>

        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">En cours</div>
              <div class=\"kpi-value\" id=\"kpiDoing\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-bolt\"></i> Focus</div>
          </div>
        </div>

        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">Priorité haute</div>
              <div class=\"kpi-value\" id=\"kpiHigh\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-flag\"></i> Critique</div>
          </div>
        </div>
      </div>

      <!-- Board -->
      <div class=\"board\">
        <div class=\"col\" data-col=\"todo\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot todo\"></span> À faire</div>
            <div class=\"col-count\" id=\"countTodo\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-todo\"></div>
        </div>

        <div class=\"col\" data-col=\"doing\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot doing\"></span> En cours</div>
            <div class=\"col-count\" id=\"countDoing\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-doing\"></div>
        </div>

        <div class=\"col\" data-col=\"done\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot done\"></span> Terminé</div>
            <div class=\"col-count\" id=\"countDone\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-done\"></div>
        </div>
      </div>
    </div>

    <!-- Drawer -->
    <div class=\"overlay\" id=\"overlay\"></div>
    <aside class=\"drawer\" id=\"drawer\">
      <div class=\"drawer-head\">
        <div>
          <h3 class=\"drawer-title\" id=\"drawerTitle\">Nouvelle tâche</h3>
          <div class=\"drawer-sub\" id=\"drawerSub\">Champs liés à la base de données</div>
        </div>
        <button class=\"icon-btn\" id=\"closeDrawer\" title=\"Fermer\"><i class=\"fa-solid fa-xmark\"></i></button>
      </div>

      <div class=\"drawer-body\">
        <div class=\"field\"><i class=\"fa-solid fa-heading\"></i><input id=\"fTitle\" placeholder=\"Titre\" /></div>
        <div class=\"field\"><i class=\"fa-solid fa-align-left\"></i><textarea id=\"fDesc\" placeholder=\"Description\"></textarea></div>

        <div class=\"grid2\">
          <div class=\"field\"><i class=\"fa-solid fa-flag\"></i>
            <select id=\"fPrio\">
              <option value=\"low\">Basse</option>
              <option value=\"med\" selected>Moyenne</option>
              <option value=\"high\">Haute</option>
            </select>
          </div>

          <div class=\"field\"><i class=\"fa-solid fa-layer-group\"></i>
            <select id=\"fStatus\">
              <option value=\"todo\">À faire</option>
              <option value=\"doing\">En cours</option>
              <option value=\"done\">Terminé</option>
            </select>
          </div>
        </div>

        <div class=\"grid2\">
          <div class=\"field\"><i class=\"fa-regular fa-calendar\"></i><input id=\"fDue\" type=\"date\" /></div>
          <div class=\"field\"><i class=\"fa-solid fa-folder\"></i>
            <select id=\"fCategory\">
              <option value=\"\">Aucune catégorie</option>
            </select>
          </div>
        </div>
      </div>

      <div class=\"drawer-foot\">
        <button class=\"btn\" id=\"deleteBtn\" style=\"display:none;\"><i class=\"fa-solid fa-trash\"></i> Supprimer</button>
        <button class=\"btn\" id=\"editBtn\" style=\"display:none;\"><i class=\"fa-regular fa-pen-to-square\"></i> Modifier</button>
        <button class=\"btn\" id=\"cancelBtn\"><i class=\"fa-regular fa-circle-xmark\"></i> Annuler</button>
        <button class=\"btn primary\" id=\"saveBtn\"><i class=\"fa-solid fa-check\"></i> Enregistrer</button>
      </div>
    </aside>

    <script>
      window.NEXA_API = {
        list: \"";
        // line 236
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_tasks_list");
        yield "\",
        create: \"";
        // line 237
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_tasks_create");
        yield "\",
        updateBase: \"/api/tasks\",
        deleteBase: \"/api/tasks\",
        today: \"/api/tasks/today\",
        overdue: \"/api/tasks/overdue\",
        autoPrioritize: \"/api/tasks/auto-prioritize\",
        batchStatus: \"/api/tasks/batch/status\",
        batchDelete: \"/api/tasks/batch/delete\",
        categories: \"";
        // line 245
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_categories_list");
        yield "\",
        categoriesCreate: \"/api/categories\",
        categoriesUpdateBase: \"/api/categories\",
        categoriesDeleteBase: \"/api/categories\",
        aiDescription: \"/api/ai/description\",
        aiAnalyze: \"/api/ai/analyze\",
        aiSubtasks: \"/api/ai/subtasks\",
        aiSummary: \"/api/ai/executions-summary\",
        aiEstimate: \"/api/ai/estimate\",
        aiRiskScore: \"/api/ai/risk-score\",
        analyticsThroughput: \"/api/analytics/throughput\",
        analyticsWorkload: \"/api/analytics/workload\",
        analyticsCycleTime: \"/api/analytics/cycle-time\",
        jobsCreate: \"/api/jobs\",
        jobsBase: \"/api/jobs\",
        dashboardStats: \"/api/dashboard/stats\"
      };
    </script>

    <script src=\"/assets/board.js?v=20260209a\"></script>

  </main>
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
        return "task/new.html.twig";
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
        return array (  350 => 245,  339 => 237,  335 => 236,  130 => 34,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}NEXA – Task Hub{% endblock %}

{% block body %}
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>

<div class=\"layout\">

  <!-- ✅ Sidebar overlay (mobile) -->
  <div class=\"sb-overlay\" id=\"sbOverlay\"></div>

  <!-- ✅ Sidebar -->
  <aside class=\"sidebar\" id=\"sidebar\">
    <div class=\"sb-head\">
      <div class=\"sb-brand\">
        <div class=\"logo\"><i class=\"fa-solid fa-bolt\"></i></div>
        <div class=\"txt\">
          <strong>NEXA</strong>
          <span>Task Hub</span>
        </div>
      </div>

      <button class=\"sb-toggle\" id=\"sbToggle\" title=\"Menu\">
        <i class=\"fa-solid fa-bars\"></i>
      </button>
    </div>

    <nav class=\"sb-nav\">
      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-house\"></i> Dashboard
      </a>

      <a class=\"sb-item active\" href=\"{{ path('app_task_index') }}\">
        <i class=\"fa-solid fa-list-check\"></i> Tasks
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-layer-group\"></i> Projects
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-calendar-days\"></i> Calendar
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-regular fa-note-sticky\"></i> Notes
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-brain\"></i> AI Quiz
      </a>

      <a class=\"sb-item\" href=\"#\">
        <i class=\"fa-solid fa-box\"></i> Packs
      </a>

      <div class=\"sb-sep\"></div>

      <div class=\"sb-foot\">
        <a class=\"sb-logout\" href=\"#\">
          <i class=\"fa-solid fa-right-from-bracket\"></i> Log out
        </a>
      </div>
    </nav>
  </aside>

  <!-- ✅ Main content -->
  <main class=\"main\">

    <!-- Topbar -->
    <div class=\"topbar\">
      <div class=\"brand\">
        <div class=\"brand-badge\"><i class=\"fa-solid fa-bolt\"></i></div>
        <div>
          <div class=\"brand-name\">NEXA Task Hub</div>
      
        </div>
      </div>

      <div class=\"actions\">
        <button class=\"btn primary\" id=\"newBtn\"><i class=\"fa-solid fa-plus\"></i> Nouvelle tâche</button>
        <button class=\"toggle\" id=\"themeToggle\" title=\"Changer de thème\"><i class=\"fas fa-moon\"></i></button>
      </div>
    </div>

    <div class=\"wrap\">

      <!-- Toolbar -->
      <div class=\"toolbar\">
        <div class=\"field\">
          <i class=\"fa-solid fa-magnifying-glass\"></i>
          <input id=\"searchInput\" placeholder=\"Rechercher (titre, description)...\" />
          
        </div>

        <div class=\"field\">
          <i class=\"fa-solid fa-flag\"></i>
          <select id=\"prioFilter\">
            <option value=\"all\">Toutes priorités</option>
            <option value=\"low\">Basse</option>
            <option value=\"med\">Moyenne</option>
            <option value=\"high\">Haute</option>
          </select>
        </div>

        <div class=\"field\">
          <i class=\"fa-solid fa-layer-group\"></i>
          <select id=\"statusFilter\">
            <option value=\"all\">Tous statuts</option>
            <option value=\"todo\">À faire</option>
            <option value=\"doing\">En cours</option>
            <option value=\"done\">Terminé</option>
          </select>
        </div>

        <button class=\"btn\" id=\"clearBtn\">
          <i class=\"fa-solid fa-broom\"></i> Reset filtres
        </button>
      </div>

      <!-- KPI -->
      <div class=\"kpis\">
        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">Total</div>
              <div class=\"kpi-value\" id=\"kpiTotal\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-database\"></i> DB</div>
          </div>
        </div>

        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">En cours</div>
              <div class=\"kpi-value\" id=\"kpiDoing\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-bolt\"></i> Focus</div>
          </div>
        </div>

        <div class=\"kpi\">
          <div class=\"kpi-top\">
            <div>
              <div class=\"kpi-title\">Priorité haute</div>
              <div class=\"kpi-value\" id=\"kpiHigh\">0</div>
            </div>
            <div class=\"kpi-chip\"><i class=\"fa-solid fa-flag\"></i> Critique</div>
          </div>
        </div>
      </div>

      <!-- Board -->
      <div class=\"board\">
        <div class=\"col\" data-col=\"todo\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot todo\"></span> À faire</div>
            <div class=\"col-count\" id=\"countTodo\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-todo\"></div>
        </div>

        <div class=\"col\" data-col=\"doing\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot doing\"></span> En cours</div>
            <div class=\"col-count\" id=\"countDoing\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-doing\"></div>
        </div>

        <div class=\"col\" data-col=\"done\">
          <div class=\"col-header\">
            <div class=\"col-title\"><span class=\"dot done\"></span> Terminé</div>
            <div class=\"col-count\" id=\"countDone\">0</div>
          </div>
          <div class=\"dropzone\" id=\"zone-done\"></div>
        </div>
      </div>
    </div>

    <!-- Drawer -->
    <div class=\"overlay\" id=\"overlay\"></div>
    <aside class=\"drawer\" id=\"drawer\">
      <div class=\"drawer-head\">
        <div>
          <h3 class=\"drawer-title\" id=\"drawerTitle\">Nouvelle tâche</h3>
          <div class=\"drawer-sub\" id=\"drawerSub\">Champs liés à la base de données</div>
        </div>
        <button class=\"icon-btn\" id=\"closeDrawer\" title=\"Fermer\"><i class=\"fa-solid fa-xmark\"></i></button>
      </div>

      <div class=\"drawer-body\">
        <div class=\"field\"><i class=\"fa-solid fa-heading\"></i><input id=\"fTitle\" placeholder=\"Titre\" /></div>
        <div class=\"field\"><i class=\"fa-solid fa-align-left\"></i><textarea id=\"fDesc\" placeholder=\"Description\"></textarea></div>

        <div class=\"grid2\">
          <div class=\"field\"><i class=\"fa-solid fa-flag\"></i>
            <select id=\"fPrio\">
              <option value=\"low\">Basse</option>
              <option value=\"med\" selected>Moyenne</option>
              <option value=\"high\">Haute</option>
            </select>
          </div>

          <div class=\"field\"><i class=\"fa-solid fa-layer-group\"></i>
            <select id=\"fStatus\">
              <option value=\"todo\">À faire</option>
              <option value=\"doing\">En cours</option>
              <option value=\"done\">Terminé</option>
            </select>
          </div>
        </div>

        <div class=\"grid2\">
          <div class=\"field\"><i class=\"fa-regular fa-calendar\"></i><input id=\"fDue\" type=\"date\" /></div>
          <div class=\"field\"><i class=\"fa-solid fa-folder\"></i>
            <select id=\"fCategory\">
              <option value=\"\">Aucune catégorie</option>
            </select>
          </div>
        </div>
      </div>

      <div class=\"drawer-foot\">
        <button class=\"btn\" id=\"deleteBtn\" style=\"display:none;\"><i class=\"fa-solid fa-trash\"></i> Supprimer</button>
        <button class=\"btn\" id=\"editBtn\" style=\"display:none;\"><i class=\"fa-regular fa-pen-to-square\"></i> Modifier</button>
        <button class=\"btn\" id=\"cancelBtn\"><i class=\"fa-regular fa-circle-xmark\"></i> Annuler</button>
        <button class=\"btn primary\" id=\"saveBtn\"><i class=\"fa-solid fa-check\"></i> Enregistrer</button>
      </div>
    </aside>

    <script>
      window.NEXA_API = {
        list: \"{{ path('api_tasks_list') }}\",
        create: \"{{ path('api_tasks_create') }}\",
        updateBase: \"/api/tasks\",
        deleteBase: \"/api/tasks\",
        today: \"/api/tasks/today\",
        overdue: \"/api/tasks/overdue\",
        autoPrioritize: \"/api/tasks/auto-prioritize\",
        batchStatus: \"/api/tasks/batch/status\",
        batchDelete: \"/api/tasks/batch/delete\",
        categories: \"{{ path('api_categories_list') }}\",
        categoriesCreate: \"/api/categories\",
        categoriesUpdateBase: \"/api/categories\",
        categoriesDeleteBase: \"/api/categories\",
        aiDescription: \"/api/ai/description\",
        aiAnalyze: \"/api/ai/analyze\",
        aiSubtasks: \"/api/ai/subtasks\",
        aiSummary: \"/api/ai/executions-summary\",
        aiEstimate: \"/api/ai/estimate\",
        aiRiskScore: \"/api/ai/risk-score\",
        analyticsThroughput: \"/api/analytics/throughput\",
        analyticsWorkload: \"/api/analytics/workload\",
        analyticsCycleTime: \"/api/analytics/cycle-time\",
        jobsCreate: \"/api/jobs\",
        jobsBase: \"/api/jobs\",
        dashboardStats: \"/api/dashboard/stats\"
      };
    </script>

    <script src=\"/assets/board.js?v=20260209a\"></script>

  </main>
</div>
{% endblock %}
", "task/new.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\task\\new.html.twig");
    }
}
