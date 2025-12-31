# PHASE 8: Introduction à la POO

## Concepts pratiqués
- Créer des classes avec `class`
- Propriétés `public/private`
- Méthodes (fonctions dans une classe)
- Créer des objets avec `new`
- Opérateur `->` pour accès
- `$this` pour référencer l'objet
- Constructeur `__construct()`
- Encapsulation (getters/setters)

## Fichiers à créer

### classes/Question.php
```php
class Question {
    private $texte;
    private $reponse_correcte;
    private $points;
    private $categorie;

    public function __construct($texte, $reponse, $points = 1, $categorie = "Général") {
        $this->texte = $texte;
        $this->reponse_correcte = $reponse;
        $this->points = $points;
        $this->categorie = $categorie;
    }

    public function afficher() {
        echo $this->texte;
    }

    public function verifier($reponse_user) {
        $user_clean = trim(strtolower($reponse_user));
        $correct_clean = trim(strtolower($this->reponse_correcte));
        return $user_clean === $correct_clean;
    }

    // GETTERS
    public function getTexte() { return $this->texte; }
    public function getPoints() { return $this->points; }

    // SETTERS
    public function setPoints($points) {
        if ($points > 0) {
            $this->points = $points;
        }
    }
}
```

### classes/Quiz.php
```php
class Quiz {
    private $nom_quiz;
    private $questions = [];
    private $score_actuel = 0;

    public function __construct($nom) {
        $this->nom_quiz = $nom;
    }

    public function ajouterQuestion($question) {
        $this->questions[] = $question;
    }

    public function calculerScore($reponses_post) {
        // Logique de calcul
    }

    public function getNombreQuestions() {
        return count($this->questions);
    }
}
```

### classes/User.php
```php
class User {
    private $nom;
    private $email;
    private $meilleur_score = 0;
    private $historique_quiz = [];

    public function ajouterResultat($score, $max_score) {
        // Ajouter à l'historique
    }
}
```

## Utilisation

```php
$user = new User("Jean Dupont", "jean@example.com");
$quiz = new Quiz("Quiz Géographie");

$q1 = new Question("Capitale de France?", "Paris", 1, "Géographie");
$quiz->ajouterQuestion($q1);

$resultat = $quiz->calculerScore($_POST);
```

## TODO
- [ ] Créer classe Question complète
- [ ] Créer classe Quiz complète
- [ ] Créer classe User complète
- [ ] Créer quiz_poo.php qui utilise les classes
- [ ] Tester création de plusieurs objets
- [ ] Vérifier encapsulation (private/public)
