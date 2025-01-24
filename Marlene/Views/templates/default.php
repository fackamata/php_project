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
      // var_dump($data);
      // if(isset($_SESSION)){
        
      //   var_dump($_SESSION);
      // }
      echo $view_content;
      ?>
    </main>
    
    <?php include __DIR__."./../../../View/templates/footer.php" ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
    
    <?php 
      // import du js en fonction d'un paramètre qui correspond à celui requis 
      if(isset($data["achat_js"]) && $data["achat_js"]){
        ?>
        <script src="./../../Marlene/assets/js/achat.js"></script>
        <?php
      };
      if(isset($data["plus_js"]) && $data["plus_js"]){
        ?>
        <script src="./../../Marlene/assets/js/plus.js"></script>
        <?php
      };
      if(isset($data["client_check_passwd_js"]) && $data["client_check_passwd_js"]){
        ?>
        <script src="./../../Marlene/assets/js/client_check_passwd.js"></script>
        <?php
      };
      if(isset($data["client_check_pseudo_js"]) && $data["client_check_pseudo_js"]){
        ?>
        <script src="./../../Marlene/assets/js/client_check_pseudo.js"></script>
        <?php
      };
    ?>
</body>
</html>