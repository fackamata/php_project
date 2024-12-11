<?php


/**
 * Fonction pour afficher les vues
 */
function renderView($viewPath, $data = [], $title = "Titre page")
{
    // Extract the data array into individual variables
    extract($data);
    // Include the layout file from the views directory
    require_once '../app/templates/layout.php';
}

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
 * Fonction pour faire un print_r avec <pre>
 */
function test($var="juste pour voir si ça marche"){
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



function parseUrl()
{
    if (isset($_GET['REQUEST_URI'])) {
        // Trim any trailing slashes from the URL, sanitize it, and split it into an array
        return explode('/', filter_var(rtrim($_GET['REQUEST_URI'], '/'), FILTER_SANITIZE_URL));
    }
}

