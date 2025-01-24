<?php 
require  "./config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./index.css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Accueil</title>
  </head>
  <body>
    <?php include "./View/templates/navbar.php" ?>
      <div class="container " id="wrapper">
        <h1 class="h1 my-5 text-center ">Bienvenue dans notre Galeri'Alt !</h1>
          <h2 class="h2 my-5 text-center ">🌟 Explorez la beauté de l'art 🌟</h2>

          <!-- <div class="d-flex flex-md-row justify-content-evenly align-items-center">
              <img src="./upload/img_gal_accueil.png" class="img-fluid " 
                style='max-width: 50%; max-height: 400px;' 
                alt="Image de présentation galerie"
              >
          </div> -->

          <h2 class="mt-5 ">Ce que vous trouverez ici : </h2>
              <!-- <ul>
                <li>
                  Expositions Étonnantes : Plongez dans nos expositions actuelles et à venir, 
                  mettant en avant des styles variés et des techniques innovantes.
                </li>
                <li>
                  Artistes Passionnés : Rencontrez les artistes derrière les œuvres et apprenez-en davantage sur leur processus créatif.
                </li>
                <li>
                  Événements Spéciaux : Participez à nos vernissages, 
                  ateliers et conférences qui enrichissent votre expérience artistique.
                </li>
            </ul> -->
              <div class='card-body text-center'>
                </br>
                <h4 class="card-title">Expositions Étonnantes :</h4>
                <p class='card-text'>
                  Plongez dans nos expositions actuelles et à venir, 
                  mettant en avant des styles variés et des techniques innovantes.
                </p>
              </div>
                </br>
              <div class='card-body text-center'>
                <h4 class="card-title ">Artistes Passionnés :</h4>
                <p class='card-text '>
                  Rencontrez les artistes derrière les œuvres et apprenez-en davantage sur leur processus créatif.
                </p>
              </div>
                </br>
              <div class='card-body text-center'>
                <h4 class="card-title ">Événements Spéciaux :</h4>
                <p class='card-text '>
                  Participez à nos vernissages, 
                  ateliers et conférences qui enrichissent votre expérience artistique.
                </p>
               </div>
               </br>
               <div class='card-body text-center'>
                <h4 class="card-title ">A propos !</h4>
                <p class='card-text '>
                  Nous sommes ravis de vous accueillir dans notre galerie, un espace dédié à la créativité et à l'inspiration. 
                  Ici, vous découvrirez une collection soigneusement sélectionnée d'œuvres d'art contemporaines et classiques, 
                  réalisées par des artistes talentueux de divers horizons. Nous vous invitons à prendre le temps d'explorer, 
                  de ressentir et d'apprécier chaque pièce d'art. Votre voyage artistique commence ici !
                  L'art est une aventure sans fin, et nous sommes heureux de la partager avec vous.
                </p>
               </div>
               
       </div>
      <?php 
      //var_dump($_SESSION);
      // header("location : Galery/all_galery.php");
      ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
          integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
          crossorigin="anonymous">
      </script>
</body>
<footer>
  <?php include "./View/templates/footer.php" ?>
</footer>
  </html>