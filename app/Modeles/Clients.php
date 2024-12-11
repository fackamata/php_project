<?php

// include "./fonctionsConnection.php";
require __DIR__.  "/fonctionsConnexion.php";


function enregistreclient($nom, $prenom) {
   /* ------------------------------------------------
   permet d'enregister le client dans  la bdd (insert)
	paramètres d'entrée
   - 1er paramètre $nom : contient le nom du client
   - 2ème paramètre $connex : contient le connecteur de la bdd
	retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
   */
  $connex=connexionBDD(); 
  
  $sql="INSERT INTO clientS (Nomclient, Prenomclient ) VALUES ('".$nom."', '".$prenom."') RETURNING idclient";    // déclaration de la variable appelée $sql.
  $res=$connex->query($sql);				// demande d'execution de la requête sur la base via le connecteur $connex. Le resultat est dans la variable $res au format structuré PDO
  $lire = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  deconnexionBDD($connex);
  return $lire;							// retourne l'identifiant choisi par le sgbd
}

function tousLesClients() {
/*--------------------------------
récupère les clients à partir de la base de données
paramètres d'entrées :
	$connex : connecteur de la base de données
retourne la liste de tous les clients

	$database = dbConnect();
	$statement = $database->prepare(
    	"SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM clientss WHERE id = ?"
	);
	$statement->execute([$identifier]);
	$row = $statement->fechall();
-----------------------------*/
$connex=connexionBDD(); 
   try {
   
      $sql="SELECT nomclient, prenomclient FROM clients ORDER BY nomclient";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 
      $resu=$res->fetchAll();
      // var_dump($resu);
   } catch (\Throwable $th) {
      echo "impossible de faire la requete : " . $th;
   }
   deconnexionBDD($connex);

   return $resu;								// retourne a l'appelant le resultat.
}


function ListerUnclient($id_art) {
/*--------------------------------
récupère un client à partir de son $id_art
paramètres d'entrées :
	$connex : connecteur de la base de données
	$id_art : id de l'client (int)
retourne la liste d'un client
-----------------------------*/
   $connex=connexionBDD(); 
   try {
      $sql="SELECT Nomclient, Prenomclient FROM clientS WHERE idclient LIKE '".$id_art."' ";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      $resu=$res->fetchOne();
   } catch (PDOException $e) { // si échec
      print "Erreur pour récupérer tous les clients : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
   }
   
   deconnexionBDD($connex);
   return $resu;								// retourne a l'appelant le resultat.
}

function addclients($nomA, $prenomA) {
   /*--------------------------------
   
   -----------------------------*/
   $connex=connexionBDD(); 
   try {
      // MariaDB [(none)]> insert into clients (nomclient, prenomclient) values ('marc', 'morand');
      $sql="INSERT INTO clients (nomclient, prenomclient) VALUES ('".$nomA."','".$prenomA."')";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      // $resu=$res->fetchOne();
   } catch (PDOException $e) { // si échec
      print "Erreur pour ajouter un client : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
   }

   deconnexionBDD($connex);
   // return $resu;								// retourne a l'appelant le resultat.
}
