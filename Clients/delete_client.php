<?php

require_once './../fonctionsBDD/Clients.php';
// require_once "./../Utils/marlene_fonction.php"

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Suppression du client</title>
</head>
<body>
    <div class="container">
        <p>vous êtes sur la page de suppression</p>

    <?php
        if (isset($_GET["id"])) {
            // ajouter des vérification et sécurité
            delete_client($_GET['id']);
            // deleteClient($_GET['id']);
            ?>
            <p>tu as supprimer le client</p>

            <?php
        } else {
            ?>
            <p>pas d'id client </p>
            <?php
            
        }
        ?>
      <a  href=" <?php echo "./all_client.php" ?>" 
          class="btn btn-primary" 
          role="button"> 
          <?php echo "Admin client" ?>
      </a>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>
