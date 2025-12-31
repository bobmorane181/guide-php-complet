# PHASE 7: Sécurité et Validation

## Concepts pratiqués
- `htmlspecialchars()` pour protection XSS
- `isset()` et `empty()` pour validation
- `filter_var()` pour validation email
- `preg_match()` pour expressions régulières
- `trim()` pour sanitization
- Gestion des erreurs avec array

## Fichiers à créer

### 1. inscription.php
Formulaire d'inscription avec tous les champs

### 2. validation.php
Fonctions de validation réutilisables

### 3. connexion.php
Formulaire de connexion simple

## Fonctions de validation

```php
function sanitize_input($data) {
    return trim(stripslashes($data));
}

function valider_email($email, &$errors) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le format de l'email est invalide.";
        return false;
    }
    return true;
}

function valider_pseudo($pseudo, &$errors) {
    if (!preg_match('/^[a-zA-Z0-9_]{3,15}$/', $pseudo)) {
        $errors[] = "Le pseudo doit contenir 3-15 caractères alphanumériques.";
        return false;
    }
    return true;
}

function valider_mot_de_passe($password, &$errors) {
    if (strlen($password) < 8) {
        $errors[] = "Minimum 8 caractères.";
        return false;
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Au moins une majuscule.";
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Au moins un chiffre.";
        return false;
    }
    return true;
}
```

## TODO
- [ ] Créer validation.php avec toutes les fonctions
- [ ] Créer inscription.php avec formulaire complet
- [ ] Valider: nom, email, pseudo, âge, mot de passe
- [ ] Utiliser `password_hash()` pour les mots de passe
- [ ] Afficher messages d'erreur clairs
- [ ] Protéger tous les affichages avec htmlspecialchars()
