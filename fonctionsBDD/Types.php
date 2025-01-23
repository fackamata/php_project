<?php
require_once BASE_PATH.'/fonctionsBDD/ConnectionBDD.php';

function get_info_type(): array{
  //Récupère tout les types de la table.

  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM type";
    print $sql;
    $res=$connex->query($sql);
    $resu=$res->fetchColumn();
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
    $res = $stmt->fetch();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $res;
}
?>