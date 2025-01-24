<?php
require_once __DIR__.'/ConnectionBDD.php';

function add_galery_artiste(string $idgalerie, string $idartiste): void{
    //Ajoute une entrée dans la tableau associant un id de galerie et un id d'artiste pour donné dans quelle galerie expose l'artiste
    $connex=connectionBDD(); //Connexion à la BDD

    try{
      $stmt = $connex->prepare("INSERT INTO Exposer (idgalerie, idartiste)
       VALUES (:idgalerie, :idartiste)");
       $stmt->bindParam(':idgalerie', $idgalerie);
       $stmt->bindParam(':idartiste', $idartiste);
       $stmt->execute();
    }
    catch (PDOException $e) { //Si échec
      print "Erreur pour mettre à jour les infos de la table : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
  }

function edit_galery_artiste(string $idgalerie, string $idartiste): void{
  //Enregistre un changement de galerie d'un artiste
  $connex=connectionBDD(); //Connexion à la BDD

  try{
    $stmt = $connex->prepare("UPDATE Exposer SET idgalerie = :idgalerie WHERE idartiste = :idartiste");
      $stmt->bindParam(':idgalerie', $idgalerie);
      $stmt->bindParam(':idartiste', $idartiste);
      $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de la table : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function get_galery_by_id_artiste(string $idartiste): array{
  //Récupère la galerie dans laquelle expose l'artiste dont l'id est donné
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $stmt = $connex->prepare("SELECT galeries.nomgalerie, galeries.idgalerie FROM Galeries 
    INNER JOIN Exposer ON exposer.idgalerie = galeries.idgalerie 
    WHERE exposer.idartiste = :idartiste");
    $stmt->bindParam(':idartiste', $idartiste);
    $stmt->execute();
    $resu=$stmt->fetch();  //Conditionnement en tableau
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