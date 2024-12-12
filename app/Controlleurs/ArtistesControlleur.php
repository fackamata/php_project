<?php
require __DIR__. "/../Modeles/Artistes.php";
/* 
           Artiste Controlleur

   toutes les fonctions qui gère des données liées :
                - à la table artiste
                - à la vue artiste
   
   en général une fonction :
     - insertion de données en base de données:
        - traite les données si besoin
        - envoie des données avec une fonction du modèle artiste 
        - on peut récupérer un numéro d'id pour une redirection
        - si on return quelque chose utiliser un tableau de la forme :
                $data = [ "key" => "value", "k" => "v"];

     - demande d'info à la base de données:
        - interroge le modèle artiste pour récupèrer les données
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


/**
 * fonction qui retourne tous les artistes
 */
function index(int $id): array
{
    // echo "fonction index artiste ";
    $artistes = tousLesArtistes();
    
    return $data = [
        'title' => 'Artistes',
        'page' => "indexArtiste", 
        'artistes' => $artistes,
        'indice' => $id,
    ];
}


/**
 * fonction qui retourne un artiste à partir de son id
 */
function artisteById(int $id): array
{
    $artistes= listerUnArtiste($id);
    
    $data =  [
        'title' => 'Artiste',
        'page' => "ArtisteById", 
        'artistes' => $artistes,
        'indice' => $id,
    ];
    return $data;
}

/**
 * fonction qui update un artiste à partir de son id
 */
function updateArtiste(int $id): array
{
    $artistes= listerUnArtiste($id);

    if (count($_POST) > 0)
    {
        echo "on a les variables post";
        echo "on va update";
        var_dump_pre($_POST);
        //enregistrer en BDD
        
        // récupérer les nouvelles infos dans la BDD

        // on renvoie vers la page artisteById
        return $data =  [
            'title' => $artistes['nomartiste'],
            'page' => "updateArtiste", 
            'artistes' => $artistes,
            'indice' => $id,
        ];
    }
    else
    {
        echo "on pas de variable post";
        echo "on vas envoyer les variables au form";
        var_dump_pre($artistes);

        return $data =  [
            'title' => 'Artiste update',
            'page' => "updateArtiste", 
            'artistes' => $artistes,
            'indice' => $id,
        ];
    }
    

    // $var = "";
    // var_dump_pre($_POST);
    // $nom = isset($_GET['nodescriptionm']) ? $_GET['description'] : $artistes['description'] ; 
    // $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : $artistes['prenomartiste'] ; 
    // $ville = isset($_GET['ville']) ? $_GET['ville'] : $artistes['villertiste'] ; 
    // $pays = isset($_GET['pays']) ? $_GET['pays'] : $artistes['paysrtiste'] ; 
    // $email = isset($_GET['email']) ? $_GET['email'] : $artistes['emailrtiste'] ; 


    // if ($_GET["description"]){
    //     $var=$var."description = '".$_GET["description"]."', ";
    // }
    // if ($_GET["prenom"]){
    //     $var=$var."prenomartiste = '".$_GET["prenom"]."', ";
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
    // enregistremodif_artiste($var, $_GET["idartiste"], $conn1);

 }