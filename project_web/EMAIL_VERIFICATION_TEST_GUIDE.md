# Tester l'email de verification

## Tester l'email de verification (reel)
1. Verifie que `MAILER_DSN` est valide dans `.env.local`.
2. Inscris un nouveau compte via `/register` avec un email que tu controles.
3. Ouvre l'email recu, puis clique le lien `/verify-email/{token}`.
4. Le compte passe en verifie, puis la connexion fonctionne normalement.

## Alternative en dev (sans vrai email)
- Si `APP_ENV=dev`, tente de te connecter avec un compte non verifie.
- L'app affiche un flash avec un lien de verification genere depuis `src/Security/UserAuthenticator.php`.

## Messages affiches selon l'email

### Inscription `/register` (`src/Controller/UserController.php`)
- Email deja pris: `Email deja utilise`
- Email invalide: `Email invalide`
- Email risque/temporaire: `Email invalide, risque ou temporaire.`
- Sinon: inscription OK + envoi de l'email de verification

### Connexion `/login` (`src/Security/UserAuthenticator.php`)
- Email inconnu ou mot de passe faux: `Identifiants invalides.`
- Compte non verifie: `Compte non verifie...` + renvoi email verification

### Mot de passe oublie `/forgot-password` (`src/Controller/PasswordResetController.php`)
- Message volontairement neutre: `Si cet email existe, un lien de reinitialisation a ete envoye.`

### Verification `/verify-email/{token}`
- Token invalide/deja utilise: `Lien de verification invalide ou deja utilise.`
