<?php 
require  "./config.php";
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Accueil</title>
  </head>
  <body>

    <header>
      <?php include "./View/templates/navbar.php" ?>
    </header>
    <h1>Bienvenue dans notre galeri'alt</h1>
    
    
    <!-- améliorer pour que les vues soit envoyé ici pour ne pas avoir à recopier le html d'encadrement à chaque fois -->
    <footer>
        <?php include "./View/templates/footer.php" ?>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>