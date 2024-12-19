<?php
require_once "./../../fonctionsBDD/Clients.php"
// require __DIR__. "/../Modeles/Clients.php";
/* 
           Client Controlleur

   toutes les fonctions qui gère des données liées :
                - à la table client
                - à la vue client
   
   en général une fonction :
     - insertion de données en base de données:
        - traite les données si besoin
        - envoie des données avec une fonction du modèle client 
        - on peut récupérer un numéro d'id pour une redirection
        - si on return quelque chose utiliser un tableau de la forme :
                $data = [ "key" => "value", "k" => "v"];

     - demande d'info à la base de données:
        - interroge le modèle client pour récupèrer les données
        - traite les données si besoin
        - envoie les données à la vue sous la forme d'un tableau
        - ce tableau est toujours au minimum de la forme :
                $data = [
                    "page" => "nom de la page dans app/Vue/page",
                    "title" => "le title de la page",
                ]
            on peut rajouter d'autre données comme
                    "indice" => $id,
                    "variable unique à une page" => $var,


 c'est le controlleur qui interroge le modèle pour
 récupérer des information
*/ 



function index(int $id): array
{
    /**
     * fonction qui retourne tous les client
     */
    $client = tousLesClients();
    
    return $data = [
        'title' => 'Clients',
        'page' => "indexClient", 
        'client' => $client,
        'indice' => $id,
    ];
}



function clientById(int $id): array
{
    /**
     * fonction qui retourne un client à partir de son id
     */
    $client= listerUnClient($id);
    
    $data =  [
        'title' => 'Client',
        'page' => "ClientById", 
        'client' => $client,
        'indice' => $id,
    ];
    return $data;
}


function delete_client(int $id): array
{
    /**
     * fonction qui supprime un client en BDD à partir de son $id
     */

    $modal=  "<div id='deleteClientModal'class='modal' tabindex='-1' role='dialog'>" . // '.' pour concaténé toutes les strings
            "    <div class='modal-dialog' role='document'>" .
            "        <div class='modal-content'>" .
            "            <div class='modal-header'>" .
            "            <h5 class='modal-title bg-danger'>Attention suppression client</h5>" .
            "            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>" .
            "                <span aria-hidden='true'>&times;</span>" .
            "            </button>" .
            "            </div>" .
            "            <div class='modal-body'>" .
            "            <p>Modal body text goes here.</p>" .
            "            </div>" .
            "            <div class='modal-footer'>" .
            "            <button type='button' class='btn btn-danger'>Supprimer le clients</button>" .
            "            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>" .
            "            </div>" .
            "        </div>" .
            "    </div>" .
            "</div>"
    deleteClient($id);

    return $modal
}


function updateClient(int $id): array
{
    /**
     * fonction qui update un client à partir de son id
     */
    // chercher les info en base de données
    $client= listerUnClient($id);

    if (count($_POST) > 0)
    {
        echo "on a les variables post";
        echo "on va update";
        var_dump_pre($_POST);
        //enregistrer en BDD
        //isset($_POST['nomAritste'])
        // récupérer les nouvelles infos dans la BDD

        // on renvoie vers la page clientById
        return $data =  [
            'title' => $client['nomclient'],
            'page' => "ClientById", 
            'client' => $client,
            'indice' => $id,
        ];
    }
    else
    {
        echo "on pas de variable post";
        echo "on vas envoyer les variables au form";
        var_dump_pre($client);
        
        // on envoie à la vue les client pour remplir le formulaire
        return $data =  [
            'title' => 'Client update',
            'page' => "updateClient", 
            'client' => $client,
            'indice' => $id,
        ];
    }
    

    // $var = "";
    // var_dump_pre($_POST);
    // $nom = isset($_GET['nodescriptionm']) ? $_GET['description'] : $client['description'] ; 
    // $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : $client['prenomclient'] ; 
    // $ville = isset($_GET['ville']) ? $_GET['ville'] : $client['villertiste'] ; 
    // $pays = isset($_GET['pays']) ? $_GET['pays'] : $client['paysrtiste'] ; 
    // $email = isset($_GET['email']) ? $_GET['email'] : $client['emailrtiste'] ; 


    // if ($_GET["description"]){
    //     $var=$var."description = '".$_GET["description"]."', ";
    // }
    // if ($_GET["prenom"]){
    //     $var=$var."prenomclient = '".$_GET["prenom"]."', ";
    // }
    // if ($_GET["ville"]){
    //     $var=$var."ville = '".$_GET["ville"]."', ";
    // }
    // if ($_GET["pays"]){
    //     $var=$var."pays = '".$_GET["pays"]."', ";
    // }
    // if ($_GET["email"]){
    //     $var=$var."email = '".$_GET["email"]."', ";
    // }
    // $var=rtrim($var, ", ");
    // enregistremodif_client($var, $_GET["idclient"], $conn1);

 }