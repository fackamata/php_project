<?php
require './../config.php';
require_once './../fonctionsBDD/Artistes.php'; 

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./add_artiste.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ajout d'une galerie</title>
</head>
<body>
    <div class="container">
      <!-- <script defer src="./client_compte.js"></script> -->
      <!-- formulaire -->
      <form action="<?php echo "./save_galery.php"?>" method="post">
     
        <div class="form-group">
            <label for="nomgalerie">Nom galerie :</label>
            <input type="text" class="form-control" name="nomgalerie" required>
        <div class="form-group">
        </div>
            <label for="villegalerie">Ville galerie :</label>
            <input type="text" class="form-control" name="villegalerie" required>
        <div class="form-group">
        </div>
            <label for="addressegalerie">Addresse galerie :</label>
            <input type="text" class="form-control" name="addressegalerie" >
        <div class="form-group">
        </div>  
            <label for="cpgalerie">Code postal galerie :</label>
            <input type="entier" class="form-control" name="cpgalerie" >
        <div class="form-group">
        </div>
            <label for="paysgalerie">Pays galerie :</label>
            <input type="text" class="form-control" name="paysgalerie" >
        <div class="form-group">
        </div>
                    
        <button class="btn btn-success" type="submit" id="submit">Envoyer</button>
      </form>

        <a href="./../index.php" class="btn btn-primary">Retour à la page d'acceuil</a>
    </div>
  </body>
</html>