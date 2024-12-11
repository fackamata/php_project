<?php

// include "./fonctionsConnection.php";
require __DIR__.  "/fonctionsConnexion.php";


function enregistreArtiste($nom, $prenom) {
   /* ------------------------------------------------
   permet d'enregister le Artiste dans  la bdd (insert)
	paramètres d'entrée
   - 1er paramètre $nom : contient le nom du Artiste
   - 2ème paramètre $connex : contient le connecteur de la bdd
	retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
   */
  $connex=connexionBDD(); 
  
  $sql="INSERT INTO ARTISTES (NomArtiste, PrenomArtiste ) VALUES ('".$nom."', '".$prenom."') RETURNING idArtiste";    // déclaration de la variable appelée $sql.
  $res=$connex->query($sql);				// demande d'execution de la requête sur la base via le connecteur $connex. Le resultat est dans la variable $res au format structuré PDO
  $lire = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  deconnexionBDD($connex);
  return $lire;							// retourne l'identifiant choisi par le sgbd
}

function tousLesArtistes() {
/*--------------------------------
récupère les Artistes à partir de la base de données
paramètres d'entrées :
	$connex : connecteur de la base de données
retourne la liste de tous les Artistes
-----------------------------*/
$connex=connexionBDD(); 
   try {
   
      $sql="SELECT nomartiste, prenomartiste FROM artistes ORDER BY nomartiste";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 
      $resu=$res->fetchAll();
      // var_dump($resu);
   } catch (\Throwable $th) {
      echo "impossible de faire la requete : " . $th;
   }
   deconnexionBDD($connex);

   return $resu;								// retourne a l'appelant le resultat.
}


function ListerUnArtiste($id_art) {
/*--------------------------------
récupère un Artiste à partir de son $id_art
paramètres d'entrées :
	$connex : connecteur de la base de données
	$id_art : id de l'artiste (int)
retourne la liste d'un Artiste
-----------------------------*/
   $connex=connexionBDD(); 
   try {
      $sql="SELECT NomArtiste, PrenomArtiste FROM ARTISTES WHERE idArtiste LIKE '".$id_art."' ";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      $resu=$res->fetchOne();
   } catch (PDOException $e) { // si échec
      print "Erreur pour récupérer tous les artistes : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
   }
   
   deconnexionBDD($connex);
   return $resu;								// retourne a l'appelant le resultat.
}

function addArtistes($nomA, $prenomA) {
   /*--------------------------------
   
   -----------------------------*/
   $connex=connexionBDD(); 
   try {
      // MariaDB [(none)]> insert into artistes (nomartiste, prenomartiste) values ('marc', 'morand');
      $sql="INSERT INTO artistes (nomartiste, prenomartiste) VALUES ('".$nomA."','".$prenomA."')";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      // $resu=$res->fetchOne();
   } catch (PDOException $e) { // si échec
      print "Erreur pour ajouter un artiste : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
   }

   deconnexionBDD($connex);
   // return $resu;								// retourne a l'appelant le resultat.
}
