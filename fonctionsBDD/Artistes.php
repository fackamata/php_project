<?php
require_once __DIR__.'/ConnectionBDD.php';

function get_all_artiste(): array{
  //Récupère toute les infos de tout les artistes
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT * FROM artistes";
    $res=$connex->query($sql);
    $resu=$res->fetchall(); //Conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function get_all_artiste_pseudo(): array{
  //Récupère le pseudo de tout les artistes
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $sql="SELECT pseudoartiste FROM artistes";
    $res=$connex->query($sql);
    $resu=$res->fetchAll(); //conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function get_info_artiste(string $idartiste): array{
  //Récupère dans la  base de donnée les informations liées à un artiste en utilisant son id
  $connex=connectionBDD(); //Connexion à la BDD
  try{
    $stmt = $connex->prepare("SELECT * FROM Artistes WHERE idartiste = :idartiste");
    $stmt->bindParam(':idartiste', $idartiste);
    $stmt->execute();
    $resu=$stmt->fetch(); //Conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour retourner les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $resu;
}

function edit_artiste(string $nomartiste, string $descriptionartiste, string $prenomartiste, string $villeartiste, string $paysartiste, string $emailartiste, string $pseudoartiste, string $imageartiste, string $idartiste): void{
    //Enregistre les modifications sur un artiste par son idartiste.
    $connex=connectionBDD(); //Connexion à la BDD

    try{
      $stmt = $connex->prepare("UPDATE artistes SET nomartiste = :nom, descriptionartiste =
       :description, prenomartiste = :prenom, villeartiste = :ville, paysartiste = :pays, emailartiste = 
       :email, pseudoartiste = :pseudo, imageartiste = :image WHERE idartiste = :idartiste");
       $stmt->bindParam(':nom', $nomartiste);
       $stmt->bindParam(':description', $descriptionartiste);
       $stmt->bindParam(':prenom', $prenomartiste);
       $stmt->bindParam(':ville', $villeartiste);
       $stmt->bindParam(':pays', $paysartiste);
       $stmt->bindParam(':email', $emailartiste);
       $stmt->bindParam(':pseudo', $pseudoartiste);
       $stmt->bindParam(':image', $imageartiste);
       $stmt->bindParam(':idartiste', $idartiste);
       $stmt->execute();
    }
    catch (PDOException $e) { //Si échec
      print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
      $resu = [];
      die(""); //Arrêt du script
    }
    disconnectionBDD($connex);
  }


function login_artiste(string $pseudo): array{
  //Fonction qui récupère les login d'un artiste pour une vérification en php avant de le logguer.
  $connex=connectionBDD();
  try{
    $stmt = $connex->prepare("SELECT motdepasseartiste, pseudoartiste, idartiste FROM artistes WHERE pseudoartiste = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
    $res = $stmt->fetch(); //Conditionnement en tableau
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
  return $res;
}

function change_password(string $password, string $idartiste): void{
  //Fonction qui modifie l'entrée du mot de passe dans la BDD pour un idartiste donné.
  $connex=connectionBDD();

  try{
    $stmt= $connex->prepare("UPDATE Artistes SET motdepasseartiste = :password WHERE idartiste = :idartiste");
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':idartiste', $idartiste);
    $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function add_artiste(string $nomartiste, string $prenomartiste, string $villeartiste, string $paysartiste, string $emailartiste, string $descriptionartiste, string $password, string $pseudoartiste): void{
  //Fonction qui ajoute un artiste en BDD avec toute ces informations
  $connex=connectionBDD();

  try{
    $stmt = $connex->prepare("INSERT INTO artistes (nomartiste, prenomartiste, villeartiste, 
    paysartiste, emailartiste, descriptionartiste, motdepasseartiste, 
    pseudoartiste) VALUES (:nom, :prenom, :ville, :pays, :email, 
    :description, :password, :pseudo)");
    $stmt->bindParam(':nom', $nomartiste);
    $stmt->bindParam(':prenom', $prenomartiste);
    $stmt->bindParam(':ville', $villeartiste);
    $stmt->bindParam(':pays', $paysartiste);
    $stmt->bindParam(':email', $emailartiste);
    $stmt->bindParam(':description', $descriptionartiste);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':pseudo', $pseudoartiste);
    $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $resu = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}

function delete_artiste(string $pseudo): void{
  //Fonction qui supprime un artiste de la BDD.
  $connex=connectionBDD();

  try{
    $stmt = $connex->prepare("DELETE FROM Artistes WHERE pseudoartiste = :pseudo");
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->execute();
  }
  catch (PDOException $e) { //Si échec
    print "Erreur pour mettre à jour les infos de l'artiste : " . $e->getMessage();
    $res = [];
    die(""); //Arrêt du script
  }
  disconnectionBDD($connex);
}
?>