<?php
require_once BASE_PATH."/fonctionsBDD/ConnectionBDD.php";

function add_artwork(string $var): void{
    //Enregistre dans la base de donnée l'ajout d'une nouvelle oeuvre par un artiste.
    $connex=connectionBDD(); //Connexion à la BDD
    try{
      $sql="INSERT INTO oeuvres (nomoeuvre, descriptionoeuvre, 
      dateoeuvre, refidtype, imageoeuvre, refidartiste) VALUES (".$var.")";
      print $sql;
      $res=$connex->query($sql);
    }
    catch (PDOException $e) { //Si échec
      print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
  }

  function edit_artwork(string $var, int $idoeuvre): PDOStatement{
    //Enregistre dans la base de donnée les modifications d'une oeuvre par son id_oeuvre.
    $connex=connectionBDD(); //Connexion à la BDD
    try{
      $sql="UPDATE oeuvres SET ".$var." WHERE idoeuvre = '".$idoeuvre."'";
      print $sql;
      $res=$connex->query($sql);
    }
    catch (PDOException $e) { //Si échec
      print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
    return $res;
  }

  function get_info_artwork(int $idartiste): array{
    //Récupère dans la base de donnée les infos d'une oeuvre par le nom de l'artiste.
    $connex=connectionBDD(); //Connexion à la BDD
    try{
      $sql="SELECT oeuvres.idoeuvre, oeuvres.nomoeuvre, oeuvres.dateoeuvre, 
      oeuvres.descriptionoeuvre, oeuvres.refidtype, oeuvres.refidartiste, 
      oeuvres.imageoeuvre FROM oeuvres INNER JOIN artistes ON artistes.idartiste
      = oeuvres.refidartiste WHERE idartiste = '".$idartiste."'";
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
?>