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

/* motivation/show.html.twig */
class __TwigTemplate_a5f004f12f9f7a007058ef7518296087 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "motivation/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 3, $this->source); })()), "titleMotiv", [], "any", false, false, false, 3), "html", null, true);
        yield " - Motivation";
        
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
        yield "<div class=\"motivation-show-container\">
    <!-- Navigation Header -->
    <div class=\"show-navigation\">
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_index");
        yield "\" class=\"back-btn\">
            <i class=\"bi bi-arrow-left\"></i> Retour à la liste
        </a>
        ";
        // line 12
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "        <div class=\"action-buttons\">
            <a href=\"";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 14, $this->source); })()), "id", [], "any", false, false, false, 14)]), "html", null, true);
            yield "\" class=\"edit-btn\">
                <i class=\"bi bi-pencil\"></i> Modifier
            </a>
            ";
            // line 17
            yield Twig\Extension\CoreExtension::include($this->env, $context, "motivation/_delete_form.html.twig");
            yield "
        </div>
        ";
        }
        // line 20
        yield "    </div>

    <!-- Main Content -->
    <div class=\"motivation-show-card\">
        <!-- Mood Badge -->
        <div class=\"motivation-mood-badge mood-";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 25, $this->source); })()), "moodMotiv", [], "any", false, false, false, 25), "html", null, true);
        yield "\">
            ";
        // line 26
        $context["emoji_map"] = ["motivated" => "smile", "happy" => "laughing", "sad" => "slightly-frowning", "stressed" => "expressionless", "tired" => "sleepy", "determined" => "sunglasses", "optimistic" => "grin"];
        // line 35
        yield "            <i class=\"bi bi-emoji-";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["emoji_map"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 35, $this->source); })()), "moodMotiv", [], "any", false, false, false, 35), [], "array", true, true, false, 35) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 35, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 35, $this->source); })()), "moodMotiv", [], "any", false, false, false, 35), [], "array", false, false, false, 35)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 35, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 35, $this->source); })()), "moodMotiv", [], "any", false, false, false, 35), [], "array", false, false, false, 35), "html", null, true)) : ("smile"));
        yield "\"></i>
            ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 36, $this->source); })()), "moodMotiv", [], "any", false, false, false, 36)), "html", null, true);
        yield "
        </div>

        <!-- Title -->
        <h1 class=\"motivation-show-title\">
            <i class=\"bi bi-quote\"></i> ";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 41, $this->source); })()), "titleMotiv", [], "any", false, false, false, 41), "html", null, true);
        yield "
        </h1>

        <!-- Image -->
        ";
        // line 45
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 45, $this->source); })()), "imageMotiv", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 46
            yield "        <div class=\"motivation-show-image-container\">
            <img src=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/motivation/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 47, $this->source); })()), "imageMotiv", [], "any", false, false, false, 47))), "html", null, true);
            yield "\" 
                 alt=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 48, $this->source); })()), "titleMotiv", [], "any", false, false, false, 48), "html", null, true);
            yield "\" 
                 class=\"motivation-show-image\">
        </div>
        ";
        } else {
            // line 52
            yield "        <div class=\"motivation-show-image-placeholder\">
            <i class=\"bi bi-chat-heart-fill\"></i>
            <span>Pas d'image</span>
        </div>
        ";
        }
        // line 57
        yield "
        <!-- Description -->
        <div class=\"motivation-show-description\">
            <h3><i class=\"bi bi-chat-text\"></i> Description</h3>
            <p>";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 61, $this->source); })()), "descriptionMotiv", [], "any", false, false, false, 61), "html", null, true);
        yield "</p>
        </div>

        <!-- Details Grid -->
        <div class=\"motivation-details-grid\">
            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-calendar\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>Créé le</h4>
                    <p>";
        // line 72
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 72, $this->source); })()), "createdAt", [], "any", false, false, false, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 72, $this->source); })()), "createdAt", [], "any", false, false, false, 72), "d/m/Y"), "html", null, true)) : ("Date non disponible"));
        yield "</p>
                </div>
            </div>

            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-heart\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>Humeur</h4>
                    <p class=\"mood-";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 82, $this->source); })()), "moodMotiv", [], "any", false, false, false, 82), "html", null, true);
        yield "\">
                        ";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 83, $this->source); })()), "moodMotiv", [], "any", false, false, false, 83)), "html", null, true);
        yield "
                    </p>
                </div>
            </div>

            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-tag\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>ID</h4>
                    <p>#";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 94, $this->source); })()), "id", [], "any", false, false, false, 94), "html", null, true);
        yield "</p>
                </div>
            </div>
        </div>

        <!-- Share & Actions -->
        <div class=\"motivation-actions-show\">
            <button class=\"action-btn share-btn\" onclick=\"shareMotivation()\">
                <i class=\"bi bi-share\"></i> Partager
            </button>
            <button class=\"action-btn save-btn\" onclick=\"saveMotivation()\">
                <i class=\"bi bi-bookmark\"></i> Sauvegarder
            </button>
            ";
        // line 107
        if ((($tmp =  !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 108
            yield "            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_by_mood", ["mood" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 108, $this->source); })()), "moodMotiv", [], "any", false, false, false, 108)]), "html", null, true);
            yield "\" class=\"action-btn similar-btn\">
                <i class=\"bi bi-filter\"></i> Voir similaire
            </a>
            ";
        }
        // line 112
        yield "        </div>

        <!-- Celebration Section (if mood is happy/optimistic/motivated) -->
        ";
        // line 115
        if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 115, $this->source); })()), "moodMotiv", [], "any", false, false, false, 115), ["happy", "optimistic", "motivated"])) {
            // line 116
            yield "        <div class=\"celebration-section\">
            <h3><i class=\"bi bi-stars\"></i> Moment de célébration !</h3>
            <p>Cette motivation positive mérite d'être célébrée !</p>
            
            <!-- Mini Palestinian Flag -->
            <div class=\"mini-palestine-flag\">
                <div class=\"mini-flag-top\"></div>
                <div class=\"mini-flag-middle\">
                    <div class=\"mini-triangle\"></div>
                </div>
                <div class=\"mini-flag-bottom\"></div>
            </div>
            
            <p class=\"celebration-quote\">
                <strong>\"Et n'oubliez pas, notre objectif principal est de libérer GAZA !\"</strong>
            </p>
            
            <button class=\"celebrate-mini-btn\" onclick=\"playMiniCelebration()\">
                <i class=\"bi bi-fire\"></i> Célébrer cette motivation
            </button>
        </div>
        ";
        }
        // line 138
        yield "
        <!-- Related Motivations -->
        ";
        // line 140
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["relatedMotivations"]) || array_key_exists("relatedMotivations", $context) ? $context["relatedMotivations"] : (function () { throw new RuntimeError('Variable "relatedMotivations" does not exist.', 140, $this->source); })())) > 0)) {
            // line 141
            yield "        <div class=\"related-motivations\">
            <h3><i class=\"bi bi-collection\"></i> Motivations similaires</h3>
            <div class=\"related-grid\">
                ";
            // line 144
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["relatedMotivations"]) || array_key_exists("relatedMotivations", $context) ? $context["relatedMotivations"] : (function () { throw new RuntimeError('Variable "relatedMotivations" does not exist.', 144, $this->source); })()), 0, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["related"]) {
                // line 145
                yield "                <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_motivation_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["related"], "id", [], "any", false, false, false, 145)]), "html", null, true);
                yield "\" class=\"related-card\">
                    <div class=\"related-mood mood-";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "moodMotiv", [], "any", false, false, false, 146), "html", null, true);
                yield "\">
                        <i class=\"bi bi-emoji-";
                // line 147
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["emoji_map"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["related"], "moodMotiv", [], "any", false, false, false, 147), [], "array", true, true, false, 147) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 147, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["related"], "moodMotiv", [], "any", false, false, false, 147), [], "array", false, false, false, 147)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["emoji_map"]) || array_key_exists("emoji_map", $context) ? $context["emoji_map"] : (function () { throw new RuntimeError('Variable "emoji_map" does not exist.', 147, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["related"], "moodMotiv", [], "any", false, false, false, 147), [], "array", false, false, false, 147), "html", null, true)) : ("smile"));
                yield "\"></i>
                    </div>
                    <h4>";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["related"], "titleMotiv", [], "any", false, false, false, 149), 0, 30), "html", null, true);
                yield "...</h4>
                </a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['related'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            yield "            </div>
        </div>
        ";
        }
        // line 155
        yield "    </div>
</div>

<!-- Celebration Modal -->
<div id=\"celebrationModal\" class=\"celebration-modal\" style=\"display: none;\">
    <div class=\"modal-content\">
        <h2 class=\"modal-title\">&#127881; Motivation Positive ! &#127881;</h2>
        <p class=\"modal-message\">
            \"";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 163, $this->source); })()), "titleMotiv", [], "any", false, false, false, 163), "html", null, true);
        yield "\"
        </p>
        <p class=\"modal-quote\">
            Cette motivation vous inspire à continuer vers vos objectifs !
            <br>
            <strong>Et rappelez-vous, notre combat continue pour une Palestine libre !</strong>
        </p>
        
        <!-- Palestinian Flag -->
        <div class=\"modal-flag\">
            <div class=\"flag-top\"></div>
            <div class=\"flag-middle\">
                <div class=\"flag-triangle\"></div>
            </div>
            <div class=\"flag-bottom\"></div>
        </div>
        
        <button class=\"modal-close-btn\" onclick=\"closeModal()\">
            &#127477;&#127480; Continuer le combat ! &#127477;&#127480;
        </button>
    </div>
</div>

<!-- JavaScript -->
<script>
function shareMotivation() {
    if (navigator.share) {
        navigator.share({
            title: 'Motivation: ";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 191, $this->source); })()), "titleMotiv", [], "any", false, false, false, 191), "html", null, true);
        yield "',
            text: '";
        // line 192
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 192, $this->source); })()), "descriptionMotiv", [], "any", false, false, false, 192), 0, 100), "html", null, true);
        yield "...',
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        alert('Lien copié dans le presse-papier !');
    }
}

function saveMotivation() {
    // Save to localStorage or send to backend
    const savedMotivations = JSON.parse(localStorage.getItem('savedMotivations') || '[]');
    const motivationData = {
        id: ";
        // line 206
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 206, $this->source); })()), "id", [], "any", false, false, false, 206), "html", null, true);
        yield ",
        title: '";
        // line 207
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 207, $this->source); })()), "titleMotiv", [], "any", false, false, false, 207), "html", null, true);
        yield "',
        mood: '";
        // line 208
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["motivation"]) || array_key_exists("motivation", $context) ? $context["motivation"] : (function () { throw new RuntimeError('Variable "motivation" does not exist.', 208, $this->source); })()), "moodMotiv", [], "any", false, false, false, 208), "html", null, true);
        yield "',
        savedAt: new Date().toISOString()
    };
    
    if (!savedMotivations.find(m => m.id === motivationData.id)) {
        savedMotivations.push(motivationData);
        localStorage.setItem('savedMotivations', JSON.stringify(savedMotivations));
        
        // Show feedback
        const btn = document.querySelector('.save-btn');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class=\"bi bi-check-circle\"></i> Sauvegardé !';
        btn.style.background = '#10b981';
        
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.background = '';
        }, 2000);
    } else {
        alert('Cette motivation est déjà sauvegardée !');
    }
}

function playMiniCelebration() {
    const modal = document.getElementById('celebrationModal');
    modal.style.display = 'flex';
    
    // Play celebration sound
    playCelebrationSound();
    
    // Auto-close after 8 seconds
    setTimeout(closeModal, 8000);
}

function closeModal() {
    const modal = document.getElementById('celebrationModal');
    modal.style.display = 'none';
}

function playCelebrationSound() {
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const notes = [523.25, 659.25, 783.99, 1046.50];
        
        notes.forEach((frequency, index) => {
            setTimeout(() => {
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();
                
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                oscillator.frequency.value = frequency;
                oscillator.type = 'sine';
                
                gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                
                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.3);
            }, index * 100);
        });
    } catch (e) {
        console.log(\"Audio context not supported\");
    }
}
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
        return "motivation/show.html.twig";
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
        return array (  406 => 208,  402 => 207,  398 => 206,  381 => 192,  377 => 191,  346 => 163,  336 => 155,  331 => 152,  322 => 149,  317 => 147,  313 => 146,  308 => 145,  304 => 144,  299 => 141,  297 => 140,  293 => 138,  269 => 116,  267 => 115,  262 => 112,  254 => 108,  252 => 107,  236 => 94,  222 => 83,  218 => 82,  205 => 72,  191 => 61,  185 => 57,  178 => 52,  171 => 48,  167 => 47,  164 => 46,  162 => 45,  155 => 41,  147 => 36,  142 => 35,  140 => 26,  136 => 25,  129 => 20,  123 => 17,  117 => 14,  114 => 13,  112 => 12,  106 => 9,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{% extends 'theme/base.html.twig' %}

{% block title %}{{ motivation.titleMotiv }} - Motivation{% endblock %}

{% block body %}
<div class=\"motivation-show-container\">
    <!-- Navigation Header -->
    <div class=\"show-navigation\">
        <a href=\"{{ path('app_motivation_index') }}\" class=\"back-btn\">
            <i class=\"bi bi-arrow-left\"></i> Retour à la liste
        </a>
        {% if not is_granted('ROLE_ADMIN') %}
        <div class=\"action-buttons\">
            <a href=\"{{ path('app_motivation_edit', {'id': motivation.id}) }}\" class=\"edit-btn\">
                <i class=\"bi bi-pencil\"></i> Modifier
            </a>
            {{ include('motivation/_delete_form.html.twig') }}
        </div>
        {% endif %}
    </div>

    <!-- Main Content -->
    <div class=\"motivation-show-card\">
        <!-- Mood Badge -->
        <div class=\"motivation-mood-badge mood-{{ motivation.moodMotiv }}\">
            {% set emoji_map = {
                'motivated': 'smile',
                'happy': 'laughing', 
                'sad': 'slightly-frowning',
                'stressed': 'expressionless',
                'tired': 'sleepy',
                'determined': 'sunglasses',
                'optimistic': 'grin'
            } %}
            <i class=\"bi bi-emoji-{{ emoji_map[motivation.moodMotiv] ?? 'smile' }}\"></i>
            {{ motivation.moodMotiv|capitalize }}
        </div>

        <!-- Title -->
        <h1 class=\"motivation-show-title\">
            <i class=\"bi bi-quote\"></i> {{ motivation.titleMotiv }}
        </h1>

        <!-- Image -->
        {% if motivation.imageMotiv %}
        <div class=\"motivation-show-image-container\">
            <img src=\"{{ asset('uploads/motivation/' ~ motivation.imageMotiv) }}\" 
                 alt=\"{{ motivation.titleMotiv }}\" 
                 class=\"motivation-show-image\">
        </div>
        {% else %}
        <div class=\"motivation-show-image-placeholder\">
            <i class=\"bi bi-chat-heart-fill\"></i>
            <span>Pas d'image</span>
        </div>
        {% endif %}

        <!-- Description -->
        <div class=\"motivation-show-description\">
            <h3><i class=\"bi bi-chat-text\"></i> Description</h3>
            <p>{{ motivation.descriptionMotiv }}</p>
        </div>

        <!-- Details Grid -->
        <div class=\"motivation-details-grid\">
            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-calendar\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>Créé le</h4>
                    <p>{{ motivation.createdAt ? motivation.createdAt|date('d/m/Y') : 'Date non disponible' }}</p>
                </div>
            </div>

            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-heart\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>Humeur</h4>
                    <p class=\"mood-{{ motivation.moodMotiv }}\">
                        {{ motivation.moodMotiv|capitalize }}
                    </p>
                </div>
            </div>

            <div class=\"detail-card\">
                <div class=\"detail-icon\">
                    <i class=\"bi bi-tag\"></i>
                </div>
                <div class=\"detail-content\">
                    <h4>ID</h4>
                    <p>#{{ motivation.id }}</p>
                </div>
            </div>
        </div>

        <!-- Share & Actions -->
        <div class=\"motivation-actions-show\">
            <button class=\"action-btn share-btn\" onclick=\"shareMotivation()\">
                <i class=\"bi bi-share\"></i> Partager
            </button>
            <button class=\"action-btn save-btn\" onclick=\"saveMotivation()\">
                <i class=\"bi bi-bookmark\"></i> Sauvegarder
            </button>
            {% if not is_granted('ROLE_ADMIN') %}
            <a href=\"{{ path('app_motivation_by_mood', {'mood': motivation.moodMotiv}) }}\" class=\"action-btn similar-btn\">
                <i class=\"bi bi-filter\"></i> Voir similaire
            </a>
            {% endif %}
        </div>

        <!-- Celebration Section (if mood is happy/optimistic/motivated) -->
        {% if motivation.moodMotiv in ['happy', 'optimistic', 'motivated'] %}
        <div class=\"celebration-section\">
            <h3><i class=\"bi bi-stars\"></i> Moment de célébration !</h3>
            <p>Cette motivation positive mérite d'être célébrée !</p>
            
            <!-- Mini Palestinian Flag -->
            <div class=\"mini-palestine-flag\">
                <div class=\"mini-flag-top\"></div>
                <div class=\"mini-flag-middle\">
                    <div class=\"mini-triangle\"></div>
                </div>
                <div class=\"mini-flag-bottom\"></div>
            </div>
            
            <p class=\"celebration-quote\">
                <strong>\"Et n'oubliez pas, notre objectif principal est de libérer GAZA !\"</strong>
            </p>
            
            <button class=\"celebrate-mini-btn\" onclick=\"playMiniCelebration()\">
                <i class=\"bi bi-fire\"></i> Célébrer cette motivation
            </button>
        </div>
        {% endif %}

        <!-- Related Motivations -->
        {% if relatedMotivations|length > 0 %}
        <div class=\"related-motivations\">
            <h3><i class=\"bi bi-collection\"></i> Motivations similaires</h3>
            <div class=\"related-grid\">
                {% for related in relatedMotivations|slice(0, 3) %}
                <a href=\"{{ path('app_motivation_show', {'id': related.id}) }}\" class=\"related-card\">
                    <div class=\"related-mood mood-{{ related.moodMotiv }}\">
                        <i class=\"bi bi-emoji-{{ emoji_map[related.moodMotiv] ?? 'smile' }}\"></i>
                    </div>
                    <h4>{{ related.titleMotiv|slice(0, 30) }}...</h4>
                </a>
                {% endfor %}
            </div>
        </div>
        {% endif %}
    </div>
</div>

<!-- Celebration Modal -->
<div id=\"celebrationModal\" class=\"celebration-modal\" style=\"display: none;\">
    <div class=\"modal-content\">
        <h2 class=\"modal-title\">&#127881; Motivation Positive ! &#127881;</h2>
        <p class=\"modal-message\">
            \"{{ motivation.titleMotiv }}\"
        </p>
        <p class=\"modal-quote\">
            Cette motivation vous inspire à continuer vers vos objectifs !
            <br>
            <strong>Et rappelez-vous, notre combat continue pour une Palestine libre !</strong>
        </p>
        
        <!-- Palestinian Flag -->
        <div class=\"modal-flag\">
            <div class=\"flag-top\"></div>
            <div class=\"flag-middle\">
                <div class=\"flag-triangle\"></div>
            </div>
            <div class=\"flag-bottom\"></div>
        </div>
        
        <button class=\"modal-close-btn\" onclick=\"closeModal()\">
            &#127477;&#127480; Continuer le combat ! &#127477;&#127480;
        </button>
    </div>
</div>

<!-- JavaScript -->
<script>
function shareMotivation() {
    if (navigator.share) {
        navigator.share({
            title: 'Motivation: {{ motivation.titleMotiv }}',
            text: '{{ motivation.descriptionMotiv|slice(0, 100) }}...',
            url: window.location.href
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        alert('Lien copié dans le presse-papier !');
    }
}

function saveMotivation() {
    // Save to localStorage or send to backend
    const savedMotivations = JSON.parse(localStorage.getItem('savedMotivations') || '[]');
    const motivationData = {
        id: {{ motivation.id }},
        title: '{{ motivation.titleMotiv }}',
        mood: '{{ motivation.moodMotiv }}',
        savedAt: new Date().toISOString()
    };
    
    if (!savedMotivations.find(m => m.id === motivationData.id)) {
        savedMotivations.push(motivationData);
        localStorage.setItem('savedMotivations', JSON.stringify(savedMotivations));
        
        // Show feedback
        const btn = document.querySelector('.save-btn');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<i class=\"bi bi-check-circle\"></i> Sauvegardé !';
        btn.style.background = '#10b981';
        
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.background = '';
        }, 2000);
    } else {
        alert('Cette motivation est déjà sauvegardée !');
    }
}

function playMiniCelebration() {
    const modal = document.getElementById('celebrationModal');
    modal.style.display = 'flex';
    
    // Play celebration sound
    playCelebrationSound();
    
    // Auto-close after 8 seconds
    setTimeout(closeModal, 8000);
}

function closeModal() {
    const modal = document.getElementById('celebrationModal');
    modal.style.display = 'none';
}

function playCelebrationSound() {
    try {
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const notes = [523.25, 659.25, 783.99, 1046.50];
        
        notes.forEach((frequency, index) => {
            setTimeout(() => {
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();
                
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                oscillator.frequency.value = frequency;
                oscillator.type = 'sine';
                
                gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
                
                oscillator.start(audioContext.currentTime);
                oscillator.stop(audioContext.currentTime + 0.3);
            }, index * 100);
        });
    } catch (e) {
        console.log(\"Audio context not supported\");
    }
}
</script>
{% endblock %}

", "motivation/show.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\motivation\\show.html.twig");
    }
}
