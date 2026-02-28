# Diagramme de Sequence Objet Global - Sprint 1

```mermaid
sequenceDiagram
    autonumber
    actor U as Utilisateur
    participant UI as Interface Web (Twig/JS)
    participant C as Controllers Symfony
    participant S as Services Metier
    participant AI as NEXA AI Agent API
    participant V as Validator Symfony
    participant EM as Doctrine EntityManager
    participant DB as Base de Donnees
    participant MQ as Mailer/Notifier

    U->>UI: Soumet action (CRUD/API)
    UI->>C: HTTP Request (route securisee)
    C->>C: Verification Auth/Role + CSRF

    alt Cas CRUD (Taches/Produit/User/Goals/Conscience)
        C->>V: Valider les donnees
        V-->>C: OK / erreurs
        alt Validation OK
            C->>S: Appliquer regles metier
            S->>EM: Persist/Update/Delete entites
            EM->>DB: Transaction SQL
            DB-->>EM: Commit
            EM-->>S: Entite sauvegardee
            S-->>C: Resultat metier
            C-->>UI: Reponse (redirect/json + message)
            UI-->>U: Confirmation succes
        else Validation KO
            C-->>UI: Erreurs 422 / formulaire invalide
            UI-->>U: Affichage erreurs
        end
    else Cas Avance API (NEXA AI Agent)
        C->>S: Construire contexte taches
        S->>AI: Prompt (analyse, sous-taches, brief)
        AI-->>S: Reponse IA structuree
        S->>EM: Sauvegarde trace/resultat (optionnel)
        EM->>DB: Insert/Update
        DB-->>EM: OK
        S-->>C: Payload JSON final
        C-->>UI: JSON 200
        UI-->>U: Affichage recommandations IA
    end

    opt Notification metier
        C->>MQ: Envoyer email/notification
        MQ-->>C: Statut envoi
    end
```

## Note de lecture
- Le diagramme couvre le flux global de toutes les gestions du Sprint 1.
- Les deux branches principales sont: CRUD classique et API avancee NEXA AI Agent.
- Les controles transverses (authentification, validation, persistance) sont mutualises.
