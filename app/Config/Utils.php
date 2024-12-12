<?php
/* 
           Config Utlis

   toutes les fonctions non liées à la base de données
   
   toutes sortes de fonction qui peuvent être utiles
   
   dès lors qu'un traitement est fait plusieurs fois on essaie de le faire ici

*/ 


/**
 * Fonction de traitement des champs input
 * 
 * utiliser dans tous les formulaires pour simplifier la sécurisation
 * 
 */
function clearInput($input){
    $strCleared = trim($input);
    $strCleared = strip_tags($strCleared);
    $strCleared = stripslashes($strCleared);
    $strCleared = str_replace("/", "", $strCleared);
    $strCleared = htmlspecialchars($strCleared, ENT_QUOTES);
    return $strCleared;
}


/**
 * Fonction pour faire un print_r avec <pre>
 */
function pprint($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

/**
 * Fonction pour faire un var_dump avec <pre>
 */
function var_dump_pre($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
