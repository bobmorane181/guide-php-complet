# PHASE 9: POO Avancée (Héritage et Static)

## Concepts pratiqués
- Héritage avec `extends`
- Propriétés `protected`
- `parent::` pour appeler méthode parente
- Surcharge de méthodes (override)
- Méthodes et propriétés `static`
- `self::` pour accéder aux membres static
- Polymorphisme

## Architecture hiérarchique

```
QuestionBase (classe de base)
    ├── QuestionChoixMultiple
    ├── QuestionVraiFaux
    └── QuestionTexte
```

## Classe de base

### classes/QuestionBase.php
```php
class QuestionBase {
    protected $texte;
    protected $reponse_correcte;
    protected $points;
    protected $categorie;

    public function __construct($texte, $reponse, $points = 1, $categorie = "Général") {
        $this->texte = $texte;
        $this->reponse_correcte = $reponse;
        $this->points = $points;
        $this->categorie = $categorie;
    }

    public function afficher() {
        echo $this->texte;
    }

    public function verifier($reponse) {
        return trim(strtolower($reponse)) === trim(strtolower($this->reponse_correcte));
    }

    protected function getBadgeDifficulte() {
        // Méthode protected accessible aux enfants
    }
}
```

## Classes enfants

### classes/QuestionChoixMultiple.php
```php
class QuestionChoixMultiple extends QuestionBase {
    private $choix = [];

    public function __construct($texte, $choix, $reponse_correcte, $points = 1) {
        parent::__construct($texte, $reponse_correcte, $points);
        $this->choix = $choix;
    }

    // SURCHARGE de afficher()
    public function afficher() {
        parent::afficher();  // Appeler la méthode du parent
        echo "\n";
        foreach ($this->choix as $lettre => $texte) {
            echo "{$lettre}) {$texte}\n";
        }
    }

    // SURCHARGE de verifier()
    public function verifier($reponse) {
        return strtoupper(trim($reponse)) === strtoupper($this->reponse_correcte);
    }
}
```

### classes/QuestionVraiFaux.php
```php
class QuestionVraiFaux extends QuestionBase {
    public function afficher() {
        parent::afficher();
        echo "\nVrai ou Faux?\n";
    }

    public function verifier($reponse) {
        $reponse_lower = strtolower(trim($reponse));
        $vrai_variantes = ['vrai', 'v', 'true', 't', '1'];
        $faux_variantes = ['faux', 'f', 'false', '0'];

        if (in_array($reponse_lower, $vrai_variantes)) {
            $reponse_lower = 'vrai';
        } elseif (in_array($reponse_lower, $faux_variantes)) {
            $reponse_lower = 'faux';
        }

        return $reponse_lower === $this->reponse_correcte;
    }
}
```

## Classe utilitaire avec static

### classes/QuizUtils.php
```php
class QuizUtils {
    public static $total_quiz_joues = 0;
    private static $total_questions_posees = 0;

    public static function melangerQuestions(&$questions) {
        shuffle($questions);
    }

    public static function incrementerTotalQuiz() {
        self::$total_quiz_joues++;
    }

    public static function calculerPourcentage($score, $total) {
        if ($total === 0) return 0.0;
        return round(($score / $total) * 100, 2);
    }

    public static function getFeedback($pourcentage) {
        if ($pourcentage === 100) return "🏆 PARFAIT!";
        elseif ($pourcentage >= 80) return "🌟 EXCELLENT!";
        elseif ($pourcentage >= 60) return "👍 BIEN!";
        else return "💪 CONTINUEZ!";
    }
}
```

## Utilisation (Polymorphisme)

```php
$q1 = new QuestionChoixMultiple("Capitale?", ["A" => "Londres", "B" => "Paris"], "B");
$q2 = new QuestionVraiFaux("PHP existe depuis 1995.", "vrai");
$q3 = new QuestionTexte("Qui a peint Joconde?", "Léonard de Vinci");

$questions = [$q1, $q2, $q3];

QuizUtils::melangerQuestions($questions);
QuizUtils::incrementerTotalQuiz();

foreach ($questions as $question) {
    $question->afficher();  // Polymorphisme: même méthode, comportements différents
}

echo "Total quiz: " . QuizUtils::$total_quiz_joues . "\n";
```

## TODO
- [ ] Créer QuestionBase avec propriétés protected
- [ ] Créer QuestionChoixMultiple qui hérite
- [ ] Créer QuestionVraiFaux qui hérite
- [ ] Créer QuestionTexte qui hérite
- [ ] Créer QuizUtils avec méthodes static
- [ ] Tester le polymorphisme
- [ ] Vérifier que parent:: fonctionne
- [ ] Tester self:: pour membres static
