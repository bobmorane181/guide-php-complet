<?php
/*
================================================================================
PHASE 3: STRUCTURER LES DONNÉES
================================================================================

MODULES CONCERNÉS: Module 4 (Arrays)
COMPLEXITÉ: ⭐⭐ Moyen
FICHIER: quiz_phase3.php

CONCEPTS PRATIQUÉS:
-------------------
✓ Arrays indexés et associatifs
✓ Syntaxe courte []
✓ Accès par index et clés
✓ count(), in_array()
✓ Arrays multidimensionnels
✓ foreach pour parcourir

OBJECTIF:
---------
Transformer le quiz pour utiliser des arrays au lieu de variables séparées.
Cela rend le code plus maintenable et permet d'ajouter facilement de nouvelles questions.

CRITÈRES DE RÉUSSITE:
---------------------
✅ Minimum 5 questions stockées dans un array
✅ Structure claire et extensible
✅ foreach parcourt toutes les questions automatiquement
✅ count() affiche "Question X/Y" correctement
✅ Historique conserve tous les scores dans un array
✅ Statistiques s'affichent correctement
✅ in_array() utilisé pour validation

POUR TESTER:
------------
php Apprentissage/module03/quiz_phase3.php

================================================================================
*/

// TODO 1: Créer un array multidimensionnel de questions
// Chaque question est un array associatif avec les clés:
// - "question" : le texte de la question
// - "reponse" : la réponse correcte
// - "points" : le nombre de points
// - "categorie" : la catégorie (Géographie, Science, etc.)

$questions = [
    // TODO 2: Ajouter la première question (exemple fourni)
    [
        "question" => "Quelle est la capitale de la France?",
        "reponse" => "Paris",
        "points" => 1,
        "categorie" => "Géographie"
    ],

    // TODO 3: Ajouter 4 autres questions
    // Exemple de structure:
    // [
    //     "question" => "Votre question ici?",
    //     "reponse" => "Votre réponse",
    //     "points" => 1,
    //     "categorie" => "Catégorie"
    // ],




];

// TODO 4: Créer un array pour stocker l'historique des scores
// Chaque entrée sera un array associatif avec:
// - 'score' : le score obtenu
// - 'max' : le score maximum possible
// - 'date' : la date et l'heure
// - 'pourcentage' : le pourcentage de réussite
$historique_scores = [];


// TODO 5: Demander le nom du joueur


// TODO 6: Créer la boucle principale du menu
do {
    echo "\n=== MENU PRINCIPAL ===\n";
    echo "1. Démarrer le quiz\n";
    echo "2. Afficher les statistiques\n";
    echo "3. Quitter\n";


    switch ($choix) {
        case "1":
            // TODO 7: Lancer le quiz avec foreach

            $score = 0;
            $total_points = 0;

            // TODO 8: Utiliser foreach pour parcourir toutes les questions
            // foreach ($questions as $index => $question_data) { ... }



                // TODO 9: Afficher le numéro de la question avec count()
                // Exemple: echo "\nQuestion " . ($index + 1) . "/" . count($questions) . "\n";



                // TODO 10: Afficher la catégorie
                // echo "Catégorie: {$question_data['categorie']}\n";



                // TODO 11: Afficher la question



                // TODO 12: Demander la réponse



                // TODO 13: Vérifier la réponse



                // TODO 14: Ajouter les points au total possible
                // $total_points += $question_data['points'];



            // TODO 15: Calculer le pourcentage
            // $pourcentage = ($total_points > 0) ? round(($score / $total_points) * 100, 2) : 0;



            // TODO 16: Afficher le feedback selon le pourcentage



            // TODO 17: Ajouter le résultat à l'historique
            // $historique_scores[] = [
            //     'score' => $score,
            //     'max' => $total_points,
            //     'date' => date('Y-m-d H:i:s'),
            //     'pourcentage' => $pourcentage
            // ];



            break;

        case "2":
            // TODO 18: Afficher les statistiques

            echo "\n=== STATISTIQUES ===\n";

            // TODO 19: Vérifier si l'historique est vide
            // if (count($historique_scores) === 0) {
            //     echo "Aucun quiz joué pour le moment.\n";
            //     break;
            // }



            // TODO 20: Calculer et afficher les statistiques
            // - Nombre de quiz joués: count($historique_scores)
            // - Meilleur score
            // - Moyenne des scores



            // TODO 21: Afficher l'historique complet avec foreach
            // echo "\n--- Historique ---\n";
            // foreach ($historique_scores as $index => $resultat) {
            //     echo "Quiz " . ($index + 1) . ": ";
            //     echo "{$resultat['score']}/{$resultat['max']} ";
            //     echo "({$resultat['pourcentage']}%) - {$resultat['date']}\n";
            // }



            break;

        case "3":
            echo "Au revoir {$nom_joueur}!\n";
            break;

        default:
            echo "Choix invalide! Veuillez choisir 1, 2 ou 3.\n";
    }

} while ($choix !== "3");


/*
================================================================================
AIDE-MÉMOIRE:
================================================================================

ARRAY INDEXÉ (avec des numéros):
    $fruits = ["pomme", "banane", "orange"];
    echo $fruits[0];  // Affiche "pomme"
    echo $fruits[1];  // Affiche "banane"

ARRAY ASSOCIATIF (avec des clés nommées):
    $personne = [
        "nom" => "Dupont",
        "prenom" => "Jean",
        "age" => 25
    ];
    echo $personne["nom"];  // Affiche "Dupont"

ARRAY MULTIDIMENSIONNEL:
    $etudiants = [
        ["nom" => "Alice", "note" => 15],
        ["nom" => "Bob", "note" => 18]
    ];
    echo $etudiants[0]["nom"];   // Affiche "Alice"
    echo $etudiants[1]["note"];  // Affiche 18

FOREACH (parcourir un array):
    // Pour array indexé:
    foreach ($fruits as $fruit) {
        echo $fruit;
    }

    // Pour array avec index:
    foreach ($fruits as $index => $fruit) {
        echo "Index $index: $fruit";
    }

    // Pour array associatif:
    foreach ($personne as $cle => $valeur) {
        echo "$cle: $valeur";
    }

FONCTIONS UTILES:
    count($array)              // Nombre d'éléments
    in_array($valeur, $array)  // Vérifie si valeur existe
    array_push($array, $item)  // Ajoute un élément
    $array[] = $item           // Ajoute un élément (syntaxe courte)

CALCULS AVEC ARRAYS:
    $total = 0;
    foreach ($scores as $score) {
        $total += $score;
    }
    $moyenne = $total / count($scores);

    $max = max($scores);  // Plus grand élément
    $min = min($scores);  // Plus petit élément

================================================================================
*/
