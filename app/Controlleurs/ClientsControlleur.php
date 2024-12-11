<?php

// require_once("./../Modeles/clients.php");
require __DIR__. "/../Modeles/Clients.php";
// require __DIR__. "/../Config/Utils.php";
// require_once './../Modeles/clients.php';

//require __DIR__. "/app/Modeles/clients.php";

// function testArt($var="Super !"){
//     return "je fonctionne ". $var;
// }


function afficheTousLesClients(){
    // interroge la base de données avec la fonction app\Modele\clients : tousLesclients()
    $clients = tousLesClients();
    var_dump($clients) ;
    $clients =  [
        // 'clients' => $clients,
        'clients' => ['moi','toi','jlui'],
        'title' => 'clients',
        'count' => 42
    ];
return $clients;
}
// ...
function getAllClients() {
    $row = tousLesClients();

    foreach ($row as $key => $value) {
        echo $key;
        echo $value;
    }
    $client = [
        // Route for the home page, maps to the 'index' function of 'ArtistesController'
        'nomC' =>  $row['nomclient'],
        'prenomC' =>  $row['prenomclient'],
    ];
	return $client;
}

// function afficheTousLesClients(){
//     // interroge la base de données avec la fonction app\Modele\clients : tousLesclients()
//     $clients = tousLesClients();
//     var_dump($clients) ;
//     $data =  [
//         // 'clients' => $clients,
//         'clients' => ['moi','toi','jlui'],
//         'title' => 'clients',
//         'count' => 42
//     ];
//     return $data;
// }

// function ajoutUnClient(){
//     // interroge la base de données avec la fonction app\Modele\clients : tousLesclients()
//     $id_art = addclients();    
//     // var_dump($clients) ;
//     return $id_art;
// }

