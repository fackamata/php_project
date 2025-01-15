<?php
require_once "ConnectionBDD.php"; 
require_once "./../Utils/marlene_fonction.php";

function get_all_clients(): array
{
  /* fonction qui retourne tous les clients dans un tableau 
  ( fonction SELECT  )
  
  paramètres d'entrée
  - connecteur $connex : contient le cursor/connecteur de la bdd
	
  retourne :
  - array $resu : tableau de tous les clients, 
  chaque client correspond à un tableau d'info
  // */
  
  $connex=connectionBDD(); // on se connect
  try {
    $sql="SELECT * FROM clients ORDER BY idclient";
    $res=$connex->query($sql);
    $resu=$res->fetchall();
  } catch (PDOException $e) { // si échec
    print "Erreur pour retourner tous les clients : " . $e->getMessage();
    $resu = [];
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}


function get_client_by_id(int $id): array
{
  /* fonction qui récupère les information d'un client sous la forme d'un tableau 
  ( fonction SELECT )
 
  paramètres d'entrée :
  - int $id: l'id du client dont on veut les données
  - connecteur $connex : contient le cursor/connecteur de la bdd
  
  retourne :
    - array $resu : le tableau d'information d'un client 
    chaque client correspond à un tableau d'info
  retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
  */
  $connex=connectionBDD(); // on se connect
  try {
    $sql="SELECT * FROM clients WHERE idclient = '".$id."'";
      $res=$connex->query($sql);
      $resu=$res->fetch();
    } catch (PDOException $e) { // si échec
      print "Erreur pour récupérer tous les clients : " . $e->getMessage();
      $resu = [];
      die(""); // Arrêt du script - sortie.
    }
    disconnectionBDD($connex);
    return $resu;
  }
  
  
function add_client(array $data): int 
  {
    /* fonction qui enregiste un client dans la bdd 
    ( fonction INSERT )
    
    paramètres d'entrée
    - array $data: tableau des valeurs nécessaire à l'enregistrement d'un client en bdd
    - connecteur $connex : contient le cursor/connecteur de la bdd
    
    retourne l'identifiant qui a été choisi par le sgbd lors de l'insertion
    */
    
    $connex=connectionBDD(); // on se connect
    try {
      $sql="INSERT INTO clients (nomclient, prenomclient, paysclient, villeclient, emailclient, motdepasseclient)
    VALUES ('".$data['nom']."', '".$data['prenom']."', '".$data['pays']."', '".$data['ville']."', '".$data['email']."', '".$data['motdepasse']."') 
    RETURNING idclient";
    $res=$connex->query($sql);
    $retour = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter le clients " . $data['nom'] ."  : " . $e->getMessage();
    $retour = 1;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $retour;
}

function update_client_db(array $data): int 
{
  /* fonction qui update un client dans la bdd 
  ( fonction UPDATE )
  
  paramètres d'entrée
  - array $data: tableau des valeurs nécessaire à la mise à jour d'un client en bdd
  - connecteur $connex : contient le cursor/connecteur de la bdd
	
  retourne l'identifiant du client modifier
  */
  
  // TODO : REMOVE
  // $sql="UPDATE artistes SET ".$var." WHERE idartiste = '".$idartiste."'";

  $connex=connectionBDD(); // on se connect
  try {
    $sql="UPDATE clients 
    SET nomclient = '".$data['nom']."', 
        prenomclient = '".$data['prenom']."', 
        paysclient = '".$data['pays']."', 
        villeclient = '".$data['ville']."', 
        emailclient = '".$data['email']."', 
        motdepasseclient = '".$data['motdepasse']."'
    WHERE idclient = '".$data['id']."' 
    RETURNING idclient";


    $res=$connex->query($sql);
    $retour = $res->fetchColumn(); 		// récupération de la valeur l'élément RETURNING contenu dans $res
  } catch (PDOException $e) { // si échec
    print "Erreur pour ajouter le clients " . $data['nom'] ."  : " . $e->getMessage();
    $retour = 1;
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $retour;
}


function delete_client($idclient): void 
{
  //Enregistre les modifications sur un client par son id_client
  
  $connex=connectionBDD(); 
  try {
    $sql=" DELETE FROM clients WHERE idclient = '".$idclient."'";
    $res=$connex->query($sql); 				// execution de la requête. Le resultat est dans la variable $res.
    // $resu=$res->fetchOne();
  } catch (PDOException $e) { // si échec
      print "Erreur pour la modification d'un client : " . $e->getMessage();
      die(""); // Arrêt du script - sortie.
      }
      
      disconnectionBDD($connex);
      // return $res;					
}

function login_client($login){
  //Fonction qui récupère les login d'un client avant de le logguer.

  $connex=connectionBDD();
  try{
    $sql="SELECT motdepasseclient, pseudoclient, idclient FROM clients WHERE pseudoclient='".$login."'";
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetch();
  }
  catch (PDOException $e) { // si échec
    print "Erreur pour la modification d'un client : " . $e->getMessage();
    die(""); // Arrêt du script - sortie.
  }
  disconnectionBDD($connex);
  return $resu;
}
    
?>

