<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo MARLENE_PATH."assets/css/style.css" ?>">
    
    
    <title><?php echo $data["title"];?> </title>
  </head>
  <body>

    <?php include __DIR__."./../../../View/templates/navbar.php" ?>
    
    <main>
      <?php 
      echo $view_content;
      // var_dump($view_content);
      ?>
    </main>
    
    <?php include __DIR__."./../../../View/templates/footer.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
    
    <?php 
      // import du js en fonctiond d'un paramètre défini 
      if(isset($data["client_check_js"]) && $data["client_check_js"]){
        ?>
        <script src="./../../Marlene/assets/js/client_check.js"></script>
        <?php
      };
      if(isset($data["achat_js"]) && $data["achat_js"]){
        ?>
        <script src="./../../Marlene/assets/js/achat.js"></script>
        <?php
      };
    ?>
</body>
</html>