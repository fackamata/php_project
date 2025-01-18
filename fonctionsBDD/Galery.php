<?php

require_once './../fonctionsBDD/ConnectionBDD.php';

function get_all_galery(){
    /**
     * Récupère dans la base de donnée toutes les infos de toutes les galeries.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    try {
    $sql="SELECT * FROM galeries"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    }
    catch (Exception $e) { //Si échec
        print "Erreur pour retourner les infos de la galerie : " . $e->getMessage();
        $resu = [];
        die(""); //Arrêt du script
    }
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function get_galery_by_id($idgalerie,$connex){
    /**
     * Récupère dans la base de donnée toutes les infos d'une galerie grâce à son id.
    * 
    */
    $connex=connectionBDD(); //Connexion à la BDD
    $sql="SELECT * FROM galeries WHERE idgalerie = '".$idgalerie."'"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function get_galery_by_cp($cpgalerie,$connex){
    /**
     * Récupère dans la base de donnée toutes les infos d'une galerie grâce à son code postale.
     * 
     */
    $connex=connectionBDD(); //Connexion à la BDD
    $sql="SELECT * FROM galeries WHERE cpgalerie = '".$cpgalerie."'"; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function get_list_galery($nom,$connex){
    /**
     * Liste, depuis les infos de la BDD, toutes les galeries présentes 
     * pour que les artistes exposent leurs oeuvres.
     *  
     */
    $connex=connectionBDD(); //Connexion à la BDD
    $sql= "SELECT nomgalerie, villegalerie FROM galeries "; // Requette envoyer à la BDD pour récupérer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    disconnectionBDD($connex); //Deconnexion de la BDD
    return $resu;
}

function delete_galery($nom,$connex){
    /**
     * Fct qui supprime la galerie de la base de donné qui à pour nom 
     * celui rentré en paramètre.
     * 
     */
    $connex=connectionBDD();
    $sql= "DELETE * FROM galeries WHERE nomgalerie = '".$nom."'";       // Requette envoyer à la BDD pour supprimer des infos
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
    disconnectionBDD($connex);      //Deconnexion de la BDD
    return $resu;
}

function add_galery($data){
    /** Fonction qui enregiste une new galerie dans la bdd 
     *
     *  Retourne l'identifiant choisit lors de l'injection et le nom de la galerie fraichement ajoutée
     *  
     */
    $connex=connectionBDD();        // Connexion à la BDD
    $sql= "INSERT INTO galeries (nomgalerie, villegalerie, paysgalerie);
    VALUES ('".$data['nom']."', '".$data['ville']."', '".$data['pays']."')
    RETURNING idgalerie, nomgalerie ";      // Requette envoyer à la BDD pour créer une nouvelle galerie puis renvoyer son id et son nom.
    $res=$connex->query($sql);
    $retour = $res->fetchColumn();
    $resu= $res->fetchAll();
    disconnectionBDD($connex);      //Deconnexion de la BDD
    return $resu;
}
?>