# PHASE 6: Interface HTML

## Concepts pratiqués
- Balises HTML (form, input, button, select)
- `$_POST` pour récupérer les données du formulaire
- Raccourci `<?= ?>` pour affichage
- Syntaxe alternative `endforeach;`
- Protection `htmlspecialchars()`

## Fichiers à créer

### 1. quiz.php
Formulaire HTML avec les questions

### 2. resultat.php
Page qui affiche les résultats après soumission

### 3. style.css
Design basique pour le quiz

## Structure du formulaire

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="resultat.php">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question">
                <h3>Question <?= $index + 1 ?></h3>
                <p><?= htmlspecialchars($q['question']) ?></p>

                <?php if ($q['type'] === 'choix_multiple'): ?>
                    <?php foreach ($q['choix'] as $lettre => $option): ?>
                        <label>
                            <input type="radio" name="q<?= $index ?>" value="<?= $lettre ?>">
                            <?= htmlspecialchars($option) ?>
                        </label>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
```

## Traitement avec $_POST

```php
// Dans resultat.php
$score = 0;
foreach ($questions as $index => $q) {
    $reponse_user = $_POST["q{$index}"] ?? '';
    if ($reponse_user === $q['reponse']) {
        $score++;
    }
}
```

## TODO
- [ ] Créer quiz.php avec formulaire HTML
- [ ] Créer resultat.php pour traiter $_POST
- [ ] Créer style.css avec design responsive
- [ ] Utiliser htmlspecialchars() partout
- [ ] Ajouter différents types de questions (radio, text)
