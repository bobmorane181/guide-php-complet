<?php
/*
================================================================================
PHASE 2: AJOUTER DE LA LOGIQUE
================================================================================

MODULES CONCERNÉS: Module 3 (Structures de contrôle)
COMPLEXITÉ: ⭐⭐ Simple
FICHIER: quiz_phase2.php

CONCEPTS PRATIQUÉS:
-------------------
✓ Instructions if/else/elseif
✓ Opérateur ternaire (? :)
✓ Switch pour gérer différents cas
✓ Truthy/Falsy
✓ Opérateur || (OR logique)
✓ Boucle do...while

OBJECTIF:
---------
Améliorer le quiz de la Phase 1 en ajoutant:
- Un menu interactif avec switch
- Validation des entrées
- Feedback personnalisé selon le score
- Possibilité de rejouer

CRITÈRES DE RÉUSSITE:
---------------------
✅ Le menu fonctionne avec toutes les options (1, 2, 3)
✅ Le feedback s'adapte au score obtenu
✅ Les validations empêchent les entrées vides
✅ Switch utilise break correctement
✅ L'utilisateur peut rejouer sans relancer le script
✅ Opérateur ternaire utilisé au moins une fois

POUR TESTER:
------------
php Apprentissage/module02/quiz_phase2.php

================================================================================
*/

// TODO 1: Copier les variables de questions de la Phase 1
// $question1 = ...
// $reponse1 = ...
// $point1 = ...
// Idem pour questions 2 et 3
$question1 = "Quelle est la capitale de la France?";
$reponse1 = "Paris";
$point1 = 1;

$question2 = "ok2?";
$reponse2 = "ok2";
$point2 = 1;

$question3 = "ok3?";
$reponse3 = "ok3";
$point3 = 1;

$score = 0;

// TODO 2: Demander le nom du joueur
$nom_joueur = readline("Entrez votre nom: ");



// TODO 3: Créer la boucle principale avec do...while pour le menu
// La boucle doit continuer tant que l'utilisateur ne choisit pas "3" (Quitter)

do {
    // TODO 4: Afficher le menu
    // echo "\n=== MENU PRINCIPAL ===\n";
    // echo "1. Démarrer le quiz\n";
    // echo "2. Afficher les règles\n";
    // echo "3. Quitter\n";
    echo "\n=== MENU PRINCIPAL ===\n";
    echo "1. Démarrer le quiz\n";
    echo "2. Afficher les règles\n";
    echo "3. Quitter\n";


    // TODO 5: Demander le choix avec readline()
    $choix = readline("Votre choix: ");


    // TODO 6: Utiliser switch pour traiter le choix
    switch ($choix) {
        case "1":
            do {
                // TODO 7: LANCER LE QUIZ
                // Réinitialiser le score
                $score = 0;
                // Question 1
                // TODO 8: Afficher la question 1 avec echo et interpolation
                echo "\nQuestion 1: {$question1}\n";



                // TODO 9: Demander la réponse avec readline()
                $reponse_user1 = readline("Votre réponse: ");

                // TODO 10: Valider que la réponse n'est pas vide (truthy/falsy)
                // if (!$reponse_user1) {
                //     echo "Erreur: La réponse ne peut pas être vide!\n";
                //     break;  // Sortir du switch
                // }
                if (!$reponse_user1) {
                    echo "Erreur: La réponse ne peut pas être vide!\n";
                    break;  // Sortir du switch
                }

                // TODO 11: Vérifier la réponse avec ===
                if ($reponse_user1 === $reponse1) {
                    echo "Correct!\n";
                    $score += $point1;  // Opérateur +=
                } else {
                    echo "Faux. La bonne réponse était: {$reponse1}\n";
                }



                // Question 2
                // TODO 12: Répéter le même processus pour question 2


                echo "\nQuestion 2: {$question2}\n";
                $reponse_user2 = readline("Votre réponse: ");
                if (!$reponse_user2) {
                    echo "Erreur: La réponse ne peut pas être vide!\n";
                    break;  // Sortir du switch
                }

                if ($reponse_user2 === $reponse2) {
                    echo "Correct!\n";
                    $score += $point2;  // Opérateur +=
                } else {
                    echo "Faux. La bonne réponse était: {$reponse2}\n";
                }



                // Question 3
                // TODO 13: Répéter le même processus pour question 3

                echo "\nQuestion 3: {$question3}\n";
                $reponse_user3 = readline("Votre réponse: ");
                if (!$reponse_user3) {
                    echo "Erreur: La réponse ne peut pas être vide!\n";
                    break;  // Sortir du switch
                }

                if ($reponse_user3 === $reponse3) {
                    echo "Correct!\n";
                    $score += $point3;  // Opérateur +=
                } else {
                    echo "Faux. La bonne réponse était: {$reponse3}\n";
                }



                // TODO 14: Afficher un feedback personnalisé selon le score avec if/elseif/else
                // if ($score === 3) {
                //     echo "🏆 PARFAIT! Vous êtes un expert!\n";
                // } elseif ($score >= 2) {
                //     echo "👍 Très bien! Presque parfait!\n";
                // } elseif ($score >= 1) {
                //     echo "😊 Pas mal! Continuez à vous améliorer!\n";
                // } else {
                //     echo "😔 Réessayez! Vous pouvez faire mieux!\n";
                // }

                if ($score === 3) {
                    echo "🏆 PARFAIT! Vous êtes un expert!\n";
                } elseif ($score >= 2) {
                    echo "👍 Très bien! Presque parfait!\n";
                } elseif ($score >= 1) {
                    echo "😊 Pas mal! Continuez à vous améliorer!\n";
                } else {
                    echo "😔 Réessayez! Vous pouvez faire mieux!\n";
                }



                // TODO 15: Demander si l'utilisateur veut rejouer avec opérateur ||
                // Accepter "oui", "o", ou "y" comme réponses positives
                // $rejouer = readline("\nVoulez-vous rejouer? (oui/non): ");
                // if ($rejouer === "oui" || $rejouer === "o" || $rejouer === "y") {
                //     echo "C'est parti pour un nouveau quiz!\n";
                // }
                $rejouer = readline("\nVoulez-vous rejouer? (oui/non): ");
                if ($rejouer === "oui" || $rejouer === "o" || $rejouer === "y") {
                    echo "C'est parti pour un nouveau quiz!\n";
                }
            } while ($rejouer === "oui" || $rejouer === "o" || $rejouer === "y");

            echo "Retour au menu principal...\n";
            break;
        case "2":
            // TODO 16: Afficher les règles du jeu
            echo "\n=== RÈGLES DU JEU ===\n";
            echo "- Répondez aux 3 questions\n";
            echo "- Chaque bonne réponse vaut 1 point\n";
            echo "- Score maximum: 3 points\n";
            echo "- Les réponses sont sensibles à la casse\n";


            break;

        case "3":
            // TODO 17: Message de sortie


            break;

        default:
            // TODO 18: Gérer les choix invalides


    }
} while ($choix !== "3");

// TODO 19 (BONUS): Utiliser l'opérateur ternaire quelque part
// Exemple:
$message = ($score >= 2) ? "Excellent!" : "Continuez à pratiquer!";
echo $message;


/*
================================================================================
AIDE-MÉMOIRE:
================================================================================

STRUCTURE IF/ELSEIF/ELSE:
    if ($score === 3) {
        echo "Parfait!";
    } elseif ($score >= 2) {
        echo "Très bien!";
    } else {
        echo "Continuez!";
    }

SWITCH:
    switch ($choix) {
        case "1":
            // Code pour choix 1
            break;  // Important! Sinon continue au case suivant
        case "2":
            // Code pour choix 2
            break;
        default:
            // Code si aucun case ne correspond
    }

DO...WHILE:
    do {
        // Code exécuté au moins une fois
        $choix = readline("Votre choix: ");
    } while ($choix !== "3");  // Continue tant que condition est vraie

TRUTHY/FALSY:
    if (!$reponse) {  // Vrai si $reponse est vide ("", 0, null, false)
        echo "Vide!";
    }

OPÉRATEUR || (OR):
    if ($reponse === "oui" || $reponse === "o") {
        echo "Accepté!";
    }

OPÉRATEUR TERNAIRE:
    $message = ($age >= 18) ? "Majeur" : "Mineur";
    // Équivalent à:
    // if ($age >= 18) {
    //     $message = "Majeur";
    // } else {
    //     $message = "Mineur";
    // }

================================================================================
*/
