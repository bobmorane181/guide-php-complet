<?php
$question1 = "Quelle est la capitale de la France?";
$reponse1 = "Paris";
$point1 = 1;

$question2 = "";
$reponse2 = "";
$point2 = 0;

$question3 = "";
$reponse3 = "";
$point3 = 0;

$score = 0;
$nom_joueur = readline("Entrez votre nom: ");

// Question 1
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

if ($reponse_user2 === $reponse1) {
    echo "Correct!\n";
    $score += $point2;  // Opérateur +=
} else {
    echo "Faux. La bonne réponse était: {$reponse2}\n";
}

// Question 1
echo "\nQuestion 3: {$question3}\n";
$reponse_user2 = readline("Votre réponse: ");

if ($reponse_user3 === $reponse3) {
    echo "Correct!\n";
    $score += $point3;  // Opérateur +=
} else {
    echo "Faux. La bonne réponse était: {$reponse3}\n";
}


// Afficher le score final
$message_final = "Félicitations {$nom_joueur}, vous avez obtenu {$score} points!";
echo "\n{$message_final}\n";
