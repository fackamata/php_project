<?php
require_once BASE_PATH.'/fonctionsBDD/ConnectionBDD.php';

function get_info_type(): array{
  //Récupère tout les types de la table.

  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM type";
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