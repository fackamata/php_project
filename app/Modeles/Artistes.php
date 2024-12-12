<?php
require __DIR__.  "/fonctionsConnexion.php";
/* 
           Artiste Modele

   toutes les fonctions qui communique avec la table Artiste en Base de données :
   
   en général une fonction :
     - insertion de données en base de données:
         TODO finir la doc
   
     - demande d'info à la base de données:
         TODO finir la doc

 c'est le controlleur qui interroge le modèle pour
 récupérer des information
*/ 

function enregistreArtiste($nom, $prenom) {
   /* ------------------------------------------------
   permet d'enregister le Artiste dans  la bdd (insert)
	paramètres d'entrée
   - 1er paramètre $nom : contient le nom du Artiste
   - 2ème paramètre $connex : contient le connecteur de la bdd
	retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
   */
  $connex=connexionBDD(); 
  
  $sql="INSERT INTO artistes (nomartiste, prenomartiste ) VALUES ('".$nom."', '".$prenom."') RETURNING idArtiste";    // déclaration de la variable appelée $sql.
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


function listerUnArtiste($id_art) {
/*--------------------------------
récupère un Artiste à partir de son $id_art
paramètres d'entrées :
	$connex : connecteur de la base de données
	$id_art : id de l'artiste (int)
retourne la liste d'un Artiste
-----------------------------*/
   $connex=connexionBDD(); 
   try {
      $sql="SELECT idartiste, nomartiste, prenomartiste FROM artistes WHERE idArtiste LIKE '".$id_art."' ";				// déclaration de la variable appelee $sql.
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      $resu=$res->fetch();
   } catch (PDOException $e) { // si échec
      print "Erreur pour récupérer tous les artistes : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
   }
   
   deconnexionBDD($connex);
   return $resu;								// retourne a l'appelant le resultat.
}

function addArtistes($nomA, $prenomA): void {
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

function enregistremodif_artiste($idartiste, $var): void {
   //Enregistre les modifications sur un artiste par son id_artiste

   $connex=connexionBDD(); 
   try {
      $sql=" UPDATE artistes SET (nomartiste, prenomartiste, descriptionartiste, villeartiste, paysartiste, emailartiste) 
            VALUES ('".$description."','". $nom."','". $prenom."','". $ville."','". $pays."','". $email."') 
            WHERE idartiste = '".$idartiste."'";
      var_dump($sql);
      $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
      // $resu=$res->fetchOne();
      } catch (PDOException $e) { // si échec
         print "Erreur pour la modification d'un artiste : " . $e->getMessage();
         die(""); // Arrêt du script - sortie.
      }
      
      deconnexionBDD($connex);
      // return $res;					
      }
?>

