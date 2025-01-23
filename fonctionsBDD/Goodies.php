<?php

require_once './../fonctionsBDD/ConnectionBDD.php';

function get_all_goodies(){
    /**
     * Récupère dans la base de donnée toutes les infos de tous les objets.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql="SELECT * FROM objects"; // Requette envoyer à la BDD pour récupérer des infos
    // print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos de l'objet : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

// function get_goodies_by_name($nomobject){
//     /**
//      * Récupère dans la base de donnée toutes les infos des objets portant le nom passer en paramètre.
//     * 
//     */
//     $connex=connectionBDD(); //Connexion à la BDD
//     try {
//     $sql="SELECT * FROM objetcs WHERE nomobject = '".$nomobject."'"; // Requette envoyer à la BDD pour récupérer des infos
//     print $sql;
//     $res=$connex->query($sql);
//     $resu=$res->fetchAll();
//     }
//     catch (Exception $e) { //Si échec
//         print "Erreur pour retourner les infos de l'objet : " . $e->getMessage();
//         $resu = [];
//         die(""); //Arrêt du script
//     }
//     disconnectionBDD($connex); //Deconnexion de la BDD
//     return $resu;
// }

function get_goodies_by_id($idobject){
    /**
     * Récupère dans la base de donnée toutes les infos de l'objet ayant l'id passer en paramètre et les infos de l'oeuvre
     * à laquelle il est rataché et donc l'artiste de l'oeuvre.
     */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
        $sql="SELECT * FROM oeuvres INNER JOIN objects 
        ON objects.refidoeuvre=oeuvres.idoeuvre 
        WHERE objects.idobject=$idobject;"; // Requette envoyer à la BDD pour récupérer des info
        // $sql="SELECT * FROM objetcs WHERE idobject = $idobject "; // Requette envoyer à la BDD pour récupérer des infos
        // print $sql;
        $res=$connex->query($sql);
        $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos de l'objet : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function delete_goodies($idobject){ // En PDOprepare 
    /**
     * Fct qui supprime l'objets de la base de donné qui à pour idobject 
     * celui rentré en paramètre.
     * 
     */
    $connex=connectionBDD();
    try{
    // $sql= "DELETE FROM objects WHERE objects.idobject = idobject "; // Requette envoyer à la BDD pour supprimer des infos
    $sql = $connex->prepare("DELETE FROM objects WHERE objects.idobject = :idobject ");
    $sql->bindParam(':idobject', $idobject);
    $sql->execute();
    // print $sql;
    // $res=$connex->query($sql);
    // $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour supprimer l'objet : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    // return $resu;
}

function add_goodies($nomobject, $prixobject, $refidoeuvre, $descriptionobject, $imageobject){ // En PDOprepare 
    /** Fonction qui enregiste un new objet dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de l'objet fraichement ajoutée
     */
    $connex=connectionBDD();        // Connexion à la BDD
    try{
    // $sql= "INSERT INTO objects (nomobject, prixobject, descriptionobject)
    // VALUES ('".$data['nomobject']."', '".$data['prixobject']."', '".$data['descriptionobject']."')"; // Requette envoyer à la BDD pour créer un nouvel objet puis renvoyer son id et son nom.
    $sql = $connex->prepare("INSERT INTO objects (nomobject, prixobject, refidoeuvre, descriptionobject,imageobject)
    VALUES (:nomobject, :prixobject, :refidoeuvre, :descriptionobject, :imageobject)");
    $sql->bindParam(':nomobject', $nomobject);
    $sql->bindParam(':prixobject', $prixobject);
    $sql->bindParam(':refidoeuvre', $refidoeuvre);
    $sql->bindParam(':descriptionobject', $descriptionobject);
    $sql->bindParam(':imageobject', $imageobject);
    $sql->execute();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour ajouter l'objet : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
}

function edit_goodies($nomobject, $prixobject, $descriptionobject, $imageobject, $idobject){ // En PDOprepare 
    /** Fonction qui enregiste une new galerie dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de la galerie fraichement ajoutée
     */
    $connex=connectionBDD();        // Connexion à la BDD
    try {
    $res=$connex->prepare(
        "UPDATE objects SET nomobject = :nomobject, 
        prixobject = :prixobject, descriptionobject = :descriptionobject, 
        imageobject = :imageobject
        WHERE objects.idobject = :idobject");
    $res->bindParam(':nomobject', $nomobject);
    $res->bindParam(':prixobject', $prixobject);
    $res->bindParam(':descriptionobject', $descriptionobject);
    $res->bindParam(':imageobject', $imageobject);
    $res->bindParam(':idobject', $idobject);
    $res->execute();
    } 
    catch (Exception $e) { //Si échec
        print "Erreur pour la modif de la galerie : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
        // return $resu; // Affiche le résultat de la fonction
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
}

?>