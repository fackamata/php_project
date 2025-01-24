<?php

/**
 * fonction pour envoyer la bonne page en fonction de l'uri
 *      - la liste de tous les clients
 *      - la page à afficher
 *      - le titre de la page
*/
function index_home(): array
{
    // require_once "ClientController.php";

    // $clients = get_all_clients();

    return [
        // 'clients' => $clients,
        'page' => 'index_home',
        'title' => 'Admin Marlène',
        // 'clients' => $clients,
    ];
}
    
/**
 * fonction pour envoyer la bonne page en fonction de l'uri
 *      - la liste de tous les clients
 *      - la page à afficher
 *      - le titre de la page
*/
function return_home(): array
{
    header("location: ".SRV_PATH);
}
    

/**
 * fonction vérifie que le bon utilisateur soit connecté au serveur
*/
function is_auth_as($srv_user = "lizzim"): bool
{
        
    if (isset($_SERVER['PHP_AUTH_USER']) And $_SERVER['PHP_AUTH_USER'] == $srv_user) {
        ?>
        <p>Hello <?php echo $_SERVER['PHP_AUTH_USER']?>.</p>
        <?php
        $auth = False;
    } else {
        ?>
        <p>Hello <?php echo $_SERVER['PHP_AUTH_USER']?>.</p>
        <p>Vous n'êtes pas autoriser à acceder à cette ressources</p>
        <p>Seulement </p>
        <?php
        $auth = True;
    }
    
    return $auth;
}
    


    