<?php
require './../config.php';
require_once BASE_PATH.'/fonctionsBDD/Artistes.php'; 

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./add_artiste.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ajout d'un client</title>
</head>
<body>
    <div class="container">
      <!-- <script defer src="./client_compte.js"></script> -->


      <!-- formulaire -->

      <form action="<?php echo "./save_artiste.php"?>" method="post">
     
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
          <input type="text" class="form-control" name="pseudoartiste" required>
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
  </body>
</html>
