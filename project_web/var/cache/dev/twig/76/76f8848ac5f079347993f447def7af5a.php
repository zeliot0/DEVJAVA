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

/* motivation/index.html.twig */
class __TwigTemplate_27014facb7d823e360d144ac2ef60744 extends Template
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
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/index.html.twig"));

        $this->parent = $this->load("theme/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<div class=\"motivation-container\">
    <!-- Éléments décoratifs -->
    <div class=\"decorative-element decorative-1\">&#10024;</div>
    <div class=\"decorative-element decorative-2\">&#127775;</div>
    <div class=\"decorative-element decorative-3\">&#128171;</div>
    
    <!-- En-tête -->
    <div class=\"page-header\">
        <div>
            <h1>Mes Motivations</h1>
            <p><i class=\"bi bi-heart-fill text-danger\"></i> Messages inspirants pour chaque humeur</p>
        </div>
        <div class=\"page-actions\">
            ";
        // line 17
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_new");
            yield "\" class=\"btn primary\">
                <i class=\"bi bi-plus-circle\"></i> Créer une motivation
            </a>
            ";
        }
        // line 22
        yield "        </div>
    </div>
    
    <!-- Section : Messages inspirants du Coran -->
    ";
        // line 26
        if (( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && (isset($context["inspirational_message"]) || array_key_exists("inspirational_message", $context) ? $context["inspirational_message"] : (function () { throw new RuntimeError('Variable "inspirational_message" does not exist.', 26, $this->source); })()))) {
            // line 27
            yield "    <div class=\"inspirational-message-container\">
        <div class=\"card motivation-verse-card\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">
                    <i class=\"bi bi-book text-primary\"></i>
                    Verset du Coran pour votre humeur
                    ";
            // line 33
            if ((($tmp = (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 33, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 34
                yield "                    <span class=\"badge bg-primary\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 34, $this->source); })())), "html", null, true);
                yield "</span>
                    ";
            }
            // line 36
            yield "                </h5>
                
                <!-- Texte arabe -->
                <div class=\"arabic-text text-end fs-4 mb-3\" dir=\"rtl\" style=\"font-family: 'Traditional Arabic', 'Arial', sans-serif;\">
                    ";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["inspirational_message"]) || array_key_exists("inspirational_message", $context) ? $context["inspirational_message"] : (function () { throw new RuntimeError('Variable "inspirational_message" does not exist.', 40, $this->source); })()), "arabic", [], "any", false, false, false, 40), "html", null, true);
            yield "
                </div>
                
                <!-- Traduction Française -->
                <div class=\"translation mb-2\">
                    <strong>Français :</strong> 
                    <p class=\"mb-1\">";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["inspirational_message"]) || array_key_exists("inspirational_message", $context) ? $context["inspirational_message"] : (function () { throw new RuntimeError('Variable "inspirational_message" does not exist.', 46, $this->source); })()), "french", [], "any", false, false, false, 46), "html", null, true);
            yield "</p>
                </div>
                
                <!-- Traduction anglaise -->
                <div class=\"translation mb-3\">
                    <strong>English :</strong> 
                    <p class=\"mb-1\">";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["inspirational_message"]) || array_key_exists("inspirational_message", $context) ? $context["inspirational_message"] : (function () { throw new RuntimeError('Variable "inspirational_message" does not exist.', 52, $this->source); })()), "english", [], "any", false, false, false, 52), "html", null, true);
            yield "</p>
                </div>
                
                <!-- Source -->
                <div class=\"source text-muted\">
                    <i class=\"bi bi-info-circle\"></i> ";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["inspirational_message"]) || array_key_exists("inspirational_message", $context) ? $context["inspirational_message"] : (function () { throw new RuntimeError('Variable "inspirational_message" does not exist.', 57, $this->source); })()), "source", [], "any", false, false, false, 57), "html", null, true);
            yield "
                </div>
            </div>
        </div>
    </div>
    ";
        }
        // line 63
        yield "    
    <!-- Filtres d'humeur -->
    ";
        // line 65
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "    <div class=\"search-bar\" style=\"flex-direction: column; align-items: flex-start;\">
        <h2 style=\"font-size: 1.2rem; font-weight: 800; margin: 0 0 15px 0; color: var(--primary);\">
            <i class=\"bi bi-funnel\"></i> Filtrer par humeur
        </h2>
        <div style=\"display: flex; flex-wrap: wrap; gap: 12px;\">
            <a href=\"";
            // line 71
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
            yield "\" 
               class=\"mood-badge ";
            // line 72
            yield (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 72, $this->source); })()), "request", [], "any", false, false, false, 72), "get", ["mood"], "method", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : (""));
            yield "\" style=\"text-decoration: none;\">
                <i class=\"bi bi-star-fill\"></i> Toutes
            </a>

            ";
            // line 76
            $context["emoji_map"] = ["motivated" => "🚀", "happy" => "😊", "sad" => "😢", "stressed" => "😵", "tired" => "😴", "determined" => "😎", "optimistic" => "🌈"];
            // line 85
            yield "
            ";
            // line 86
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["moods"]) || array_key_exists("moods", $context) ? $context["moods"] : (function () { throw new RuntimeError('Variable "moods" does not exist.', 86, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["mood"]) {
                // line 87
                yield "            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_by_mood", ["mood" => $context["mood"]]), "html", null, true);
                yield "\" 
               class=\"mood-badge mood-";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["mood"], "html", null, true);
                yield " ";
                yield ((((isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 88, $this->source); })()) == $context["mood"])) ? ("active") : (""));
                yield "\" style=\"text-decoration: none;\">
                <span class=\"mood-emoji\">";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["emoji_map"] ?? null), $context["mood"], [], "array", true, true, false, 89)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 89, $this->source); })()), $context["mood"], [], "array", false, false, false, 89), "🙂")) : ("🙂")), "html", null, true);
                yield "</span>
                ";
                // line 90
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["mood"]), "html", null, true);
                yield "
            </a>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['mood'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            yield "        </div>
    </div>
    ";
        }
        // line 96
        yield "    
    <!-- Grille des motivations -->
    ";
        // line 98
        if (( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && Twig\Extension\CoreExtension::testEmpty((isset($context["motivations"]) || array_key_exists("motivations", $context) ? $context["motivations"] : (function () { throw new RuntimeError('Variable "motivations" does not exist.', 98, $this->source); })())))) {
            // line 99
            yield "        <div class=\"motivation-empty-state\">
            <div class=\"empty-state-icon\">&#128522;</div>
            <h2 class=\"empty-state-title\">Pas de motivations pour le moment</h2>
            <p class=\"empty-state-text\">
                Créez des messages motivationnels pour inspirer vos journées 
                et atteindre vos objectifs avec le sourire !
            </p>
            <a href=\"";
            // line 106
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_new");
            yield "\" class=\"empty-state-btn pulse-on-hover\">
                <i class=\"bi bi-plus-circle\"></i> Créer ma première motivation
            </a>
        </div>
    ";
        } elseif ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 111
            yield "        <div class=\"motivation-grid\">
            ";
            // line 112
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["motivations"]) || array_key_exists("motivations", $context) ? $context["motivations"] : (function () { throw new RuntimeError('Variable "motivations" does not exist.', 112, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["motivation"]) {
                // line 113
                yield "            <article class=\"pack-card\">
                <div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;\">
                    <div style=\"display: flex; gap: 12px; align-items: center;\">
                        <div style=\"width: 40px; height: 40px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.05);\">
                            <span class=\"mood-emoji\">";
                // line 117
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["emoji_map"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "mood", [], "any", false, false, false, 117), [], "array", true, true, false, 117)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 117, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "mood", [], "any", false, false, false, 117), [], "array", false, false, false, 117), "🙂")) : ("🙂")), "html", null, true);
                yield "</span>
                        </div>
                        <div>
                            <h3 style=\"margin: 0; font-size: 1.1rem; font-weight: 850; color: var(--text-main);\">";
                // line 120
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "title", [], "any", false, false, false, 120), "html", null, true);
                yield "</h3>
                            <span style=\"font-size: 0.8rem; color: var(--text-muted); font-weight: 600;\">";
                // line 121
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "mood", [], "any", false, false, false, 121)), "html", null, true);
                yield "</span>
                        </div>
                    </div>
                </div>

                <p style=\"color: var(--text-muted); font-size: 0.88rem; line-height: 1.4; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;\">
                    ";
                // line 127
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "description", [], "any", false, false, false, 127), "html", null, true);
                yield "
                </p>

                <div class=\"nexa-actions-cell\" style=\"border-top: 1px solid var(--border-color); padding-top: 15px;\">
                    <a href=\"";
                // line 131
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "id", [], "any", false, false, false, 131)]), "html", null, true);
                yield "\" class=\"nexa-btn-icon view\" title=\"Lire\">
                        <i class=\"fas fa-eye\"></i>
                    </a>
                    <a href=\"";
                // line 134
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "id", [], "any", false, false, false, 134)]), "html", null, true);
                yield "\" class=\"nexa-btn-icon edit\" title=\"Modifier\">
                        <i class=\"fas fa-pen\"></i>
                    </a>
                    <form method=\"post\" action=\"";
                // line 137
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "id", [], "any", false, false, false, 137)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer ?');\" style=\"display: inline;\">
                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 138
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["motivation"], "id", [], "any", false, false, false, 138))), "html", null, true);
                yield "\">
                        <button class=\"nexa-btn-icon delete\" title=\"Supprimer\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </form>
                </div>
            </article>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['motivation'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            yield "        </div>
    ";
        }
        // line 148
        yield "
    ";
        // line 149
        $context["mood_messages"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["all_messages"] ?? null), (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 149, $this->source); })()), [], "array", true, true, false, 149)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["all_messages"]) || array_key_exists("all_messages", $context) ? $context["all_messages"] : (function () { throw new RuntimeError('Variable "all_messages" does not exist.', 149, $this->source); })()), (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 149, $this->source); })()), [], "array", false, false, false, 149), [])) : ([]));
        // line 150
        yield "    ";
        if ((( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 150, $this->source); })())) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["mood_messages"]) || array_key_exists("mood_messages", $context) ? $context["mood_messages"] : (function () { throw new RuntimeError('Variable "mood_messages" does not exist.', 150, $this->source); })())) > 1))) {
            // line 151
            yield "    <div class=\"more-verses-container mt-5\">
        <h3 class=\"section-title\">
            <i class=\"bi bi-collection\"></i> Plus de versets pour l'humeur \"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), (isset($context["current_mood"]) || array_key_exists("current_mood", $context) ? $context["current_mood"] : (function () { throw new RuntimeError('Variable "current_mood" does not exist.', 153, $this->source); })())), "html", null, true);
            yield "\"
        </h3>
        <div class=\"row\">
            ";
            // line 156
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["mood_messages"]) || array_key_exists("mood_messages", $context) ? $context["mood_messages"] : (function () { throw new RuntimeError('Variable "mood_messages" does not exist.', 156, $this->source); })()), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 157
                yield "            <div class=\"col-md-6 col-lg-4 mb-3\">
                <div class=\"card h-100 motivation-verse-card\">
                    <div class=\"card-body\">
                        <div class=\"arabic-text text-end mb-2\" dir=\"rtl\" style=\"font-family: 'Traditional Arabic', 'Arial', sans-serif;\">
                            ";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "arabic", [], "any", false, false, false, 161), "html", null, true);
                yield "
                        </div>
                        <p class=\"card-text\">
                            <small>";
                // line 164
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "french", [], "any", false, false, false, 164), "html", null, true);
                yield "</small>
                        </p>
                        <div class=\"source text-muted\">
                            <small><i class=\"bi bi-book\"></i> ";
                // line 167
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["message"], "source", [], "any", false, false, false, 167), "html", null, true);
                yield "</small>
                        </div>
                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            yield "        </div>
    </div>
    ";
        }
        // line 176
        yield "
    
    <!-- Statistiques -->
    <div class=\"motivation-stats-container\">
        <h2 class=\"motivation-stats-title\">
            <i class=\"bi bi-bar-chart\"></i> Statistiques des motivations
        </h2>
        ";
        // line 183
        $context["mood_labels"] = ["motivated" => "Motivé", "happy" => "Heureux", "sad" => "Triste", "stressed" => "Stressé", "tired" => "Fatigué", "determined" => "Déterminé", "optimistic" => "Optimiste"];
        // line 192
        yield "        <div class=\"stats-grid motivation-stats-grid-pro\">
            ";
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["moods"]) || array_key_exists("moods", $context) ? $context["moods"] : (function () { throw new RuntimeError('Variable "moods" does not exist.', 193, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mood"]) {
            // line 194
            yield "                ";
            $context["mood_key"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), $context["mood"]);
            // line 195
            yield "                ";
            $context["mood_count"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["mood_click_stats"] ?? null), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 195, $this->source); })()), [], "array", true, true, false, 195)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mood_click_stats"]) || array_key_exists("mood_click_stats", $context) ? $context["mood_click_stats"] : (function () { throw new RuntimeError('Variable "mood_click_stats" does not exist.', 195, $this->source); })()), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 195, $this->source); })()), [], "array", false, false, false, 195), 0)) : (0));
            // line 196
            yield "                <div class=\"stat-item ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 196, $this->source); })()), "html", null, true);
            yield " motivation-stat-card\">
                    <div class=\"motivation-stat-top\">
                        <span class=\"mood-emoji\">";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["emoji_map"] ?? null), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 198, $this->source); })()), [], "array", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 198, $this->source); })()), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 198, $this->source); })()), [], "array", false, false, false, 198), "🙂")) : ("🙂")), "html", null, true);
            yield "</span>
                        <span class=\"motivation-stat-title\">";
            // line 199
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["mood_labels"] ?? null), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 199, $this->source); })()), [], "array", true, true, false, 199)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["mood_labels"]) || array_key_exists("mood_labels", $context) ? $context["mood_labels"] : (function () { throw new RuntimeError('Variable "mood_labels" does not exist.', 199, $this->source); })()), (isset($context["mood_key"]) || array_key_exists("mood_key", $context) ? $context["mood_key"] : (function () { throw new RuntimeError('Variable "mood_key" does not exist.', 199, $this->source); })()), [], "array", false, false, false, 199), Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["mood"]))) : (Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["mood"]))), "html", null, true);
            yield "</span>
                    </div>
                    <span class=\"stat-value\">";
            // line 201
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["mood_count"]) || array_key_exists("mood_count", $context) ? $context["mood_count"] : (function () { throw new RuntimeError('Variable "mood_count" does not exist.', 201, $this->source); })()), "html", null, true);
            yield "</span>
                    <span class=\"stat-label\">motivation(s)</span>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['mood'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 205
        yield "        </div>
    </div>
</div> ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 210
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 211
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script>
        // Animation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            // Effet de vague sur les cartes
            const cards = document.querySelectorAll('.motivation-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
            });
            
            // Effet de brillance sur les boutons
            const buttons = document.querySelectorAll('.motivation-primary-btn, .empty-state-btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.animation = 'pulse 0.5s';
                });
                btn.addEventListener('animationend', function() {
                    this.style.animation = '';
                });
            });
            
            // Effet de survol sur les badges d'humeur
            const moodBadges = document.querySelectorAll('.mood-badge');
            moodBadges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    const mood = this.classList[1];
                    document.querySelectorAll('.mood-badge').forEach(b => {
                        if (b !== this) b.style.opacity = '0.7';
                    });
                });
                badge.addEventListener('mouseleave', function() {
                    document.querySelectorAll('.mood-badge').forEach(b => {
                        b.style.opacity = '1';
                    });
                });
            });
        });
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
        return "motivation/index.html.twig";
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
        return array (  457 => 211,  444 => 210,  431 => 205,  421 => 201,  416 => 199,  412 => 198,  406 => 196,  403 => 195,  400 => 194,  396 => 193,  393 => 192,  391 => 183,  382 => 176,  377 => 173,  365 => 167,  359 => 164,  353 => 161,  347 => 157,  343 => 156,  337 => 153,  333 => 151,  330 => 150,  328 => 149,  325 => 148,  321 => 146,  307 => 138,  303 => 137,  297 => 134,  291 => 131,  284 => 127,  275 => 121,  271 => 120,  265 => 117,  259 => 113,  255 => 112,  252 => 111,  244 => 106,  235 => 99,  233 => 98,  229 => 96,  224 => 93,  215 => 90,  211 => 89,  205 => 88,  200 => 87,  196 => 86,  193 => 85,  191 => 76,  184 => 72,  180 => 71,  173 => 66,  171 => 65,  167 => 63,  158 => 57,  150 => 52,  141 => 46,  132 => 40,  126 => 36,  120 => 34,  118 => 33,  110 => 27,  108 => 26,  102 => 22,  94 => 18,  92 => 17,  77 => 4,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block body %}
<div class=\"motivation-container\">
    <!-- Éléments décoratifs -->
    <div class=\"decorative-element decorative-1\">&#10024;</div>
    <div class=\"decorative-element decorative-2\">&#127775;</div>
    <div class=\"decorative-element decorative-3\">&#128171;</div>
    
    <!-- En-tête -->
    <div class=\"page-header\">
        <div>
            <h1>Mes Motivations</h1>
            <p><i class=\"bi bi-heart-fill text-danger\"></i> Messages inspirants pour chaque humeur</p>
        </div>
        <div class=\"page-actions\">
            {% if not is_granted('ROLE_ADMIN') %}
            <a href=\"{{ path('app_motivation_new') }}\" class=\"btn primary\">
                <i class=\"bi bi-plus-circle\"></i> Créer une motivation
            </a>
            {% endif %}
        </div>
    </div>
    
    <!-- Section : Messages inspirants du Coran -->
    {% if not is_granted('ROLE_ADMIN') and inspirational_message %}
    <div class=\"inspirational-message-container\">
        <div class=\"card motivation-verse-card\">
            <div class=\"card-body\">
                <h5 class=\"card-title\">
                    <i class=\"bi bi-book text-primary\"></i>
                    Verset du Coran pour votre humeur
                    {% if current_mood %}
                    <span class=\"badge bg-primary\">{{ current_mood|capitalize }}</span>
                    {% endif %}
                </h5>
                
                <!-- Texte arabe -->
                <div class=\"arabic-text text-end fs-4 mb-3\" dir=\"rtl\" style=\"font-family: 'Traditional Arabic', 'Arial', sans-serif;\">
                    {{ inspirational_message.arabic }}
                </div>
                
                <!-- Traduction Française -->
                <div class=\"translation mb-2\">
                    <strong>Français :</strong> 
                    <p class=\"mb-1\">{{ inspirational_message.french }}</p>
                </div>
                
                <!-- Traduction anglaise -->
                <div class=\"translation mb-3\">
                    <strong>English :</strong> 
                    <p class=\"mb-1\">{{ inspirational_message.english }}</p>
                </div>
                
                <!-- Source -->
                <div class=\"source text-muted\">
                    <i class=\"bi bi-info-circle\"></i> {{ inspirational_message.source }}
                </div>
            </div>
        </div>
    </div>
    {% endif %}
    
    <!-- Filtres d'humeur -->
    {% if not is_granted('ROLE_ADMIN') %}
    <div class=\"search-bar\" style=\"flex-direction: column; align-items: flex-start;\">
        <h2 style=\"font-size: 1.2rem; font-weight: 800; margin: 0 0 15px 0; color: var(--primary);\">
            <i class=\"bi bi-funnel\"></i> Filtrer par humeur
        </h2>
        <div style=\"display: flex; flex-wrap: wrap; gap: 12px;\">
            <a href=\"{{ path('app_motivation_index') }}\" 
               class=\"mood-badge {{ not app.request.get('mood') ? 'active' : '' }}\" style=\"text-decoration: none;\">
                <i class=\"bi bi-star-fill\"></i> Toutes
            </a>

            {% set emoji_map = {
                'motivated': '🚀',
                'happy': '😊',
                'sad': '😢',
                'stressed': '😵',
                'tired': '😴',
                'determined': '😎',
                'optimistic': '🌈'
            } %}

            {% for mood in moods %}
            <a href=\"{{ path('app_motivation_by_mood', {'mood': mood}) }}\" 
               class=\"mood-badge mood-{{ mood }} {{ current_mood == mood ? 'active' : '' }}\" style=\"text-decoration: none;\">
                <span class=\"mood-emoji\">{{ emoji_map[mood]|default('🙂') }}</span>
                {{ mood|capitalize }}
            </a>
            {% endfor %}
        </div>
    </div>
    {% endif %}
    
    <!-- Grille des motivations -->
    {% if not is_granted('ROLE_ADMIN') and motivations is empty %}
        <div class=\"motivation-empty-state\">
            <div class=\"empty-state-icon\">&#128522;</div>
            <h2 class=\"empty-state-title\">Pas de motivations pour le moment</h2>
            <p class=\"empty-state-text\">
                Créez des messages motivationnels pour inspirer vos journées 
                et atteindre vos objectifs avec le sourire !
            </p>
            <a href=\"{{ path('app_motivation_new') }}\" class=\"empty-state-btn pulse-on-hover\">
                <i class=\"bi bi-plus-circle\"></i> Créer ma première motivation
            </a>
        </div>
    {% elseif not is_granted('ROLE_ADMIN') %}
        <div class=\"motivation-grid\">
            {% for motivation in motivations %}
            <article class=\"pack-card\">
                <div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;\">
                    <div style=\"display: flex; gap: 12px; align-items: center;\">
                        <div style=\"width: 40px; height: 40px; border-radius: 10px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 1.1rem; box-shadow: 0 4px 10px rgba(0,0,0,0.05);\">
                            <span class=\"mood-emoji\">{{ emoji_map[motivation.mood]|default('🙂') }}</span>
                        </div>
                        <div>
                            <h3 style=\"margin: 0; font-size: 1.1rem; font-weight: 850; color: var(--text-main);\">{{ motivation.title }}</h3>
                            <span style=\"font-size: 0.8rem; color: var(--text-muted); font-weight: 600;\">{{ motivation.mood|upper }}</span>
                        </div>
                    </div>
                </div>

                <p style=\"color: var(--text-muted); font-size: 0.88rem; line-height: 1.4; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;\">
                    {{ motivation.description }}
                </p>

                <div class=\"nexa-actions-cell\" style=\"border-top: 1px solid var(--border-color); padding-top: 15px;\">
                    <a href=\"{{ path('app_motivation_show', {'id': motivation.id}) }}\" class=\"nexa-btn-icon view\" title=\"Lire\">
                        <i class=\"fas fa-eye\"></i>
                    </a>
                    <a href=\"{{ path('app_motivation_edit', {'id': motivation.id}) }}\" class=\"nexa-btn-icon edit\" title=\"Modifier\">
                        <i class=\"fas fa-pen\"></i>
                    </a>
                    <form method=\"post\" action=\"{{ path('app_motivation_delete', {'id': motivation.id}) }}\" onsubmit=\"return confirm('Supprimer ?');\" style=\"display: inline;\">
                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ motivation.id) }}\">
                        <button class=\"nexa-btn-icon delete\" title=\"Supprimer\">
                            <i class=\"fas fa-trash\"></i>
                        </button>
                    </form>
                </div>
            </article>
            {% endfor %}
        </div>
    {% endif %}

    {% set mood_messages = all_messages[current_mood]|default([]) %}
    {% if not is_granted('ROLE_ADMIN') and current_mood and mood_messages|length > 1 %}
    <div class=\"more-verses-container mt-5\">
        <h3 class=\"section-title\">
            <i class=\"bi bi-collection\"></i> Plus de versets pour l'humeur \"{{ current_mood|capitalize }}\"
        </h3>
        <div class=\"row\">
            {% for message in mood_messages|slice(0, 5) %}
            <div class=\"col-md-6 col-lg-4 mb-3\">
                <div class=\"card h-100 motivation-verse-card\">
                    <div class=\"card-body\">
                        <div class=\"arabic-text text-end mb-2\" dir=\"rtl\" style=\"font-family: 'Traditional Arabic', 'Arial', sans-serif;\">
                            {{ message.arabic }}
                        </div>
                        <p class=\"card-text\">
                            <small>{{ message.french }}</small>
                        </p>
                        <div class=\"source text-muted\">
                            <small><i class=\"bi bi-book\"></i> {{ message.source }}</small>
                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
    {% endif %}

    
    <!-- Statistiques -->
    <div class=\"motivation-stats-container\">
        <h2 class=\"motivation-stats-title\">
            <i class=\"bi bi-bar-chart\"></i> Statistiques des motivations
        </h2>
        {% set mood_labels = {
            'motivated': 'Motivé',
            'happy': 'Heureux',
            'sad': 'Triste',
            'stressed': 'Stressé',
            'tired': 'Fatigué',
            'determined': 'Déterminé',
            'optimistic': 'Optimiste'
        } %}
        <div class=\"stats-grid motivation-stats-grid-pro\">
            {% for mood in moods %}
                {% set mood_key = mood|lower %}
                {% set mood_count = mood_click_stats[mood_key]|default(0) %}
                <div class=\"stat-item {{ mood_key }} motivation-stat-card\">
                    <div class=\"motivation-stat-top\">
                        <span class=\"mood-emoji\">{{ emoji_map[mood_key]|default('🙂') }}</span>
                        <span class=\"motivation-stat-title\">{{ mood_labels[mood_key]|default(mood|capitalize) }}</span>
                    </div>
                    <span class=\"stat-value\">{{ mood_count }}</span>
                    <span class=\"stat-label\">motivation(s)</span>
                </div>
            {% endfor %}
        </div>
    </div>
</div> {# Close the motivation-container div #}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        // Animation au chargement
        document.addEventListener('DOMContentLoaded', function() {
            // Effet de vague sur les cartes
            const cards = document.querySelectorAll('.motivation-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = (index * 0.1) + 's';
            });
            
            // Effet de brillance sur les boutons
            const buttons = document.querySelectorAll('.motivation-primary-btn, .empty-state-btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.animation = 'pulse 0.5s';
                });
                btn.addEventListener('animationend', function() {
                    this.style.animation = '';
                });
            });
            
            // Effet de survol sur les badges d'humeur
            const moodBadges = document.querySelectorAll('.mood-badge');
            moodBadges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    const mood = this.classList[1];
                    document.querySelectorAll('.mood-badge').forEach(b => {
                        if (b !== this) b.style.opacity = '0.7';
                    });
                });
                badge.addEventListener('mouseleave', function() {
                    document.querySelectorAll('.mood-badge').forEach(b => {
                        b.style.opacity = '1';
                    });
                });
            });
        });
    </script>
{% endblock %}


", "motivation/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\motivation\\index.html.twig");
    }
}
