<?php
require_once './../fonctionsBDD/Clients.php'; 
require_once './../Utils/marlene_fonction.php';

?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Show client <title>
  </head>
  <body>

    <header>
      <?php include "./View/templates/navbar.php" ?>
    </header>

  <body>
      <div class="container">
        <?php
        // on récupère les info clients ou un message
        $id = intval($_GET['id']);
        $client = get_client_by_id($id);
        // TODO: tester l'id

        // var_dump($client[0]['idclient']);
        // si on récupère un array avec des données, on affiche le client
        if ( count($client) > 0) {
        ?>
              
          <p><?php echo "Nom client : ". $client["nomclient"] ; ?></p>
          <p><?php echo "Preom client : ". $client["prenomclient"] ; ?></p>
          <p><?php echo "ville client : ". $client["villeclient"] ; ?></p>
          <p><?php echo "pays client : ". $client["paysclient"] ; ?></p>
          <p><?php echo "email client : ". $client["emailclient"] ; ?></p>
          <p><?php echo "mot de passe client : ". $client["motdepasseclient"] ; ?></p>
                
        
        <?php
        } else {
        ?>
            <div class="container">
              <p>Désolé le client recherché n'as pas été trouvé</p>
            </div>
            
            <?php 
        } ?>

        <a  href=" <?php echo "./all_client.php" ?>" 
            class="btn btn-primary" 
            role="button"> 
            <?php echo "Admin client" ?>
        </a>
      </div>

    
    <footer>
        <?php include "./View/templates/footer.php" ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>
