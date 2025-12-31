<?php
/*
================================================================================
PHASE 5: BOUCLES ET RÉPÉTITIONS
================================================================================

MODULES CONCERNÉS: Module 5 (Boucles avancées)
COMPLEXITÉ: ⭐⭐⭐ Moyen
FICHIERS: 1-2 fichiers PHP avec functions.php

CONCEPTS PRATIQUÉS:
-------------------
✓ Boucle while pour répéter le quiz
✓ Boucle for avec compteur
✓ foreach pour parcourir
✓ break pour quitter une boucle
✓ continue pour passer à l'itération suivante
✓ do...while pour menu

OBJECTIF:
---------
Ajouter des fonctionnalités avancées avec les boucles:
- Permettre de passer une question (skip)
- Permettre d'abandonner le quiz (quit)
- Compte à rebours avant le quiz
- Validation robuste des entrées

CRITÈRES DE RÉUSSITE:
---------------------
✅ Utilisateur peut rejouer sans relancer le script
✅ "skip" fonctionne avec continue
✅ "quit" fonctionne avec break
✅ Compte à rebours utilise for
✅ Menu persiste avec do...while
✅ Validation utilise while

POUR TESTER:
------------
php Apprentissage/module05/quiz_phase5.php

================================================================================
*/

require_once '../module04/functions.php';

$questions = [
    // Copier vos questions de la Phase 4
];

$historique_scores = [];
$nom_joueur = readline("Entrez votre nom: ");

// TODO 1: Boucle principale avec do...while
do {
    afficher_menu();

    // TODO 2: Ajouter option "4. Mode Défi" au menu


    $choix = readline("Votre choix: ");

    switch ($choix) {
        case "1":
            // QUIZ NORMAL

            // TODO 3: Compte à rebours avant de commencer (boucle for)
            // Afficher "Le quiz commence dans: 3... 2... 1... GO!"
            echo "\n🎯 Préparation du quiz...\n";
            echo "Le quiz commence dans: ";

            // for ($i = 3; $i > 0; $i--) {
            //     echo "$i... ";
            //     sleep(1);  // Pause d'1 seconde
            // }
            // echo "GO!\n\n";


            $score = 0;
            $total_points = 0;
            $questions_repondues = 0;
            $questions_sautees = 0;

            // TODO 4: Utiliser foreach pour parcourir les questions
            foreach ($questions as $index => $question_data) {

                afficher_question($question_data, $index + 1, count($questions));

                // TODO 5: Boucle while pour valider l'entrée
                // L'utilisateur peut:
                // - Répondre normalement
                // - Taper "skip" pour passer la question (continue)
                // - Taper "quit" pour abandonner le quiz (break)

                $reponse_valide = false;

                while (!$reponse_valide) {
                    // TODO 6: Demander la réponse
                    echo "(Tapez 'skip' pour passer ou 'quit' pour abandonner)\n";


                    // TODO 7: Gérer "quit" avec break
                    // if (strtolower($reponse_user) === "quit") {
                    //     echo "❌ Quiz abandonné.\n";
                    //     break 2;  // break 2 sort des 2 boucles (while ET foreach)
                    // }


                    // TODO 8: Gérer "skip" avec continue
                    // if (strtolower($reponse_user) === "skip") {
                    //     echo "⏭ Question passée.\n";
                    //     $questions_sautees++;
                    //     continue 2;  // continue 2 passe à l'itération suivante du foreach
                    // }


                    // TODO 9: Vérifier que la réponse n'est pas vide
                    // if (trim($reponse_user) === "") {
                    //     echo "⚠ La réponse ne peut pas être vide. Réessayez.\n";
                    //     continue;  // Redemande la réponse
                    // }


                    $reponse_valide = true;  // Sortir de la boucle while
                }

                // TODO 10: Vérifier la réponse
                if (verifier_reponse($reponse_user, $question_data['reponse'])) {
                    echo "✓ Correct!\n";
                    $score += $question_data['points'];
                } else {
                    echo "✗ Faux. La bonne réponse était: {$question_data['reponse']}\n";
                }

                $total_points += $question_data['points'];
                $questions_repondues++;
            }

            // TODO 11: Afficher les résultats
            echo "\n=== RÉSULTATS ===\n";
            // echo "Questions répondues: $questions_repondues/" . count($questions) . "\n";
            // echo "Questions sautées: $questions_sautees\n";
            // echo obtenir_feedback($score, $total_points) . "\n";
            // echo "Score: {$score}/{$total_points}\n";


            ajouter_au_historique($historique_scores, $score, $total_points);

            break;

        case "2":
            afficher_statistiques($historique_scores);
            break;

        case "3":
            echo "Au revoir {$nom_joueur}!\n";
            break;

        case "4":
            // TODO 12 (BONUS): Mode Défi
            // Le mode défi pose les questions dans un ordre aléatoire
            // et ne permet pas de skip

            echo "\n🔥 MODE DÉFI ACTIVÉ!\n";
            echo "Règles: questions aléatoires, pas de skip possible!\n\n";

            // TODO 13: Copier et mélanger les questions
            // $questions_defi = $questions;
            // shuffle($questions_defi);  // Mélange l'array


            // TODO 14: Utiliser un compteur avec while
            // $index = 0;
            // $score_defi = 0;
            // $total_defi = 0;

            // while ($index < count($questions_defi)) {
            //     $question_data = $questions_defi[$index];

            //     // Afficher et poser la question
            //     // Pas de skip autorisé!

            //     $index++;
            // }


            break;

        default:
            echo "Choix invalide!\n";
    }

} while ($choix !== "3");


/*
================================================================================
AIDE-MÉMOIRE:
================================================================================

BOUCLE FOR (compteur):
    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }

    // Compte à rebours:
    for ($i = 5; $i > 0; $i--) {
        echo "$i... ";
    }

BOUCLE WHILE (tant que):
    $continuer = true;
    while ($continuer) {
        $reponse = readline("Continuer? (oui/non): ");
        if ($reponse === "non") {
            $continuer = false;
        }
    }

BOUCLE DO...WHILE (au moins une fois):
    do {
        $choix = readline("Votre choix: ");
    } while ($choix !== "quitter");

FOREACH (parcourir array):
    foreach ($array as $element) {
        echo $element;
    }

BREAK (sortir de la boucle):
    for ($i = 0; $i < 10; $i++) {
        if ($i === 5) {
            break;  // Sort de la boucle
        }
    }

    // Break multiniveau:
    foreach ($questions as $q) {
        while (true) {
            $reponse = readline();
            if ($reponse === "quit") {
                break 2;  // Sort du while ET du foreach
            }
        }
    }

CONTINUE (passer à l'itération suivante):
    for ($i = 0; $i < 10; $i++) {
        if ($i % 2 === 0) {
            continue;  // Passe les nombres pairs
        }
        echo $i;  // Affiche seulement les impairs
    }

    // Continue multiniveau:
    foreach ($questions as $q) {
        while (true) {
            $reponse = readline();
            if ($reponse === "skip") {
                continue 2;  // Passe à la question suivante
            }
        }
    }

FONCTIONS UTILES:
    shuffle($array)  // Mélange un array aléatoirement
    sleep($secondes) // Pause le script (1 = 1 seconde)
    usleep($microsecondes)  // Pause en microsecondes (1000000 = 1 sec)

================================================================================
DIFFÉRENCES BREAK VS CONTINUE:
================================================================================

BREAK: Sort complètement de la boucle
    for ($i = 0; $i < 5; $i++) {
        if ($i === 3) break;
        echo "$i ";
    }
    // Affiche: 0 1 2

CONTINUE: Passe à l'itération suivante
    for ($i = 0; $i < 5; $i++) {
        if ($i === 3) continue;
        echo "$i ";
    }
    // Affiche: 0 1 2 4 (saute le 3)

================================================================================
*/
