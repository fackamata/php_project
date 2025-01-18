<?php
require_once __DIR__.'/ConnectionBDD.php';

function get_all_artiste(): array{
  //Récupère toute les infos de tout les artistes
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM artistes";
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchall();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function get_all_artiste_pseudo(){//: array{
  //Récupère le pseudo de tout les artistes
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT pseudoartiste FROM artistes";
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchAll();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function get_info_artiste(int $idartiste): array{
  //Récupère dans la  base de donnée les informations liées à un artiste en utilisant son id
  //Fonction utiliser pour l'affichage du compte de l'artiste
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM artistes WHERE idartiste = '".$idartiste."'"; //Requête sql 
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetch();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function edit_artiste(string $var, int $idartiste): void{
    //Enregistre les modifications sur un artiste par son idartiste.
    $connex=connectionBDD(); //Connexion à la BDD
    try{
      $sql="UPDATE artistes SET ".$var." WHERE idartiste = '".$idartiste."'"; // Requête sql
      print $sql;
      $res=$connex->query($sql);
    }
    catch (PDOException $e) { //Si échec
      print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
  }

function login_artiste(string $login): array{
  //Fonction qui récupère les login d'un artiste avant de le logguer.
  $connex=connectionBDD();
  try{
  $sql="SELECT motdepasseartiste, pseudoartiste, idartiste FROM artistes WHERE pseudoartiste='".$login."'";
  print $sql;
  $res=$connex->query($sql);
  $resu=$res->fetch();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function change_password(string $password, string $pseudo): void{
  //Fonction qui modifie l'entrée du mot de passe dans la BDD pour un pseudo donné.
  $connex=connectionBDD();
  try{
    $sql="UPDATE artistes SET motdepasseartiste = '".$password."' WHERE idartiste='".$pseudo."'";
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetch();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function add_artiste(string $var, string $pseudo): int{
  //Fonction qui modifie l'entrée du mot de passe dans la BDD pour un pseudo donné.
  $connex=connectionBDD();
  try{
    $sql="INSERT INTO artistes (nomartiste, prenomartiste, villeartiste, 
    paysartiste, emailartiste, descriptionartiste, motdepasseartiste, 
    pseudoartiste) VALUES ".$var."'".$pseudo."')";
    print $sql;
    $res=$connex->query($sql);
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  $id = login_artiste($pseudo);
  return $id["idartiste"];
}

function delete_artiste(string $login): void{
  //Fonction qui supprime un artiste de la BDD.
  $connex=connectionBDD();
  try{
  $sql=" DELETE FROM Artistes WHERE pseudoartiste = '".$login."'";
  print $sql;
  $res=$connex->query($sql);
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}
?>