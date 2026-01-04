<?php
/*
================================================================================
PHASE 4: MODULARISER AVEC DES FONCTIONS
================================================================================

MODULES CONCERNÉS: Module 5 (Fonctions)
COMPLEXITÉ: ⭐⭐⭐ Moyen
FICHIERS: quiz_phase4.php, functions.php

CONCEPTS PRATIQUÉS:
-------------------
✓ Créer des fonctions personnalisées
✓ Paramètres et arguments
✓ return pour renvoyer des valeurs
✓ Scope des variables
✓ Imbrication de fonctions
✓ Passage par référence (&)

OBJECTIF:
---------
Réorganiser le code de la Phase 3 en utilisant des fonctions pour:
- Rendre le code plus lisible
- Éviter la répétition
- Faciliter la maintenance
- Séparer la logique en modules

CRITÈRES DE RÉUSSITE:
---------------------
✅ Code principal court et lisible
✅ Toutes les fonctions ont une responsabilité unique
✅ return renvoie les valeurs appropriées
✅ Scope des variables respecté
✅ obtenir_feedback() appelle calculer_pourcentage()
✅ ajouter_au_historique() utilise passage par référence
✅ Fonctions bien documentées

POUR TESTER:
------------
php Apprentissage/module04/quiz_phase4.php

================================================================================
*/

// TODO 1: Inclure le fichier de fonctions
require_once 'functions.php';


// TODO 2: Copier l'array de questions de la Phase 3
$questions =  [
    // TODO 2: Ajouter la première question (exemple fourni)
    [
        "question" => "Quelle est la capitale de la France?",
        "reponse" => "Paris",
        "points" => 1,
        "categorie" => "Géographie"
    ],

    // TODO 3: Ajouter 4 autres questions
    // Exemple de structure:
    [
        "question" => "Question 2?",
        "reponse" => "Reponse 2",
        "points" => 1,
        "categorie" => "Catégorie"
    ],
    [
        "question" => "Question 3?",
        "reponse" => "Reponse 3",
        "points" => 1,
        "categorie" => "Catégorie"
    ],
    [
        "question" => "Question 4?",
        "reponse" => "Reponse 4",
        "points" => 1,
        "categorie" => "Catégorie"
    ],
    [
        "question" => "Question 5",
        "reponse" => "Reponse 5",
        "points" => 1,
        "categorie" => "Catégorie"
    ],




];


// TODO 3: Initialiser l'historique
$historique_scores = [];


// TODO 4: Demander le nom du joueur
$nom_joueur = readline("Entrez votre nom: ");

// TODO 5: Boucle principale du menu
do {
    // TODO 6: Appeler la fonction afficher_menu()


    $choix = readline("Votre choix: ");

    switch ($choix) {
        case "1":
            // LANCER LE QUIZ

            $score = 0;
            $total_points = 0;

            // TODO 7: Parcourir les questions avec foreach
            foreach ($questions as $index => $question_data) {

                // TODO 8: Appeler afficher_question()
                afficher_question($question_data, $index + 1, count($questions));


                // TODO 9: Demander la réponse
                $reponse_user = readline("Votre réponse: ");

                // TODO 10: Utiliser verifier_reponse() au lieu de comparer manuellement
                if (verifier_reponse($reponse_user, $question_data['reponse'])) {
                    echo "✓ Correct!\n";
                    $score += $question_data['points'];
                } else {
                    echo "✗ Faux. La bonne réponse était: {$question_data['reponse']}\n";
                }


                $total_points += $question_data['points'];
            }

            // TODO 11: Utiliser obtenir_feedback() pour le message final
            $message_feedback = obtenir_feedback($score, $total_points);
            echo "\n$message_feedback\n";
            echo "Score: {$score}/{$total_points}\n";


            // TODO 12: Utiliser ajouter_au_historique() avec passage par référence
            ajouter_au_historique($historique_scores, $score, $total_points);
            // Note: $historique_scores sera modifié directement (passage par référence)


            break;

        case "2":
            // AFFICHER STATISTIQUES

            // TODO 13: Appeler afficher_statistiques()
            afficher_statistiques($historique_scores);


            break;

        case "3":
            echo "Au revoir!\n";
            break;

        default:
            echo "Choix invalide!\n";
    }
} while ($choix !== "3");


/*
================================================================================
COMPARAISON AVANT/APRÈS:
================================================================================

AVANT (Phase 3):
    $user_clean = trim(strtolower($reponse_user));
    $correct_clean = trim(strtolower($question_data['reponse']));
    if ($user_clean === $correct_clean) {
        echo "Correct!";
        $score += $question_data['points'];
    }

APRÈS (Phase 4):
    if (verifier_reponse($reponse_user, $question_data['reponse'])) {
        echo "Correct!";
        $score += $question_data['points'];
    }

AVANTAGES:
✓ Plus court et lisible
✓ Logique réutilisable
✓ Facile à tester séparément
✓ Facile à modifier (un seul endroit)

================================================================================
AIDE-MÉMOIRE:
================================================================================

INCLURE UN FICHIER:
    require_once 'functions.php';
    // require_once: inclut une seule fois, erreur si fichier manquant
    // include_once: inclut une seule fois, warning si fichier manquant
    // require: inclut à chaque fois, erreur si fichier manquant
    // include: inclut à chaque fois, warning si fichier manquant

APPEL DE FONCTION:
    $resultat = ma_fonction($arg1, $arg2);

PASSAGE PAR VALEUR (par défaut):
    function doubler($nombre) {
        $nombre = $nombre * 2;
        return $nombre;
    }
    $x = 5;
    $y = doubler($x);
    echo $x;  // Affiche 5 (non modifié)
    echo $y;  // Affiche 10

PASSAGE PAR RÉFÉRENCE (avec &):
    function doubler_ref(&$nombre) {
        $nombre = $nombre * 2;
    }
    $x = 5;
    doubler_ref($x);
    echo $x;  // Affiche 10 (modifié directement)

SCOPE DES VARIABLES:
    $global = "Je suis global";

    function test() {
        $locale = "Je suis locale";
        echo $global;  // ERREUR: variable non définie

        global $global;  // Maintenant accessible
        echo $global;    // Fonctionne
    }

    echo $locale;  // ERREUR: variable non définie (hors scope)

BONNES PRATIQUES:
✓ Un nom de fonction doit décrire ce qu'elle fait
✓ Une fonction devrait faire UNE chose et la faire bien
✓ Éviter les fonctions trop longues (> 50 lignes)
✓ Préférer return aux variables globales
✓ Documenter les fonctions complexes

================================================================================
*/
