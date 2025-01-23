<?php
require_once BASE_PATH."/fonctionsBDD/ConnectionBDD.php";

function get_info_comment(string $idoeuvre): array{
    //Récupère tout les commentaires d'une oeuvre par son id_oeuvre
    $connex=connectionBDD(); //Connexion à la BDD

    try{
      $stmt = $connex->prepare("SELECT clients.prenomclient, clients.nomclient, clients.pseudoclient, oeuvres.nomoeuvre, 
      commenter.message, commenter.datecommentaire, artistes.nomartiste, 
      artistes.prenomartiste, artistes.pseudoartiste FROM commenter INNER JOIN oeuvres ON 
      commenter.refidoeuvre = oeuvres.idoeuvre INNER JOIN clients ON
       commenter.refidclient = clients.idclient INNER JOIN artistes ON
       artistes.idartiste = oeuvres.refidartiste WHERE oeuvres.idoeuvre = :idoeuvre");
       $stmt->bindParam(':idoeuvre', $idoeuvre);
       $stmt->execute();
       $res = $stmt->fetchAll();
    }
    catch  (PDOException $e) { //Si échec
      print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
    return $res;
}

function save_comment(string $message, string $idoeuvre, string $idclient, string $date): void{
  //Sauvegarde un commentaire avec l'association idclient et idoeuvre
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("INSERT INTO Commenter (message, 
    refidoeuvre, refidclient, datecommentaire) VALUES (:message, :idoeuvre, :idclient, :date)");
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':idoeuvre', $idoeuvre);
    $stmt->bindParam(':idclient', $idclient);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
  }
  
  catch  (PDOException $e) { //Si échec
    echo "ECHEC DE LA BDD ATTENTION ";
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function delete_comment(string $idclient): void{
  //Supprime un commentaire par l'idclient 
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("DELETE FROM Commenter WHERE refidclient = :idclient");
    $stmt->bindParam(':idclient', $idclient);
    $stmt->execute();
  }
  
  catch  (PDOException $e) { //Si échec
    echo "ECHEC DE LA BDD ATTENTION ";
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}
?>