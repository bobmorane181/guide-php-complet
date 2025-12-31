<?php
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
$nom_joueur = readline("Entrez votre nom: ");

do {
    echo "\n=== MENU PRINCIPAL ===\n";
    echo "1. Démarrer le quiz\n";
    echo "2. Afficher les règles\n";
    echo "3. Quitter\n";
    $choix = readline("Votre choix: ");

    switch ($choix) {
        case "1":
            // Lancer le quiz
            echo "\nQuestion 1: {$question1}\n";
            $reponse_user1 = readline("Votre réponse: ");

            if ($reponse_user1 === $reponse1) {
                echo "Correct!\n";
                $score += $point1;  // Opérateur +=
            } else {
                echo "Faux. La bonne réponse était: {$reponse1}\n";
            }

            // ... Répéter pour questions 2 et 3 ...
            // Question 1
            echo "\nQuestion 2: {$question2}\n";
            $reponse_user2 = readline("Votre réponse: ");

            if ($reponse_user2 === $reponse2) {
                echo "Correct!\n";
                $score += $point2;  // Opérateur +=
            } else {
                echo "Faux. La bonne réponse était: {$reponse2}\n";
            }

            // Question 1
            echo "\nQuestion 3: {$question3}\n";
            $reponse_user3 = readline("Votre réponse: ");

            if ($reponse_user3 === $reponse3) {
                echo "Correct!\n";
                $score += $point3;  // Opérateur +=
            } else {
                echo "Faux. La bonne réponse était: {$reponse3}\n";
            }


            // Afficher le score final

            if ($score === 3) {
                echo "🏆 PARFAIT! Vous êtes un expert!\n";
            } elseif ($score >= 2) {
                echo "👍 Très bien! Presque parfait!\n";
            } elseif ($score >= 1) {
                echo "😊 Pas mal! Continuez à vous améliorer!\n";
            } else {
                echo "😔 Réessayez! Vous pouvez faire mieux!\n";
            }

            break;
        case "2":
            // Afficher règles
            echo "Règles: Répondez aux 3 questions...\n";


            break;
        case "3":
            echo "Au revoir!\n";
            break;
        default:
            echo "Choix invalide!\n";
    }
} while ($choix !== "3");
