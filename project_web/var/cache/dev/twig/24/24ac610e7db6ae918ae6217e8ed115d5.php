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

/* home/index.html.twig */
class __TwigTemplate_161b68166186c594b75752fe114afc4c extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\">
<head>
  <meta charset=\"UTF-8\" />
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
  <title>NEXA – Gestion Intelligente des Tâches Quotidiennes</title>

  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>
  <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">

  <style>
    :root { --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

    
    [data-theme=\"dark\"] {
      --bg: #0f172a;
      --surface: #1e293b;
      --surface-rgb: 30, 41, 59;
      --text: #e2e8f0;
      --muted: #94a3b8;
      --border: rgba(159,122,234,0.12);
      --primary: #5b5cf0;
      --accent: #9f7aea;
      --gradient: linear-gradient(135deg, #5b5cf0 0%, #9f7aea 100%);
      --shadow-sm: 0 4px 12px rgba(0,0,0,0.35);
      --shadow-md: 0 12px 32px rgba(91,92,240,0.30);
      --shadow-lg: 0 22px 70px rgba(0,0,0,0.35);
    }

    [data-theme=\"light\"] {
      --bg: #f8fafc;
      --surface: #ffffff;
      --surface-rgb: 255, 255, 255;
      --text: #0f172a;
      --muted: #64748b;
      --border: rgba(91,92,240,0.12);
      --primary: #4f46e5;
      --accent: #7c3aed;
      --gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      --shadow-sm: 0 4px 16px rgba(0,0,0,0.08);
      --shadow-md: 0 12px 40px rgba(91,92,240,0.15);
      --shadow-lg: 0 20px 60px rgba(0,0,0,0.12);
    }

    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
      transition: background 0.5s ease, color 0.5s ease;
      overflow-x: hidden;
    }

    /* HEADER */
    header {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: 80px;
      background: rgba(var(--surface-rgb), 0.78);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 6%;
      z-index: 1000;
      transition: var(--transition);
    }

    .logo {
      font-size: 2.1rem;
      font-weight: 800;
      letter-spacing: 0.5px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    nav a {
      color: var(--muted);
      text-decoration: none;
      margin: 0 18px;
      font-weight: 600;
      transition: var(--transition);
    }
    nav a:hover { color: var(--primary); }

    .theme-toggle {
      background: none;
      border: none;
      color: var(--muted);
      font-size: 1.35rem;
      cursor: pointer;
      transition: var(--transition);
    }
    .theme-toggle:hover { color: var(--primary); transform: rotate(15deg); }

    /* GLOBAL ANIMATIONS */
    .hero, .features, .pricing, .flow-section, .cta-final {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .hero.visible, .features.visible, .pricing.visible, .flow-section.visible, .cta-final.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* HERO */
    .hero {
      padding: 180px 6% 140px;
      text-align: center;
    }
    .hero h1 {
      font-size: clamp(2.8rem, 5vw, 4.8rem);
      font-weight: 800;
      line-height: 1.05;
      margin: 0 0 22px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: pulse-text 10s infinite alternate;
    }
    @keyframes pulse-text {
      0%, 100% { text-shadow: 0 0 20px rgba(159,122,234, 0.22); }
      50% { text-shadow: 0 0 42px rgba(159,122,234, 0.40); }
    }
    .hero p {
      font-size: 1.25rem;
      color: var(--muted);
      max-width: 860px;
      margin: 0 auto 46px;
    }
    .hero-ctas {
      display: flex;
      justify-content: center;
      gap: 18px;
      flex-wrap: wrap;
    }

    /* BUTTONS */
    .cta-primary, .cta-secondary {
      padding: 12px 32px;
      border-radius: 999px;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition);
      font-size: 1rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
    }
    .cta-primary {
      background: var(--gradient);
      color: white;
      border: none;
      box-shadow: 0 8px 28px rgba(91,92,240, 0.25);
    }
    .cta-primary:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 16px 50px rgba(91,92,240, 0.38);
    }
    .cta-secondary {
      background: transparent;
      border: 1px solid var(--accent);
      color: var(--accent);
    }
    .cta-secondary:hover {
      background: var(--accent);
      color: white;
      box-shadow: 0 0 30px rgba(159,122,234,0.35);
    }

    
    .section-title {
      font-size: clamp(2.2rem, 3.5vw, 3.6rem);
      font-weight: 800;
      margin: 0 0 14px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
      letter-spacing: -0.5px;
    }
    .section-subtitle {
      font-size: 1.15rem;
      color: var(--muted);
      max-width: 820px;
      margin: 0 auto 60px;
      text-align: center;
    }

    /* FEATURES */
    .features {
      background: rgba(var(--surface-rgb), 0.55);
      padding: 120px 6%;
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(10px);
    }
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 34px;
      max-width: 1400px;
      margin: 0 auto;
    }
    .feature-card {
      background: rgba(var(--surface-rgb), 0.55);
      border-radius: 20px;
      padding: 34px 30px;
      border: 1px solid var(--border);
      transition: var(--transition);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-sm);
    }
    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-md);
      border-color: rgba(159,122,234,0.35);
    }
    .feature-icon {
      font-size: 2.9rem;
      color: var(--accent);
      margin-bottom: 18px;
      transition: var(--transition);
    }
    .feature-card:hover .feature-icon { transform: scale(1.12) rotate(4deg); }
    .feature-title {
      font-weight: 800;
      font-size: 1.25rem;
      margin: 0 0 8px;
    }
    .feature-card p { margin: 0; color: var(--muted); }

    /*  PRICING / PACKS */
    .pricing {
      padding: 120px 6%;
    }
    .pricing-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 26px;
      align-items: stretch;
    }

    .plan-card {
      position: relative;
      background: rgba(var(--surface-rgb), 0.55);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 34px 30px;
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      overflow: hidden;
    }
    .plan-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-lg);
      border-color: rgba(159,122,234,0.35);
    }
    .plan-badge {
      position: absolute;
      top: 18px;
      right: 18px;
      padding: 8px 14px;
      border-radius: 999px;
      font-weight: 800;
      font-size: 0.85rem;
      color: white;
      background: var(--gradient);
      box-shadow: 0 10px 28px rgba(91,92,240,0.25);
    }
    .plan-name {
      font-size: 1.25rem;
      font-weight: 900;
      margin: 0 0 6px;
      letter-spacing: -0.2px;
    }
    .plan-desc {
      margin: 0 0 18px;
      color: var(--muted);
    }
    .plan-price {
      display: flex;
      align-items: baseline;
      gap: 8px;
      margin: 18px 0 20px;
    }
    .plan-price .value {
      font-size: 2.6rem;
      font-weight: 900;
      letter-spacing: -1px;
    }
    .plan-price .unit {
      color: var(--muted);
      font-weight: 700;
    }
    .plan-cta {
      width: 100%;
      padding: 14px 18px;
      border-radius: 999px;
      font-weight: 900;
      cursor: pointer;
      transition: var(--transition);
      border: 1px solid rgba(159,122,234,0.30);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
    }
    .plan-cta:hover { transform: translateY(-2px); border-color: rgba(159,122,234,0.55); }

    .plan-cta.primary {
      border: none;
      background: var(--gradient);
      color: white;
      box-shadow: 0 12px 34px rgba(91,92,240,0.22);
    }
    .plan-cta.primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 55px rgba(91,92,240,0.35);
    }

    .plan-features {
      margin: 18px 0 0;
      padding: 0;
      list-style: none;
      display: grid;
      gap: 10px;
    }
    .plan-features li {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      color: var(--muted);
      font-weight: 600;
    }
    .plan-features i {
      color: rgba(16,185,129, 0.95);
      margin-top: 4px;
    }

    /*  SECTION PRO */
    .flow-section {
      padding: 120px 6%;
      background: rgba(var(--surface-rgb), 0.45);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(10px);
    }

    .flow-slider-wrapper {
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
      border-radius: 26px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-md);
      background: rgba(var(--surface-rgb), 0.55);
      backdrop-filter: blur(12px);
    }

    .flow-header {
      display: flex;
      justify-content: space-between;
      gap: 14px;
      padding: 20px 22px;
      border-bottom: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
    }
    .flow-kpis {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }
    .flow-kpi {
      padding: 10px 14px;
      border: 1px solid var(--border);
      border-radius: 14px;
      background: rgba(var(--surface-rgb), 0.40);
      display: flex;
      gap: 10px;
      align-items: center;
      min-width: 160px;
    }
    .kpi-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 14px rgba(159,122,234,0.55);
    }
    .kpi-value {
      font-weight: 900;
      font-size: 1.1rem;
      line-height: 1;
    }
    .kpi-label {
      color: var(--muted);
      font-weight: 700;
      font-size: 0.9rem;
    }

    .flow-actions {
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }
    .flow-action-btn {
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
      padding: 10px 12px;
      border-radius: 12px;
      cursor: pointer;
      transition: var(--transition);
      font-weight: 800;
    }
    .flow-action-btn:hover {
      transform: translateY(-2px);
      border-color: rgba(159,122,234,0.40);
      box-shadow: 0 14px 40px rgba(0,0,0,0.12);
    }

    .flow-slider {
      display: flex;
      transition: transform 0.85s cubic-bezier(0.4, 0, 0.2, 1);
      width: 300%;
    }

    .flow-slide {
      flex: 0 0 33.333%;
      padding: 42px 28px 68px;
    }

    .task-card {
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.45);
      border-radius: 22px;
      padding: 26px 24px;
      box-shadow: var(--shadow-sm);
      position: relative;
      overflow: hidden;
    }
    .task-card:before {
      content: \"\";
      position: absolute;
      inset: 0;
      background: radial-gradient(800px 220px at 10% 0%, rgba(159,122,234,0.18), transparent 60%);
      pointer-events: none;
    }

    .task-top {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      align-items: flex-start;
      position: relative;
    }

    .task-title {
      font-size: 1.35rem;
      font-weight: 900;
      margin: 0;
      letter-spacing: -0.4px;
    }
    .task-meta {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      color: var(--muted);
      font-weight: 700;
      font-size: 0.95rem;
      position: relative;
    }
    .meta-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.30);
    }

    .status-pill {
      padding: 10px 14px;
      border-radius: 999px;
      font-weight: 900;
      font-size: 0.9rem;
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
      white-space: nowrap;
      position: relative;
    }
    .status-pill.live { border-color: rgba(91,92,240,0.35); box-shadow: 0 0 24px rgba(91,92,240,0.18); }
    .status-pill.scheduled { border-color: rgba(159,122,234,0.35); box-shadow: 0 0 24px rgba(159,122,234,0.18); }
    .status-pill.future { border-color: rgba(16,185,129,0.35); box-shadow: 0 0 24px rgba(16,185,129,0.14); }

    .task-desc {
      margin: 16px 0 18px;
      color: var(--muted);
      font-weight: 600;
      position: relative;
    }

    .task-bottom {
      display: flex;
      justify-content: space-between;
      gap: 14px;
      align-items: center;
      flex-wrap: wrap;
      position: relative;
    }

    .progress-wrap {
      flex: 1;
      min-width: 220px;
    }
    .progress-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
      color: var(--muted);
      font-weight: 800;
      font-size: 0.9rem;
    }
    .progress-bar {
      height: 10px;
      border-radius: 999px;
      background: rgba(148,163,184,0.18);
      overflow: hidden;
      border: 1px solid var(--border);
    }
    .progress-fill {
      height: 100%;
      border-radius: 999px;
      background: var(--gradient);
      width: 40%;
      transition: width 0.6s ease;
    }

    .assignees {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .avatars {
      display: flex;
      align-items: center;
    }
    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 2px solid rgba(var(--surface-rgb), 0.9);
      background: rgba(var(--surface-rgb), 0.45);
      display: grid;
      place-items: center;
      font-weight: 900;
      color: var(--text);
      margin-left: -10px;
      box-shadow: 0 10px 22px rgba(0,0,0,0.18);
    }
    .avatar:first-child { margin-left: 0; }
    .assignees-label { color: var(--muted); font-weight: 800; font-size: 0.95rem; }

    .slider-controls {
      position: absolute;
      bottom: 18px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 12px;
      z-index: 5;
    }
    .slider-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: rgba(148,163,184,0.55);
      cursor: pointer;
      transition: var(--transition);
    }
    .slider-dot.active {
      background: var(--accent);
      transform: scale(1.55);
      box-shadow: 0 0 14px rgba(159,122,234,0.65);
    }

    .slider-arrows {
      position: absolute;
      top: 55%;
      left: 0; right: 0;
      transform: translateY(-50%);
      display: flex;
      justify-content: space-between;
      padding: 0 18px;
      pointer-events: none;
      z-index: 6;
    }
    .arrow-btn {
      background: rgba(var(--surface-rgb), 0.45);
      border: 1px solid var(--border);
      color: var(--text);
      width: 46px;
      height: 46px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.1rem;
      transition: var(--transition);
      backdrop-filter: blur(10px);
      pointer-events: auto;
      display: grid;
      place-items: center;
      box-shadow: 0 12px 28px rgba(0,0,0,0.14);
    }
    .arrow-btn:hover {
      background: rgba(159,122,234,0.20);
      border-color: rgba(159,122,234,0.45);
      transform: scale(1.08);
    }

    
    .cta-final {
      padding: 140px 6%;
      text-align: center;
      background: var(--gradient);
      color: white;
    }
    .cta-final h2 { font-size: clamp(2.2rem, 4vw, 3.8rem); margin: 0 0 18px; }
    .cta-final p { max-width: 820px; margin: 0 auto; font-weight: 600; opacity: 0.95; }

    
    footer {
      padding: 80px 6% 40px;
      background: #0a0e1f;
      border-top: 1px solid var(--border);
      text-align: center;
      color: rgba(148,163,184,0.95);
    }
    .footer-links {
      margin: 24px 0 40px;
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .footer-links a {
      color: rgba(148,163,184,0.9);
      text-decoration: none;
      transition: color 0.3s;
      font-weight: 700;
    }
    .footer-links a:hover { color: white; }

  
    @media (max-width: 820px) {
      nav { display: none; }
      header { padding: 0 5%; }
      .flow-header { flex-direction: column; align-items: stretch; }
      .flow-actions { justify-content: flex-start; }
      .flow-slide { padding: 26px 16px 70px; }
    }
  </style>
</head>

<body>

  <header>
    <div class=\"logo\">NEXA</div>
    <nav>
      <a href=\"#features\">Fonctionnalités</a>
      <a href=\"#packs\">Tarifs</a>
      <a href=\"#flux\">Flux</a>
      <a href=\"";
        // line 686
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_index");
        yield "\">Produit</a>
      <a href=\"";
        // line 687
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Connexion</a>
    </nav>
    <div style=\"display:flex; align-items:center; gap:18px;\">
      <button class=\"theme-toggle\" id=\"themeToggle\" title=\"Changer de thème\">
        <i class=\"fas fa-moon\"></i>
      </button>
      <a class=\"cta-primary\" href=\"";
        // line 693
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Commencer gratuitement</a>
    </div>
  </header>

  <section class=\"hero\">
    <h1>Maîtrisez votre quotidien avec intelligence</h1>
    <p>NEXA transforme vos tâches en un flux fluide, visuel et motivant. Priorisez ce qui compte, anticipez l’avenir, et concentrez votre énergie sur l’essentiel.</p>
    <div class=\"hero-ctas\">
      <a class=\"cta-primary\" href=\"";
        // line 701
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">Essayer gratuitement</a>
      <a class=\"cta-secondary\" href=\"#flux\">Decouvrir la demo</a>
    </div>
  </section>

  <section class=\"features\" id=\"features\">
    <h2 class=\"section-title\">Pourquoi NEXA ?</h2>
    <p class=\"section-subtitle\">Une expérience premium : rapide, claire, sécurisée — pensée pour le quotidien et la performance.</p>

    <div class=\"features-grid\">
      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-stream\"></i></div>
        <div class=\"feature-title\">Flux Horizon</div>
        <p>Visualisez vos tâches sur une timeline élégante qui s’adapte à votre rythme.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-brain\"></i></div>
        <div class=\"feature-title\">Intelligence contextuelle</div>
        <p>Suggestions pertinentes, priorisation automatique et rappels intelligents.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-sync\"></i></div>
        <div class=\"feature-title\">Synchronisation universelle</div>
        <p>Web, mobile, desktop – vos données à jour, partout, en temps réel.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-shield-alt\"></i></div>
        <div class=\"feature-title\">Sécurité & Confidentialité</div>
        <p>Chiffrement, zéro tracking, conformité RGPD, contrôle total des accès.</p>
      </div>
    </div>
  </section>

  <!-- ✅ PACKS / TARIFS -->
  <section class=\"pricing\" id=\"packs\">
    <h2 class=\"section-title\">Packs adaptés à votre rythme</h2>
    <p class=\"section-subtitle\">
      Commencez gratuitement, puis évoluez quand votre équipe (ou vos projets) grandissent.
    </p>

    <div class=\"pricing-grid\">
      <div class=\"plan-card\">
        <div class=\"plan-name\">Starter</div>
        <p class=\"plan-desc\">Pour organiser votre quotidien sans effort.</p>

        <div class=\"plan-price\">
          <div class=\"value\">0</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta\">Démarrer gratuitement</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Liste + calendrier</li>
          <li><i class=\"fas fa-check-circle\"></i> Rappels basiques</li>
          <li><i class=\"fas fa-check-circle\"></i> 1 espace de travail</li>
          <li><i class=\"fas fa-check-circle\"></i> Support standard</li>
        </ul>
      </div>

      <div class=\"plan-card\">
        <div class=\"plan-badge\">Populaire</div>
        <div class=\"plan-name\">Pro</div>
        <p class=\"plan-desc\">Pour gagner du temps avec l’IA et la priorisation.</p>

        <div class=\"plan-price\">
          <div class=\"value\">19</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta primary\">Choisir Pro</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Priorisation intelligente</li>
          <li><i class=\"fas fa-check-circle\"></i> Rappels contextuels</li>
          <li><i class=\"fas fa-check-circle\"></i> Templates & routines</li>
          <li><i class=\"fas fa-check-circle\"></i> Synchronisation multi-appareils</li>
        </ul>
      </div>

      <div class=\"plan-card\">
        <div class=\"plan-name\">Business</div>
        <p class=\"plan-desc\">Pour les équipes, la gouvernance et la sécurité avancée.</p>

        <div class=\"plan-price\">
          <div class=\"value\">49</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta\">Parler à l’équipe</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Espaces d’équipe & rôles</li>
          <li><i class=\"fas fa-check-circle\"></i> Audit & permissions</li>
          <li><i class=\"fas fa-check-circle\"></i> SLA & support prioritaire</li>
          <li><i class=\"fas fa-check-circle\"></i> Intégrations avancées</li>
        </ul>
      </div>
    </div>
  </section>

 
  <section class=\"flow-section\" id=\"flux\">
    <h2 class=\"section-title\">Votre flux, votre rythme</h2>
    <p class=\"section-subtitle\">
      Une vue claire de l’essentiel : aujourd’hui, cette semaine, et le cap long-terme — sans friction.
    </p>

    <div class=\"flow-slider-wrapper\" id=\"flowWrapper\">
      <div class=\"flow-header\">
        <div class=\"flow-kpis\">
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\"></div>
            <div>
              <div class=\"kpi-value\">8</div>
              <div class=\"kpi-label\">Tâches actives</div>
            </div>
          </div>
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\" style=\"background: rgba(91,92,240,1); box-shadow:0 0 14px rgba(91,92,240,0.55);\"></div>
            <div>
              <div class=\"kpi-value\">3</div>
              <div class=\"kpi-label\">Priorité haute</div>
            </div>
          </div>
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\" style=\"background: rgba(16,185,129,1); box-shadow:0 0 14px rgba(16,185,129,0.50);\"></div>
            <div>
              <div class=\"kpi-value\">92%</div>
              <div class=\"kpi-label\">Rythme tenu</div>
            </div>
          </div>
        </div>

        <div class=\"flow-actions\">
          <button class=\"flow-action-btn\"><i class=\"fa-solid fa-filter\"></i> Filtrer</button>
          <button class=\"flow-action-btn\"><i class=\"fa-solid fa-wand-magic-sparkles\"></i> Suggestion</button>
        </div>
      </div>

      <div class=\"flow-slider\" id=\"flowSlider\">
        
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Préparer pitch investisseur</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-calendar\"></i> Aujourd’hui</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-bolt\"></i> Focus</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-flag\"></i> Haute priorité</span>
                </div>
              </div>
              <div class=\"status-pill live\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(91,92,240,1);\"></i> En cours</div>
            </div>

            <p class=\"task-desc\">
              Structurer la story, clarifier les chiffres et préparer le deck final. Objectif : décision rapide + suivi partenaires.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Avancement</span>
                  <span>40%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:40%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">Y</div>
                  <div class=\"avatar\">A</div>
                  <div class=\"avatar\">M</div>
                </div>
                <div class=\"assignees-label\">Équipe Pitch</div>
              </div>
            </div>
          </div>
        </div>

      
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Lancement campagne marketing</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-clock\"></i> Dans 48h</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-users\"></i> Équipe alignée</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-bullseye\"></i> 10 000 leads</span>
                </div>
              </div>
              <div class=\"status-pill scheduled\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(159,122,234,1);\"></i> Prévu</div>
            </div>

            <p class=\"task-desc\">
              Vérifier les assets, valider le tracking, finaliser les audiences, et publier le calendrier multi-canaux.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Préparation</span>
                  <span>70%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:70%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">S</div>
                  <div class=\"avatar\">K</div>
                  <div class=\"avatar\">R</div>
                </div>
                <div class=\"assignees-label\">Marketing</div>
              </div>
            </div>
          </div>
        </div>

        
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Objectif annuel atteint</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-calendar-days\"></i> Dans 90 jours</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-chart-line\"></i> KPI consolidés</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-award\"></i> Cycle suivant</span>
                </div>
              </div>
              <div class=\"status-pill future\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(16,185,129,1);\"></i> À venir</div>
            </div>

            <p class=\"task-desc\">
              Roadmap finalisée, exécution stable, et rituels d’équipe prêts. Préparer la célébration + plan Q2.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Progression</span>
                  <span>15%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:15%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">C</div>
                  <div class=\"avatar\">T</div>
                </div>
                <div class=\"assignees-label\">Direction</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class=\"slider-controls\">
        <div class=\"slider-dot active\" data-index=\"0\"></div>
        <div class=\"slider-dot\" data-index=\"1\"></div>
        <div class=\"slider-dot\" data-index=\"2\"></div>
      </div>

      <div class=\"slider-arrows\">
        <button class=\"arrow-btn\" id=\"prevSlide\" aria-label=\"Précédent\"><i class=\"fas fa-chevron-left\"></i></button>
        <button class=\"arrow-btn\" id=\"nextSlide\" aria-label=\"Suivant\"><i class=\"fas fa-chevron-right\"></i></button>
      </div>
    </div>
  </section>

  <section class=\"cta-final\">
    <h2>Commencez votre flux aujourd’hui</h2>
    <p>Créez votre compte en moins de 30 secondes. Aucun moyen de paiement requis. Juste votre ambition et NEXA.</p>
    <a class=\"cta-primary\" href=\"";
        // line 981
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" style=\"background:white; color:var(--primary); padding:18px 56px; font-size:1.15rem; margin-top:36px; box-shadow:0 10px 34px rgba(0,0,0,0.22);\">
      Créer mon compte gratuit
    </a>
  </section>

  <footer>
    <div class=\"footer-links\">
      <a href=\"#\">Confidentialité</a>
      <a href=\"#\">Conditions d’utilisation</a>
      <a href=\"#\">Support</a>
      <a href=\"#\">Contact</a>
      <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
      <a href=\"#\"><i class=\"fab fa-linkedin\"></i></a>
    </div>
    <p>© 2026 NEXA – Gestion intelligente des tâches quotidiennes • Développé à Tunis, Tunisie</p>
  </footer>

  <script>

    const toggleBtn = document.getElementById('themeToggle');
    const html = document.documentElement;
    const currentTheme = localStorage.getItem('theme') || 'dark';
    html.setAttribute('data-theme', currentTheme);
    toggleBtn.innerHTML = currentTheme === 'dark'
      ? '<i class=\"fas fa-moon\"></i>'
      : '<i class=\"fas fa-sun\"></i>';

    toggleBtn.addEventListener('click', () => {
      const newTheme = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      toggleBtn.innerHTML = newTheme === 'dark'
        ? '<i class=\"fas fa-moon\"></i>'
        : '<i class=\"fas fa-sun\"></i>';
    });


    const fadeElements = document.querySelectorAll('.hero, .features, .pricing, .flow-section, .cta-final');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    fadeElements.forEach(el => observer.observe(el));

    // Slider pro
    const slider = document.getElementById('flowSlider');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    const wrapper = document.getElementById('flowWrapper');

    let currentIndex = 0;
    let interval;

    function goToSlide(index) {
      currentIndex = (index + 3) % 3;
      slider.style.transform = `translateX(-\${currentIndex * 33.333}%)`;
      dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
    }

    function startAutoSlide() { interval = setInterval(() => goToSlide(currentIndex + 1), 6500); }
    function stopAutoSlide() { clearInterval(interval); }

    dots.forEach((dot, i) => dot.addEventListener('click', () => {
      goToSlide(i);
      stopAutoSlide();
      startAutoSlide();
    }));

    prevBtn.addEventListener('click', () => { goToSlide(currentIndex - 1); stopAutoSlide(); startAutoSlide(); });
    nextBtn.addEventListener('click', () => { goToSlide(currentIndex + 1); stopAutoSlide(); startAutoSlide(); });

    wrapper.addEventListener('mouseenter', stopAutoSlide);
    wrapper.addEventListener('mouseleave', startAutoSlide);

    startAutoSlide();
  </script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/index.html.twig";
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
        return array (  1042 => 981,  759 => 701,  748 => 693,  739 => 687,  735 => 686,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\" data-theme=\"dark\">
<head>
  <meta charset=\"UTF-8\" />
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
  <title>NEXA – Gestion Intelligente des Tâches Quotidiennes</title>

  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\"/>
  <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap\" rel=\"stylesheet\">

  <style>
    :root { --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

    
    [data-theme=\"dark\"] {
      --bg: #0f172a;
      --surface: #1e293b;
      --surface-rgb: 30, 41, 59;
      --text: #e2e8f0;
      --muted: #94a3b8;
      --border: rgba(159,122,234,0.12);
      --primary: #5b5cf0;
      --accent: #9f7aea;
      --gradient: linear-gradient(135deg, #5b5cf0 0%, #9f7aea 100%);
      --shadow-sm: 0 4px 12px rgba(0,0,0,0.35);
      --shadow-md: 0 12px 32px rgba(91,92,240,0.30);
      --shadow-lg: 0 22px 70px rgba(0,0,0,0.35);
    }

    [data-theme=\"light\"] {
      --bg: #f8fafc;
      --surface: #ffffff;
      --surface-rgb: 255, 255, 255;
      --text: #0f172a;
      --muted: #64748b;
      --border: rgba(91,92,240,0.12);
      --primary: #4f46e5;
      --accent: #7c3aed;
      --gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      --shadow-sm: 0 4px 16px rgba(0,0,0,0.08);
      --shadow-md: 0 12px 40px rgba(91,92,240,0.15);
      --shadow-lg: 0 20px 60px rgba(0,0,0,0.12);
    }

    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Inter', system-ui, sans-serif;
      background: var(--bg);
      color: var(--text);
      line-height: 1.6;
      transition: background 0.5s ease, color 0.5s ease;
      overflow-x: hidden;
    }

    /* HEADER */
    header {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: 80px;
      background: rgba(var(--surface-rgb), 0.78);
      backdrop-filter: blur(18px);
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 6%;
      z-index: 1000;
      transition: var(--transition);
    }

    .logo {
      font-size: 2.1rem;
      font-weight: 800;
      letter-spacing: 0.5px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    nav a {
      color: var(--muted);
      text-decoration: none;
      margin: 0 18px;
      font-weight: 600;
      transition: var(--transition);
    }
    nav a:hover { color: var(--primary); }

    .theme-toggle {
      background: none;
      border: none;
      color: var(--muted);
      font-size: 1.35rem;
      cursor: pointer;
      transition: var(--transition);
    }
    .theme-toggle:hover { color: var(--primary); transform: rotate(15deg); }

    /* GLOBAL ANIMATIONS */
    .hero, .features, .pricing, .flow-section, .cta-final {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .hero.visible, .features.visible, .pricing.visible, .flow-section.visible, .cta-final.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* HERO */
    .hero {
      padding: 180px 6% 140px;
      text-align: center;
    }
    .hero h1 {
      font-size: clamp(2.8rem, 5vw, 4.8rem);
      font-weight: 800;
      line-height: 1.05;
      margin: 0 0 22px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: pulse-text 10s infinite alternate;
    }
    @keyframes pulse-text {
      0%, 100% { text-shadow: 0 0 20px rgba(159,122,234, 0.22); }
      50% { text-shadow: 0 0 42px rgba(159,122,234, 0.40); }
    }
    .hero p {
      font-size: 1.25rem;
      color: var(--muted);
      max-width: 860px;
      margin: 0 auto 46px;
    }
    .hero-ctas {
      display: flex;
      justify-content: center;
      gap: 18px;
      flex-wrap: wrap;
    }

    /* BUTTONS */
    .cta-primary, .cta-secondary {
      padding: 12px 32px;
      border-radius: 999px;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition);
      font-size: 1rem;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
    }
    .cta-primary {
      background: var(--gradient);
      color: white;
      border: none;
      box-shadow: 0 8px 28px rgba(91,92,240, 0.25);
    }
    .cta-primary:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 16px 50px rgba(91,92,240, 0.38);
    }
    .cta-secondary {
      background: transparent;
      border: 1px solid var(--accent);
      color: var(--accent);
    }
    .cta-secondary:hover {
      background: var(--accent);
      color: white;
      box-shadow: 0 0 30px rgba(159,122,234,0.35);
    }

    
    .section-title {
      font-size: clamp(2.2rem, 3.5vw, 3.6rem);
      font-weight: 800;
      margin: 0 0 14px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-align: center;
      letter-spacing: -0.5px;
    }
    .section-subtitle {
      font-size: 1.15rem;
      color: var(--muted);
      max-width: 820px;
      margin: 0 auto 60px;
      text-align: center;
    }

    /* FEATURES */
    .features {
      background: rgba(var(--surface-rgb), 0.55);
      padding: 120px 6%;
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(10px);
    }
    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 34px;
      max-width: 1400px;
      margin: 0 auto;
    }
    .feature-card {
      background: rgba(var(--surface-rgb), 0.55);
      border-radius: 20px;
      padding: 34px 30px;
      border: 1px solid var(--border);
      transition: var(--transition);
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-sm);
    }
    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-md);
      border-color: rgba(159,122,234,0.35);
    }
    .feature-icon {
      font-size: 2.9rem;
      color: var(--accent);
      margin-bottom: 18px;
      transition: var(--transition);
    }
    .feature-card:hover .feature-icon { transform: scale(1.12) rotate(4deg); }
    .feature-title {
      font-weight: 800;
      font-size: 1.25rem;
      margin: 0 0 8px;
    }
    .feature-card p { margin: 0; color: var(--muted); }

    /*  PRICING / PACKS */
    .pricing {
      padding: 120px 6%;
    }
    .pricing-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 26px;
      align-items: stretch;
    }

    .plan-card {
      position: relative;
      background: rgba(var(--surface-rgb), 0.55);
      border: 1px solid var(--border);
      border-radius: 24px;
      padding: 34px 30px;
      backdrop-filter: blur(10px);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      overflow: hidden;
    }
    .plan-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-lg);
      border-color: rgba(159,122,234,0.35);
    }
    .plan-badge {
      position: absolute;
      top: 18px;
      right: 18px;
      padding: 8px 14px;
      border-radius: 999px;
      font-weight: 800;
      font-size: 0.85rem;
      color: white;
      background: var(--gradient);
      box-shadow: 0 10px 28px rgba(91,92,240,0.25);
    }
    .plan-name {
      font-size: 1.25rem;
      font-weight: 900;
      margin: 0 0 6px;
      letter-spacing: -0.2px;
    }
    .plan-desc {
      margin: 0 0 18px;
      color: var(--muted);
    }
    .plan-price {
      display: flex;
      align-items: baseline;
      gap: 8px;
      margin: 18px 0 20px;
    }
    .plan-price .value {
      font-size: 2.6rem;
      font-weight: 900;
      letter-spacing: -1px;
    }
    .plan-price .unit {
      color: var(--muted);
      font-weight: 700;
    }
    .plan-cta {
      width: 100%;
      padding: 14px 18px;
      border-radius: 999px;
      font-weight: 900;
      cursor: pointer;
      transition: var(--transition);
      border: 1px solid rgba(159,122,234,0.30);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
    }
    .plan-cta:hover { transform: translateY(-2px); border-color: rgba(159,122,234,0.55); }

    .plan-cta.primary {
      border: none;
      background: var(--gradient);
      color: white;
      box-shadow: 0 12px 34px rgba(91,92,240,0.22);
    }
    .plan-cta.primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 18px 55px rgba(91,92,240,0.35);
    }

    .plan-features {
      margin: 18px 0 0;
      padding: 0;
      list-style: none;
      display: grid;
      gap: 10px;
    }
    .plan-features li {
      display: flex;
      gap: 10px;
      align-items: flex-start;
      color: var(--muted);
      font-weight: 600;
    }
    .plan-features i {
      color: rgba(16,185,129, 0.95);
      margin-top: 4px;
    }

    /*  SECTION PRO */
    .flow-section {
      padding: 120px 6%;
      background: rgba(var(--surface-rgb), 0.45);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      backdrop-filter: blur(10px);
    }

    .flow-slider-wrapper {
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      overflow: hidden;
      border-radius: 26px;
      border: 1px solid var(--border);
      box-shadow: var(--shadow-md);
      background: rgba(var(--surface-rgb), 0.55);
      backdrop-filter: blur(12px);
    }

    .flow-header {
      display: flex;
      justify-content: space-between;
      gap: 14px;
      padding: 20px 22px;
      border-bottom: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
    }
    .flow-kpis {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }
    .flow-kpi {
      padding: 10px 14px;
      border: 1px solid var(--border);
      border-radius: 14px;
      background: rgba(var(--surface-rgb), 0.40);
      display: flex;
      gap: 10px;
      align-items: center;
      min-width: 160px;
    }
    .kpi-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--accent);
      box-shadow: 0 0 14px rgba(159,122,234,0.55);
    }
    .kpi-value {
      font-weight: 900;
      font-size: 1.1rem;
      line-height: 1;
    }
    .kpi-label {
      color: var(--muted);
      font-weight: 700;
      font-size: 0.9rem;
    }

    .flow-actions {
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }
    .flow-action-btn {
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
      padding: 10px 12px;
      border-radius: 12px;
      cursor: pointer;
      transition: var(--transition);
      font-weight: 800;
    }
    .flow-action-btn:hover {
      transform: translateY(-2px);
      border-color: rgba(159,122,234,0.40);
      box-shadow: 0 14px 40px rgba(0,0,0,0.12);
    }

    .flow-slider {
      display: flex;
      transition: transform 0.85s cubic-bezier(0.4, 0, 0.2, 1);
      width: 300%;
    }

    .flow-slide {
      flex: 0 0 33.333%;
      padding: 42px 28px 68px;
    }

    .task-card {
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.45);
      border-radius: 22px;
      padding: 26px 24px;
      box-shadow: var(--shadow-sm);
      position: relative;
      overflow: hidden;
    }
    .task-card:before {
      content: \"\";
      position: absolute;
      inset: 0;
      background: radial-gradient(800px 220px at 10% 0%, rgba(159,122,234,0.18), transparent 60%);
      pointer-events: none;
    }

    .task-top {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      align-items: flex-start;
      position: relative;
    }

    .task-title {
      font-size: 1.35rem;
      font-weight: 900;
      margin: 0;
      letter-spacing: -0.4px;
    }
    .task-meta {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      color: var(--muted);
      font-weight: 700;
      font-size: 0.95rem;
      position: relative;
    }
    .meta-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.30);
    }

    .status-pill {
      padding: 10px 14px;
      border-radius: 999px;
      font-weight: 900;
      font-size: 0.9rem;
      border: 1px solid var(--border);
      background: rgba(var(--surface-rgb), 0.35);
      color: var(--text);
      white-space: nowrap;
      position: relative;
    }
    .status-pill.live { border-color: rgba(91,92,240,0.35); box-shadow: 0 0 24px rgba(91,92,240,0.18); }
    .status-pill.scheduled { border-color: rgba(159,122,234,0.35); box-shadow: 0 0 24px rgba(159,122,234,0.18); }
    .status-pill.future { border-color: rgba(16,185,129,0.35); box-shadow: 0 0 24px rgba(16,185,129,0.14); }

    .task-desc {
      margin: 16px 0 18px;
      color: var(--muted);
      font-weight: 600;
      position: relative;
    }

    .task-bottom {
      display: flex;
      justify-content: space-between;
      gap: 14px;
      align-items: center;
      flex-wrap: wrap;
      position: relative;
    }

    .progress-wrap {
      flex: 1;
      min-width: 220px;
    }
    .progress-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
      color: var(--muted);
      font-weight: 800;
      font-size: 0.9rem;
    }
    .progress-bar {
      height: 10px;
      border-radius: 999px;
      background: rgba(148,163,184,0.18);
      overflow: hidden;
      border: 1px solid var(--border);
    }
    .progress-fill {
      height: 100%;
      border-radius: 999px;
      background: var(--gradient);
      width: 40%;
      transition: width 0.6s ease;
    }

    .assignees {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .avatars {
      display: flex;
      align-items: center;
    }
    .avatar {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 2px solid rgba(var(--surface-rgb), 0.9);
      background: rgba(var(--surface-rgb), 0.45);
      display: grid;
      place-items: center;
      font-weight: 900;
      color: var(--text);
      margin-left: -10px;
      box-shadow: 0 10px 22px rgba(0,0,0,0.18);
    }
    .avatar:first-child { margin-left: 0; }
    .assignees-label { color: var(--muted); font-weight: 800; font-size: 0.95rem; }

    .slider-controls {
      position: absolute;
      bottom: 18px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 12px;
      z-index: 5;
    }
    .slider-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: rgba(148,163,184,0.55);
      cursor: pointer;
      transition: var(--transition);
    }
    .slider-dot.active {
      background: var(--accent);
      transform: scale(1.55);
      box-shadow: 0 0 14px rgba(159,122,234,0.65);
    }

    .slider-arrows {
      position: absolute;
      top: 55%;
      left: 0; right: 0;
      transform: translateY(-50%);
      display: flex;
      justify-content: space-between;
      padding: 0 18px;
      pointer-events: none;
      z-index: 6;
    }
    .arrow-btn {
      background: rgba(var(--surface-rgb), 0.45);
      border: 1px solid var(--border);
      color: var(--text);
      width: 46px;
      height: 46px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.1rem;
      transition: var(--transition);
      backdrop-filter: blur(10px);
      pointer-events: auto;
      display: grid;
      place-items: center;
      box-shadow: 0 12px 28px rgba(0,0,0,0.14);
    }
    .arrow-btn:hover {
      background: rgba(159,122,234,0.20);
      border-color: rgba(159,122,234,0.45);
      transform: scale(1.08);
    }

    
    .cta-final {
      padding: 140px 6%;
      text-align: center;
      background: var(--gradient);
      color: white;
    }
    .cta-final h2 { font-size: clamp(2.2rem, 4vw, 3.8rem); margin: 0 0 18px; }
    .cta-final p { max-width: 820px; margin: 0 auto; font-weight: 600; opacity: 0.95; }

    
    footer {
      padding: 80px 6% 40px;
      background: #0a0e1f;
      border-top: 1px solid var(--border);
      text-align: center;
      color: rgba(148,163,184,0.95);
    }
    .footer-links {
      margin: 24px 0 40px;
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .footer-links a {
      color: rgba(148,163,184,0.9);
      text-decoration: none;
      transition: color 0.3s;
      font-weight: 700;
    }
    .footer-links a:hover { color: white; }

  
    @media (max-width: 820px) {
      nav { display: none; }
      header { padding: 0 5%; }
      .flow-header { flex-direction: column; align-items: stretch; }
      .flow-actions { justify-content: flex-start; }
      .flow-slide { padding: 26px 16px 70px; }
    }
  </style>
</head>

<body>

  <header>
    <div class=\"logo\">NEXA</div>
    <nav>
      <a href=\"#features\">Fonctionnalités</a>
      <a href=\"#packs\">Tarifs</a>
      <a href=\"#flux\">Flux</a>
      <a href=\"{{ path('app_produit_index') }}\">Produit</a>
      <a href=\"{{ path('app_login') }}\">Connexion</a>
    </nav>
    <div style=\"display:flex; align-items:center; gap:18px;\">
      <button class=\"theme-toggle\" id=\"themeToggle\" title=\"Changer de thème\">
        <i class=\"fas fa-moon\"></i>
      </button>
      <a class=\"cta-primary\" href=\"{{ path('app_login') }}\">Commencer gratuitement</a>
    </div>
  </header>

  <section class=\"hero\">
    <h1>Maîtrisez votre quotidien avec intelligence</h1>
    <p>NEXA transforme vos tâches en un flux fluide, visuel et motivant. Priorisez ce qui compte, anticipez l’avenir, et concentrez votre énergie sur l’essentiel.</p>
    <div class=\"hero-ctas\">
      <a class=\"cta-primary\" href=\"{{ path('app_login') }}\">Essayer gratuitement</a>
      <a class=\"cta-secondary\" href=\"#flux\">Decouvrir la demo</a>
    </div>
  </section>

  <section class=\"features\" id=\"features\">
    <h2 class=\"section-title\">Pourquoi NEXA ?</h2>
    <p class=\"section-subtitle\">Une expérience premium : rapide, claire, sécurisée — pensée pour le quotidien et la performance.</p>

    <div class=\"features-grid\">
      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-stream\"></i></div>
        <div class=\"feature-title\">Flux Horizon</div>
        <p>Visualisez vos tâches sur une timeline élégante qui s’adapte à votre rythme.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-brain\"></i></div>
        <div class=\"feature-title\">Intelligence contextuelle</div>
        <p>Suggestions pertinentes, priorisation automatique et rappels intelligents.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-sync\"></i></div>
        <div class=\"feature-title\">Synchronisation universelle</div>
        <p>Web, mobile, desktop – vos données à jour, partout, en temps réel.</p>
      </div>

      <div class=\"feature-card\">
        <div class=\"feature-icon\"><i class=\"fas fa-shield-alt\"></i></div>
        <div class=\"feature-title\">Sécurité & Confidentialité</div>
        <p>Chiffrement, zéro tracking, conformité RGPD, contrôle total des accès.</p>
      </div>
    </div>
  </section>

  <!-- ✅ PACKS / TARIFS -->
  <section class=\"pricing\" id=\"packs\">
    <h2 class=\"section-title\">Packs adaptés à votre rythme</h2>
    <p class=\"section-subtitle\">
      Commencez gratuitement, puis évoluez quand votre équipe (ou vos projets) grandissent.
    </p>

    <div class=\"pricing-grid\">
      <div class=\"plan-card\">
        <div class=\"plan-name\">Starter</div>
        <p class=\"plan-desc\">Pour organiser votre quotidien sans effort.</p>

        <div class=\"plan-price\">
          <div class=\"value\">0</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta\">Démarrer gratuitement</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Liste + calendrier</li>
          <li><i class=\"fas fa-check-circle\"></i> Rappels basiques</li>
          <li><i class=\"fas fa-check-circle\"></i> 1 espace de travail</li>
          <li><i class=\"fas fa-check-circle\"></i> Support standard</li>
        </ul>
      </div>

      <div class=\"plan-card\">
        <div class=\"plan-badge\">Populaire</div>
        <div class=\"plan-name\">Pro</div>
        <p class=\"plan-desc\">Pour gagner du temps avec l’IA et la priorisation.</p>

        <div class=\"plan-price\">
          <div class=\"value\">19</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta primary\">Choisir Pro</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Priorisation intelligente</li>
          <li><i class=\"fas fa-check-circle\"></i> Rappels contextuels</li>
          <li><i class=\"fas fa-check-circle\"></i> Templates & routines</li>
          <li><i class=\"fas fa-check-circle\"></i> Synchronisation multi-appareils</li>
        </ul>
      </div>

      <div class=\"plan-card\">
        <div class=\"plan-name\">Business</div>
        <p class=\"plan-desc\">Pour les équipes, la gouvernance et la sécurité avancée.</p>

        <div class=\"plan-price\">
          <div class=\"value\">49</div>
          <div class=\"unit\">TND / mois</div>
        </div>

        <button class=\"plan-cta\">Parler à l’équipe</button>

        <ul class=\"plan-features\">
          <li><i class=\"fas fa-check-circle\"></i> Espaces d’équipe & rôles</li>
          <li><i class=\"fas fa-check-circle\"></i> Audit & permissions</li>
          <li><i class=\"fas fa-check-circle\"></i> SLA & support prioritaire</li>
          <li><i class=\"fas fa-check-circle\"></i> Intégrations avancées</li>
        </ul>
      </div>
    </div>
  </section>

 
  <section class=\"flow-section\" id=\"flux\">
    <h2 class=\"section-title\">Votre flux, votre rythme</h2>
    <p class=\"section-subtitle\">
      Une vue claire de l’essentiel : aujourd’hui, cette semaine, et le cap long-terme — sans friction.
    </p>

    <div class=\"flow-slider-wrapper\" id=\"flowWrapper\">
      <div class=\"flow-header\">
        <div class=\"flow-kpis\">
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\"></div>
            <div>
              <div class=\"kpi-value\">8</div>
              <div class=\"kpi-label\">Tâches actives</div>
            </div>
          </div>
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\" style=\"background: rgba(91,92,240,1); box-shadow:0 0 14px rgba(91,92,240,0.55);\"></div>
            <div>
              <div class=\"kpi-value\">3</div>
              <div class=\"kpi-label\">Priorité haute</div>
            </div>
          </div>
          <div class=\"flow-kpi\">
            <div class=\"kpi-dot\" style=\"background: rgba(16,185,129,1); box-shadow:0 0 14px rgba(16,185,129,0.50);\"></div>
            <div>
              <div class=\"kpi-value\">92%</div>
              <div class=\"kpi-label\">Rythme tenu</div>
            </div>
          </div>
        </div>

        <div class=\"flow-actions\">
          <button class=\"flow-action-btn\"><i class=\"fa-solid fa-filter\"></i> Filtrer</button>
          <button class=\"flow-action-btn\"><i class=\"fa-solid fa-wand-magic-sparkles\"></i> Suggestion</button>
        </div>
      </div>

      <div class=\"flow-slider\" id=\"flowSlider\">
        
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Préparer pitch investisseur</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-calendar\"></i> Aujourd’hui</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-bolt\"></i> Focus</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-flag\"></i> Haute priorité</span>
                </div>
              </div>
              <div class=\"status-pill live\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(91,92,240,1);\"></i> En cours</div>
            </div>

            <p class=\"task-desc\">
              Structurer la story, clarifier les chiffres et préparer le deck final. Objectif : décision rapide + suivi partenaires.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Avancement</span>
                  <span>40%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:40%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">Y</div>
                  <div class=\"avatar\">A</div>
                  <div class=\"avatar\">M</div>
                </div>
                <div class=\"assignees-label\">Équipe Pitch</div>
              </div>
            </div>
          </div>
        </div>

      
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Lancement campagne marketing</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-clock\"></i> Dans 48h</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-users\"></i> Équipe alignée</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-bullseye\"></i> 10 000 leads</span>
                </div>
              </div>
              <div class=\"status-pill scheduled\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(159,122,234,1);\"></i> Prévu</div>
            </div>

            <p class=\"task-desc\">
              Vérifier les assets, valider le tracking, finaliser les audiences, et publier le calendrier multi-canaux.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Préparation</span>
                  <span>70%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:70%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">S</div>
                  <div class=\"avatar\">K</div>
                  <div class=\"avatar\">R</div>
                </div>
                <div class=\"assignees-label\">Marketing</div>
              </div>
            </div>
          </div>
        </div>

        
        <div class=\"flow-slide\">
          <div class=\"task-card\">
            <div class=\"task-top\">
              <div>
                <h3 class=\"task-title\">Objectif annuel atteint</h3>
                <div class=\"task-meta\">
                  <span class=\"meta-chip\"><i class=\"fa-regular fa-calendar-days\"></i> Dans 90 jours</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-chart-line\"></i> KPI consolidés</span>
                  <span class=\"meta-chip\"><i class=\"fa-solid fa-award\"></i> Cycle suivant</span>
                </div>
              </div>
              <div class=\"status-pill future\"><i class=\"fa-solid fa-circle\" style=\"font-size:0.55rem; margin-right:8px; color: rgba(16,185,129,1);\"></i> À venir</div>
            </div>

            <p class=\"task-desc\">
              Roadmap finalisée, exécution stable, et rituels d’équipe prêts. Préparer la célébration + plan Q2.
            </p>

            <div class=\"task-bottom\">
              <div class=\"progress-wrap\">
                <div class=\"progress-row\">
                  <span>Progression</span>
                  <span>15%</span>
                </div>
                <div class=\"progress-bar\"><div class=\"progress-fill\" style=\"width:15%\"></div></div>
              </div>

              <div class=\"assignees\">
                <div class=\"avatars\">
                  <div class=\"avatar\">C</div>
                  <div class=\"avatar\">T</div>
                </div>
                <div class=\"assignees-label\">Direction</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class=\"slider-controls\">
        <div class=\"slider-dot active\" data-index=\"0\"></div>
        <div class=\"slider-dot\" data-index=\"1\"></div>
        <div class=\"slider-dot\" data-index=\"2\"></div>
      </div>

      <div class=\"slider-arrows\">
        <button class=\"arrow-btn\" id=\"prevSlide\" aria-label=\"Précédent\"><i class=\"fas fa-chevron-left\"></i></button>
        <button class=\"arrow-btn\" id=\"nextSlide\" aria-label=\"Suivant\"><i class=\"fas fa-chevron-right\"></i></button>
      </div>
    </div>
  </section>

  <section class=\"cta-final\">
    <h2>Commencez votre flux aujourd’hui</h2>
    <p>Créez votre compte en moins de 30 secondes. Aucun moyen de paiement requis. Juste votre ambition et NEXA.</p>
    <a class=\"cta-primary\" href=\"{{ path('app_login') }}\" style=\"background:white; color:var(--primary); padding:18px 56px; font-size:1.15rem; margin-top:36px; box-shadow:0 10px 34px rgba(0,0,0,0.22);\">
      Créer mon compte gratuit
    </a>
  </section>

  <footer>
    <div class=\"footer-links\">
      <a href=\"#\">Confidentialité</a>
      <a href=\"#\">Conditions d’utilisation</a>
      <a href=\"#\">Support</a>
      <a href=\"#\">Contact</a>
      <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>
      <a href=\"#\"><i class=\"fab fa-linkedin\"></i></a>
    </div>
    <p>© 2026 NEXA – Gestion intelligente des tâches quotidiennes • Développé à Tunis, Tunisie</p>
  </footer>

  <script>

    const toggleBtn = document.getElementById('themeToggle');
    const html = document.documentElement;
    const currentTheme = localStorage.getItem('theme') || 'dark';
    html.setAttribute('data-theme', currentTheme);
    toggleBtn.innerHTML = currentTheme === 'dark'
      ? '<i class=\"fas fa-moon\"></i>'
      : '<i class=\"fas fa-sun\"></i>';

    toggleBtn.addEventListener('click', () => {
      const newTheme = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      html.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
      toggleBtn.innerHTML = newTheme === 'dark'
        ? '<i class=\"fas fa-moon\"></i>'
        : '<i class=\"fas fa-sun\"></i>';
    });


    const fadeElements = document.querySelectorAll('.hero, .features, .pricing, .flow-section, .cta-final');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    fadeElements.forEach(el => observer.observe(el));

    // Slider pro
    const slider = document.getElementById('flowSlider');
    const dots = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    const wrapper = document.getElementById('flowWrapper');

    let currentIndex = 0;
    let interval;

    function goToSlide(index) {
      currentIndex = (index + 3) % 3;
      slider.style.transform = `translateX(-\${currentIndex * 33.333}%)`;
      dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex));
    }

    function startAutoSlide() { interval = setInterval(() => goToSlide(currentIndex + 1), 6500); }
    function stopAutoSlide() { clearInterval(interval); }

    dots.forEach((dot, i) => dot.addEventListener('click', () => {
      goToSlide(i);
      stopAutoSlide();
      startAutoSlide();
    }));

    prevBtn.addEventListener('click', () => { goToSlide(currentIndex - 1); stopAutoSlide(); startAutoSlide(); });
    nextBtn.addEventListener('click', () => { goToSlide(currentIndex + 1); stopAutoSlide(); startAutoSlide(); });

    wrapper.addEventListener('mouseenter', stopAutoSlide);
    wrapper.addEventListener('mouseleave', startAutoSlide);

    startAutoSlide();
  </script>
</body>
</html>
", "home/index.html.twig", "C:\\Users\\Siwar\\Desktop\\bal de projet finalll\\project_web\\templates\\home\\index.html.twig");
    }
}
