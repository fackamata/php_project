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
    print $sql;
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

function get_goodies_by_name($nomobject,$connex){
    /**
     * Récupère dans la base de donnée toutes les infos des objets portant le nom passer en paramètre.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql="SELECT * FROM objetcs WHERE nomobject = '".$nomobject."'"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
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


function delete_goodies($nom,$connex){
    /**
     * Fct qui supprime l'objets de la base de donné qui à pour nom 
     * celui rentré en paramètre.
     * 
     */
    $connex=connectionBDD();
    try{
    $sql= "DELETE * FROM objects WHERE nomobject = '".$nom."'";       // Requette envoyer à la BDD pour supprimer des infos
    print $sql;
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

function add_goodies($data){
    /** Fonction qui enregiste un new objet dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de l'objet fraichement ajoutée
     *  
     */
    $connex=connectionBDD();        // Connexion à la BDD
    try{
    $sql= "INSERT INTO objects (nomobject, prixobject, descriptionobject);
    VALUES ('".$data['nomobject']."', '".$data['prixobject']."', '".$data['descriptionobject']."')
    RETURNING idobject, nomobject ";      // Requette envoyer à la BDD pour créer un nouvel objet puis renvoyer son id et son nom.
    $res=$connex->query($sql);
    $retour = $res->fetchColumn();
    $resu= $res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos de l'objet : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

?>