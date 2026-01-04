<?php
/*
================================================================================
PHASE 4: FICHIER DE FONCTIONS
================================================================================

Ce fichier contient toutes les fonctions réutilisables pour le quiz.
Il sera inclus dans quiz_phase4.php avec require_once

CONCEPTS CLÉS:
- Définition de fonctions
- Paramètres et arguments
- return pour renvoyer des valeurs
- Passage par référence avec &

================================================================================
*/

// TODO 1: Créer la fonction afficher_question()
// Cette fonction affiche une question formatée
// Paramètres:
//   - $question_data : array associatif avec les données de la question
//   - $numero : numéro de la question actuelle
//   - $total : nombre total de questions
// Return: rien (elle affiche directement)

function afficher_question($question_data, $numero, $total)
{
    // TODO: Afficher le numéro de question (Question X/Y)
    echo "\nQuestion " . ($numero + 1) . "/" . count($total) . "\n";

    // TODO: Afficher la catégorie
    echo "Catégorie: {$question_data['categorie']}\n";

    // TODO: Afficher la question
    echo "Question: {$question_data['question']}\n";
}


// TODO 2: Créer la fonction verifier_reponse()
// Cette fonction vérifie si une réponse est correcte
// Paramètres:
//   - $reponse_utilisateur : ce que l'utilisateur a tapé
//   - $reponse_correcte : la bonne réponse
// Return: true si correct, false sinon
// Note: La fonction doit ignorer les espaces et la casse (majuscules/minuscules)

function verifier_reponse($reponse_utilisateur, $reponse_correcte)
{
    // TODO: Nettoyer les réponses (trim + strtolower)
    if (trim(strtolower($reponse_utilisateur)) === $reponse_correcte)

    // TODO: Comparer et retourner le résultat
    {
        return true;
    } else {
        return false;
    }
}


// TODO 3: Créer la fonction calculer_pourcentage()
// Paramètres:
//   - $score : le score obtenu
//   - $total : le score maximum possible
// Return: le pourcentage arrondi à 2 décimales

function calculer_pourcentage($score, $total)
{
    // TODO: Vérifier que total > 0 pour éviter division par zéro
    if ($total >= 0)


    // TODO: Calculer et retourner le pourcentage avec round()
    {
        return round(($score / $total) * 100, 2);
    }
}


// TODO 4: Créer la fonction afficher_menu()
// Paramètres: aucun
// Return: rien (affiche directement)

function afficher_menu()
{
    // TODO: Afficher le menu avec echo


}


// TODO 5: Créer la fonction obtenir_feedback()
// Paramètres:
//   - $score : le score obtenu
//   - $max_score : le score maximum
// Return: un message de feedback (string)
// Note: Cette fonction doit UTILISER calculer_pourcentage()

function obtenir_feedback($score, $max_score)
{
    // TODO: Utiliser calculer_pourcentage() pour obtenir le %
    $pourcentage = calculer_pourcentage($score, $max_score);




    // TODO: Retourner un message selon le pourcentage
    // 100% : "🏆 PARFAIT! Vous êtes un expert!"
    // >= 80% : "🌟 EXCELLENT!"
    // >= 60% : "👍 BIEN!"
    // >= 40% : "😊 PAS MAL!"
    // < 40% : "💪 CONTINUEZ!"

    if ($pourcentage === 100) {  // ✅ Utiliser === au lieu de =
        echo " 🏆 PARFAIT! Vous êtes un expert!!\n";
    } else if ($pourcentage >= 80 && $pourcentage <= 99) {  // ✅ Utiliser && au lieu de and
        echo "🌟 EXCELLENT!\n";
    } else if ($pourcentage >= 60 && $pourcentage <= 79) {
        echo "👍 BIEN!\n";
    } else if ($pourcentage >= 40 && $pourcentage <= 59) {
        echo "😊 PAS MAL!\n";
    } else if ($pourcentage >= 0 && $pourcentage <= 39) {
        echo "💪 CONTINUEZ!\n";
    }
}


// TODO 6: Créer la fonction afficher_statistiques()
// Paramètres:
//   - $historique : array des résultats passés
// Return: rien (affiche directement)

function afficher_statistiques($historique)
{
    // TODO: Vérifier si l'historique est vide
    if (count($historique) >= 0)


    // TODO: Afficher le nombre de quiz joués
    {
        echo "Nombre de quiz joués: " . count($historique) . "\n";


        // TODO: Calculer et afficher le meilleur score
        // Astuce: parcourir l'historique avec foreach et garder le max
        $tous_les_scores = [];
        foreach ($historique as $resultat) {
            $tous_les_scores[] = $resultat['score'];
        }
        $meilleur_score = max($tous_les_scores);  //
        $total = array_sum($tous_les_scores);  // Somme de tous les scores
        echo "Meilleur score: " . $meilleur_score . "\n";



        // TODO: Calculer et afficher la moyenne
        // Astuce: sommer tous les pourcentages et diviser par count()
        $moyenne = $total / count($tous_les_scores);
        echo "Moyenne score: " . $moyenne . "\n";


        // TODO: Afficher l'historique complet
        foreach ($historique as $index => $resultat) {
            echo "Quiz " . ($index + 1) . ": ";
            echo "{$resultat['score']}/{$resultat['max']} ";
            echo "({$resultat['pourcentage']}%) - {$resultat['date']}\n";
        }
    }
}


// TODO 7: Créer la fonction ajouter_au_historique()
// Cette fonction utilise le PASSAGE PAR RÉFÉRENCE (&)
// Paramètres:
//   - &$historique : array passé par référence (sera modifié)
//   - $score : le score obtenu
//   - $max : le score maximum
// Return: rien (modifie directement l'array)

function ajouter_au_historique(&$historique, $score, $max)
{
    // TODO: Calculer le pourcentage avec la fonction calculer_pourcentage()
    $pourcentage = calculer_pourcentage($score, $max);


    // TODO: Ajouter une nouvelle entrée dans l'array
    $historique[] = [
        'score' => $score,
        'max' => $max,
        'pourcentage' => $pourcentage,
        'date' => date('Y-m-d H:i:s')
    ];
}


/*
================================================================================
AIDE-MÉMOIRE:
================================================================================

DÉFINIR UNE FONCTION:
    function nom_fonction($parametre1, $parametre2) {
        // Code de la fonction
        return $resultat;  // Optionnel
    }

APPELER UNE FONCTION:
    $resultat = nom_fonction($valeur1, $valeur2);

FONCTION SANS RETURN (procédure):
    function afficher_message($texte) {
        echo $texte;
        // Pas de return, la fonction affiche juste
    }

FONCTION AVEC RETURN:
    function additionner($a, $b) {
        return $a + $b;
    }
    $somme = additionner(5, 3);  // $somme vaut 8

PASSAGE PAR RÉFÉRENCE (&):
    function incrementer(&$nombre) {
        $nombre++;  // Modifie directement la variable passée
    }
    $x = 5;
    incrementer($x);
    echo $x;  // Affiche 6

APPELER UNE FONCTION DEPUIS UNE AUTRE:
    function calculer_total($a, $b) {
        return $a + $b;
    }

    function afficher_total($a, $b) {
        $total = calculer_total($a, $b);  // Appel de fonction
        echo "Total: $total";
    }

FONCTIONS UTILES PHP:
    trim($texte)                  // Enlève les espaces début/fin
    strtolower($texte)            // Convertit en minuscules
    strtoupper($texte)            // Convertit en majuscules
    round($nombre, $decimales)    // Arrondit un nombre
    date('Y-m-d H:i:s')          // Date et heure actuelles

================================================================================
*/
