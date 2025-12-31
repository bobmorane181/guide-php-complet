<?php
/*
================================================================================
PHASE 1: PREMIERS PAS AVEC LES QUESTIONS
================================================================================

MODULES CONCERNÉS: Module 1-2 (Bases, Variables, Opérateurs)
COMPLEXITÉ: ⭐ Très simple
FICHIER: quiz_phase1.php

CONCEPTS PRATIQUÉS:
-------------------
✓ Variables et interpolation avec ${}
✓ Chaînes de caractères
✓ Opérateur de concaténation (.=)
✓ Opérateurs d'assignation combinés (+=)
✓ Comparaison stricte (===)
✓ readline() pour entrée utilisateur

OBJECTIF:
---------
Créer un quiz simple avec 3 questions qui demande à l'utilisateur de répondre
et calcule le score final.

CRITÈRES DE RÉUSSITE:
---------------------
✅ Les 3 questions s'affichent correctement
✅ Le score se calcule correctement (0, 1, 2 ou 3 points)
✅ L'interpolation fonctionne avec ${}
✅ Le code utilise .= pour construire des messages
✅ La comparaison utilise === (stricte)

POUR TESTER:
------------
php Apprentissage/module01/quiz_phase1.php

================================================================================
*/

// TODO 1: Créer les variables pour la question 1
// Exemple: $question1 = "Quelle est la capitale de la France?";
//          $reponse1 = "Paris";
//          $point1 = 1;




// TODO 2: Créer les variables pour la question 2
// Exemple: $question2 = "Combien font 5 + 3?";
//          $reponse2 = "8";
//          $point2 = 1;




// TODO 3: Créer les variables pour la question 3
// Exemple: $question3 = "Quelle est la couleur du ciel?";
//          $reponse3 = "bleu";
//          $point3 = 1;




// TODO 4: Initialiser le score à 0




// TODO 5: Demander le nom du joueur avec readline()
// Exemple: $nom_joueur = readline("Entrez votre nom: ");




// TODO 6: Afficher et poser la question 1
// Exemple: echo "\nQuestion 1: {$question1}\n";
//          $reponse_user1 = readline("Votre réponse: ");




// TODO 7: Vérifier la réponse 1 avec === et mettre à jour le score
// Si la réponse est correcte, afficher "Correct!" et ajouter les points avec +=
// Sinon, afficher "Faux. La bonne réponse était: {$reponse1}"




// TODO 8: Répéter pour la question 2
// N'oubliez pas:
// - Afficher "Question 2: ..." avec interpolation {}
// - Utiliser readline() pour obtenir la réponse
// - Comparer avec ===
// - Utiliser $score += $point2 si correct




// TODO 9: Répéter pour la question 3




// TODO 10: Afficher le score final
// Exemple: $message_final = "Félicitations {$nom_joueur}, vous avez obtenu {$score} points!";
//          echo "\n{$message_final}\n";




/*
================================================================================
AIDE-MÉMOIRE:
================================================================================

INTERPOLATION avec {}:
    echo "Bonjour {$nom}, vous avez {$age} ans\n";

COMPARAISON STRICTE:
    if ($reponse === "Paris") {  // Vérifie valeur ET type
        echo "Correct!";
    }

OPÉRATEUR +=:
    $score += 1;      // Équivalent à: $score = $score + 1;
    $score += $points; // Ajoute la valeur de $points au score

OPÉRATEUR .= (concaténation):
    $message = "Bonjour";
    $message .= " le monde";  // $message vaut maintenant "Bonjour le monde"

readline():
    $nom = readline("Entrez votre nom: ");  // Affiche le message et attend l'entrée

================================================================================
*/
