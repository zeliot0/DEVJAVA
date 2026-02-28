<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$html = <<<'HTML'
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; color: #1f2937; font-size: 12px; line-height: 1.45; }
    h1 { font-size: 22px; margin-bottom: 6px; color: #0f172a; }
    h2 { font-size: 16px; margin: 18px 0 8px; color: #0f172a; border-bottom: 1px solid #e5e7eb; padding-bottom: 4px; }
    h3 { font-size: 13px; margin: 12px 0 6px; color: #111827; }
    .meta { margin-bottom: 12px; }
    .meta p { margin: 2px 0; }
    table { width: 100%; border-collapse: collapse; margin-top: 8px; }
    th, td { border: 1px solid #d1d5db; padding: 6px; vertical-align: top; }
    th { background: #f3f4f6; text-align: left; }
    ul, ol { margin: 6px 0 8px 20px; }
    p { margin: 4px 0; }
    .section { page-break-inside: avoid; }
  </style>
</head>
<body>
  <h1>Sprint Backlog S1 - Version Professionnelle</h1>
  <div class="meta">
    <p><strong>Projet :</strong> Plateforme NEXA</p>
    <p><strong>Sprint 1 :</strong> 2 mars 2026 au 8 mars 2026 (Semaine 6)</p>
    <p><strong>Perimetre :</strong> Taches, Conscience, Produit, User, Goals</p>
    <p><strong>Format :</strong> 1 User Story CRUD + 1 User Story API avancee par gestion</p>
  </div>

  <div class="section">
    <h2>1. Objectif global</h2>
    <p>Mettre en place un socle fonctionnel stable sur les 5 gestions avec operations CRUD, fonctionnalites API avancees et scenarios demonstrables en soutenance.</p>
  </div>

  <div class="section">
    <h2>2. Definition of Done</h2>
    <ol>
      <li>Chaque User Story valide ses criteres d'acceptation.</li>
      <li>Routes critiques testees manuellement (et automatisees si possible).</li>
      <li>Controle d'acces conforme (User/Admin).</li>
      <li>Gestion d'erreurs avec messages clairs.</li>
      <li>Demonstration prete (jeu de donnees + script oral).</li>
    </ol>
  </div>

  <div class="section">
    <h2>3. Backlog Sprint S1 - Synthese</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th><th>Gestion</th><th>User Story</th><th>Type</th><th>Priorite</th><th>Points</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>US-TSK-01</td><td>Taches</td><td>CRUD des taches</td><td>CRUD</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-TSK-02</td><td>Taches</td><td>NEXA AI Agent (assistant intelligent taches)</td><td>API Avancee</td><td>Haute</td><td>13</td></tr>
        <tr><td>US-CON-01</td><td>Conscience</td><td>CRUD themes/questions/feedback</td><td>CRUD</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-CON-02</td><td>Conscience</td><td>API sentiment/coaching/chatbot</td><td>API Avancee</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-PRD-01</td><td>Produit</td><td>CRUD produits + stock</td><td>CRUD</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-PRD-02</td><td>Produit</td><td>API stock intelligent (low stock + recherche)</td><td>API Avancee</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-USR-01</td><td>User</td><td>CRUD profil utilisateur</td><td>CRUD</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-USR-02</td><td>User</td><td>API securite utilisateur (face/password)</td><td>API Avancee</td><td>Moyenne</td><td>8</td></tr>
        <tr><td>US-GOA-01</td><td>Goals</td><td>CRUD objectifs + progression</td><td>CRUD</td><td>Haute</td><td>8</td></tr>
        <tr><td>US-GOA-02</td><td>Goals</td><td>API analytics objectifs</td><td>API Avancee</td><td>Moyenne</td><td>8</td></tr>
      </tbody>
    </table>
    <p><strong>Total Sprint 1 :</strong> 85 points</p>
  </div>

  <div class="section">
    <h2>4. Details des User Stories par gestion</h2>

    <h3>A. Taches</h3>
    <p><strong>US-TSK-01 (CRUD)</strong>: Creer/lire/modifier/supprimer des taches pour piloter l'activite quotidienne.</p>
    <ul>
      <li>Champs: titre, description, statut, priorite, echeance, categorie.</li>
      <li>Criteres: CRUD complet, validations, messages succes/erreur, persistance DB.</li>
    </ul>
    <p><strong>US-TSK-02 (API Avancee - NEXA AI Agent)</strong>: Assistance IA pour description, analyse, sous-taches, morning brief et chat contextuel.</p>
    <ul>
      <li>Criteres: endpoints JSON exploitables, validation input, integration UI, flux demonstrable.</li>
    </ul>

    <h3>B. Conscience</h3>
    <p><strong>US-CON-01 (CRUD)</strong>: Gerer themes/questions/feedback pour le suivi personnel.</p>
    <ul>
      <li>Criteres: CRUD complet, permissions, validations, affichage par theme.</li>
    </ul>
    <p><strong>US-CON-02 (API Avancee)</strong>: Services sentiment/coaching/chatbot.</p>
    <ul>
      <li>Criteres: JSON structure, gestion d'erreurs, scenarios de demonstration.</li>
    </ul>

    <h3>C. Produit</h3>
    <p><strong>US-PRD-01 (CRUD)</strong>: Gerer produits et stock de maniere fiable.</p>
    <ul>
      <li>Criteres: stock non negatif, upload image valide, suppression sous contrainte metier.</li>
    </ul>
    <p><strong>US-PRD-02 (API Avancee)</strong>: API low-stock, recherche et stats stock.</p>
    <ul>
      <li>Criteres: seuil low-stock fiable, filtres operationnels, format dashboard-ready.</li>
    </ul>

    <h3>D. User</h3>
    <p><strong>US-USR-01 (CRUD)</strong>: Gestion du profil utilisateur (nom/photo/mot de passe) et actions admin.</p>
    <ul>
      <li>Criteres: verification mot de passe courant, CSRF, controle des roles.</li>
    </ul>
    <p><strong>US-USR-02 (API Avancee)</strong>: API securite (password tools, face auth).</p>
    <ul>
      <li>Criteres: endpoints securises, payload valide, erreurs claires.</li>
    </ul>

    <h3>E. Goals</h3>
    <p><strong>US-GOA-01 (CRUD)</strong>: Gestion des objectifs et de leur progression.</p>
    <ul>
      <li>Criteres: progression bornee 0-100, statuts coherents, persistance.</li>
    </ul>
    <p><strong>US-GOA-02 (API Avancee)</strong>: API analytics des objectifs.</p>
    <ul>
      <li>Criteres: calculs corrects, filtres periode, reponses exploitables pour graphiques.</li>
    </ul>
  </div>

  <div class="section">
    <h2>5. Plan oral (15-20 min)</h2>
    <ol>
      <li>Introduction sprint (2 min)</li>
      <li>Taches: CRUD + NEXA AI Agent (4 min)</li>
      <li>Conscience: CRUD + API (3 min)</li>
      <li>Produit: CRUD + API (3 min)</li>
      <li>User: CRUD + API (3 min)</li>
      <li>Goals: CRUD + API (3 min)</li>
      <li>Conclusion, risques et suites (2 min)</li>
    </ol>
  </div>

  <div class="section">
    <h2>6. Livrables associes</h2>
    <ol>
      <li>Sprint backlog detaille (ce document)</li>
      <li>Diagramme de sequence (fonctionnalite avancee)</li>
      <li>Burn down chart</li>
      <li>Tableau blanc / Trello d'une semaine</li>
    </ol>
  </div>
</body>
</html>
HTML;

$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$options->set('isRemoteEnabled', false);
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->setPaper('A4', 'portrait');
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->render();

$output = __DIR__ . '/reports/sprint_backlog_s1_nexa.pdf';
file_put_contents($output, $dompdf->output());

echo $output . PHP_EOL;
