<?php
require './../config.php';
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; 

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./add_artiste.js"></script>
    <title>Ajout d'un client</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      <!-- <script defer src="./client_compte.js"></script> -->
      <?php
        $pseudo = get_all_artiste_pseudo();
        echo "<script>let pseudo = ".json_encode($pseudo)."</script>";
        echo "<script>let currentpseudo = ".$_SESSION['pseudoartiste']."</script>";
        ?>
       
      <!-- formulaire -->

      <form action="./save_artiste.php" method="post">

        <div class="form-group">
          <label for="imageartiste">Photo de profil :</label>
          <input type="file" class="form-control" accept="image/*" nom="imageartiste" >
        <div class="form-group">
        <div class="form-group">
          <label for="nomartiste">Nom artiste :</label>
          <input type="text" class="form-control" name="nomartiste" >
        <div class="form-group">
        </div>
          <label for="prenomartiste">Prenom artiste :</label>
          <input type="text" class="form-control" name="prenomartiste" >
        <div class="form-group">
        </div>
          <label for="pseudoartiste">Pseudo artiste :</label>
          <input type="text" class="form-control" name="pseudoartiste" id="pseudoconfirm" required>
          <p id="msgconfirmpseudo"></p>
        <div class="form-group">
        </div>  
          <label for="paysartiste">Pays artiste :</label>
          <input type="text" class="form-control" name="paysartiste" >
        <div class="form-group">
        </div>
          <label for="villeartiste">ville artiste :</label>
          <input type="text" class="form-control" name="villeartiste" >
        <div class="form-group">
        </div>
          <label for="emailartiste">email artiste :</label>
          <input type="text" class="form-control" name="emailartiste" >
        <div class="form-group">
        </div>
          <label for="descriptionartiste">Description artiste :</label>
          <input type="text" class="form-control" name="descriptionartiste" >
        <div class="form-group">
          <label for="firstpass">mot de passe :</label>
          <input type="password" class="form-control" name="firstpass" id="firstpass" required>
        </div>
        <div class="form-group">
          <label for="secondpass">Confirmer le passe :</label>
          <input type="password" class="form-control" name="secondpass" id="secondpass" required>
          <p id='validate'></p>
        </div>

          <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
      </form>

        <a href="./all_client.php" class="btn btn-primary">Retour à la page du client</a>
    </div>
    <?php include "./../View/templates/footer.php";?>
  </body>
</html>
