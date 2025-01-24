<?php
require_once BASE_PATH.'/fonctionsBDD/ConnectionBDD.php';

function get_info_type(): array{
  //Récupère tout les types de la table.

  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM type";
    $res=$connex->query($sql);
    $resu=$res->fetchAll();  //Conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function get_type(string $idtype): array{
  //Récupère le nom du type associé à l'idtype donné
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("SELECT nomtype FROM Type WHERE idtype = :idtype");
    $stmt->bindParam(':idtype', $idtype);
    $stmt->execute();
    $res = $stmt->fetch(); //Conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $res;
}

function add_type(string $nomtype): void{
  //Ajoute un type dans la BDD
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("INSERT INTO Type (nomtype) VALUES (:nomtype)");
    $stmt->bindParam(':nomtype', $nomtype);
    $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function delete_type(string $idtype): void{
  //Supprime un type de la BDD
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("DELETE FROM Type WHERE idtype = :idtype");
    $stmt->bindParam(':idtype', $idtype);
    $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}
?>