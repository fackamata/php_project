<?php
require_once './../fonctionsBDD/Clients.php'; 

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ajout d'un client</title>
</head>
<body>
    <div class="container">
      <!-- <script defer src="./client_compte.js"></script> -->


      <!-- formulaire -->

      <form action="<?php echo "./save_client.php"?>" method="post">
     
        <div class="form-group">
          <label for="nomclient">Nom client :</label>
          <input type="text" class="form-control" name="nomclient" >
        <div class="form-group">
        </div>
          <label for="prenomclient">Prenom client :</label>
          <input type="text" class="form-control" name="prenomclient" >
        <div class="form-group">
        </div>  
          <label for="paysclient">Pays client :</label>
          <input type="text" class="form-control" name="paysclient" >
        <div class="form-group">
        </div>
          <label for="villeclient">ville client :</label>
          <input type="text" class="form-control" name="villeclient" >
        <div class="form-group">
        </div>
          <label for="emailclient">email client :</label>
          <input type="text" class="form-control" name="emailclient" >
        <div class="form-group">
          <label for="motdepasseclient">mot de passe :</label>
          <input type="text" class="form-control" name="motdepasseclient">
        </div>

          <button class="btn btn-success" type="submit">Envoyer</button>
      </form>

        <a href="./all_client.php" class="btn btn-primary">Retour à la page du client</a>
    </div>
  </body>
</html>
